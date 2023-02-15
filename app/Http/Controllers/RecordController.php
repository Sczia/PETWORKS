<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Record::all();
        return view('Petworks.admin.records.index', compact('records'));
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
        Record::create(
            $request->all()
        );
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function show(Record $record)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function edit(Record $record)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $records = Record::findOrFail($id);
        $records->update(
            [

                'complaint' => $request->input('complaint'),
                'weight' => $request->input('weight'),
                'hr' => $request->input('hr'),
                'rr' => $request->rr('date'),
                'temperature' => $request->input('temperature'),
                'diet' => $request->input('diet'),
                'next_visit' => $request->input('next_visit'),
                'history' => $request->history('date'),
                'prescription' => $request->input('temperature'),
                'comment' => $request->input('comment'),
            ]
        );
        if ($records->wasChanged()) {
            toast()->success('Success', 'You saved changes')->autoClose(3000)->animation('animate__fadeInRight', 'animate__fadeOutRight')->width('400px');
            return redirect()->back();
        }
        toast()->info('Info', 'There is no changes')->autoClose(3000)->animation('animate__fadeInRight', 'animate__fadeOutRight')->width('400px');
        return redirect()->route('admin.product.update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function destroy(Record $record)
    {
        //
    }
}
