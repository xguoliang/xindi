<form role="form" class="form-horizontal" method="post" action="">
    {{csrf_field()}}
    <div class="form-group">
        <label class="col-md-2 control-label">姓名<span class="text-danger">*</span> </label>
        <div class="col-md-10">
            <input type="text" class="form-control" name="Order[orderName]" placeholder="请输入姓名"
                   value="{{ old('Order')['userName']?old('Order')['userName']:$order->orderName }}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">性别</label>
        <div class="col-md-10">
            @foreach(\App\Order::$arr_sex as $key=>$val)
                <div class="col-md-2">
                    <label class="radio-inline">
                        <input type="radio" name="Order[orderGender]" value="{{$key}}" {{isset($order->orderGender)&&$order->orderGender==$key?"checked='checked":''}}>{{$val}}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">出生日期</label>
        <div class="col-md-10">
            <input type="text" class="form_datetime form-control" name="Order[orderBirthday]" placeholder="请输入出生日期"
                   value="{{ old('Order')['orderBirthday']?old('Order')['orderBirthday']:$order->orderBirthday }}" readonly>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">联系方式</label>
        <div class="col-md-10">
            <input type="text" class="form-control" name="Order[orderPhone]" placeholder="请输入11位手机号"
                   value="{{ old('Order')['orderPhone']?old('Order')['orderPhone']:$order->orderPhone }}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">科目<span class="text-danger">*</span> </label>
        <div class="col-md-10">
            @foreach(\App\Order::$arr_subject as $key=>$val)
                <div class="col-md-4">
                    <label class="radio-inline">
                        <input type="radio" name="Order[orderSubject]" value="{{$key}}" {{isset($order->orderSubject)&&($order->orderSubject==$key)?"checked='checked'":''}}>{{$val}}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
    @if(strpos(\Illuminate\Support\Facades\Request::path(),'update')!=false)
        <div class="form-group">
            <label class="col-md-2 control-label">安排听课</label>
            <div class="col-md-10">
                <input type="text" class="form-control"  value="{{$order->orderSubjectPosition=='n'?'尚未安排听课..':\App\Schedule::getChPath($order->orderSubjectPosition)}}" readonly>
            </div>
        </div>
    @elseif(strpos(\Illuminate\Support\Facades\Request::path(),'create')!=false)
        <div class="form-group">
            <label class="col-md-2 control-label">安排听课</label>
            <div class="col-md-10">
                <input type="text" class="form-control"  value="创建预约时不能安排听课，请创建成功后通过'预约听课'进行预约" readonly>
            </div>
        </div>
    @endif
    <div class="form-group">
        <label class="col-md-2 control-label">备注</label>
        <div class="col-md-10">
                <textarea class="form-control" name="Order[orderRemark]" placeholder="请输入备注">{{ old('Order')['orderRemark']?old('Order')['orderRemark']:$order->orderRemark }}</textarea>
        </div>
    </div>

    <br />
    <button type="submit" class="btn btn-primary btn-lg btn-block">
        <span class="glyphicon glyphicon-floppy-saved">&nbsp;提交</span>
    </button>
    <a href="{{url('order/list')}}" class="btn btn-default btn-lg btn-block">
        <span class="glyphicon glyphicon-circle-arrow-left">&nbsp;取消</span>
    </a>
</form>
<script>
    $(".form_datetime").datetimepicker({
        format:'yyyy-mm-dd',
        autoclose:true,
        todayBtn:true,
        todayHighlight:true,
        showMeridian:true,
        pickerPosition:'bottom-right',
        language:'zh-CN',
        startView:2,//月视图
        minView:2//时间精确成都
    });
</script>