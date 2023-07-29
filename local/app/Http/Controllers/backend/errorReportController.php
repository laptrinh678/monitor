<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\errorModel;
use App\errorReportModel;
use DB,Auth,Validator;
use Carbon\Carbon;
use Response, File;
class errorReportController extends Controller
{
    public function getlist()
    {

        $data = errorReportModel::orderBy('id','desc')->get();
        return view('backend.thongke.list', compact('data'));

        //return 'ok';
    	/*
       $data = DB::table('list_error')
            ->leftJoin('process', 'list_error.process_code', '=', 'process.process_id')
            ->select('list_error.*', 'process.process_name', 'process.tag')
            ->orderBy('id','desc')
            ->get();
        //tryu vấn nối bảng kiểu này data lấy được nhanh gấp 10 lần qua model dd($data);
        $proce = DB::table('process')->select('process_name','process_id')->get();*/
        //return view('backend.error.list', compact('data','proce'));
    }
    public function postadd(Request $request)
    {   
            $data = new errorReportModel;
            $data->starttime = $request->starttime;
            $data->endtime = $request->endtime;
            $data->service_affected = $request->service_affected;
            $data->responsible_unit = $request->responsible_unit;
            $data->error_status = $request->error_status;
            $data->original_cause = $request->original_cause;
            $data->action_direction = $request->action_direction;

            $data->solutions = $request->solutions;
            $data->interruption_time = $request->interruption_time;
            $data->time_overcome = $request->time_overcome;

            $data->transactions_affected = $request->transactions_affected;
            $data->customers_affected = $request->customers_affected;
            $data->value_affected = $request->value_affected;
            $data->transaction_value = $request->transaction_value;
            
             if($request->hasFile('file'))
               {
                 $file_Img = $request->file('file');
                    $name_Img = $file_Img->getClientOriginalName();
                    $str_name_img = str_random(5)."-".$name_Img;
                    while (file_exists('public/backend/product/'.$str_name_img)) 
                    {
                    $str_name_img = str_random(5)."-".$name_Img;
                    }
                    $file_Img->move('public/backend/product/',$str_name_img);
                    $data->file = $str_name_img;
               }else
               {
                    $data->file = '';
               }
            $data->user = Auth::user()->name;
            $data->save();
            $datanew = errorReportModel::orderBy('id','desc')->get();
            return view('backend.thongke.add', compact('datanew'));

    }
    public function postedititem(Request $request)
    {	
        $data = errorReportModel::find($request->idedit);
        $filenameold                = 'public/backend/product/'. $data->file;
        $data->starttime = $request->starttime;
        $data->endtime = $request->endtime;
        $data->service_affected = $request->service_affected;
        $data->responsible_unit = $request->responsible_unit;
        $data->error_status = $request->error_status;
        $data->original_cause = $request->original_cause;
        $data->action_direction = $request->action_direction;
        $data->solutions = $request->solutions;
        $data->interruption_time = $request->interruption_time;
        $data->time_overcome = $request->time_overcome;
        $data->transactions_affected = $request->transactions_affected;
        $data->customers_affected = $request->customers_affected;
        $data->value_affected = $request->value_affected;
        $data->transaction_value = $request->transaction_value;
        if($request->hasFile('file'))
               {
                 $file_Img = $request->file('file');
                    $name_Img = $file_Img->getClientOriginalName();
                    $str_name_img = str_random(5)."-".$name_Img;
                    while (file_exists('public/backend/product/'.$str_name_img)) 
                    {
                    $str_name_img = str_random(5)."-".$name_Img;
                    }
                    $file_Img->move('public/backend/product/',$str_name_img);
                    $data->file = $str_name_img;
                    if(File::exists($filenameold))
                    {
                        File::delete($filenameold);
                    }
               }
        $data->user = Auth::user()->name;
        $data->save();
    	$datanew = errorReportModel::orderBy('id','desc')->get();
        return view('backend.thongke.editajax', compact('datanew'));
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
    public function getdelete($id,$error_code)
    {
    	 $error = errorModel::find($id);
         $error->delete();
         DB::table('limited_value')->where('error_code', $error_code)->delete();
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
    public function getdowload($name)
    {
         $file_path = 'public/backend/product/'.$name;
         return response()->download($file_path);
    }
    public function getdowloaderror()
    {
        return view('fontend.home.error2');
    }

}
