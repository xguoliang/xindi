<?php
/**
 * Created by PhpStorm.
 * User: qning
 * Date: 2018/6/8
 * Time: 下午1:53
 */

namespace App\Http\Controllers;

class vueController extends Controller{
  public function test1(){
    return view('vue.test1');
  }
}