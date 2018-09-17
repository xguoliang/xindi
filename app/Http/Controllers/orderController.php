<?php

namespace App\Http\Controllers;

use App\Order;
use App\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class orderController extends Controller{
  public function orderList(){
    $orders=Order::paginate(10);
    return view('order.list',[
      'orders'=>$orders
    ]);
  }

  public function create(Request $request){
    $order=new Order();
    if($request->isMethod('POST')){
      $validator=Validator::make($request->input(), [
        'Order.orderName'=>'required',
        'Order.orderPhone'=>'required',
        'Order.orderSubject'=>'required',
        ],[
        'required'=>':attribute 为必填项',
        ],[
        'Order.orderName'=>'姓名',
        'Order.orderPhone'=>'联系方式',
        'Order.orderSubject'=>'试听科目',
      ]);
      if($validator->fails()){
        return redirect()->back()->withErrors($validator)->withInput();//withErrors是手动注册错误码
      }

      $requestData=$request->input('Order');
      if(Order::create($requestData)){
        return redirect('order/list')->with('success_flag','新增预约成功');
      }else{
        return redirect('order/list')->with('fail_flag','新增预约失败，请重试');
      }
    }else{
      return view('order.create',[
        'order'=>$order
      ]);
    }
  }


  public function delete($id){
    $order=Order::find($id);
    //删除该order下已经预约的纪录
    if($order->orderSubjectPosition!='n'){
      $sch=DB::select("select * from schedule where right(path,1)='0' and content='".$id."'");
      $schId=$sch[0]->id;
      DB::delete("delete from schedule where id='".$schId."'");
    }
    if($order->delete()){
      return redirect('order/list')->with('success_flag','删除预约成功');
    }else{
      return redirect('order/list')->with('fail_flag','删除预约失败，请重试');
    }
  }

  public function update(Request $request,$id){
    $order=Order::find($id);
    if($request->isMethod('POST')){
      $validator=Validator::make($request->input(), [
        'Order.orderName'=>'required',
        'Order.orderPhone'=>'required',
        'Order.orderSubject'=>'required',
      ],[
        'required'=>':attribute 为必填项',
      ],[
        'Order.orderName'=>'姓名',
        'Order.orderPhone'=>'联系方式',
        'Order.orderSubject'=>'试听科目',
      ]);
      if($validator->fails()){
        return redirect()->back()->withErrors($validator)->withInput();
      }

      $requestData=$request->input('Order');
      if(array_key_exists('orderSubject',$requestData)==false){
        $requestData['orderGender']='unknow';
      }
      $order->orderName=$requestData['orderName'];
      $order->orderGender=$requestData['orderGender'];
      $order->orderBirthday=$requestData['orderBirthday'];
      $order->orderPhone=$requestData['orderPhone'];
      $order->orderSubject=$requestData['orderSubject'];
      $order->orderRemark=$requestData['orderRemark'];
      if($order->save()){
        return redirect('order/list')->with('success_flag','修改预约成功');
      }else{
        return redirect('order/list')->with('fail_flag','修改预约失败，请重试');
      }
    }
    return view('order.update',[
      'order'=>$order
    ]);
  }

  public function choose(Request $request,$id){
    $order=Order::find($id);
    if($request->isMethod('POST')){
      $requestData=$request->input('chooseSubject');
      $tmpArr=array();
      $tmpArr=explode('_',$requestData['position']);
      $schId=$tmpArr[0];
      $weekNum=$tmpArr[1];
      $teaPathsArr=DB::select("select path from schedule where id='".$schId."'");
      $teaPath=$teaPathsArr[0]->path;
      $insertSchStuOrder=array();
      $insertSchStuOrder['content']=$id;
      $insertSchStuOrder['path']=$teaPath.$weekNum.'nO';
      $oldSchStuorder=DB::select("select path from schedule where content='".$id."' and right(path,1)='0'");
      if(count($oldSchStuorder)>0){
        Schedule::create($insertSchStuOrder);
      }
      $order->orderSubjectPosition=$schId;//修改order表里面的字段orderSubjectPosition
      if($order->save()){
        return redirect('order/list')->with('success_flag','预约排课成功');
      }else{
        return redirect('order/list')->with('fail_flag','预约排课失败，请重试');
      }
    }else{
      return view('order.choose',[
        'flag'=>'choose',
        'order'=>$order
      ]);
    }
  }


}