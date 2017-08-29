@extends('layouts.app')

@section('main-content')
@section('contentheader_title')
Todos los Clientes
@endsection
<div class="container">

  @include('flash::message')

  <div class="row">
    <h1 class="pull-left">Clientes</h1>
    <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('clients.create') !!}">Agregar Nuevo Cliente</a>
    <button type="button" class="btn bg-navy pull-right" style="margin-top: 25px" data-toggle="modal" data-target="#inputExcel"><i class="fa fa-file-excel-o"></i> Importar Excel</button>
  </div>
  @include('clients.input-excel')
  <div class="row">
    @if($clients->isEmpty())
    <div class="well text-center">No se encontraron clientes en el sistema.</div>
    @else

    <div class="table-responsive">
      <table class="table"  id="example">
        <thead class="thead-inverse">
          <th>Folio</th>
          <th>Nombre</th>
          <th>Apellido Paterno</th>
          <th>Apellido Materno</th>
          <th>Curp</th>
          <th>Ine</th>
          <th>Estado Civil</th>
          <th>Sucursal</th>
          <th>Imagen</th>
          <th width="50px">Crédito</th>
          <th>Acción</th>
        </thead>
        <tbody>

          @foreach($clients as $client)
          <!-- Modal -->
          <div class="modal fade" id="myModal{{$client->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Elige la modalidad</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="text-center">
                    <h4>Selecciona una modalidad de crédito</h4>
                  </div>
                </div>
                <div class="modal-footer">
                  @if ($products->isEmpty())
                  <a href="{{ url('products') }}" class="btn btn-block btn-danger">No hay productos registrados</a>
                  @else
                  @foreach ($products as $product)
                  <div class="form-group col-sm-6 col-lg-6">
                   <a href="{{ url('creditsClient') }}/{{$client->id}}/{{$product->id}}" ><button type="button" class="btn btn-lg btn-block bg-red">{{mb_strtoupper($product->name)}}</button></a>
                 </div>
                 @endforeach
                 @endif
               </div>
             </div>
           </div>
         </div>
         @php
         $branch = $client->branch;
         $credits = $client->credits;
         @endphp
         <tr>

           <td>{!! $client->folio!!}</td>
           <td>{!! $client->firts_name !!}</td>
           <td>{!! $client->last_name !!}</td>
           <td>{!! $client->mothers_last_name !!}</td>
           <td>{!! $client->curp !!}</td>
           <td>{!! $client->ine !!}</td>
           <td>{!! $client->civil_status !!}</td>
           <td>{{$branch->name}}</td>
           <td><img src="{{ asset('/uploads/avatars') }}/{!! $client->avatar !!}" style="width: 50px; height: 50px;"></td>
          {{-- @php
           $deuda = false;
           @endphp 
           @if (count($client->credits)>0)
           @foreach ($client->credits as $element)
           @if (count($element->tests)>0)
           @php
           $deuda = true;
           break;
           @endphp
           @endif
           @endforeach
           @endif 
           @if ($deuda)
         <td> 
           <a href="" class="btn bg-red btn-block uppercase">Bloqueado</a>
           <button type="button" class="btn bg-red btn-block uppercase">Bloqueado</button></td>
          @else--}}
           <td> <button type="button" class="btn btn-primary btn-block uppercase" data-toggle="modal" data-target="#myModal{{$client->id}}">Nuevo</button></td>
           {{--@endif--}}
           <td>
            <a href="{!! route('clients.show', [$client->id]) !!}"><i class="fa fa-eye fa-2x" data-toggle="tooltip" title="Ver Detalles" ></i></a> 
            @permission('eliminar-cliente')  
            <a href="{!! route('clients.delete', [$client->id]) !!}" onclick="return confirm('¿Estas seguro de eliminar este cliente?')"><i class="fa fa-trash fa-2x" data-toggle="tooltip" title="Eliminar"></i></a>   
            @endpermission                         
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  @endif
</div>
</div>
@endsection