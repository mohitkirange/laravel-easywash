<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class washandfold extends Model
{
  public function carts()
  {
    return $this->belongsToMany('App\cart');
  }
}
