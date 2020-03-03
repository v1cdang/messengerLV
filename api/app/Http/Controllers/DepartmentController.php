<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Resources\Department as DepartmentResource;
use App\Department;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new DepartmentResource(Department::all());
    }
   /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new DepartmentResource(Department::FindOrFail($id));
    }

}
