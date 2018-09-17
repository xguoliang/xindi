@extends('public.common')

@section('sidebar')
    <a href="{{url('classhour/list/tea')}}" class="list-group-item
        {{Request::getPathInfo()=='/classhour/list/tea'?'active':''}}">教师工时</a>
    <a href="#" class="list-group-item
        {{Request::getPathInfo()=='/classhour/list/stu'?'active':''}}">学生课时</a>
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
            <th>科目</th>
            <th>工时详情</th>
            <th width="140">操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($people as $person)
            <tr>
                <th scope="row">{{$person->id}}</th>
                <td>{{$person->userCard}}</td>
                <td>{{$person->userName}}</td>
                <td>{{$person->getSubject($person->userSubject)}}</td>
                <td>
                    <button type="button" class="btn btn-sm btn-block btn-primary" data-toggle="collapse" data-target="#persion_{{$person->id}}" data-toggle="tooltip"
                            title="点我打开/关闭">详情</button>
                    <div id="persion_{{$person->id}}" class="collapse">
                        @include('classhour.detail')
                    </div>
                </td>
                <td>
                    <a href="#" style=""><span class="label label-success">新增</span> </a>
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

<script>
    $(function(){ $("[data-toggle='tooltip']").tooltip(); });
</script>