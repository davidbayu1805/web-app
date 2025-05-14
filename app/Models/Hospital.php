<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Hospital extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'photo',
        'about',
        'address',
        'phone',
        'city',
        'post_code',
    ];
    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
    public function specialists()
    {
        return $this->belongToMany(Specialist::class, 'hospital_specialist');
    }

    public function getPhotoAttribute($value)
    {
        if (!$value) {
            return null;
        }
        return url(Storage::url($value));
    }

}
