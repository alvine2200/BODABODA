<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reply extends Model
{
    use HasFactory;

    protected $table='replies';

    protected $fillable=[
        'user_id',
        'forum_id',
        'comment',
    ];

    public function forums() :BelongsTo
    {
        return $this->belongsTo(Forum::class, 'forum_id','id');
    }

    public function users() :BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
