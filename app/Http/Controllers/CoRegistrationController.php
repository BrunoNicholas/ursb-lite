<?php

namespace App\Http\Controllers;

use App\Models\CoRegistration;
use Illuminate\Http\Request;

class CoRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registrations = CoRegistration::latest()->paginate();
        return view('system.companies.registrations.index',compact(['registrations']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $registrations = CoRegistration::latest()->paginate();
        return view('system.companies.registrations.create',compact(['registrations']));
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
     * @param  \App\Models\CoRegistration  $coRegistration
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $registration = CoRegistration::find($id);
        return view('system.companies.registrations.show',compact(['registration']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CoRegistration  $coRegistration
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registration = CoRegistration::find($id);
        return view('system.companies.registrations.edit',compact(['registration']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CoRegistration  $coRegistration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CoRegistration  $coRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
