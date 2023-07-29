<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\service;
use App\historyerror;
use App\historyErorLog;
use DB,Auth,Validator;

class ServiceController extends Controller
{
    public function getlist($id)
    {
         $name  = service::select('service_name')->where('id', $id)->first();

         $data = DB::table('history_error')->select('history_error.*','list_error.filename','list_error.error_name AS lap')
        ->leftjoin('list_error', 'history_error.error', '=', 'list_error.error_code')
        ->where('list_error.status','>',0)
        ->where('history_error.status','<',2)->where('history_error.id_Service',$id)
        ->get();
        $groupReason = DB::table('reasonGroup')->where('parentId',0)->get();
        return view('backend.sevice.list', compact('name', 'data','groupReason'));
    }
    public function allService()
    {    
         $data  = historyerror::where('status','<','2')->get();
         $groupReason = DB::table('reasonGroup')->get();
         return view('backend.sevice.all', compact('data','groupReason'));
    }
    public function getView($view, $id)
    {
        $user = Auth::user()->name;
        $date = Date('d/m/Y H:i:s');
        DB::table('history_error')->where('id', $id)->update(['status' => $view]);
        DB::table('history_error')->where('id', $id)->update(['userView' => $user]);
        DB::table('history_error')->where('id', $id)->update(['TimeViewUser' => $date]);

        $view = DB::table('history_error')->select('status')->where('id', $id)->first();
        $date = DB::table('history_error')->select('TimeViewUser')->where('id', $id)->first();
        $user = DB::table('history_error')->select('userView')->where('id', $id)->first();
        //return($view,$date,$user );
        return view('backend.Status.view',compact('view','date', 'user'));
    }

    public function getViewList($reason, $DFfect,$idHfix, $Des, $Idhis,$SId)
    {
        $status = 2;
        DB::table('history_error')->where('id', $Idhis)->update(['status' => $status]);
        $historyErorLog = new historyErorLog;
        $historyErorLog->reasonData = $reason;
        $historyErorLog->affect = $DFfect;
        $historyErorLog->HowToFix = $idHfix;
        $historyErorLog->Note = $Des;
        $historyErorLog->HistoryErrorId = $Idhis;
        $historyErorLog->save();

        $data = DB::table('history_error')->select('history_error.*','list_error.filename','list_error.error_name AS lap')
        ->leftjoin('list_error', 'history_error.error', '=', 'list_error.error_code')
        ->where('list_error.status','>',0)
        ->where('history_error.status','<',2)->where('history_error.id_Service',$SId)
        ->get();

        return view('backend.Status.closeList', compact('data'));
    }
    public function getreason($reason, $DFfect,$idHfix, $Des, $Idhis)
    {
        $status = 2;
        DB::table('history_error')->where('id', $Idhis)->update(['status' => $status]);
        $historyErorLog = new historyErorLog;
        $historyErorLog->reasonData = $reason;
        $historyErorLog->affect = $DFfect;
        $historyErorLog->HowToFix = $idHfix;
        $historyErorLog->Note = $Des;
        $historyErorLog->HistoryErrorId = $Idhis;
        $historyErorLog->save();
        $data = DB::table('history_error')->select('history_error.*','list_error.filename','list_error.error_name AS lap')
        ->leftjoin('list_error', 'history_error.error', '=', 'list_error.error_code')
        ->where('list_error.status','>',0)
        ->where('history_error.status','<',2)
        ->get();
        return view('backend.Status.closeWarring', compact('data'));
    }

      public function getreason2($reason, $DFfect,$idHfix, $Des, $Idhis)
    {
        $status = 2;
        DB::table('history_error')->where('id', $Idhis)->update(['status' => $status]);
        $historyErorLog = new historyErorLog;
        $historyErorLog->reasonData = $reason;
        $historyErorLog->affect = $DFfect;
        $historyErorLog->HowToFix = $idHfix;
        $historyErorLog->Note = $Des;
        $historyErorLog->HistoryErrorId = $Idhis;
        $historyErorLog->save();
        $data = DB::table('history_error')->select('history_error.*','list_error.filename','list_error.error_name AS lap')
        ->leftjoin('list_error', 'history_error.error', '=', 'list_error.error_code')
        ->where('list_error.status','=',0)
        ->where('history_error.status','<',2)
        ->get();
        return view('backend.Status.closeWarring2', compact('data'));
    }
    public function getlistService()
    {
        $data = service::orderBy('id','desc')->get();
        return view('backend.sevice.listService', compact('data'));
    }
    public function getadd()
    {
        return view('backend.sevice.add');
    }
    public function postadd(Request $Request)
    {
        $validate = Validator::make(
            $Request->all(),
            [
                'service_code' => 'required|unique:service,service_code',
                'service_name' => 'required',
                'service_management' => 'required',
                'phone_number' => 'required|min:9',
                'service_code' => 'required',
                'channel_region' => 'required',
            ],

            [
                'required' => 'Không được để trống',
                'unique' => 'Bị trùng service',
            ]

        );

        if ($validate->fails()) {
            return View('backend.sevice.add')->withErrors($validate);
        }
        $service = new service;
        $service->service_name= $Request->service_name;
        $service->service_management= $Request->service_management;
        $service->phone_number= $Request->phone_number;
        $service->service_code= $Request->service_code;
        $service->channel_region= $Request->channel_region;
        $service->save();
        return redirect('admin/service/listService')->with('addsucess','Thêm thành công');
    }
    public function getedit($item)
    {   
        $data = json_decode($item);
        $service = service::find($data->id);
        $service->service_name= $data->service_name;
        $service->service_management= $data->service_management;
        $service->phone_number= $data->phone_number;
        $service->service_code= $data->service_code;
        $service->channel_region= $data->channel_region;
        $service->save();
        $datanew = service::all();
        return view('backend.sevice.editajax', compact('datanew'));
    }
    public function getdelete($id)
    {
        $khachhang = service::find($id);
        $khachhang->delete();
        $datanew = service::all();
        return view('backend.sevice.deleteajax', compact('datanew'));
    }
}
