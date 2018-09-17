@extends('public.common')
@section('sidebar')
    <div class="list-group">
        <a href="#" class="list-group-item active">
            <span class="h4">{{$flag=='stu'?'学生':'教师'}}详情</span>
        </a>
    </div>
@stop
@section('content')


    <div class="panel panel-default">
        <div class="panel-heading text-center">{{$flag=='stu'?'学生':'教师'}}详情</div>

        <table class="table table-bordered table-striped table-hover ">
            <tbody>
            <tr>
                <td width="50%">ID</td>
                <td>{{$person->id}}</td>
            </tr>
            <tr>
                <td>{{$flag=='stu'?'学号':'工号'}}</td>
                <td>{{$person->userCard}}</td>
            </tr>
            <tr>
                <td>姓名</td>
                <td>{{$person->userName}}</td>
            </tr>
            <tr>
                <td>出生日期</td>
                <td>{{$person->userBirthday}}</td>
            </tr>
            <tr>
                <td>性别</td>
                <td>{{$person->getSex($person->userGender)}}</td>
            </tr>
            <tr>
                <td>联系方式</td>
                <td>{{$person->userPhone}}</td>
            </tr>
            <tr>
                <td>科目</td>
                <td>{{$person->getSubject($person->userSubject)}}</td>
            </tr>
            <tr>
                <td>备注</td>
                <td>{{$person->userRemark}}</td>
            </tr>
            <tr>
                <td>添加日期</td>
                <td>{{$person->created_at}}</td>
            </tr>
            <tr>
                <td>最后修改</td>
                <td>{{$person->updated_at}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <p></p>
    @if($flag=='stu')
        <a href="{{url('people/peopleList/stu')}}" class="btn btn-default btn-lg btn-block">
            <span class="glyphicon glyphicon-circle-arrow-left">&nbsp;返回</span>
        </a>
    @else
        <a href="{{url('people/peopleList/tea')}}" class="btn btn-default btn-lg btn-block">
            <span class="glyphicon glyphicon-circle-arrow-left">&nbsp;返回</span>
        </a>
    @endif

@stop