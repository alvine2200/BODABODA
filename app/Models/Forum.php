<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    protected $table='forums';

    protected $fillable=[
        'user_id',
        'topic',
        'subtopic',
        'image',
        'body',
        'time',
        'status',
    ];
}
