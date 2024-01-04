<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();
Route::get('/edit_employees/{id}', 'EmployeesController@edit');
Route::resource('nationality', 'NationalitiesController');
Route::resource('employees', 'EmployeesController');
Route::get('/companysDetails/{id}', 'CompanysDetailsController@edit');
Route::resource('companys', 'CompanysController');
Route::resource('careers', 'CareersController');
Route::resource('sections', 'SectionsController');
Route::resource('items', 'ItemsController');
Route::resource('CompanysAttachments', 'CompanysAttachmentsController');
Route::get('download/{company_number}/{file_name}', 'CompanysDetailsController@get_file');
Route::post('delete_file', 'CompanysDetailsController@destroy')->name('delete_file');
Route::get('View_file/{company_number}/{file_name}', 'CompanysDetailsController@open_file');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/{page}', 'AdminController@index');
