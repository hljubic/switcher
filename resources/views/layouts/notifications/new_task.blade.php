<div class="list-group col-lg-12 nopadding " style="margin-bottom: 3px !important;">
    <a href="{{route('tasks')}}/{{$notification->data['task']['id']}}"

       class="list-group-item list-group-item-action flex-column align-items-start col-lg-12 ">
        <div class="d-flex w-100 justify-content-between">
           <strong> {{$notification->data["user"]["name"]}}</strong>
            kreirao je zadatak <strong>{{$notification->data['task']['name']}}({{$notification->data['task']['type']}})</strong>
            na kolegiju
            <strong>{{$notification->data["task"]["collegium"]["name"]}}</strong>
            <br><small>{{Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}</small>

        </div>
    </a>

</div>
