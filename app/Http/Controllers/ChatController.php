<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Mail\Events\MessageSent;

class ChatController extends Controller
{
    /**
     * Show the chat interface for a specific conversation.
     *
     * @param  int  $conversationId
     * @return \Illuminate\View\View
     */
    public function showChat($conversationId)
    {
        $conversation = Conversation::findOrFail($conversationId);
        
        // Fetch previous messages for the conversation
        $messages = Message::where('conversation_id', $conversationId)
                            ->orderBy('created_at', 'asc')
                            ->get();

        return view('chat.show', [
            'conversation' => $conversation,
            'messages' => $messages,
        ]);
    }

    /**
     * Send a message within a conversation.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'conversation_id' => 'required|integer|exists:conversations,id',
        ]);

        // Create a new message
        $message = new Message();
        $message->conversation_id = $request->conversation_id;
        $message->user_id = Auth::id(); // Assuming the user is logged in
        $message->content = $request->message;
        $message->save();

        // Broadcast the message to other users in the conversation
        broadcast(new MessageSent($message))->toOthers();

        return response()->json(['status' => 'Message sent successfully']);
    }

    /**
     * Fetch messages for a conversation (useful for loading messages via AJAX).
     *
     * @param  int  $conversationId
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchMessages($conversationId)
    {
        $messages = Message::where('conversation_id', $conversationId)
                            ->orderBy('created_at', 'asc')
                            ->get();

        return response()->json($messages);
    }
}
