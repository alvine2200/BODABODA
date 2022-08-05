<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $table='transactions';

    protected $fillable=[
        'application_number',
        'user_id',
        'amount',
        'paid_by',
        'referrence_number',
        'status',
        'phone_number',
        'purpose',
        'date',
    ];

    public function applications() :BelongsTo
    {
        return $this->belongsTo(Application::class,'application_number','id');
    }

    public function users() :BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

}
