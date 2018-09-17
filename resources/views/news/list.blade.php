@extends('public.common')

@section('main')


<style type="text/css">
    .news_list  li{
        list-style-type: none;

    }
    .news_list_a{
        display: block;
        list-style-type: none;
        text-align: center;
    }
</style>


<div class="col-md-3" style="">
    <div class="panel panel-default">
        <div class="panel-body" style="padding: 5px">
            <div class="info_list panel-group" id="accordion">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="news_list_a" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                <i class="glyphicon glyphicon-align-justify"></i> 新迪活动<span class="pull-right glyphicon glyphicon-chevron-down"></span>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="news_list">
                                <ul style="padding: 0px">
                                    <li><span>2018-01-09</span><a href="#" onclick="getNewsInfo('1')">暑期夏令营书法主题第三课</a> </li>
                                    <li><span>2018-01-10</span><a href="#" onclick="getNewsInfo('1')">暑期夏令营书法主题第二课</a> </li>
                                    <li><span>2018-01-13</span><a href="#" onclick="getNewsInfo('1')">暑期夏令营书法主题第一课</a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="news_list_a" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                <i class="glyphicon glyphicon-align-justify"></i> 优秀作品<span class="pull-right glyphicon glyphicon-chevron-down"></span>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="news_list">
                                <ul style="padding: 0px">
                                    <li><span>2017-01-09</span><a href="{{url('news/list/1')}}">江苏2017文联书画登记考试新迪艺术学校考点安排</a> </li>
                                    <li><span>2017-01-09</span><a href="{{url('news/list/1')}}">暑假夏令营书法主题课题第二期</a> </li>
                                    <li><span>2017-01-09</span><a href="{{url('news/list/1')}}">新迪书法备战考级'每日临池'打卡活动开始啦</a> </li>
                                    <li><span>2017-01-09</span><a href="{{url('news/list/1')}}">新迪书法优秀作品集2017</a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="news_list_a" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                <i class="glyphicon glyphicon-align-justify"></i> 考级考试<span class="pull-right glyphicon glyphicon-chevron-down"></span>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="news_list">
                                <ul style="padding: 0px">
                                    <li><span>2017-01-09</span><a href="{{url('news/list/1')}}">江苏2017文联书画登记考试新迪艺术学校考点安排</a> </li>
                                    <li><span>2017-01-09</span><a href="{{url('news/list/1')}}">暑假夏令营书法主题课题第二期</a> </li>
                                    <li><span>2017-01-09</span><a href="{{url('news/list/1')}}">新迪书法备战考级'每日临池'打卡活动开始啦</a> </li>
                                    <li><span>2017-01-09</span><a href="{{url('news/list/1')}}">新迪书法优秀作品集2017</a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="news_list_a" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                <i class="glyphicon glyphicon-align-justify"></i> 系统公告<span class="pull-right glyphicon glyphicon-chevron-down"></span>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="news_list">
                                <ul style="padding: 0px">
                                    <li><span>2017-01-09</span><a href="{{url('news/list/1')}}">江苏2017文联书画登记考试新迪艺术学校考点安排</a> </li>
                                    <li><span>2017-01-09</span><a href="{{url('news/list/1')}}">暑假夏令营书法主题课题第二期</a> </li>
                                    <li><span>2017-01-09</span><a href="{{url('news/list/1')}}">新迪书法备战考级'每日临池'打卡活动开始啦</a> </li>
                                    <li><span>2017-01-09</span><a href="{{url('news/list/1')}}">新迪书法优秀作品集2017</a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<script>
    $(function(){$('#collapseFour').collapse('show')});
    $(function(){$('#collapseThree').collapse('show')});
    $(function(){$('#collapseTwo').collapse('show')});
    $(function(){$('#collapseOne').collapse('show')});

    /*ajax实现右边新闻内容的显示*/
    function getNewsInfo(news_id){
        $.ajax({
            type:'get',
            url:'/laravel-xindi/public/news/list/'+news_id,//onclick后，系统会在执行这个路由中的处理
            success:function(data){
                $("#newsInfo").html(data);//上面url的结果被返回到这个id时newsInfo里
            }
        });
    }
</script>

{{--新闻详情--}}
<div class="col-md-9" style="padding: 5px 1px 0px 1px">
    <div class="panel panel-default">
        @include('news.newsInfo')
    </div>
</div>
@stop