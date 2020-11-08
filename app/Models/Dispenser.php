<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Medicine;

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
        'critical',
        'maintenance',
        'notes',
        'active'
    ];

    public function getMedicineName() {
        if($this->medicine_id != 0) {
            $medicine = Medicine::where('id', $this->medicine_id)->first();
            return $medicine->name;
        }
        else return "No Medicine";
    }

}
