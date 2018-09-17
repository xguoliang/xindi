<?php
/**
 * Created by PhpStorm.
 * User: qning
 * Date: 2017/12/31
 * Time: 下午2:08
 */
namespace App\Http\Controllers;



class canvasController extends Controller{
  public function kuxuan(){
    return view('canvas.kuxuan');
  }

  public function yanhua(){
    return view('canvas.yanhua');
  }
}