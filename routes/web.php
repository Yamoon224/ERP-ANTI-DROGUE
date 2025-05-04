<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArrestController;
use App\Http\Controllers\SummonController;
use App\Http\Controllers\HearingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\IncomingMailController;
use App\Http\Controllers\OutgoingMailController;
use App\Http\Controllers\EquipmentAssignmentController;

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

Route::get('/', [Controller::class, 'welcome']);
Route::get('/{locale}/switch', [Controller::class, 'switchLocale'])->name('locales.switch');


Route::middleware(['auth', 'locale', 'verified'])->group(function () {
    Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');

    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('arrests', ArrestController::class);
    Route::resource('summons', SummonController::class);
    Route::resource('hearings', HearingController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('appointments', AppointmentController::class);
    Route::resource('incomingmails', IncomingMailController::class);
    Route::resource('outgoingmails', OutgoingMailController::class);
    Route::resource('/equipment/assignments', EquipmentAssignmentController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
