@if(count($students)==0)
    <div class="alert alert-danger">没有查到任何学生信息..</div>
@else
    <div class="alert alert-info">符合条件的有{{count($students)}}个学生:</div>
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title text-center">选择学生和星期</h3>
        </div>
        <div class="panel-body">
            <table>
                <tr>
                    <td class="col-md-6">
                        <div>
                            @foreach($students as $student)
                                <div style="float: left;margin-right: 10px">
                                    <span class="radio-inline">
                                        <input type="checkbox" class="input-small" name="name_stuInfo" value_id="{{$student->id}}"
                                               value_card="{{$student->userCard}}" value_name="{{$student->userName}}"><span class="h4">
                                            <span class="label label-info" data-toggle="tooltip" title="学号:{{$student->userCard}}">{{$student->userName}}</span></span>
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </td>
                    <td class="col-md-2">
                        <br />
                        <p class="text-center">添加到</p>
                        <p class="text-center"><span class="glyphicon glyphicon-arrow-right"></span> </p>
                    </td>
                    <td class="col-md-2">
                        <label class="radio-inline">
                            <input type="radio" name="week" id="" value="week_1">星期一
                        </label><br />
                        <label class="radio-inline">
                            <input type="radio" name="week" id="" value="week_2">星期二
                        </label><br />
                        <label class="radio-inline">
                            <input type="radio" name="week" id="" value="week_3">星期三
                        </label><br />
                        <label class="radio-inline">
                            <input type="radio" name="week" id="" value="week_4">星期四
                        </label><br />
                        <label class="radio-inline">
                            <input type="radio" name="week" id="" value="week_5">星期五
                        </label><br />
                        <label class="radio-inline">
                            <input type="radio" name="week" id="" value="week_6">星期六
                        </label><br />
                        <label class="radio-inline">
                            <input type="radio" name="week" id="" value="week_7">星期天
                        </label><br />
                    </td>
                    <td class="col-md-2">
                        <button type="button" class="btn btn-primary" id="id_stuSave">
                            <span class="glyphicon glyphicon-floppy-saved">保存</span>
                        </button>
                    </td>
                </tr>
            </table>
        </div>
    </div>



@endif