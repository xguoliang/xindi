@if(count($errors))
    <div class="alert alert-danger">
         <a href="#" class="close" data-dismiss="alert">x</a>
        <strong>错误:</strong>{{$errors->first()}}
    </div>
@endif