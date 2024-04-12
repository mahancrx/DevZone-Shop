<?php

use App\Http\Controllers\ProfileController;
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
});



//-----------------{Admin Routes}----------------
Route::get('/dashboard', [\App\Http\Controllers\Admin\PanelController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->prefix('/dashboard')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/user', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('/role', \App\Http\Controllers\Admin\RoleController::class);
    Route::get('/user_role{id}', [\App\Http\Controllers\Admin\UserController::class, 'userRole'])->name('user.role');
    Route::post('/store_user_role{id}', [\App\Http\Controllers\Admin\UserController::class, 'storeUserRole'])->name('store.user.role');
});

require __DIR__.'/auth.php';
