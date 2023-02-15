<?php

namespace App\Console\Commands;

use App\Mail\Reminder;
use App\Models\Appointment;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Nexmo\Laravel\Facade\Nexmo;

class sendReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'to remind client';

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
        $this->output->title('Starting Reminder');
        $appointments = Appointment::where('next_visit', '>=', now()->startOfMonth())
            ->where('next_visit', '<=', now()->endOfMonth())
            ->get();

        foreach ($appointments as $appointment) {
            $data = [
                'name' => $appointment->owner->name,
                'pet_name' => $appointment->pet->pet_name,
                'date' => $appointment->next_visit,
            ];
       $response = Nexmo::message()->send([
                'to'   => "63" . Str::substr($appointment->owner->number, 1, 10),
                'from' => '09361681322',
                'text' => "Good Day  ".$data['name'].". This is Petworks Veterinary Clinic, please be reminded of your schedule today  ".date('F d, Y',strtotime($data['date']))." for follow up check up for ". $data['pet_name']." . "
            ]);
            Mail::to($appointment->owner->email)->send(new Reminder($data));
        }
        $this->output->success('Reminder sent');
    }
}
