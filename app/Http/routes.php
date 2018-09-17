<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/








Route::group(['middleware' => ['web']], function () {

    //公共
    Route::any('login',['uses'=>'loginController@login']);
    Route::any('logout',['uses'=>'loginController@logout']);
    Route::any('home',['uses'=>'pageController@home']);
    Route::any('register',['uses'=>'loginController@register']);

    //新闻
    Route::any('news/list/',['uses'=>'newsController@newsList']);
    Route::any('news/list/{id}',['uses'=>'newsController@newsInfo']);

    //people:学生和老师
    Route::any('people/peopleList/{flag}',['uses'=>'peopleController@peopleList']);
    Route::any('people/create/{flag}',['uses'=>'peopleController@create']);
    Route::any('people/update/{flag}/{id}',['uses'=>'peopleController@update']);
    Route::any('people/detail/{flag}/{id}',['uses'=>'peopleController@detail']);
    Route::any('people/delete/{flag}/{id}',['uses'=>'peopleController@delete']);

    /*//学生
    Route::any('student/studentList',['uses'=>'studentController@studentList']);
    Route::any('student/create',['uses'=>'studentController@create']);
    Route::any('student/update/{id}',['uses'=>'studentController@update']);
    Route::any('student/detail/{id}',['uses'=>'studentController@detail']);
    Route::any('student/delete/{id}',['uses'=>'studentController@delete']);
  */

    //课程表
    Route::any('schedule/list/',['uses'=>'scheduleController@scheduleList']);
    Route::any('schedule/create/{subjectId}',['uses'=>'scheduleController@create']);
    Route::any('schedule/create/stuInfo/{queryStr}',['uses'=>'scheduleController@ajaxShowStuInfo']);
    Route::any('schedule/update/{TeaId}',['uses'=>'scheduleController@update']);
    Route::any('schedule/update/stuInfo/{queryStr}',['uses'=>'scheduleController@ajaxShowStuInfo']);
    Route::any('schedule/delete/{TeaId}',['uses'=>'scheduleController@delete']);

    //预约
    Route::any('order/list/',['uses'=>'orderController@orderList']);
    Route::any('order/create/',['uses'=>'orderController@create']);
    Route::any('order/update/{id}',['uses'=>'orderController@update']);
    Route::any('order/choose/{id}',['uses'=>'orderController@choose']);
    Route::any('order/delete/{id}',['uses'=>'orderController@delete']);

    //课时纪录
    Route::any('classhour/list/{flag}',['uses'=>'classhourController@classhourList']);

    //其他
    //酷炫
    Route::any('kuxuan',['uses'=>'canvasController@kuxuan']);
    //烟花
    Route::any('yanhua',['uses'=>'canvasController@yanhua']);


    //vue
    Route::any('vue/test1',['uses'=>'vueController@test1']);
});
