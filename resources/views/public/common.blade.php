<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>demo - @yield('title')</title>
{{--    <script src="{{asset('jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">--}}

    <script src="{{asset('jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.js')}}"></script>
    <script src="{{asset('bootstrap-datetimepicker-master/js/locales/bootstrap-datetimepicker.zh-CN.js')}}"></script>

    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.css') }}">


    <style type="text/css">
        .header{
            margin-top: 10px;
        }
        .main{
            margin-bottom: 10px;
            padding-bottom: 10px;
        }
        .main .sidebar{
            height: inherit;
        }
        .main .content{
            height: inherit;
        }
        .footer{
            height: inherit;
            padding: 0px 0px;
        }

    </style>
</head>
<body>
<div class="container" style="padding: 0px">
    <div class="row">
        <div class="header col-md-12" >
            @include('public.header')
        </div>
    </div>
    <div class="row main">
        @section('main')
            <div class="col-md-2 sidebar">
                @section('sidebar')
                    侧边栏
                @show
            </div>
            <div class="col-md-10 content">
                @yield('content', '主要内容区域')
            </div>
        @show
    </div>
    <div class="row">
        <div class="footer">
            @include('public.footer')
        </div>
    </div>
</div>

</body>
</html>

