<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $fillable = [
     'user_id', 'cart_id', 'service_id', 'sp_id' , 'finaltotal'
  ];
}
