<?php

namespace App\Events;

use App\Models\Dialogue; // Changed from App\Models\Message
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow; // Or ShouldBroadcast
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatMessageSent implements ShouldBroadcastNow // Or ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Dialogue $dialogue;

    /**
     * Create a new event instance.
     * @param \App\Models\Dialogue $dialogue
     * @return void
     */
    public function __construct(Dialogue $dialogue)
    {
        $this->dialogue = $dialogue;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('chat.' . $this->dialogue->chat_id),
        ];
    }

    /**
     * Get the data to broadcast.
     *
     * @return array<string, mixed>
     */
    public function broadcastWith(): array
    {
        return [
            'id' => $this->dialogue->id,
            'content' => $this->dialogue->message, // Assumes 'message' field holds the text content
            'chat_id' => $this->dialogue->chat_id,
            'user_id' => $this->dialogue->user_id,
            'created_at' => $this->dialogue->created_at->toIso8601String(),
            'user' => $this->dialogue->user ? [
                'id' => $this->dialogue->user->id,
                'name' => $this->dialogue->user->name,
            ] : null,
        ];
    }

    /**
     * The event's broadcast name.
     *
     * @return string
     */
    // public function broadcastAs(): string
    // {
    //     return 'chat.message.sent'; // Optional: if you want a custom event name on client-side
    // }
}
