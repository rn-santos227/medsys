<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $table = 'patients';
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

    public function setFirstNameAttribute($value) {
        $this->attributes['first_name'] = ucfirst(strtolower($value));
    }

    public function setMiddleNameAttribute($value) {
        $this->attributes['middle_name'] = ucfirst(strtolower($value));
    }

    public function setLastNameAttribute($value) {
        $this->attributes['last_name'] = ucfirst(strtolower($value));
    }
}
