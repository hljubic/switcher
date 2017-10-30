@if(count($errors)>0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="col-md-8 col-md-offset-2">
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{session('success')}}
        </div>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
    <div class="col-md-8 col-md-offset-2">
        <div class="alert alert-dismissible alert-error">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{session('error')}}
        </div>
    </div>
@endif

@if(session('warning'))

    <div class="col-md-8 col-md-offset-2">
        <div class="alert alert-dismissible alert-warning">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{session('warning')}}
        </div>
    </div>
@endif