<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    use HasFactory;

    //indicates to table nurses
    protected $table = 'nurses';

    //fillable fields
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


    //Change first letter of first name to capital
    public function setFirstNameAttribute($value) {
        $this->attributes['first_name'] = ucfirst(strtolower($value));
    }

    //Change first letter of last name to capital
    public function setLastNameAttribute($value) {
        $this->attributes['last_name'] = ucfirst(strtolower($value));
    }
}
