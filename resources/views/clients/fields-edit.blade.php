<div class="box box-danger">
    <div class="box-header with-border">
    <div>
        <h3>Datos generales</h3>
    </div>
     <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('folio', 'Folio:') !!}
                {!! Form::text('folio', null, ['class' => 'form-control input-lg', 'placeholder'=>'ESCRIBE EL FOLIO DEL CLIENTE','required'=>'required', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();','readonly'=>'readonly']) !!}

            </div>

            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('firts_name', 'Nombre(s):') !!}
                {!! Form::text('firts_name', null, ['class' => 'form-control input-lg', 'placeholder'=>'ESCRIBE EL NOMBRE CLIENTE','required'=>'required', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>

            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('last_name', 'Apellido Paterno:') !!}
                {!! Form::text('last_name', null, ['class' => 'form-control input-lg', 'placeholder'=>'ESCRIBE EL APELLIDO PATERNO','required'=>'required', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>

            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('mothers_last_name', 'Apellido Materno:') !!}
                {!! Form::text('mothers_last_name', null, ['class' => 'form-control input-lg', 'placeholder'=>'ESCRIBE EL APELLIDO MATERNO','required'=>'required', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>

            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('curp', 'Curp:') !!}
                {!! Form::text('curp', null, ['class' => 'form-control input-lg', 'placeholder'=>'ESCRIBE LA CURP','required'=>'required', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('ine', 'Ine:') !!}
                {!! Form::text('ine', null, ['class' => 'form-control input-lg', 'placeholder'=>'ESCRIBE LA INE','required'=>'required', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('civil_status', 'Estado Civil:') !!}
                {!! Form::select('civil_status',['SOLTERO(A)' => 'SOLTERO(A)', 'CASADO(A)' => 'CASADO(A)','VIUDO(A)'=>'VIUDO(A)','DIVORCIADO(A)'=>'DIVORCIADO(A)'], null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('scholarship', 'Grado Escolar:') !!}
                {!! Form::select('scholarship',['NINGUNA' => 'NINGUNA', 'SABE LEER' => 'SABE LEER', 'PRIMARIA' => 'PRIMARIA', 'SECUNDARIA' => 'SECUNDARIA', 'BACHILLERATO' => 'BACHILLERATO', 'LICENCIATURA' => 'LICENCIATURA', 'POSGRADO' => 'POSGRADO'], null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('phone', 'Teléfono:') !!}
                {!! Form::text('phone', null, ['class' => 'form-control input-lg', 'placeholder' => 'TELÉFONO', 'required' => 'required', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();','maxlength' => 10]) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('no_economic_dependent', 'No. de Dependientes Economicos') !!}
                {!! Form::select('no_economic_dependent',['0'=>'0','1' => '1', ' 2' => ' 2', '3' => '3', '4' => '4', '5' => '5'], null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('no_familys', 'No. Familias') !!}
                {!! Form::select('no_familys',['0'=>'0','1' => '1', ' 2' => ' 2', '3' => '3', '4' => '4', '5' => '5'], null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('type_of_housing', 'Tipo de Vivienda') !!}
                {!! Form::select('type_of_housing',['PROPIA'=>'PROPIA','FAMILIAR' => 'FAMILIAR', ' RENTA' => ' RENTA', 'HIPOTECA' => 'HIPOTECA'], null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
            </div>

             <input type="hidden" name="avatar" value="{{$client->avatar}}">


            @php
            $count = App\Models\Branch::all();
            @endphp

            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('branch_id', '* Sucursal:') !!}
                <select name="branch_id" required="required" value="{{ old('branch_id') }}" class="form-control input-lg" id="branch">
                    @if($count ->isEmpty())
                    <option value="">No hay sucursales registradas en el sistema</option>
                    @else 
                    <option selected value="">Seleccione Sucursal</option>
                    @foreach($count as $branches)
                    <option value="{{ $branches->id}}">{{$branches->name}}</option>
                    @endforeach
                    @endif
                </select>
            </div>
            <button class="btn btn-success btn-lg pull-right" type="submit">Guardar</button>

</div>    
</div>

