<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
	public $timestamps = false;
    protected $guarded=[];

    public function getRouteKeyName()
	{
	    return 'name';
	}
}
