<div class="box box-danger">
    <div class="box-header with-border">
        <h3 class="box-title">Registro Personal</h3>
        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                    <p>Datos</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                    <p>Ubicación</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                    <p>Negocio</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                    <p>Aval</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
                    <p>Referencias</p>
                </div>
            </div>
        </div>
        <div class="box-body">
           <div class="row setup-content" id="step-1">
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
                {!! Form::label('no_familys', 'No. de Dependientes Economicos') !!}
                {!! Form::select('no_familys',['0'=>'0','1' => '1', ' 2' => ' 2', '3' => '3', '4' => '4', '5' => '5'], null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('type_of_housing', 'Tipo de Vivienda') !!}
                {!! Form::select('type_of_housing',['PROPIA'=>'PROPIA','FAMILIAR' => 'FAMILIAR', ' RENTEA' => ' RENTEA', 'HIPOTECA' => 'HIPOTECA'], null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
            </div>

            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('avatar', 'Imagen:') !!}
                {!! Form::file('avatar') !!}
            </div>


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
             <input type="hidden" name="latitude" class="gllpLatitude" value="16.753239967660058"/>
             <input type="hidden" name="lenght" class="gllpLongitude" value="-93.11789682636714"/>
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
     <input type="hidden" name="latitude_company" class="gllpLatitude" value="16.753239967660058"/>
     <input type="hidden" name="length_company" class="gllpLongitude" value="-93.11789682636714"/>
     <input type="hidden" class="gllpZoom" value="12"/>
 </div>
</div>


<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Siguiente</button>

</div>

<!-- CLIENTS LOCATION-->
<div class="row setup-content" id="step-2">
    <div class="col-xs-12">
        <div class="col-md-12">
            <h3> Ubicación </h3>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('street', 'Calle:') !!}
                {!! Form::text('street', null, ['class' => 'form-control input-lg', 'placeholder'=>'ESCRIBE EL NOMBRE DE LA CALLE','required'=>'required', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('number', 'Número de Casa:') !!}
                {!! Form::text('number', null, ['class' => 'form-control input-lg', 'placeholder'=>'ESCRIBE EL NÚMERO DE LA CASA','required'=>'required', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('colony', 'Colonia:') !!}
                {!! Form::text('colony', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE COLONIA', 'required' => 'required', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('municipality', 'Municipio:') !!}
                {!! Form::text('municipality', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE MUNICIPIO', 'required' => 'required', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('state', 'Estado:') !!}
                {!! Form::select('state',['placeholder'=>'SELECCIONE UN ESTADO','AGUASCALIENTES' => 'AGUASCALIENTES', 'BAJA CALIFORNIA' => 'BAJA CALIFORNIA', 'BAJA CALIFORNIA SUR' => 'BAJA CALIFORNIA SUR','CAMPECHE' => 'CAMPECHE','COAHUILA' => 'COAHUILA','COLIMA' => 'COLIMA','CHIAPAS' => 'CHIAPAS','CHIHUAHUA' => 'CHIHUAHUA','DISTRITO FEDERAL' => 'DISTRITO FEDERAL','DURANGO' => 'DURANGO','JALISCO' => 'JALISCO','MÉXICO' => 'MÉXICO','MICHOACÁN' => 'MICHOACÁN','MORELOS' => 'MORELOS','NAYARIT' => 'NAYARIT','NUEVO LEÓN' => 'NUEVO LEÓN','OAXACA' => 'OAXACA','PUEBLA' => 'PUEBLA','QUERÉTARO' => 'QUERÉTARO','QUINTANA ROO'=>'QUINTANA ROO','SAN LUIS POTOSÍ'=> 'SAN LUIS POTOSÍ','SINALOA'=>'SINALOA','SONORA','SONORA','TABASCO'=>'TABASCO','TAMAULIPAS'=>'TAMAULIPAS','TLAXCALA'=>'TLAXCALA','VERACRUZ'=>'VERACRUZ','YUCATÁN'=>'YUCATÁN','ZACATECAS'=>'ZACATECAS'], null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('postal_code', 'Código Postal:') !!}
                {!! Form::text('postal_code', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE CÓDIGO POSTAL', 'required' => 'required', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('references', 'Referencias:') !!}
                {!! Form::text('references', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE REFERENCIA DEL DOMICILIO', 'required' => 'required', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
<<<<<<< HEAD
            </div>            
=======
            </div>   


>>>>>>> remotes/origin/master
            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Siguiente</button>
        </div>
    </div>
</div>
<!-- CLIENTS COMPANY-->
<div class="row setup-content" id="step-3">
    <div class="col-xs-12">
        <div class="col-md-12">
            <h3> Datos del Negocio</h3>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('street_company', 'Calle:') !!}
                {!! Form::text('street_company', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE EL NOMBRE DE LA CALLE', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('number_company', 'Número de Casa:') !!}
                {!! Form::text('number_company', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE EL NÚMERO DE LA CASA', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>  
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('colony_company', 'Colonia:') !!}
                {!! Form::text('colony_company', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE COLONIA', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('municipality_company', 'Municipio:') !!}
                {!! Form::text('municipality_company', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE MUNICIPIO', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('state_company', 'Estado:') !!}
                {!! Form::select('state_company',['placeholder'=>'SELECCIONE UN ESTADO','AGUASCALIENTES' => 'AGUASCALIENTES', 'BAJA CALIFORNIA' => 'BAJA CALIFORNIA', 'BAJA CALIFORNIA SUR' => 'BAJA CALIFORNIA SUR','CAMPECHE' => 'CAMPECHE','COAHUILA' => 'COAHUILA','COLIMA' => 'COLIMA','CHIAPAS' => 'CHIAPAS','CHIHUAHUA' => 'CHIHUAHUA','DISTRITO FEDERAL' => 'DISTRITO FEDERAL','DURANGO' => 'DURANGO','JALISCO' => 'JALISCO','MÉXICO' => 'MÉXICO','MICHOACÁN' => 'MICHOACÁN','MORELOS' => 'MORELOS','NAYARIT' => 'NAYARIT','NUEVO LEÓN' => 'NUEVO LEÓN','OAXACA' => 'OAXACA','PUEBLA' => 'PUEBLA','QUERÉTARO' => 'QUERÉTARO','QUINTANA ROO'=>'QUINTANA ROO','SAN LUIS POTOSÍ'=> 'SAN LUIS POTOSÍ','SINALOA'=>'SINALOA','SONORA','SONORA','TABASCO'=>'TABASCO','TAMAULIPAS'=>'TAMAULIPAS','TLAXCALA'=>'TLAXCALA','VERACRUZ'=>'VERACRUZ','YUCATÁN'=>'YUCATÁN','ZACATECAS'=>'ZACATECAS'], null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('postal_code_company', 'Código Postal:') !!}
                {!! Form::text('postal_code_company', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE CÓDIGO POSTAL', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('phone_company', 'Teléfono del Negocio:') !!}
                {!! Form::text('phone_company', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE NÚMERO DEL TELÉFONO', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>

            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('name_company', 'Nombre del Negocio:') !!}
                {!! Form::text('name_company', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE NOMBRE DEL NEGOCIO', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
             <div class="form-group col-sm-12 col-lg-12">
                <h3 style="text-align: center;"> 
                     <span class="label label-danger">Activos</span>
                </h3>                
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('inventory', 'Inventario ($):') !!}
                {!! Form::text('inventory', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE LA CANTIDAD DEL INVENTARIO', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('machinery_equipment', 'Maq y Equip($):') !!}
                {!! Form::text('machinery_equipment', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE LA CANTIDAD DE LA MAQUINARIA Y EQUIPO', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('vehicles', 'Vehículos($):') !!}
                {!! Form::text('vehicles', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE LA CANTIDAD DE VEHÍCULOS', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('property', 'Inmuebles($):') !!}
                {!! Form::text('property', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE LA CANTIDAD DEL INMUEBLE', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('box_benck', 'Caja, Bancos($):') !!}
                {!! Form::text('box_benck', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE LA CANTIDAD', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('accounts', 'Ctas/Cobrar($):') !!}
                {!! Form::text('accounts', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE LA CANTIDAD', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
             <div class="form-group col-sm-12 col-lg-12">
                <h3 style="text-align: center;"> 
                     <span class="label label-danger">Pasivos</span>
                </h3>                
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('suppliers', 'Proveedores($):') !!}
                {!! Form::text('suppliers', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE LA CANTIDAD', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('credits', 'Créditos($):') !!}
                {!! Form::text('credits', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE LA CANTIDAD', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('payments', 'Pago al mes($):') !!}
                {!! Form::text('payments', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE LA CANTIDAD', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('specify', 'Especifica:') !!}
                {!! Form::text('specify', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESPECIFICA', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
             <div class="form-group col-sm-12 col-lg-12">
                <h3 style="text-align: center;"> 
                     <span class="label label-danger">Ingresos</span>
                </h3>                
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('weekday', 'Entre semana:') !!}
                {!! Form::text('weekday', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE LA CANTIDAD', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('weekend', 'Fines de Semana:') !!}
                {!! Form::text('weekend', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE LA CANTIDAD', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('utility', 'Utilidad:') !!}
                {!! Form::text('utility', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE LA CANTIDAD', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('other_income', 'Otros Ingresos:') !!}
                {!! Form::text('other_income', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE LA CANTIDAD', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
             <div class="form-group col-sm-12 col-lg-12">
                <h3 style="text-align: center;"> 
                     <span class="label label-danger">Costos</span>
                </h3>                
            </div>    
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('rent', 'Renta:') !!}
                {!! Form::text('rent', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE LA CANTIDAD', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('salary', 'Sueldos:') !!}
                {!! Form::text('salary', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE LA CANTIDAD', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('others', 'Otros Luz/Agua:') !!}
                {!! Form::text('others', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE LA CANTIDAD', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
<<<<<<< HEAD
=======


>>>>>>> remotes/origin/master
            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Siguiente</button>
        </div>
    </div>
</div>

<!-- CLIENTS AVAL-->
<div class="row setup-content" id="step-4">
    <div class="col-xs-12">
        <div class="col-md-12">
            <h3>Aval </h3>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('name_aval', 'Nombre(s):') !!}
                {!! Form::text('name_aval', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE NOMBRE DEL AVAL', 'required' => 'required', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>

            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('last_name_aval', 'Apellido Paterno:') !!}
                {!! Form::text('last_name_aval', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE APELLIDO PATERNO DEL AVAL', 'required' => 'required', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>

            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('mothers_name_aval', 'Apellido Materno:') !!}
                {!! Form::text('mothers_name_aval', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE APELLIDO MATERNO DEL AVAL', 'required' => 'required', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('birthdate_aval', 'Fecha de nacimiento:') !!}
                <input type="date" name="birthdate_aval" class="form-control input-lg" required="required">
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('curp_aval', 'CURP:') !!}
                {!! Form::text('curp_aval', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE CURP DEL AVAL', 'required' => 'required', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('phone_aval', 'Teléfono:') !!}
                {!! Form::text('phone_aval', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE TELÉFONO DEL AVAL', 'required' => 'required', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('civil_status_aval', 'Estado Civil:') !!}
                {!! Form::select('civil_status_aval',['SOLTERO(A)' => 'SOLTERO(A)', 'CASADO(A)' => 'CASADO(A)','VIUDO(A)'=>'VIUDO(A)','DIVORCIADO(A)'=>'DIVORCIADO(A)'], null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('scholarship_aval', 'Grado Escolar:') !!}
                {!! Form::select('scholarship_aval',['NINGUNA' => 'NINGUNA', 'SABE LEER' => 'SABE LEER', 'PRIMARIA' => 'PRIMARIA', 'SECUNDARIA' => 'SECUNDARIA', 'BACHILLERATO' => 'BACHILLERATO', 'LICENCIATURA' => 'LICENCIATURA', 'POSGRADO' => 'POSGRADO'], null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('street_aval', 'Calle:') !!}
                {!! Form::text('street_aval', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE COLONIA', 'required' => 'required', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('number_aval', 'Número de casa:') !!}
                {!! Form::text('number_aval', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE COLONIA', 'required' => 'required', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('colony_aval', 'Colonia:') !!}
                {!! Form::text('colony_aval', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE COLONIA', 'required' => 'required', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('municipality_aval', 'Municipio:') !!}
                {!! Form::text('municipality_aval', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE MUNICIPIO', 'required' => 'required', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('state_aval', 'Estado:') !!}
                {!! Form::select('state_aval',['placeholder'=>'SELECCIONE UN ESTADO','AGUASCALIENTES' => 'AGUASCALIENTES', 'BAJA CALIFORNIA' => 'BAJA CALIFORNIA', 'BAJA CALIFORNIA SUR' => 'BAJA CALIFORNIA SUR','CAMPECHE' => 'CAMPECHE','COAHUILA' => 'COAHUILA','COLIMA' => 'COLIMA','CHIAPAS' => 'CHIAPAS','CHIHUAHUA' => 'CHIHUAHUA','DISTRITO FEDERAL' => 'DISTRITO FEDERAL','DURANGO' => 'DURANGO','JALISCO' => 'JALISCO','MÉXICO' => 'MÉXICO','MICHOACÁN' => 'MICHOACÁN','MORELOS' => 'MORELOS','NAYARIT' => 'NAYARIT','NUEVO LEÓN' => 'NUEVO LEÓN','OAXACA' => 'OAXACA','PUEBLA' => 'PUEBLA','QUERÉTARO' => 'QUERÉTARO','QUINTANA ROO'=>'QUINTANA ROO','SAN LUIS POTOSÍ'=> 'SAN LUIS POTOSÍ','SINALOA'=>'SINALOA','SONORA','SONORA','TABASCO'=>'TABASCO','TAMAULIPAS'=>'TAMAULIPAS','TLAXCALA'=>'TLAXCALA','VERACRUZ'=>'VERACRUZ','YUCATÁN'=>'YUCATÁN','ZACATECAS'=>'ZACATECAS'], null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
            </div>     
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('postal_code_aval', 'Código Postal:') !!}
                {!! Form::text('postal_code_aval', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE COLONIA', 'required' => 'required', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Siguiente</button>
        </div>

    </div>
</div>
<!-- CLIENTS AVAL-->
<<<<<<< HEAD
<div class="row setup-content" id="step-5">
    <div class="col-xs-12">
        <div class="col-md-12">
            <h3> Conyugue </h3>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('firts_name_spouse', 'Nombre(s):') !!}
                {!! Form::text('firts_name_spouse', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE NOMBRE DEL CONYUGUE', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>

            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('last_name_spouse', 'Apellido Paterno:') !!}
                {!! Form::text('last_name_spouse', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE APELLIDO PATERNO DEL AVAL', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>

            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('mothers_name_spouse', 'Apellido Materno:') !!}
                {!! Form::text('mothers_name_spouse', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE APELLIDO MATERNO DEL AVAL', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('birthdate_spouse', 'Fecha de nacimiento:') !!}
                <input type="date" name="birthdate_spouse" class="form-control input-lg" required="required">
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('curp_spouse', 'CURP:') !!}
                {!! Form::text('curp_spouse', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE CURP DEL AVAL', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('phone_spouse', 'Teléfono:') !!}
                {!! Form::text('phone_spouse', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE TELÉFONO DEL AVAL', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('civil_status_spouse', 'Estado Civil:') !!}
                {!! Form::select('civil_status_spouse',['SOLTERO(A)' => 'SOLTERO(A)', 'CASADO(A)' => 'CASADO(A)'], null, ['class' => 'form-control input-lg', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('scholarship_spouse', 'Grado Escolar:') !!}
                {!! Form::select('scholarship_spouse',['NINGUNA' => 'NINGUNA', 'SABE LEER' => 'SABE LEER', 'PRIMARIA' => 'PRIMARIA', 'SECUNDARIA' => 'SECUNDARIA', 'BACHILLERATO' => 'BACHILLERATO', 'LICENCIATURA' => 'LICENCIATURA', 'POSGRADO' => 'POSGRADO'], null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('state_spouse', 'Estado:') !!}
                <select name="state_spouse" class="form-control input-lg" required="required">
                    <option value="Todo México">Todo México</option>
                    <option value="Aguascalientes">Aguascalientes</option>
                    <option value="Baja California">Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila de Zaragoza">Coahuila de Zaragoza</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durango">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                    <option value="Michoacán de Ocampo">Michoacán de Ocampo</option>
                    <option value="Morelos">Morelos</option>
                    <option value="Nayarit">Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz de Ignacio de la Llave">Veracruz de Ignacio de la Llave</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                </select>
            </div>

            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('municipality_spouse', 'Municipio:') !!}
                {!! Form::text('municipality_spouse', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE MUNICIPIO', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>

            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('colony_spouse', 'Colonia:') !!}
                {!! Form::text('colony_spouse', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE COLONIA', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('street_spouse', 'Calle:') !!}
                {!! Form::text('street_spouse', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE COLONIA', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('number_spouse', 'Número de casa:') !!}
                {!! Form::text('number_spouse', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE COLONIA', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('postal_code_spouse', 'Código Postal:') !!}
                {!! Form::text('postal_code_spouse', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE COLONIA', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Siguiente</button>
        </div>

    </div>
</div>

=======
>>>>>>> remotes/origin/master

<!-- CLIENTS LOCATION-->
<div class="row setup-content" id="step-5">
    <div class="col-xs-12">
        <div class="col-md-12">
            <h3> Referencias Personales</h3>
             <div class="form-group col-sm-12 col-lg-12">
                <h3 style="text-align: center;"> 
                    <span class="label label-danger">Referencia 1</span>
                </h3>                
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('firts_name_reference_1', 'Nombre(s):') !!}
                {!! Form::text('firts_name_reference_1', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE NOMBRE', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('last_name_reference_1', 'Apellido Paterno:') !!}
                {!! Form::text('last_name_reference_1', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE APELLIDO PATERNO', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>

            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('mothers_last_name_reference_1', 'Apellido Materno:') !!}
                {!! Form::text('mothers_last_name_reference_1', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE APELLIDO MATERNO ', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>

            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('phone_reference_1', 'Teléfono:') !!}
                {!! Form::text('phone_reference_1', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE TELÉFONO', 'required' => 'required']) !!}
            </div>
            <hr>

            <div class="form-group col-sm-12 col-lg-12">
                <h3 style="text-align: center;"> 
                     <span class="label label-danger">Referencia 2</span>
                </h3>                
            </div>
<<<<<<< HEAD
            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Siguiente</button>
        </div>
    </div>
</div>
<!-- CLIENTS LOCATION-->
<div class="row setup-content" id="step-7">
    <div class="col-xs-12">
        <div class="col-md-12">
            <h3> Referencias Personales</h3>
=======
>>>>>>> remotes/origin/master
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('firts_name_reference_2', 'Nombre(s):') !!}
                {!! Form::text('firts_name_reference_2', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE NOMBRE', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('last_name_reference_2', 'Apellido Paterno:') !!}
                {!! Form::text('last_name_reference_2', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE APELLIDO PATERNO ', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>

            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('mothers_last_name_reference_2', 'Apellido Materno:') !!}
                {!! Form::text('mothers_last_name_reference_2', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE APELLIDO MATERNO', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>

            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('phone_reference_2', 'Teléfono:') !!}
                {!! Form::text('phone_reference_2', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE TELÉFONO', 'required' => 'required']) !!}
            </div>

            <button class="btn btn-success btn-lg pull-right" type="submit">Guardar</button>

        </div>
    </div>
</div>

</div>    
</div>