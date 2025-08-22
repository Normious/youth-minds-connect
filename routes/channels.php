<?php

use Illuminate\Support\Facades\Broadcast;
use App\Models\Chat;
use App\Models\User; // Added for type hinting
use Illuminate\Support\Facades\Auth; // This might not be needed anymore with the new logic

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

// Add this for the chat functionality:
// The channel name must exactly match what's returned by event's `broadcastOn()`
// and what client-side Echo is subscribing to.
// If ChatMessageSent->broadcastOn() returns `new PrivateChannel('chat.' . $this->message->conversation_id)`
// and $this->message->conversation_id is the ID of the Chat model instance.
Broadcast::channel('chat.{chatId}', function (User $user, $chatId) {
    $chat = Chat::with('mentor')->find($chatId);

    if (!$chat) {
        return false;
    }

    // Check if the authenticated user is the direct user_id on the chat
    if ($user->id === $chat->user_id) {
        return true;
    }

    // Check if the authenticated user is the user associated with the mentor on the chat
    if ($chat->mentor && $user->id === $chat->mentor->user_id) {
        return true;
    }

    return false;
});
