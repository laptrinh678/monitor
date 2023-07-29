<?php

namespace App\Http\Controllers\backend\post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\catepostmodel;
use File,DateTime, DB;

class catecontroller extends Controller
{
    public function getlist()
    {
        $catepost = catepostmodel::paginate(20);
    	return view('backend.post.cate.list', compact('catepost'));
    }
     public function getadd()
    {
        $catepost = catepostmodel::all();
    	return view('backend.post.cate.add', compact('catepost'));
    }
     public function postadd(Request $request)
    {
        $catpost = new catepostmodel;
            $catpost->cat_name = $request->cat_name;
            $catpost->cat_slug = str_slug($request->cat_name);
            $catpost_id = substr($request->parent,0,2);
            $catpost->parent_id = $catpost_id;
            $catpost->parent_slug  =substr($request->parent,3,40);
            $catpost->cat_gtngan = $request->description1;
            $catpost->cat_gtchitiet = $request->description2;
            $catpost->title=$request->title;
            $catpost->keyword=$request->keyword;
            ///* lay anh icon*/
            if($request->hasFile('cat_icon'))
            {
                $file_Icon = $request->file('cat_icon');
                $name_Icon = $file_Icon->getClientOriginalName();
                $str_name_icon = str_random(5)."-".$name_Icon;
                while (file_exists('public/backend/post/'.$str_name_icon)) 
                {
                $str_name_icon = str_random(5)."-".$name_Icon;
                }
                $file_Icon->move('public/backend/post/',$str_name_icon);
                $catpost->cat_icon = $str_name_icon;
            }else
            {
                 $catpost->cat_icon = '';
            }
            
            if($request->hasFile('cat_img'))
            {
                  $file_Img = $request->file('cat_img');
                    $name_Img = $file_Img->getClientOriginalName();
                    $str_name_Img = str_random(5)."-".$name_Img;
                    while (file_exists('public/backend/post/'.$str_name_Img)) 
                    {
                    $str_name_Img = str_random(5)."-".$name_Img;
                    }
                    $file_Img->move('public/backend/post/',$str_name_Img);
                    $catpost->cat_img = $str_name_Img;
            }else
            {
                 $catpost->cat_img = NULL;

            }
            //dd($catpost);
            ///* lay anh danh muc*/
            // insert vào data 9h18 tối 21/10/2017 
            $catpost->save();
            return redirect('admin/post/cate/list')->with('addcatepost','Thêm danh mục bài viết thành công');
    	
    }
     public function getedit( Request $request, $id)
    {
        $cat    = catepostmodel::find($id);
        $parent = catepostmodel::all();
        return view('backend.post.cate.edit', compact('cat','parent'));
    	
    }
     public function postedit(Request $request, $id)
    {
        $cat = catepostmodel::find($id);
        $cat->cat_name = $request->cat_name;
        $cat->cat_slug = str_slug($request->cat_name);
        $cat->parent_id = $request->parent;
        $cat->cat_gtngan = $request->description1;
        $cat->cat_gtchitiet = $request->description2;
        $cat->title=$request->title;
        $cat->keyword=$request->keyword;
        // /*lấy ảnh icon cũ*///
        $old_icon                = 'public/backend/post/'. $cat->cat_icon;
        if($request->hasFile('new_cat_icon'))
        {
            $file_new_Icon = $request->file('new_cat_icon');
            $name_new_Icon = $file_new_Icon->getClientOriginalName();
            $str_name_new_icon = str_random(5)."-".$name_new_Icon;
            while (file_exists('public/backend/post/'.$str_name_new_icon)) 
            {
            $str_name_new_icon = str_random(5)."-".$name_new_Icon;
            }
            $file_new_Icon->move('public/backend/post/',$str_name_new_icon);
            $cat->cat_icon = $str_name_new_icon;
            // /*xoa ảnh icon cũ*///
            if(File::exists($old_icon)){
            File::delete($old_icon);
            }

        }
        $old_img = 'public/backend/post/'. $cat->cat_img;
         //dd($old_img);  die();
        if($request->hasFile('new_cat_img'))
        {
            $file_new_Img = $request->file('new_cat_img');
            // kết quả dd($file_new_Img) slider_4.jpg
            $name_new_Img = $file_new_Img->getClientOriginalName();
            //dd($name_new_Img); die(); "slider_4.jpg"
            $str_name_new_Img = str_random(5)."-".$name_new_Img;
           // /*dd($str_name_new_Img); die(); "CrPny-slider_4.jpg"*/
            while (file_exists('public/backend/post/'.$str_name_new_Img)) 
            {
            $str_name_new_Img = str_random(5)."-".$name_new_Img;
            }
            $file_new_Img->move('public/backend/post/',$str_name_new_Img);
            $cat->cat_img = $str_name_new_Img;
            if(File::exists($old_img)){
            File::delete($old_img);
            }
        }

        $cat->updated_at    = new DateTime();
        $cat->save();
        return redirect('admin/post/cate/list')->with('editcatsuccess','Sửa danh mục thành công');
    	
    }
    public function getdelete($id)
    {
        $kiemTra = catepostmodel::where('parent_id',$id)->count();
        //dd($kiemTra); die();
        if($kiemTra > 0)
        {
            return redirect()->back()->with('errCatedelete','Bạn không thể xóa danh mục này do còn có danh mục con, bạn cần xóa hết các danh mục con mới xóa được danh mục này');
        }
        else
        {
            $cat = catepostmodel::find($id);
            $cat->delete();
            return redirect('admin/post/cate/list')->with('sucessCateDele','Bạn đã xóa danh mục này thành công');
        }

    }
    /*// chức năng tìm kiếm danh mục bài viết 17/2/2018 //*/
    public function getsearch(Request $request)
    {
        $value = $request->valude_search;
        $data['value']=$value;
        $str = str_replace('', '%', $value);// chuc nang 
        $data['catepost'] = DB::table('catepost')->where('cat_name','like','%'.$str.'%')->paginate(3);
       //dd($data['post']); die();   
       return view('backend.post.cate.search',$data);
    }
}
