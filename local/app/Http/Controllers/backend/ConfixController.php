<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\liveModel;
use App\processModel;
use DB,Auth,Validator;
use App\User; 
use App\historyerror;
use Carbon\Carbon;
use App\alertmapping;

class ConfixController extends Controller
{
    public function getlist()
    {
    	

        $data = DB::table('alert_mapping')
            ->leftJoin('process', 'alert_mapping.process_id', '=', 'process.process_id')
            ->select('alert_mapping.*', 'process.process_name', 'process.tag')
            ->orderBy('id','desc')
            ->get();
        $process = processModel::orderBy('process_id','desc')->get();
        return view('backend.confix.list', compact('data','process'));
    }
    public function getadd($itemjson)
    {   
        $item = json_decode($itemjson);
        $data = new alertmapping;
        $data->ip_sour = $item->Ip_sour;
        $data->ip_dest = $item->Ip_dest;
        $data->port_dest =  $item->Port_dest;
        $data->active = $item->statusmess;
        $data->process_id = $item->process;
        
        if($item->Ip_pro=='')
        {
            $data->ip_pro =  '';
        }else
        {
            $data->ip_pro =  $item->Ip_pro;
        }
        
        if($item->Port_pro=='')
        {
             $data->port_pro =  0;
        }else
        {
             $data->port_pro =  $item->Port_pro;
        }

        if($item->User_pro=='')
        {
            $data->user_pro =  '';
        }else
        {
             $data->user_pro =  $item->User_pro;
        }

        if($item->Pass_pro=='')
        {
              $data->pass_pro =  '';
        }else
        {
             $data->pass_pro =  $item->Pass_pro;
        }
       
        $data->save();

        $data2 = DB::table('alert_mapping')
            ->leftJoin('process', 'alert_mapping.process_id', '=', 'process.process_id')
            ->select('alert_mapping.*', 'process.process_name', 'process.tag')
            ->orderBy('id','desc')
            ->get();

        return view('backend.confix.ajaxadd', compact('data2'));
    }
    public function getupdate($itemjson)
    {	
         $itemdecode = json_decode($itemjson);
    	 $data = alertmapping::find($itemdecode->id);
         $data->ip_sour = $itemdecode->Ip_sour;
         $data->ip_dest = $itemdecode->Ip_dest;
         $data->port_dest =  $itemdecode->Port_dest;
         $data->active = $itemdecode->statusmess;
         $data->process_id = $itemdecode->process_id;
         
         if($itemdecode->Ip_pro=='')
         {
            $data->ip_pro =  '';
         }else
         {
             $data->ip_pro =  $itemdecode->Ip_pro;
         }
         if($itemdecode->Port_pro=='')
         {
             $data->port_pro =  0;
         }
         else
         {
             $data->port_pro =  $itemdecode->Port_pro;
         }
         if($itemdecode->User_pro=='')
         {
            $data->user_pro =  '';
         }else
         {
             $data->user_pro =  $itemdecode->User_pro;
         }
         if($itemdecode->Pass_pro=='')
         {
             $data->pass_pro =  '';
         }else
         {
             $data->pass_pro =  $itemdecode->Pass_pro;
         }
        
         $data->save();

         $data2 = DB::table('alert_mapping')
            ->leftJoin('process', 'alert_mapping.process_id', '=', 'process.process_id')
            ->select('alert_mapping.*', 'process.process_name', 'process.tag')
            ->orderBy('id','desc')
            ->get();

         return view('backend.confix.editajax', compact('data2'));
    }
    /* public function postedit($id,$Ds,$sT,$En,$li,$le)
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
    }*/
    public function getdelete($id)
    {
    	 $error = alertmapping::find($id);
         $error->delete();

         $data = DB::table('alert_mapping')
            ->leftJoin('process', 'alert_mapping.process_id', '=', 'process.process_id')
            ->select('alert_mapping.*', 'process.process_name', 'process.tag')
            ->orderBy('id','desc')
            ->get();

         return view('backend.confix.deleteajax', compact('data'));
    }
    public function getactive($ac, $id)
    {
          DB::table('alert_mapping')
                ->where('id', $id)
                ->update(['active' => $ac]);
         $data = DB::table('alert_mapping')->select('active','id')->where('id', $id)->first();
         return view('backend.confix.ajaxactive', compact('data'));
    }

}
