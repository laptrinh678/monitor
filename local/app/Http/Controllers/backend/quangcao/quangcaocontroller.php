<?php

namespace App\Http\Controllers\backend\quangcao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\quangcaomodel;
use File;

class quangcaocontroller extends Controller
{
    public function getlist()
    {
    	$data['quangcao'] = quangcaomodel::all();
    	return view('backend.quangcao.list',$data);
    }
    public function getadd()
    {
    	return view('backend.quangcao.add');
    }
    public function postadd(Request $request)
    {
    	$quangcao = new quangcaomodel;
        $quangcao->thongtin1 = $request->thongtin1;
        $quangcao->thongtin2 = $request->thongtin2;
        $quangcao->thongtin3 = $request->thongtin3;
        $quangcao->thongtin4 = $request->thongtin4;
        $file_img = $request->img;
        $name_img = $file_img ->getClientOriginalName();

            $str_name_img = str_random(5)."-".$name_img;
            while (file_exists('public/backend/block/'.$str_name_img)) 
            {
            $str_name_img = str_random(5)."-".$name_img;
            }
            $file_img->move('public/backend/block/',$str_name_img);
            $quangcao->img = $str_name_img;
        $quangcao->save();
        return redirect('admin/quangcao/list')->with('addsuccess','Thêm thành công');
    }
    public function getedit($id)
    {
    	$qc_dt_id = quangcaomodel::find($id);
    	return view('backend.quangcao.edit', compact('qc_dt_id'));
    }
    public function postedit(Request $request, $id)
    {
    	 $quangcaoid = quangcaomodel::find($id);
        $quangcaoid->thongtin1 = $request->thongtin1;
        $quangcaoid->thongtin2 = $request->thongtin2;
        $quangcaoid->thongtin3 = $request->thongtin3;
        $quangcaoid->thongtin4 = $request->thongtin4;
                // /*lấy ảnh icon cũ*///
        $old_img                = 'public/backend/block/'. $quangcaoid->img;
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
            $quangcaoid->img = $str_name_newimg;
            // /*xoa ảnh icon cũ*///
            if(File::exists($old_img)){
            File::delete($old_img);
            }
        }
        $quangcaoid->save();
        return  redirect('admin/quangcao/list')->with('editsucess','Sửa thành công');

    }
    public function getdelete($id)
    {
        $blockdelete = quangcaomodel::find($id);
        $blockdelete->delete();
        return back()->with('deletesucess','Xóa thành công');
    }
}
