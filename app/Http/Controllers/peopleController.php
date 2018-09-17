<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\People;
use App\UserInfo;


class peopleController extends Controller{
  public function peopleList($flag){
    //左连接  select * from user left join studentInfo on studentinfo.studentID=user.userID;
    //  $students=DB::table('studentinfo')->leftjoin('user','studentinfo.studentID','=','user.userID'->get();
    if($flag=='stu'){
      $people=People::where('userFlag','=','stu')->paginate(10);
    }else{
      $people=People::where('userFlag','=','tea')->paginate(10);
    }
    return view('people.list',[
      'flag'=>$flag,
      'people'=>$people
    ]);
  }

  public function create(Request $request,$flag){
    $person=new People();
    if($request->isMethod('POST')){
      $validator=Validator::make($request->input(), [
        'Person.userName'=>'required',
        ],[
        'required'=>':attribute 为必填项',
        ],[
        'Person.userName'=>'姓名'
      ]);
      if($validator->fails()){
        return redirect()->back()->withErrors($validator)->withInput();//withErrors是手动注册错误码
      }

      $requestData=$request->input('Person');
      if(array_key_exists('userSubject',$requestData)){
        $tmpSubject=implode('',$requestData['userSubject']);//因$requestData['userSubject']是个数组,而eloquent的模型接受字符串,所以这里把这个数组的value拼接成string
        $requestData['userSubject']=$tmpSubject;
      }else{
        $requestData['userSubject']='n';
      }
      $flag=='stu'?$requestData['userFlag']='stu':$requestData['userFlag']='tea';
      if(People::create($requestData)){
        if($flag=='stu'){
          return redirect('people/peopleList/stu')->with('success_flag','新增学生成功');
        }else{
          return redirect('people/peopleList/tea')->with('success_flag','新增教师成功');
        }
      }else{
        if($flag=='stu'){
          return redirect('people/peopleList/stu')->with('fail_flag','新增学生失败,请重试');
        }else{
          return redirect('people/peopleList/tea')->with('fail_flag','新增教师失败,请重试');
        }
      }
    }else{
      return view('people.create',[
        'flag'=>$flag,
        'person'=>$person
      ]);
    }

  }

  public function detail($flag,$id){
    $person=People::find($id);
    return view('people.detail',[
      'flag'=>$flag,
      'person'=>$person
    ]);
  }

  public function delete($flag,$id){
    $person=People::find($id);
    if($person->delete()){
      if($flag=='stu'){
        return redirect('people/peopleList/stu')->with('success_flag','删除学生成功');
      }else{
        return redirect('people/peopleList/tea')->with('success_flag','删除教师成功');
      }
    }else{
      if($flag=='stu'){
        return redirect('people/peopleList/stu')->with('fail_flag','删除学生失败,请重试');
      }else{
        return redirect('people/peopleList/tea')->with('fail_flag','删除教师失败,请重试');
      }
    }
  }

  public function update(Request $request,$flag,$id){
    $person=People::find($id);
    if($request->isMethod('POST')){
      $validator=Validator::make($request->input(), [
        'Person.userName'=>'required',
      ],[
        'required'=>':attribute 为必填项',
      ],[
        'Person.userName'=>'姓名'
      ]);
      if($validator->fails()){
        return redirect()->back()->withErrors($validator)->withInput();
      }

      $requestData=$request->input('Person');
      if(array_key_exists('userSubject',$requestData)){
        $tmpSubject=implode('',$requestData['userSubject']);
        $requestData['userSubject']=$tmpSubject;
      }else{
        $requestData['userSubject']='n';
      }
      if(array_key_exists('userGender',$requestData)==false){
        $requestData['userGender']='unknow';
      }

      $person->userCard=$requestData['userCard'];
      $person->userName=$requestData['userName'];
      $person->userGender=$requestData['userGender'];
      $person->userBirthday=$requestData['userBirthday'];
      $person->userPhone=$requestData['userPhone'];
      $person->userSubject=$requestData['userSubject'];
      $person->userRemark=$requestData['userRemark'];

      if($person->save()){
        if($flag=='stu'){
          return redirect('people/peopleList/stu')->with('success_flag','修改学生成功');
        }else{
          return redirect('people/peopleList/tea')->with('success_flag','修改教师成功');
        }
      }else{
        if($flag=='stu'){
          return redirect('people/peopleList/stu')->with('fail_flag','修改学生失败,请重试');
        }else{
          return redirect('people/peopleList/tea')->with('fail_flag','修改教师失败,请重试');
        }
      }
    }
    return view('people.update',[
      'flag'=>$flag,
      'person'=>$person
    ]);
  }
}