<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>新迪艺术书法学校 - @yield('title')</title>
    <style type="text/css">
        .header{
            width:1500px;
            height: 150px;
            margin: 0 auto;
            background: #f5f5f5;
            border: 1px solid #DDDDDD;
        }
        .main{
            width:1500px;
            height: 600px;
            margin: 0 auto;
            margin-top: 10px;
            clear: both;
        }
        .main .sidebar{
            float: left;
            width: 240px;
            height: inherit;
            background: #f5f5f5;
            border: 1px solid #DDDDDD;
        }
        .main .content{
            float: left;
            width: 1250px;
            height: inherit;
            background: #f5f5f5;
            border: 1px solid #DDDDDD;
        }
        .footer{
            width:1500px;
            height: 100px;
            margin: 0 auto;
            margin-top: 10px;
            background: #f5f5f5;
            border: 1px solid #DDDDDD;
        }

    </style>
</head>
<body>
    <div class="header">
        @section('header')
            头部
        @show
    </div>
    <div class="main">
        @section('main_content')
            <div class="sidebar">
                @section('sidebar')
                    侧边栏
                @show
            </div>
            <div class="content">
                @yield('content', '主要内容区域')
            </div>
        @show
    </div>

    <div class="footer">
        @section('footer')
            底部
        @show
    </div>
</body>
</html>

