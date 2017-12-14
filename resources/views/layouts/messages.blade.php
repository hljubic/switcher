@if(count($errors)>0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="alert alert-dismissible alert-success col-lg-8 col-lg-offset-2" style="margin-top: 30px;">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-dismissible alert-danger col-lg-8 col-lg-offset-2" style="margin-top: 30px;">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{session('error')}}
    </div>
@endif
@if(session('warning'))
    <div class="alert alert-dismissible alert-warning col-lg-8 col-lg-offset-2" style="margin-top: 30px;">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{session('warning')}}
    </div>
@endif