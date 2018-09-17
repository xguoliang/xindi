<script>
    $(function(){
        $("[data-toggle='popover']").popover();
    })
</script>
<div class="container">
    <div class="row">
        <div class="col-md-7">
            <img src="{{asset('xindiImg/logo1.jpg')}}" alt="慕课网" style="margin: 0 auto;display: block"/>
        </div>
        <div class="col-md-1">
        </div>
        <div class="col-md-4" style="line-height: 40px">
            <div class="text-center">
                <span class="glyphicon glyphicon-phone-alt">24小时服务热线:<span class="text-info">1234567890</span></span>
            </div>
            <div class="text-center">
                <a href="#">
                    <span class="glyphicon glyphicon-user text-info" style="font-size: 18px">{{ Session::get('validuser') }}</span>
                </a>
                &nbsp;&nbsp;<br />
                <a href="{{url('login')}}">
                    <span class="glyphicon glyphicon-log-out text-info" style="font-size: 18px">注销</span>
                </a>
            </div>
        </div>
    </div>

    <div class="navbar navbar-default" role="navigation">
        <div class="container-fluid" style="padding: 0px 50px">
            {{--<div class="navbar-header col-md-1">
                <a class="navbar-brand" href="#" style="font-size:20px;text-shadow: #999 5px 3px 3px;font-family: 'Arial Black';"><span class="text-danger">新迪艺术</span></a>
            </div>--}}
            <div class="text-info col-md-8">
                <ul class="nav navbar-nav" style="font-size: 18px">
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </li>
                    <li>
                        <a href="{{url('home')}}">
                            <span class="glyphicon glyphicon-home text-info"></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('news/list')}}">
                            <span class="text-info">新闻活动</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="text-info">课程培训</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('schedule/list')}}">课程表</a> </li>
                            <li class="disabled"><a href="#">XXXX</a> </li>
                            <li class="divider"></li>
                            <li><a href="{{url('order/list')}}">课程预约管理</a> </li>
                            <li><a href="{{url('classhour/list',['flag'=>'tea'])}}">课时纪录管理</a> </li>
                        </ul>
                    </li>
                    <li class="disabled">
                        <a href="#">
                            <span>信息中心</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="text-info">管理员管理</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('people/peopleList/stu')}}">学生管理</a> </li>
                            <li><a href="{{url('people/peopleList/tea')}}">教师管理</a> </li>
                            <li class="divider"></li>
                            <li class="disabled"><a href="#">课程表管理</a> </li>
                        </ul>
                    </li>
                    <li class="dropdown disabled">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span>其他</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">1</a> </li>
                            <li><a href="#">2</a> </li>
                            <li><a href="#">3</a> </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <form class="navbar-form text-right" role="search">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-primary">提交</button>
                </form>
            </div>
        </div>
</div>
