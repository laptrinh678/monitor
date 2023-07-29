<?php

namespace App\Http\Controllers\backend\post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\postmodel;
use App\postdetailmodel;
use File;

class post_imgcontroller extends Controller
{
    public function getlist()
    {
    	$imgpost_2 = postdetailmodel::all();
        //dd($imgpost); die();
    	return view('backend.post.imgpost.list', compact('imgpost_2'));
    }
    public function getadd()
    {
    	$post = postmodel::all();
    	return view('backend.post.imgpost.add', compact('post'));
    }
     public function postadd(Request $request)
    {
    	$postimg = new postdetailmodel;
    	$postimg->post_id = $request->post_id;

    	 // xử lý ảnh post
        $file_post_img = $request->imgpost;
        $name_post_img = $file_post_img->getClientOriginalName();
        $str_name_post_img = str_random(5)."-".$name_post_img;
        while (file_exists('public/backend/imgpost/'.$str_name_post_img)) 
        {
        $str_name_post_img = str_random(5)."-".$name_post_img;
        }
        $file_post_img->move('public/backend/imgpost/',$str_name_post_img);
        $postimg->img = $str_name_post_img;
        //dd($file_post_img); die();
        $postimg->save();
        return redirect('admin/post/postimg/list')->with('addsucess','Thêm mới thành công');

    	
    }
     public function getedit($id)
    {
    	$post = postmodel::all();
    	$postid = postdetailmodel::find($id);
    	return view('backend.post.imgpost.edit', compact('post','postid'));
    }
     public function postedit(Request $request, $id)
    {
    	 $imgdeid = postdetailmodel::find($id);
         $imgdeid ->post_id = $request->post_id;
         $old_imgdetail1                = 'public/backend/imgpost/'. $imgdeid->img;
         ///dd($old_imgdetail1); die();                                // ten cot img trong bang day//
        if($request->hasFile('imgpost_new'))
        {
            $file_new_imgdetail1 = $request->file('imgpost_new');
            $name_new_imgdetail1 = $file_new_imgdetail1->getClientOriginalName();
            $str_name_new_imgdetail1 = str_random(5)."-".$name_new_imgdetail1;
            while (file_exists('public/backend/imgpost/'.$str_name_new_imgdetail1)) 
            {
            $str_name_new_imgdetail1 = str_random(5)."-".$name_new_imgdetail1;
            }
            $file_new_imgdetail1->move('public/backend/imgpost/',$str_name_new_imgdetail1);
            $imgdeid->img = $str_name_new_imgdetail1;
            // /*xoa ảnh icon cũ*///
            if(File::exists($old_imgdetail1)){
            File::delete($old_imgdetail1);
            }
        }
        $imgdeid->save();
        return redirect('admin/post/postimg/list')->with('editsucess','Sửa thành công');
    	
    }
     public function getdelete($id)
    {
    	 $imgdelete = postdetailmodel::find($id);
         $imgdelete->delete();
        return back()->with('deletesucess','Xóa thành công');
    }
}
