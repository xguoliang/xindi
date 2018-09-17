@extends('public.common')
@section('sidebar')
    <div class="list-group">
        <a href="{{url('order/choose')}}" class="list-group-item active">
            <span class="h4">试听排课</span>
        </a>
    </div>
@stop

<script type="text/javascript" src="{{asset('ajax/people.js')}}"></script>

@section('content')
    <div class="col-md-12">
        <h3 class="text-danger">试听排课</h3>
        <h4 class="text-info">您正在为
            <a href="#" style="" data-toggle="tooltip" data-html="true" title="预约科目:{{$order->getSubject($order->orderSubject)}}<br />出生日期:{{$order->orderBirthday}}
                    <br />其他备注:{{$order->orderRemark}}">
                <span class="h3">
                    <span class="label label-success">{{$order->orderName}}({{$order->getSubject($order->orderSubject)}})</span>
                </span>
            </a>进行试听排课:
        </h4>
        <br />
        <?php $tmpMsg="请使用下列表哥中的'+'选课到指定位置";  ?>
        @include('public.info')
        @include('public.message')
        @include('public.validator')

        <div class="panel panel-default">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th></th>
                            <th class="text-center">时间</th>
                            <th class="text-center">科目</th>
                            <th class="text-center">老师</th>
                            <th class="text-center">周一</th>
                            <th class="text-center">周二</th>
                            <th class="text-center">周三</th>
                            <th class="text-center">周四</th>
                            <th class="text-center">周五</th>
                            <th class="text-center">周六</th>
                            <th class="text-center">周日</th>
                        </tr>
                        </thead>
                        @include('schedule.list_left')
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop