@extends('layouts.master')

<div class="container">
@section('main')
<h3 class="text-center text-white pt-5">Editar usuario {{$user->name}}</h3>
<div class="container">
    <div id="login-row" class="row justify-content-center align-items-center">
        <div id="login-column" class="col-md-6">
            <div id="login-box" class="col-md-12">
                    <form action="{{route('admins.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Nombre</label>
                            <input type="text" name="name" value="{{$user->name}}" id="" class="form-control" placeholder="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Correo electronico</label>
                            <input type="email" name="email" value="{{$user->email}}" id=""
                                class="form-control" placeholder="{{$user->email}}">
                        </div>
                        {{--  <div class="form-group">
                            <input class="list-group " list="owner_id" name="owner_id">
                            <datalist id="owner_id">
                            @foreach($users as $user)
                            
                                <option value="{{$user->id}}">{{$user->email}}</option>
                            
                            @endforeach
                        </datalist>
                        </div>  --}}
                        <a href="{{ route('admin.index') }}" class="btn btn-danger"  style="float: right; margin-left:1%;">Carcelar</a>
                        <input type="submit" class="btn btn-primary" value="Guardar"  style="float: right;"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>
   @parent

   @stop
</div>
