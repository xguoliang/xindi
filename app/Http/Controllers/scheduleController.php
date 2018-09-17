<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\People;
use App\Schedule;


class scheduleController extends Controller{
  public function scheduleList(){
    $schedules=new Schedule();
    return view('schedule.list',[
      'schedules'=>$schedules
    ]);
  }

  public function doCreateStudents(Request $request,$teaPath,$flag=''){
    for($i=1;$i<=7;$i++){
      if($flag=='order'){
        $key='chooosSubject'.$i;
      }else{
        $key='week_'.$i;
      }
      if($request->has($key)){
        $requestDataStu=$request->input($key);
        for($j=0;$j<count($requestDataStu);$j++){
          $insertSchStu=array();
          $insertSchStu['content']=$requestDataStu[$j];
          if($flag=='order'){
            $insertSchStu['path']=$teaPath.$i.'nO';
          }else{
            $insertSchStu['path']=$teaPath.$i.'n';
          }
          Schedule::create($insertSchStu);//后续要学习mysql的事务机制，这里仅仅做功能的简单处理
        }
      }
    }
  }


  public function create($subjectId,Request $request){
    $people=People::where('userFlag','=','tea')->get();
    if($request->isMethod('POST')){
      $validator=Validator::make($request->input(), [
        'Person.id'=>'required',
      ],[
        'required'=>':attribute 单选框必须选择一个',
      ],[
        'Person.id'=>'老师单选框'
      ]);
      if($validator->fails()){
        return redirect()->back()->withErrors($validator)->withInput();//withErrors是手动注册错误码
      }

      $requestData=$request->input('Person');
      $thisTeacher = People::find($requestData['id']);
      $insertSchTea=array();
      $insertSchTea['content']=$thisTeacher->id;

      $SubjectPathsArr=DB::select("select path from schedule where id='".$subjectId."'");
      $SubjectPath =$SubjectPathsArr[0]->path;

      $maxId=Schedule::all()->max('id');
      $insertSchTea['path']=$SubjectPath.($maxId+1).'n';

      self::doCreateStudents($request,$insertSchTea['path']);

      if(Schedule::create($insertSchTea)){
        return redirect('schedule/list')->with('success_flag','新增教师成功');
      }else{
        return redirect('schedule/list')->with('fail_flag','新增教师失败，请重试');
      }
    }
    return view('schedule.create',[
      'flag'=>'create',
      'subjectId'=>$subjectId,
      'people'=>$people
    ]);
  }

  public function ajaxShowStuInfo($queryStr){
    $students=DB::select("select * from peopleinfo where userFlag='stu' and concat(userCard,userName,userPhone,userBirthday,userSubject,userRemark) like '%".$queryStr."%'");
    return view('schedule.stuInfo',[
      'students'=>$students
    ]);
  }

  private function doDeleteStudents($tmpArr){
    for($i=0;$i<count($tmpArr);$i++){
      $scheduleStu = Schedule::find($tmpArr[$i]->id);
      $scheduleStu->delete();
    }
  }

  public function delete($id){
    $scheduleTea=Schedule::find($id);
    $childrenIdsArr=DB::select("select * from schedule where path like '".$scheduleTea->path ."%' and length(path)-length(replace(path,'n',''))=6");
    self::doDeleteStudents($childrenIdsArr);
    if($scheduleTea->delete()){
      return redirect('schedule/list')->with('success_flag','删除教师成功');
    }else{
      return redirect('schedule/list')->with('fail_flag','删除教师失败，请重试');
    }
  }

  public function update($id,Request $request){
    if($request->isMethod('POST')){
      //删掉普通学生和预约学生
      $scheduleTea=Schedule::find($id);
      $childrenIdsArr=DB::select("select * from schedule where path like '".$scheduleTea->path ."%' and length(path)-length(replace(path,'n',''))=6");
      self::doDeleteStudents($childrenIdsArr);
      //新增普通学生
      self::doCreateStudents($request,$scheduleTea->path);
      //新增预约学生
      self::doCreateStudents($request,$scheduleTea->path,'order');
      return redirect('schedule/list')->with('success_flag','修改教师成功');
    }
    return view('schedule.update',[
      'flag'=>'update',
      'SchId'=>$id,
      'TeaId'=>Schedule::find($id)->content
    ]);
  }
}