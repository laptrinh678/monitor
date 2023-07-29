<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\reasonModel;
use DB,Auth;

class ReasonController extends Controller
{
    public function getlist()
    {
    	$data = reasonModel::all();
        return view('backend.reason.list', compact('data'));
    }
    public function getadd()
    {    $data = reasonModel::all();
         return view('backend.reason.add', compact('data'));
    }
    public function postadd(Request $Request)
    {
    	$data = new reasonModel;
    	$data->name = $Request->name;
    	$data->parentId = $Request->parentId;
    	$data->user = Auth::user()->name;
    	//dd($data);
        $data->save();
        return redirect('admin/reason/list')->with('addsucess','Thêm mới thành công');
    }
    public function getedit($id)
    {	 $listdata = reasonModel::all();
    	 $data = reasonModel::find($id);
         return view('backend.reason.edit', compact('data','listdata'));
    }
    public function postedit(Request $Request, $id)
    {
        $data = reasonModel::find($id);
        $data->name = $Request->name;
    	$data->parentId = $Request->parentId;
        $data->save();
    return redirect('admin/reason/list')->with('editsucess','Sửa thành công');
    }
    public function getdelete($id)
    {
    	 $reason = reasonModel::find($id);
         $reason->delete();
    return redirect('admin/reason/list')->with('deletesucess','Xóa thành công');
    }   
   
}
