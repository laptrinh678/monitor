<?php

namespace App\Http\Controllers\fontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\postmodel;
use App\catepostmodel;
use App\khogiaodienmodel;
use App\comment_postmodel;
use DB;

class homepostcontroller extends Controller
{
    public function getcatepost()
    {
        $slug ='tin-tuc';
       $slugcate = $slug;
    $catepost = catepostmodel:: where('cat_slug', $slug)->first();
    $lispost = postmodel::where('cat_slug',$slug)->paginate(10);
    $allpost = postmodel:: where('id','>',1)->orderBy('id','desc')->take(8)->get();
    	return view('fontend.home.catepost',compact('lispost','catepost','slugcate','allpost'));
        
    }
    
    public function getdetailpost($slug)
    {
        $post_detail = postmodel::where('post_slug', $slug)->first();
        $post_lienquan= postmodel::orderBy('id','desc')->take(8)->get();
    return view('fontend.home.detailpost', compact('post_detail','post_lienquan'));
    }
    public function getlistcatepost($slug)
    {
       $post_detail = postmodel::where('post_slug', $slug)->first();
        $post_lienquan= postmodel::orderBy('id','desc')->take(8)->get();
    return view('fontend.home.detailpost', compact('post_detail','post_lienquan'));
    }
    



    public function getdetailpostdm($id)
    {   $post_dm = catepostmodel:: where('id', $id)->first();
        //$post_dm = catepostmodel::where('id', 11)->first();
        return view('fontend.home.detail_cate', compact('post_dm'));
    }
     public function getdetailpostquangcao($id)
    {   $post_dm = catepostmodel:: where('id', $id)->first();
        //$post_dm = catepostmodel::where('id', 11)->first();
        return view('fontend.home.detail_cateqc', compact('post_dm'));
    }
    // hiển thị chi tiết bài viết
    public function getchitietbaiviet1($slug)

    {    
         //$post_tenmien = postmodel::where('post_slug', $slug)->first();
         $postdetail = postmodel::where('post_slug',$slug)->first();
         //dd($cate);

         //dd($post_a); die();
        $list_moinhat = postmodel::where('id','>',1)->orderBy('id','desc')->get();
        //dd($list_moinhat);
         //$catepost = catepostmodel:: where('parent_id', 11)->get();
         //$comment = comment_postmodel::where('post_slug',$slug)->get();
        return view('fontend.home.detail_post2',compact('postdetail','list_moinhat','catepost','comment'));
    }
    //xử lý chức năng bình luận bài viết theo slug
    public function postbinhluan(Request $request, $slug)
    {
        $binhluan = new comment_postmodel;
        $binhluan ->post_slug = $slug;
        $binhluan->name = $request->name;
        $binhluan->email = $request->email;
        $binhluan->comment= $request->comment;
        $binhluan->save ();
        return back(); 
    }
    public function getlienhe()
    {
         return view('fontend.home.lienhe');
    }
    public function gettuyendung()
    {
         return view('fontend.home.tuyendung');
    }
    public function getbatdongsan()
        {
             return view('fontend.home.batdongsan');
        }
    public function getvatlieuxaydung()
        {
             return view('fontend.home.cateproduct');
        }

    
     public function getshowrow()
    {
        $list_moinhat = postmodel::where('id','>',1)->orderBy('id','desc')->get();
         return view('fontend.home.showrom', compact('list_moinhat','post'));
    }
    public function getblog($slug)
    {
        $cate = catepostmodel::where('cat_slug',$slug)->first();
        $list_blog =postmodel:: where('cat_slug',$slug)->get();
        //dd($list_blog);
        $list_moinhat = postmodel::where('id','>',1)->orderBy('id','desc')->get();
        //dd($list_moinhat);
        return view('fontend.home.blog', compact('list_blog','cate','list_moinhat'));
    }
   /* public function getchitiettin($slug)
    {
        $post_sl = postmodel:: where('post_slug','=',$slug)->first();
        $post = postmodel:: where('id','>',1)->orderBy('id','desc')->take(8)->get();
        return view('fontend.home.detailpost', compact('post','post_sl'));
    }*/

     public function getsearch_post(Request $request)
    {
        //dd('kk');
        $allpost = postmodel::orderBy('id','asc')->take(8)->get();
        $value = $request->search_post;
        $data['value']=$value;
        $str = str_replace('', '%', $value);
        $post = DB::table('post')->where('post_name','like','%'.$str.'%')->paginate(8);
         return view('fontend.home.search_post', compact('post','allpost'));
    }

}
