<?php

namespace App\Http\Controllers\backend\slider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\slidermodel;
use File;

class slider_nocontroller extends Controller
{
    public function getlist()
    {
        $slider = slidermodel::all();
    	return view('backend.slider.list', compact('slider'));
    }
    public function getadd()
    {
    	return view('backend.slider.add');
    }
    public function postadd(Request $request)
    {
    	$slider = new slidermodel;
        $slider->thongtin1 = $request->thongtin1;
        $slider->thongtin2 = $request->thongtin2;
        $slider->thongtin3 = $request->thongtin3;
        $slider->thongtin4 = $request->thongtin4;
        $file_img = $request->img;
        $name_img = $file_img ->getClientOriginalName();

            $str_name_img = str_random(5)."-".$name_img;
            while (file_exists('public/backend/slider/'.$str_name_img)) 
            {
            $str_name_img = str_random(5)."-".$name_img;
            }
            $file_img->move('public/backend/slider/',$str_name_img);
            $slider->img = $str_name_img;
        $slider->save();
        return redirect('admin/slider/list')->with('addsuccess','Thêm thành công');
    }
    public function getedit(Request $request, $id)
    {
        $sliderid = slidermodel::find($id);
        return view('backend.slider.edit', compact('sliderid'));
    }
    public function postedit(Request $request, $id)
    {
        $sliderid = slidermodel::find($id);
        $sliderid->thongtin1 = $request->thongtin1;
        $sliderid->thongtin2 = $request->thongtin2;
        $sliderid->thongtin3 = $request->thongtin3;
        $sliderid->thongtin4 = $request->thongtin4;
                // /*lấy ảnh icon cũ*///
        $old_img                = 'public/backend/slider/'. $sliderid->img;
        if($request->hasFile('newimg'))
        {
            $file_newimg = $request->file('newimg');
            $name_newimg = $file_newimg->getClientOriginalName();
            $str_name_newimg = str_random(5)."-".$name_newimg;
            while (file_exists('public/backend/slider/'.$str_name_newimg)) 
            {
            $str_name_newimg = str_random(5)."-".$name_newimg;
            }
            $file_newimg->move('public/backend/slider/',$str_name_newimg);
            $sliderid->img = $str_name_newimg;
            // /*xoa ảnh icon cũ*///
            if(File::exists($old_img)){
            File::delete($old_img);
            }
        }
        $sliderid->save();
        return  redirect('admin/slider/list')->with('editsucess','Sửa thành công');
    }
    public function getdelete($id)
    {
        $sliderdelete = slidermodel::find($id);
        $sliderdelete->delete();
        return back()->with('deletesucess','Xóa thành công');
    }
}
