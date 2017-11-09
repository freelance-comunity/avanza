@extends('layouts.app')

@section('contentheader_title')
Actualizar foto
@endsection
@section('main-content')
<div class="container">
  <div class="box box-danger">
    <div class="row">
      

      <div class="col-md-10 col-md-offset-1">
        <img src="{{ asset('/uploads/documents/') }}/{{$document->proof_of_addres}}" style="width: 50%; height: 300px; float: left;  margin-right: 25px; " alt="">
        <h2>COMPROBANTE DE DOMICILIO</h2>
        <form action="{{ url('/updatephotos') }}" enctype="multipart/form-data" method="POST">
          {{ csrf_field() }}
          <label for="">Actualizar foto</label>
          <input type="file" name="proof_of_addres">
          <input type="hidden" value="{{$document->id}}" name="document_id">
          <br>
          <input type="submit" value="Actualizar" class="uppercase btn btn-primary">
          {{-- <a href="{!! route('clients.show', [$document->id]) !!}" class="btn bg-navy">Ver perfil</a> --}}
        </form>
      </div>
    </div>
  </div>
</div>
@endsection