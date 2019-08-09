<?php

namespace App\Http\Controllers;

use App\Models\NameReservation;
use Illuminate\Http\Request;

class NameReservationController extends Controller
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
        $reservations   = NameReservation::latest()->paginate();
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
        request()->validate([
            'name_choice_1'      => ['required', 'unique:name_reservations'],
            'name_choice_2'      => ['unique:name_reservations'],
            'name_choice_3'      => ['unique:name_reservations'],

        ]);
        NameReservation::create($request->all());

        return redirect()->route('reservation.index')->with('success','Name reserved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NameReservation  $nameReservation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation = NameReservation::find($id);
        if (!$reservation) {
            return redirect()->route('system.companies.reservations.index')->with('danger', 'Name reservation not found!');
        }
        return view('system.companies.reservations.show',compact(['reservation']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NameReservation  $nameReservation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservation = NameReservation::find($id);
        if (!$reservation) {
            return redirect()->route('system.companies.reservations.index')->with('danger', 'Name reservation not found!');
        }
        return view('system.companies.reservations.edit',compact(['reservation']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NameReservation  $nameReservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'name_choice_1'      => 'required',
        ]);
        NameReservation::find($id)->update($request->all());
        return redirect()->route('reservation.index')->with('success','Reservation updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NameReservation  $nameReservation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item   = NameReservation::find($id);
        $item->delete();
        return redirect()->route('reservation.index')->with('danger','Reservation deleted successfully!');
    }
}
