<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\errorModel;
use App\limitedvalue;
use DB,Auth,Validator;
use Carbon\Carbon;

class ErrorSloveController extends Controller
{
    public function getlist()
    {
    	
/*
       $data = DB::table('list_error')
            ->leftJoin('process', 'list_error.process_code', '=', 'process.process_id')
            ->select('list_error.*', 'process.process_name', 'process.tag')
            ->orderBy('id','desc')
            ->get();
        //tryu vấn nối bảng kiểu này data lấy được nhanh gấp 10 lần qua model dd($data);*/
        $error = DB::table('list_error')->select('error_code','id')->get();
        return view('backend.error_solve.list', compact('data','error'));
    }
    public function getadd($itemJson)
    {   
        $itemdecode = json_decode($itemJson);
        $error_code = $itemdecode->error_code;
        $process_code = $itemdecode->process_code;
        $proce = DB::table('process')->get();
        $a = DB::table('list_error')->select('error_code')->where('error_code',$error_code)->first();
        $b = DB::table('list_error')->select('process_code')->where('process_code',$process_code)->first();

        if ($a !=null&&$b !=null) 
         {
           return View('backend.error.add');
         }
         else
         {
            $data = new errorModel;
            $data->error_code = $itemdecode->error_code;
            $data->process_code = $itemdecode->process_code;
            $data->error_name = $itemdecode->error_name;
            $data->solve = $itemdecode->solve;
            $data->status = $itemdecode->status;
            if($itemdecode->statusmess==null)
            {
                $data->statusmess = 0;
            }else
            {
                $data->statusmess = $itemdecode->statusmess;
            }
            $data->user = Auth::user()->name;
            $data->save();
            $dataLimited = new limitedvalue;
            $dataLimited->error_code = $itemdecode->error_code;
            $dataLimited->day_of_week = '1,2,3,4,5,6,7';
            $dataLimited->hour_of_day = '0-23';
            $dataLimited->limited_value ='0';
            $dataLimited->level =  '1';
            $dataLimited->user =  Auth::user()->name;
            $dataLimited->time = Carbon::now('Asia/Ho_Chi_Minh');
            $dataLimited->save();

            $datanew = DB::table('list_error')
            ->leftJoin('process', 'list_error.process_code', '=', 'process.process_id')
            ->select('list_error.*', 'process.process_name', 'process.tag')
            ->orderBy('id','desc')
            ->get();

            return view('backend.error.ajaxadd', compact('datanew'));
        }
    }
    public function getedit($itemJson,$id)
    {	
        $itemdecode = json_decode($itemJson);
        $data = errorModel::find($id);
        $errnameOld = $data->error_code;
        DB::table('limited_value')->where('error_code', $errnameOld)
        ->update(['error_code' => $itemdecode->error_code]);

        $data->error_code = $itemdecode->error_code;
        $data->process_code = $itemdecode->process_code;
        $data->error_name = $itemdecode->error_name;
        $data->solve = $itemdecode->solve;
        $data->status = $itemdecode->status;
        if($itemdecode->statusmess==null)
        {
            $data->statusmess = 0;
        }else
        {
            $data->statusmess = $itemdecode->statusmess;
        }
        $data->user = Auth::user()->name;
        $data->save();

    	$datanew = DB::table('list_error')
            ->leftJoin('process', 'list_error.process_code', '=', 'process.process_id')
            ->select('list_error.*', 'process.process_name', 'process.tag')
            ->orderBy('id','desc')
            ->get();

        return view('backend.error.editajax', compact('datanew'));
    }


     public function postedit(Request $Request, $id)
    {
        $data = errorModel::find($id);
        $errnameOld = $data->error_code;
        DB::table('limited_value')->where('error_code', $errnameOld)->update(['error_code' => $Request->error_code]);

        $data->error_code = $Request->error_code;
    	$data->process_code = $Request->process_code;
    	$data->error_name = $Request->error_name;
    	$data->solve = $Request->solve;
        if($Request->statusmess==null)
        {
            $data->statusmess = 0;
        }else
        {
            $data->statusmess = $Request->statusmess;
        }
    	$data->user = Auth::user()->name;
        $data->save();
    return redirect('admin/error/list')->with('editsucess','Sửa thành công');
    }
    public function getdelete($id)
    {
    	 $error = errorModel::find($id);
         $error->delete();

         $data = DB::table('list_error')
            ->leftJoin('process', 'list_error.process_code', '=', 'process.process_id')
            ->select('list_error.*', 'process.process_name', 'process.tag')
            ->orderBy('id','desc')
            ->get();

         return view('backend.error.deleteajax', compact('data'));
    }
    public function getstatus($ac, $id)
    {
         DB::table('list_error')
                ->where('id', $id)
                ->update(['status' => $ac]);
         $data = DB::table('list_error')->select('status','id')->where('id', $id)->first();
         return view('backend.error.ajaxstatus', compact('data'));
    }
    public function getstatusMe($ac,$id)
    {
         DB::table('list_error')
                ->where('id', $id)
                ->update(['statusmess' => $ac]);
         $data = DB::table('list_error')->select('statusmess','id')->where('id', $id)->first();
         return view('backend.error.ajaxmess', compact('data'));
    }

}
