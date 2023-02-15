<?php

namespace App\Http\Controllers;

use App\Exports\ExportDailyTransaction;
use App\Exports\UsersExport;
use App\Models\Daily;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DailyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daylies = Daily::with('appointment')->whereDay('created_at','=',now()->format('d'))->whereMonth('created_at','=',now()->format('m'))->get();
        return view('Petworks.admin.inventory.daily.index', compact('daylies'));
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
     * @param  \App\Models\Daily  $daily
     * @return \Illuminate\Http\Response
     */
    public function show(Daily $daily)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Daily  $daily
     * @return \Illuminate\Http\Response
     */
    public function edit(Daily $daily)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Daily  $daily
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Daily $daily)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Daily  $daily
     * @return \Illuminate\Http\Response
     */
    public function destroy(Daily $daily)
    {
        //
    }

    public function download()
    {
        $daylies = Daily::with('appointment')->whereDay('created_at','=',now()->format('d'))->whereMonth('created_at','=',now()->format('m'))->get();
        return view('Petworks.admin.inventory.daily.modal._pdf',compact('daylies'));
    }

    public function export()
    {
        return Excel::download(new ExportDailyTransaction, 'daily.xlsx');
    }
}
