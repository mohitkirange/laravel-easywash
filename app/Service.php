<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class Service extends Model
{

  use softDeletes;


  protected $fillable = [
    'name','address','city','state','zipcode','featured','category_id','content','slug',' sp_id' , 'Workingday',
  ];

public function getFeaturedAttribute($featured)
{
  return asset($featured);
}


protected $dates = ['deleted_at'];


public function sp()
{
  return $this->belongsTo('App\Sp');
}

public function schedule()
{
  return $this->belongsTo('App\Schedule');
}
    public function categories()
    {
      return $this->belongsToMany('App\category');
      //return $this->belongsTo('App\category' );
    }
    public function workingdays()
    {
      return $this->belongsToMany('App\workingday');
      //return $this->belongsTo('App\category' );
    }
}
