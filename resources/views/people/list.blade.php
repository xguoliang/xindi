@extends('public.common')

@section('sidebar')
    @include('people.sidebar')
@stop

@section('content')
    @include('public.message')
    @include('public.validator')

<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title text-center">{{$flag=='stu'?'学生':'教师'}}列表</div>
    </div>
    <table class="table table-striped table-hover table-responsive">
        <thead>
        <tr>
            <th>ID</th>
            <th>{{$flag=='stu'?'学号':'工号'}}</th>
            <th>姓名</th>
            <th>性别</th>
            <th>出生日期</th>
            <th>联系方式</th>
            <th>科目</th>
            <th>备注</th>
            <th width="140">操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($people as $person)
            <tr>
                <th scope="row">{{$person->id}}</th>
                <td>{{$person->userCard}}</td>
                <td>{{$person->userName}}</td>
                <td>{{$person->getSex($person->userGender)}}</td>
                <td>{{$person->userBirthday}}</td>
                <td>{{$person->userPhone}}</td>
                <td>{{$person->getSubject($person->userSubject)}}</td>
                <td>{{$person->userRemark}}</td>
                <td>
                    <a href="{{$flag=='stu'?url('people/detail/stu',['id'=>$person->id]):url('people/detail/tea',['id'=>$person->id])}}" style="text-decoration: none">
                        <span class="label label-info">详情</span>
                    </a>
                    <a href="{{$flag=='stu'?url('people/update/stu',['id'=>$person->id]):url('people/update/tea',['id'=>$person->id])}}" style="text-decoration: none">
                        <span class="label label-info">修改</span>
                    </a>
                    <a href="{{$flag=='stu'?url('people/delete/stu',['id'=>$person->id]):url('people/delete/tea',['id'=>$person->id])}}" style="text-decoration: none"
                       onclick="if (confirm('确定删除?')==false) return false">
                        <span class="label label-danger">删除</span>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

    {{--分页--}}
<div>
    <div class="pull-right">
        {{$people->render()}}
    </div>
</div>
@stop