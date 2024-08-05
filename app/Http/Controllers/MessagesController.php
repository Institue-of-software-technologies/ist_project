<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\AlumniProfile;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $receivedMessages = Message::where('receiver_id', $user->id)->get();
        $sentMessages = Message::where('sender_id', $user->id)->get();

        // Get count of unread messages
        $unreadCount = $receivedMessages->where('is_read', false)->count();

        // Mark messages as read
        $receivedMessages->where('is_read', false)->each(function ($message) {
            $message->is_read = true;
            $message->save();
        });

        return view('messages.index', compact('receivedMessages', 'sentMessages', 'unreadCount'));
    }

    public function create($receiverId)
    {
        $receiver = AlumniProfile::where('user_id', $receiverId)->firstOrFail();
        return view('messages.create', compact('receiver'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);

        $message = new Message();
        $message->sender_id = Auth::id();
        $message->receiver_id = $request->receiver_id;
        $message->message = $request->message;
        $message->save();

        return redirect()->route('messages.index')->with('success', 'Message sent successfully.');
    }
}
