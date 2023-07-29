<?php

namespace App\Http\Controllers\backend\member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\backend\member\loginrequest;
use Auth, DB;
use App\User;

class logincontroller extends Controller
{
    public function getlogin()
    {
    		return view('backend.member.login');
    }
    public function postlogin(loginrequest $request)
    {
    	$login = [
    		'name'=>$request->email,
    		'password'=>$request->password,
    	];
    	if(Auth::attempt($login)){
             $name = Auth::user()->name;
             $password = Auth::user()->password;
             $status = 1;
        DB::table('users')->where('name',$name)->update(['status' => $status]);

    		return redirect('admin/index')->with('success','Đăng nhập thành công');
    	}
    	else
    	{
    		return redirect()->back()->with('err','Đăng nhập thất bại');
    	}
    }
    public function getlogout()
    {    
         $name = Auth::user()->name;
         $status = 0;
         DB::table('users')->where('name',$name)->update(['status' => $status]);
         Auth::logout();
    	return redirect('/');
    }
}
