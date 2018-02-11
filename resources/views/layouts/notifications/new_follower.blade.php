<div class="list-group col-lg-12 nopadding " style="margin-bottom: 3px !important;">
    <a href="{{route('users')}}/{{$notification->data['follower']['follower_id']}}"
       class="list-group-item list-group-item-action flex-column align-items-start col-lg-12 "
    onclick="{{$notification->markAsRead()}}">
        <div class="d-flex w-100 justify-content-between">
            <strong>{{$notification->data['user']['name']}}</strong> Vas počinje pratiti.
            <br><small>{{Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}</small>
        </div>
    </a>
</div>
