<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::group(['middleware'=>'admin'],function(){
    Route::get('dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
    Route::get('profile',[DashboardController::class,'profile'])->name('admin.profile');
    Route::post('profile/update',[DashboardController::class,'profileUpdate'])->name('admin.profile.update');
    Route::post('profile/update/password',[DashboardController::class,'profileUpdatePassword'])->name('admin.profile.password.update');
});

Route::get('login',[AuthController::class,'login'])->name('login');
Route::post('login',[AuthController::class,'loginPost']);
Route::get('register',[AuthController::class,'register'])->name('register');
Route::post('register',[AuthController::class,'registerPost']);
Route::post('logout',[AuthController::class,'logout'])->name('logout');

