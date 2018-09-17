@extends('public.common')

@section('main')


<style type="text/css">
    .ad{
        height: 420px;
        overflow: hidden;
        padding: 0px 0px;

    }
    .more{
        float: right;
        line-height: 51px;
        padding-right: 10px;
    }
</style>

<script src="{{asset('myFocus-2.0.1/js/myfocus-2.0.1.min.js')}}"></script>
{{--焦点图--}}
<div class="col-md-12 ad" id="picBox">
    <div class="loading"><img src="{{asset('img/loading.gif')}}" alt="图片加载中。。。"></div>
    <div class="pic">
        <ul>
            <li><img src="{{asset('xindiImg/slide1.jpg')}}"></li>
            <li><img src="{{asset('xindiImg/slide2.jpg')}}"></li>
            <li><img src="{{asset('xindiImg/slide3.jpg')}}"></li>
        </ul>
    </div>
</div>
{{--<script type="text/javascript">
    myFocus.set({id:'picBox'});
</script>--}}
<script type="text/javascript">
    myFocus.set({
        id:'picBox',//焦点图盒子ID
        //pattern:'mF_name',//风格应用的名称
        time:3,//切换时间间隔(秒)
        trigger:'click',//触发切换模式:'click'(点击)/'mouseover'(悬停)
        //width:450,//设置图片区域宽度(像素)
        height:600,//设置图片区域高度(像素)
        txtHeight:'default'//文字层高度设置(像素),'default'为默认高度，0为隐藏
    });
</script>

{{--新闻中心 --}}
<div class="col-md-4" style="padding: 5px">
    <div class="panel panel-default">
        <div class="panel-heading" style="padding: 5px">
            <img src="{{asset('xindiImg/xinwen.jpg')}}" class="img-thumbnail">
            <span class="h4"> 新闻活动</span>
            <a href="{{url('news/list')}}"><span class="more">more>></span> </a>
        </div>
        <div class="panel-body" style="padding: 5px">
            @include('home.news')
        </div>
    </div>

</div>


{{--课程中心--}}
<div class="col-md-5" style="padding: 5px">
    <div class="panel panel-default">
        <div class="panel-heading" style="padding: 5px">
            <img src="{{asset('xindiImg/kecheng.jpg')}}" class="img-thumbnail">
            <span class="h4"> 培训课程</span>
            <a href="#"><span class="more">more>></span> </a>
        </div>
        <div class="panel-body" style="padding: 5px">
             @include('home.classes')
        </div>
    </div>
</div>


{{--媒体中心--}}
<div class="col-md-3" style="padding: 5px">
    <div class="panel panel-default">
        <div class="panel-heading" style="padding: 5px">
            <img src="{{asset('xindiImg/meiti.jpg')}}" class="img-thumbnail">
            <span class="h4"> 信息中心</span>
            <a href="#"><span class="more">more>></span> </a>
        </div>
        <div class="panel-body" style="padding: 5px">
             @include('home.info')
        </div>
    </div>
</div>

@stop