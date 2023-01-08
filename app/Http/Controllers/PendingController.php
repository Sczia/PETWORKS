<?php

namespace App\Http\Controllers;

use App\Models\pending;
use App\Mail\ConfirmController as MailConfirmController;
use App\Http\Controllers\Controller;
use App\Mail\Pending as MailPending;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\PendingMail;
use Illuminate\Support\Facades\Auth;

class PendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendings = Appointment::where('status', '=', 'pending')->orderBy('created_at','ASC')->get();
        return view('Petworks.admin.appointment.pending.index', compact('pendings'));
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
     * @param  \App\Models\pending  $pending
     * @return \Illuminate\Http\Response
     */
    public function show(pending $pending)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pending  $pending
     * @return \Illuminate\Http\Response
     */
    public function edit(pending $pending)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pending  $pending
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $appointment = Appointment::where('id', '=', $id)->firstOrFail();
            $appointment->update(['status' => 'confirmed']);
            $details = [
                'name' => $appointment->owner->name,
                'date' => $appointment->date,
                'time' => $appointment->time,
                'email' =>  $appointment->owner->email,
                'number' => $appointment->owner->number,
                'address' => $appointment->owner->address,
            ];
            Mail::to($appointment->owner->email)->send(new MailConfirmController($details));  /* email */
            toast()->success('Success', 'You accepted the request')->autoClose(3000)->animation('animate__fadeInRight', 'animate__fadeOutRight')->width('400px');
            return redirect()->route('admin.confirm.index');
        } catch (\Throwable $th) {
            toast()->warning('Warning', $th->getMessage())->autoClose(3000)->animation('animate__fadeInRight', 'animate__fadeOutRight')->width('400px');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pending  $pending
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {
            $appointment = Appointment::where('id', '=', $id)->firstOrFail();
            $appointment->update(['status'=>'cancelled','cancelled_by'=>'Admin']);
            $data = [
                'message' => 'Sorry, but the appointment that you booked has been canceled for the reason that the clinic gave you excess time for waiting time and you agreed to the terms and conditions.'
            ];
            Mail::to($appointment->owner->email)->send(new MailPending($data));
            toast()->warning('Warning', 'The request is cancel')->autoClose(3000)->animation('animate__fadeInRight', 'animate__fadeOutRight')->width('400px');
            return redirect(route('admin.cancel.index'));
        } catch (\Throwable $th) {
            toast()->warning('Warning', $th->getMessage())->autoClose(3000)->animation('animate__fadeInRight', 'animate__fadeOutRight')->width('400px');
            return back();
        }
    }
}
