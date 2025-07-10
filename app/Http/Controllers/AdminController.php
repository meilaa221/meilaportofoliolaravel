<?php

namespace App\Http\Controllers;

use App\Models\ChatSession;
use App\Models\ChatMessage;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalChats = ChatSession::count();
        $activeChats = ChatSession::where('status', 'active')->count();
        $unreadMessages = ChatMessage::where('sender_type', 'visitor')
            ->where('is_read', false)->count();

        return view('admin.dashboard', compact('totalChats', 'activeChats', 'unreadMessages'));
    }

    public function chatIndex()
    {
        $chatSessions = ChatSession::with(['user', 'latestMessage', 'unreadMessages'])
            ->orderBy('updated_at', 'desc')
            ->paginate(20);

        return view('admin.chat.index', compact('chatSessions'));
    }

    public function chatShow(ChatSession $session)
    {
        $session->load('user');
        $messages = $session->messages()->orderBy('created_at', 'asc')->get();

        // Mark visitor messages as read
        $session->messages()
            ->where('sender_type', 'visitor')
            ->where('is_read', false)
            ->update(['is_read' => true]);

        return view('admin.chat.show', compact('session', 'messages'));
    }

    public function chatReply(Request $request, ChatSession $session)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        ChatMessage::create([
            'chat_session_id' => $session->id,
            'message' => $request->message,
            'sender_type' => 'admin',
            'sender_name' => auth()->user()->name,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Reply sent successfully!'
        ]);
    }

    public function chatClose(ChatSession $session)
    {
        $session->update(['status' => 'closed']);

        return response()->json([
            'success' => true,
            'message' => 'Chat session closed successfully!'
        ]);
    }
}
