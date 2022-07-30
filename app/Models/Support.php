<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function users() :BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }


}
