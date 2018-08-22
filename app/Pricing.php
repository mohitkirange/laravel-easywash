<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
  public function Sp()
    {
      return $this->belongsTo('App\Sp');
    }
}
