@extends('public.common')

@section('main')

@section('sidebar')
    @include('order.sidebar')
@stop

@section('content')
    @include('public.message')
    @include('public.validator')

<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title text-center">预约列表</div>
    </div>
    <table class="table table-striped table-hover table-responsive">
        <thead>
        <tr>
            <th>ID</th>
            <th>姓名</th>
            <th>申请时间</th>
            <th>性别</th>
            <th>出生日期</th>
            <th>联系方式</th>
            <th>预约科目</th>
            <th width="100">安排试听</th>
            <th>备注</th>
            <th width="170">操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <th scope="row">{{$order->id}}</th>
                <td>{{$order->orderName}}</td>
                <td>{{$order->updated_at}}</td>
                <td>{{$order->getSex($order->orderGender)}}</td>
                <td>{{$order->orderBirthday}}</td>
                <td>{{$order->orderPhone}}</td>
                <td>{{$order->getSubject($order->orderSubject)}}</td>
                <td>{{$order->getSubjectPosition($order->id)}}</td>
                <td>{{$order->orderRemark}}</td>
                <td>
                    @if($order->orderSubjectPosition=='n')
                        <a href="{{url('order/choose',['id'=>$order->id])}}" style="text-decoration: none">
                            <span class="label label-info">安排听课</span>
                        </a>
                    @else
                        <a href="{{url('order/choose',['id'=>$order->id])}}" style="text-decoration: none">
                            <span class="label label-warning">重新排课</span>
                        </a>
                    @endif
                    <a href="{{url('order/update',['id'=>$order->id])}}" style="text-decoration: none">
                        <span class="label label-warning">修改</span>
                    </a>
                    <a href="{{url('order/delete',['id'=>$order->id])}}" style="text-decoration: none"
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
        {{$orders->render()}}
    </div>
</div>
@stop