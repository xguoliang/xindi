<form role="form" class="form-horizontal" method="post" action="">
    {{csrf_field()}}
    <div class="form-group">
        <label class="col-md-2 control-label">{{$flag=='stu'?'学生学号':'教师工号'}}</label>
        <div class="col-md-10">
            <input type="text" class="form-control" name="Person[userCard]" placeholder="请输入姓名"
                   value="{{Request::getPathInfo()=='/people/create/stu'||Request::getPathInfo()=='/people/create/tea'?\App\People::getCardNum($flag):$person->userCard}}" readonly>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">姓名</label>
        <div class="col-md-10">
            <input type="text" class="form-control" name="Person[userName]" placeholder="请输入姓名"
                   value="{{ old('Person')['userName']?old('Person')['userName']:$person->userName }}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">性别</label>
        <div class="col-md-10">
            @foreach(\App\People::$arr_sex as $key=>$val)
                <div class="col-md-2">
                    <label class="radio-inline">
                        <input type="radio" name="Person[userGender]" value="{{$key}}" {{isset($person->userGender)&&$person->userGender==$key?"checked='checked":''}}>{{$val}}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">出生日期</label>
        <div class="col-md-10">
            <input type="text" class="form_datetime form-control" name="Person[userBirthday]" placeholder="请输入出生日期"
                   value="{{ old('Person')['userBirthday']?old('Person')['userBirthday']:$person->userBirthday }}" readonly>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">联系方式</label>
        <div class="col-md-10">
            <input type="text" class="form-control" name="Person[userPhone]" placeholder="请输入11位手机号,或者QQ号"
                   value="{{ old('Person')['userPhone']?old('Person')['userPhone']:$person->userPhone }}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">科目</label>
        <div class="col-md-10">
            <div class="col-md-3" style="padding-left: 0px">
                <label class="radio-inline">
                    <input type="checkbox" name="Person[userSubject][0]" value="s" {{isset($person->userSubject)&&(strstr($person->userSubject,'s')!=false)?"checked='checked":''}}>书法
                </label>
            </div>
            <div class="col-md-3" style="padding-left: 0px">
                <label class="radio-inline">
                    <input type="checkbox" name="Person[userSubject][1]" value="h" {{isset($person->userSubject)&&(strstr($person->userSubject,'h')!=false)?"checked='checked":''}}>绘画
                </label>
            </div>
            <div class="col-md-3" style="padding-left: 0px">
                <label class="radio-inline">
                    <input type="checkbox" name="Person[userSubject][2]" value="o" {{isset($person->userSubject)&&(strstr($person->userSubject,'o')!=false)?"checked='checked":''}}>其他
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">备注</label>
        <div class="col-md-10">
                <textarea class="form-control" name="Person[userRemark]" placeholder="请输入备注">{{ old('Person')['userRemark']?old('Person')['userRemark']:$person->userRemark }}</textarea>
        </div>
    </div>

    <br />
    <button type="submit" class="btn btn-primary btn-lg btn-block">
        <span class="glyphicon glyphicon-floppy-saved">&nbsp;提交</span>
    </button>
    <a href="{{$flag=='stu'?url('people/peopleList/stu'):url('people/peopleList/tea')}}" class="btn btn-default btn-lg btn-block">
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