<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Resources\Employee as EmployeeResource;
use App\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        return new EmployeeResource(Employee::all());
    }
   /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new EmployeeResource(Employee::FindOrFail($id));
    }
}
