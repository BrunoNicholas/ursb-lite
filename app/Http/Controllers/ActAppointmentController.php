<?php

namespace App\Http\Controllers;

use App\Models\ActAppointment;
use Illuminate\Http\Request;

class ActAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = NameReservation::latest()->paginate();
        return view('system.companies.reservations.index',compact(['reservations']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reservations = NameReservation::latest()->paginate();
        return view('system.companies.reservations.create',compact(['reservations']));
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
     * @param  \App\Models\ActAppointment  $actAppointment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation = NameReservation::find($id);
        return view('system.companies.reservations.show',compact(['reservation']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ActAppointment  $actAppointment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservation = NameReservation::find($id);
        return view('system.companies.reservations.edit',compact(['reservation']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ActAppointment  $actAppointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ActAppointment  $actAppointment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
