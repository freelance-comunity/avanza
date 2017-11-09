@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.pagenotfound') }}
@endsection

@section('contentheader_title')
 Página de error 403
@endsection

@section('$contentheader_description')
@endsection

@section('main-content')

<div class="error-page">
    <h2 class="headline text-yellow"> 403</h2>
    <div class="error-content">
        <h2><i class="fa fa-warning text-yellow"></i> Oops! {{ trans('adminlte_lang::message.pagenotfound') }}.</h2>
        <h3>
           No tienes permiso para ingresar a esta página,
            {{ trans('adminlte_lang::message.mainwhile') }} <a href='{{ url('/home') }}'>{{ trans('adminlte_lang::message.returndashboard') }}</a>.
        </h3>
        
    </div><!-- /.error-content -->
</div><!-- /.error-page -->
@endsection