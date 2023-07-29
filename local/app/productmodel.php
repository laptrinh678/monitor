<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productmodel extends Model
{
    protected $table = 'product';
     function cateproductmodel(){
    	return $this->belongsTo('App\cateproductmodel','cat_id');
    }
    ////noi bang den bang 	product_image_detail qua model imgprodetailmodel////
     function imgprodetailmodel(){
    	return $this->hasMany('App\imgprodetailmodel','product_id');
    	                         ////tenmodel muon lien ket, ten cot lien ket ////
    }
    function productimgdetail(){
    	return $this->hasMany('App\productimgdetail','product_id');
    	                         ////tenmodel muon lien ket, ten cot lien ket ////
    }
    function comment_pro_model(){
        return $this->hasMany('App\comment_pro_model','product_id');
                               /// vị trí model// // cột liên kết///

    }
}
