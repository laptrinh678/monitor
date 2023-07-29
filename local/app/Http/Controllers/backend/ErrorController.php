<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\errorModel;
use App\limitedvalue;
use DB,Auth,Validator;
use Carbon\Carbon;
use Response, File;
class ErrorController extends Controller
{
    public function getlist()
    {
    	/*$data = errorModel:: select('error_code','process_code','error_name','solve','status','id','created_at','user','statusmess')->orderBy('id','desc')->get();*/

       /*$data = DB::table('list_error')
        ->leftjoin('list_error', 'history_error.error', '=', 'list_error.error_code')
        ->where('list_error.status','>',0)
        ->where('history_error.status','<',2)
        ->get();*/

       $data = DB::table('list_error')
            ->leftJoin('process', 'list_error.process_code', '=', 'process.process_id')
            ->select('list_error.*', 'process.process_name', 'process.tag')
            ->orderBy('id','desc')
            ->get();
        //tryu vấn nối bảng kiểu này data lấy được nhanh gấp 10 lần qua model dd($data);
        $proce = DB::table('process')->select('process_name','process_id')->get();
        return view('backend.error.list', compact('data','proce'));
    }
    public function postadd(Request $request)
    {   
        $error_code = $request->error_code;
        $process_code = $request->process_code;
        $proce = DB::table('process')->get();
        $a = DB::table('list_error')->select('error_code')->where('error_code',$error_code)->first();
        $b = DB::table('list_error')->select('process_code')->where('process_code',$process_code)->first();
        if ($a !=null && $b !=null) 
         {
           return View('backend.error.add');
         }
         else
         {
            $data = new errorModel;
            $data->error_code = $request->error_code;
            $data->process_code = $request->process_code;
            $data->error_name = $request->error_name;
            $data->solve = trim($request->solve,'');
            $data->status = $request->status;
            $data->phonenumber = $request->phonenumber;
            
            if($request->statusmess==null)
            {
                $data->statusmess = 0;
            }else
            {
                $data->statusmess = $request->statusmess;
            }
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
                    $data->filename = $str_name_img;
               }else
               {
                    $data->filename = '';
               }
            $data->user = Auth::user()->name;
            $data->save();
            $dataLimited = new limitedvalue;
            $dataLimited->error_code = $request->error_code;
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
    public function postedititem(Request $request)
    {	
        $data = errorModel::find($request->idedit);
        $errnameOld = $data->error_code;
        $filenameold                = 'public/backend/product/'. $data->filename; 
        DB::table('limited_value')->where('error_code', $errnameOld)
        ->update(['error_code' => $request->error_code]);
        $data->error_code = $request->error_code;
        $data->process_code = $request->process_code;
        $data->error_name = $request->error_name;
        $data->solve = trim($request->solve,'');
        $data->status = $request->status;
        $data->phonenumber = $request->phonenumber;

        if($request->statusmess==null)
        {
            $data->statusmess = 0;
        }else
        {
            $data->statusmess = $request->statusmess;
        }
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
                    $data->filename = $str_name_img;
                    if(File::exists($filenameold)){
                        File::delete($filenameold);
                        }
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
