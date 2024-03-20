<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HostelController;
use App\Http\Controllers\BookingsController;
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


Route::get('/user/register', [UsersController::class, 'registerFrom'])->name('user.register');
Route::post('/user/registrations', [UsersController::class, 'register'])->name('user.registrations');



Route::get('/', [HostelController::class, 'index'])->name('hostels.index');
Route::get('/view-hostel/{id}', [HostelController::class, 'view'])->name('hostel.view');
Route::post('/bookings', [BookingsController::class, 'store'])->name('bookings.store');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::resource('users', UsersController::class);
