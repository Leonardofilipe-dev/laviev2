<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{

    protected $table = 'patient';

    protected $fillable = [
        'name',
        'age',
        'description'

    ];
    use HasFactory;
    public function services()
{
    return $this->hasMany(Service::class, 'patient_id');
}
}
