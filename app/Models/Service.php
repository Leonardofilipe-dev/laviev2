<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'service';

    protected $fillable = [
        'users_id',
        'patient_id',
        'medical_record'

    ];

    use HasFactory;

    public function user()
{
    return $this->belongsTo(Users::class, 'users_id');
}

public function patient()
{
    return $this->belongsTo(Patient::class, 'patient_id');
}
}
