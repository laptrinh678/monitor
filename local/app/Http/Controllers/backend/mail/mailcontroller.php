<?php

namespace App\Http\Controllers\backend\mail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
class mailcontroller extends Controller
{
    public function getmail()
    {
    	return view('backend.mail.view');
    }
    public function postmail(Request $request)
    {
    	$data = [
        'name'=> $request->name,
        'description1'=>$request->description1,
        ];
        $email = $request->email;
    	Mail::send('backend.mail.sendmail',$data, function($msg) use ($email)
        {
            $msg->from('quoclapvanvan@gmail','');
            $msg->to($email)->subject('EA SHOP');

        });
         return back()->with('sensucess','Gửi email thành công');

    	
    }
}
