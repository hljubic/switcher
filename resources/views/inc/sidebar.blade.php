<div id="wrapper">
    <!-- Sidebar -->
    <div class="list-group" id="sidebar-wrapper">
        <ul class="sidebar-nav ">
            <li class="sidebar-brand">
                <a href="#">
                    Start Bootstrap
                </a>
            </li>
            @if(isset($faculties))
                <li>
                    <a href="#facultiesSubmenu" data-toggle="collapse">Fakulteti</a>

                    <ul class="collapse list-unstyled" id="facultiesSubmenu">
                        @foreach($faculties as $faculty)
                            <li>
                                <a href="#studiesSubmenu" data-toggle="collapse">{{$faculty->short_name}}</a>
                                <ul class="collapse list-unstyled" id="studiesSubmenu">
                                    @foreach($studies as $study)
                                        <li>
                                            <a href="#collegiumsSubmenu" data-toggle="collapse">{{$study->name}}</a>
                                            <ul class="collapse list-unstyled" id="collegiumsSubmenu">
                                                @foreach($collegiums as $collegium)
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
