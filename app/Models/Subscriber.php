<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $casts = [
        'subscribed_at' => 'datetime'
    ];

    protected $fillable = [
        'email',
        'subscribed_at'
    ];
}
