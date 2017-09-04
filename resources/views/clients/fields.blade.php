<style>
    #resultado {
        background-color: red;
        color: white;
        font-weight: bold;
    }
    #resultado.ok {
        background-color: green;
    }
</style>
<style>
    #resultados {
        background-color: red;
        color: white;
        font-weight: bold;
    }
    #resultados.ok {
        background-color: green;
    }
</style>
<style>
    .p{
        color:black;
    }
    @media screen and (max-width: 600px) {
      .p .responsivo{
          color:black;
      } 
      .p .test {
        white-space: nowrap; 
        width: 40px; 
        font-size:70%;
        overflow: hidden;
    }
    p.test:hover {
        text-overflow: inherit;
        overflow: visible;
    }

}
</style>
<div class="box box-danger">
    <div class="box-header with-border">
        <h3 class="box-title">Registro Personal</h3>
        <div class="stepwizard">
         <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step p" id="myparrafo">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                <p class="responsivo test">Datos</p>
            </div>
            <div class="stepwizard-step p" id="myparrafo">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p class="responsivo test">Ubicación</p>
            </div>
            <div class="stepwizard-step p" id="myparrafo">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p class="responsivo test">Negocio</p>
            </div>
            <div class="stepwizard-step p" id="myparrafo">
                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                <p class="responsivo test">Aval</p>
            </div>
            <div class="stepwizard-step p" id="myparrafo">
                <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
                <p  class="responsivo test">Digitalización</p>
            </div>
        </div>
    </div>
    <div class="box-body">

       <div class="row setup-content" id="step-1">
           <div class="form-group col-sm-6 col-lg-12">
               <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('avatar', 'Imagen:') !!}
                {!! Form::file('avatar', [
                    'data-parsley-trigger ' => 'input focusin',
                    ]) !!}
                </div>
                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('firts_name', 'Nombre(s):') !!}
                    {!! Form::text('firts_name', null, [ 'style' => 'text-transform:uppercase','class' => 'form-control input-lg', 'placeholder'=>'ESCRIBE EL NOMBRE CLIENTE','required'=>'required', 'data-parsley-trigger' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                </div>
                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('last_name', 'Apellido Paterno:') !!}
                    {!! Form::text('last_name', null, [ 'style' => 'text-transform:uppercase','class' => 'form-control input-lg', 'placeholder'=>'ESCRIBE EL APELLIDO PATERNO','required'=>'required', 'data-parsley-trigger' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                </div>
            </div>
            <div class="form-group col-sm-6 col-lg-12">
                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('mothers_last_name', 'Apellido Materno:') !!}
                    {!! Form::text('mothers_last_name', null, [ 'style' => 'text-transform:uppercase','class' => 'form-control input-lg', 'placeholder'=>'ESCRIBE EL APELLIDO MATERNO','required'=>'required', 'data-parsley-trigger ' => 'input focusin','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                </div>
                
                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('curp', 'CURP:') !!} <a href="https://consultas.curp.gob.mx/CurpSP/" target="_blank" onClick="window.open(this.href, this.target, 'width=500,height=500'); return false;"> CONSULTA CURP</a>
                    {!! Form::text('curp', null, [
                        'style' => 'text-transform:uppercase',
                        'class' => 'form-control input-lg', 
                        'id' => 'curp_input',
                        'oninput' => 'validarInput(this)',
                        'placeholder' => 'ESCRIBE CURP', 
                        'required' => 'required',
                        'data-parsley-trigger ' => 'input focusin',
                        'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                        <pre id="resultado"></pre>
                    </div>
                    <div class="form-group col-sm-6 col-lg-4">
                        {!! Form::label('ine', 'CLAVE DE ELECTOR INE:') !!}<a id="ine" href="#" >CONSULTA INE</a>
                        {!! Form::text('ine', null, ['class' => 'form-control input-lg', 'placeholder'=>'ESCRIBE LA INE','required'=>'required','data-parsley-trigger ' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                    </div>
                </div>    
                <div class="form-group col-sm-6 col-lg-12">
                   <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('civil_status', 'Estado Civil:') !!}
                    {!! Form::select('civil_status',['SOLTERO(A)' => 'SOLTERO(A)', 'CASADO(A)' => 'CASADO(A)','VIUDO(A)'=>'VIUDO(A)','DIVORCIADO(A)'=>'DIVORCIADO(A)'], null, ['class' => 'form-control input-lg', 'required' => 'required','data-parsley-trigger ' => 'input focusin',]) !!}
                </div>
                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('phone', 'Teléfono:') !!}
                    <input type="number" name="phone" class="form-control input-lg" placeholder="TELÉFONO" required="required" data-parsley-trigger="input focusin" data-parsley-type="digits" data-parsley-maxlength="10">
                </div>
                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('no_economic_dependent', 'No. de Dependientes Economicos') !!}
                    {!! Form::select('no_economic_dependent',['0'=>'0','1' => '1', ' 2' => ' 2', '3' => '3', '4' => '4', '5' => '5'], null, ['class' => 'form-control input-lg', 'required' => 'required', 'data-parsley-trigger ' => 'input focusin',]) !!}
                </div>
            </div>
            <div class="form-group col-sm-6 col-lg-12">
                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('type_of_housing', 'Tipo de Vivienda') !!}
                    {!! Form::select('type_of_housing',['PROPIA'=>'PROPIA','FAMILIAR' => 'FAMILIAR', ' RENTA' => ' RENTA', 'HIPOTECA' => 'HIPOTECA'], null, ['class' => 'form-control input-lg', 'data-parsley-trigger ' => 'input focusin', 'required' => 'required']) !!}
                </div>
                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('maximun_amount', 'Monto Máximo') !!}
                    <input type="number" name="maximun_amount" class="form-control input-lg" placeholder="MONTO MAXIMO" required="required" data-parsley-trigger="input focusin" data-parsley-type="digits" data-parsley-maxlength="10">
                </div>

                @php
                $count = App\Models\Branch::all();
                @endphp
                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('branch_id', '* Sucursal:') !!}
                    <select name="branch_id" required="required" value="{{ old('branch_id') }}" class="form-control input-lg" id="branch"  data-parsley-trigger= "input focusin">
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
            </div>

            <div class="form-group col-sm-6 col-lg-12">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                {{-- Geolocation address client --}}
                <div class="col-md-6">
                    <div class="gllpLatlonPicker">
                      <div class="input-group">
                        {!! Form::text('address', null, [
                          'style' => 'text-transform:uppercase',
                          'class' => 'form-control input-lg gllpSearchField',
                          'placeholder'=>'ESCRIBE LA DIRECCIÓN DEL CLIENTE, EJ: AV. CENTRAL OTE. 214 SAN MARCOS, TUXTLA GUTIÉRREZ, CHIS.',
                          'data-parsley-trigger ' => 'input focusin',
                          'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                          <div class="input-group-btn">
                           <input type="button" class="gllpSearchButton btn btn-primary input-lg" value="Buscar">
                       </div>
                   </div>
                   <br/><br/>
                   <div class="gllpMap">Google Maps</div>
                   <br/>
                   <input type="hidden" name="latitude" id="lat" class="gllpLatitude" value="16.753239967660058"/>
                   <input type="hidden" name="lenght" id="lon" class="gllpLongitude" value="-93.11789682636714"/>
                   <input type="hidden" class="gllpZoom" value="15"/>
                   <input type="button" id="update" class="gllpUpdateButton" style="display: none;" value="Actualizar">
                   <br/>
               </div>
           </div>
           {{-- End Geolocation address client --}}
           <div class="col-md-6">
            <div class="gllpLatlonPicker">
              <div class="input-group">
                {!! Form::text('address', null, [
                  'style' => 'text-transform:uppercase',
                  'class' => 'form-control input-lg gllpSearchField',
                  'placeholder'=>'ESCRIBE LA DIRECCIÓN DEL NEGOCIO, EJ: AV. CENTRAL OTE. 214 SAN MARCOS, TUXTLA GUTIÉRREZ, CHIS.',
                  'data-parsley-trigger ' => 'input focusin',
                  'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                  <div class="input-group-btn">
                   <input type="button" class="gllpSearchButton btn btn-primary input-lg" value="Buscar">
               </div>
           </div>
           <br/><br/>
           <div class="gllpMap">Google Maps</div>
           <br/>
           <input type="hidden" id="lat_bussines" name="latitude_company" class="gllpLatitude" value="16.753239967660058"/>
           <input type="hidden" id="lon_bussines" name="length_company" class="gllpLongitude" value="-93.11789682636714"/>
           <input type="hidden" class="gllpZoom" value="15"/>
           <input type="button" id="update_bussines" class="gllpUpdateButton" style="display: none;" value="Actualizar">
       </div>
   </div>
</div>


<script>
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        alert("Este navegador no soporta Geolocalización.");
    }
    function showPosition(position) {
        document.getElementById('lat').value=position.coords.latitude;
        document.getElementById('lon').value=position.coords.longitude;
        document.getElementById('lat_bussines').value=position.coords.latitude;
        document.getElementById('lon_bussines').value=position.coords.longitude;
        document.getElementById("update").click();
        document.getElementById("update_bussines").click();
    }
</script>

<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Siguiente</button>

</div>

<!-- CLIENTS LOCATION-->
<div class="row setup-content" id="step-2">
    <div class="col-xs-12">
        <div class="col-md-12">
            <h3> Ubicación </h3>
            <div class="form-group col-sm-6 col-lg-12">
                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('street', 'Calle:') !!}
                    {!! Form::text('street', null, ['class' => 'form-control input-lg', 'placeholder'=>'ESCRIBE EL NOMBRE DE LA CALLE','required'=>'required','data-parsley-trigger ' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                </div>
                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('number', 'Número de Casa:') !!}
                    {!! Form::text('number', null, ['class' => 'form-control input-lg', 'placeholder'=>'ESCRIBE EL NÚMERO DE LA CASA','required'=>'required','data-parsley-trigger ' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                </div>

                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('state', 'Estado:') !!}
                    <select name="state" id="status" onChange="estado(this.value);" class="form-control input-lg"> 
                        <option value="Todo México">Todo México</option>
                        <option value="AGUASCALIENTES">AGUASCALIENTES</option>
                        <option value="BAJA CALIFORNIA">BAJA CALIFORNIA</option>
                        <option value="BAJA CALIFORNIA SUR">BAJA CALIFORNIA SUR</option>
                        <option value="CAMPECHE">CAMPECHE</option>
                        <option value="COAHUILA DE ZARAGOZA">COAHUILA DE ZARAGOZA</option>
                        <option value="Colima">Colima</option>
                        <option value="CHIAPAS">CHIAPAS</option>
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
            </div>
            <div class="form-group col-sm-6 col-lg-12">
                <div class="form-group col-sm-6 col-lg-4"  id="chiapas" style="display: none;" >
                    {!! Form::label('municipality', 'Municipio:') !!}

                    <select name="municipality" class="form-control input-lg" id="status" onChange="otro(this.value);">
                        <option value="todo el estado">todo el estado</option>
                        <option value="Acacoyagua">Acacoyagua</option>
                        <option value="Acala">Acala</option>
                        <option value="Acapetahua">Acapetahua</option>
                        <option value="Altamirano">Altamirano</option>
                        <option value="Amatan">Amatan</option>
                        <option value="Amatenango de la Frontera">Amatenango de la Frontera</option>
                        <option value="Amatenango del Valle">Amatenango del Valle</option>
                        <option value="Angel Albino Corzo">Angel Albino Corzo</option>
                        <option value="Arriaga">Arriaga</option>
                        <option value="Bejucal de Ocampo">Bejucal de Ocampo</option>
                        <option value="Bella Vista">Bella Vista</option>
                        <option value="Berriozabal">Berriozabal</option>
                        <option value="Bochil">Bochil</option>
                        <option value="El Bosque">El Bosque</option>
                        <option value="Cacahoatan">Cacahoatan</option>
                        <option value="Catazaja">Catazaja</option>
                        <option value="Cintalapa">Cintalapa</option>
                        <option value="Coapilla">Coapilla</option>
                        <option value="Comitan de Dominguez">Comitan de Dominguez</option>
                        <option value="La Concordia">La Concordia</option>
                        <option value="Copainala">Copainala</option>
                        <option value="Chalchihuitan">Chalchihuitan</option>
                        <option value="Chamula">Chamula</option>
                        <option value="Chanal">Chanal</option>
                        <option value="Chapultenango">Chapultenango</option>
                        <option value="Chenalho">Chenalho</option>
                        <option value="Chiapa de Corzo">Chiapa de Corzo</option>
                        <option value="Chiapilla">Chiapilla</option>
                        <option value="Chicoasen">Chicoasen</option>
                        <option value="Chicomuselo">Chicomuselo</option>
                        <option value="Chilon">Chilon</option>
                        <option value="Escuintla">Escuintla</option>
                        <option value="Francisco Leon">Francisco Leon</option>
                        <option value="Frontera Comalapa">Frontera Comalapa</option>
                        <option value="Frontera Hidalgo">Frontera Hidalgo</option>
                        <option value="La Grandeza">La Grandeza</option>
                        <option value="Huehuetan">Huehuetan</option>
                        <option value="Huixtan">Huixtan</option>
                        <option value="Huitiupan">Huitiupan</option>
                        <option value="Huixtla">Huixtla</option>
                        <option value="La Independencia">La Independencia</option>
                        <option value="Ixhuatan">Ixhuatan</option>
                        <option value="Ixtacomitan">Ixtacomitan</option>
                        <option value="Ixtapa">Ixtapa</option>
                        <option value="Ixtapangajoya">Ixtapangajoya</option>
                        <option value="Jiquipilas">Jiquipilas</option>
                        <option value="Jitotol">Jitotol</option>
                        <option value="Juarez">Juarez</option>
                        <option value="Larrainzar">Larrainzar</option>
                        <option value="La Libertad">La Libertad</option>
                        <option value="Mapastepec">Mapastepec</option>
                        <option value="Las Margaritas">Las Margaritas</option>
                        <option value="Mazapa de Madero">Mazapa de Madero</option>
                        <option value="Mazatan">Mazatan</option>
                        <option value="Metapa">Metapa</option>
                        <option value="Mitontic">Mitontic</option>
                        <option value="Motozintla">Motozintla</option>
                        <option value="Nicolas Ruiz">Nicolas Ruiz</option>
                        <option value="Ocosingo">Ocosingo</option>
                        <option value="Ocotepec">Ocotepec</option>
                        <option value="Ocozocoautla de Espinosa">Ocozocoautla de Espinosa</option>
                        <option value="Ostuacan">Ostuacan</option>
                        <option value="Osumacinta">Osumacinta</option>
                        <option value="Oxchuc">Oxchuc</option>
                        <option value="Palenque">Palenque</option>
                        <option value="Pantelho">Pantelho</option>
                        <option value="Pantepec">Pantepec</option>
                        <option value="Pichucalco">Pichucalco</option>
                        <option value="Pijijiapan">Pijijiapan</option>
                        <option value="El Porvenir">El Porvenir</option>
                        <option value="Villa Comaltitlan">Villa Comaltitlan</option>
                        <option value="Pueblo Nuevo Solistahuacan">Pueblo Nuevo Solistahuacan</option>
                        <option value="Rayon">Rayon</option>
                        <option value="Reforma">Reforma</option>
                        <option value="Las Rosas">Las Rosas</option>
                        <option value="Sabanilla">Sabanilla</option>
                        <option value="Salto de Agua">Salto de Agua</option>
                        <option value="San Cristobal de las Casas">San Cristobal de las Casas</option>
                        <option value="San Fernando">San Fernando</option>
                        <option value="Siltepec">Siltepec</option>
                        <option value="Simojovel">Simojovel</option>
                        <option value="Sitala">Sitala</option>
                        <option value="Socoltenango">Socoltenango</option>
                        <option value="Solosuchiapa">Solosuchiapa</option>
                        <option value="Soyalo">Soyalo</option>
                        <option value="Suchiapa">Suchiapa</option>
                        <option value="Suchiate">Suchiate</option>
                        <option value="Sunuapa">Sunuapa</option>
                        <option value="Tapachula">Tapachula</option>
                        <option value="Tapalapa">Tapalapa</option>
                        <option value="Tapilula">Tapilula</option>
                        <option value="Tecpatan">Tecpatan</option>
                        <option value="Tenejapa">Tenejapa</option>
                        <option value="Teopisca">Teopisca</option>
                        <option value="Tila">Tila</option>
                        <option value="Tonala">Tonala</option>
                        <option value="Totolapa">Totolapa</option>
                        <option value="La Trinitaria">La Trinitaria</option>
                        <option value="Tumbala">Tumbala</option>
                        <option value="TUXTLA GUTIÉRREZ">TUXTLA GUTIÉRREZ</option>
                        <option value="Tuxtla Chico">Tuxtla Chico</option>
                        <option value="Tuzantan">Tuzantan</option>
                        <option value="Tzimol">Tzimol</option>
                        <option value="Union Juarez">Union Juarez</option>
                        <option value="Venustiano Carranza">Venustiano Carranza</option>
                        <option value="Villa Corzo">Villa Corzo</option>
                        <option value="Villaflores">Villaflores</option>
                        <option value="Yajalon">Yajalon</option>
                        <option value="San Lucas">San Lucas</option>
                        <option value="Zinacantan">Zinacantan</option>
                        <option value="San Juan Cancuc">San Juan Cancuc</option>
                        <option value="Aldama">Aldama</option>
                        <option value="Benemerito de las Americas">Benemerito de las Americas</option>
                        <option value="Maravilla Tenejapa">Maravilla Tenejapa</option>
                        <option value="Marques de Comillas">Marques de Comillas</option>
                        <option value="Montecristo de Guerrero">Montecristo de Guerrero</option>
                        <option value="San Andres Duraznal">San Andres Duraznal</option>
                        <option value="Santiago el Pinar">Santiago el Pinar</option>
                    </select>
                </div>
                <div class="form-group col-sm-6 col-lg-4" >
                    {!! Form::label('colony', 'Colonia:') !!}
                     {!! Form::text('colony', null, ['class' => 'form-control input-lg', 'placeholder'=>'ESCRIBE LA COLONIA','required'=>'required','data-parsley-trigger ' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                    
                </div>


                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('postal_code', 'Código Postal:') !!}
                      <input type="number" name="postal_code" class="form-control input-lg" placeholder="ESCRIBE EL CÓDIGO POSTAL" required="required" data-parsley-trigger="input focusin" data-parsley-type="digits" data-parsley-maxlength="5">
                </div>
            </div>
            <div class="form-group col-sm-6 col-lg-12">

                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('references', 'Referencias:') !!}
                    {!! Form::text('references', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE REFERENCIA DEL DOMICILIO', 'required' => 'required','data-parsley-trigger ' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                </div> 
            </div>  


            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Siguiente</button>
        </div>
    </div>
</div>
<!-- CLIENTS COMPANY-->
<div class="row setup-content" id="step-3">
    <div class="col-xs-12">
        <div class="col-md-12">
            <h3> Datos del Negocio</h3>
            <div class="form-group col-sm-6 col-lg-12">
                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('street_company', 'Calle:') !!}
                    {!! Form::text('street_company', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE EL NOMBRE DE LA CALLE', 'required' => 'required','data-parsley-trigger ' => 'input focusin','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                </div>
                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('number_company', 'Número de Casa:') !!}
                    {!! Form::text('number_company', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE EL NÚMERO DE LA CASA', 'required' => 'required','data-parsley-trigger ' => 'input focusin','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                </div>  
                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('colony_company', 'Colonia:') !!}
                    {!! Form::text('colony_company', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE COLONIA', 'required' => 'required','data-parsley-trigger ' => 'input focusin','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                </div>
            </div>
            <div class="form-group col-sm-6 col-lg-12">
             <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('municipality_company', 'Municipio:') !!}
                {!! Form::text('municipality_company', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE MUNICIPIO', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();','data-parsley-trigger ' => 'input focusin',]) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('state_company', 'Estado:') !!}
                {!! Form::select('state_company',['placeholder'=>'SELECCIONE UN ESTADO','AGUASCALIENTES' => 'AGUASCALIENTES', 'BAJA CALIFORNIA' => 'BAJA CALIFORNIA', 'BAJA CALIFORNIA SUR' => 'BAJA CALIFORNIA SUR','CAMPECHE' => 'CAMPECHE','COAHUILA' => 'COAHUILA','COLIMA' => 'COLIMA','CHIAPAS' => 'CHIAPAS','CHIHUAHUA' => 'CHIHUAHUA','DISTRITO FEDERAL' => 'DISTRITO FEDERAL','DURANGO' => 'DURANGO','JALISCO' => 'JALISCO','MÉXICO' => 'MÉXICO','MICHOACÁN' => 'MICHOACÁN','MORELOS' => 'MORELOS','NAYARIT' => 'NAYARIT','NUEVO LEÓN' => 'NUEVO LEÓN','OAXACA' => 'OAXACA','PUEBLA' => 'PUEBLA','QUERÉTARO' => 'QUERÉTARO','QUINTANA ROO'=>'QUINTANA ROO','SAN LUIS POTOSÍ'=> 'SAN LUIS POTOSÍ','SINALOA'=>'SINALOA','SONORA','SONORA','TABASCO'=>'TABASCO','TAMAULIPAS'=>'TAMAULIPAS','TLAXCALA'=>'TLAXCALA','VERACRUZ'=>'VERACRUZ','YUCATÁN'=>'YUCATÁN','ZACATECAS'=>'ZACATECAS'], null, ['class' => 'form-control input-lg', 'required' => 'required', 'data-parsley-trigger ' => 'input focusin']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('postal_code_company', 'Código Postal:') !!}
                 <input type="number" name="postal_code_company" class="form-control input-lg" placeholder="ESCRIBE  CÓDIGO POSTAL" required="required" data-parsley-trigger="input focusin" data-parsley-type="digits" data-parsley-maxlength="5">
            </div>
        </div>
        <div class="form-group col-sm-6 col-lg-12">

            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('phone_company', 'Teléfono del Negocio:') !!}
                 <input type="number" name="phone_company" class="form-control input-lg" placeholder="TELÉFONO" required="required" data-parsley-trigger="input focusin" data-parsley-type="digits" data-parsley-maxlength="10">
            </div>

            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('name_company', 'Nombre del Negocio:') !!}
                {!! Form::text('name_company', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE NOMBRE DEL NEGOCIO', 'required' => 'required','data-parsley-trigger ' => 'input focusin','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
        </div>

        <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Siguiente</button>
    </div>
</div>
</div>

<!-- CLIENTS AVAL-->
<div class="row setup-content" id="step-4">
    <div class="col-xs-12">
        <div class="col-md-12">
          <select id="status" onChange="mostrar(this.value);" class="form-control input-lg">
            <option value="" class="selected">Aval</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
        </select>
        <br>

        <script>
            function mostrar(id) {
              if (id == "Si") {
                $("#si").show();
                $("#no").hide();
            }
            if (id == "No") {
                $("#si").hide();
                $("#no").hide();
            }
        }
    </script>
    <div id="si" style="display: none;">
        <div class="form-group col-sm-6 col-lg-12">
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('name_aval', 'Nombre(s):') !!}
                {!! Form::text('name_aval', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE NOMBRE DEL AVAL', 'data-parsley-trigger ' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>

            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('last_name_aval', 'Apellido Paterno:') !!}
                {!! Form::text('last_name_aval', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE APELLIDO PATERNO DEL AVAL',  'data-parsley-trigger ' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>

            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('mothers_name_aval', 'Apellido Materno:') !!}
                {!! Form::text('mothers_name_aval', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE APELLIDO MATERNO DEL AVAL', 'data-parsley-trigger ' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
        </div>
        <div class="form-group col-sm-6 col-lg-12">
         <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('curp_aval', 'CURP:') !!}
            {!! Form::text('curp_aval', null, [
                'style' => 'text-transform:uppercase',
                'class' => 'form-control input-lg', 
                'id' => 'curp_input',
                'oninput' => 'validarI(this)',
                'placeholder' => 'ESCRIBE CURP', 
                'data-parsley-trigger ' => 'input focusin',
                'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                <pre id="resultados"></pre>
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('phone_aval', 'Teléfono:') !!}
                <input type="number" name="phone_aval" class="form-control input-lg" placeholder="TELÉFONO"  data-parsley-trigger="input focusin" data-parsley-type="digits" data-parsley-maxlength="10">

            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('civil_status_aval', 'Estado Civil:') !!}
                <select name="civil_status_aval" class="form-control input-lg">
                    <option value="" class="selected">Selecciona</option>
                    <option value="SOLTERO(A)">SOLTERO(A)</option>
                    <option value="CASADO(A)">CASADO(A)</option>
                    <option value="VIUDO(A)">VIUDO(A)</option>
                    <option value="DIVORCIADO(A)">DIVORCIADO(A)</option>
                </select>
            </div> 
        </div>
        <div class="form-group col-sm-6 col-lg-12">

            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('scholarship_aval', 'Grado Escolar:') !!}
                <select name="scholarship_aval" class="form-control input-lg">
                    <option value="" class="selected">Selecciona</option>
                    <option value="NINGUNA">NINGUNA</option>
                    <option value="SABE LEER">SABE LEER</option>
                    <option value="PRIMARIA">PRIMARIA</option>
                    <option value="SECUNDARIA">SECUNDARIA</option>
                    <option value="BACHILLERATO">BACHILLERATO</option>
                    <option value="LICENCIATURA">LICENCIATURA</option>
                    <option value="POSGRADO">POSGRADO</option>
                </select>

            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('street_aval', 'Calle:') !!}
                {!! Form::text('street_aval', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE COLONIA',  'data-parsley-trigger ' => 'input focusin','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('number_aval', 'Número de casa:') !!}
                {!! Form::text('number_aval', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE COLONIA', 'data-parsley-trigger ' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
        </div>
        <div class="form-group col-sm-6 col-lg-12">
           <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('colony_aval', 'Colonia:') !!}
            {!! Form::text('colony_aval', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE COLONIA',  'data-parsley-trigger ' => 'input focusin','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
        </div>
        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('municipality_aval', 'Municipio:') !!}
            {!! Form::text('municipality_aval', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE MUNICIPIO', 'data-parsley-trigger ' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
        </div>
        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('state_aval', 'Estado:') !!}
            <select name="state_aval" class="form-control input-lg">
                <option value="" class="selected">Selecciona</option>
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
    </div>
    <div class="form-group col-sm-6 col-lg-12">
        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('postal_code_aval', 'Código Postal:') !!}
            <input type="number" name="postal_code_aval" class="form-control input-lg" placeholder="CODIGO POSTAL" data-parsley-trigger="input focusin" data-parsley-type="digits" data-parsley-maxlength="5">
        </div>
    </div>
</div>
<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Siguiente</button>
</div>

</div>
</div>
<!-- CLIENTS AVAL-->



<!-- CLIENTS DOCUMENTS-->
<div class="row setup-content" id="step-5">
    <div class="col-xs-12">
        <div class="col-md-12">
            <h3> Digitalización</h3>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('ine_document', 'INE:') !!}
                {!! Form::file('ine_document', [
                    'data-parsley-trigger ' => 'input focusin',
                    ]) !!}
                </div>
                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('curp_document', 'CURP:') !!}
                    {!! Form::file('curp_document', [
                        'data-parsley-trigger ' => 'input focusin',
                        ]) !!}
                    </div>
                    <div class="form-group col-sm-6 col-lg-4">
                        {!! Form::label('proof_of_addres', 'Comprobante de Domicilio:') !!}
                        {!! Form::file('proof_of_addres', [
                            'data-parsley-trigger ' => 'input focusin',
                            ]) !!}
                        </div>
                        <div class="col-md-4">
                            <div class="btn-group">
                              {!! Form::submit('Guardar', ['class' => 'uppercase btn btn-primary', 'id' => 'save']) !!}
                          </div>
                      </div>
                  </div>
              </div>
          </div>

      </div>    
  </div>

  <script>
    //Función para validar una CURP
    function curpValida(curp) {
        var re = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/,
        validado = curp.match(re);

    if (!validado)  //Coincide con el formato general?
        return false;
    
    //Validar que coincida el dígito verificador
    function digitoVerificador(curp17) {
        //Fuente https://consultas.curp.gob.mx/CurpSP/
        var diccionario  = "0123456789ABCDEFGHIJKLMNÑOPQRSTUVWXYZ",
        lngSuma      = 0.0,
        lngDigito    = 0.0;
        for(var i=0; i<17; i++)
            lngSuma = lngSuma + diccionario.indexOf(curp17.charAt(i)) * (18 - i);
        lngDigito = 10 - lngSuma % 10;
        if (lngDigito == 10) return 0;
        return lngDigito;
    }

    if (validado[2] != digitoVerificador(validado[1])) 
        return false;

    return true; //Validado
}


//Handler para el evento cuando cambia el input
//Lleva la CURP a mayúsculas para validarlo
function validarInput(input) {
    var curp = input.value.toUpperCase(),
    resultado = document.getElementById("resultado"),
    valido = "No válido";

    if (curpValida(curp)) { // ⬅️ Acá se comprueba
        valido = "Válido";
        resultado.classList.add("ok");
    } else {
        resultado.classList.remove("ok");
    }

    resultado.innerText = "CURP: " + curp + "\nFormato: " + valido;
}

function validarI(input) {
    var curp = input.value.toUpperCase(),
    resultados = document.getElementById("resultados"),
    valido = "No válido";

    if (curpValida(curp)) { // ⬅️ Acá se comprueba
        valido = "Válido";
        resultados.classList.add("ok");
    } else {
        resultados.classList.remove("ok");
    }

    resultados.innerText = "CURP: " + curp + "\nFormato: " + valido;
}
</script>
<script>
    // usamos onload para asegurarnos que existan los elementos en nuestro DOM
    window.onload = function() {
        var anchor = document.getElementById("curp");         
        
            // le asociamos el evento a nuestro elemento para tener un codigo 
            // html mas limpio y manejar toda la interaccion
            // desde nuestro script
            anchor.onclick = function() {
                // una variable donde pongo la url a donde quiera ir, 
                //podria estar de mas pero asi queda mas limpio la funcion window.open()
                var url = "https://consultas.curp.gob.mx/CurpSP/";
                window.open(url, "_blank", 'width=500,height=500'); 
                // el return falase es para eviar que se progrague el evento y se vaya al href de tu anchor.
                return false;
            };
        }
    </script>
    <script>
    // usamos onload para asegurarnos que existan los elementos en nuestro DOM
    window.onload = function() {
        var anchor = document.getElementById("ine");         
        
            // le asociamos el evento a nuestro elemento para tener un codigo 
            // html mas limpio y manejar toda la interaccion
            // desde nuestro script
            anchor.onclick = function() {
                // una variable donde pongo la url a donde quiera ir, 
                //podria estar de mas pero asi queda mas limpio la funcion window.open()
                var url = "http://listanominal.ine.mx/";
                window.open(url, "_blank", 'width=500,height=500'); 
                // el return falase es para eviar que se progrague el evento y se vaya al href de tu anchor.
                return false;
            };
        }
    </script>

   
    <script>
        function parrafo() {
            var x = document.getElementById("myparrafo");
            if (x.className === "p") {
                x.className += " test";
            } else {
                x.className = "p";
            }
        }
    </script>
    <script>
        function numeros(e){
          key = e.keyCode || e.which;
          tecla = String.fromCharCode(key).toLowerCase();
          letras = " 0123456789";
          especiales = [8,37,39,46];

          tecla_especial = false
          for(var i in especiales){
           if(key == especiales[i]){
             tecla_especial = true;
             break;
         } 
     }

     if(letras.indexOf(tecla)==-1 && !tecla_especial)
      return false;
}
</script>
<script type="text/javascript">
// Solo permite ingresar numeros.
function soloNumeros(e){
    var key = window.Event ? e.which : e.keyCode
    return (key >= 48 && key <= 57)
}
</script>


<script>
    function estado(id) {
      if (id == "CHIAPAS") {
        $("#chiapas").show();
        $("#aguascalientes").hide();
        $("#bajacalifornia").hide();
        $("#bajacaliforniasur").hide();
        $("#campeche").hide();
        $("#coahuila").hide();

    }
    if (id == "AGUASCALIENTES") {
        $("#aguascalientes").show();
        $("#chiapas").hide();
        $("#bajacalifornia").hide();
        $("#bajacaliforniasur").hide();
        $("#campeche").hide();
        $("#coahuila").hide();
    }
    if (id == "BAJA CALIFORNIA") {
        $("#aguascalientes").hide();
        $("#chiapas").hide();
        $("#bajacalifornia").show();
        $("#bajacaliforniasur").hide();
        $("#campeche").hide();
        $("#coahuila").hide();
    }
    if (id == "BAJA CALIFORNIA SUR") {
        $("#aguascalientes").hide();
        $("#chiapas").hide();
        $("#bajacalifornia").hide();
        $("#bajacaliforniasur").show();
        $("#campeche").hide();
        $("#coahuila").hide();
    }
    if (id == "CAMPECHE") {
        $("#aguascalientes").hide();
        $("#chiapas").hide();
        $("#bajacalifornia").hide();
        $("#bajacaliforniasur").hide();
        $("#campeche").show();
        $("#coahuila").hide();
    }
    if (id == "COAHUILA DE ZARAGOZA") {
        $("#aguascalientes").hide();
        $("#chiapas").hide();
        $("#bajacalifornia").hide();
        $("#bajacaliforniasur").hide();
        $("#campeche").hide();
        $("#coahuila").show();
    }
}
</script>

<script>
    function otro(id) {
      if (id == "TUXTLA GUTIÉRREZ") {
        $("#tuxtla").show();
        $("#tuxtlapostal").show();

    }    
}
</script>


@include('clients.curp')