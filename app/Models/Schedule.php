<?php

namespace App\Models;

use App\Models\Nurse;
//imports task assignment model
use App\Models\TaskAssignment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    //indicates schedule table from database.
    protected $table = 'schedule';

    //fillable fields of schedule
    protected $fillable = [
        'ref_code',
        'task_id',
        'days',
        'schedule',
        'notes',
        'answered',
        'sent_count',
        'active'
    ];

    //get the accompanying Task from the Task Assignment model
    public function getTask() {
        $task = TaskAssignment::where('id', $this->task_id)->first();
        return $task;
    }

    //Function that converts the number array into days of the week.
    public function getSchedule() {
        $days = str_split($this->days);
        $days_word = '';

        foreach($days as $day) {
            switch(intval($day)) {
                case 0: $days_word = $days_word . "Sunday "; break;
                case 1: $days_word = $days_word . "Monday "; break;
                case 2: $days_word = $days_word . "Tuesday "; break;
                case 3: $days_word = $days_word . "Wednesday "; break;
                case 4: $days_word = $days_word . "Thursday "; break;
                case 5: $days_word = $days_word . "Friday "; break;
                case 6: $days_word = $days_word . "Saturday "; break;
            }
        }

        return $days_word;
    }
}
