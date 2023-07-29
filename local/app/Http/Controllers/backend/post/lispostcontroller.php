<?php

namespace App\Http\Controllers\backend\post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\catepostmodel;
use App\postmodel;
use File,DateTime, DB;

class lispostcontroller extends Controller
{
    public function getlist()
    {
        $listpost = postmodel::all();
    	return view('backend.post.list.list', compact('listpost'));
    }
    public function getadd()
    {
        $catepost = catepostmodel::all();
        //dd($catepost);
    	return view('backend.post.list.add', compact('catepost'));
    }
    public function postadd(Request $request)
    {
         $id_cat = substr($request->cat_id,0,2);
         $cat_slug = substr($request->cat_id,3,300);
         //dd($cat_slug); die();

        $listpost = new postmodel;
        $listpost->cat_id = $id_cat;
        $listpost->cat_slug = $cat_slug;


        $listpost->post_name = $request->post_name;
        $listpost->post_slug = str_slug($request->post_name);
        $listpost->post_gtngan = $request->description1;
        $listpost->post_gtchitiet = $request->description2;
        $listpost->tacgia = $request->tacgia;
        $listpost->date = $request->date;
        $listpost->online = $request->online;
        $listpost->meta_des= $request->meta_des;
        $listpost->meta_keywords= $request->meta_keywords;
        $listpost->loaibaiviet= $request->loaibaiviet;
        // xử lý ảnh thứ nhất
        if($request->hasFile('post_img'))
        {
            $file_post_img = $request->post_img;
        $name_post_img = $file_post_img->getClientOriginalName();
        $str_name_post_img = str_random(5)."-".$name_post_img;
        while (file_exists('public/backend/post/'.$str_name_post_img)) 
        {
        $str_name_post_img = str_random(5)."-".$name_post_img;
        }
        $file_post_img->move('public/backend/post/',$str_name_post_img);
        $listpost->post_img = $str_name_post_img;
        //dd($file_post_img); die();
        }else
        {
             $listpost->post_img = '';
        }
        
        if($request->hasFile('post_img2'))
        {
             $file_post_img2 = $request->post_img2;
            $name_post_img2 = $file_post_img->getClientOriginalName();
            $str_name_post_img2 = str_random(5)."-".$name_post_img2;
            while (file_exists('public/backend/post/'.$str_name_post_img2)) 
            {
            $str_name_post_img2 = str_random(5)."-".$name_post_img2;
            }
            $file_post_img2->move('public/backend/post/',$str_name_post_img2);
            $listpost->post_img2 = $str_name_post_img2;
        }else
        {
             $listpost->post_img2 = '';
        }
       
        $listpost->save();
        return redirect('admin/post/listpost/list')->with('addsucess','Thêm mới thành công');
    }
    public function getedit( Request $request, $id)
    {
         $catepost = catepostmodel::all();
         $postid = postmodel::find($id);
        return view('backend.post.list.edit', compact('catepost','postid'));
    }
    public function postedit( Request $request, $id)
    {
         $id_cat = substr($request->cat_id,0,2);
         
         $cat_slug = substr($request->cat_id,3,300);
         //dd($cat_slug);

        $postid = postmodel::find($id);
        $postid->cat_id = $id_cat;
        $postid->cat_slug = $cat_slug;

        $postid->post_name = $request->new_post_name;
        $postid->post_slug = str_slug($request->new_post_name);
        $postid->post_gtngan = $request->description1;
        $postid->post_gtchitiet = $request->description2;
        $postid->tacgia = $request->new_tacgia;
        $postid->date = $request->new_date;
        $postid->online = $request->online;
        $postid->meta_des= $request->meta_des;
        $postid->meta_keywords= $request->meta_keywords;
        $postid->loaibaiviet= $request->loaibaiviet;

        ////dd($postid); die();////
        // /*lấy ảnh icon cũ*///
        $old_post_img                = 'public/backend/post/'. $postid->post_img;
        if($request->hasFile('new_post_img'))
        {
            $file_new_post_img = $request->file('new_post_img');
            $name_new_post_img = $file_new_post_img->getClientOriginalName();
            $str_name_new_post_img = str_random(5)."-".$name_new_post_img;
            while (file_exists('public/backend/post/'.$str_name_new_post_img)) 
            {
            $str_name_new_post_img = str_random(5)."-".$name_new_post_img;
            }
            $file_new_post_img->move('public/backend/post/',$str_name_new_post_img);
            $postid->post_img = $str_name_new_post_img;
            // /*xoa ảnh icon cũ*///
            if(File::exists($old_post_img )){
            File::delete($old_post_img );
            }

        }// // KET THUC XU LUS ANH ICON ////
        // start xử lý ảnh bài viết 2
        $old_post_img2                = 'public/backend/post/'. $postid->post_img2;
        if($request->hasFile('new_post_img2'))
        {
            $file_new_post_img2 = $request->file('new_post_img2');
            $name_new_post_img2 = $file_new_post_img2->getClientOriginalName();
            $str_name_new_post_img2 = str_random(5)."-".$name_new_post_img2;
            while (file_exists('public/backend/post/'.$str_name_new_post_img2)) 
            {
            $str_name_new_post_img2 = str_random(5)."-".$name_new_post_img2;
            }
            $file_new_post_img2->move('public/backend/post/',$str_name_new_post_img2);
            $postid->post_img2 = $str_name_new_post_img2;
            // /*xoa ảnh icon cũ*///
            if(File::exists($old_post_img2 )){
            File::delete($old_post_img2 );
            }

        }// // KET THUC XU LUS ANH ICON ////

        // kết thúc bai viet 2
        $postid->updated_at    = new DateTime();
        $postid->save();
        return redirect('admin/post/listpost/list')->with('editsucess','Sửa thành công');
    }
    public function getdelete($id)
    {
        $deleteid = postmodel::find($id);
        $deleteid->delete();
        return redirect('admin/post/listpost/list')->with('deletesucess','Xóa thành công');
    }
    ////////////////////////////////hà nội 5/11/2017/ sn28/199/ Định công hạ hoàng mai- hà nội///////////////
    public function getsearch(Request $request)
    {
        $value = $request->valude_search;
        $data['value']=$value;
        $str = str_replace('', '%', $value);// chuc nang 
        $data['post'] = DB::table('post')->where('post_name','like','%'.$str.'%')->paginate(3);
       //dd($data['post']); die();   
       return view('backend.post.list.search',$data);
    }
    /*// chức năng quản lý các bình luận bài viết 24/2/2018 Định công hoàng mai hn*/
    public function getcomment()
    {
        return view('backend.post.comment.list');
    }
}
