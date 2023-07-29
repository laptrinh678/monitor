<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class postmodel extends Model
{
    protected $table = 'post';// tên bảng muốn liên kết trong db//
    // hành động liên kết đến 1 bảng khác qua function//
     function catepostmodel(){
    	return $this->belongsTo('App\catepostmodel','cat_id');
    }

    function postdetailmodel(){
        return $this->hasMany('App\postdetailmodel','post_id');
                                 ////tenmodel muon lien ket, ten cot lien ket ////
    }

    // quan hệ 1 nhiều 1 bài viết thì có nhiều bình luận nên phải dùng hasMany
     function comment_postmodel(){
    	return $this->hasMany('App\comment_postmodel','post_slug');
    }
}
