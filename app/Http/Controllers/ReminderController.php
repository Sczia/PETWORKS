<?php

namespace App\Http\Controllers;

use App\Mail\Reminder;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Nexmo\Laravel\Facade\Nexmo;
use Illuminate\Support\Str;

class ReminderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
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
            toast()->success('Success', 'Success! You sent a reminder')->autoClose(3000)->animation('animate__fadeInRight', 'animate__fadeOutRight')->width('400px');
            return redirect()->back();
        } catch (\Throwable $th) {
            toast()->warning('Info', $th->getMessage())->autoClose(3000)->animation('animate__fadeInRight', 'animate__fadeOutRight')->width('400px');
            return redirect()->back();;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
