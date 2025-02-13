<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\appuserController;
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



Route::get('/',[appuserController::class,'index'])->name('AppUser.index');
Route::get('/home/login',[appuserController::class,'login'])->name('AppUser.login');
Route::get('/home/register',[appuserController::class,'register'])->name('AppUser.register');
Route::post('/home/add-user',[appuserController::class,'addUser'])->name('AppUser.addUser');
Route::post('/home',[appuserController::class,'verifyuser'])->name('AppUser.verifyuser');
Route::get('/home/dummy',[appuserController::class,'dummy'])->name('AppUser.dummy');