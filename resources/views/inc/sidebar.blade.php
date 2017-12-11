<div id="wrapper">
    <!-- Sidebar -->
    <div class="list-group" id="sidebar-wrapper">
        <ul class="sidebar-nav ">
            <li class="sidebar-brand">
                <a href="{{route('home')}}">
                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>

                    Switcher
                </a>
            </li>
            @if(isset($faculties))
                <li>
                    <a href="#facultiesSubmenu" data-toggle="collapse">Fakulteti</a>

                    <ul class="collapse list-unstyled" id="facultiesSubmenu">
                        @foreach($faculties as $faculty)
                            <li >
                                <div class="row col-lg-12 nopadding">
                                    <div class="col-lg-10 nopadding">
                                        <a href="#studiesSubmenu{{ $faculty->id }}" data-toggle="collapse">{{$faculty->short_name}}</a>
                                    </div>

                                    <div class="col-lg-2 nopadding ">
                                        <b><a href="{{route('faculties')}}/{{$faculty->id}}" class="btn " style="border-radius: 0px; color: #18BC9C; padding-left:0px; font-size: 12px; ">. . .</a></b>
                                    </div>
                                </div>

                                <ul class="collapse list-unstyled" id="studiesSubmenu{{ $faculty->id }}">
                                    @foreach($faculty->studies as $study)
                                        <li>
                                            <div class="row col-lg-12 nopadding">
                                                <div class="col-lg-10 nopadding">
                                                    <a href="#collegiumsSubmenu{{ $study->id }}" data-toggle="collapse">{{$study->name}}</a>
                                                </div>
                                                <div class="col-lg-2 nopadding ">
                                                    <b><a href="{{route('studies')}}/{{$study->id}}" class="btn" style="border-radius: 0px; color: #18BC9C; padding-left:0px; font-size: 12px; ">. . .</a></b>
                                                </div>
                                            </div>

                                            <ul class="collapse list-unstyled" id="collegiumsSubmenu{{ $study->id }}">
                                                @foreach($study->collegiums as $collegium)
                                                    <li>
                                                        <a href="{{route('collegiums')}}/{{$collegium->id}}">{{$collegium->name}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endif
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->
</div>
<!-- /#wrapper -->
