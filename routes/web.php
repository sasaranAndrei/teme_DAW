<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\RealEstatesController;
use App\Http\Controllers\UploadsController;
use App\Http\Controllers\UsersController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::group(['middleware' => 'auth'], function() {
    Route::resource('real_estates', RealEstatesController::class);
    Route::resource('users', UsersController::class);
    Route::resource('calendar_events', EventController::class);
});

Route::post('upload', [UploadsController::class, 'store']);

Route::get('/show-event-calendar', [EventController::class, 'index']);
Route::post('/manage-events', [EventController::class, 'manageEvents']);
// Route::get('/create', [EventController::class, 'create']);
