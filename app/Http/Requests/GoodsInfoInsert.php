<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoodsInfoInsert extends FormRequest
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
            //
            'gname' => 'required',
            'pic_up' => 'required',
            'pic_down' => 'required',
            'num' => 'required|numeric',
            'pro_num' => 'required',
            'material' => 'required',
        ];
    }

     public function messages(){
        return [
            "gname.required" => '商品名不能为空',
            "pic_up.required "=> '商品的小图不能为空',
            "pic_down.required" => '商品的描述图片不能为空',
            "num.required" => '库存不能为空',
            "num.numeric" => '库存不是数字',
            "pro_num" => '生产许可编码不能为空',
            "material.required" => '配料不能为空',
        ];
    }
}
