<?php

use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RequiredToken;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\EmployeeController;



Route::get('/', function () {

    // $user =  Auth::user();
    // dd($user);
    return view('home');
})->middleware(['auth']);


Route::prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->middleware(['guest'])->name('login');
    Route::post('login', [AuthController::class, 'authenticate'])->middleware(['guest']);

    Route::get('register', [AuthController::class, 'register'])->middleware(['guest']);

    Route::post('register', [AuthController::class, 'registerStore'])->middleware(['guest']);

    Route::post('logout', [AuthController::class, 'logout'])->middleware(['auth']);
});

Route::get('user', [UserController::class, 'index'])->middleware(['auth'])->can('only-sdm');

// Route::get('employee/{id}', function ($id) {

//     $employee = Employee::find($id);

//     dd($employee);
// });

// Route::get('employee/{employee:employee_code}', function (Employee $employee) {

//     dd($employee);
// });

Route::resource('division', DivisionController::class)->middleware(['auth']);
Route::resource('employee', EmployeeController::class)->middleware(['auth']);
