<?php

namespace App\Http\Requests\backend\cateProduct;

use Illuminate\Foundation\Http\FormRequest;

class QuestionEditRequest extends FormRequest
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

               /* 'nameQuestion' => 'required',
                'replyA' => 'required',
                'replyB' => 'required',
                'replyC' => 'required',
                'replyD' => 'required',*/
                'chooseReply' => 'required',
                'status' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Không được để trống tên câu hỏi, đáp án hoặc đáp án đúng'
        ];
    }
}
