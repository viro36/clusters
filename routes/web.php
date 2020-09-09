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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/clusters/add/{cluster}', 'ClusterController@add');

Route::get('/clusters/addcontract/{school_id}/{cluster_id}', 'ClusterController@addcontract');

Route::post('/clusters/addingprogram/{school_id}/{cluster_id}', 'ClusterController@addingprogram');

Route::get('/bids/add', 'BidController@add')->name('bids.add');

Route::post('/bids/adding', 'BidController@adding')->name('bids.adding');

Route::resource('bids', 'BidController');

Route::resource('clusters', 'ClusterController');

Route::get('/program/{id}', 'ProgramController@index');

Route::post('/program/{id}', 'ProgramController@add');

Route::get('/schedule/{id}', 'ScheduleController@index');

Route::get('/schedule/add/{schedule}', 'ScheduleController@approve');

Route::post('/schedule/{id}', 'ScheduleController@add');

Route::delete('/schedule/{schedule}', 'ScheduleController@delete');

Route::post('/region-clusters', 'RegionClusterController@store');

Route::get('/region-clusters/create', 'RegionClusterController@create');

Route::post('/region-clusters/addingprogram/{id}', 'RegionClusterController@addingprogram');

Route::get('/region-clusters/addcontract/{id}', 'RegionClusterController@addcontract');
