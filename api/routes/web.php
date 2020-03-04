<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//get specific department
Route::get('/department/getEmployeesByDepartment/{department_id}',['uses'=>'DepartmentController@getEmployeesByDepartment']);
//get department by company
Route::get('/companies/getDepartmentByCompany/{company_id}',['uses'=>'CompaniesController@getDepartmentByCompany']);
//get employees by company
Route::get('/companies/getEmployeesByCompany/{company_id}',['uses'=>'CompaniesController@getByCompany']);

