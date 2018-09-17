<style type="text/css">
    .classes_list_first p{
        margin: 0px 5px;
        text-align: center;
    }
    .css_myTab > li{
        margin: 0px 12px;
    }


</style>

<div class="classes_list_first">
    <img src="{{asset('xindiImg/classes_1.jpg')}}" style="float: left"/>
    <div style="height: 500px">
        <br /><br />
        <p style="color: red;font-size: 20px">新迪書法藝術學校</p>
        <p>Everyday is a beautiful day</p>
        <p>(办学许可证号：13201057XX15011)</p>
        <br />
        <p>教育部审批正规书画培训学校</p>
        <p>教师全部毕业于正规艺术院校，有多年少儿教学经验</p>
        <p>开设各年龄层书法绘画课程:</p>
        <p>少儿书法（4-16岁），</p>
        <p>少儿国画（4-16岁），</p>
        <p>少儿素描（8-16岁），</p>
        <p>成人书画修养培训。</p>
        <br />
        <p>每班不超过8人，一对一教学，随到随学。</p>
        <p>并承办各类艺术展览、艺术沙龙、诗会雅集等艺术活动</p>
        <br /><br />
        <p>地址：南京市水西门大街321号河西万达金街西区外铺</p>
        <p>咨询电话：86589991,66029293</p>
        <p>咨询qq：2971736250</p>
    </div>

</div>
<br />
<div>
    <ul id="myTab" class="css_myTab nav nav-tabs">
        <li class="dropdown">
            <a href="#" id="tag_1" class="dropdown-toggle" data-toggle="dropdown">
                少儿书法 <b class="caret"></b>
            </a>
            <ul class="dropdown-menu" rule="menu" aria-labelledby="tag_1">
                <li>
                    <a href="#tag_1_1" tabindex="-1" data-toggle="tab">
                        软笔书法常规班
                    </a>
                </li>
                <li>
                    <a href="#tag_1_2" tabindex="-1" data-toggle="tab">
                        硬笔书法常规班
                    </a>
                </li>
                <li>
                    <a href="#tag_1_3" tabindex="-1" data-toggle="tab">
                        硬笔书法
                    </a>
                </li>
                <li>
                    <a href="#tag_1_4" tabindex="-1" data-toggle="tab">
                        幼儿书法启蒙班
                    </a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" id="tag_2" class="dropdown-toggle" data-toggle="dropdown">
                少儿国画 <b class="caret"></b>
            </a>
            <ul class="dropdown-menu" rule="menu" aria-labelledby="tag_2">
                <li>
                    <a href="#tag_2_1" tabindex="-1" data-toggle="tab">
                        国画常规班
                    </a>
                </li>
                <li>
                    <a href="#tag_2_2" tabindex="-1" data-toggle="tab">
                        国画专业班
                    </a>
                </li>
                <li>
                    <a href="#tag_2_3" tabindex="-1" data-toggle="tab">
                        幼儿国画启蒙班
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#tag_3" data-toggle="tab">
                素描水粉
            </a>
        </li>
        <li>
            <a href="#tag_4" data-toggle="tab">
                成人书画
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <?php
            $tmp_id=array('tag_1_1','tag_1_2','tag_1_3','tag_1_4','tag_2_1','tag_2_2','tag_2_3','tag_3','tag_4');
            $tmp_p=array(
                '大篆班、隶书专业班、魏碑班、小楷班、宋代行书班、孙过庭《书谱》草书班',
                '初级班、中级班、高级班',
                '铅笔、钢笔',
                '4-6岁',
                '初级班、中级班、高级班',
                '唐诗宋词诗画班、古代经典名著绘本班',
                '4-6岁,幼儿绘本',
                '素描水粉',
                '成人书画'
            );
        ?>
        @for($i=0;$i<count($tmp_id);$i++)
            <div class="tab-pane fade" id="{{$tmp_id[$i]}}">
                <br />
                <p class="text-center text-primary">{{$tmp_p[$i]}}</p>
                <p class="text-center">
                    <a href="{{url('order/create')}}">
                        <button type="button" class="btn btn-primary btn-xs disabled">作品展示</button>
                        <button type="button" class="btn btn-primary btn-xs">预约试听</button>
                    </a>

                </p>
            </div>
        @endfor
    </div>
</div>

<script>
    $(function(){
        $('#myTab li:eq(1) a').tab('show');
    });
</script>


