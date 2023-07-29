<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\processModel;
use DB,Auth;
use Validator;

class ProcessController extends Controller
{
    public function getlist()
    {
    	$data = processModel::orderBy('process_id','desc')->get();;
        return view('backend.process.list', compact('data'));
    }
    public function getadd()
    {   
    	 $service = DB::table('service')->get();
         return view('backend.process.add', compact('service'));
    }
    public function postadd(Request $Request)
    {
         $validate = Validator::make(
            $Request->all(),
            [
                'process_code' => 'required|unique:process,process_code',
               /* 'start_time' => 'required',
                'period_time' => 'required',
                'tag' => 'required',
                'process_class' => 'required',
                'process_method' => 'required',*/
                'service_code' => 'required',
                'process_name' => 'required',
            ],

            [
                'required' => 'Không được để trống',
                'unique' => 'Không được trùng',
            ]

        );

        if ($validate->fails()) {
            return View('backend/process/add')->withErrors($validate);
        }

    	$data = new processModel;
    	$data->process_code = $Request->process_code;
        $data->process_name = $Request->process_name;
        if($data->start_time !=null)
        {
            $data->start_time = $Request->start_time;
        }else
        {
            $data->start_time ='2019-06-08 00:00:00';
        }

         if($data->period_time !=null)
        {
           $data->period_time = $Request->period_time;
        }else
        {
            $data->period_time ='2019-06-08 00:00:00';
        }	
    	$data->tag = $Request->tag;
        $data->process_class = $Request->process_class;
        $data->process_method = $Request->process_method;
        $data->service_code = $Request->service_code;
        $data->phonenumber = $Request->phonenumber;
       
    	$data->status = 1;
    	$data->user = Auth::user()->name;
    	//dd($data);
        $data->save();
        return redirect('admin/process/list')->with('addsucess','Thêm mới thành công');
    }
    public function getedit($id)
    {	
    	 $data = processModel::where('process_id',$id)->first();
         //dd($data);
         return view('backend.process.edit', compact('data'));
    }
     public function postedit(Request $Request, $id)
    {   
        $start_time ='';
        if($Request->start_time !=null)
        {
            $start_time = $Request->start_time;

        }else
        {
            $start_time ='2019-06-08 00:00:00';
        }

        $period_time ='';
        if($Request->period_time !=null)
        {
           $period_time= $Request->period_time;
        }else
        {
            $period_time='2019-06-08 00:00:00';
        }


        DB::table('process')->where('process_id',$id)
        ->update(
            [
                'process_code'=>$Request->process_code,
                'process_name'=>$Request->process_name,
                'start_time'=>$start_time,
                'period_time'=> $period_time,
                'tag'=>$Request->tag,
                'process_class'=>$Request->process_class,
                'process_method'=>$Request->process_method,
                'service_code'=>$Request->service_code,
                'phonenumber' => $Request->phonenumber,
                'user'=>Auth::user()->name
            ]
        );


        return redirect('admin/process/list')->with('editsucess','Sửa thành công');
    }
    public function getdelete($id)
    {    
         DB::table('process')->where('process_id',$id)->delete();
        return redirect('admin/process/list')->with('deletesucess','Xóa thành công');
    }

}
