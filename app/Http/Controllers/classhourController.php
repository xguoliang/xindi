<?php

namespace App\Http\Controllers;

use App\People;
use App\Classhour;



class classhourController extends Controller{
  public function classhourList($flag){
    if($flag=='stu'){
      $people=People::where('userflag','=','stu')->paginate(10);
    }else{
      $people=People::where('userflag','=','tea')->paginate(10);
    }
    return view('classhour.list',[
      'flag'=>$flag,
      'people'=>$people
    ]);
  }


}