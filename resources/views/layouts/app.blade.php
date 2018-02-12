<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" ng-app="swtSearchApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!--style for datepicker -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker3.min.css') }}">
    <!-- icons -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- style for sidebar -->
    <link href="{{asset('css/simple-sidebar.css') }}" rel="stylesheet">
    <!-- style for CHAT -->
    <link href="{{asset('css/chat-style.css') }}" rel="stylesheet">


    <link href="{{asset('css/multiple-select.min.css') }}" rel="stylesheet">

    @stack('stylesheets')

</head>
<body ng-controller="swtSearchMainController" ng-init="init()">
<div id="app">

    @include('layouts.navbar')
    @include('inc.sidebar',['faculties',$faculties],['studies',$studies],['collegiums',$collegiums])
    @include('layouts.messages')

    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.0/angular.min.js"></script>
<script src="{{asset('js/ang_app.js')}}"></script>

<script src="{{asset('js/multiple-select.min.js')}}"></script>

<script>
    //datepicker
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
    });
    //sidebar toggle function
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    //profile picture
    $(document).ready(function () {
        var storename = $('#storename').text();
        var intials = $('#storename').text().charAt(0);
        var profile = $('#profile').text(intials);
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip(options)
    });

    $(document).ready(function () {
        $('[data-toggle="popover"]').popover({
            placement: 'bottom'
        });
    });

    //table for attendances
    $("tr").click(function () {
        var checkbox = $(this).find("input[type='checkbox']");
        checkbox.attr('checked', !checkbox.attr('checked'));
    });

</script>
<script>
    var API_USERS = '{{route('search_user')}}';
    var API_GET_PROFESORS = '{{route('search_professors')}}';
</script>

@stack('scripts')
</body>
</html>
