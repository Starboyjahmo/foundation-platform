<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Donation;
use App\Models\Event;

class DashboardController extends Controller
{
    public function index()
    {
        // Total stats
        $totalMembers = User::count();
        $totalDonations = Donation::where('status', 'Completed')->sum('amount'); // only completed donations
        $totalEvents = Event::count();

        // Chart data (donations per month)
        $donationsByMonth = Donation::selectRaw('MONTH(created_at) as month, SUM(amount) as total')
            ->where('status', 'Completed') // only completed
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Recent donations for table
        $recentDonations = Donation::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalMembers',
            'totalDonations',
            'totalEvents',
            'donationsByMonth',
            'recentDonations'
        ));
    }
}