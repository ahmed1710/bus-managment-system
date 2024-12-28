<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Trip;
use App\Models\Seat;

class TripController extends Controller
{

  public function index()
  {
      $trips = Trip::with(['startStation', 'endStation', 'bus'])->get();

      return response()->json([
          'message' => 'Trips retrieved successfully.',
          'trips' => $trips,
      ]);
  }


  public function availableSeats($trip)
  {
      $trip = Trip::findOrFail($trip);

      $availableSeats = Seat::where('trip_id', $trip->id)
          ->where('is_booked', false)
          ->pluck('seat_number');

      return response()->json([
          'message' => 'Available seats retrieved successfully.',
          'trip_id' => $trip->id,
          'available_seats' => $availableSeats,
      ]);
  }

}
