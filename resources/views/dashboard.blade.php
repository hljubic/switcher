@extends('layouts.app')

@section('content')
    <div class="well col-lg-8 col-lg-offset-2" style="margin-top: 50px;">
        <div class="list-group">
            <!-- prvi red -->
            <div class="row " style="margin-bottom: 30px;">
                <!-- fakulteti -->
                <div class="panel panel-default col-lg-4" style="background-color: #ECF0F1; border: none;">
                    <div class="list-group-item nopadding">
                        <div class="row nopadding">
                            <div class="col-lg-4" style="background-color: #18BC9C; text-align: center;">
                                <i class="fa fa-university" style="font-size: 20px; color: #fff; padding-top: 32px"></i>
                                <p style="padding-top: 30px;"></p>
                            </div>
                            <div class="col-lg-8" style="text-align: center; padding-top: 32px;">
                                <p>FAKULTETI</p>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item nopadding">
                        <div class="col-lg-6 nopadding">

                            <a href="{{route('faculties')}}"  class="btn btn-sm btn-block noborder"
                                    data-toggle="tooltip" data-placement="bottom" title="Prikaz fakulteta u tablici"
                                    style="background-color: #128770; color: #fff;">
                                <i class="fa fa-window-maximize" aria-hidden="true"></i>

                            </a>
                        </div>

                        <div class="col-lg-6 nopadding">

                            <a href="{{route('faculties_create')}}"  class="btn btn-sm btn-block noborder " data-container="body"
                                    data-toggle="tooltip" data-placement="bottom" title="Dodaj novi fakultet"
                                    style="background-color: #18BC9C; color: #fff;">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- studiji -->
                <div class="panel panel-default col-lg-4 " style="background-color: #ECF0F1; border: none;">
                    <div class="list-group-item nopadding">
                        <div class="row nopadding">
                            <div class="col-lg-4" style="background-color: #ec971f; text-align: center;">
                                <i class="fa fa-graduation-cap" style="font-size: 20px; color: #fff; padding-top: 32px"></i>
                                <p style="padding-top: 30px;"></p>
                            </div>
                            <div class="col-lg-8" style="text-align: center; padding-top: 32px;">
                                <p>STUDIJI</p>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item nopadding">
                        <div class="col-lg-6 nopadding">

                            <a href="{{route('studies')}}" class="btn btn-sm btn-block "
                                    data-toggle="tooltip" data-placement="bottom" title="Prikaz studija u tablici"
                                    style="border-radius: 0px; background-color: #a4651c; color: #fff;">
                                <i class="fa fa-window-maximize" aria-hidden="true"></i>

                            </a>
                        </div>

                        <div class="col-lg-6 nopadding">

                            <a href="{{route('studies_create')}}"  class="btn btn-sm btn-block " data-container="body"
                                    data-toggle="tooltip" data-placement="bottom" title="Dodaj novi studij"
                                    style="border-radius: 0px; background-color: #ec971f; color: #fff;">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- kolegiji-->
                <div class="panel panel-default col-lg-4 " style="background-color: #ECF0F1; border: none;">
                    <div class="list-group-item nopadding">
                        <div class="row nopadding">
                            <div class="col-lg-4" style="background-color: #d9534f; text-align: center;">
                                <i class="fa fa-paperclip" style="font-size: 20px; color: #fff; padding-top: 32px"></i>
                                <p style="padding-top: 30px;"></p>
                            </div>
                            <div class="col-lg-8" style="text-align: center; padding-top: 32px;">
                                <p>KOLEGIJI</p>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item nopadding">
                        <div class="col-lg-6 nopadding">

                            <a href="{{route('collegiums')}}" type="button" class="btn btn-sm btn-block "
                                    data-toggle="tooltip" data-placement="bottom" title="Prikaz fakulteta u tablici"
                                    style="border-radius: 0px; background-color: #A84440; color: #fff;">
                                <i class="fa fa-window-maximize" aria-hidden="true"></i>

                            </a>
                        </div>

                        <div class="col-lg-6 nopadding">

                            <a href="{{route('collegiums_create')}}" type="button" class="btn btn-sm btn-block " data-container="body"
                                    data-toggle="tooltip" data-placement="bottom" title="Dodaj novi fakultet"
                                    style="border-radius: 0px; background-color: #d9534f; color: #fff;">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- drugi red -->
            <div class="row" style="margin-bottom: 30px;">
                <!-- zadaci -->
                <div class="panel panel-default col-lg-4 " style="background-color: #ECF0F1; border: none;">
                    <div class="list-group-item nopadding">
                        <div class="row nopadding">
                            <div class="col-lg-4" style="background-color: #18BC9C; text-align: center;">
                                <i class="fa fa-tasks" style="font-size: 20px; color: #fff; padding-top: 32px"></i>
                                <p style="padding-top: 30px;"></p>
                            </div>
                            <div class="col-lg-8" style="text-align: center; padding-top: 32px;">
                                <p>ZADACI</p>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item nopadding">
                        <div class="col-lg-6 nopadding">

                            <a href="{{route('tasks')}}"  class="btn btn-sm btn-block "
                               data-toggle="tooltip" data-placement="bottom" title="Prikaz zadataka u tablici"
                               style="border-radius: 0px; background-color: #128770; color: #fff;">
                                <i class="fa fa-window-maximize" aria-hidden="true"></i>

                            </a>
                        </div>

                        <div class="col-lg-6 nopadding">

                            <a href="{{route('tasks_create')}}"  class="btn btn-sm btn-block " data-container="body"
                               data-toggle="tooltip" data-placement="bottom" title="Dodaj novi zadatak"
                               style="border-radius: 0px; background-color: #18BC9C; color: #fff;">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- objave -->
                <div class="panel panel-default col-lg-4" style="background-color: #ECF0F1; border: none;">
                    <div class="list-group-item nopadding">
                        <div class="row nopadding">
                            <div class="col-lg-4" style="background-color: #ec971f; text-align: center;">
                                <i class="fa fa-id-card-o" style="font-size: 20px; color: #fff; padding-top: 32px"></i>
                                <p style="padding-top: 30px;"></p>
                            </div>
                            <div class="col-lg-8" style="text-align: center; padding-top: 32px;">
                                <p>OBJAVE</p>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item nopadding">
                        <div class="col-lg-6 nopadding">

                            <a href="{{route('posts')}}" type="button" class="btn btn-sm btn-block "
                                    data-toggle="tooltip" data-placement="bottom" title="Prikaz objava u tablici"
                                    style="border-radius: 0px; background-color: #a4651c; color: #fff;">
                                <i class="fa fa-window-maximize" aria-hidden="true"></i>

                            </a>
                        </div>

                        <div class="col-lg-6 nopadding">

                            <a href="{{route('posts_create')}}" type="button" class="btn btn-sm btn-block " data-container="body"
                                    data-toggle="tooltip" data-placement="bottom" title="Dodaj novi objavu"
                                    style="border-radius: 0px; background-color: #ec971f; color: #fff;">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- predavanja-->
                <div class="panel panel-default col-lg-4" style="background-color: #ECF0F1; border: none;">
                    <div class="list-group-item nopadding">
                        <div class="row nopadding">
                            <div class="col-lg-4" style="background-color: #d9534f; text-align: center;">
                                <i class="fa fa-pencil-square-o" style="font-size: 20px; color: #fff; padding-top: 32px"></i>
                                <p style="padding-top: 30px;"></p>
                            </div>
                            <div class="col-lg-8" style="text-align: center; padding-top: 32px;">
                                <p>PREDAVANJA</p>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item nopadding">
                        <div class="col-lg-6 nopadding">

                            <a href="{{route('classes')}}" type="button" class="btn btn-sm btn-block "
                                    data-toggle="tooltip" data-placement="bottom" title="Prikaz predavanja u tablici"
                                    style="border-radius: 0px; background-color: #A84440; color: #fff;">
                                <i class="fa fa-window-maximize" aria-hidden="true"></i>

                            </a>
                        </div>

                        <div class="col-lg-6 nopadding">

                            <a href="{{route('classes_create')}}" type="button" class="btn btn-sm btn-block " data-container="body"
                                    data-toggle="tooltip" data-placement="bottom" title="Dodaj novo predavanje"
                                    style="border-radius: 0px; background-color: #d9534f; color: #fff;">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- treći red -->
            <div class="row" style="margin-bottom: 30px;">
                <!-- korisnici -->
                <div class="panel panel-default col-lg-4" style="background-color: #ECF0F1; border: none;">
                    <div class="list-group-item nopadding">
                        <div class="row nopadding">
                            <div class="col-lg-4" style="background-color: #18BC9C; text-align: center;">
                                <i class="fa fa-users" style="font-size: 20px; color: #fff; padding-top: 32px"></i>
                                <p style="padding-top: 30px;"></p>
                            </div>
                            <div class="col-lg-8" style="text-align: center; padding-top: 32px;">
                                <p>KORISNICI</p>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item nopadding">
                        <div class="col-lg-6 nopadding">

                            <a href="{{route('users')}}"  class="btn btn-sm btn-block "
                               data-toggle="tooltip" data-placement="bottom" title="Prikaz korisnika u tablici"
                               style="border-radius: 0px; background-color: #128770; color: #fff;">
                                <i class="fa fa-window-maximize" aria-hidden="true"></i>

                            </a>
                        </div>

                        <div class="col-lg-6 nopadding">

                            <a href="{{route('users_create')}}"  class="btn btn-sm btn-block " data-container="body"
                               data-toggle="tooltip" data-placement="bottom" title="Dodaj novog korisnika"
                               style="border-radius: 0px; background-color: #18BC9C; color: #fff;">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- followers -->
                <div class="panel panel-default col-lg-4" style="background-color: #ECF0F1; border: none;">
                    <div class="list-group-item nopadding">
                        <div class="row nopadding">
                            <div class="col-lg-4" style="background-color: #ec971f; text-align: center;">
                                <i class="fa fa-user" style="font-size: 20px; color: #fff; padding-top: 32px"></i>
                                <p style="padding-top: 30px;"></p>
                            </div>
                            <div class="col-lg-8" style="text-align: center; padding-top: 32px;">
                                <p>PRATITELJI</p>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item nopadding">
                        <div class="col-lg-6 nopadding">

                            <a href="{{route('followers')}}" class="btn btn-sm btn-block "
                                    data-toggle="tooltip" data-placement="bottom" title="Prikaz pretitelja u tablici"
                                    style="border-radius: 0px; background-color: #a4651c; color: #fff;">
                                <i class="fa fa-window-maximize" aria-hidden="true"></i>

                            </a>
                        </div>

                        <div class="col-lg-6 nopadding">

                            <a href="{{route('followers_create')}}" class="btn btn-sm btn-block " data-container="body"
                                    data-toggle="tooltip" data-placement="bottom" title="Dodaj nove pratitelje"
                                    style="border-radius: 0px; background-color: #ec971f; color: #fff;">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- sudionici razgovora-->
                <div class="panel panel-default col-lg-4" style="background-color: #ECF0F1; border: none;">
                    <div class="list-group-item nopadding">
                        <div class="row nopadding">
                            <div class="col-lg-4" style="background-color: #d9534f; text-align: center;">
                                <i class="fa fa-users" style="font-size: 20px; color: #fff; padding-top: 32px"></i>
                                <p style="padding-top: 30px;"></p>
                            </div>
                            <div class="col-lg-8" style="text-align: center; padding-top: 32px;">
                                <p>SUDIONCI </p>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item nopadding">
                        <div class="col-lg-6 nopadding">

                            <a href="{{route('participants')}}" type="button" class="btn btn-sm btn-block "
                                    data-toggle="tooltip" data-placement="bottom" title="Prikaz fakulteta u tablici"
                                    style="border-radius: 0px; background-color: #A84440; color: #fff;">
                                <i class="fa fa-window-maximize" aria-hidden="true"></i>

                            </a>
                        </div>

                        <div class="col-lg-6 nopadding">

                            <a href="{{route('participants_create')}}"  class="btn btn-sm btn-block " data-container="body"
                                    data-toggle="tooltip" data-placement="bottom" title="Dodaj novi fakultet"
                                    style="border-radius: 0px; background-color: #d9534f; color: #fff;">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- četvrti red -->
            <div class="row" style="margin-bottom: 30px;">
                <!-- Razgovori -->
                <div class="panel panel-default col-lg-4" style="background-color: #ECF0F1; border: none;">
                    <div class="list-group-item nopadding">
                        <div class="row nopadding">
                            <div class="col-lg-4" style="background-color: #18BC9C; text-align: center;">
                                <i class="fa fa-comment" style="font-size: 20px; color: #fff; padding-top: 32px"></i>
                                <p style="padding-top: 30px;"></p>
                            </div>
                            <div class="col-lg-8" style="text-align: center; padding-top: 32px;">
                                <p>RAZGOVORI</p>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item nopadding">
                        <div class="col-lg-6 nopadding">

                            <a href="{{route('conversations')}}"  class="btn btn-sm btn-block "
                               data-toggle="tooltip" data-placement="bottom" title="Prikaz korisnika u tablici"
                               style="border-radius: 0px; background-color: #128770; color: #fff;">
                                <i class="fa fa-window-maximize" aria-hidden="true"></i>

                            </a>
                        </div>

                        <div class="col-lg-6 nopadding">

                            <a href="{{route('conversations_create')}}"  class="btn btn-sm btn-block " data-container="body"
                               data-toggle="tooltip" data-placement="bottom" title="Dodaj novog korisnika"
                               style="border-radius: 0px; background-color: #18BC9C; color: #fff;">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Poruke -->
                <div class="panel panel-default col-lg-4" style="background-color: #ECF0F1; border: none;">
                    <div class="list-group-item nopadding">
                        <div class="row nopadding">
                            <div class="col-lg-4" style="background-color: #ec971f; text-align: center;">
                                <i class="fa fa-comment-o" style="font-size: 20px; color: #fff; padding-top: 32px"></i>
                                <p style="padding-top: 30px;"></p>
                            </div>
                            <div class="col-lg-8" style="text-align: center; padding-top: 32px;">
                                <p>PORUKE</p>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item nopadding">
                        <div class="col-lg-6 nopadding">

                            <a href="{{route('messages')}}" class="btn btn-sm btn-block "
                               data-toggle="tooltip" data-placement="bottom" title="Prikaz pretitelja u tablici"
                               style="border-radius: 0px; background-color: #a4651c; color: #fff;">
                                <i class="fa fa-window-maximize" aria-hidden="true"></i>

                            </a>
                        </div>

                        <div class="col-lg-6 nopadding">

                            <a href="{{route('messages_create')}}" class="btn btn-sm btn-block " data-container="body"
                               data-toggle="tooltip" data-placement="bottom" title="Dodaj nove pratitelje"
                               style="border-radius: 0px; background-color: #ec971f; color: #fff;">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Prisutnosti-->
                <div class="panel panel-default col-lg-4" style="background-color: #ECF0F1; border: none;">
                    <div class="list-group-item nopadding">
                        <div class="row nopadding">
                            <div class="col-lg-4" style="background-color: #d9534f; text-align: center;">
                                <i class="fa fa-list-ul" style="font-size: 20px; color: #fff; padding-top: 32px"></i>
                                <p style="padding-top: 30px;"></p>
                            </div>
                            <div class="col-lg-8" style="text-align: center; padding-top: 32px;">
                                <p>PRISUTNOSTI</p>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item nopadding">
                        <div class="col-lg-6 nopadding">

                            <a href="{{route('attendances')}}" type="button" class="btn btn-sm btn-block "
                               data-toggle="tooltip" data-placement="bottom" title="Prikaz fakulteta u tablici"
                               style="border-radius: 0px; background-color: #A84440; color: #fff;">
                                <i class="fa fa-window-maximize" aria-hidden="true"></i>

                            </a>
                        </div>

                        <div class="col-lg-6 nopadding">

                            <a href="{{route('attendances_create')}}"  class="btn btn-sm btn-block " data-container="body"
                               data-toggle="tooltip" data-placement="bottom" title="Dodaj novi fakultet"
                               style="border-radius: 0px; background-color: #d9534f; color: #fff;">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
