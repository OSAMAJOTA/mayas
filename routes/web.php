<?php

use App\Http\Controllers\DurationController;
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
    return view('loglog.login');
});

Auth::routes();

Route::resource('wakel', 'WakelController');
Route::resource('call', 'CallCenterController');
Route::resource('agents', 'AgentsController');
Route::resource('offers', 'OffersController');
Route::get('add_offer', 'OffersController@addoffer');

Route::resource('forword', 'forword_controller');
Route::resource('block', 'block_agents');
Route::resource('unbloock', 'unblock');
Route::resource('vist', 'vist_controller');

Route::get('/rent_cont/{id}/{agent_name}/{agent_id}/{agent_phone}', 'RentControllerController@index');
Route::get('/contract/{id}/{agent_name}/{agent_id}/{agent_phone}', 'ContractController@index');



Route::get('wait_forword', 'AgentsController@forword');
Route::get('agents_block', 'AgentsController@block');


Route::get('contact_agent', 'AgentsController@contact');
Route::get('/call_center/{id}', 'CallCenterController@edit');
Route::resource('nationality', 'NationalitiesController');
Route::resource('employees', 'EmployeesController');
Route::resource('emp_groups', 'EmpGroupsController');
Route::resource('companys', 'CompanysController');

Route::resource('Durations', 'DurationController');
Route::get('/Duration/{id}', 'DurationController@getcost');

Route::resource('report_agents', 'AgentsReportController');
Route::post('Search_report', 'AgentsReportController@Search_report');

Route::resource('groups', 'GroupsController');
Route::resource('careers', 'CareersController');
Route::resource('sections', 'SectionsController');
Route::resource('items', 'ItemsController');

Route::get('/Details_groups/{id}/{groups_name}', 'GroupsController@index');
Route::get('/agents_edit/{id}', 'AgentsController@edit');
Route::resource('CompanysAttachments', 'CompanysAttachmentsController');
Route::get('/companysDetails/{id}', 'CompanysDetailsController@edit');
Route::get('/AgentsDetails/{id}', 'AgentsDetailsController@edit');
Route::get('ReadNotification/{id}','AgentsDetailsController@ReadNotification')->name('ReadNotification');

Route::get('/edit_companys/{id}', 'CompanysController@edit');
Route::get('/edit_employees/{id}', 'EmployeesController@edit');
Route::get('download/{company_number}/{file_name}', 'CompanysDetailsController@get_file');
Route::post('delete_file', 'CompanysDetailsController@destroy')->name('delete_file');
Route::get('View_file/{company_number}/{file_name}', 'CompanysDetailsController@open_file');

Route::get('MarkAsRead_all','AgentsController@MarkAsRead_all')->name('MarkAsRead_all');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');

});

Route::get('online-user', [UserController::class, 'online']);
Route::get('Export_agents', 'AgentsController@export');

Route::get('/{page}', 'AdminController@index');
