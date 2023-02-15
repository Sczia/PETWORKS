<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return view('Petworks.admin.doctor.index', compact('doctors'));
    }

    public function update(Request $request, $id)
    {
        $doctors = Doctor::findOrFail($id);
        $doctors->update(
            $request->all()
        );
        if ($doctors->wasChanged()) {
            toast()->success('Success', 'You saved changes')->autoClose(3000)->animation('animate__fadeInRight', 'animate__fadeOutRight')->width('400px');
            return redirect()->back();
        }
        toast()->info('Info', 'There is no changes')->autoClose(3000)->animation('animate__fadeInRight', 'animate__fadeOutRight')->width('400px');
        return redirect()->route('admin.doctor.index');
    }
}
