<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class historyerror extends Model
{
    protected $table ="history_error";
    public $timestamps = false;
    
    function errorModel(){
    	return $this->belongsTo('App\errorModel','error_code');
    }

}
