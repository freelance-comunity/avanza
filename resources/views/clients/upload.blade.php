@extends('layouts.app')

@section('contentheader_title')
Actualizar foto
@endsection
@section('main-content')
<div class="container">
  <div class="box box-danger">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <img src="{{ asset('/uploads/avatars/') }}/{{$client->avatar}}" style="width: 300px; height: 300px; float: left; border-radius: 50%; margin-right: 25px; " alt="">
        <h2>{{ $client->firts_name}} {{$client->last_name}}</h2>
        <form action="{{ url('/updatephoto') }}" enctype="multipart/form-data" method="POST">
          {{ csrf_field() }}
          <label for="">Actualizar foto</label>
          <input type="file" name="avatar">

          <input type="hidden" value="{{$client->id}}" name="client_id">
          <br>
          <input type="submit" value="Actualizar" class="uppercase btn btn-primary">
          <a href="{!! route('clients.show', [$client->id]) !!}" class="btn bg-navy">Ver perfil</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection