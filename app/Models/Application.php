<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $table='applications';

    protected $fillable=[
        'user_id',
        'application_number',
        'dob',
        'national_id_copy',
        'driving_school_certificate',
        'driving_school_status',
        'generate_card',
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
