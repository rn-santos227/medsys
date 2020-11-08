<?php

namespace App\Models;

use App\Models\Nurse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $table = 'schedule';
    protected $fillable = [
        'task_id',
        'days',
        'schedule',
        'notes',
        'active'
    ];

    public function getTask() {
        $task = Task::where('id', $this->task_id)->first();
        return $task;
    }
}
