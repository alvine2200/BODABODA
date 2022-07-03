<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generated_card extends Model
{
    use HasFactory;

    protected $table='generated_cards';

    protected $fillable=[
        'user_id',
        'application_id',
        'date',
    ];
}
