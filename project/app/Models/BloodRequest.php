<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'patient_name',
        'blood_group',
        'city',
        'hospital',
        'urgency',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
