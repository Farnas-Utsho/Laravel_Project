<?php


use App\Http\Controllers\issue_table;
use App\Http\Controllers\loginController;
use App\Http\Controllers\User_controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\SolutionController;
use App\Http\Controllers\StudentSolutionView;
use App\Http\Controllers\teacherHome;
use App\Http\Controllers\teacherRequest;

//login
Route::get('/', function () {
    return view('login');
 })->name('login');
 Route::post('/validate', [loginController::class, 'login'])->name('check');
//password reset


Route::get('/forgot-password', [ResetPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ResetPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');



//student Home
Route::get('/home/{id}', [User_controller::class, 'show'])->name('home');

//Student problem entry
Route::get('/st_time/{teacher_id}/{user_id}',[issue_table::class,'teacher_routine'])->name('pro');
Route::post('/add_info', [issue_table::class, 'problem'])->name('info');
 //Studnet solution page
 Route::get('/solution/{user_id}',[SolutionController::class,'show_reqlist'])->name('st_solution');
 Route::get('/delete/{user_id}/{teacher_id}/{problem_id}',[SolutionController::class,'delete'])->name('delete');
//Student Meet link  page
Route::get('/stu_meet/{user_id}',[SolutionController::class,'show_student_meetlist'])->name("student_meetlist");
//Student Solution_view
Route::get('/student_solution_view/{user_id}/{teacher_id}/{problem_id}',[StudentSolutionView::class,'show_solution_view'])->name('show_solution');
//  Route::get('/student_solution_view', function () {
//      return view('student_solution');
//  });



                                    //Teacher Part
//Teacher Home
// Route::get('/teacher', function () {
//     return view('teacher_home');
//  });
 Route::get('/teacher/{t_id}',[teacherhome::class,'teacher_routine'])->name('teacher');




//Teacher_reqst
// Route::get('/teach', function () {
//     return view('teacher_request');
//  });
 Route::get('/request/{user_id}',[teacherRequest::class,'show_reqlist'])->name('request_list');
Route::get('/show_reqst/{user_id}/{student_id}/{problem_id}',[teacherRequest::class,'show_req'])->name('show_reqst');
Route::get('/delete_reqst/{user_id}/{student_id}/{problem_id}',[teacherRequest::class,'delete'])->name('del_reqst');

//Teacher Solution
Route::get('/problem_statement/{user_id}/{student_id}/{problem_id}', [teacherRequest::class, 'show_req'])->name('problem');

Route::get('/update/{user_id}/{student_id}/{problem_id}',[teacherRequest::class,'sol_view'])->name('solution_form');
Route::post('/update',[teacherRequest::class,'solution'])->name('solution');
//Show meet Link
Route::get('/meet/{user_id}',[teacherRequest::class,'show_meetlist'])->name('meet');
