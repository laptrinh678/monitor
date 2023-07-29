<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productimgdetail extends Model
{
    protected $table ='img_prodetail';
    function productmodel(){
    	return $this->belongsTo('App\productmodel','product_id');
    }
}
