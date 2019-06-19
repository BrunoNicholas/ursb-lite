<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::latest()->paginate();
        return view('system.departments.index',compact(['departments']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::latest()->paginate();
        return view('system.departments.create',compact(['departments']));
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
            'name'      => 'required',
            'created_by'     => 'required',
            'status' => 'required',

        ]);
        Department::create($request->all());

        return redirect()->route('departments.index')->with('success','System Department Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = Department::find($id);
        if (!$department) {
            return redirect()->route('departments.index')->with('danger', 'Department Not Found!');
        }
        return view('system.departments.show', compact(['department']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::find($id);
        $departments = Department::all();
        if (!$department) {
            return redirect()->route('departments.index')->with('danger', 'Department Not Found!');
        }
        return view('system.departments.edit', compact(['department','departments']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'name'      => 'required',
            'created_by'     => 'required',
            'status' => 'required',
        ]);
        Department::find($id)->update($request->all());

        return redirect()->route('departments.index')->with('success','Role Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::find($id);
        $department->delete();

        return redirect()->route('departments.index')->with('danger', 'Department Deleted Successfully');
    }
}
