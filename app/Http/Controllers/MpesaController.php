<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MpesaController extends Controller
{
    // Handle STK Push request
    public function stkPush(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'amount' => 'required|numeric|min:1',
        ]);

        try {
            // Get Consumer Key & Secret from .env
            $consumerKey = env('MPESA_CONSUMER_KEY');
            $consumerSecret = env('MPESA_CONSUMER_SECRET');

            if(!$consumerKey || !$consumerSecret) {
                throw new \Exception('Mpesa credentials not set in environment variables.');
            }

            // Generate access token
            $tokenResponse = Http::withBasicAuth($consumerKey, $consumerSecret)
                ->get('https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials');

            $accessToken = $tokenResponse->json()['access_token'] ?? null;

            if (!$accessToken) {
                throw new \Exception('Could not generate access token. Check your credentials.');
            }

            // Generate timestamp and password
            $timestamp = date('YmdHis');
            $password = base64_encode(env('MPESA_SHORTCODE') . env('MPESA_PASSKEY') . $timestamp);

            // Format phone number to 2547XXXXXXXX
            $phone = preg_replace('/^0/', '254', $request->phone);

            // Make STK Push request
            $response = Http::withToken($accessToken)->post(
                'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest',
                [
                    "BusinessShortCode" => env('MPESA_SHORTCODE'),
                    "Password" => $password,
                    "Timestamp" => $timestamp,
                    "TransactionType" => "CustomerPayBillOnline",
                    "Amount" => $request->amount,
                    "PartyA" => $phone,
                    "PartyB" => env('MPESA_SHORTCODE'),
                    "PhoneNumber" => $phone,
                    "CallBackURL" => env('MPESA_CALLBACK_URL'),
                    "AccountReference" => "FoundationDonation",
                    "TransactionDesc" => "Donation Payment"
                ]
            );

            return response()->json($response->json());

        } catch (\Exception $e) {
            Log::error('Mpesa Error: '.$e->getMessage());

            return response()->json([
                'error' => 'Mpesa request failed: '.$e->getMessage()
            ], 500);
        }
    }

    // Callback endpoint for Safaricom
    public function callback(Request $request)
    {
        Log::info('MPESA CALLBACK', $request->all());

        return response()->json([
            "ResultCode" => 0,
            "ResultDesc" => "Success"
        ]);
    }
}