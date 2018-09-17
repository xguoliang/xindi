@extends('public.common')

@section('sidebar')
    <div class="list-group">
        <a href="#" class="list-group-item active"><span class="h4">修改预约纪录</span></a>
    </div>

@stop

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <h3 class="text-center">修改预约纪录</h3>
        <br />
        @include('public.message')
        @include('public.validator')
        @include('order._form')
    </div>
@stop