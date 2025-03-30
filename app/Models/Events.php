<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Events extends Model
{
    use HasFactory;

    protected $casts = [
        'date_from' => 'date',
        'date_to' => 'date',
    ];
    protected $fillable = ['name', 'description', 'date_from', 'date_to', 'location', 'image'];
}
