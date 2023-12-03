<?php


use App\Http\Controllers\issue_table;
use App\Http\Controllers\loginController;
use App\Http\Controllers\User_controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResetPasswordController;

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
Route::get('/st_time/{teacher_id}/{user_id}',[issue_table::class,'teacher_routine'])->name('problem');
Route::post('/add_info', [issue_table::class, 'problem'])->name('info');
 //Studnet solution page
 Route::get('/solution', function () {
    return view('solution');
 });




