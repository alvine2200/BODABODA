<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function applications()
    {
        return $this->belongsTo(Application::class);
    }

    public function transactionreports()
    {
        return $this->hasMany(Transactionreport::class);
    }
}
