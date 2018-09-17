<!DOCTYPE html>
<html>
<head>
<title>酷炫</title>
<style>
    li{
        list-style-type: none;
        float: right;
        width: 240px;
        text-align: center;
        line-height: 30px;
        font-family: 微软雅黑;
    }
    .line_repeat{
        background: url("../img/line.png") no-repeat right center;
    }
</style>


</head>
<body>
<div class="col-md-8 col-md-offset-2">

{{--    <ul>
        <li>
            <ul>
                <li>
                    <img src="{{asset('img/test/erweima.png')}}" width="102" height="102" />
                </li>
            </ul>
        </li>
        <li>
            <span class="h3 text-info">----By 墙上的守夜人</span>
        </li>
    </ul>--}}
    <audio autoplay="autoplay" controls="controls" loop="loop" preload="auto" src="{{asset('mp3/dengziqi.m4a')}}">
        你的浏览器不支持音乐播放，请使用chrome
    </audio>

    <canvas id="canvas_static" style="border: 0px solid #aaaaaa;display: block;margin: 0 auto;position: absolute;top: 5px;z-index: 0">
        你的浏览器不支持，请使用chrome
    </canvas>
    <canvas id="canvas_dynamic" style="border: 0px solid #aaaaaa;display: block;margin: 0 auto;position: absolute;top: 5px;z-index: 1">
        你的浏览器不支持，请使用chrome
    </canvas>
    <canvas id="canvas" style="border: 0px solid #aaaaaa;display: block;margin: 0 auto;position: absolute;top: 5px;z-index: 2">
        你的浏览器不支持，请使用chrome
    </canvas>

    <script src="{{asset('canvas/kuxuan/digit.js')}}"></script>
    <script src="{{asset('canvas/kuxuan/countdown.js')}}"></script>
</div>
</body>
</html>
