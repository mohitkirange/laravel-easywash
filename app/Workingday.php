<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workingday extends Model
{
    public function services()
    {
      return $this->belongsToMany('App\Service');
    }


}
