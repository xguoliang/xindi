<?php

namespace App\Http\Controllers;


class newsController extends Controller{
  public function newsList(){
    return view('news.list');
  }

  public function newsInfo($id){
    return view('news.newsInfo',[
      'id'=>$id
    ]);
  }
}