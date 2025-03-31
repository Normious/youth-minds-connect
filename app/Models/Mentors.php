<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentors extends Model
{
    /** @use HasFactory<\Database\Factories\MentorsFactory> */
    use HasFactory;
    
    protected $fillable = [
        'name',
        'email',
        'number',
        'description',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
