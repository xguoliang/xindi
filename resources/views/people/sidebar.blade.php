<div class="list-group">
    @if($flag=='stu')
        <a href="{{url('people/peopleList/stu')}}" class="list-group-item
    {{Request::getPathInfo()=='/people/peopleList/stu'?'active':''}}">
            <span class="h4">学生列表</span>
        </a>
        <a href="{{url('people/create/stu')}}" class="list-group-item
    {{Request::getPathInfo()!='/people/peopleList/stu'?'active':''}}">
            <span class="h4">新增学生</span>
        </a>
    @else
        <a href="{{url('people/peopleList/tea')}}" class="list-group-item
    {{Request::getPathInfo()=='/people/peopleList/tea'?'active':''}}">
            <span class="h4">教师列表</span>
        </a>
        <a href="{{url('people/create/tea')}}" class="list-group-item
    {{Request::getPathInfo()!='/people/peopleList/tea'?'active':''}}">
            <span class="h4">新增教师</span>
        </a>
    @endif
</div>