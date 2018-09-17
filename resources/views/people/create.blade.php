@extends('public.common')

@section('sidebar')
    @include('people.sidebar')

@stop

@section('content')
<div class="col-md-8 col-md-offset-2">
    <h3 class="text-center">新增{{$flag=='stu'?'学生':'教师'}}</h3>
    <br />
    @include('public.message')
    @include('public.validator')
    @include('people._form')
</div>
@stop