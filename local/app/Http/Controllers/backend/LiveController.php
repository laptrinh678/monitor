<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\liveModel;
use App\handoverModel;
use DB,Auth,Validator;
use App\User; 
use App\historyerror;
use Carbon\Carbon;
use App\upload;

class LiveController extends Controller
{
    public function getlist()
    {
    	$total = historyerror::count();
    	$oldview = historyerror:: where('status',1)->count();
    	$close = historyerror:: where('status',2)->count();
    	$inventory = historyerror:: where('status','<',2)->count();
    	$handoverModel = handoverModel::all();	

      //$data = historyerror::where('time','>','2019-05-26')->where('time','<','2019-05-30')->get();
      //dd($data);

    	$data = User::all();
    	$data2 = liveModel:: orderBy('id','desc')->get();
        return view('backend.live.list', compact('data','data2','total','oldview','close','inventory','handoverModel'));
    }
    public function getadd($users,$sT,$date3)
    {   
        $data = new liveModel;
        $data->user = $users;
        $data->shipt = $sT;
        $data->datetime = $date3;
        $data->useradd =  Auth::user()->name;
        $data->save();
        $data = liveModel::all();
        $data2 = liveModel:: orderBy('id','desc')->get();
        return view('backend.live.ajaxadd', compact('data2'));
    }

    public function addhandover($item)
    {
    	$itemdecode = json_decode($item);
    	$data = new handoverModel;
    	$data->name= $itemdecode->name;
    	$data->mesage= $itemdecode->mesage;
    	$data->note= $itemdecode->note;
    	$data->created_at= Carbon::now('Asia/Ho_Chi_Minh');
    	$data->save();
    	$data2 = handoverModel:: orderBy('id','desc')->get();
        return view('backend.live.addhandover', compact('data2'));
    }
    
    public function getupdate($id,$users,$date2,$sT)
    {	
    	 $data = liveModel::find($id);
         $data->user = $users;
         $data->shipt = $sT;
         $data->datetime = $date2;
         $data->useradd =  Auth::user()->name;
         $data->save();
         $data2 = liveModel:: orderBy('id','desc')->get();
         return view('backend.live.editItem', compact('data2'));
    }
     public function postedit($id,$Ds,$sT,$En,$li,$le)
    {
        $startTime = abs($sT);
        $endtime = abs($En);
        $data = FixErrorModel::find($id);
    	$data->day_of_week = $Ds;
    	$data->hour_of_day = $startTime .'-'.$endtime;
    	$data->limited_value = $li;
        $data->level = $le;
        $data->user =  Auth::user()->name;
        $data->save();
        $dataUpdate = FixErrorModel::orderBy('id','desc')->get();
        return view('backend.FixError.ajaxUpdate', compact('dataUpdate'));
    }
    public function getdelete($id)
    {
    	 $error = liveModel::find($id);
         $error->delete();
         $data = liveModel::orderBy('id','desc')->get();
         return view('backend.live.deleteajax', compact('data'));
        
    }
    public function getload()
    {
        $data = upload::orderBy('id','desc')->get();
        return view('backend.live.upload', compact('data'));
    }
    public function postload(Request $request)
    {
         $validation = Validator::make($request->all(), [
          'select_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
         ]);
         if($validation->passes())
         {
          $image = $request->file('select_file');
          $new_name = rand() . '.' . $image->getClientOriginalExtension();
          $image->move('public/backend/product/', $new_name);
          $name = $request->name;
          $data = new upload;
          $data->name = $name;
          $data->image = $new_name;
          $data->save();
          $data2 = upload::orderBy('id','desc')->get();
          return view('backend.live.uploadlist', compact('data2'));
         }
         else
         {
          return response()->json([
           'message'   => $validation->errors()->all(),
           'uploaded_image' => '',
           'class_name'  => 'alert-danger'
          ]);
         }
    }
    public function postedititem(Request $request)
    {
        //return 'ok';
        $validation = Validator::make($request->all(), [
          'file_edit' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
         ]);
         if($validation->passes())
         {
          $image = $request->file('file_edit');
          $new_name = rand() . '.' . $image->getClientOriginalExtension();
          $image->move('public/backend/product/', $new_name);
          //return '0k';

          $data = upload::find($request->iditem);
          $data->name = $request->name;
          $data->image = $new_name;
          $data->save();
          $data2 = upload::orderBy('id','desc')->get();
          return view('backend.live.edituploadfile', compact('data2'));
         }
         else
         {
          return response()->json([
           'message'   => $validation->errors()->all(),
           'uploaded_image' => '',
           'class_name'  => 'alert-danger'
          ]);
         }
    }

    public function searchdate($startdate, $enddate)
    {

       $data = historyerror::where('time','>',$startdate)->where('time','<',$enddate)->get();
       return view('backend.live.searchdate', compact('data'));
    }

}
