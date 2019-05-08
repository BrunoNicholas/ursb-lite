<?php

namespace App\Http\Controllers;

use App\Models\NoticeAct;
use Illuminate\Http\Request;

class NoticeActController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices = NoticeAct::latest()->paginate();
        return view('system.companies.notices.index',compact(['notices']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $notices = NoticeAct::latest()->paginate();
        return view('system.companies.notices.create',compact(['notices']));
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
     * @param  \App\Models\NoticeAct  $noticeAct
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notice = NoticeAct::find($id);
        return view('system.companies.notices.show',compact(['notice']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NoticeAct  $noticeAct
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notice = NoticeAct::find($id);
        return view('system.companies.notices.edit',compact(['notice']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NoticeAct  $noticeAct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NoticeAct  $noticeAct
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
