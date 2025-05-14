<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class BookingTransaction extends Model
{

    use softDeletes;

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

    protected $casts = [
        'starter_at' => 'date',
        'time_at' => 'datetime:H:i:s',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function getProofsAttribute($value)
    {
        if (!$value) {
            return null;
        }
        return url(Storage::url($value));
    }
}
