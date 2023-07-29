<?php

namespace App\Http\Controllers\backend\giaodien;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\catepostmodel;
use App\khogiaodienmodel;
use File,DateTime;

class giaodiencontroller extends Controller
{
   public function getlist()
    {
        $giaodien = khogiaodienmodel::paginate(10);
        return view('backend.giaodien.list', compact('giaodien'));
    }
    public function getadd()
    {
        $catepost = catepostmodel:: all();
        return view('backend.giaodien.add',compact('catepost'));
    }

    public function postadd(Request $request)
    {
        $giaodien = new khogiaodienmodel;
        $giaodien->ten_gd = $request->name;
        $giaodien ->danhmuc = $request->parent;
        $giaodien->link = $request->link;
        ///* lay anh giao dien1*/
            $file_img1 = $request->file('img1');
            $name_img1 = $file_img1->getClientOriginalName();
            $str_name_img1 = str_random(5)."-".$name_img1;
            while (file_exists('public/backend/khogiaodien/'.$str_name_img1)) 
            {
            $str_name_img1 = str_random(5)."-".$name_img1;
            }
            $file_img1->move('public/backend/khogiaodien/',$str_name_img1);
            $giaodien->img1 = $str_name_img1;
        /// xu ly anh giao dien 2//
             $file_img2 = $request->file('img2');
            $name_img2 = $file_img2->getClientOriginalName();
            $str_name_img2 = str_random(5)."-".$name_img2;
            while (file_exists('public/backend/khogiaodien/'.$str_name_img2)) 
            {
            $str_name_img2 = str_random(5)."-".$name_img2;
            }
            $file_img2->move('public/backend/khogiaodien/',$str_name_img2);
            $giaodien->img2 = $str_name_img2;
        $giaodien->save();
        return redirect('admin/giaodien/list')->with('addcatepost','Thêm thành công');
        
    }
    // chức năng sửa kho giao diện: Định Công 
    public function getedit($id)
    {
          $giaodien_id = khogiaodienmodel::find($id); 
          //dd($giaodien_id);
          $catepost = catepostmodel:: all();
            return view('backend.giaodien.edit',compact('catepost','giaodien_id'));
    }
    public function postedit(Request $request, $id)
    {
        $giaodien_id = khogiaodienmodel::find($id);
        $giaodien_id->ten_gd = $request->name_new;
        $giaodien_id ->danhmuc = $request->parent;
        $giaodien_id->link = $request->link;
       // xử lý ảnh thứ nhất.
       // /*lấy ảnh icon cũ*///
        $old_img1               = 'public/backend/khogiaodien/'. $giaodien_id->img1;//(ten cot nhe)//
        if($request->hasFile('img1_new'))
        {
            $file_img1_new = $request->file('img1_new');
            $name_new_img1 = $file_img1_new->getClientOriginalName();
            $str_name_new_img1 = str_random(5)."-".$name_new_img1;
            while (file_exists('public/backend/khogiaodien/'.$str_name_new_img1)) 
            {
            $str_name_new_img1 = str_random(5)."-".$name_new_img1;
            }
            $file_img1_new->move('public/backend/khogiaodien/',$str_name_new_img1);
            $giaodien_id->img1 = $str_name_new_img1;
            // /*xoa ảnh icon cũ*///
            if(File::exists($old_img1)){
            File::delete($old_img1);
            }

        }
        // kết thúc xử lý ảnh thứ nhất bắt đầu ảnh thứ chieu 21/1/2018 định công - hm hn
         $old_img2               = 'public/backend/khogiaodien/'. $giaodien_id->img2;//(ten cot nhe)//
        if($request->hasFile('img2_new'))
        {
            $file_img2_new = $request->file('img2_new');
            $name_new_img2 = $file_img2_new->getClientOriginalName();
            $str_name_new_img2 = str_random(5)."-".$name_new_img2;
            while (file_exists('public/backend/khogiaodien/'.$str_name_new_img2)) 
            {
            $str_name_new_img2 = str_random(5)."-".$name_new_img2;
            }
            $file_img2_new->move('public/backend/khogiaodien/',$str_name_new_img2);
            $giaodien_id->img2 = $str_name_new_img2;
            // /*xoa ảnh icon cũ*///
            if(File::exists($old_img2)){
            File::delete($old_img2);
            }

        }
        // kết thúc xử lý ảnh thứ 2
        $giaodien_id->save();
        return redirect('admin/giaodien/list')->with('editsucess','Sửa thành công');
    }
    public function getdelete($id)
    {
         $giaodien_id = khogiaodienmodel::find($id);
        $giaodien_id->delete();
        return redirect('admin/giaodien/list')->with('deletesucess','Xóa thành công');
    }
}
