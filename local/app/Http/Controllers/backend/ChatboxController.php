<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\chatboxModel;
use DB,Auth;
use App\User;

class ChatboxController extends Controller
{
    public function getlist()
    {    
        $users = User::all();
        $data = chatboxModel::all();
    return view('backend.chatbox.list', compact('data','users'));
    }
    public function allService()
    {    
         $data  = historyerror::where('status','<','2')->get();
         $groupReason = DB::table('reasonGroup')->get();
         return view('backend.sevice.all', compact('data','groupReason'));
    }
    public function ContenChat($text, $user)
    {
        $chatbox = new chatboxModel; 
        $chatbox->username = $user;
        $chatbox->content = $text;
        $chatbox->save();
        $data = chatboxModel::all();
        return view('backend.chatbox.ajaxmess', compact('data'));
       
    }
    public function getajaxdata()
    {   
        //dd('0k');
        $data = chatboxModel::all();
        return view('backend.chatbox.listAjax',compact('data'));
    }

    

    
   
}
