<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class processModel extends Model
{
    protected $table ="process";
    public $timestamps = true;
    function errorModel()
    {
    	return $this->hasMany('App\errorModel','process_code','process_id');
    }
}
