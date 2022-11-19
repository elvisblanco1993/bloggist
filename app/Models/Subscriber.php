<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $casts = [
        'confirmed_at' => 'timestamp'
    ];

    protected $fillable = [
        'email'
    ];
}
