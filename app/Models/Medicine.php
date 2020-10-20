<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
    protected $table = 'medicines';

    protected $fillable = [
        'ref_code',
        'name',
        'middle_name',
        'generic_name',
        'measurement',
        'expiration',
        'active'
    ];
}
