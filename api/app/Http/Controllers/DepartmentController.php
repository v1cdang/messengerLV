<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Resources\Department as DepartmentResource;
use App\Http\Resources\Employee as EmployeeResource;
use App\Department;
use App\Company;
use App\Employee;


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
    public function getByDepartment($department_id)
    {
        $employees = Department::find($department_id)->employee;
        return $employees;
    }
    public function getByCompany($company_id)
    {
        $department = Department::find($company_id)->company;
        return $department;
    }

}
