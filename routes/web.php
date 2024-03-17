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

Route::get('/test',function(){
  return view('email.message');
});

// Route::get('/job','JobController@searchjobs');
Route::get('/jobs','JobController@searchjobs');

Route::post('/send-message','UserController@sendmessage');
Route::post('/apply-as-ur-user','JobController@applyas_uruser');
Route::get('/unregistered/my-vacancy/{token}','JobController@unreg_jobs');
Route::get('/delete-job/{token}','JobController@deletejob');
Route::get('/','Controller@index');
Route::get('/contact','Controller@contact');
Route::get('/job/{id}','JobController@jobdetails');
Route::get('/add-vacancy','JobController@addvacancy');
Route::post('/add-new-vacancy','JobController@addjob');
Route::get('/r/{id}','ResumeController@getresume');
Route::post('/send-resume-message','ResumeController@sendmess');
Route::post('/activate-vacancy/{id}','JobController@act_job');


// Route::post('/filter-jobs','JobController@getjobsearchdata');
Route::post('/get-more-jobs','JobController@getmorejob');
Route::post('/check-res-un-avaliability','ResumeController@checkresus');


Route::get('/location/{id}/{reg}/vacancies','JobController@location_jobs');
Route::get('/job-type/{type}','JobController@jobtype');
Route::get('/user/{us}/vacancies','JobController@user_vacancies');
Route::get('/company/{comp}/vacancies','JobController@comp_vacancies');

Route::post('/apply-for-job','JobController@applyforjob');
Route::get('/myresumes-list','JobController@myres_list');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/all-resumes','ResumeController@allresumes');
    Route::get('/my-resume/{id}','ResumeController@myresume');
    Route::get('/job-applications','JobController@jobapps');
    Route::get('/my-requests','ResumeController@myreqs');
    Route::get('/start/resume/personal-information','ResumeController@addresume');
    Route::get('/start/resume/education','ResumeController@addresume');
    Route::get('/start/resume/experience','ResumeController@addresume');
    Route::post('/create-resume','ResumeController@addnewresume');
    Route::post('/create-resume-education','ResumeController@addeducation');
    Route::post('/create-resume-experience','ResumeController@addexperience');
    Route::get('/change-password','UserController@changepassword');
    Route::post('/change-pass','UserController@changepass');

    Route::post('/upload-resume-image','ResumeController@addresimg');
    Route::post('/edit-resume/{id}','ResumeController@editresume');

    Route::get('/job-request/cancel/{id}','JobController@deletejob_request');
    Route::post('/hide-resume/{id}','ResumeController@hideres');
    Route::post('/show-resume/{id}','ResumeController@showres');

    Route::post('/hide-vacancy/{id}','JobController@hideres');
    Route::post('/show-vacancy/{id}','JobController@showres');

    Route::post('/add-new-skill','ResumeController@addskill');
    Route::get('/skill/delete/{id}','ResumeController@deleteskill');

    Route::post('/edit-user-profile','UserController@edituser');
    Route::get('/account-settings','UserController@acc_settings');
    Route::get('/all-vacancies','JobController@all_my_vacancies');
    Route::post('/add-social-network','ResumeController@addsocnet');
    Route::get('/socnet/delete/{id}','ResumeController@deletesocnet');

    Route::post('/delete/resume/{id}','ResumeController@deleteresume');
    Route::get('/education/delete/{id}','ResumeController@deletedu');
    Route::get('/experience/delete/{id}','ResumeController@deletexp');
});


Route::get('sendbasicemail','Controller@basic_email');
Route::get('sendhtmlemail','Controller@html_email');
Route::get('sendattachmentemail','Controller@attachment_email');

Route::group(['middleware' => 'auth'], function () {

});

Auth::routes();
Route::get('{id}','ResumeController@getresume');
