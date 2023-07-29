<?php

namespace App\Http\Controllers\backend\member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\backend\member\addrequest;
use App\Http\Requests\backend\member\editRequest;
use DB,Session,DateTime;
use App\User;
use App\processModel;
// CHỨC NĂNG QUẢN LÝ THÀNH VIÊN LÀM NGÀY 13 THÁNG 10 NĂM 2017 TẠI 28/199/110 ĐỊNH CÔNG
class membercontroller extends Controller
{
    public function getlist()
    {
        $users = User::all();
    	return view('backend.member.list', compact('users','process'));
    }
    public function getadd()
    {   
       $process = processModel:: select('process_id','process_code')->orderBy('process_id','desc')->get();
    	return view('backend.member.add', compact('process'));
    }
    public function postadd(addrequest $request)
    {
            $process_id = $request->process_id;
            $users = new User;
            $users->name = $request->member_name;
            $users->email = $request->member_mail;
            $users->password =  bcrypt($request->member_pass);
            $users->level = $request->member_level;
            $users->process_id = implode (',', $process_id);
            $users->sms_level = $request->sms_level;
            $users->sms_settings = '1';
        $users->save();
         return redirect('admin/member/list')->with(['addUser'=>'Thêm thành viên thành công']);
    }
    // CHUC NĂNG SỬA THÀNH VIÊN
    public function getedit($id)
    {
        $process = processModel:: select('process_id','process_code')->orderBy('process_id','desc')->get();
        $users= User::where('id',$id)->get();
        return view('backend.member.edit',compact('users','process'));
    }
    public function postedit(editRequest $request, $id)
    {
        $users = User::find($id);
            $users->name = $request->member_name;
            $users->email = $request->member_mail;
            if($users->password != null)
            {
                 $users->password =  bcrypt($request->member_pass);
            }
            $users->level = $request->member_level;
        $users->save();
        return redirect('admin/member/list')->with(['editUser'=>'Sửa thành viên thành công']);    
    }
    public function getdelete($id)
    {
        $users = User::find($id);
        $users->delete();
        return back();
    }
}
