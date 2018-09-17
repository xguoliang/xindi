@extends('public.common')

@section('main')
<h3 class="text-center">您将在 <span class="text-info">{{\App\Schedule::getChPath($SchId)}}</span>修改其学生的信息</h3>
<br />

<div class="col-md-10 col-md-offset-1">
    @include('public.message')
    @include('public.validator')
</div>


<script type="text/javascript" src="{{asset('ajax/people.js')}}">
</script>

@include('schedule._form')

@stop