<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>demo - @yield('title')</title>
    <script src="{{asset('jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
<div class="container">
    <div class="col-md-6 col-md-offset-3">
        <br /><br /><br /><br /><br /><br />
        <h1 class="text-center">请登录</h1>
        <br /><br />
        @include('public.message')
        @include('public.validator')
        <form role="form" class="form-horizontal" method="post" action="">  {{--想要使用Validator验证,表单页面要默认设置为提交给自己(也就是action=空),然后通过控制器的方法去判断何种条件提交给实际跳转页面--}}
            {{csrf_field()}}
            <div class="form-group">
                <label for="firstname" class="col-md-2 control-label">名字<span class="text-danger">*</span></label>
                <div class="col-md-10 has-feedback">
                    <input type="text" class="form-control" name="user[userNumber]" placeholder="请输入用户名,必须为邮箱格式"
                           value="{{ old('user')['userNumber'] }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
            </div>
            <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label">密码<span class="text-danger">*</span></label>
                <div class="col-md-7" style="padding-right: 0px">
                    <input type="text" class="form-control" name="user[userPassword]" placeholder="请输入密码"
                           value="{{ old('user')['userPassword'] }}">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="checkbox col-md-3">
                    <label>
                        <input type="checkbox" value="">记住我
                    </label>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6"></div>
                <div class="col-md-3 text-left">
                    <a href="#">
                        <span class="glyphicon glyphicon-registration-mark text-info" style="font-size: 18px">&nbsp;忘记密码</span>
                    </a>
                </div>
                <div class="col-md-3 text-right">
                    <a href="{{url('register')}}">
                        <span class="glyphicon glyphicon-registration-mark text-info" style="font-size: 18px">&nbsp;用户注册</span>
                    </a>
                </div>
            </div>

            <br />
            <button type="submit" class="btn btn-primary btn-lg btn-block">
                <span class="glyphicon glyphicon-log-in">&nbsp;登录</span>
            </button>
        </form>

    </div>


</div>
</body>
</html>

