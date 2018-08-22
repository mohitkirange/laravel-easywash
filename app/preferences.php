<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class preferences extends Model
{

  protected $fillable = [
     'user_id', 'detergent', 'fabricsoftener', 'starch'
  ];

}
