@extends('public.common')


@section('main')
    <div class="col-md-12" style="padding: 5px 1px 0px 1px">
        <h3 class="text-primary text-center">课程表</h3>
        @include('public.message')
        @include('public.validator')

        <div class="panel panel-default">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-hover table-responsive table-bordered">
                        <thead>
                        <tr>
                            <th></th>
                            <th class="text-center">时间</th>
                            <th class="text-center">科目</th>
                            <th class="text-center">新增</th>
                            <th class="text-center">老师</th>
                            <th class="text-center">周一</th>
                            <th class="text-center">周二</th>
                            <th class="text-center">周三</th>
                            <th class="text-center">周四</th>
                            <th class="text-center">周五</th>
                            <th class="text-center">周六</th>
                            <th class="text-center">周日</th>
                            <th class="text-center">操作</th>
                        </tr>
                        </thead>

                        @include('schedule.list_left')

                    </table>

                </div>
            </div>
        </div>
    </div>



@stop