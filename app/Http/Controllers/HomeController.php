<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Donation;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::latest()->take(3)->get();

        $totalMembers = User::count();
        $totalDonations = Donation::sum('amount');
        $totalEvents = Event::count();

        return view('home', compact('events', 'totalMembers', 'totalDonations', 'totalEvents'));
    }
}