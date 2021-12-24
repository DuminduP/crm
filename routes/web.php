<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ChangePasswordController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [CustomerController::class, 'list'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::get('/new-customer', [CustomerController::class, 'create'])
    ->middleware('auth')
    ->name('new_customer');
Route::post('/new-customer', [CustomerController::class, 'store'])
    ->middleware('auth');
Route::get('/edit-customer/{id}', [CustomerController::class, 'edit'])
    ->middleware('auth')
    ->name('edit_customer');
Route::post('/edit-customer/{id}', [CustomerController::class, 'update'])
    ->middleware('auth');

Route::get('/change-password', [ChangePasswordController::class, 'index'])
    ->middleware('auth')
    ->name('change_password');
Route::post('/change-password', [ChangePasswordController::class, 'update'])
    ->middleware('auth');

require __DIR__ . '/auth.php';
