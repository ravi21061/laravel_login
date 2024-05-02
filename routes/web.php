<?php

use App\Http\Controllers\CustomAuthController;
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
//     return view('welcome');
// });
Route::get('/',[CustomAuthController::class,'home'])->middleware('alreadyloggedin')->middleware('alreadyloggedin');
Route::get('/login',[CustomAuthController::class,'login'])->middleware('alreadyloggedin');
Route::get('/registration',[CustomAuthController::class,'registration'])->middleware('alreadyloggedin');
Route::post('/register-user',[CustomAuthController::class,'registeruser'])->name('register-user');
Route::post('/login-user',[CustomAuthController::class,'loginuser'])->name('login-user');
Route::get('/dashboard',[CustomAuthController::class,'dashboard'])->middleware('isLoggedIn');
Route::get('/logout',[CustomAuthController::class,'logout']);

//Admin middleware

Route::middleware(['auth','admin'])->prefix('admin')->group(function(){
    Route::get('/dashboard',[CustomAuthController::class,'dashboard'])->name('dashboard');
});

Route::middleware(['auth','staff'])->prefix('admin')->group(function(){
    Route::get('/staff-profile',[CustomAuthController::class,'staffprofile'])->name('staff-profile');
});