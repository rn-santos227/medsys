<?php

namespace App\Console\Commands;

use App\Models\Schedule;
use Carbon\Carbon;
use Nexmo;


use Illuminate\Console\Command;

class SendMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:message';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send SMS to Nurses';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $schedules = Schedule::where([
            ['days', 'like', '%' . Carbon::now()->dayOfWeek . '%'],
            ['active', 1]
        ])->get();

        $current_time = Carbon::parse(Carbon::now())->format('H:i:s');

        $parsed = date_parse($current_time);
        $current_seconds = $parsed['hour'] * 3600 + $parsed['minute'] * 60 + $parsed['second'];

        echo $current_seconds;
        foreach($schedules as $schedule) {
            $parsed = date_parse(Carbon::parse($schedule->schedule));
        
            $scheduled_seconds = $parsed['hour'] * 3600 + $parsed['minute'] * 60 + $parsed['second'];
           
        
            echo $scheduled_seconds . ' ';
            if($current_seconds >= $scheduled_seconds && $current_seconds <= $scheduled_seconds+3600) {
              
                Nexmo::message()->send([
                    'to'   => $schedule->getTask()->getNurseContact(),
                    'from' => 'Medicine System',
                    'text' => 'Patient: '. $schedule->getTask()->getPatientName() .' scheduled for medicine, please proceed to the dispenser '.  $schedule->getTask()->getDispenserName().'.'
                ]);
                $sent_count = $schedule->sent_count;
                $schedule->update([
                    'sent_count' => $sent_count + 1 
                ]);
            } else {
                $schedule->update([
                    'answered' => 0,
                    'sent_count' => 0
                ]);
            }
        }

        return 0;
    }
}
