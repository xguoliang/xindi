<?php

namespace App\Http\Controllers;
use App\userInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class loginController extends Controller{
  public function login(Request $request){
    if($request->isMethod('POST')){
      $validator=Validator::make($request->input(),[
        'user.userNumber'=>'required|min:3|max:30',
        'user.userPassword'=>'required',
      ],[
        'required'=>':attribute 为必填项',
        'min'=>':attribute 长度必须大于或等于3个字符',
        'max'=>':attribute 长度必须小于或等于30个字符',
      ],[
        'user.userNumber'=>'用户名',
        'user.userPassword'=>'密码'
      ]);

      if($validator->fails()){
        return redirect()->back()->withErrors($validator)->withInput(); //withErrors是手动注册错误吗;withInput是为了保持功能的良好体验
      }

      $requestData=$request->input('user');
      $user=UserInfo::where('userNumber','=',$requestData['userNumber'])->first();
      $count=UserInfo::where('userNumber','=',$requestData['userNumber'])->count();
      if(($count==1)&&($requestData['userPassword']==$user['userPassword'])){
        Session::put('validuser',$requestData['userNumber']);
        //Session::save();
/*        return view('home',[
          'validuser'=>$requestData['userNumber']
        ]);*/  //直接调用别的控制器中的模版不太好,会导致url不是/home而是/login,所以用redirect跳转比较合适
        return redirect('home');
      }else{
        return redirect()->back()->with('error_pwWrong','用户名或者密码错误');
      }
    }else{
      return view('public/login');
    }

  }

  public function logout(){
    Session::flush();//清除所有session
    return redirect('login');
  }

  public function register(Request $request)
  {
    if ($request->isMethod('POST')) {
      $validator = Validator::make($request->input(), [
        'user.userNumber' => 'required|min:3|max:40|email|unique:userInfo,userNumber',
        'user.userPassword' => 'required',
        'user.userConfirmPassword' => 'required|same:user.userPassword'
      ], [
        'required' => ':attribute 为必填项',
        'min' => ':attribute 长度必须大于或等于3个字符',
        'max' => ':attribute 长度必须小于或等于40个字符',
        'email' => '必须为邮箱格式',
        'same' => '确认密码和密码不一致',
        'unique' => '该邮箱已经存在'
      ], [
        'user.userNumber' => '用户名',
        'user.userPassword' => '密码',
        'user.userConfirmPassword' => '确认密码'
      ]);
      if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput(); //withErrors是手动注册错误吗;withInput是为了保持功能的良好体验
      }

      $requestData = $request->input('user');
      if (UserInfo::create($requestData)) {
        return redirect('login')->with('success_flag', '注册成功,请登录');
      } else {
        return redirect('login')->with('fail_flag', '注册失败,请重试');
      }
    } else {
      return view('public.register');
    }
  }
}