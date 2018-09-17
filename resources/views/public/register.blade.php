<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>demo - register</title>
    <script src="{{asset('jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <br /><br /><br /><br /><br /><br />
            <h1 class="text-center">用户注册</h1>
            <br /><br />
            @include('public.message')
            @include('public.validator')
            <form role="form" class="form-horizontal" method="post" action="">  {{--想要使用Validator验证,表单页面要默认设置为提交给自己(也就是action=空),然后通过控制器的方法去判断何种条件提交给实际跳转页面--}}
                {{csrf_field()}}
                <div class="form-group">
                    <label for="firstname" class="col-md-3 control-label">用户名<span class="text-danger">*</span></label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="user[userNumber]" placeholder="请输入用户名,必须为邮箱格式"
                               value="{{ old('user')['userNumber'] }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-sm-3 control-label">密码<span class="text-danger">*</span></label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="user[userPassword]" placeholder="请输入密码" style="padding-right: 0px"
                               value="{{ old('user')['userPassword'] }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-sm-3 control-label">确认密码<span class="text-danger">*</span></label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="user[userConfirmPassword]" placeholder="请输入确认密码" style="padding-right: 0px"
                               value="{{ old('user')['userConfirmPassword'] }}">
                    </div>
                </div>

                <br />
                <button type="submit" class="btn btn-primary btn-lg btn-block">
                    <span class="glyphicon glyphicon-floppy-saved">&nbsp;确定</span>
                </button>
                <a href="{{url('login')}}" class="btn btn-primary btn-lg btn-block">
                    <span class="glyphicon glyphicon-circle-arrow-left">&nbsp;取消</span>
                </a>
            </form>
        </div>
    </div>
</div>
</body>
</html>

