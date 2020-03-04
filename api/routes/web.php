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

Route::get('/department/getByDepartment/{department_id}',['uses'=>'DepartmentController@getByDepartment']);
Route::get('/department/getByCompany/{$company_id}',['uses'=>'DepartmentController@getByCompany']);
Route::get('/companies/getByCompany/{company_id}',['uses'=>'CompaniesController@getByCompany']);

