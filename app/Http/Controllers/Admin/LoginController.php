<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use App\Model\User;


class LoginController extends Controller
{
    //
    public function login(Request $request){
        if(Input::method() == 'POST'){
            $rules = [
                'username' => 'required|between:4,18',
                'password' => 'required|between:4,18|alpha_dash',
                'captcha' => 'required|captcha'
            ];

            $msg = [
                'username.required' => '用户名不能为空！',
                'username.between' => '用户名长度必须在4-18位之间',
                'password.required' => '密码不能为空！',
                'password.between' => '密码长度必须在4-18位之间',
                'password.alpha_dash' => '密码必须是字母、数字下划线',
                'captcha.required' => '验证码不能为空！',
                'captcha.captcha' => '验证码不正确！',
            ];

            $input = $request->except('_token');

            $validator = Validator::make($input,$rules,$msg);

            if($validator -> fails()){
                return redirect('admin/login')
                    -> withErrors($validator)
                    ->withInput();
            }

            $user = User::where(['user_name' => $input['username']]) -> first();

            if(!$user){
                return redirect('admin/login')
                    -> withErrors('用户名错误');
            }

            if($input['password'] != Crypt::decrypt($user['user_pass'])){
                return redirect('admin/login')
                    -> withErrors('密码错误');
            }

            session() -> put("user",$user);

            return redirect('admin/index');
        }else{
            return view('admin.login');
        }
    }

    public function index(){
        return view('admin.index');
    }

    public function welcome(){
        return view('admin.welcome');
    }

    public function logout(){
        session()->flush();
        return redirect('admin/login');
    }
}
