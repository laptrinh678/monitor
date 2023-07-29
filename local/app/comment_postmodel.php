<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment_postmodel extends Model
{
	protected $table = 'comment_post';// tên bảng muốn liên kết trong db//
    // hành động liên kết đến 1 bảng khác qua function//
    public $timestamps = true;
     function postmodel(){
    	return $this->belongsTo('App\postmodel','post_slug');
    }
}
