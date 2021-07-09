<?php

use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;

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

Route::get('/', [PageController::class, 'home'])
    ->name('home');

Route::get('department/create', [DepartmentController::class, 'create'])
    ->name('department.create');

Route::post('departments', [DepartmentController::class, 'store'])
    ->name('department.store');

Route::get('employees/create', [EmployeesController::class, 'create'])
    ->name('employees.create');

Route::post('employees', [EmployeesController::class, 'store'])
    ->name('employees.store');
