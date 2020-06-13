<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //
    public function add(){
        return view('user/add');
    }

    public function store(Request $request){
        //1.获取用户输入
        $input = $request->except('_token');
        $input['password'] = md5($input['password']);

        //2.表单验证

        //3.添加数据库
        $res = User::create($input);
        if($res){
            return redirect('user/index');
        }else{
            return back();
        }
    }

    public function edit($id){
        $user = User::find($id);
        return view('user.edit',compact('user'));
    }

    public function update(Request $request){
        //1.获取用户输入
        $input = $request->except('_token');

        //2.表单验证

        //3.添加数据库
        $user = User::find($input['id']);
        $res = $user -> update(['name' => $input['name']]);

        if($res){
            return redirect('user/index');
        }else{
            return back();
        }
    }

    public function index(){
        $user = User::get();

        return view('user.index',compact('user'));
    }
}
