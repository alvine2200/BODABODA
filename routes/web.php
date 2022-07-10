<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModelsController;
use App\Http\Controllers\User\HomeController;

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

Route::any('/',[HomeController::class,'index']);
Route::any('login',[HomeController::class,'login_form']);
Route::any('register',[HomeController::class,'register_form']);
Route::any('models',[ModelsController::class,'models']);
Route::any('individual',[ModelsController::class,'individual']);
Route::any('apply',[ModelsController::class,'apply']);
Route::any('contact',[ModelsController::class,'contact']);
Route::post('contact_form',[ModelsController::class,'contact_form']);
Route::get('dashboard',[ModelsController::class,'dashboard']);
