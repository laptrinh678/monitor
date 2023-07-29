<?php

namespace App\Http\Controllers\backend\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\service;
use App\historyerror;
use App\historyErorLog;
use DB,Auth;

class homecontroller extends Controller
{
    public function getlist()
    {
        // truy vấn nối bảng history_error với bảng list_error;
        // hai bảng này có cột id giống nhau; nếu không sử dụng select('history_error.*')
        // php sẽ không hiểu là lấy id của bảng nào, nó sẽ lấy nhầm 18/5/2019
        // viettel tang 13
        $data = DB::table('history_error')->select('history_error.*','list_error.filename','list_error.error_name AS lap')
        ->leftjoin('list_error', 'history_error.error', '=', 'list_error.error_code')
        ->where('list_error.status','>',0)
        ->where('history_error.status','<',2)
        ->get();

        $data2 = DB::table('history_error')->select('history_error.*','list_error.filename','list_error.error_name AS lap')
        ->leftjoin('list_error', 'history_error.error', '=', 'list_error.error_code')
        ->where('list_error.status','=',0)
        ->where('history_error.status','<',2)
        ->get();


         $groupReason = DB::table('reasonGroup')->where('parentId',0)->get();
         return view('backend.master.home',
        compact('data','groupReason','data2'));
    }
    public function getajax()
    {
        $data = DB::table('history_error')->select('history_error.*','list_error.filename','list_error.error_name AS lap')
        ->leftjoin('list_error', 'history_error.error', '=', 'list_error.error_code')
        ->where('list_error.status','>',0)
        ->where('history_error.status','<',2)
        ->get();
         return view('backend.master.DaAjaxhome', compact('data'));
    }
    public function getajax2()
    {
        $data = DB::table('history_error')->select('history_error.*','list_error.filename','list_error.error_name AS lap')
        ->leftjoin('list_error', 'history_error.error', '=', 'list_error.error_code')
        ->where('list_error.status','=',0)
        ->where('history_error.status','<',2)
        ->get();
         return view('backend.master.DaAjaxhome2', compact('data'));
    }
}
