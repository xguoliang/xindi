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

   <canvas id="canvas_static" style="border: 0px solid #aaaaaa;display: block;margin: 0 auto;position: absolute;top: 5px;z-index: 0">
        你的浏览器不支持，请使用chrome
    </canvas>
    <canvas id="canvas" style="border: 0px solid #aaaaaa;display: block;margin: 0 auto;position: absolute;top: 5px;z-index: 1">
        你的浏览器不支持，请使用chrome
    </canvas>

    <script src="{{asset('canvas/yanhua/yanhua.js')}}"></script>

</div>
</body>
</html>
