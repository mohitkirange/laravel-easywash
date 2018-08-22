<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
    protected $fillable = ['site_name','contact_email','contact_number','address'];
}
