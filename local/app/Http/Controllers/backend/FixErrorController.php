<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\FixErrorModel;
use App\limitedvalue;
use DB,Auth,Validator;
use Carbon\Carbon;

class FixErrorController extends Controller
{
    public function getlist()
    {
    	$data = FixErrorModel::orderBy('id','desc')->get();
        return view('backend.FixError.list', compact('data'));
    }
    public function getadd($er,$Ds,$sT,$En,$li,$le)
    {   
        $startTime = abs($sT);
        $endtime = abs($En);
        $data = new FixErrorModel;
        $data->error_code = $er;
        $data->day_of_week = $Ds;
        $data->hour_of_day = $startTime .'-'.$endtime;
        $data->limited_value = $li;
        $data->level = $le;
        $data->time = Carbon::now('Asia/Ho_Chi_Minh');
        $data->user =  Auth::user()->name;
        $data->save();
        $data = FixErrorModel::orderBy('id','desc')->get();
        return view('backend.FixError.ajaxadd', compact('data'));
    }
    public function getedit($id)
    {	
    	 $data = FixErrorModel::find($id);
         $time = FixErrorModel::select('hour_of_day')->where('id',$id)->first();
         $time2 = $time->hour_of_day;
         $timeDecode = json_decode($time2, true);
         return view('backend.FixError.edit', compact('data','timeDecode'));
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
        $data->time = Carbon::now('Asia/Ho_Chi_Minh');
        $data->user =  Auth::user()->name;
        $data->save();
        $dataUpdate = FixErrorModel::orderBy('id','desc')->get();
        return view('backend.FixError.ajaxUpdate', compact('dataUpdate'));
    }
    public function getdelete($id)
    {
    	 $error = FixErrorModel::find($id);
         $error->delete();
         $data = FixErrorModel::orderBy('id','desc')->get();
         $datadelete = FixErrorModel::orderBy('id','desc')->get();
         return view('backend.FixError.deleteajax', compact('datadelete'));
    }

}
