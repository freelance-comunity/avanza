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
                    {!! Form::label('curp', 'CURP:') !!} <a id="curp" href="#" >CONSULTA CURP</a>
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
                <div class="form-group col-sm-6 col-lg-4" id="tuxtla" style="display: none;">
                    {!! Form::label('colony', 'Colonia:') !!}
                    <select name="colony" class="form-control input-lg" id="status" onChange="postalCode(this.value);">
                        <option value="Tuxtla Gutiérrez Centro">Tuxtla Gutiérrez Centro</option>
                        <option value="San Jacinto">San Jacinto</option>
                        <option value="Guadalupe">Guadalupe</option>
                        <option value="El Magueyito">El Magueyito</option>
                        <option value="Santo Domingo">Santo Domingo</option>
                        <option value="Centro SCT Chiapas">Centro SCT Chiapas</option>
                        <option value="Delegación de La Secretaria de Salud">Delegación de La Secretaria de Salud</option>
                        <option value="Delegación de La Secretaria de Educación Publica">Delegación de La Secretaria de Educación Publica</option>
                        <option value="Palacio de Gobierno del Estado de Chiapas">Palacio de Gobierno del Estado de Chiapas</option>
                        <option value="Nueva Reforma">Nueva Reforma</option>
                        <option value="Villa San Marcos">Villa San Marcos</option>
                        <option value="Maya">Maya</option>
                        <option value="Las Delicias">Las Delicias</option>
                        <option value="Magisterio 2000">Magisterio 2000</option>
                        <option value="San Fernando">San Fernando</option>
                        <option value="Burócrata">Burócrata</option>
                        <option value="Estrella de Oriente">Estrella de Oriente</option>
                        <option value="Misol-ha">Misol-ha</option>
                        <option value="Unidad Administrativa">Unidad Administrativa</option>
                        <option value="Albania Alta">Albania Alta</option>
                        <option value="Albania Baja">Albania Baja</option>
                        <option value="Lomas del Valle">Lomas del Valle</option>
                        <option value="Nueva Estrella">Nueva Estrella</option>
                        <option value="Morelos">Morelos</option>
                        <option value="Agua Azul">Agua Azul</option>
                        <option value="Los Manguitos">Los Manguitos</option>
                        <option value="Huajitlan">Huajitlan</option>
                        <option value="Amarantos">Amarantos</option>
                        <option value="Nueva Delicias">Nueva Delicias</option>
                        <option value="El Valle">El Valle</option>
                        <option value="Renovación">Renovación</option>
                        <option value="La Victoria">La Victoria</option>
                        <option value="Ampliación Pomarrosa">Ampliación Pomarrosa</option>
                        <option value="Valle Dorado">Valle Dorado</option>
                        <option value="Las Canteras">Las Canteras</option>
                        <option value="Canteras">Canteras</option>
                        <option value="Pedregal San Antonio">Pedregal San Antonio</option>
                        <option value="Jardines de las Flores">Jardines de las Flores</option>
                        <option value="Rosario Poniente">Rosario Poniente</option>
                        <option value="Villareal">Villareal</option>
                        <option value="Loma Real">Loma Real</option>
                        <option value="México">México</option>
                        <option value="Pomarrosa">Pomarrosa</option>
                        <option value="Santa Clara">Santa Clara</option>
                        <option value="Luis Donaldo Colosio">Luis Donaldo Colosio</option>
                        <option value="Grijalva">Grijalva</option>
                        <option value="Candox">Candox</option>
                        <option value="Linda Vista Shanka">Linda Vista Shanka</option>
                        <option value="12 de Noviembre">12 de Noviembre</option>
                        <option value="Yuquis">Yuquis</option>
                        <option value="Adonahi">Adonahi</option>
                        <option value="Colinas de Oriente">Colinas de Oriente</option>
                        <option value="Capulines 1">Capulines 1</option>
                        <option value="Capulines 2">Capulines 2</option>
                        <option value="Agripino Gutiérrez">Agripino Gutiérrez</option>
                        <option value="Las Lajas">Las Lajas</option>
                        <option value="Estrada">Estrada</option>
                        <option value="Natalia Venegas">Natalia Venegas</option>
                        <option value="Los Capulines III">Los Capulines III</option>
                        <option value="Pistimbak">Pistimbak</option>
                        <option value="Chiapas Solidario">Chiapas Solidario</option>
                        <option value="Las Américas">Las Américas</option>
                        <option value="Potinaspak">Potinaspak</option>
                        <option value="La Condesa">La Condesa</option>
                        <option value="Jardines del Norte">Jardines del Norte</option>
                        <option value="3 de Mayo">3 de Mayo</option>
                        <option value="La Esperanza">La Esperanza</option>
                        <option value="Las Granjas">Las Granjas</option>
                        <option value="El Carmen">El Carmen</option>
                        <option value="Santa Cruz">Santa Cruz</option>
                        <option value="Tuxtla Chico">Tuxtla Chico</option>
                        <option value="Buenos Aires">Buenos Aires</option>
                        <option value="Elmar Seltzer">Elmar Seltzer</option>
                        <option value="17 de Mayo">17 de Mayo</option>
                        <option value="Los Ángeles">Los Ángeles</option>
                        <option value="Cruz Con Casita">Cruz Con Casita</option>
                        <option value="Altos del Norte">Altos del Norte</option>
                        <option value="Patrocinio González">Patrocinio González</option>
                        <option value="Las Flores">Las Flores</option>
                        <option value="Las Casitas">Las Casitas</option>
                        <option value="Democrática">Democrática</option>
                        <option value="Buena Vista">Buena Vista</option>
                        <option value="Kilometro 4 Oriente">Kilometro 4 Oriente</option>
                        <option value="24 de Mayo">24 de Mayo</option>
                        <option value="Agua Azul">Agua Azul</option>
                        <option value="San Isidro Buenavista">San Isidro Buenavista</option>
                        <option value="Bugambilias">Bugambilias</option>
                        <option value="Continental">Continental</option>
                        <option value="San Francisco Sabinito">San Francisco Sabinito</option>
                        <option value="5 Plumas">5 Plumas</option>
                        <option value="La Arbolada">La Arbolada</option>
                        <option value="San Francisco Sabinal">San Francisco Sabinal</option>
                        <option value="San Martín">San Martín</option>
                        <option value="Laguitos Electricistas">Laguitos Electricistas</option>
                        <option value="Villa Tziscao">Villa Tziscao</option>
                        <option value="Ampliación Los Laguitos">Ampliación Los Laguitos</option>
                        <option value="Magdalena">Magdalena</option>
                        <option value="Plan de Ayala">Plan de Ayala</option>
                        <option value="Jardines de Tuxtla">Jardines de Tuxtla</option>
                        <option value="Juan Crispín">Juan Crispín</option>
                        <option value="Lumha">Lumha</option>
                        <option value="Juan Crispín">Juan Crispín</option>
                        <option value="San Isidro">San Isidro</option>
                        <option value="El Portal de Hierro">El Portal de Hierro</option>
                        <option value="Privada Boulevares">Privada Boulevares</option>
                        <option value="La Esmeralda">La Esmeralda</option>
                        <option value="Borges Laguitos">Borges Laguitos</option>
                        <option value="Jardín Colonial">Jardín Colonial</option>
                        <option value="Venecia">Venecia</option>
                        <option value="Boulevares">Boulevares</option>
                        <option value="Los Laureles">Los Laureles</option>
                        <option value="La Joyas">La Joyas</option>
                        <option value="Rincón de los Lagos">Rincón de los Lagos</option>
                        <option value="Privada Villas de Montecristo">Privada Villas de Montecristo</option>
                        <option value="Alborada">Alborada</option>
                        <option value="Los Portales">Los Portales</option>
                        <option value="Los Laguitos">Los Laguitos</option>
                        <option value="Los Tulipanes">Los Tulipanes</option>
                        <option value="Malibú">Malibú</option>
                        <option value="Monte Real">Monte Real</option>
                        <option value="Villa Tziscao">Villa Tziscao</option>
                        <option value="El Calichal">El Calichal</option>
                        <option value="SAHOP">SAHOP</option>
                        <option value="Fovissste 2 los Laureles">Fovissste 2 los Laureles</option>
                        <option value="Centenario Tuxtlán">Centenario Tuxtlán</option>
                        <option value="Bonampak">Bonampak</option>
                        <option value="Buena Vista">Buena Vista</option>
                        <option value="Monte Azul">Monte Azul</option>
                        <option value="San José Yeguiste">San José Yeguiste</option>
                        <option value="Atenas">Atenas</option>
                        <option value="Gobernadores">Gobernadores</option>
                        <option value="1ro de Mayo">1ro de Mayo</option>
                        <option value="Ladera de La Loma">Ladera de La Loma</option>
                        <option value="Paraíso Ojo de Agua">Paraíso Ojo de Agua</option>
                        <option value="Calichal">Calichal</option>
                        <option value="Electricistas">Electricistas</option>
                        <option value="Buenavista">Buenavista</option>
                        <option value="San José Chapultepec">San José Chapultepec</option>
                        <option value="Municipal Laguitos">Municipal Laguitos</option>
                        <option value="Nuevo Edén">Nuevo Edén</option>
                        <option value="Los Laguitos Infonavit">Los Laguitos Infonavit</option>
                        <option value="Secretaria de Agricultura Ganadería y Desarrollo Rural">Secretaria de Agricultura Ganadería y Desarrollo Rural</option>
                        <option value="Residencial La Hacienda">Residencial La Hacienda</option>
                        <option value="Privada Arboledas">Privada Arboledas</option>
                        <option value="Las Brisas">Las Brisas</option>
                        <option value="Moctezuma">Moctezuma</option>
                        <option value="Residencial Campestre">Residencial Campestre</option>
                        <option value="Residencial la Granja">Residencial la Granja</option>
                        <option value="Barrio Covadonga">Barrio Covadonga</option>
                        <option value="Las Arboledas">Las Arboledas</option>
                        <option value="Vista Hermosa">Vista Hermosa</option>
                        <option value="Rincón de Joyyo Mayu">Rincón de Joyyo Mayu</option>
                        <option value="Rinconada del Sol">Rinconada del Sol</option>
                        <option value="Alta Vista">Alta Vista</option>
                        <option value="Privada Bonampak">Privada Bonampak</option>
                        <option value="El Mirador">El Mirador</option>
                        <option value="El Pedregal">El Pedregal</option>
                        <option value="Los Cafetales">Los Cafetales</option>
                        <option value="Infonavit Laborante">Infonavit Laborante</option>
                        <option value="Los Sabinos">Los Sabinos</option>
                        <option value="Bonampak Norte">Bonampak Norte</option>
                        <option value="Montebello">Montebello</option>
                        <option value="La Pimienta">La Pimienta</option>
                        <option value="Rincón de La Florida">Rincón de La Florida</option>
                        <option value="Quetzalcoatl">Quetzalcoatl</option>
                        <option value="Asturias">Asturias</option>
                        <option value="Brasilia">Brasilia</option>
                        <option value="Rocío">Rocío</option>
                        <option value="Bosques del Parque">Bosques del Parque</option>
                        <option value="Rincón Potinaspak">Rincón Potinaspak</option>
                        <option value="Nuevo Mirador">Nuevo Mirador</option>
                        <option value="La Joya">La Joya</option>
                        <option value="La Antenita">La Antenita</option>
                        <option value="La Llave">La Llave</option>
                        <option value="Niño de Atocha">Niño de Atocha</option>
                        <option value="Paraíso Medio">Paraíso Medio</option>
                        <option value="Colon">Colon</option>
                        <option value="Miramar">Miramar</option>
                        <option value="La Gloria">La Gloria</option>
                        <option value="San Cristóbal">San Cristóbal</option>
                        <option value="Hacienda de México">Hacienda de México</option>
                        <option value="Tizatillo">Tizatillo</option>
                        <option value="Juy Juy">Juy Juy</option>
                        <option value="Miravalle">Miravalle</option>
                        <option value="Fovissste Paraíso">Fovissste Paraíso</option>
                        <option value="Paraíso Bajo">Paraíso Bajo</option>
                        <option value="Penipak Norte">Penipak Norte</option>
                        <option value="Miravalle 2a Sección">Miravalle 2a Sección</option>
                        <option value="San Jorge">San Jorge</option>
                        <option value="Paraíso Alto">Paraíso Alto</option>
                        <option value="Tuxtla Nuevo">Tuxtla Nuevo</option>
                        <option value="San Pedro Popular (San Pedro Mirador)">San Pedro Popular (San Pedro Mirador)</option>
                        <option value="Profesor Daniel Robles Sasso">Profesor Daniel Robles Sasso</option>
                        <option value="Ampliación Las Palmas">Ampliación Las Palmas</option>
                        <option value="Las Palmas">Las Palmas</option>
                        <option value="Real del Bosque">Real del Bosque</option>
                        <option value="Santos">Santos</option>
                        <option value="Buena Ventura">Buena Ventura</option>
                        <option value="El Brasilito">El Brasilito</option>
                        <option value="El Retiro">El Retiro</option>
                        <option value="Electricistas">Electricistas</option>
                        <option value="San Roque">San Roque</option>
                        <option value="San Marcos">San Marcos</option>
                        <option value="Granja Urcil">Granja Urcil</option>
                        <option value="Parque Madero">Parque Madero</option>
                        <option value="Periodista">Periodista</option>
                        <option value="Hidalgo">Hidalgo</option>
                        <option value="Infonavit Grijalva">Infonavit Grijalva</option>
                        <option value="Aurora">Aurora</option>
                        <option value="Residencial Campestre las Palmas">Residencial Campestre las Palmas</option>
                        <option value="El Vergel">El Vergel</option>
                        <option value="Las Flores">Las Flores</option>
                        <option value="Carlos Salinas de Gortari">Carlos Salinas de Gortari</option>
                        <option value="13 de Julio">13 de Julio</option>
                        <option value="Bosques de Primavera">Bosques de Primavera</option>
                        <option value="Ampliación Insurgentes">Ampliación Insurgentes</option>
                        <option value="Buena Vista">Buena Vista</option>
                        <option value="Cerro de Guadalupe">Cerro de Guadalupe</option>
                        <option value="Comitán">Comitán</option>
                        <option value="La Floresta">La Floresta</option>
                        <option value="La Ilusión">La Ilusión</option>
                        <option value="Las Torres">Las Torres</option>
                        <option value="Otilio Montaño">Otilio Montaño</option>
                        <option value="Loma Larga">Loma Larga</option>
                        <option value="Vida Mejor">Vida Mejor</option>
                        <option value="Los Poetas">Los Poetas</option>
                        <option value="Insurgentes">Insurgentes</option>
                        <option value="Dr. Gabriel Gutiérrez Zepeda">Dr. Gabriel Gutiérrez Zepeda</option>
                        <option value="Evolución Política Mexicana">Evolución Política Mexicana</option>
                        <option value="Patria Nueva">Patria Nueva</option>
                        <option value="27 de Febrero">27 de Febrero</option>
                        <option value="24 de Junio">24 de Junio</option>
                        <option value="Belisario Domínguez">Belisario Domínguez</option>
                        <option value="Paraíso I">Paraíso I</option>
                        <option value="San Isidro">San Isidro</option>
                        <option value="Paso Limón">Paso Limón</option>
                        <option value="Jardines del Pedregal">Jardines del Pedregal</option>
                        <option value="Paraíso II">Paraíso II</option>
                        <option value="21 de Septiembre">21 de Septiembre</option>
                        <option value="San Fernando">San Fernando</option>
                        <option value="Ampliación Arroyo Blanco">Ampliación Arroyo Blanco</option>
                        <option value="Infonavit El Rosario">Infonavit El Rosario</option>
                        <option value="16 de Julio">16 de Julio</option>
                        <option value="Unidad Chiapaneca">Unidad Chiapaneca</option>
                        <option value="El Bosque">El Bosque</option>
                        <option value="San Pedro">San Pedro</option>
                        <option value="Arroyo Blanco">Arroyo Blanco</option>
                        <option value="San Cayetano">San Cayetano</option>
                        <option value="San Pedro y Cayetano">San Pedro y Cayetano</option>
                        <option value="Las Águilas">Las Águilas</option>
                        <option value="Paulino Aguilar Paniagua">Paulino Aguilar Paniagua</option>
                        <option value="La Esperanza">La Esperanza</option>
                        <option value="San Pedro Progresivo">San Pedro Progresivo</option>
                        <option value="Terán">Terán</option>
                        <option value="Villas de Buenaventura">Villas de Buenaventura</option>
                        <option value="Fovissste III (El Puente)">Fovissste III (El Puente)</option>
                        <option value="Militar 2,3 y 5">Militar 2,3 y 5</option>
                        <option value="Alianza Campesina">Alianza Campesina</option>
                        <option value="Flamingos">Flamingos</option>
                        <option value="Villas de Catazaja">Villas de Catazaja</option>
                        <option value="Tulipanes">Tulipanes</option>
                        <option value="Villas del Rey">Villas del Rey</option>
                        <option value="Ana Teresa">Ana Teresa</option>
                        <option value="Las Palomas">Las Palomas</option>
                        <option value="Acacia 2000">Acacia 2000</option>
                        <option value="Zavaleta">Zavaleta</option>
                        <option value="Santa Isabel">Santa Isabel</option>
                        <option value="La Gloria">La Gloria</option>
                        <option value="La Herradura">La Herradura</option>
                        <option value="Bosques de la Trinidad">Bosques de la Trinidad</option>
                        <option value="Bicentenario">Bicentenario</option>
                        <option value="Residencial Bonanza">Residencial Bonanza</option>
                        <option value="Real de Bosque">Real de Bosque</option>
                        <option value="Bugambilias">Bugambilias</option>
                        <option value="Bugambilias">Bugambilias</option>
                        <option value="Los Tucanes">Los Tucanes</option>
                        <option value="Villas Montes Azules">Villas Montes Azules</option>
                        <option value="Aramoni">Aramoni</option>
                        <option value="Villa Misol-Ha">Villa Misol-Ha</option>
                        <option value="Joyas del Campestre">Joyas del Campestre</option>
                        <option value="Tierra Negra">Tierra Negra</option>
                        <option value="Militar 4">Militar 4</option>
                        <option value="Tuxtlán Mactumatza">Tuxtlán Mactumatza</option>
                        <option value="Villa Blanca">Villa Blanca</option>
                        <option value="San José Terán">San José Terán</option>
                        <option value="Los Tulipanes">Los Tulipanes</option>
                        <option value="Campestre Arenal">Campestre Arenal</option>
                        <option value="Campanario">Campanario</option>
                        <option value="Los Sauces">Los Sauces</option>
                        <option value="Club de Golf Campestre">Club de Golf Campestre</option>
                        <option value="El Mirador II">El Mirador II</option>
                        <option value="CCI">CCI</option>
                        <option value="Granjas Club Campestre">Granjas Club Campestre</option>
                        <option value="San Patricio">San Patricio</option>
                        <option value="Cuchilla Santa Rosa">Cuchilla Santa Rosa</option>
                        <option value="Unidad Antorchista">Unidad Antorchista</option>
                        <option value="El Carmen">El Carmen</option>
                        <option value="Alianza Popular Laborante">Alianza Popular Laborante</option>
                        <option value="Villa Victoria">Villa Victoria</option>
                        <option value="Flamboyán">Flamboyán</option>
                        <option value="Los Tamarindos">Los Tamarindos</option>
                        <option value="Asociación Civil Alianza Campesina">Asociación Civil Alianza Campesina</option>
                        <option value="La Reliquia">La Reliquia</option>
                        <option value="Puente Buena Vista">Puente Buena Vista</option>
                        <option value="Los Presidentes">Los Presidentes</option>
                        <option value="Loma Bonita">Loma Bonita</option>
                        <option value="Puesta del Sol">Puesta del Sol</option>
                        <option value="Higo Quemado">Higo Quemado</option>
                        <option value="El Ciprés">El Ciprés</option>
                        <option value="Colinas de Bellavista">Colinas de Bellavista</option>
                        <option value="Buenos Aires">Buenos Aires</option>
                        <option value="El Diamante">El Diamante</option>
                        <option value="Solidaridad La Curul">Solidaridad La Curul</option>
                        <option value="Belisario Domínguez">Belisario Domínguez</option>
                        <option value="Siglo XXI">Siglo XXI</option>
                        <option value="Ampliación Terán">Ampliación Terán</option>
                        <option value="Matumatza">Matumatza</option>
                        <option value="Jardines de Buena Vista">Jardines de Buena Vista</option>
                        <option value="Solidaridad Chiapaneca">Solidaridad Chiapaneca</option>
                        <option value="Buena Vista">Buena Vista</option>
                        <option value="Fovissste Mactumactza">Fovissste Mactumactza</option>
                        <option value="Bella Vista">Bella Vista</option>
                        <option value="Ampliación El Puente">Ampliación El Puente</option>
                        <option value="Privada Flamboyán">Privada Flamboyán</option>
                        <option value="3 Marías y los Arroyos">3 Marías y los Arroyos</option>
                        <option value="Penipak">Penipak</option>
                        <option value="ISSSTE">ISSSTE</option>
                        <option value="La Lomita">La Lomita</option>
                        <option value="Las Terrazas">Las Terrazas</option>
                        <option value="Burocrática">Burocrática</option>
                        <option value="Santa Elena">Santa Elena</option>
                        <option value="La Lomita">La Lomita</option>
                        <option value="Xamaipak Popular">Xamaipak Popular</option>
                        <option value="San Rafael">San Rafael</option>
                        <option value="Los Pinos">Los Pinos</option>
                        <option value="Lindavista">Lindavista</option>
                        <option value="Penipak">Penipak</option>
                        <option value="Manuel Molano">Manuel Molano</option>
                        <option value="Borgues">Borgues</option>
                        <option value="La Gloria">La Gloria</option>
                        <option value="San José Libramiento">San José Libramiento</option>
                        <option value="Lindavista">Lindavista</option>
                        <option value="Las Lomas">Las Lomas</option>
                        <option value="Dr.Romeo Rincón">Dr.Romeo Rincón</option>
                        <option value="El Calvario">El Calvario</option>
                        <option value="Santo Domingo">Santo Domingo</option>
                        <option value="Calvarium">Calvarium</option>
                        <option value="Lomas Verdes">Lomas Verdes</option>
                        <option value="Las Canoitas">Las Canoitas</option>
                        <option value="Colinas del Sur">Colinas del Sur</option>
                        <option value="Los Milagros">Los Milagros</option>
                        <option value="San Pascualito">San Pascualito</option>
                        <option value="Santa Cecilia">Santa Cecilia</option>
                        <option value="San Roque">San Roque</option>
                        <option value="Primavera">Primavera</option>
                        <option value="San Francisco">San Francisco</option>
                        <option value="El Cerrito">El Cerrito</option>
                        <option value="El Cocal">El Cocal</option>
                        <option value="Lomas del Sur">Lomas del Sur</option>
                        <option value="El Zoque">El Zoque</option>
                        <option value="Vista Hermosa">Vista Hermosa</option>
                        <option value="28 de Julio">28 de Julio</option>
                        <option value="Bosques del Sur">Bosques del Sur</option>
                        <option value="Ampliación Cocal">Ampliación Cocal</option>
                        <option value="Xamaipak">Xamaipak</option>
                        <option value="Diana Laura Riojas de Colosio">Diana Laura Riojas de Colosio</option>
                        <option value="Belén">Belén</option>
                        <option value="José Castillo Tielemans">José Castillo Tielemans</option>
                        <option value="Montserrat">Montserrat</option>
                        <option value="La Salle 1a Sección">La Salle 1a Sección</option>
                        <option value="La Salle 3a Sección">La Salle 3a Sección</option>
                        <option value="Las Flores">Las Flores</option>
                        <option value="Mexicanidad Chiapaneca">Mexicanidad Chiapaneca</option>
                        <option value="Orquídea">Orquídea</option>
                        <option value="Santa María La Ribera">Santa María La Ribera</option>
                        <option value="Privada Primavera">Privada Primavera</option>
                        <option value="Villas La Salle">Villas La Salle</option>
                        <option value="15 de Mayo">15 de Mayo</option>
                        <option value="Villas Ensueño">Villas Ensueño</option>
                        <option value="La Salle">La Salle</option>
                        <option value="La Salle 2a Sección">La Salle 2a Sección</option>
                        <option value="Zocotumbak">Zocotumbak</option>
                        <option value="Santa Cruz">Santa Cruz</option>
                        <option value="El Sabinito">El Sabinito</option>
                        <option value="Moderna">Moderna</option>
                        <option value="Emiliano Zapata">Emiliano Zapata</option>
                        <option value="Bienestar Social">Bienestar Social</option>
                        <option value="Los Choferes">Los Choferes</option>
                        <option value="Magisterial">Magisterial</option>
                        <option value="Militar">Militar</option>
                        <option value="Delegación de La Secretaria de La Defensa Nacional">Delegación de La Secretaria de La Defensa Nacional</option>
                        <option value="Revolución">Revolución</option>
                        <option value="Mercedes">Mercedes</option>
                        <option value="Agua Azul">Agua Azul</option>
                        <option value="Benito Juárez">Benito Juárez</option>
                        <option value="Lomas del Venado">Lomas del Venado</option>
                        <option value="Obrera">Obrera</option>
                        <option value="Las Lomas">Las Lomas</option>
                        <option value="El Aguacate">El Aguacate</option>
                        <option value="San Roque">San Roque</option>
                        <option value="Bonampak">Bonampak</option>
                        <option value="Maldonado">Maldonado</option>
                        <option value="7 de Abril">7 de Abril</option>
                        <option value="Altos del Sur">Altos del Sur</option>
                        <option value="2 de Febrero">2 de Febrero</option>
                        <option value="Ideal">Ideal</option>
                        <option value="Rincón de la Montaña">Rincón de la Montaña</option>
                        <option value="Las Nubes">Las Nubes</option>
                        <option value="Potrero Mirador">Potrero Mirador</option>
                        <option value="Joyas del Oriente">Joyas del Oriente</option>
                        <option value="Popular">Popular</option>
                        <option value="Lomas del Pedregal">Lomas del Pedregal</option>
                        <option value="Colesquizan">Colesquizan</option>
                        <option value="Santa Rosalía">Santa Rosalía</option>
                        <option value="San Juan Sabinito">San Juan Sabinito</option>
                        <option value="Coquelequixtlan">Coquelequixtlan</option>
                        <option value="El Dorado">El Dorado</option>
                        <option value="Santa Ana">Santa Ana</option>
                        <option value="Coquelequixtlán">Coquelequixtlán</option>
                        <option value="El Sabinito">El Sabinito</option>
                        <option value="Lomas del Sauce">Lomas del Sauce</option>
                        <option value="Francisco I Madero">Francisco I Madero</option>
                        <option value="El Roble">El Roble</option>
                        <option value="California">California</option>
                        <option value="Caminera">Caminera</option>
                        <option value="Los Olivos">Los Olivos</option>
                        <option value="Arroyo Grande">Arroyo Grande</option>
                        <option value="Los Trabajadores">Los Trabajadores</option>
                        <option value="Rivera Cerro Hueco">Rivera Cerro Hueco</option>
                        <option value="Sauce">Sauce</option>
                        <option value="Loma Bonita">Loma Bonita</option>
                        <option value="Paseo del Bosque">Paseo del Bosque</option>
                        <option value="Balcones del Sur">Balcones del Sur</option>
                        <option value="Los Pájaros">Los Pájaros</option>
                        <option value="Las Brisas">Las Brisas</option>
                        <option value="Aires del Oriente">Aires del Oriente</option>
                        <option value="Lomas Verdes">Lomas Verdes</option>
                        <option value="Lomas del Oriente">Lomas del Oriente</option>
                        <option value="Sabines">Sabines</option>
                        <option value="Industrial">Industrial</option>
                        <option value="FSTSE">FSTSE</option>
                        <option value="El Porvenir">El Porvenir</option>
                        <option value="El Cebollal (El Ziquete)">El Cebollal (El Ziquete)</option>
                        <option value="Emejaka">Emejaka</option>
                        <option value="Guadalupe">Guadalupe</option>
                        <option value="La Cueva del Jaguar">La Cueva del Jaguar</option>
                        <option value="La Misión">La Misión</option>
                        <option value="Tizaltillo">Tizaltillo</option>
                        <option value="7 de Octubre">7 de Octubre</option>
                        <option value="Lomas del Valle">Lomas del Valle</option>
                        <option value="Condominio San Juan">Condominio San Juan</option>
                        <option value="Azteca">Azteca</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="6 de Junio">6 de Junio</option>
                        <option value="Los Ranchos">Los Ranchos</option>
                        <option value="Zona Galáctica">Zona Galáctica</option>
                        <option value="Francisco I. Madero">Francisco I. Madero</option>
                        <option value="El Taray">El Taray</option>
                        <option value="Lomas de Santa María">Lomas de Santa María</option>
                        <option value="Colonial">Colonial</option>
                        <option value="Copoya">Copoya</option>
                        <option value="El Jobo">El Jobo</option>
                        <option value="Emiliano Zapata">Emiliano Zapata</option>
                    </select>
                </div>


                <div class="form-group col-sm-6 col-lg-4" id="tuxtlapostal" style="display: none;">
                    {!! Form::label('postal_code', 'Código Postal:') !!}
                    <select name="postal_code" class="form-control input-lg">
                        <option value="29000">29000</option>
                        <option value="29001">29001</option>
                        <option value="29007">29007</option>
                        <option value="29008">29008</option>
                        <option value="29009">29009</option>
                        <option value="29010">29010</option>
                        <option value="29014">29014</option>
                        <option value="29016">29016</option>
                        <option value="29017">29017</option>
                        <option value="29018">29018</option>
                        <option value="29019">29019</option>
                        <option value="29020">29020</option>
                        <option value="29023">29023</option>
                        <option value="29024">29024</option>
                        <option value="29025">29025</option>
                        <option value="29026">29026</option>
                        <option value="29027">29027</option>
                        <option value="29028">29028</option>
                        <option value="29029">29029</option>
                        <option value="29030">29030</option>
                        <option value="29034">29034</option>
                        <option value="29037">29037</option>
                        <option value="29038">29038</option>
                        <option value="29039">29039</option>
                        <option value="29040">29040</option>
                        <option value="29043">29043</option>
                        <option value="29044">29044</option>
                        <option value="29045">29045</option>
                        <option value="29047">29047</option>
                        <option value="29049">29049</option>
                        <option value="29050">29050</option>
                        <option value="29054">29054</option>
                        <option value="29055">29055</option>
                        <option value="29056">29056</option>
                        <option value="29057">29057</option>
                        <option value="29058">29058</option>
                        <option value="29059">29059</option>
                        <option value="29060">29060</option>
                        <option value="29064">29064</option>
                        <option value="29065">29065</option>
                        <option value="29066">29066</option>
                        <option value="29067">29067</option>
                        <option value="29070">29070</option>
                        <option value="29073">29073</option>
                        <option value="29075">29075</option>
                        <option value="29076">29076</option>
                        <option value="29077">29077</option>
                        <option value="29078">29078</option>
                        <option value="29079">29079</option>
                        <option value="29080">29080</option>
                        <option value="29086">29086</option>
                        <option value="29087">29087</option>
                        <option value="29089">29089</option>
                        <option value="29090">29090</option>
                        <option value="29094">29094</option>
                        <option value="29096">29096</option>
                        <option value="29098">29098</option>
                        <option value="29100">29100</option>
                        <option value="29112">29112</option>
                    </select>
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
                {!! Form::text('postal_code_company', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE CÓDIGO POSTAL', 'required' => 'required','data-parsley-trigger ' => 'input focusin','data-parsley-type' => 'digits','data-parsley-maxlength' => '5','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
        </div>
        <div class="form-group col-sm-6 col-lg-12">

            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('phone_company', 'Teléfono del Negocio:') !!}
                {!! Form::text('phone_company', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE NÚMERO DEL TELÉFONO', 'required' => 'required','data-parsley-trigger ' => 'input focusin', 'data-parsley-type' => 'digits', 'data-parsley-maxlength' => '10','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
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