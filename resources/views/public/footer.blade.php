<style type="text/css">
    .copyright{
        width: 100%;
        height: 200px;
        background-color: rgba(223,240,216,0.46);
        clear: both;
    }
    .copyright_content{
        width: 1000px;
        margin: 0 auto;
        padding-top: 20px;
    }
    .copyright_content li{
        list-style-type: none;
        float: left;
        width: 240px;
        text-align: center;
        line-height: 30px;
        font-family: 微软雅黑;

    }
    .line_repeat{
        background: url("../img/line.png") no-repeat right center;
    }
    .copyright_content a{
        text-decoration: none;
        color: #999999;
        font-size: 18px;
    }
    .copyright_content li ul li a{
        font-size: 14px;
    }
</style>


<div class="copyright">
    <div class="copyright_content">
        <ul>
            <li class="line_repeat">关于
                <ul>
                    <li><a href="#">品牌故事</a></li>
                    <li><a href="#">联系我们</a></li>
                    <li><a href="#">加入我们</a></li>
                    <li><a href="#">版权声明</a></li>
                </ul>
            </li>
            <li class="line_repeat">关注
                <ul>
                    <li><a href="#">新浪微博</a></li>
                    <li><a href="#">腾讯微博</a></li>
                    <li><a href="#">企业微信</a></li>
                    <li><a href="#">QQ空间</a></li>
                </ul>
            </li>
            <li class="line_repeat">留言
                <ul>
                    <li><a href="#">意见反馈</a></li>
                    <li><a href="#">问题留言</a></li>
                    <li><a href="#">媒体联络</a></li>
                    <li><a href="#">在线客服</a></li>
                </ul>
            </li>
            <li><img src="{{asset('img/weixin.png')}}" alt="微信关注" width="30" height="27" />微信关注
                <ul>
                    <li><img src="{{asset('img/qrcode.jpg')}}" alt="扫描关注慕课网官方微信" width="102" height="102" /></li>
                </ul>
            </li>
        </ul>
    </div><!--copyright_content-->
</div><!--copyright-->

