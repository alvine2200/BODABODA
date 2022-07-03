<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactionreport extends Model
{
    use HasFactory;

    protected $table='transactionreports';

    protected $fillable=[
        'transaction_id',
        'authorized_by', //admin
        'time',
        'total',
    ];

    public function transactions()
    {
        return $this->belongsTo(Transaction::class);
    }
}
