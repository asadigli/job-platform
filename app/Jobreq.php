<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobreq extends Model
{
    protected $table = 'jobreq';
    protected $dates = ['created_at','updated_at'];
}
