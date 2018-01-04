<div id="wrapper">
    <!-- Sidebar -->
    <div class="list-group" id="sidebar-wrapper">
        <ul class="sidebar-nav ">
            <li class="sidebar-brand col-lg-8 col-lg-offset-2" style="padding-top: 10px;">
                <a href="{{route('home')}}">
                    <img style="width:65px;" src="{{ asset('/images/switcher_logoB.png') }}">
                </a>
            </li>
            @if(isset($faculties))
                <li>
                    <a href="#facultiesSubmenu" data-toggle="collapse">Fakulteti</a>

                    <ul class="collapse list-unstyled" id="facultiesSubmenu">
                        @foreach($faculties as $faculty)
                            <li>
                                <div class="row col-lg-12 nopadding">
                                    <div class="col-lg-9 nopadding">
                                        <a href="#studiesSubmenu{{ $faculty->id }}" data-toggle="collapse">{{$faculty->short_name}}</a>
                                    </div>
                                    <div class="col-lg-3 nopadding">
                                        <a href="{{route('faculties')}}/{{$faculty->id}}"
                                           style="color: #18BC9C; padding-top:13px; display: inline-flex;">
                                            <i class="fa fa-angle-double-right" style="font-size: 13px;"></i></a>
                                    </div>

                                </div>

                                <ul class="collapse list-unstyled" id="studiesSubmenu{{ $faculty->id }}">
                                    @foreach($faculty->studies as $study)
                                        <li>
                                            <div class="row col-lg-12 nopadding">
                                                <div class="col-lg-9 nopadding">
                                                    <a href="#collegiumsSubmenu{{ $study->id }}"
                                                       data-toggle="collapse">{{$study->name}}</a>
                                                </div>
                                                <div class="col-lg-3 nopadding">
                                                    <a href="{{route('studies')}}/{{$study->id}}"
                                                          style="color: #18BC9C; padding-top:13px; display: inline-flex;">
                                                            <i class="fa fa-angle-double-right" style="font-size: 13px;"></i></a>
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
