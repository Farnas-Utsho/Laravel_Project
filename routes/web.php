<?php

use App\Http\Controllers\login;
use App\Http\Controllers\User_controller;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', [User_controller::class, 'show'])->name('home');
// Route::get('/', [User_controller::class, 'profile']);
Route::get('/log/{id}/{pass}', [login::class, 'log'])->name('log');
Route::get('/in', function () {
    return view('login');
});
Route::get('/login', function () {
    return view('login');
});
Route::view('/res','reset');
