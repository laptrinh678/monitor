<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\QuestionModel;
use Validator;
use DB;
use Auth;
use File;
use App\Http\Requests\backend\cateProduct\QuestionEditRequest;

class QuestionController extends Controller
{
    public function getlist()
    { 
        $listQuestion = QuestionModel::orderBy('id', 'desc')->get();
    	return view('backend.Question.list', compact('listQuestion'));
    }
    public function getadd()
    {
    	return view('backend.Question.add');
    }
    public function postadd(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                /*'nameQuestion' => 'required',
                'replyA' => 'required',
                'replyB' => 'required',
                'replyC' => 'required',
                'replyD' => 'required',*/
                'chooseReply' => 'required',
                'status' => 'required',
            ],

            [
                'required' => 'Không được để trống tên câu hỏi, đáp án hoặc đáp án đúng',
                'same' => 'Nhập lại PassWord không giống PassWord ',
                'email' => 'Vui lòng nhập lại Email',
            ]

        );

        if ($validate->fails()) {
            return View('backend/Question/add')->withErrors($validate);
        }

        
    	$Question = new QuestionModel;
        $Question ->nameQuestion= $request->nameQuestion;
        $Question ->imgQuestion= $request->imgQuestion;

        $Question ->imgreplyA= $request->imgreplyA;
        $Question ->imgreplyB= $request->imgreplyB;
        $Question ->imgreplyC= $request->imgreplyC;
        $Question ->imgreplyD= $request->imgreplyD;

        $Question ->replyA= $request->replyA;
        $Question ->replyB= $request->replyB;
        $Question ->replyC= $request->replyC;
        $Question ->replyD= $request->replyD;
        $Question ->soundQuestion= $request->soundQuestion;
     
        $Question ->chooseReply= $request->chooseReply;
        $Question ->status= $request->status;
        $Question->user = Auth::user()->name;

    


       /* // xu ly anh imgQuestion
         if($request->hasFile('imgQuestion'))
            {
                $file_Icon = $request->file('imgQuestion');
                $name_Icon = $file_Icon->getClientOriginalName();
                $str_name_icon = str_random(5)."-".$name_Icon;
                while (file_exists('public/backend/question/'.$str_name_icon)) 
                {
                $str_name_icon = str_random(5)."-".$name_Icon;
                }
                $file_Icon->move('public/backend/question/',$str_name_icon);
                $Question->imgQuestion = $str_name_icon;
            }
         // xu ly anh imgreplyA
         if($request->hasFile('imgreplyA'))
            {
                $file_Icon = $request->file('imgreplyA');
                $name_Icon = $file_Icon->getClientOriginalName();
                $str_name_icon = str_random(5)."-".$name_Icon;
                while (file_exists('public/backend/question/'.$str_name_icon)) 
                {
                $str_name_icon = str_random(5)."-".$name_Icon;
                }
                $file_Icon->move('public/backend/question/',$str_name_icon);
                $Question->imgreplyA = $str_name_icon;
            }
            
    // xu ly anh imgreplyB
         if($request->hasFile('imgreplyB'))
            {
                $file_Icon = $request->file('imgreplyB');
                $name_Icon = $file_Icon->getClientOriginalName();
                $str_name_icon = str_random(5)."-".$name_Icon;
                while (file_exists('public/backend/question/'.$str_name_icon)) 
                {
                $str_name_icon = str_random(5)."-".$name_Icon;
                }
                $file_Icon->move('public/backend/question/',$str_name_icon);
                $Question->imgreplyB = $str_name_icon;
            }
      // xu ly anh imgreplyC
         if($request->hasFile('imgreplyC'))
            {
                $file_Icon = $request->file('imgreplyC');
                $name_Icon = $file_Icon->getClientOriginalName();
                $str_name_icon = str_random(5)."-".$name_Icon;
                while (file_exists('public/backend/question/'.$str_name_icon)) 
                {
                $str_name_icon = str_random(5)."-".$name_Icon;
                }
                $file_Icon->move('public/backend/question/',$str_name_icon);
                $Question->imgreplyC = $str_name_icon;
            }
           // xu ly anh imgreplyD
         if($request->hasFile('imgreplyD'))
            {
                $file_Icon = $request->file('imgreplyD');
                $name_Icon = $file_Icon->getClientOriginalName();
                $str_name_icon = str_random(5)."-".$name_Icon;
                while (file_exists('public/backend/question/'.$str_name_icon)) 
                {
                $str_name_icon = str_random(5)."-".$name_Icon;
                }
                $file_Icon->move('public/backend/question/',$str_name_icon);
                $Question->imgreplyD = $str_name_icon;
            }
        // xu lý soundQuestion
         if($request->hasFile('soundQuestion'))
            {
                $file_Icon = $request->file('soundQuestion');
                $name_Icon = $file_Icon->getClientOriginalName();
                $str_name_icon = str_random(5)."-".$name_Icon;
                while (file_exists('public/backend/question/'.$str_name_icon)) 
                {
                $str_name_icon = str_random(5)."-".$name_Icon;
                }
                $file_Icon->move('public/backend/question/',$str_name_icon);
                $Question->soundQuestion = $str_name_icon;
            }*/
        $Question ->save();
        return redirect('admin/Question/list')->with('addsucess','Thêm mới thành công');
    }
     public function getedit(Request $request,$id)
    {
        $Question = QuestionModel::find($id);
    	return view('backend.Question.edit', compact('Question'));
    }
    public function postedit(QuestionEditRequest $request, $id)
    {
        
        $Questionid = QuestionModel::find($id);
        $Questionid ->nameQuestion= $request->nameQuestion;
        $Questionid ->soundQuestion= $request->soundQuestion;
        $Questionid ->replyA= $request->replyA;
        $Questionid ->imgreplyA= $request->imgreplyA;

        $Questionid ->replyB= $request->replyB;
        $Questionid ->imgreplyB= $request->imgreplyB;
        $Questionid ->replyC= $request->replyC;
        $Questionid ->imgreplyC= $request->imgreplyC;
        $Questionid ->replyD= $request->replyD;
        $Questionid ->imgreplyD= $request->imgreplyD;
        $Questionid ->chooseReply= $request->chooseReply;
        $Questionid ->status= $request->status;

        $Questionid ->save();
        return redirect('admin/Question/list')->with('editsucess','Sửa thành công');

    	
    }
     public function getdelete($id)
    {
       $QuestionModelid = QuestionModel::find($id);
       $QuestionModelid->delete();
       return redirect('admin/Question/list')->with('deleteproductsuccess','Xóa câu hỏi thành công');

    }
    public function getChangeStatus($status,$idQues)
    {   //dd($status);
        DB::table('question')->where('id', $idQues)->update(['status' => $status]);
        $statusId = DB::table('question')->select('status')->where('id', $idQues)->first();
        return view('backend.Status.status',compact('statusId'));
        //return $statusId->status;
    }

   

}
