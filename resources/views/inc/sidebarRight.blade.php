<div id="wrapper-right">
    <!-- Sidebar -->
    <div class="list-group" id="sidebar-wrapper">
        <ul class="sidebar-nav ">
            <li class="sidebar-brand">
                <a href="#">
                    Start Bootstrap
                </a>
            </li>
            @if(isset($tasks))
                <li>
                    <a href="#facultiesSubmenu" data-toggle="collapse">Fakulteti</a>

                    <ul class="collapse list-unstyled" id="facultiesSubmenu">
                        @foreach($tasks as $task)
                            <li>
                                {{$task->name}}
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
