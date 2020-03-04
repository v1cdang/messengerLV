<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Resources\Companies as CompaniesResource;
use App\Companies;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new CompaniesResource(Companies::all());
    }
    public function getEmployeesByCompany($company_id)
    {
        $employees = Companies::find($company_id)->employee;
        return $employees;
    }
    public function getDepartmentByCompany($company_id)
    {
        $department = Companies::find($company_id)->department;
        return $department;
    }
}
