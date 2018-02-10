<div class="list-group col-lg-12 nopadding ">
    <a href="{{route('collegiums')}}/{{$notification->data['collegiumFollower']['collegium_id']}}"

       class="list-group-item list-group-item-action flex-column align-items-start col-lg-12 ">
        <div class="d-flex w-100 justify-content-between">
           <strong>{{$notification->data['follower']['name']}} </strong>  se upisao na Vaš kolegij.
            <br><small>{{Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}</small>

        </div>
    </a>
    <hr style="color: #18BC9C;">

</div>
