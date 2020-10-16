<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    use HasFactory;
    protected $table = 'nurses';
    protected $fillable = [
        'ref_code',
        'first_name',
        'middle_name',
        'last_name',
        'address',
        'email',
        'contact',
        'notes',
        'active'
    ];


    public function setFirstNameAttribute($value) {
        $this->attributes['first_name'] = ucfirst(strtolower($value));
    }

    public function setLastNameAttribute($value) {
        $this->attributes['last_name'] = ucfirst(strtolower($value));
    }
}
