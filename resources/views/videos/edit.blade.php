@extends('layouts.master')

<div class="container">
@section('main')
<h3 class="text-center text-white pt-5">Editar video</h3>
<div class="container">
    <div id="login-row" class="row justify-content-center align-items-center">
        <div id="login-column" class="col-md-6">
            <div id="login-box" class="col-md-12">
                    <form action="{{route('videos.update', $video->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Titulo</label>
                            <input type="text" name="title" value="{{ $video->title }}" id="" class="form-control" placeholder="{{ $video->title }}">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <input type="text" name="description" value="{{ $video->description }}" id=""
                                class="form-control" placeholder="{{ $video->description }}">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Categoria</label>
                            <input class="list-group " list="tag_id" name="tag_id">
                            <datalist id="tag_id" name="tag_id">
                            @foreach($tags as $tag)
                            
                                <option value="{{$tag->id}}">{{$tag->tag}}</option>
                            
                            @endforeach
                        </datalist>
                        </div>
                       {{--   <div class="form-group">
                            <label for="title">Video</label>
                            <input type="file" name="video" class="form-control-file" value="{{$video->route}}" placeholder="{{$video->route}}">
                        <div class="form-group">
                            <label for="title">Imagen</label>
                            <input type="file" name="img" class="form-control-file" value="{{$video->img}}" placeholder="{{$video->img}}">
                        </div>  --}}
                        <a href="{{ route('videos.index') }}" class="btn btn-danger"  style="float: right; margin-left:1%;">Carcelar</a>
                        <input type="submit" class="btn btn-primary" value="Guardar"  style="float: right;"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>
   @parent

   @stop
</div>
