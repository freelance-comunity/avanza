<div class="box box-danger">
    <div class="box-header with-border">
    <div>
        <h3>Datos generales</h3>
    </div>
       <div class="form-group col-sm-6 col-lg-4">
        {!! Form::label('folio', 'Folio:') !!}
        {!! Form::text('folio', null, ['class' => 'form-control input-lg', 'placeholder'=>'ESCRIBE EL FOLIO DEL CLIENTE','required'=>'required', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}

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
        {!! Form::label('birthdate', 'Fecha de Nacimiento:') !!}
        <input type="date" name="birthdate" class="form-control input-lg" required="required" value="{{$client->birthdate}}">
    </div>

    <div class="form-group col-sm-6 col-lg-4">
        {!! Form::label('birth_entity', 'Entidad de Nacimiento:') !!}
        {!! Form::select('birth_entity',['placeholder'=>'SELECCIONE UN ESTADO','AGUASCALIENTES' => 'AGUASCALIENTES', 'BAJA CALIFORNIA' => 'BAJA CALIFORNIA', 'BAJA CALIFORNIA SUR' => 'BAJA CALIFORNIA SUR','CAMPECHE' => 'CAMPECHE','COAHUILA' => 'COAHUILA','COLIMA' => 'COLIMA','CHIAPAS' => 'CHIAPAS','CHIHUAHUA' => 'CHIHUAHUA','DISTRITO FEDERAL' => 'DISTRITO FEDERAL','DURANGO' => 'DURANGO','JALISCO' => 'JALISCO','MÉXICO' => 'MÉXICO','MICHOACÁN' => 'MICHOACÁN','MORELOS' => 'MORELOS','NAYARIT' => 'NAYARIT','NUEVO LEÓN' => 'NUEVO LEÓN','OAXACA' => 'OAXACA','PUEBLA' => 'PUEBLA','QUERÉTARO' => 'QUERÉTARO','QUINTANA ROO'=>'QUINTANA ROO','SAN LUIS POTOSÍ'=> 'SAN LUIS POTOSÍ','SINALOA'=>'SINALOA','SONORA','SONORA','TABASCO'=>'TABASCO','TAMAULIPAS'=>'TAMAULIPAS','TLAXCALA'=>'TLAXCALA','VERACRUZ'=>'VERACRUZ','YUCATÁN'=>'YUCATÁN','ZACATECAS'=>'ZACATECAS'], null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
    </div>


    <div class="form-group col-sm-6 col-lg-4">
        {!! Form::label('gender', 'Género:') !!}
        {!! Form::select('gender',['HOMBRE' => 'HOMBRE', 'MUJER' => 'MUJER'], null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
    </div>

    <div class="form-group col-sm-6 col-lg-4">
        {!! Form::label('civil_status', 'Estado Civil:') !!}
        {!! Form::select('civil_status',['SOLTERO(A)' => 'SOLTERO(A)', 'CASADO(A)' => 'CASADO(A)'], null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
    </div>

    <div class="form-group col-sm-6 col-lg-4">
        {!! Form::label('country', 'País de Nacimiento:') !!}
        {!! Form::select('country',['MÉXICO' => 'MÉXICO'] ,null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
    </div>

    <div class="form-group col-sm-6 col-lg-4">
        {!! Form::label('nationality', 'Nacionalidad:') !!}
        {!! Form::select('nationality',['MEXICANA' => 'MEXICANA'], null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
    </div>

    <div class="form-group col-sm-6 col-lg-4">
        {!! Form::label('scholarship', 'Grado Escolar:') !!}
        {!! Form::select('scholarship',['NINGUNA' => 'NINGUNA', 'SABE LEER' => 'SABE LEER', 'PRIMARIA' => 'PRIMARIA', 'SECUNDARIA' => 'SECUNDARIA', 'BACHILLERATO' => 'BACHILLERATO', 'LICENCIATURA' => 'LICENCIATURA', 'POSGRADO' => 'POSGRADO'], null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
    </div>

    <div class="form-group col-sm-6 col-lg-4">
        {!! Form::label('phone_one', 'Teléfono 1:') !!}
        {!! Form::text('phone_one', null, ['class' => 'form-control input-lg', 'placeholder' => 'TELÉFONO 1', 'required' => 'required', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();','maxlength' => 10]) !!}
    </div>

    <div class="form-group col-sm-6 col-lg-4">
        {!! Form::label('phone_two', 'Teléfono 2:') !!}
        {!! Form::text('phone_two', null, ['class' => 'form-control input-lg', 'placeholder' => 'TELÉFONO 1', 'required' => 'required', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();','maxlength' => 10]) !!}
    </div>

    <div class="form-group col-sm-6 col-lg-4">
        {!! Form::label('no_children', 'Número de Hijos:') !!}
        {!! Form::select('no_children',['0'=>'0','1' => '1', ' 2' => ' 2', '3' => '3', '4' => '4', '5' => '5'], null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
    </div>

    <div class="form-group col-sm-6 col-lg-4">
        {!! Form::label('no_economic_dependent', 'No. de Dependientes Economicos') !!}
        {!! Form::select('no_economic_dependent',['0'=>'0','1' => '1', ' 2' => ' 2', '3' => '3', '4' => '4', '5' => '5'], null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
    </div>

    <!--<div class="form-group col-sm-6 col-lg-4">
        {!! Form::label('avatar', 'Imagen:') !!}
        {!! Form::file('avatar') !!}
    </div>-->

    @php
    $count = App\Models\Branch::all();
    @endphp

    <div class="form-group col-sm-6 col-lg-12">
        {!! Form::label('branch_id', '* Sucursal:') !!}
        <select name="branch_id" required="required" value="{{ old('branch_id') }}" class="form-control input-lg" >
            @if($count ->isEmpty())
            <option value="">No hay sucursales registradas en el sistema</option>
            @else 
            @foreach($count as $branches)
           <option value="{{$branches->id}}" {{ ($branches->id == $client->branch_id) ? 'selected=selected' : '' }}>
            {{$branches->name}} 
            @endforeach
            @endif
        </select>
    </div>
    <div class="col-md-6">
        <div class="gllpLatlonPicker">
          <label for="exampleInputEmail1">DIRECCIÓN DEL CLIENTE</label>
          <div class="input-group">
           <input type="text" class="gllpSearchField col-lg-8  input-lg form-control" placeholder="ESCRIBE LA DIRECCIÓN DEL CLIENTE, EJ: AV. CENTRAL OTE. 214 SAN MARCOS, TUXTLA GUTIÉRREZ, CHIS.">
           <div class="input-group-btn">
             <input type="button" class="gllpSearchButton btn bg-navy input-lg" value="Buscar">
         </div>
     </div>
     <br/><br/>
     <div class="gllpMap">Google Maps</div>
     <br/>
     <input type="hidden" name="latitude" class="gllpLatitude" value="{{$clientLocation->latitude}}"/>
     <input type="hidden" name="lenght" class="gllpLongitude" value="{{$clientLocation->lenght}}"/>
     <input type="hidden" class="gllpZoom" value="12"/>
 </div>
</div>
<div class="col-md-6">
    <div class="gllpLatlonPicker">
      <label for="exampleInputEmail1">DIRECCIÓN DEL NEGOCIO</label>
      <div class="input-group">
       <input type="text" class="gllpSearchField col-lg-8  input-lg form-control" placeholder="ESCRIBE LA DIRECCIÓN DEL CLIENTE, EJ: AV. CENTRAL OTE. 214 SAN MARCOS, TUXTLA GUTIÉRREZ, CHIS.">
       <div class="input-group-btn">
         <input type="button" class="gllpSearchButton btn bg-navy input-lg" value="Buscar">
     </div>
 </div>
 <br/><br/>
 <div class="gllpMap">Google Maps</div>
 <br/>
 <input type="hidden" name="latitude_company" class="gllpLatitude" value="{{$clientcompany->latitude_company}}"/>
 <input type="hidden" name="length_company" class="gllpLongitude" value="{{$clientcompany->length_company}}"/>
 <input type="hidden" class="gllpZoom" value="12"/>
</div>
</div>


    <button class="btn btn-success btn-lg pull-right" type="submit">Actualizar</button>


</div>    
</div>

