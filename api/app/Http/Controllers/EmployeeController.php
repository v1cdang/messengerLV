<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Resources\Employee as EmployeeResource;
use App\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display a listing of the resource by department_id
     *
     * @return \Illuminate\Http\Response
     */
    public function getByDepartment($department_id)
    {
        $employees = Employee::with('department_id');
        return $employees->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getByCompany($company_id)
    {
        $employees = Employee::with('company_id');
        return $employees->get();
    }

    public function getByCompanyAndDepartment($company_id, $department_id)
    {
        $employees = Employee::where(['company_id' => $company_id, 'department_id' => $department_id]);
        return $employees->get();
    }

}
