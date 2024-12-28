<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Seat;
use App\Models\Trip;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{

  public function bookSeat(Request $request, $tripId)
  {
      $request->validate([
          'seat_number' => 'required|integer|min:1',
      ]);

      $user = Auth::user();
      $trip = Trip::findOrFail($tripId);

      if ($request->seat_number > $trip->bus->capacity) {
          return response()->json([
              'message' => 'Invalid seat number. This seat does not exist on the bus.',
          ], 400);
      }

      $existingBooking = Booking::where('trip_id', $trip->id)
          ->where('seat_number', $request->seat_number)
          ->first();

      if ($existingBooking) {
          return response()->json([
              'message' => 'The selected seat is already booked.',
          ], 400);
      }

      $booking = Booking::create([
          'user_id' => $user->id,
          'trip_id' => $trip->id,
          'seat_number' => $request->seat_number,
      ]);

      return response()->json([
          'message' => 'Seat successfully booked.',
          'booking' => $booking,
      ], 201);
  }

}
