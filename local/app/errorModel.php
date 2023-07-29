<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class errorModel extends Model
{
    protected $table ="list_error";
    public $timestamps = true;
    function historyerror()
    {
    	return $this->belongsTo('App\historyerror','error');
    }
    function processModel()
    {
    	return $this->belongsTo('App\processModel','process_code','process_id');
    }
}
