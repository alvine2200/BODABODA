<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DompdfController;
use App\Http\Controllers\ModelsController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\RiderController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\ForumsController;
use App\Http\Controllers\User\LicenseController;
use App\Http\Controllers\User\CommentsController;
use App\Http\Controllers\Transactions\MpesaController;
use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Authentication\RegisterController;
use App\Http\Controllers\Authentication\AuthenticationController;
use App\Http\Controllers\Authentication\ForgotPasswordController;


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
Route::get('post/{slug}',[HomeController::class,'show_post']);
Route::post('submit_comment/{id}',[CommentsController::class,'store']);
Route::any('logout',[LoginController::class,'logout_user']);

Route::get('forget-password', [ForgotPasswordController::class, 'ForgetPassword'])->name('ForgetPasswordGet');
Route::post('forget-password', [ForgotPasswordController::class, 'ForgetPasswordStore'])->name('ForgetPasswordPost');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'ResetPassword'])->name('ResetPasswordGet');
Route::post('reset-password', [ForgotPasswordController::class, 'ResetPasswordStore'])->name('ResetPasswordPost');



Route::group(['middleware'=>'auth'],function(){
    //profile.html
    Route::controller(AuthenticationController::class)->group(function(){
            Route::get('profile','index');
            Route::any('add_avatar','post_avatar');
            Route::any('edit_profile','update_profile');
            Route::post('change_password','change_password');
    });

    Route::get('license/{id}',[LicenseController::class,'index']);
    Route::get('generate-pdf/{id}',[DompdfController::class,'index']);
    Route::get('view-pdf/{id}',[DompdfController::class,'show']);

    //riders routes

    Route::get('apply',[RiderController::class,'application']);
    Route::get('show/{id}',[RiderController::class,'show_application']);
    Route::post('post_application',[RiderController::class,'store_application']);
    Route::get('delete_application/{id}',[RiderController::class,'delete_applications']);
    Route::resource('forums',ForumsController::class);
    Route::get('approve_forum/{id}',[ForumsController::class,'approve_forum']);
    Route::get('add_forums',[ForumsController::class,'add_forum']);
    Route::get('edit_forums/{id}',[ForumsController::class,'edit']);
    Route::get('view_forums',[ForumsController::class,'view_forums']);
    Route::get('view_post/{slug}',[ForumsController::class,'view_post']);
    Route::get('forums_delete/{id}',[ForumsController::class,'destroy']);
    Route::get('support',[SupportController::class,'index']);
    Route::post('create_ticket',[SupportController::class,'store']);
    Route::get('edit_ticket/{id}',[SupportController::class,'edit']);
    Route::any('update_ticket/{id}',[SupportController::class,'update']);
    Route::any('resolve_ticket/{id}',[SupportController::class,'resolve']);
    Route::get('reply_ticket/{id}',[SupportController::class,'reply_ticket']);
    Route::any('reply/{id}',[SupportController::class,'reply']);
    Route::get('delete_ticket/{id}',[SupportController::class,'destroy']);

    //payment Routes
    Route::controller(MpesaController::class)->group(function(){
        Route::any('transactions','index');
        Route::post('stkpush','stkPush');
        Route::any('approve_transactions/{id}','admin_approval');
    });

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

