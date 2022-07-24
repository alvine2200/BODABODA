<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModelsController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\RiderController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\ForumsController;
use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Authentication\RegisterController;

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


Route::get('/',[HomeController::class,'index']);
Route::get('login',[HomeController::class,'login_form']);
Route::post('verify_user',[LoginController::class,'login_user']);
Route::get('register',[HomeController::class,'register_form']);
Route::post('post_user',[RegisterController::class,'store']);

Route::group(['middleware'=>'auth'],function(){
    //riders routes
    Route::any('logout',[LoginController::class,'logout_user']);
    Route::get('apply',[RiderController::class,'application']);
    Route::get('show/{id}',[RiderController::class,'show_application']);
    Route::post('post_application',[RiderController::class,'store_application']);
    Route::delete('delete_application/{id}',[RiderController::class,'delete_applications']);
    Route::resource('forums',ForumsController::class);
    Route::get('approve_forum/{id}',[ForumsController::class,'approve_forum']);
    Route::get('add_forums',[ForumsController::class,'add_forum']);

    //admin applications
    Route::get('dashboard',[AdminController::class,'dashboard']);
    Route::get('applications',[AdminController::class,'get_all_applications']);
    Route::get('approve_driving_school/{id}',[AdminController::class,'approve_driving_school_status']);
    Route::get('approve_generate_card/{id}',[AdminController::class,'approve_generate_card']);
    Route::get('view_application/{id}',[AdminController::class,'view_application']);
    Route::get('users_index',[AdminController::class,'users']);
    Route::delete('delete_user',[AdminController::class,'delete_users']);


    Route::any('models',[ModelsController::class,'models']);
    Route::any('individual',[ModelsController::class,'individual']);

    Route::any('contact',[ModelsController::class,'contact']);
    Route::post('contact_form',[ModelsController::class,'contact_form']);


});

