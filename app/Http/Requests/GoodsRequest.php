<?php
// 商品修改验证类
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoodsRequest extends FormRequest
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
            'name' => 'required',
            'dcr' => 'required',
            'price' => 'required|numeric',
        ];
    }

     public function messages(){
        return [
            "name.required" => '商品名字不能为空',
            "dcr.required "=> '商品的描述不能为空',
            "price.required" => '商品的单价不能为空',
            "price.numeric" => '商品的单价必须为数字',
        ];
    }
}
