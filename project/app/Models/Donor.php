<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'availability_status',
        'last_donation_date',
    ];

    protected $casts = [
        'availability_status' => 'boolean',
        'last_donation_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
