<?php

namespace App\Http\Controllers\backend\head;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\head_footmodel;
use File;
class head_footcontroller extends Controller
{
    public function getlist()
    {
        $listheader = head_footmodel::all();
    	return view('backend.head_foot.list',compact('listheader'));
    }
    public function getadd()
    {
    	return view('backend.head_foot.add');
    }
    public function postadd(Request $request)
    {
        $head_foot = new head_footmodel;
        $head_foot->name = $request->name;
       $head_foot->slogan = $request->slogan;
       $head_foot->adress = $request->adress;
       $head_foot->dtban = $request->dtban;
       $head_foot->didong = $request->didong;
       $head_foot->hotline = $request->hotline;
       $head_foot->email = $request->email;
       $head_foot->facebook = $request->facebook;
       $head_foot->skype = $request->skype;
       $head_foot->youtube = $request->youtube;
       $head_foot->zalo = $request->zalo;
       //dd($head_foot); 
       //xử lý ảnh thứ nhất logo1// 
       $file_logo1 = $request->logo1;// b1lấy file ảnh///
       $name_logo1 = $file_logo1->getClientOriginalName();////b2 tạo tên file ảnh//
       $str_name_logo1 = str_random(5)."-".$name_logo1;///b3 tạo tên file cho do trung//

            while (file_exists('public/backend/header/'.$str_name_logo1)) 
            {
            $str_name_logo1 = str_random(5)."-".$name_logo1;
            }
            $file_logo1->move('public/backend/header/',$str_name_logo1);
            $head_foot->logo1 = $str_name_logo1;
      // // xử lý xong ảnh logo1

         $file_logo2 = $request->logo2;// b1lấy file ảnh///
       $name_logo2 = $file_logo2->getClientOriginalName();////b2 tạo tên file ảnh//
       $str_name_logo2 = str_random(5)."-".$name_logo2;///b3 tạo tên file cho do trung//

            while (file_exists('public/backend/header/'.$str_name_logo2)) 
            {
            $str_name_logo2 = str_random(5)."-".$name_logo2;
            }
            $file_logo2->move('public/backend/header/',$str_name_logo2);
            $head_foot->logo2 = $str_name_logo2;
        $head_foot->save();
        return ('ok');

    }
    public function getedit( Request $request, $id)
    {
        $header_edit = head_footmodel::find($id);
        return view('backend.head_foot.edit', compact('header_edit'));
    }
    public function postedit(Request $request, $id)
    {
         $head_foot = head_footmodel::find($id);
         $head_foot->name = $request->name;
         $head_foot->slogan = $request->slogan;
         $head_foot->adress = $request->adress;
         $head_foot->dtban = $request->dtban;
         $head_foot->didong = $request->didong;
         $head_foot->hotline = $request->hotline;
         $head_foot->email = $request->email;
         $head_foot->facebook = $request->facebook;
         $head_foot->skype = $request->skype;
         $head_foot->youtube = $request->youtube;
         $head_foot->zalo = $request->zalo;
         // xử lý update ảnh logo1
         ////lay anh cu 1 ////
         $old_logo1                = 'public/backend/header/'. $head_foot->logo1;
         ////dd($old_img1); die();////
        if($request->hasFile('newlogo1'))
        {
            $file_new_logo1 = $request->file('newlogo1');
            $name_new_logo1 = $file_new_logo1->getClientOriginalName();
            $str_name_new_logo1 = str_random(5)."-".$name_new_logo1;
            while (file_exists('public/backend/header/'.$str_name_new_logo1)) 
            {
            $str_name_new_logo1 = str_random(5)."-".$name_new_logo1;
            }
            $file_new_logo1->move('public/backend/header/',$str_name_new_logo1);
            $head_foot->logo1 = $str_name_new_logo1;
            // /*xoa ảnh icon cũ*///
            if(File::exists($old_logo1)){
            File::delete($old_logo1);
            }
        }// kết thúc ảnh logo1//
        $old_logo2                = 'public/backend/header/'. $head_foot->logo2;
         ////dd($old_img1); die();////
        if($request->hasFile('newlogo2'))
        {
            $file_new_logo2 = $request->file('newlogo2');
            $name_new_logo2 = $file_new_logo2->getClientOriginalName();
            $str_name_new_logo2 = str_random(5)."-".$name_new_logo2;
            while (file_exists('public/backend/header/'.$str_name_new_logo2)) 
            {
            $str_name_new_logo2 = str_random(5)."-".$name_new_logo2;
            }
            $file_new_logo2->move('public/backend/header/',$str_name_new_logo2);
            $head_foot->logo2 = $str_name_new_logo2;
            // /*xoa ảnh icon cũ*///
            if(File::exists($old_logo2)){
            File::delete($old_logo2);
            }
        }// kết thúc ảnh logo2//
        $head_foot->save();
        return redirect('admin/header-footer/list')->with('editsucess','Sửa thành công');
    }
}
