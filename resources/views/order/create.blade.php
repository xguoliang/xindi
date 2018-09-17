@extends('public.common')

@section('sidebar')
    @include('order.sidebar')

@stop

@section('content')
<div class="col-md-8 col-md-offset-2">
    <h3 class="text-center">新增预约纪录</h3>
    <br />
    @include('public.message')
    @include('public.validator')
    @include('order._form')
</div>
@stop