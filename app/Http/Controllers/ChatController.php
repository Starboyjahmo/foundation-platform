<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;

class ChatController extends Controller
{
    public function index()
    {
        $messages = Chat::latest()->take(50)->get();
        return view('chat', compact('messages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        Chat::create($request->only('user_name','message'));

        return redirect()->back();
    }
}