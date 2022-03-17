<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TicketController;
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

Route::get('/', [CustomerController::class, 'list'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::get('/new-customer', [CustomerController::class, 'create'])
    ->middleware('auth')
    ->name('new_customer');
Route::post('/new-customer', [CustomerController::class, 'store'])
    ->middleware('auth');
Route::get('/all-customers', [CustomerController::class, 'all'])
    ->middleware('auth')
    ->name('all_customers');
Route::get('/edit-customer/{id}', [CustomerController::class, 'edit'])
    ->middleware('auth')
    ->name('edit_customer');
Route::post('/edit-customer/{id}', [CustomerController::class, 'update'])
    ->middleware('auth');
Route::get('/view-customer/{id}', [CustomerController::class, 'view'])
    ->middleware('auth')
    ->name('view_customer');
Route::get('/delete-customer/{id}', [CustomerController::class, 'delete'])
    ->middleware('auth')
    ->name('delete_customer');

Route::get('/new-ticket', [TicketController::class, 'create'])
    ->middleware('auth')
    ->name('new_ticket');
Route::post('/new-ticket', [TicketController::class, 'store'])
    ->middleware('auth');
Route::get('/list-all-tickets', [TicketController::class, 'listAll'])
    ->middleware(['auth'])
    ->name('list_all_tickets');
Route::get('/list-pending-tickets', [TicketController::class, 'listPending'])
    ->middleware(['auth'])
    ->name('list_pending_tickets');
Route::get('/edit-ticket/{id}', [TicketController::class, 'edit'])
    ->middleware('auth')
    ->name('edit_ticket');
Route::post('/edit-ticket/{id}', [TicketController::class, 'update'])
    ->middleware('auth');


Route::get('/change-password', [ChangePasswordController::class, 'index'])
    ->middleware('auth')
    ->name('change_password');
Route::post('/change-password', [ChangePasswordController::class, 'update'])
    ->middleware('auth');

require __DIR__ . '/auth.php';
