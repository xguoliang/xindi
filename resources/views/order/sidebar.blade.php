<div class="list-group">
    <a href="{{url('order/list')}}" class="list-group-item
    {{Request::getPathInfo()=='/order/list'?'active':''}}">
        <span class="h4">预约列表</span>
    </a>
    <a href="{{url('order/create')}}" class="list-group-item
    {{Request::getPathInfo()!='/order/list'?'active':''}}">
        <span class="h4">新增列表</span>
    </a>
</div>