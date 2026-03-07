<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;

class DonationController extends Controller
{
    // Show donation form
    public function index()
    {
        $donations = Donation::latest()->get(); // for optional dashboard table
        return view('donate', compact('donations'));
    }

    // Handle form submission
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'amount' => 'required|numeric|min:1',
            'payment_method' => 'required|string',
        ]);

        Donation::create([
            'name' => $request->name,
            'email' => $request->email,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'status' => 'Pending',
        ]);

        return redirect()->route('donate.index')
            ->with('success', 'Donation recorded! Follow the instructions to complete your payment.');
    }

    // Optional: mark as paid (admin)
    public function markPaid(Donation $donation)
    {
        $donation->update(['status' => 'Completed']);
        return redirect()->back()->with('success', 'Payment marked as Completed.');
    }
}