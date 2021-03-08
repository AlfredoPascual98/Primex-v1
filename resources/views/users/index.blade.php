@extends('layouts.master')
  


@section('content')
<section class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-dark">
                @if(Auth::user()->hasRole('admin'))
                Acces com administrador
                @else
                Acces usuari
                @endif 
                You are logged in!
            </h1>
        
        </div>
    </div>
</section>



<table class="table table-hover table-dark">
    <thead>
      <tr>
        <th scope="col">Nombre de usuario</th>
        <th scope="col">Email</th>
        <th scope="col">Fecha de creacion</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{Auth::user()->name}}</td>
        <td>{{Auth::user()->email}}</td>
        <td>{{Auth::user()->created_at}}</td>
        <td><a  href="{{route('users.edit', Auth::user()->id)}}"><button class="btn btn-sm btn-outline-primary">Edit</button></a></td>
      </tr>
    </tbody>
  </table>
@parent

@stop