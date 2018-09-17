<style type="text/css">
    .news_list_first p{
        line-height: 35px;
        margin: 0px 5px;
    }
    .news_list_others{
        margin-top: 10px;
    }
    .news_list_others ul{
        padding-left: 0px;
    }
    .news_list_others li{
        list-style-type: none;
        background: url("{{asset('img/list.jpg')}}") no-repeat;
        padding-left: 10px;
        margin: 8px;
        border-bottom: 1px solid #cccccc;
    }
    .news_list_first p{
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>

<div class="news_list_first">
    <img src="{{asset('xindiImg/news_1.jpg')}}" style="float:left;margin-right: 5px">
    <p class="h4"><a href="#" class="text-danger">暑期夏令营书法主题课第三期</a> </p>
    <p class="h5">活动时间:5-12~6-13</p>
    <p class="h5">公布时间:5-30</p>
    <p><a href="#" class="text-danger">Learn More >></a> </p>
</div>
<div class="news_list_others">
    <ul>
        <li><span>2017-06-01</span><a href="{{url('news/list')}}">【考级考试】江苏2017文联书画登记考试新迪艺术学校考点安排</a> </li>
        <li><span>2017-06-01</span><a href="{{url('news/list')}}">【新迪活动】暑期夏令营书法主题课第二期</a> </li>
        <li><span>2017-07-11</span><a href="{{url('news/list')}}">【系统公告】洗涤书法备战考级打卡活动即将开始</a> </li>
        <li><span>2017-09-27</span><a href="{{url('news/list')}}">【优秀作品】新迪书法第12期优秀作品展出</a> </li>
    </ul>
</div>