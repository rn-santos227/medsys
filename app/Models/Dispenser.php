<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispenser extends Model
{
    use HasFactory;
    
    protected $table = 'dispensers';

    protected $fillable = [
        'ref_code',
        'name',
        'medicine_id',
        'capacity',
        'ceiling',
        'notes',
        'active'
    ];
}
