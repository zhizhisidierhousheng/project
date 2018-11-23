<?php
// 广告验证类
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvInsert extends FormRequest
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
            'title' => 'required',
            'url' => [
                'required',
                'regex:((http|ftp|https):\/\/[\w\-_]+(\.[\w\-_]+)+([\w\-\.,@?^=%&amp;:/~\+#]*[\w\-\@?^=%&amp;/~\+#])?)'
            ],
            'dcr' => 'required',
            'pic' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '标题不能为空',
            'url.required' => '网址不能为空',
            'url.regex' => '输入网址格式不正确',
            'dcr.required' => '描述不能为空',
            'pic.required' => '未选择上传图片'
        ];
    }
}
