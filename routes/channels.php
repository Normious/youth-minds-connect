<?php

use Illuminate\Support\Facades\Broadcast;
use App\Models\Chat; // Assuming Chat model is used for conversations
use Illuminate\Support\Facades\Auth; // If using Auth::check()

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
Broadcast::channel('chat.{chatId}', function ($user, $chatId) {
    // $user is the authenticated user.
    // $chatId is the ID from the channel name (e.g., 'chat.123' -> $chatId = 123).

    // Option 1: Simplest permissive rule for testing (if auth is generally working)
    // This allows any authenticated user to listen to any chat channel.
    // WARNING: Not secure for production.
    // return Auth::check();

    // Option 2: More secure - check if the user is part of this specific chat.
    // This requires your Chat model to have a way to verify participation.
    $chat = Chat::find($chatId);
    if ($chat) {
        // Example: Assuming Chat model has 'user_id' and 'mentor_id' fields
        // or a participants() relationship.
        // This is a placeholder, actual logic depends on your Chat model structure.
        // Replace with your actual authorization logic.
        // For instance, if Chat model has user_id and professional_id (assuming these are FKs to users table)
        // return $user->id === $chat->user_id || $user->id === $chat->professional_id;

        // If Chat model has a many-to-many 'participants' relationship:
        // return $chat->participants()->where('user_id', $user->id)->exists();

        // For now, let's use a relatively permissive rule assuming the chat model has user_id and mentor_id
        // and these are direct foreign keys to the users table.
        // This will need adjustment based on the actual Chat model structure.
        // If the Chat model links a user to a mentor, and these are stored in user_id and mentor_id
        // where mentor_id is also a user_id.
        // This is a common pattern but needs verification against the Mentors model and Chat model relations.
        // For the sake of this subtask, we'll assume a simple check:
        // if the user is involved in the chat.
        // Let's assume the Chat model has a `user_id` (creator/client) and `mentor_id` (the professional).
        // And that `Mentors` model has a `user_id` linking it to a `User`.
        // The `Chat` model links `user_id` to a `User` and `mentor_id` to a `Mentors` record.
        // So, to check if the `$user->id` matches `chat->user_id` OR if `$user->id` matches `chat->mentor->user_id`.

        // Given the previous subtask for MentorsController, `Mentors` has a `user_id`.
        // Chat model has `user_id` and `mentor_id` (FK to mentors.id).
        // So, to check if the current user is the `user_id` on chat, or the user associated with `mentor_id` on chat:
        $mentor = $chat->mentor; // Assuming 'mentor' is the relationship name for Mentors model in Chat model.
                                 // From Chat.php: public function mentor() { return $this->belongsTo(Mentors::class); } - so $chat->mentor is correct.
        if ($mentor && $user->id === $mentor->user_id) {
            return true;
        }
        if ($user->id === $chat->user_id) {
            return true;
        }
        return false; // Default deny if not involved.
    }
    return false; // Chat not found.
});
