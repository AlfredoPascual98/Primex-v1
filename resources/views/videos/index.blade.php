@extends('layouts.master')
<main>

    @section('main')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-dark">
                    @auth
                    Bienvenido {{Auth::user()->name}} {{Auth::user()->role_id}}
                    @else
                    Primex
                    @endauth
                </h1>
                
                    @auth
                    @if(Auth::user()->hasRole('admin'))
                    <a href="{{ route('videos.create') }}" class="btn btn-outline-primary my-2">Subir video</a>
                @elseif(Auth::user()->hasRole('editor'))
                    <a href="{{ route('videos.create') }}" class="btn btn-outline-primary my-2">Subir video</a>
                @else
                    <div>Si quieres publicar algun video debes de cambiar de rol</div>
                @endif 
                    @endauth

                </p>
            </div>
        </div>
    </section>



    
<div class="album py-5 bg-dark">
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
           @foreach($videos as $video)
            <div class="col">
                <div class="card shadow-sm">
                    <video width="100%" height="200" controls poster="{{asset('storage/'.$video->img)}}">
                        <source src="{{asset('storage/'.$video->route)}}" type="video/mp4">
                            Tu navegador no soporta HTML5 video.
                      </video>

                    <div class="card-body">
                        <h2 class="card-text">{{$video->title}}
                        </h2>
                        <p class="card-text">{{$video->description}}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                {{--  <a><button  class="btn btn-sm btn-outline-secondary" value="{{$tag->tag}}">{{$tag->tag}}</button></a>  --}}
                             
                                <a><button  class="btn btn-sm btn-outline-secondary">{{$tags[$video->id]->tag}}</button></a>
                                @if(Auth::user()->hasRole('admin'))
                                <a  href="{{route('videos.edit', $video->id)}}"><button class="btn btn-sm btn-outline-primary">Edit</button></a>
                                <form action="{{route('videos.destroy', $video->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger  btn-sm">Eliminar</button>
                                </form>
                            @elseif(Auth::user()->hasRole('editor'))
                                <a  href="{{route('videos.edit', $video->id)}}"><button class="btn btn-sm btn-outline-primary">Edit</button></a>
                                <form action="{{route('videos.destroy', $video->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger  btn-sm">Eliminar</button>
                                </form>
                            @else
                            @endif
                                
                                {{--  <form action="{{route('videos.destroy', $video)}}">
                                    <input type="hidden" name="_method" value="DELETE">
                                    @csrf
                                    <button class="btn btn-danger  btn-sm">Eliminar</button>
                                </form>  --}}
                                
                            </div>
                            <small class="text-muted">{{$video->created_at}}</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col">
                <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                        xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef"
                            dy=".3em">Thumbnail</text>
                    </svg>

                    <div class="card-body">
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional
                            content. This content is a little bit longer.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                <a type="button btn-primary" class="btn btn-sm btn-outline-secondary" {{--  href="{{route('videos.edit', ['id' => $videos->id])}}"  --}}>Edit</a>
                            </div>
                            <small class="text-muted">9 mins</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    @parent

    @stop
</main>


    