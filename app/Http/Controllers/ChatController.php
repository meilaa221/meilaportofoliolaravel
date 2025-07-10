<?php

namespace App\Http\Controllers;

use App\Models\ChatSession;
use App\Models\ChatMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChatController extends Controller
{
    public function startChat(Request $request)
    {
        if (!auth()->check()) {
            return response()->json([
                'success' => false,
                'error' => 'Authentication required'
            ], 401);
        }

        $user = auth()->user();
        
        // Check if user already has an active chat session
        $existingSession = $user->activeChatSession;
        
        if ($existingSession) {
            return response()->json([
                'success' => true,
                'session_id' => $existingSession->session_id,
                'message' => 'Continuing existing chat session',
                'existing' => true
            ]);
        }

        $sessionId = Str::uuid();

        $chatSession = ChatSession::create([
            'user_id' => $user->id,
            'visitor_name' => $user->name,
            'visitor_email' => $user->email,
            'session_id' => $sessionId,
        ]);

        // Send welcome message
        ChatMessage::create([
            'chat_session_id' => $chatSession->id,
            'message' => 'Hello ' . $user->name . '! How can I help you today?',
            'sender_type' => 'admin',
            'sender_name' => 'Dian Gita Meilani',
        ]);

        return response()->json([
            'success' => true,
            'session_id' => $sessionId,
            'message' => 'Chat started successfully!',
            'existing' => false
        ]);
    }

    public function sendMessage(Request $request)
    {
        if (!auth()->check()) {
            return response()->json([
                'success' => false,
                'error' => 'Authentication required'
            ], 401);
        }

        try {
            $request->validate([
                'session_id' => 'required|exists:chat_sessions,session_id',
                'message' => 'required|string|max:1000',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'error' => 'Validation failed',
                'details' => $e->errors()
            ], 422);
        }

        $user = auth()->user();
        $chatSession = ChatSession::where('session_id', $request->session_id)
            ->where('user_id', $user->id)
            ->first();

        if (!$chatSession) {
            return response()->json([
                'success' => false,
                'error' => 'Chat session not found or unauthorized'
            ], 404);
        }

        try {
            ChatMessage::create([
                'chat_session_id' => $chatSession->id,
                'message' => $request->message,
                'sender_type' => 'visitor',
                'sender_name' => $user->name,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Message sent successfully!'
            ]);
        } catch (\Exception $e) {
            \Log::error('Error creating chat message: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'error' => 'Failed to save message'
            ], 500);
        }
    }

    public function getMessages($sessionId)
    {
        if (!auth()->check()) {
            return response()->json([
                'success' => false,
                'error' => 'Authentication required'
            ], 401);
        }

        $user = auth()->user();
        $chatSession = ChatSession::where('session_id', $sessionId)
            ->where('user_id', $user->id)
            ->first();

        if (!$chatSession) {
            return response()->json(['error' => 'Session not found or unauthorized'], 404);
        }

        $messages = $chatSession->messages()->orderBy('created_at', 'asc')->get();

        return response()->json([
            'success' => true,
            'messages' => $messages
        ]);
    }

    public function getUserChatStatus()
    {
        if (!auth()->check()) {
            return response()->json([
                'authenticated' => false,
                'active_session' => null
            ]);
        }

        $user = auth()->user();
        $activeSession = $user->activeChatSession;

        return response()->json([
            'authenticated' => true,
            'user_name' => $user->name,
            'active_session' => $activeSession ? $activeSession->session_id : null
        ]);
    }
}
