<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class privatemessage extends Model
{
    protected $fillable = ['name','email','phone','subject','message', 'user_id', 'service_id','sp_id'];
}
