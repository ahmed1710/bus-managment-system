<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{

  protected $fillable = ['bus_number', 'capacity'];

  public function trips(){

  return $this->hasMany(Trip::class);

  }
}
