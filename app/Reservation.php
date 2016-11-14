<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public $timestamps = true;
    protected $fillable = ['id','check_in','check_out','status','created_at','updated_at','apartment_id'];
}
