<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    protected $fillable = ['id', 'number', 'ancestor_id', 'family_id', 'nick', 'name', 'image_id', ];
}
