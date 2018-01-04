@extends('layouts.app')

@section('content')
<div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default" style="margin-top: 50px;">
            <div class="panel-heading">
                <a href="{{route('files')}}"><i class="fa fa-chevron-left"></i></a>
                <h5 class="panel-title" style="text-align: center;">Dodaj rad</h5>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{ route('files_create') }}" method="POST">
                    {{csrf_field()}}
                    <fieldset>
                        <legend></legend>
                         <div class="form-group">
                            <label for="inputPath" class="col-lg-2 control-label small">Naziv</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control noborder" id="name" name="name" placeholder="naziv">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPath" class="col-lg-2 control-label small">Putanja</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control noborder" id="path" name="path" placeholder="putanja">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="col-lg-2 control-label small">Opis</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control noborder" id="description" name="description" placeholder="Opis">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="col-lg-2 control-label small">Veličina</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control noborder" id="size" name="size" placeholder="size">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="select" class="col-lg-2 control-label small">Post</label>
                            <div class="col-lg-10">
                                <select class="form-control noborder" id="select" name="post_id">
                                    @foreach($posts as $post)
                                        <option value="{{ $post->id }}">{{ $post->content }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="select" class="col-lg-2 control-label small">Task</label>
                            <div class="col-lg-10">
                                <select class="form-control noborder" id="select" name="task_id">
                                    @foreach($tasks as $task)
                                        <option value="{{ $task->id }}">{{ $task->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                        <div class="col-md-12" style="margin-top: 30px;">
                         <div class="col-md-6">
                          <button type="reset" class="btn btn-sm swt-button-default  btn-block">Odustani</button>
                           </div>
                          <div class="col-md-6">
                            <button type="submit" class="btn btn-sm swt-button-prim btn-block">Spremi</button>
                              </div>
                             </div>
                                </div>
                 </fieldset>
               </form>
            </div>
          </div>
          </div>
@endsection