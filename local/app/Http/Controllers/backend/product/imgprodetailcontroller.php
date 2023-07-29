<?php

namespace App\Http\Controllers\backend\product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\productmodel;
use App\productimgdetail;
use File;

class imgprodetailcontroller extends Controller
{
    public function getlist()
    {
        $listimg = productimgdetail::all();
      
    	return view('backend.product.imgprodetail.list',compact('listimg'));
    }
    public function getadd()
    {
    	 $product = productmodel::all();
    	return view('backend.product.imgprodetail.add', compact('product'));
    }

    public function postadd(Request $request)
    {
        
       
         if($request->hasFile('imgdetail'))
        {
            $imgdetail = $request->file('imgdetail');
            $images=array();
             if($imgdetail=$request->file('imgdetail'))
             {
                foreach($imgdetail as $file)
                {
                    $name=$file->getClientOriginalName();
                    $file->move('public/backend/imgdetail/',$name);
                    $images[]=$name;
                }
             }
        }

        /*
          if($request->hasFile('mausac'))
        {
            $imgmausac = $request->file('mausac');
            $images_mausac=array();
             if($imgmausac=$request->file('mausac'))
             {
                foreach($imgmausac as $file)
                {
                    $name_mausac=$file->getClientOriginalName();
                    $file->move('public/backend/mausac/',$name_mausac);
                    $images_mausac[]=$name_mausac;
                }
             }
        }
        */


        $imgdetail = new productimgdetail;
        $imgdetail->img = json_encode($images);
        $imgdetail->product_id = $request->product_id;
        $imgdetail->save();
        return redirect('admin/product/imgprodetail/list')->with('addsucess','Thêm thành công');
        
    }


    public function getedit($id)
    {   $product = productmodel::all();
        $imgdeid = productimgdetail::find($id);
        return view('backend.product.imgprodetail.edit',compact('product','imgdeid'));
    }
    public function postedit(Request $request, $id)
    {
        
        if($request->hasFile('img_edit'))
        {
            $img_edit = $request->file('img_edit');
            $images = array();
            if($img_edit=$request->file('img_edit'))
            {
                foreach ($img_edit as $file)
                {
                    $name=$file->getClientOriginalName();
                    $file->move('public/backend/imgdetail/',$name);
                    $images[]=$name;
                }
            }
        
        }

         /*if($request->hasFile('mausac_edit'))
        {
            $mausac_edit = $request->file('mausac_edit');
            $images_ms = array();
            if($img_edit=$request->file('mausac_edit'))
            {
                foreach ($mausac_edit as $file)
                {
                    $name_mausac=$file->getClientOriginalName();
                    $file->move('public/backend/mausac/',$name_mausac);
                    $images_ms[]=$name_mausac;
                }
            }
        
        }
        */
       
        $imgdeid ->img = json_encode($images);
        $imgdeid ->product_id =$request->product_id;
        $imgdeid->save();
        return redirect('admin/product/imgprodetail/list')->with('editsucess','Sửa thành công');
    }
    public function getdelete($id)
    {
        $imgdelete = productimgdetail::find($id);
        $imgdelete->delete();
        return back()->with('deletesucess','Xóa thành công');
    }
}
