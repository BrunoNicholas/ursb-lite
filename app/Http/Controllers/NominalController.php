<?php

namespace App\Http\Controllers;

use App\Models\Nominal;
use Illuminate\Http\Request;

class NominalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nominals = Nominal::latest()->paginate();
        return view('system.companies.nominals.index',compact(['nominals']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nominals = Nominal::latest()->paginate();
        return view('system.companies.nominals.create',compact(['nominals']));
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
     * @param  \App\Models\Nominal  $nominal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nominal = Nominal::find($id);
        return view('system.companies.nominals.show',compact(['nominal']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nominal  $nominal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nominal = Nominal::find($id);
        return view('system.companies.nominals.edit',compact(['nominal']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nominal  $nominal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nominal  $nominal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
