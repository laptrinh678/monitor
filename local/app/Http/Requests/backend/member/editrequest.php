<?php

namespace App\Http\Requests\backend\member;

use Illuminate\Foundation\Http\FormRequest;

class editrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'member_name'=>'required|min:3',
            'member_level'=>'required',
            'member_mail'=>'required',
            'member_pass'=>'required|min:6|max:30',
        ];
    }
    public function messages()
    { 
       return [
            'member_name.required'=>'Tên thành viên không được để trống',
            'member_name.min'=>'Tên thành viên phải lớn hơn 3 ký tự',
            'member_level.required'=>'Quyền truy cập không được để trống',
            'member_mail.required'=>'Email không được để trống',
            'member_mail.email'=>'Email của bạn chưa hợp lệ',
            'member_pass.required'=>'Pass không được để trống',
            'member_pass.min'=>'Pass phải lớn hơn 6 ký tự',
            'member_pass.max'=>'Pass phải ít hơn 30 ký tự',

        ];
       
    }


}
