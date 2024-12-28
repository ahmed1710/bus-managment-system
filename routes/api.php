<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\BookingController;

/*
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::middleware('auth:api')->group(function () {
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/trips', [TripController::class, 'index'])->name('trips.index');
    Route::get('/available-seats/{trip}', [TripController::class, 'availableSeats'])->name('trips.availableSeats');
    Route::post('/book-seat/{tripId}', [BookingController::class, 'bookSeat'])->name('trips.bookSeat');
});
