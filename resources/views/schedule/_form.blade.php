<form role="form" class="form-horizontal col-md-12" method="post" action="">
    {{csrf_field()}}
    <div class="col-md-10 col-md-offset-1">
        <table width="100%">
            @if($flag=='create')
                <tr>
                    <td>
                        <h4 class="text-info">请选择一位老师(<span class="text-danger">必填*</span>): </h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="col-md-11 col-md-offset-1">
                            @foreach($people as $person)
                                <div class="col-md-3">
                                    <label class="radio-inline">
                                        <input type="radio" class="input-sm" name="Person[id]" value="{{$person->id}}" />
                                        <span class="h3"><span class="label label-success">{{$person->userName.'('.$person->userCard.')'}}</span> </span>
                                    </label>
                                    </div>
                            @endforeach
                        </div>
                    </td>
                </tr>
            @elseif($flag=='update')
                <tr>
                    <td>
                        <h4 class="text-info">老师信息(<span class="text-danger">不允许修改</span>): </h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="col-md-11 col-md-offset-1">
                            <div class="col-md-3">
                                <label class="radio-inline">
                                    <input type="radio" class="input-sm" name="Person[id]" value="{{$TeaId}}" checked readonly/><span class="h3">
                                        <span class="label label-success">{{\App\People::find($TeaId)->userName.'('.\App\People::find($TeaId)->userCard.')'}}</span> </span>
                                </label>
                            </div>
                        </div>
                    </td>
                </tr>
            @endif

                <tr>
                    <td>
                        @if($flag=='create')
                            <h4 class="text-info">请选择该老师下的学生(选填)：</h4>
                        @elseif($flag=='update')
                            <h4 class="text-info">查询信息然后添加学生：</h4>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="has-feedback col-md-11 col-md-offset-1">
                            <input type="text" class="form-control" placeholder="请输入查询参数，如学生姓名 学生工号等，支持模糊查询" id="id_stuSearch"/>
                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>
                        <br />
                    </td>
                </tr>
                <tr>
                    <td>
                        <br />
                        <div class="has-feedback col-md-11 col-md-offset-1">
                            <span id="showStuInfo"></span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="panel panel-success col-md-offset-1">
                            <div class="panel-heading">
                                @if($flag=='create')
                                    <h3 class="panel-title text-center">已添加的信息</h3>
                                @elseif($flag=='update')
                                    <h3 class="panel-title text-center">学生信息</h3>
                                @endif
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <?php
                                        $tmpWeekStr=array('星期一','星期二','星期三','星期四','星期五','星期六','礼拜天')
                                    ?>
                                    @for($j=0;$j<7;$j++)
                                        <tr>
                                            <td class="col-md-1">{{$tmpWeekStr[$j]}}</td>
                                            <td class="col-md-11" id="alreadyWeek_{{$j+1}}">
                                                @if($flag=='update')
                                                    <?php
                                                        $i=0;
                                                    ?>
                                                    @foreach(\App\Schedule::getStuArr($SchId,$j+1) as $key=>$val)
                                                        <div style="float: left;margin-right: 5px" id="id_week_{{$j+1}}_X_div{{$i}}">
                                                            <input type="checkbox" class="input-small" id="id_week_{{$j+1}}_X_input{{$i}}" name="week_{{$j+1}}[]"
                                                                value="{{\App\People::where('userCard','=',$key)->first()->id}}" style="display: none" checked />
                                                            <span class="label label-success" data-toggle="tooltip" title="学号:{{$key}}">{{$val}}
                                                                <a class="text-danger" style="text-decoration: none;cursor: pointer" data-toggle="tooltip" title="点击删除" onclick="dealWithX({{$j}},{{$i}})">
                                                                    <span class="glyphicon glyphicon-trash"></span>
                                                                </a>
                                                            </span>
                                                        </div>
                                                        <?php
                                                            $i++;
                                                        ?>
                                                    @endforeach
                                                    @foreach(\App\Schedule::getStuArr($SchId,$j+1,'order') as $key=>$val)
                                                        <div style="float: left;margin-right: 5px" id="id_week_{{$j+1}}_chooseX_div{{$i}}">
                                                            <input type="checkbox" class="input-small" id="id_week_{{$j+1}}_chooseX_input_{{$i}}" name="chooseSubject_{{$j+1}}[]"
                                                                   value="{{$key}}" style="display: none" checked />
                                                        <span class="label label-success" style="background-color: #f1a118" data-toggle="tooltip" title="【试听】:{{$val}}">
                                                            {{\App\Order::where('id','=',$key)->first()->orderName}}
                                                            <a class="text-danger" style="text-decoration: none;cursor: pointer" data-toggle="tooltip" title="点击删除" onclick="dealWithX({{$j}},{{$i}},'flagChoode')">
                                                                <span class="glyphicon glyphicon-trash"></span>
                                                            </a>
                                                        </span>
                                                        </div>
                                                        <?php
                                                            $i++;
                                                        ?>
                                                    @endforeach
                                                @endif
                                            </td>
                                        </tr>
                                    @endfor
                                </table>
                            </div>
                        </div>
                    </td>
                </tr>
        </table>
        <br />
        <button type="submit" class="btn btn-primary btn-lg btn-block"><span class="glyphicon glyphicon-floppy-saved"> 提交</span> </button>
        <a href="{{url('schedule/list')}}" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-circle-arrow-left"> 取消</span> </a>
    </div>
</form>
