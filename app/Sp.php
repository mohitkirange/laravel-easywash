<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Sp extends Authenticatable
{
    use Notifiable;
    protected $guard='sp';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'job_title', 'lname','fname','address','is_activated'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($password)
       {
           $this->attributes['password'] = bcrypt($password);
       }

       public function services()
       {
         return $this->hasMany('App\Service');
       }

       public function pricings()
       {
         return $this->hasone('App\Pricing');
       }
}
