<?php

namespace App\Http\Controllers\backend\block;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\blockmodel;
use File; 

class blockcontroller extends Controller
{
     public function getlist()
    {
        $block = blockmodel::all();
    	return view('backend.block.list', compact('block'));
    }
    public function getadd()
    {
    	return view('backend.block.add');
    }
    public function postadd(Request $request)
    {
    	$block = new blockmodel;
        $block->thongtin1 = $request->thongtin1;
        $block->thongtin2 = $request->thongtin2;
        $block->thongtin3 = $request->thongtin3;
        $block->thongtin4 = $request->thongtin4;
        $file_img = $request->img;
        $name_img = $file_img ->getClientOriginalName();

            $str_name_img = str_random(5)."-".$name_img;
            while (file_exists('public/backend/block/'.$str_name_img)) 
            {
            $str_name_img = str_random(5)."-".$name_img;
            }
            $file_img->move('public/backend/block/',$str_name_img);
            $block->img = $str_name_img;
        $block->save();
        return redirect('admin/block/list')->with('addsuccess','Thêm thành công');
    }
    public function getedit($id)
    {
        $data_bl_id = blockmodel::find($id);
        //dd($data_bl_id);
        return view('backend.block.edit', compact('data_bl_id'));
    }
    public function postedit(Request $request, $id)
    {
        $blockid = blockmodel::find($id);
        $blockid->thongtin1 = $request->thongtin1;
        $blockid->thongtin2 = $request->thongtin2;
        $blockid->thongtin3 = $request->thongtin3;
        $blockid->thongtin4 = $request->thongtin4;
                // /*lấy ảnh icon cũ*///
        $old_img                = 'public/backend/block/'. $blockid->img;
        if($request->hasFile('newimg'))
        {
            $file_newimg = $request->file('newimg');
            $name_newimg = $file_newimg->getClientOriginalName();
            $str_name_newimg = str_random(5)."-".$name_newimg;
            while (file_exists('public/backend/block/'.$str_name_newimg)) 
            {
            $str_name_newimg = str_random(5)."-".$name_newimg;
            }
            $file_newimg->move('public/backend/block/',$str_name_newimg);
            $blockid->img = $str_name_newimg;
            // /*xoa ảnh icon cũ*///
            if(File::exists($old_img)){
            File::delete($old_img);
            }
        }
        $blockid->save();
        return  redirect('admin/block/list')->with('editsucess','Sửa thành công');
    }
    public function getdelete($id)
    {
        $blockdelete = blockmodel::find($id);
        $blockdelete->delete();
        return back()->with('deletesucess','Xóa thành công');
    }
    
          
}
