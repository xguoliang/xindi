<table class="table table-striped table-hover table-responsive">
    <tbody>
    <tr>
        <th>ID</th>
        <th>{{$flag=='stu'?'已考勤工时':'已完结工时'}}</th>
        <th>创建时间</th>
        <th>最后修改时间</th>
        <th>备注</th>
        <th>操作</th>
    </tr>
    </tbody>
    @foreach(\App\Classhour::getClasshourByPerson($person->id) as $classhourOfthisPerson)
        <tr>
            <td>{{$classhourOfthisPerson->id}}</td>
            <td>{{$classhourOfthisPerson->classhourRecordTime}}</td>
            <td>{{$classhourOfthisPerson->created_at}}</td>
            <td>{{$classhourOfthisPerson->updated_at}}</td>
            <td>{{$classhourOfthisPerson->classhourRemark}}</td>
            <td>
                <a href="#" style=""
                   onclick="if (confirm('确定删除?')==false) return false">
                    <span class="label label-danger">删除</span>
                </a>
            </td>
        </tr>
    @endforeach

</table>
