<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MpesaController extends Controller
{
    public function stkPush(Request $request)
    {
        $request->validate([
            'phone'  => 'required',
            'amount' => 'required|numeric|min:1',
            'name'   => 'required',
            'email'  => 'required|email',
        ]);

        try {
            $consumerKey    = config('services.mpesa.consumer_key');
            $consumerSecret = config('services.mpesa.consumer_secret');
            $shortcode      = config('services.mpesa.shortcode');
            $passkey        = config('services.mpesa.passkey');
            $callbackUrl    = config('services.mpesa.callback_url');

            if (!$consumerKey || !$consumerSecret) {
                throw new \Exception('M-Pesa credentials not configured.');
            }

            // Generate access token
            $tokenResponse = Http::withBasicAuth($consumerKey, $consumerSecret)
                ->get('https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials');

            $accessToken = $tokenResponse->json()['access_token'] ?? null;

            if (!$accessToken) {
                Log::error('Mpesa Token Error', $tokenResponse->json());
                throw new \Exception('Could not generate access token.');
            }

            // Generate timestamp and password
            $timestamp = date('YmdHis');
            $password  = base64_encode($shortcode . $passkey . $timestamp);

            // Format phone: 07XX → 2547XX
            $phone = preg_replace('/^\+/', '', $request->phone);
            $phone = preg_replace('/^0/', '254', $phone);

            // STK Push request
            $response = Http::withToken($accessToken)->post(
                'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest',
                [
                    "BusinessShortCode" => $shortcode,
                    "Password"          => $password,
                    "Timestamp"         => $timestamp,
                    "TransactionType"   => "CustomerPayBillOnline",
                    "Amount"            => (int) $request->amount,
                    "PartyA"            => $phone,
                    "PartyB"            => $shortcode,
                    "PhoneNumber"       => $phone,
                    "CallBackURL"       => $callbackUrl,
                    "AccountReference"  => "FoundationDonation",
                    "TransactionDesc"   => "Donation Payment"
                ]
            );

            $result = $response->json();
            Log::info('Mpesa STK Response', $result);

            if (isset($result['ResponseCode']) && $result['ResponseCode'] == '0') {
                Donation::create([
                    'name'           => $request->name,
                    'email'          => $request->email,
                    'amount'         => $request->amount,
                    'payment_method' => 'Mpesa',
                    'status'         => 'pending',
                ]);

                return back()->with('success', '✅ STK Push sent! Check your phone to complete payment.');
            }

            return back()->with('error', '❌ ' . ($result['errorMessage'] ?? 'STK Push failed.'));

        } catch (\Exception $e) {
            Log::error('Mpesa Error: ' . $e->getMessage());
            return back()->with('error', 'M-Pesa request failed: ' . $e->getMessage());
        }
    }

    public function callback(Request $request)
    {
        Log::info('MPESA CALLBACK', $request->all());

        $data = $request->input('Body.stkCallback');

        if (isset($data['ResultCode']) && $data['ResultCode'] == 0) {
            Log::info('Payment successful', $data);
        }

        return response()->json(["ResultCode" => 0, "ResultDesc" => "Success"]);
    }
}