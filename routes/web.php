<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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
Route::get('/home',[HomeController::class,'redirect'])->middleware('auth','verified')->name('dashboard');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'
])->group(function () {

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    //user or any authenticated person can access this
    Route::get('/cancel-appointment/{id}',[HomeController::class,'cancelAppointment']);
    Route::match(['get','post'],'/appointment',[HomeController::class,'appointment']);
    

//only admin can access this
    Route::group(['middleware' => ['is_admin']], function(){
        
        Route::match(['get','post'],'/add-doctor',[AdminController::class,'addDoctor']);
        Route::get('/delete-doctor/{doctor}',[AdminController::class,'deleteDoctor']);
        Route::match(['get','post'],'/edit-doctor/{doctor}',[AdminController::class,'editDoctor']);

        Route::match(['get','post'],'/send-mail/{appointment}',[AdminController::class,'sendMail']);
        Route::get('/view-appointments',[AdminController::class,'viewAppointment']);;
        Route::get('/cancel/{appointment}',[AdminController::class,'cancel']);
        Route::get('/approve/{appointment}',[AdminController::class,'approve']);
        Route::get('/view-doctor',[AdminController::class,'viewDoctor']);
    });
//
    // Route::get('/admin/dashboard', function () {
    //      return view('admin.dashboard');
    //  })->name('admin.dashboard');
    
//});

});
