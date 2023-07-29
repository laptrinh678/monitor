<?php

namespace App\Http\Controllers\backend\link;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\linkmodel;
//use DB;

class linkcontroller extends Controller
{
    public function getlist()
    {
    	$link = linkmodel::all();
    	//dd($link);
    	return view('backend/link/list', compact('link'));
    }
    public function getadd()
    {
    	return view('backend/link/add');
    }
    public function postadd(Request $request)
    {
    	$link = new linkmodel;
    	$link ->link_url= $request->link_url;
    	$link ->link_name= $request->link_name;
    	$link ->link_image= $request->link_image;
    	$link ->link_target= $request->link_target;
    	$link ->link_description= $request->link_description;
    	$link ->link_rel= $request->link_rel;
        $link ->save();
        return redirect('admin/link/list')->with('addsucess','Thêm mới thành công');
    }
    public function getedit($id)
    {
        $id_link = linkmodel::find($id);
        return view('backend/link/edit', compact('id_link'));
    }
     public function postedit(Request $request,$id)
    {
        $link = linkmodel::find($id);
        $link ->link_url= $request->link_url;
        $link ->link_name= $request->link_name;
        $link ->link_image= $request->link_image;
        $link ->link_target= $request->link_target;
        $link ->link_description= $request->link_description;
        $link ->link_rel= $request->link_rel;
        $link ->save();
        return redirect('admin/link/list')->with('editsucess','Sửa thành công');
    }
    public function getdelete($id)
    {

        $deleteid = linkmodel::find($id);
        $deleteid->delete();
        return redirect('admin/link/list')->with('deletesucess','Xóa thành công');
    }

}
