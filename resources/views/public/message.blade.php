
@if(Session::has('success_flag'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <a href="#" class="close" data-dismiss="alert">x</a>
        <span class="badge">1</span>
        <strong>成功:</strong> {{ Session::get('success_flag') }}
    </div>
@endif
@if(Session::has('fail_flag'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <a href="#" class="close" data-dismiss="alert">x</a>
        <span class="badge">1</span>
        <strong>失败:</strong> {{ Session::get('fail_flag') }}
    </div>
@endif
@if(Session::has('error_flag'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <a href="#" class="close" data-dismiss="alert">x</a>
        <span class="badge">1</span>
        <strong>错误:</strong> {{ Session::get('error_flag') }}
    </div>
@endif

