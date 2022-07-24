<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Forum extends Model
{
    use HasFactory;

    protected $table='forums';

    protected $fillable=[
        'user_id',
        'slug',
        'topic',
        'subtopic',
        'image',
        'body',
        'time',
        'status',
    ];

    public function users() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
