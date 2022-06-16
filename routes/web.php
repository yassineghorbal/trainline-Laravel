<?php

use App\Http\Controllers\TripController;
use App\Http\Controllers\UserController;
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

//show all trips
Route::get('/trips', TripController::class . '@index');

//show create trip form
Route::get('/trips/create', TripController::class . '@create');

//store new trip
Route::post('/trips', TripController::class . '@store');

//show edit trip form
Route::get('/trips/{trip}/edit', TripController::class . '@edit');

//update trip
Route::put('/trips/{trip}', TripController::class . '@update');

//delete trip
Route::delete('/trips/{trip}', TripController::class . '@destroy');

//search for a trip
Route::get('/trips/search', TripController::class . '@search');

//show single trip
Route::get('/trips/{trip}', TripController::class . '@show');



//////////////////////////////////////////////////////////////////////////////

//show home page
Route::get('/', UserController::class . '@index')->name('home');

//show register form
Route::get('/register', UserController::class . '@showRegisterForm')->middleware('guest');

//register a new user
Route::post('/users', UserController::class . '@register');

//show login form
Route::get('/login', UserController::class . '@login')->name('login');

//login a user
Route::post('users/authenticate', UserController::class . '@authenticate');

//logout a user
Route::post('/logout', UserController::class . '@logout')->middleware('auth');

//show user tickets
Route::get('/tickets', UserController::class . '@showTickets')->middleware('auth');

//add a ticket for a user
Route::post('/book', TripController::class . '@addTicket')->middleware('auth');
