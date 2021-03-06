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

Route::get('/home', 'HomeController@index');

Route::get('/', 'HomeController@index')->name('home');

Route::get('/clusters/add/{cluster}', 'ClusterController@add');

Route::get('/clusters/requestbaseschool/{user}', 'ClusterController@requestbaseschool');

Route::get('/clusters/addcontract/{school_id}/{cluster_id}', 'ClusterController@addcontract');

Route::post('/clusters/addingprogram/{school_id}/{cluster_id}', 'ClusterController@addingprogram');

Route::get('/clusters/addagreement/{cluster_id}', 'ClusterController@addagreement');

Route::post('/clusters/addingagreement/{cluster_id}', 'ClusterController@addingagreement');

Route::get('/bids/add', 'BidController@add')->name('bids.add');

Route::post('/bids/adding', 'BidController@adding')->name('bids.adding');

Route::get('/bids/createrc/{id}', 'BidController@createrc');

Route::post('/bids/storerc/{id}', 'BidController@storerc');

Route::resource('bids', 'BidController');

Route::resource('clusters', 'ClusterController');

Route::get('/clusters/addoneschool/{baseSchoolId}', 'ClusterController@addoneschool');

Route::delete('/bid/{bid}', 'BidController@delete');

Route::delete('/bid/{bid}/2', 'BidController@delete2');

Route::get('/bids/{bid}/update', 'BidController@show_update');

Route::put('/bids/{bid}/subject-update', 'BidController@update_subject');

Route::put('/bids/{bid}/modul-update', 'BidController@update_modul');

Route::put('/bids/{bid}/hours-update', 'BidController@update_hours');

Route::put('/bids/{bid}/class-update', 'BidController@update_class');

Route::put('/bids/{bid}/form_of_education-update', 'BidController@update_form_of_education');

Route::put('/bids/{bid}/form_education_implementation-update', 'BidController@update_form_education_implementation');

Route::put('/bids/{bid}/educational_program-update', 'BidController@update_educational_program');

Route::put('/bids/{bid}/educational_activity-update', 'BidController@update_educational_activity');

Route::put('/bids/{bid}/date_begin-update', 'BidController@update_date_begin');

Route::put('/bids/{bid}/date_end-update', 'BidController@update_date_end');

Route::put('/bids/{bid}/date_end-content', 'BidController@update_content');

Route::delete('/bids/{bid}/back-programs', 'BidController@back_programs');



Route::get('/program/{id}', 'ProgramController@index');

Route::get('/program/add/{program}', 'ProgramController@approve');

Route::post('/program/{id}', 'ProgramController@add');

Route::delete('/program/{program}', 'ProgramController@delete');



Route::get('/schedule/{id}', 'ScheduleController@index');

Route::get('/schedule/add/{schedule}', 'ScheduleController@approve');

Route::post('/schedule/{id}', 'ScheduleController@add');

Route::delete('/schedule/{schedule}', 'ScheduleController@delete');


Route::get('/student/{id}', 'StudentController@index');

// Route::get('/student/add/{student}', 'StudentController@approve');

Route::post('/student/{id}', 'StudentController@add');

Route::delete('/student/{student}', 'StudentController@delete');


Route::get('/agreement/{id}', 'AgreementController@index');

// Route::get('/student/add/{student}', 'StudentController@approve');

Route::post('/agreement/{id}', 'AgreementController@add');

Route::delete('/agreement/{agreement}', 'AgreementController@delete');


Route::post('/instruction/add', 'FileController@add');

Route::post('/public/add2', 'FileController@add2');


Route::get('export', 'ExcelRegionController@export')->name('export');

Route::get('export_mun', 'ExcelMunController@export')->name('export_mun');

Route::get('export_hours', 'ExcelRegionController@months_hours_export')->name('export_hours');

Route::get('export_hours_mun', 'ExcelMunController@months_hours_export')->name('export_hours_mun');

Route::get('export_h', 'ExcelRegionController@m_h_export')->name('export_h');

Route::get('export_h_mun', 'ExcelMunController@m_h_export')->name('export_h_mun');

Route::get('proposed_programs_export', 'ExcelRegionController@proposed_programs_export')->name('proposed_programs_export');

Route::get('selected_programs_export', 'ExcelRegionController@selected_programs_export')->name('selected_programs_export');

Route::get('proposed_programs_export_mun', 'ExcelMunController@proposed_programs_export')->name('proposed_programs_export_mun');

Route::get('selected_programs_export_mun', 'ExcelMunController@selected_programs_export')->name('selected_programs_export_mun');

Route::get('selected_export_hours', 'ExcelRegionController@selected_months_hours_export')->name('selected_export_hours');

Route::get('selected_export_hours_mun', 'ExcelMunController@selected_months_hours_export')->name('selected_export_hours_mun');

Route::get('selected_export_h', 'ExcelRegionController@selected_m_h_export')->name('selected_export_h');

Route::get('selected_export_h_mun', 'ExcelMunController@selected_m_h_export')->name('selected_export_h_mun');


Route::post('/region-clusters', 'RegionClusterController@store');

Route::get('/region-clusters/create', 'RegionClusterController@create');

Route::post('/region-clusters/addingprogram/{id}', 'RegionClusterController@addingprogram');

Route::get('/region-clusters/addcontract/{id}', 'RegionClusterController@addcontract');

Route::get('/user/approve/{user_id}', 'UserController@approve');

Route::get('/user/reject/{user_id}', 'UserController@reject');


Route::get('/users/org-list', 'UserController@show_users')->name('org_list');

Route::get('/users/{user_org}/show-org', 'UserController@show_user');

Route::put('/users/{user_org}/update-inn', 'UserController@update_inn');

Route::put('/users/{user_org}/update-add', 'UserController@update_add');

Route::put('/users/{user_org}/update-tel', 'UserController@update_tel');

Route::put('/users/{user_org}/update-email_real', 'UserController@update_email_real');

Route::put('/users/{user_org}/update-web', 'UserController@update_web');


Route::get('/users/{id}/org-list-mun', 'UserController@show_users_mun');


Route::get('/users/{org}/about-org', 'UserController@show_org');


Route::get('/months_hours/{id}', 'MonthsHourController@index');

Route::post('/months_hours/{id}', 'MonthsHourController@add');

Route::delete('/months_hours/{months_hour}', 'MonthsHourController@delete');

Route::get('/months_hours/{months_hour}/update', 'MonthsHourController@show_update');

Route::put('/months_hours/{months_hour}/real_1-update', 'MonthsHourController@update_real_1');

Route::put('/months_hours/{months_hour}/real_2-update', 'MonthsHourController@update_real_2');

Route::put('/months_hours/{months_hour}/real_3-update', 'MonthsHourController@update_real_3');

Route::put('/months_hours/{months_hour}/real_4-update', 'MonthsHourController@update_real_4');

Route::put('/months_hours/{months_hour}/real_5-update', 'MonthsHourController@update_real_5');

Route::put('/months_hours/{months_hour}/real_6-update', 'MonthsHourController@update_real_6');

Route::put('/months_hours/{months_hour}/real_7-update', 'MonthsHourController@update_real_7');

Route::put('/months_hours/{months_hour}/real_8-update', 'MonthsHourController@update_real_8');

Route::put('/months_hours/{months_hour}/real_9-update', 'MonthsHourController@update_real_9');

Route::put('/months_hours/{months_hour}/real_10-update', 'MonthsHourController@update_real_10');

Route::put('/months_hours/{months_hour}/real_11-update', 'MonthsHourController@update_real_11');

Route::put('/months_hours/{months_hour}/real_12-update', 'MonthsHourController@update_real_12');

Route::get('/months_hours/{months_hour}/update-rez', 'MonthsHourController@show_update_rez');

Route::get('/users/months-hours-list', 'MonthsHourController@show_hours')->name('hours_list');

Route::get('/months_hour/true1/{months_hour}', 'MonthsHourController@approve_1');

Route::get('/months_hour/true2/{months_hour}', 'MonthsHourController@approve_2');

Route::get('/months_hour/true3/{months_hour}', 'MonthsHourController@approve_3');

Route::get('/months_hour/true4/{months_hour}', 'MonthsHourController@approve_4');

Route::get('/months_hour/true5/{months_hour}', 'MonthsHourController@approve_5');

Route::get('/months_hour/true6/{months_hour}', 'MonthsHourController@approve_6');

Route::get('/months_hour/true7/{months_hour}', 'MonthsHourController@approve_7');

Route::get('/months_hour/true8/{months_hour}', 'MonthsHourController@approve_8');

Route::get('/months_hour/true9/{months_hour}', 'MonthsHourController@approve_9');

Route::get('/months_hour/true10/{months_hour}', 'MonthsHourController@approve_10');

Route::get('/months_hour/true11/{months_hour}', 'MonthsHourController@approve_11');

Route::get('/months_hour/true12/{months_hour}', 'MonthsHourController@approve_12');

Route::get('/months_hour/not1/{months_hour}', 'MonthsHourController@not_1');

Route::get('/months_hour/not2/{months_hour}', 'MonthsHourController@not_2');

Route::get('/months_hour/not3/{months_hour}', 'MonthsHourController@not_3');

Route::get('/months_hour/not4/{months_hour}', 'MonthsHourController@not_4');

Route::get('/months_hour/not5/{months_hour}', 'MonthsHourController@not_5');

Route::get('/months_hour/not6/{months_hour}', 'MonthsHourController@not_6');

Route::get('/months_hour/not7/{months_hour}', 'MonthsHourController@not_7');

Route::get('/months_hour/not8/{months_hour}', 'MonthsHourController@not_8');

Route::get('/months_hour/not9/{months_hour}', 'MonthsHourController@not_9');

Route::get('/months_hour/not10/{months_hour}', 'MonthsHourController@not_10');

Route::get('/months_hour/not11/{months_hour}', 'MonthsHourController@not_11');

Route::get('/months_hour/not12/{months_hour}', 'MonthsHourController@not_12');

Route::get('/months_hours/{months_hour}/inf', 'MonthsHourController@show_inf');


Route::get('/proposed/add', 'ProposedController@add')->name('proposed.add');

Route::post('/proposed/adding', 'ProposedController@adding')->name('proposed.adding');

Route::get('/proposed_programs/{proposed_program}/update', 'ProposedController@show_update');

Route::delete('/proposed_programs/{proposed_program}/delete', 'ProposedController@delete_proposed');

Route::put('/proposed_programs/{proposed_program}/subject-update', 'ProposedController@update_subject');

Route::put('/proposed_programs/{proposed_program}/modul-update', 'ProposedController@update_modul');

Route::put('/proposed_programs/{proposed_program}/hours-update', 'ProposedController@update_hours');

Route::put('/proposed_programs/{proposed_program}/class-update', 'ProposedController@update_class');

Route::put('/proposed_programs/{proposed_program}/form_of_education-update', 'ProposedController@update_form_of_education');

Route::put('/proposed_programs/{proposed_program}/form_education_implementation-update', 'ProposedController@update_form_education_implementation');

Route::put('/proposed_programs/{proposed_program}/educational_program-update', 'ProposedController@update_educational_program');

Route::put('/proposed_programs/{proposed_program}/educational_activity-update', 'ProposedController@update_educational_activity');

Route::put('/proposed_programs/{proposed_program}/date_begin-update', 'ProposedController@update_date_begin');

Route::put('/proposed_programs/{proposed_program}/date_end-update', 'ProposedController@update_date_end');

Route::put('/proposed_programs/{proposed_program}/content-update', 'ProposedController@update_content');


Route::post('/selected_programs/{id}', 'SelectedProgramController@take');

Route::get('/selected_programs/{selected_program}/show', 'SelectedProgramController@show');

Route::delete('/selected_programs/{selected_program}/delete', 'SelectedProgramController@delete');


Route::get('/selected_schedule/{id}', 'SelectedScheduleController@index');

Route::get('/selected_schedule/add/{selected_schedule}', 'SelectedScheduleController@approve');

Route::post('/selected_schedule/{id}', 'SelectedScheduleController@add');

Route::delete('/selected_schedule/{selected_schedule}', 'SelectedScheduleController@delete');


Route::get('/selected_student/{id}', 'SelectedStudentController@index');

Route::post('/selected_student/{id}', 'SelectedStudentController@add');

Route::delete('/selected_student/{selected_student}', 'SelectedStudentController@delete');


Route::get('/selected_agreement/{id}', 'SelectedAgreementController@index');

Route::post('/selected_agreement/{id}', 'SelectedAgreementController@add');

Route::delete('/selected_agreement/{selected_agreement}', 'SelectedAgreementController@delete');


Route::get('/selected_months_hours/{id}', 'SelectedMonthsHourController@index');

Route::post('/selected_months_hours/{id}', 'SelectedMonthsHourController@add');

Route::delete('/selected_months_hours/{selected_months_hour}', 'SelectedMonthsHourController@delete');

Route::get('/selected_months_hours/{selected_months_hour}/update', 'SelectedMonthsHourController@show_update');

Route::put('/selected_months_hours/{selected_months_hour}/real_1-update', 'SelectedMonthsHourController@update_real_1');

Route::put('/selected_months_hours/{selected_months_hour}/real_2-update', 'SelectedMonthsHourController@update_real_2');

Route::put('/selected_months_hours/{selected_months_hour}/real_3-update', 'SelectedMonthsHourController@update_real_3');

Route::put('/selected_months_hours/{selected_months_hour}/real_4-update', 'SelectedMonthsHourController@update_real_4');

Route::put('/selected_months_hours/{selected_months_hour}/real_5-update', 'SelectedMonthsHourController@update_real_5');

Route::put('/selected_months_hours/{selected_months_hour}/real_6-update', 'SelectedMonthsHourController@update_real_6');

Route::put('/selected_months_hours/{selected_months_hour}/real_7-update', 'SelectedMonthsHourController@update_real_7');

Route::put('/selected_months_hours/{selected_months_hour}/real_8-update', 'SelectedMonthsHourController@update_real_8');

Route::put('/selected_months_hours/{selected_months_hour}/real_9-update', 'SelectedMonthsHourController@update_real_9');

Route::put('/selected_months_hours/{selected_months_hour}/real_10-update', 'SelectedMonthsHourController@update_real_10');

Route::put('/selected_months_hours/{selected_months_hour}/real_11-update', 'SelectedMonthsHourController@update_real_11');

Route::put('/selected_months_hours/{selected_months_hour}/real_12-update', 'SelectedMonthsHourController@update_real_12');

Route::get('/selected_months_hours/{selected_months_hour}/update-rez', 'SelectedMonthsHourController@show_update_rez');

Route::get('/users/selected-months-hours-list', 'MonthsHourController@show_hours')->name('selected_hours_list');

Route::get('/selected_months_hour/true1/{selected_months_hour}', 'SelectedMonthsHourController@approve_1');

Route::get('/selected_months_hour/true2/{selected_months_hour}', 'SelectedMonthsHourController@approve_2');

Route::get('/selected_months_hour/true3/{selected_months_hour}', 'SelectedMonthsHourController@approve_3');

Route::get('/selected_months_hour/true4/{selected_months_hour}', 'SelectedMonthsHourController@approve_4');

Route::get('/selected_months_hour/true5/{selected_months_hour}', 'SelectedMonthsHourController@approve_5');

Route::get('/selected_months_hour/true6/{selected_months_hour}', 'SelectedMonthsHourController@approve_6');

Route::get('/selected_months_hour/true7/{selected_months_hour}', 'SelectedMonthsHourController@approve_7');

Route::get('/selected_months_hour/true8/{selected_months_hour}', 'SelectedMonthsHourController@approve_8');

Route::get('/selected_months_hour/true9/{selected_months_hour}', 'SelectedMonthsHourController@approve_9');

Route::get('/selected_months_hour/true10/{selected_months_hour}', 'SelectedMonthsHourController@approve_10');

Route::get('/selected_months_hour/true11/{selected_months_hour}', 'SelectedMonthsHourController@approve_11');

Route::get('/selected_months_hour/true12/{selected_months_hour}', 'SelectedMonthsHourController@approve_12');

Route::get('/selected_months_hour/not1/{selected_months_hour}', 'SelectedMonthsHourController@not_1');

Route::get('/selected_months_hour/not2/{selected_months_hour}', 'SelectedMonthsHourController@not_2');

Route::get('/selected_months_hour/not3/{selected_months_hour}', 'SelectedMonthsHourController@not_3');

Route::get('/selected_months_hour/not4/{selected_months_hour}', 'SelectedMonthsHourController@not_4');

Route::get('/selected_months_hour/not5/{selected_months_hour}', 'SelectedMonthsHourController@not_5');

Route::get('/selected_months_hour/not6/{selected_months_hour}', 'SelectedMonthsHourController@not_6');

Route::get('/selected_months_hour/not7/{selected_months_hour}', 'SelectedMonthsHourController@not_7');

Route::get('/selected_months_hour/not8/{selected_months_hour}', 'SelectedMonthsHourController@not_8');

Route::get('/selected_months_hour/not9/{selected_months_hour}', 'SelectedMonthsHourController@not_9');

Route::get('/selected_months_hour/not10/{selected_months_hour}', 'SelectedMonthsHourController@not_10');

Route::get('/selected_months_hour/not11/{selected_months_hour}', 'SelectedMonthsHourController@not_11');

Route::get('/selected_months_hour/not12/{selected_months_hour}', 'SelectedMonthsHourController@not_12');

Route::get('/selected_months_hours/{selected_months_hour}/inf', 'SelectedMonthsHourController@show_inf');


