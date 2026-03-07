<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event; // Make sure your Event model exists

class EventController extends Controller
{
    // List all events
    public function index()
    {
        $events = Event::all(); // fetch all events
        return view('events.index', compact('events'));
    }
}