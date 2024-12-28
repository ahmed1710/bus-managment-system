<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{

  protected $fillable = [
      'name',
  ];

  public function tripsAsStartStation()
  {
      return $this->hasMany(Trip::class, 'start_station_id');
  }

  public function tripsAsEndStation()
  {
      return $this->hasMany(Trip::class, 'end_station_id');
  }
}
