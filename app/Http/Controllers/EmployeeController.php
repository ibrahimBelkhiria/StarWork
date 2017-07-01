<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees=Employee::Where('startup_id',auth()->user()->startup->id)->get();

        return view('employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'name'=>'required' ,
            'email'=>'required',
            'role'=>'required',
        ]);

        $employee=new Employee();
        $employee->name=$request->input('name');
        $employee->email=$request->input('email');
        $employee->role=$request->input('role');
        $employee->startup_id=auth()->user()->startup->id;
        $employee->save();
        return redirect('/startup/employee')->with('success','Employee Created');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('employee.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $this->validate($request,[
            'name'=>'required' ,
            'email'=>'required',
            'role'=>'required',
        ]);

        $employee=Employee::find($id);
        $employee->name=$request->input('name');
        $employee->email=$request->input('email');
        $employee->role=$request->input('role');

        $employee->save();
        return redirect('/startup/employee')->with('success','Employee updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return back();
    }
}
