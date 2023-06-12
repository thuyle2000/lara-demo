<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;

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

Route::get('/login',[AccountController::class,'login']);
Route::post('/checkLogin',[AccountController::class,'authenticate']);
Route::get('logout',  [AccountController::class, 'logout']);

Route::prefix('admin')->name('admin')->middleware('checkLogin:admin')->group(function() {
    Route::get('users',[AccountController::class, 'users'])->name("userlist");
    Route::get('displayAddUser',[AccountController::class, 'displayAddUser']);
    Route::post('addUser', [AccountController::class, 'addUser']);
    Route::get('resetPassword/{id}',[AccountController::class, 'resetPassword']);
});

Route::prefix('user')->name('user')->middleware('checkLogin:user,admin')->group(function() {
    Route::get('details/{id}', [AccountController::class, 'details'])->name("profile");
});

