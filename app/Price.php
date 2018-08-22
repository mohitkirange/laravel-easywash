<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
  public function Sp()
    {
    	return $this->belongsTo('App\Sp');
    }
}
