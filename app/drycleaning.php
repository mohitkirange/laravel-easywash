<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class drycleaning extends Model
{


  public function carts()
  {
    return $this->belongsToMany('App\cart')
    ->withPivot('cart_drycleaning','$cart_id','drycleaning_id','q_drycleaning_id');
  }

}
