<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingTransaction extends Model
{
    protected $fillable = [
        'user_id',
        'doctor_id',       
        'starter_at',
        'time_at',
        'status',
        'tax_total',
        'grand_total',
        'proof',
    ];

}
