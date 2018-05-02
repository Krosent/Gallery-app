<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class family extends Model
{
  protected $fillable = ['id', 'father_id', 'mother_id'];
}
