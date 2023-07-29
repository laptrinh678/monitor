<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\seomodel;

class seocontroller extends Controller
{
    public function getlist()
    { 
        $list_key = seomodel::all();
    	return view('backend.seo.list',compact('list_key'));
    }
    public function getadd()
    {
    	return view('backend.seo.add');
    }
    public function postadd(Request $request)
    {
    	$link = new seomodel;
        $link ->title_seo= $request->title_seo;
        $link ->alt_img= $request->alt_img;
        $link ->meta_seo= $request->meta_seo;
       //dd($link);
        $link ->save();
        return redirect('admin/seo/list')->with('addsucess','Thêm mới thành công');
    }
     public function getedit(Request $request,$id)
    {
        $tkseo = seomodel::find($id);
    	return view('backend.seo.edit', compact('tkseo'));
    }
    public function postedit(Request $request, $id)
    {
        $tkseo = seomodel::find($id);
        $tkseo ->title_seo= $request->title_seo;
        $tkseo ->alt_img= $request->alt_img;
        $tkseo ->meta_seo= $request->meta_seo;
       //dd($link);
        $tkseo ->save();
        return redirect('admin/seo/list')->with('editsucess','Sửa thành công');

    	
    }
}
