<div class="list-group col-lg-12 nopadding " style="margin-bottom: 3px !important;">
    <a href="{{route('posts')}}/{{$notification->data['post']['id']}}"

       class="list-group-item list-group-item-action flex-column align-items-start col-lg-12 ">
        <div class="d-flex w-100 justify-content-between">
            {{$notification->data['user']['name']}}
            objavio je novi post.
            <br>
            <small>{{Carbon\Carbon::parse($notification->data['post']['created_at'])->diffForHumans()}}</small>

        </div>
    </a>
</div>
