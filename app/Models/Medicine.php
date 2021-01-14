<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    //indicates belongs to medcine table.
    protected $table = 'medicines';

    //fillable fields.
    protected $fillable = [
        'ref_code',
        'name',
        'generic_name',
        'brand',
        'measurement',
        'expiration',
        'active'
    ];
}
