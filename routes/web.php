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
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});


//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});
Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/backend', 'BackendController@index')->name('backend');
//-----------------------------faculty ----------------------------------------
Route::get('faculty', ['uses' =>'BackendController@faculty','middleware' => 'roles','roles'=>'superadmin'])->name('faculty');
Route::post('faculty', ['uses' =>'BackendController@postfaculty','middleware' => 'roles','roles'=>'superadmin'])->name('faculty');
Route::get('edit_faculty/{id}', ['uses' =>'BackendController@edit_faculty','middleware' => 'roles','roles'=>'superadmin'])->name('edit_faculty');

Route::post('update_faculty', ['uses' =>'BackendController@update_faculty','middleware' => 'roles','roles'=>'superadmin'])->name('update_faculty');
//------------------------------ sub admin ----------------------------------
Route::get('sub_admin', ['uses' =>'BackendController@sub_admin','middleware' => 'roles','roles'=>'superadmin'])->name('sub_admin');
Route::post('sub_admin', ['uses' =>'BackendController@post_sub_admin','middleware' => 'roles','roles'=>'superadmin'])->name('sub_admin');
Route::get('edit_sub_admin/{id}', ['uses' =>'BackendController@edit_sub_admin','middleware' => 'roles','roles'=>'superadmin'])->name('edit_sub_admin');
Route::post('update_sub_admin', ['uses' =>'BackendController@update_sub_admin','middleware' => 'roles','roles'=>'superadmin'])->name('update_sub_admin');

//------------------------------ department ------------------------------------

Route::get('department', ['uses' =>'BackendController@department','middleware' => 'roles','roles'=>'superadmin'])->name('department');
Route::post('department', ['uses' =>'BackendController@postdepartment','middleware' => 'roles','roles'=>'superadmin'])->name('department');
Route::get('edit_department/{id}', ['uses' =>'BackendController@edit_department','middleware' => 'roles','roles'=>'superadmin'])->name('edit_department');

Route::post('update_department', ['uses' =>'BackendController@update_department','middleware' => 'roles','roles'=>'superadmin'])->name('update_department');
//------------------------------------aos ---------------------------------------------------------------

Route::get('aos', ['uses' =>'BackendController@aos','middleware' => 'roles','roles'=>'superadmin'])->name('aos');
Route::post('aos', ['uses' =>'BackendController@postaos','middleware' => 'roles','roles'=>'superadmin'])->name('aos');
Route::get('view_aos', ['uses' =>'BackendController@view_aos','middleware' => 'roles','roles'=>'superadmin'])->name('view_aos');

Route::get('edit_aos/{id}', ['uses' =>'BackendController@edit_aos','middleware' => 'roles','roles'=>'superadmin'])->name('edit_aos');

Route::post('update_aos', ['uses' =>'BackendController@update_aos','middleware' => 'roles','roles'=>'superadmin'])->name('update_aos');

Route::get('/depart/{id}', ['uses' =>'BackendController@getDepartment']);

//-------------------------- price -----------------------------------------------
Route::get('price', ['uses' =>'BackendController@price','middleware' => 'roles','roles'=>'superadmin'])->name('price');
Route::post('price', ['uses' =>'BackendController@post_price','middleware' => 'roles','roles'=>'superadmin'])->name('price');
//========================== assign officer=========================================================
Route::get('assignofficer', ['uses' =>'BackendController@assignofficer','middleware' => 'roles','roles'=>'superadmin'])->name('assignofficer');
Route::post('assignofficer', ['uses' =>'BackendController@post_assignofficer','middleware' => 'roles','roles'=>'superadmin'])->name('assignofficer');
Route::get('view_assignofficer', ['uses' =>'BackendController@view_assignofficer','middleware' => 'roles','roles'=>'superadmin'])->name('view_assignofficer');
Route::get('remove_ao/{id}', ['uses' =>'BackendController@remove_ao','middleware' => 'roles','roles'=>'superadmin'])->name('remove_ao');
Route::get('/fos/{id}', ['uses' =>'BackendController@getFos']);
//==============================admin status ============================================================
Route::get('adminstatus', ['uses' =>'BackendController@adminstatus','middleware' => 'roles','roles'=>'superadmin'])->name('adminstatus');
Route::get('edit_sub_admin/{id}', ['uses' =>'BackendController@edit_sub_admin','middleware' => 'roles','roles'=>'superadmin'])->name('edit_sub_admin');
Route::get('activate_sub_admin/{id}', ['uses' =>'BackendController@activate_sub_admin','middleware' => 'roles','roles'=>'superadmin'])->name('activate_sub_admin');
Route::get('deactivate_sub_admin/{id}', ['uses' =>'BackendController@deactivate_sub_admin','middleware' => 'roles','roles'=>'superadmin'])->name('deactivate_sub_admin');
Route::get('editright_sub_admin/{id}', ['uses' =>'BackendController@editright_sub_admin','middleware' => 'roles','roles'=>'superadmin'])->name('editright_sub_admin');

//==========================================do======================================================
//=============================courses ===============================================================
Route::get('createcourse', ['uses' =>'DoController@createcourse','middleware' => 'roles','roles'=>'do'])->name('createcourse');
Route::post('createcourse', ['uses' =>'DoController@post_createcourse','middleware' => 'roles','roles'=>'do'])->name('createcourse');
Route::get('viewcourse', ['uses' =>'DoController@viewcourse','middleware' => 'roles','roles'=>'do'])->name('viewcourse');
Route::get('view_course', ['uses' =>'DoController@view_course','middleware' => 'roles','roles'=>'do'])->name('view_course');
Route::get('edit_course/{id}', ['uses' =>'DoController@edit_course','middleware' => 'roles','roles'=>'do'])->name('edit_course');
Route::get('delete_course/{id}', ['uses' =>'DoController@delete_course','middleware' => 'roles','roles'=>'do'])->name('delete_course');
Route::post('update_course', ['uses' =>'DoController@update_course','middleware' => 'roles','roles'=>'do'])->name('update_course');
Route::get('registercourses', ['uses' =>'DoController@registercourses','middleware' => 'roles','roles'=>'do'])->name('registercourses');
Route::get('register_courses', ['uses' =>'DoController@register_courses','middleware' => 'roles','roles'=>'do'])->name('register_courses');
Route::post('register_courses_p', ['uses' =>'DoController@post_register_courses','middleware' => 'roles','roles'=>'do'])->name('register_courses_p');
Route::get('viewregistercourses', ['uses' =>'DoController@viewregistercourses','middleware' => 'roles','roles'=>'do'])->name('viewregistercourses');
Route::get('view_register_courses', ['uses' =>'DoController@view_register_courses','middleware' => 'roles','roles'=>'do'])->name('view_register_courses');
Route::get('waved_couese', ['uses' =>'DoController@waved_couese','middleware' => 'roles','roles'=>'do'])->name('waved_couese');
Route::get('waved_couese1', ['uses' =>'DoController@waved_couese1','middleware' => 'roles','roles'=>'do'])->name('waved_couese1');
Route::get('setup_waved_course/{id}/{s}/{d}/{a}', ['uses' =>'DoController@setup_waved_course','middleware' => 'roles','roles'=>'do'])->name('setup_waved_course');
Route::get('setwavedcourse/{id}/{w}', ['uses' =>'DoController@setwavedcourse','middleware' => 'roles','roles'=>'do'])->name('setwavedcourse');
Route::get('c_paper', ['uses' =>'DoController@c_paper','middleware' => 'roles','roles'=>'do'])->name('c_paper');
Route::get('c_paper1', ['uses' =>'DoController@c_paper1','middleware' => 'roles','roles'=>'do'])->name('c_paper1');
Route::get('enter_c_paper/{id}', ['uses' =>'DoController@enter_c_paper','middleware' => 'roles','roles'=>'do'])->name('enter_c_paper');
Route::post('enter_c_paper', ['uses' =>'DoController@post_enter_c_paper','middleware' => 'roles','roles'=>'do'])->name('enter_c_paper');
Route::get('/getassigndepartment/{id}', ['uses' =>'DoController@getassigndepartment']);

//=============================students===============================================================
Route::get('createstudents', ['uses' =>'DoController@createstudents','middleware' => 'roles','roles'=>'do'])->name('createstudents');
Route::post('createstudents', ['uses' =>'DoController@post_createstudents','middleware' => 'roles','roles'=>'do'])->name('createstudents');
Route::get('viewstudents', ['uses' =>'DoController@viewstudents','middleware' => 'roles','roles'=>'do'])->name('viewstudents');
Route::get('view_students', ['uses' =>'DoController@view_students','middleware' => 'roles','roles'=>'do'])->name('view_students');
Route::get('edit_students/{id}', ['uses' =>'DoController@edit_students','middleware' => 'roles','roles'=>'do'])->name('edit_students');
Route::get('delete_students/{id}', ['uses' =>'DoController@delete_students','middleware' => 'roles','roles'=>'do'])->name('delete_students');
Route::post('update_students', ['uses' =>'DoController@update_students','middleware' => 'roles','roles'=>'do'])->name('update_students');
Route::get('re_students_courses', ['uses' =>'DoController@re_students_courses','middleware' => 'roles','roles'=>'do'])->name('re_students_courses');
Route::get('re_students_courses2', ['uses' =>'DoController@re_students_courses2','middleware' => 'roles','roles'=>'do'])->name('re_students_courses2');
Route::post('re_students_courses3', ['uses' =>'DoController@re_students_courses3','middleware' => 'roles','roles'=>'do'])->name('re_students_courses3');
Route::get('view_students_courses', ['uses' =>'DoController@view_students_courses','middleware' => 'roles','roles'=>'do'])->name('view_students_courses');
Route::get('view_students_courses2', ['uses' =>'DoController@view_students_courses2','middleware' => 'roles','roles'=>'do'])->name('view_students_courses2');
Route::get('remove_registration/{id}/{session}/{p}/{d}/{a}/{Y?}', ['uses' =>'DoController@remove_registration','middleware' => 'roles','roles'=>'do']);
Route::get('enter_result/{id}', ['uses' =>'DoController@enter_result','middleware' => 'roles','roles'=>'do']);
Route::post('insert_result', ['uses' =>'DoController@insert_result','middleware' => 'roles','roles'=>'do'])->name('insert_result');
//---------------------------- report ---------------------------------------------------
Route::get('report', ['uses' =>'DoController@report','middleware' => 'roles','roles'=>'do'])->name('report');
Route::get('generatereport', ['uses' =>'DoController@postreport','middleware' => 'roles','roles'=>'do']);
Route::get('/getassignaos/{id}', ['uses' =>'DoController@getassignaos']);
Route::get('generate_individual_report', ['uses' =>'DoController@generate_individual_report','middleware' => 'roles','roles'=>'do'])->name('generate_individual_report');


//========================== role to=========================================================
Route::get('new_applicant', ['uses' =>'ToController@index','middleware' => 'roles','roles'=>'to'])->name('new_applicant');
Route::get('treated_applicant', ['uses' =>'ToController@treated_applicant','middleware' => 'roles','roles'=>'to'])->name('treated_applicant');
Route::get('more_detail/{id}', ['uses' =>'ToController@more_detail','middleware' => 'roles','roles'=>'to'])->name('more_detail');
Route::get('treated/{id}', ['uses' =>'ToController@treated','middleware' => 'roles','roles'=>'to'])->name('treated');
Route::get('treated_detail/{id}', ['uses' =>'ToController@treated_detail','middleware' => 'roles','roles'=>'to'])->name('treated_detail');
Route::get('generate_transcript/{id}', ['uses' =>'ToController@generate_transcript','middleware' => 'roles','roles'=>'to'])->name('generate_transcript');

//---------------------------- students ----------------------------------------
Route::get('application', ['uses' =>'HomeController@application']);
Route::post('old_application', ['uses' =>'HomeController@old_application'])->name('old_application');
Route::post('preview_application', ['uses' =>'HomeController@preview_application'])->name('preview_application');
Route::get('preview_application', ['uses' =>'HomeController@preview_application'])->name('preview_application');
Route::get('track_transcript', ['uses' =>'HomeController@track_transcript']);
Route::post('track_transcript', ['uses' =>'HomeController@post_track_transcript'])->name('track_transcript');
Route::post('submit_application', ['uses' =>'PaymentController@index'])->name('submit_application');
Route::get('verify/{reference}', ['uses' =>'PaymentController@verify']);
Route::get('payment_status', ['uses' =>'PaymentController@status']);
Route::get('/getaos/{id}', ['uses' =>'HomeController@getaos']);
Route::get('/getdepart/{id}', ['uses' =>'HomeController@getdepart']);
Route::get('/guide', ['uses' =>'HomeController@guide']);
Route::get('logout',['uses' =>'Auth\LoginController@logout']);