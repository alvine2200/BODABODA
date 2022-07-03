<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicationreport extends Model
{
    use HasFactory;

    protected $table='applicationreports';

    protected $fillable=[
        'application_id',
        'authorized_by',
        'time',
    ];
}
