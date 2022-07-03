<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;

    protected $table='supports';

    protected $fillable=[
        'user_id',
        'ticket_number',
        'subject',
        'message',
        'photo',
        'status',
        'time_sent',
        'reply',
        'time_replied',
    ];
}
