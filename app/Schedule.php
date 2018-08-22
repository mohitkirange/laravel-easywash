<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{

  protected $fillable = [ 'dos',  ];

  public function services()
  {
    return $this->belongsToMany('App\Service');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
