<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Session;

class pageController extends Controller{


  public function home(){
    if(Session::has('validuser')){
      return view('home');
    }else{
      return redirect('login');
    }

  }

  private function userCheck(){

  }
}