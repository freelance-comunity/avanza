@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'credits.store','files'=>'true', 'data-parsley-validate' => '', 'id' => 'form1','onsubmit'=>'return enviado()']) !!}

        @include('credits.fields')
        <script>

        	var cuenta=0;
        	function enviado() { 
        		if (cuenta == 0)
        		{
        			cuenta++;
        			return true;
        		}
        		else 
        		{
        			alert("El formulario ya está siendo enviado, por favor aguarde un instante.");
        			return false;
        		}
        	}   

        </script>

    {!! Form::close() !!}
</div>
@endsection
