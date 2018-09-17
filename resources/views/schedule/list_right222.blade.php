
@if(isset($currentId_d))<?php echo 'xxxx'.$currentId_d; ?>----------这个$currentId_d判断有问题
    @for($m=1;$m<=7;$m++)
        <td style="line-height: 23px">
            <form method="post" id="id_choose_form_{{$currentId_d}}_{{$m}}" action="">{{csrf_field()}}
                @if(isset($flag)&&$flag=='choose')
                    <a href="#" id="{{'id_choose_a_'.$currentId_d.'_'.$m}}" class="class_add" style="text-decoration: none" data-toggle="tooltip" title="添加试听排课到这里"
                       onclick='dealWithAdd({{$currentId_d}},{{$m}},{{$order->id}},"{{$order->orderName}}","{{$order->getSubject($order->orderSubject)}}")'>
                        <span class="glyphicon glyphicon-plus-sign" style="float: left"></span>
                    </a>
                    <br />
                @endif
                {{--显示各个普通学生的label--}}
                @foreach(\App\Schedule::getStuArr($currentId_d,$m) as $key=>$val)
                    <a href="#" style="text-decoration: none"><span class="label label-info glyphicon glyphicon-user" data-toggle="tooltip" title="学生学号:{{$key}}">{{$val}}</span></a>
                @endforeach
                {{--显示各个预约学生的label--}}
                @foreach(\App\Schedule::getStuArr($currentId_d,$m,'order') as $key=>$val)
                    @if(isset($flag)&&$flag=='choose')
                        @if($key==$order->id)
                            <a href="#" style="text-decoration: none"><span class="label label-info glyphicon glyphicon-remove-circle" style="background-color: #b9b5af" data-toggle="tooltip" title="原来位置">
                        {{\App\Order::where('id','=',$key)->first()->orderName}}</span></a>
                        @else
                            <a href="#" style="text-decoration: none"><span class="label label-info glyphicon glyphicon-fire" style="background-color: #f1a118" data-toggle="tooltip" title="【试听】:{{$val}}">
                        {{\App\Order::where('id','=',$key)->first()->orderName}}</span></a>
                        @endif
                    @else
                        <a href="#" style="text-decoration: none"><span class="label label-info glyphicon glyphicon-fire" style="background-color: #f1a118" data-toggle="tooltip" title="【试听】:{{$val}}">
                    {{\App\Order::where('id','=',$key)->first()->orderName}}</span></a>
                    @endif
                @endforeach
            </form>
        </td>
    @endfor

    @if(isset($flag)&&$flag=='choose')
    @else
        <td class="text-center" style="vertical-align: middle">
            <a href="{{url('schedule/update',['TeaId'=>$currentId_d])}}" style="text-decoration: none"><span class="label label-warning">修改</span> </a><p></p>
            <a href="{{url('schedule/delete',['TeaId'=>$currentId_d])}}" style="text-decoration: none"
               onclick="if(confirm('确定要删除吗')==false)return false"><span class="label label-danger">删除</span> </a>
        </td>
    @endif
    </tr>
@else
    @for($m=1;$m<=7;$m++)
        <td style="line-height: 23px">
        </td>
    @endfor
    @if(isset($flag)&&$flag=='choose')
    @else
        <td class="text-center" style="vertical-align: middle">
            <span class="text-center">\</span>
        </td>
    @endif
    </tr>
@endif

{{--@for($m=1;$m<=7;$m++)
    <td style="line-height: 23px">
        <form method="post" id="id_choose_form_{{$currentId_d}}_{{$m}}" action="">{{csrf_field()}}
        @if(isset($flag)&&$flag=='choose')
            <a href="#" id="{{'id_choose_a_'.$currentId_d.'_'.$m}}" class="class_add" style="text-decoration: none" data-toggle="tooltip" title="添加试听排课到这里"
                onclick='dealWithAdd({{$currentId_d}},{{$m}},{{$order->id}},"{{$order->orderName}}","{{$order->getSubject($order->orderSubject)}}")'>
                <span class="glyphicon glyphicon-plus-sign" style="float: left"></span>
            </a>
            <br />
        @endif
        --}}{{--显示各个普通学生的label--}}{{--
        @foreach(\App\Schedule::getStuArr($currentId_d,$m) as $key=>$val)
            <a href="#" style="text-decoration: none"><span class="label label-info glyphicon glyphicon-user" data-toggle="tooltip" title="学生学号:{{$key}}">{{$val}}</span></a>
        @endforeach
        --}}{{--显示各个预约学生的label--}}{{--
        @foreach(\App\Schedule::getStuArr($currentId_d,$m,'order') as $key=>$val)
            @if(isset($flag)&&$flag=='choose')
                @if($key==$order->id)
                    <a href="#" style="text-decoration: none"><span class="label label-info glyphicon glyphicon-remove-circle" style="background-color: #b9b5af" data-toggle="tooltip" title="原来位置">
                        {{\App\Order::where('id','=',$key)->first()->orderName}}</span></a>
                @else
                    <a href="#" style="text-decoration: none"><span class="label label-info glyphicon glyphicon-fire" style="background-color: #f1a118" data-toggle="tooltip" title="【试听】:{{$val}}">
                        {{\App\Order::where('id','=',$key)->first()->orderName}}</span></a>
                @endif
            @else
                <a href="#" style="text-decoration: none"><span class="label label-info glyphicon glyphicon-fire" style="background-color: #f1a118" data-toggle="tooltip" title="【试听】:{{$val}}">
                    {{\App\Order::where('id','=',$key)->first()->orderName}}</span></a>
            @endif
        @endforeach
        </form>
    </td>
@endfor

@if(isset($flag)&&$flag=='choose')
@else
    <td class="text-center" style="vertical-align: middle">
        <a href="{{url('schedule/update',['TeaId'=>$currentId_d])}}" style="text-decoration: none"><span class="label label-warning">修改</span> </a><p></p>
        <a href="{{url('schedule/delete',['TeaId'=>$currentId_d])}}" style="text-decoration: none"
            onclick="if(confirm('确定要删除吗')==false)return false"><span class="label label-danger">删除</span> </a>
    </td>
@endif
</tr>--}}

<script>
    $(function(){$("[data-toggle='tooltip']").tooltip(); });
</script>