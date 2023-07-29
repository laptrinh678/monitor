<?php

namespace App\Http\Controllers\fontend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\productmodel;

class ajaxcontroller extends Controller
{
    public function getdssp($giasp)
    {
    	//return('ok');
    	$cate_pro_gia = productmodel::select('pro_price')->where('pro_price','<',$giasp)->get();
        dd($cate_pro_gia);
    }
}
