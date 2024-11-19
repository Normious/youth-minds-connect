<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $fillable = ['name', 'description', 'date', 'date_from', 'date_to'];
}
