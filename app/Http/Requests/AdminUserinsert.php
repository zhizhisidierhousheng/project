<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserinsert extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // 开启表单验证
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // 用隐藏域获取id   保证修改时排除当前id的值进行检测唯一
        $id = $this->input('id');
        return [
            // 管理员添加做规则设置  admin_users表名,name字段,$id排除的当前id
            'name' => 'required|regex:/\w{4,8}/|unique:admin_users,name,'.$id,
            // 密码和重复密码
            'password' => 'required|regex:/\w{6,16}/',
            'repassword' => 'required|same:password',
        ];
    }
    // 自定义错误消息
    public function messages()
    {
        return [
            'name.required' => '用户名不能为空',
            'name.regex' => '用户名必须为4-8位的任意数字字母下划线',
            'name.unique' => '用户名重复',
            'password.required' => '密码不能为空',
            'password.regex' => '密码必须为6-16位的任意数字字母下划线',
            'repassword.required' => '重复密码不能为空',
            'repassword.same' =>'两次密码不一致',
        ];
    }
}
