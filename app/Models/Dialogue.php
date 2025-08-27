<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dialogue extends Model
{
    /** @use HasFactory<\Database\Factories\DialogueFactory> */
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the user that sent the message.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the chat that this message belongs to.
     */
    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }
}
