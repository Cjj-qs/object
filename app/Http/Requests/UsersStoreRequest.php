<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsersStoreRequest extends Request
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
            'uname' => 'required|unique:users|regex:/^[a-zA-Z]{1}[\w]{4,14}$/',
            'pwd' => 'required|regex:/^[\w]{6,18}$/',
            'repwd' => 'required|same:pwd',
            'profile' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^1{1}[3,4,5,6,7,8]{1}[\d]{9}$/',
            'addr' => 'required',
            'sex' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'uname.required' => '用户名不能为空',
            'uname.regex' => '用户名格式错误',
            'uname.unique' => '用户名已存在',
            'pwd.required' => '密码不能为空',
            'pwd.regex' => '密码格式错误',
            'repwd.required' => '重复密码不能为空',
            'repwd.same' => '两次密码不一致',
            'profile.required' => '头像不能为空',
            'email.required' => '邮箱不能为空',
            'email.email' => '邮箱格式错误',
            'phone.required' => '手机号不能为空',
            'phone.regex' => '手机号格式错误',
            'addr.required' => '地址不能为空',
            'sex.required' => '性别不能为空',
        ];
    }
}
