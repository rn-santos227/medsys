<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    //Indicates table patients
    protected $table = 'patients';

    //Fillable fields for patients
    protected $fillable = [
        'ref_code',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'contact',
        'home_address',
        'notes',
        'priority',
        'active'
    ];

    //capitalized first letter of first name
    public function setFirstNameAttribute($value) {
        $this->attributes['first_name'] = ucfirst(strtolower($value));
    }

    //capitalized first letter of middle name
    public function setMiddleNameAttribute($value) {
        $this->attributes['middle_name'] = ucfirst(strtolower($value));
    }

    //capitalized first letter of last name
    public function setLastNameAttribute($value) {
        $this->attributes['last_name'] = ucfirst(strtolower($value));
    }
}

