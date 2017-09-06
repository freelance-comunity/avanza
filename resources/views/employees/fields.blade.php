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
          <a href="#step-2" type="button" class="btn btn-default  btn-circle" disabled="disabled">2</a>
          <p>Ubicación</p>
        </div>
        <div class="stepwizard-step">
          <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
          <p>Identificaciones</p>
        </div>
        <div class="stepwizard-step">
          <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
          <p>Roles</p>
        </div>
      </div>
    </div>
  </div>
  <div class="box-body">
    <div class="row setup-content" id="step-1">
      <div class="col-xs-12">
        <div class="col-md-12">
          <h3> Datos </h3>
          <div class="form-group col-sm-6 col-lg-12">
            <div class="form-group col-sm-6 col-lg-4">
              {!! Form::label('name', 'Nombre:') !!}
              {!! Form::text('name', null, [
                'style' => 'text-transform:uppercase',
                'class' => 'form-control input-lg', 
                'placeholder' => 'ESCRIBE NOMBRE', 
                'required' => 'required', 
                'data-parsley-trigger ' => 'input focusin',
                'onkeyup' => 'javascript:this.value=this.value.toUpperCase();
                ']) !!}
              </div>

              <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('father_last_name', 'Apellido Paterno:') !!}
                {!! Form::text('father_last_name', null, [
                  'style' => 'text-transform:uppercase',
                  'class' => 'form-control input-lg',
                  'placeholder' => 'ESCRIBE APELLIDO PATERNO',
                  'required' => 'required', 
                  'data-parsley-trigger ' => 'input focusin',
                  'onkeyup' => 'javascript:this.value=this.value.toUpperCase();
                  ']) !!}
                </div>

                <div class="form-group col-sm-6 col-lg-4">
                  {!! Form::label('mother_last_name', 'Apellido Materno:') !!}
                  {!! Form::text('mother_last_name', null, [
                    'style' => 'text-transform:uppercase',
                    'class' => 'form-control input-lg',
                    'placeholder' => 'ESCRIBE APELLIDO MATERNO',
                    'required' => 'required', 
                    'data-parsley-trigger ' => 'input focusin',
                    'onkeyup' => 'javascript:this.value=this.value.toUpperCase();
                    ']) !!}
                  </div>
                </div>

                <div class="form-group col-sm-6 col-lg-12">
                  <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('email', 'Correo Electrónico:') !!}
                    <input type="email" class="form-control input-lg" placeholder="EJEMPLO@GMAIL.COM" name="email" value="{{ old('email') }}" required="required" data-parsley-type="email" data-parsley-trigger="input focusin"/>
                  </div>

                  <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('birthdate', 'Fecha de Nacimiento:') !!}
                    <input type="date" name="birthdate" class="form-control input-lg" required="required" data-parsley-trigger="input focusin">
                  </div>

                  <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('birth_entity', 'Entidad de Nacimiento:') !!}
                    {!! Form::select('birth_entity',['placeholder'=>'SELECCIONES UN ESTADO','AGUASCALIENTES' => 'AGUASCALIENTES', 'BAJA CALIFORNIA' => 'BAJA CALIFORNIA', 'BAJA CALIFORNIA SUR' => 'BAJA CALIFORNIA SUR','CAMPECHE' => 'CAMPECHE','COAHUILA' => 'COAHUILA','COLIMA' => 'COLIMA','CHIAPAS' => 'CHIAPAS','CHIHUAHUA' => 'CHIHUAHUA','DISTRITO FEDERAL' => 'DISTRITO FEDERAL','DURANGO' => 'DURANGO','JALISCO' => 'JALISCO','MÉXICO' => 'MÉXICO','MICHOACÁN' => 'MICHOACÁN','MORELOS' => 'MORELOS','NAYARIT' => 'NAYARIT','NUEVO LEÓN' => 'NUEVO LEÓN','OAXACA' => 'OAXACA','PUEBLA' => 'PUEBLA','QUERÉTARO' => 'QUERÉTARO','QUINTANA ROO'=>'QUINTANA ROO','SAN LUIS POTOSÍ'=> 'SAN LUIS POTOSÍ','SINALOA'=>'SINALOA','SONORA','SONORA','TABASCO'=>'TABASCO','TAMAULIPAS'=>'TAMAULIPAS','TLAXCALA'=>'TLAXCALA','VERACRUZ'=>'VERACRUZ','YUCATÁN'=>'YUCATÁN','ZACATECAS'=>'ZACATECAS'], null, [
                      'class' => 'form-control input-lg',
                      'required' => 'required',
                      'data-parsley-trigger ' => 'input focusin',]) !!}
                    </div>
                  </div>

                  <div class="form-group col-sm-6 col-lg-12">
                    <div class="form-group col-sm-6 col-lg-4">
                      {!! Form::label('place_of_birth', 'Lugar de Nacimiento:') !!}
                      {!! Form::text('place_of_birth', null, [
                        'style' => 'text-transform:uppercase',
                        'class' => 'form-control input-lg',
                        'placeholder' => 'ESCRIBE LUGAR DE NACIMIENTO',
                        'required' => 'required',
                        'data-parsley-trigger ' => 'input focusin',
                        'onkeyup' => 'javascript:this.value=this.value.toUpperCase();
                        '
                        ]) !!}
                      </div>

                      <div class="form-group col-sm-6 col-lg-4">
                        {!! Form::label('gender', 'Género:') !!}
                        {!! Form::select('gender',['HOMBRE' => 'HOMBRE', 'MUJER' => 'MUJER'], null, [
                          'style' => 'text-transform:uppercase',
                          'class' => 'form-control input-lg', 
                          'required' => 'required',
                          'data-parsley-trigger ' => 'input focusin',]) !!}
                        </div>

                        <div class="form-group col-sm-6 col-lg-4">
                          {!! Form::label('civil_status', 'Estado Civil:') !!}
                          {!! Form::select('civil_status',['SOLTERO(A)' => 'SOLTERO(A)', 'CASADO(A)' => 'CASADO(A)'], null, [
                            'style' => 'text-transform:uppercase',
                            'class' => 'form-control input-lg', 
                            'required' => 'required',
                            'data-parsley-trigger ' => 'input focusin',]) !!}
                          </div>

                        </div>


                        <div class="form-group col-sm-6 col-lg-12">
                          <div class="form-group col-sm-6 col-lg-4">
                            {!! Form::label('country_of_birth', 'País de Nacimiento:') !!}
                            {!! Form::select('country_of_birth',['MÉXICO' => 'MÉXICO'] ,null, [
                              'style' => 'text-transform:uppercase',
                              'class' => 'form-control input-lg', 
                              'required' => 'required',
                              'data-parsley-trigger ' => 'input focusin',]) !!}
                            </div>

                            <div class="form-group col-sm-6 col-lg-4">
                              {!! Form::label('nationality', 'Nacionalidad:') !!}
                              {!! Form::select('nationality',['MEXICANA' => 'MEXICANA'], null, [
                                'style' => 'text-transform:uppercase',
                                'class' => 'form-control input-lg', 
                                'required' => 'required',
                                'data-parsley-trigger ' => 'input focusin',]) !!}
                              </div>

                              <div class="form-group col-sm-6 col-lg-4">
                                {!! Form::label('scholarship', 'Escolaridad:') !!}
                                {!! Form::select('scholarship',['NINGUNA' => 'NINGUNA', 'SABE LEER' => 'SABE LEER', 'PRIMARIA' => 'PRIMARIA', 'SECUNDARIA' => 'SECUNDARIA', 'BACHILLERATO' => 'BACHILLERATO', 'LICENCIATURA' => 'LICENCIATURA', 'POSGRADO' => 'POSGRADO'], null, [
                                  'style' => 'text-transform:uppercase',
                                  'class' => 'form-control input-lg', 
                                  'required' => 'required',
                                  'data-parsley-trigger ' => 'input focusin',]) !!}
                                </div>
                              </div>

                              <div class="form-group col-sm-6 col-lg-12">
                                <div class="form-group col-sm-6 col-lg-4">
                                  {!! Form::label('phone_1', 'Teléfono 1:') !!}
                                  <input type="number" name="phone_1" class="form-control input-lg" placeholder="TELÉFONO 1" required="required" data-parsley-trigger="input focusin" data-parsley-type="digits" data-parsley-maxlength="10">
                                </div>

                                <div class="form-group col-sm-6 col-lg-4">
                                  {!! Form::label('phone_2', 'Teléfono 2:') !!}
                                  <input type="number" name="phone_2" class="form-control input-lg" placeholder="TELÉFONO 2" data-parsley-trigger="input focusin" data-parsley-type="digits" data-parsley-maxlength="10">
                                </div>

                                <div class="form-group col-sm-6 col-lg-4">
                                  {!! Form::label('avatar', 'Foto:') !!}
                                  {!! Form::file('avatar', [
                                    'required' => 'required',
                                    'data-parsley-trigger ' => 'input focusin',
                                    ]) !!}
                                  </div>
                                </div>


                                @php
                                $count = App\Models\Branch::all();
                                @endphp
                                <div class="form-group col-sm-12 col-lg-12">
                                  <div class="form-group col-sm-12 col-lg-12">
                                    {!! Form::label('branch_id', '* Sucursal:') !!}
                                    <select name="branch_id" required="" data-parsley-trigger="input focusin" value="" class="form-control input-lg" id="branch">
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

                                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Siguiente</button>
                              </div>
                            </div>
                          </div>
                          <div class="row setup-content" id="step-2">
                            <div class="col-xs-12">
                              <div class="col-md-12">
                                <h3> Ubicación </h3>
                                <div class="form-group col-sm-12 col-lg-12">
                                  <div class="form-group col-sm-6 col-lg-4">
                                    {!! Form::label('country', 'País:') !!}
                                    {!! Form::select('country',['MÉXICO' => 'MÉXICO'] ,null, ['class' => 'form-control input-lg', 'required' => 'required', 
                                    'data-parsley-trigger ' => 'input focusin',]) !!}
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
                                     <option value="COLIMA">COLIMA</option>
                                     <option value="CHIAPAS">CHIAPAS</option>
                                     <option value="CHIHUAHUA">CHIHUAHUA</option>
                                     <option value="DISTRITO FEDERAL">DISTRITO FEDERAL</option>
                                     <option value="DURANGO">DURANGO</option>
                                     <option value="GUANAJUATO">GUANAJUATO</option>
                                     <option value="GUERRERO">GUERRERO</option>
                                     <option value="HIDALGO">HIDALGO</option>
                                     <option value="JALISCO">JALISCO</option>
                                     <option value="MÉXICO">MÉXICO</option>
                                     <option value="MICHOACÁN">MICHOACÁN</option>
                                     <option value="MORELOS">MORELOS</option>
                                     <option value="NAYARIT">NAYARIT</option>
                                     <option value="NUEVO LEÓN">NUEVO LEÓN</option>
                                     <option value="OAXACA">OAXACA</option>
                                     <option value="PUEBLA">PUEBLA</option>
                                     <option value="QUERÉTARO">QUERÉTARO</option>
                                     <option value="QUINTANA ROO">QUINTANA ROO</option>
                                     <option value="SAN LUIS POTOSÍ">SAN LUIS POTOSÍ</option>
                                     <option value="SINALOA">SINALOA</option>
                                     <option value="SONORA">SONORA</option>
                                     <option value="TABASCO">TABASCO</option>
                                     <option value="TAMAULIPAS">TAMAULIPAS</option>
                                     <option value="TLAXCALA">TLAXCALA</option>
                                     <option value="VERACRUZ">VERACRUZ</option>
                                     <option value="YUCATÁN">YUCATÁN</option>
                                     <option value="ZACATECAS">ZACATECAS</option>
                                   </select>
                                 </div>

                                 <div class="form-group col-sm-6 col-lg-4"  id="chiapas" style="display: none;" >
                                  {!! Form::label('municipality', 'Municipio:') !!}

                                  <select name="municipality" class="form-control input-lg" id="status" onChange="otro(this.value);">
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
                                <div class="form-group col-sm-6 col-lg-4"  id="aguascalientes" style="display: none;" >
                                  {!! Form::label('municipality', 'Municipio:') !!}
                                  <select name="municipality" class="form-control input-lg">
                                    <option value="Aguascalientes">Aguascalientes</option>
                                    <option value="Asientos">Asientos</option>
                                    <option value="Calvillo">Calvillo</option>
                                    <option value="Cosio">Cosio</option>
                                    <option value="Jesus Maria">Jesus Maria</option>
                                    <option value="Pabellon de Arteaga">Pabellon de Arteaga</option>
                                    <option value="Rincon de Romos">Rincon de Romos</option>
                                    <option value="San Jose de Gracia">San Jose de Gracia</option>
                                    <option value="Tepezala">Tepezala</option>
                                    <option value="El Llano">El Llano</option>
                                    <option value="San Francisco de los Romo">San Francisco de los Romo</option>
                                  </select>
                                </div>

                                <div class="form-group col-sm-6 col-lg-4"  id="bajacalifornia" style="display: none;" >
                                  {!! Form::label('municipality', 'Municipio:') !!}
                                  <select name="municipality" class="input-lg form-control">
                                    <option value="Ensenada">Ensenada</option>
                                    <option value="Mexicali">Mexicali</option>
                                    <option value="Tecate">Tecate</option>
                                    <option value="Tijuana">Tijuana</option>
                                    <option value="Playas de Rosarito">Playas de Rosarito</option>
                                  </select>
                                </div>
                                <div class="form-group col-sm-6 col-lg-4"  id="bajacaliforniasur" style="display: none;" >
                                  {!! Form::label('municipality', 'Municipio:') !!}
                                  <select name="municipality" class="input-lg form-control">
                                    <option value="Comondu">Comondu</option>
                                    <option value="Mulege">Mulege</option>
                                    <option value="La Paz">La Paz</option>
                                    <option value="Los Cabos">Los Cabos</option>
                                    <option value="Loreto">Loreto</option>
                                  </select>
                                </div>
                                <div class="form-group col-sm-6 col-lg-4"  id="campeche" style="display: none;" >
                                  {!! Form::label('municipality', 'Municipio:') !!}
                                  <select name="municipality" class="input-lg form-control">
                                    <option value="Calkini">Calkini</option>
                                    <option value="Campeche">Campeche</option>
                                    <option value="Carmen">Carmen</option>
                                    <option value="Champoton">Champoton</option>
                                    <option value="Hecelchakan">Hecelchakan</option>
                                    <option value="Hopelchen">Hopelchen</option>
                                    <option value="Palizada">Palizada</option>
                                    <option value="Tenabo">Tenabo</option>
                                    <option value="Escarcega">Escarcega</option>
                                    <option value="Calakmul">Calakmul</option>
                                    <option value="Candelaria">Candelaria</option>
                                  </select>
                                </div>
                                <div class="form-group col-sm-6 col-lg-4"  id="coahuila" style="display: none;" >
                                  {!! Form::label('municipality', 'Municipio:') !!}
                                  <select name="municipality" class="input-lg form-control">
                                    <option value="Abasolo">Abasolo</option>
                                    <option value="Acu">Acu</option>
                                    <option value="Allende">Allende</option>
                                    <option value="Arteaga">Arteaga</option>
                                    <option value="Candela">Candela</option>
                                    <option value="Casta">Casta</option>
                                    <option value="Cuatro Cienegas">Cuatro Cienegas</option>
                                    <option value="Escobedo">Escobedo</option>
                                    <option value="Francisco I. Madero">Francisco I. Madero</option>
                                    <option value="Frontera">Frontera</option>
                                    <option value="General Cepeda">General Cepeda</option>
                                    <option value="Guerrero">Guerrero</option>
                                    <option value="Hidalgo">Hidalgo</option>
                                    <option value="Jimenez">Jimenez</option>
                                    <option value="Juarez">Juarez</option>
                                    <option value="Lamadrid">Lamadrid</option>
                                    <option value="Matamoros">Matamoros</option>
                                    <option value="Monclova">Monclova</option>
                                    <option value="Morelos">Morelos</option>
                                    <option value="Muzquiz">Muzquiz</option>
                                    <option value="Nadadores">Nadadores</option>
                                    <option value="Nava">Nava</option>
                                    <option value="Ocampo">Ocampo</option>
                                    <option value="Parras">Parras</option>
                                    <option value="Piedras Negras">Piedras Negras</option>
                                    <option value="Progreso">Progreso</option>
                                    <option value="Ramos Arizpe">Ramos Arizpe</option>
                                    <option value="Sabinas">Sabinas</option>
                                    <option value="Sacramento">Sacramento</option>
                                    <option value="Saltillo">Saltillo</option>
                                    <option value="San Buenaventura">San Buenaventura</option>
                                    <option value="San Juan de Sabinas">San Juan de Sabinas</option>
                                    <option value="San Pedro">San Pedro</option>
                                    <option value="Sierra Mojada">Sierra Mojada</option>
                                    <option value="Torreon">Torreon</option>
                                    <option value="Viesca">Viesca</option>
                                    <option value="Villa Union">Villa Union</option>
                                    <option value="Zaragoza">Zaragoza</option>
                                  </select>

                                </div>
                                <div class="form-group col-sm-6 col-lg-4"  id="colima" style="display: none;" >
                                  {!! Form::label('municipality', 'Municipio:') !!}
                                  <select name="municipality" class="input-lg form-control">
                                    <option value="0">todo el estado</option>
                                    <option value="Armeria">Armeria</option>
                                    <option value="Colima">Colima</option>
                                    <option value="Comala">Comala</option>
                                    <option value="Coquimatlan">Coquimatlan</option>
                                    <option value="Cuauhtemoc">Cuauhtemoc</option>
                                    <option value="Ixtlahuacan">Ixtlahuacan</option>
                                    <option value="Manzanillo">Manzanillo</option>
                                    <option value="Minatitlan">Minatitlan</option>
                                    <option value="Tecoman">Tecoman</option>
                                    <option value="Villa de Alvarez">Villa de Alvarez</option>
                                  </select>
                                </div>
                                <div class="form-group col-sm-6 col-lg-4"  id="chihuahua" style="display: none;" >
                                  {!! Form::label('municipality', 'Municipio:') !!}
                                  <select name="municipality" class="input-lg form-control">
                                    <option value="Ahumada">Ahumada</option>
                                    <option value="Aldama">Aldama</option>
                                    <option value="Allende">Allende</option>
                                    <option value="Aquiles Serdan">Aquiles Serdan</option>
                                    <option value="Ascension">Ascension</option>
                                    <option value="Bachiniva">Bachiniva</option>
                                    <option value="Balleza">Balleza</option>
                                    <option value="Batopilas">Batopilas</option>
                                    <option value="Bocoyna">Bocoyna</option>
                                    <option value="Buenaventura">Buenaventura</option>
                                    <option value="Camargo">Camargo</option>
                                    <option value="Carichi">Carichi</option>
                                    <option value="Casas Grandes">Casas Grandes</option>
                                    <option value="Coronado">Coronado</option>
                                    <option value="Coyame del Sotol">Coyame del Sotol</option>
                                    <option value="La Cruz">La Cruz</option>
                                    <option value="Cuauhtemoc">Cuauhtemoc</option>
                                    <option value="Cusihuiriachi">Cusihuiriachi</option>
                                    <option value="Chihuahua">Chihuahua</option>
                                    <option value="Chinipas">Chinipas</option>
                                    <option value="Delicias">Delicias</option>
                                    <option value="Dr. Belisario Dominguez">Dr. Belisario Dominguez</option>
                                    <option value="Galeana">Galeana</option>
                                    <option value="Santa Isabel">Santa Isabel</option>
                                    <option value="Gomez Farias">Gomez Farias</option>
                                    <option value="Gran Morelos">Gran Morelos</option>
                                    <option value="Guachochi">Guachochi</option>
                                    <option value="Guadalupe">Guadalupe</option>
                                    <option value="Guadalupe y Calvo">Guadalupe y Calvo</option>
                                    <option value="Guazapares">Guazapares</option>
                                    <option value="Guerrero">Guerrero</option>
                                    <option value="Hidalgo del Parral">Hidalgo del Parral</option>
                                    <option value="Huejotitan">Huejotitan</option>
                                    <option value="Ignacio Zaragoza">Ignacio Zaragoza</option>
                                    <option value="Janos">Janos</option>
                                    <option value="Jimenez">Jimenez</option>
                                    <option value="Juarez">Juarez</option>
                                    <option value="Julimes">Julimes</option>
                                    <option value="Lopez">Lopez</option>
                                    <option value="Madera">Madera</option>
                                    <option value="Maguarichi">Maguarichi</option>
                                    <option value="Manuel Benavides">Manuel Benavides</option>
                                    <option value="Matachi">Matachi</option>
                                    <option value="Matamoros">Matamoros</option>
                                    <option value="Meoqui">Meoqui</option>
                                    <option value="Morelos">Morelos</option>
                                    <option value="Moris">Moris</option>
                                    <option value="Namiquipa">Namiquipa</option>
                                    <option value="Nonoava">Nonoava</option>
                                    <option value="Nuevo Casas Grandes">Nuevo Casas Grandes</option>
                                    <option value="Ocampo">Ocampo</option>
                                    <option value="Ojinaga">Ojinaga</option>
                                    <option value="Praxedis G. Guerrero">Praxedis G. Guerrero</option>
                                    <option value="Riva Palacio">Riva Palacio</option>
                                    <option value="Rosales">Rosales</option>
                                    <option value="Rosario">Rosario</option>
                                    <option value="San Francisco de Borja">San Francisco de Borja</option>
                                    <option value="San Francisco de Conchos">San Francisco de Conchos</option>
                                    <option value="San Francisco del Oro">San Francisco del Oro</option>
                                    <option value="Santa Barbara">Santa Barbara</option>
                                    <option value="Satevo">Satevo</option>
                                    <option value="Saucillo">Saucillo</option>
                                    <option value="Temosachic">Temosachic</option>
                                    <option value="El Tule">El Tule</option>
                                    <option value="Urique">Urique</option>
                                    <option value="Uruachi">Uruachi</option>
                                    <option value="Valle de Zaragoza">Valle de Zaragoza</option>
                                  </select>
                                </div>
                                <div class="form-group col-sm-6 col-lg-4"  id="df" style="display: none;" >
                                  {!! Form::label('municipality', 'Municipio:') !!}
                                  <select name="municipality" class="input-lg form-control">
                                    <option value="Azcapotzalco">Azcapotzalco</option>
                                    <option value="Coyoacan">Coyoacan</option>
                                    <option value="Cuajimalpa de Morelos">Cuajimalpa de Morelos</option>
                                    <option value="Gustavo A. Madero">Gustavo A. Madero</option>
                                    <option value="Iztacalco">Iztacalco</option>
                                    <option value="Iztapalapa">Iztapalapa</option>
                                    <option value="La Magdalena Contreras">La Magdalena Contreras</option>
                                    <option value="Milpa Alta">Milpa Alta</option>
                                    <option value="Alvaro Obregon">Alvaro Obregon</option>
                                    <option value="Tlahuac">Tlahuac</option>
                                    <option value="Tlalpan">Tlalpan</option>
                                    <option value="Xochimilco">Xochimilco</option>
                                    <option value="Benito Juarez">Benito Juarez</option>
                                    <option value="Cuauhtemoc">Cuauhtemoc</option>
                                    <option value="Miguel Hidalgo">Miguel Hidalgo</option>
                                    <option value="Venustiano Carranza">Venustiano Carranza</option>
                                  </select>
                                </div>
                                <div class="form-group col-sm-6 col-lg-4"  id="durango" style="display: none;" >
                                  {!! Form::label('municipality', 'Municipio:') !!}
                                  <select name="municipality" class="input-lg form-control">
                                    <option value="Canatlan">Canatlan</option>
                                    <option value="Canelas">Canelas</option>
                                    <option value="Coneto de Comonfort">Coneto de Comonfort</option>
                                    <option value="Cuencame">Cuencame</option>
                                    <option value="Durango">Durango</option>
                                    <option value="General Simon Bolivar">General Simon Bolivar</option>
                                    <option value="Gomez Palacio">Gomez Palacio</option>
                                    <option value="Guadalupe Victoria">Guadalupe Victoria</option>
                                    <option value="Guanacevi">Guanacevi</option>
                                    <option value="Hidalgo">Hidalgo</option>
                                    <option value="Inde">Inde</option>
                                    <option value="Lerdo">Lerdo</option>
                                    <option value="Mapimi">Mapimi</option>
                                    <option value="Mezquital">Mezquital</option>
                                    <option value="Nazas">Nazas</option>
                                    <option value="Nombre de Dios">Nombre de Dios</option>
                                    <option value="Ocampo">Ocampo</option>
                                    <option value="El Oro">El Oro</option>
                                    <option value="Otaez">Otaez</option>
                                    <option value="Panuco de Coronado">Panuco de Coronado</option>
                                    <option value="Pe">Pe</option>
                                    <option value="Poanas">Poanas</option>
                                    <option value="Pueblo Nuevo">Pueblo Nuevo</option>
                                    <option value="Rodeo">Rodeo</option>
                                    <option value="San Bernardo">San Bernardo</option>
                                    <option value="San Dimas">San Dimas</option>
                                    <option value="San Juan de Guadalupe">San Juan de Guadalupe</option>
                                    <option value="San Juan del Rio">San Juan del Rio</option>
                                    <option value="San Luis del Cordero">San Luis del Cordero</option>
                                    <option value="San Pedro del Gallo">San Pedro del Gallo</option>
                                    <option value="Santa Clara">Santa Clara</option>
                                    <option value="Santiago Papasquiaro">Santiago Papasquiaro</option>
                                    <option value="Suchil">Suchil</option>
                                    <option value="Tamazula">Tamazula</option>
                                    <option value="Tepehuanes">Tepehuanes</option>
                                    <option value="Tlahualilo">Tlahualilo</option>
                                    <option value="Topia">Topia</option>
                                    <option value="Vicente Guerrero">Vicente Guerrero</option>
                                    <option value="Nuevo Ideal">Nuevo Ideal</option>
                                  </select>
                                </div>
                                <div class="form-group col-sm-6 col-lg-4"  id="guanajuato" style="display: none;" >
                                  {!! Form::label('municipality', 'Municipio:') !!}
                                  <select name="municipality" class="input-lg form-control">
                                    <option value="Abasolo">Abasolo</option>
                                    <option value="Acambaro">Acambaro</option>
                                    <option value="San Miguel de Allende">San Miguel de Allende</option>
                                    <option value="Apaseo el Alto">Apaseo el Alto</option>
                                    <option value="Apaseo el Grande">Apaseo el Grande</option>
                                    <option value="Atarjea">Atarjea</option>
                                    <option value="Celaya">Celaya</option>
                                    <option value="Manuel Doblado">Manuel Doblado</option>
                                    <option value="Comonfort">Comonfort</option>
                                    <option value="Coroneo">Coroneo</option>
                                    <option value="Cortazar">Cortazar</option>
                                    <option value="Cueramaro">Cueramaro</option>
                                    <option value="Doctor Mora">Doctor Mora</option>
                                    <option value="Dolores Hidalgo Cuna de la Independencia Nacional">Dolores Hidalgo Cuna de la Independencia Nacional</option>
                                    <option value="Guanajuato">Guanajuato</option>
                                    <option value="Huanimaro">Huanimaro</option>
                                    <option value="Irapuato">Irapuato</option>
                                    <option value="Jaral del Progreso">Jaral del Progreso</option>
                                    <option value="Jerecuaro">Jerecuaro</option>
                                    <option value="Leon">Leon</option>
                                    <option value="Moroleon">Moroleon</option>
                                    <option value="Ocampo">Ocampo</option>
                                    <option value="Penjamo">Penjamo</option>
                                    <option value="Pueblo Nuevo">Pueblo Nuevo</option>
                                    <option value="Purisima del Rincon">Purisima del Rincon</option>
                                    <option value="Romita">Romita</option>
                                    <option value="Salamanca">Salamanca</option>
                                    <option value="Salvatierra">Salvatierra</option>
                                    <option value="San Diego de la Union">San Diego de la Union</option>
                                    <option value="San Felipe">San Felipe</option>
                                    <option value="San Francisco del Rincon">San Francisco del Rincon</option>
                                    <option value="San Jose Iturbide">San Jose Iturbide</option>
                                    <option value="San Luis de la Paz">San Luis de la Paz</option>
                                    <option value="Santa Catarina">Santa Catarina</option>
                                    <option value="Santa Cruz de Juventino Rosas">Santa Cruz de Juventino Rosas</option>
                                    <option value="Santiago Maravatio">Santiago Maravatio</option>
                                    <option value="Silao">Silao</option>
                                    <option value="Tarandacuao">Tarandacuao</option>
                                    <option value="Tarimoro">Tarimoro</option>
                                    <option value="Tierra Blanca">Tierra Blanca</option>
                                    <option value="Uriangato">Uriangato</option>
                                    <option value="Valle de Santiago">Valle de Santiago</option>
                                    <option value="Victoria">Victoria</option>
                                    <option value="Villagran">Villagran</option>
                                    <option value="Xichu">Xichu</option>
                                    <option value="Yuriria">Yuriria</option>
                                  </select>
                                </div>
                                <div class="form-group col-sm-6 col-lg-4"  id="guerrero" style="display: none;" >
                                  {!! Form::label('municipality', 'Municipio:') !!}
                                  <select name="municipality" class="input-lg form-control">
                                    <option value="Acapulco de Juarez">Acapulco de Juarez</option>
                                    <option value="Ahuacuotzingo">Ahuacuotzingo</option>
                                    <option value="Ajuchitlan del Progreso">Ajuchitlan del Progreso</option>
                                    <option value="Alcozauca de Guerrero">Alcozauca de Guerrero</option>
                                    <option value="Alpoyeca">Alpoyeca</option>
                                    <option value="Apaxtla">Apaxtla</option>
                                    <option value="Arcelia">Arcelia</option>
                                    <option value="Atenango del Rio">Atenango del Rio</option>
                                    <option value="Atlamajalcingo del Monte">Atlamajalcingo del Monte</option>
                                    <option value="Atlixtac">Atlixtac</option>
                                    <option value="Atoyac de Alvarez">Atoyac de Alvarez</option>
                                    <option value="Ayutla de los Libres">Ayutla de los Libres</option>
                                    <option value="Azoyu">Azoyu</option>
                                    <option value="Benito Juarez">Benito Juarez</option>
                                    <option value="Buenavista de Cuellar">Buenavista de Cuellar</option>
                                    <option value="Coahuayutla de Jose Maria Izazaga">Coahuayutla de Jose Maria Izazaga</option>
                                    <option value="Cocula">Cocula</option>
                                    <option value="Copala">Copala</option>
                                    <option value="Copalillo">Copalillo</option>
                                    <option value="Copanatoyac">Copanatoyac</option>
                                    <option value="Coyuca de Benitez">Coyuca de Benitez</option>
                                    <option value="Coyuca de Catalan">Coyuca de Catalan</option>
                                    <option value="Cuajinicuilapa">Cuajinicuilapa</option>
                                    <option value="Cualac">Cualac</option>
                                    <option value="Cuautepec">Cuautepec</option>
                                    <option value="Cuetzala del Progreso">Cuetzala del Progreso</option>
                                    <option value="Cutzamala de Pinzon">Cutzamala de Pinzon</option>
                                    <option value="Chilapa de Alvarez">Chilapa de Alvarez</option>
                                    <option value="Chilpancingo de los Bravo">Chilpancingo de los Bravo</option>
                                    <option value="Florencio Villarreal">Florencio Villarreal</option>
                                    <option value="General Canuto A. Neri">General Canuto A. Neri</option>
                                    <option value="General Heliodoro Castillo">General Heliodoro Castillo</option>
                                    <option value="Huamuxtitlan">Huamuxtitlan</option>
                                    <option value="Huitzuco de los Figueroa">Huitzuco de los Figueroa</option>
                                    <option value="Iguala de la Independencia">Iguala de la Independencia</option>
                                    <option value="Igualapa">Igualapa</option>
                                    <option value="Ixcateopan de Cuauhtemoc">Ixcateopan de Cuauhtemoc</option>
                                    <option value="Zihuatanejo de Azueta">Zihuatanejo de Azueta</option>
                                    <option value="Juan R. Escudero">Juan R. Escudero</option>
                                    <option value="Leonardo Bravo">Leonardo Bravo</option>
                                    <option value="Malinaltepec">Malinaltepec</option>
                                    <option value="Martir de Cuilapan">Martir de Cuilapan</option>
                                    <option value="Metlatonoc">Metlatonoc</option>
                                    <option value="Mochitlan">Mochitlan</option>
                                    <option value="Olinala">Olinala</option>
                                    <option value="Ometepec">Ometepec</option>
                                    <option value="Pedro Ascencio Alquisiras">Pedro Ascencio Alquisiras</option>
                                    <option value="Petatlan">Petatlan</option>
                                    <option value="Pilcaya">Pilcaya</option>
                                    <option value="Pungarabato">Pungarabato</option>
                                    <option value="Quechultenango">Quechultenango</option>
                                    <option value="San Luis Acatlan">San Luis Acatlan</option>
                                    <option value="San Marcos">San Marcos</option>
                                    <option value="San Miguel Totolapan">San Miguel Totolapan</option>
                                    <option value="Taxco de Alarcon">Taxco de Alarcon</option>
                                    <option value="Tecoanapa">Tecoanapa</option>
                                    <option value="Tecpan de Galeana">Tecpan de Galeana</option>
                                    <option value="Teloloapan">Teloloapan</option>
                                    <option value="Tepecoacuilco de Trujano">Tepecoacuilco de Trujano</option>
                                    <option value="Tetipac">Tetipac</option>
                                    <option value="Tixtla de Guerrero">Tixtla de Guerrero</option>
                                    <option value="Tlacoachistlahuaca">Tlacoachistlahuaca</option>
                                    <option value="Tlacoapa">Tlacoapa</option>
                                    <option value="Tlalchapa">Tlalchapa</option>
                                    <option value="Tlalixtaquilla de Maldonado">Tlalixtaquilla de Maldonado</option>
                                    <option value="Tlapa de Comonfort">Tlapa de Comonfort</option>
                                    <option value="Tlapehuala">Tlapehuala</option>
                                    <option value="La Union de Isidoro Montes de Oca">La Union de Isidoro Montes de Oca</option>
                                    <option value="Xalpatlahuac">Xalpatlahuac</option>
                                    <option value="Xochihuehuetlan">Xochihuehuetlan</option>
                                    <option value="Xochistlahuaca">Xochistlahuaca</option>
                                    <option value="Zapotitlan Tablas">Zapotitlan Tablas</option>
                                    <option value="Zirandaro">Zirandaro</option>
                                    <option value="Zitlala">Zitlala</option>
                                    <option value="Eduardo Neri">Eduardo Neri</option>
                                    <option value="Acatepec">Acatepec</option>
                                    <option value="Marquelia">Marquelia</option>
                                    <option value="Cochoapa el Grande">Cochoapa el Grande</option>
                                    <option value="Jose Joaquin de Herrera">Jose Joaquin de Herrera</option>
                                    <option value="Juchitan">Juchitan</option>
                                    <option value="Iliatenco">Iliatenco</option>
                                  </select>
                                </div>
                                <div class="form-group col-sm-6 col-lg-4"  id="hidalgo" style="display: none;" >
                                  {!! Form::label('municipality', 'Municipio:') !!}
                                  <select name="municipality" class="input-lg form-control">
                                    <option value="Acatlan">Acatlan</option>
                                    <option value="Acaxochitlan">Acaxochitlan</option>
                                    <option value="Actopan">Actopan</option>
                                    <option value="Agua Blanca de Iturbide">Agua Blanca de Iturbide</option>
                                    <option value="Ajacuba">Ajacuba</option>
                                    <option value="Alfajayucan">Alfajayucan</option>
                                    <option value="Almoloya">Almoloya</option>
                                    <option value="Apan">Apan</option>
                                    <option value="El Arenal">El Arenal</option>
                                    <option value="Atitalaquia">Atitalaquia</option>
                                    <option value="Atlapexco">Atlapexco</option>
                                    <option value="Atotonilco el Grande">Atotonilco el Grande</option>
                                    <option value="Atotonilco de Tula">Atotonilco de Tula</option>
                                    <option value="Calnali">Calnali</option>
                                    <option value="Cardonal">Cardonal</option>
                                    <option value="Cuautepec de Hinojosa">Cuautepec de Hinojosa</option>
                                    <option value="Chapantongo">Chapantongo</option>
                                    <option value="Chapulhuacan">Chapulhuacan</option>
                                    <option value="Chilcuautla">Chilcuautla</option>
                                    <option value="Eloxochitlan">Eloxochitlan</option>
                                    <option value="Emiliano Zapata">Emiliano Zapata</option>
                                    <option value="Epazoyucan">Epazoyucan</option>
                                    <option value="Francisco I. Madero">Francisco I. Madero</option>
                                    <option value="Huasca de Ocampo">Huasca de Ocampo</option>
                                    <option value="Huautla">Huautla</option>
                                    <option value="Huazalingo">Huazalingo</option>
                                    <option value="Huehuetla">Huehuetla</option>
                                    <option value="Huejutla de Reyes">Huejutla de Reyes</option>
                                    <option value="Huichapan">Huichapan</option>
                                    <option value="Ixmiquilpan">Ixmiquilpan</option>
                                    <option value="Jacala de Ledezma">Jacala de Ledezma</option>
                                    <option value="Jaltocan">Jaltocan</option>
                                    <option value="Juarez Hidalgo">Juarez Hidalgo</option>
                                    <option value="Lolotla">Lolotla</option>
                                    <option value="Metepec">Metepec</option>
                                    <option value="San Agustin Metzquititlan">San Agustin Metzquititlan</option>
                                    <option value="Metztitlan">Metztitlan</option>
                                    <option value="Mineral del Chico">Mineral del Chico</option>
                                    <option value="Mineral del Monte">Mineral del Monte</option>
                                    <option value="La Mision">La Mision</option>
                                    <option value="Mixquiahuala de Juarez">Mixquiahuala de Juarez</option>
                                    <option value="Molango de Escamilla">Molango de Escamilla</option>
                                    <option value="Nicolas Flores">Nicolas Flores</option>
                                    <option value="Nopala de Villagran">Nopala de Villagran</option>
                                    <option value="Omitlan de Juarez">Omitlan de Juarez</option>
                                    <option value="San Felipe Orizatlan">San Felipe Orizatlan</option>
                                    <option value="Pacula">Pacula</option>
                                    <option value="Pachuca de Soto">Pachuca de Soto</option>
                                    <option value="Pisaflores">Pisaflores</option>
                                    <option value="Progreso de Obregon">Progreso de Obregon</option>
                                    <option value="Mineral de la Reforma">Mineral de la Reforma</option>
                                    <option value="San Agustin Tlaxiaca">San Agustin Tlaxiaca</option>
                                    <option value="San Bartolo Tutotepec">San Bartolo Tutotepec</option>
                                    <option value="San Salvador">San Salvador</option>
                                    <option value="Santiago de Anaya">Santiago de Anaya</option>
                                    <option value="Santiago Tulantepec de Lugo Guerrero">Santiago Tulantepec de Lugo Guerrero</option>
                                    <option value="Singuilucan">Singuilucan</option>
                                    <option value="Tasquillo">Tasquillo</option>
                                    <option value="Tecozautla">Tecozautla</option>
                                    <option value="Tenango de Doria">Tenango de Doria</option>
                                    <option value="Tepeapulco">Tepeapulco</option>
                                    <option value="Tepehuacan de Guerrero">Tepehuacan de Guerrero</option>
                                    <option value="Tepeji del Rio de Ocampo">Tepeji del Rio de Ocampo</option>
                                    <option value="Tepetitlan">Tepetitlan</option>
                                    <option value="Tetepango">Tetepango</option>
                                    <option value="Villa de Tezontepec">Villa de Tezontepec</option>
                                    <option value="Tezontepec de Aldama">Tezontepec de Aldama</option>
                                    <option value="Tianguistengo">Tianguistengo</option>
                                    <option value="Tizayuca">Tizayuca</option>
                                    <option value="Tlahuelilpan">Tlahuelilpan</option>
                                    <option value="Tlahuiltepa">Tlahuiltepa</option>
                                    <option value="Tlanalapa">Tlanalapa</option>
                                    <option value="Tlanchinol">Tlanchinol</option>
                                    <option value="Tlaxcoapan">Tlaxcoapan</option>
                                    <option value="Tolcayuca">Tolcayuca</option>
                                    <option value="Tula de Allende">Tula de Allende</option>
                                    <option value="Tulancingo de Bravo">Tulancingo de Bravo</option>
                                    <option value="Xochiatipan">Xochiatipan</option>
                                    <option value="Xochicoatlan">Xochicoatlan</option>
                                    <option value="Yahualica">Yahualica</option>
                                    <option value="Zacualtipan de Angeles">Zacualtipan de Angeles</option>
                                    <option value="Zapotlan de Juarez">Zapotlan de Juarez</option>
                                    <option value="Zempoala">Zempoala</option>
                                    <option value="Zimapan">Zimapan</option>
                                  </select>
                                </div>
                                <div class="form-group col-sm-6 col-lg-4"  id="jalisco" style="display: none;" >
                                  {!! Form::label('municipality', 'Municipio:') !!}
                                  <select name="municipality" class="input-lg form-control">
                                    <option value="Acatic">Acatic</option>
                                    <option value="Acatlan de Juarez">Acatlan de Juarez</option>
                                    <option value="Ahualulco de Mercado">Ahualulco de Mercado</option>
                                    <option value="Amacueca">Amacueca</option>
                                    <option value="Amatitan">Amatitan</option>
                                    <option value="Ameca">Ameca</option>
                                    <option value="San Juanito de Escobedo">San Juanito de Escobedo</option>
                                    <option value="Arandas">Arandas</option>
                                    <option value="El Arenal">El Arenal</option>
                                    <option value="Atemajac de Brizuela">Atemajac de Brizuela</option>
                                    <option value="Atengo">Atengo</option>
                                    <option value="Atenguillo">Atenguillo</option>
                                    <option value="Atotonilco el Alto">Atotonilco el Alto</option>
                                    <option value="Atoyac">Atoyac</option>
                                    <option value="Autlan de Navarro">Autlan de Navarro</option>
                                    <option value="Ayotlan">Ayotlan</option>
                                    <option value="Ayutla">Ayutla</option>
                                    <option value="La Barca">La Barca</option>
                                    <option value="Bola">Bola</option>
                                    <option value="Cabo Corrientes">Cabo Corrientes</option>
                                    <option value="Casimiro Castillo">Casimiro Castillo</option>
                                    <option value="Cihuatlan">Cihuatlan</option>
                                    <option value="Zapotlan el Grande">Zapotlan el Grande</option>
                                    <option value="Cocula">Cocula</option>
                                    <option value="Colotlan">Colotlan</option>
                                    <option value="Concepcion de Buenos Aires">Concepcion de Buenos Aires</option>
                                    <option value="Cuautitlan de Garcia Barragan">Cuautitlan de Garcia Barragan</option>
                                    <option value="Cuautla">Cuautla</option>
                                    <option value="Cuquio">Cuquio</option>
                                    <option value="Chapala">Chapala</option>
                                    <option value="Chimaltitan">Chimaltitan</option>
                                    <option value="Chiquilistlan">Chiquilistlan</option>
                                    <option value="Degollado">Degollado</option>
                                    <option value="Ejutla">Ejutla</option>
                                    <option value="Encarnacion de Diaz">Encarnacion de Diaz</option>
                                    <option value="Etzatlan">Etzatlan</option>
                                    <option value="El Grullo">El Grullo</option>
                                    <option value="Guachinango">Guachinango</option>
                                    <option value="Guadalajara">Guadalajara</option>
                                    <option value="Hostotipaquillo">Hostotipaquillo</option>
                                    <option value="Huejucar">Huejucar</option>
                                    <option value="Huejuquilla el Alto">Huejuquilla el Alto</option>
                                    <option value="La Huerta">La Huerta</option>
                                    <option value="Ixtlahuacan de los Membrillos">Ixtlahuacan de los Membrillos</option>
                                    <option value="Ixtlahuacan del Rio">Ixtlahuacan del Rio</option>
                                    <option value="Jalostotitlan">Jalostotitlan</option>
                                    <option value="Jamay">Jamay</option>
                                    <option value="Jesus Maria">Jesus Maria</option>
                                    <option value="Jilotlan de los Dolores">Jilotlan de los Dolores</option>
                                    <option value="Jocotepec">Jocotepec</option>
                                    <option value="Juanacatlan">Juanacatlan</option>
                                    <option value="Juchitlan">Juchitlan</option>
                                    <option value="Lagos de Moreno">Lagos de Moreno</option>
                                    <option value="El Limon">El Limon</option>
                                    <option value="Magdalena">Magdalena</option>
                                    <option value="Santa Maria del Oro">Santa Maria del Oro</option>
                                    <option value="La Manzanilla de la Paz">La Manzanilla de la Paz</option>
                                    <option value="Mascota">Mascota</option>
                                    <option value="Mazamitla">Mazamitla</option>
                                    <option value="Mexticacan">Mexticacan</option>
                                    <option value="Mezquitic">Mezquitic</option>
                                    <option value="Mixtlan">Mixtlan</option>
                                    <option value="Ocotlan">Ocotlan</option>
                                    <option value="Ojuelos de Jalisco">Ojuelos de Jalisco</option>
                                    <option value="Pihuamo">Pihuamo</option>
                                    <option value="Poncitlan">Poncitlan</option>
                                    <option value="Puerto Vallarta">Puerto Vallarta</option>
                                    <option value="Villa Purificacion">Villa Purificacion</option>
                                    <option value="Quitupan">Quitupan</option>
                                    <option value="El Salto">El Salto</option>
                                    <option value="San Cristobal de la Barranca">San Cristobal de la Barranca</option>
                                    <option value="San Diego de Alejandria">San Diego de Alejandria</option>
                                    <option value="San Juan de los Lagos">San Juan de los Lagos</option>
                                    <option value="San Julian">San Julian</option>
                                    <option value="San Marcos">San Marcos</option>
                                    <option value="San Martin de Bola">San Martin de Bola</option>
                                    <option value="San Martin Hidalgo">San Martin Hidalgo</option>
                                    <option value="San Miguel el Alto">San Miguel el Alto</option>
                                    <option value="Gomez Farias">Gomez Farias</option>
                                    <option value="San Sebastian del Oeste">San Sebastian del Oeste</option>
                                    <option value="Santa Maria de los Angeles">Santa Maria de los Angeles</option>
                                    <option value="Sayula">Sayula</option>
                                    <option value="Tala">Tala</option>
                                    <option value="Talpa de Allende">Talpa de Allende</option>
                                    <option value="Tamazula de Gordiano">Tamazula de Gordiano</option>
                                    <option value="Tapalpa">Tapalpa</option>
                                    <option value="Tecalitlan">Tecalitlan</option>
                                    <option value="Tecolotlan">Tecolotlan</option>
                                    <option value="Techaluta de Montenegro">Techaluta de Montenegro</option>
                                    <option value="Tenamaxtlan">Tenamaxtlan</option>
                                    <option value="Teocaltiche">Teocaltiche</option>
                                    <option value="Teocuitatlan de Corona">Teocuitatlan de Corona</option>
                                    <option value="Tepatitlan de Morelos">Tepatitlan de Morelos</option>
                                    <option value="Tequila">Tequila</option>
                                    <option value="Teuchitlan">Teuchitlan</option>
                                    <option value="Tizapan el Alto">Tizapan el Alto</option>
                                    <option value="Tlajomulco de Zu">Tlajomulco de Zu</option>
                                    <option value="San Pedro Tlaquepaque">San Pedro Tlaquepaque</option>
                                    <option value="Toliman">Toliman</option>
                                    <option value="Tomatlan">Tomatlan</option>
                                    <option value="Tonala">Tonala</option>
                                    <option value="Tonaya">Tonaya</option>
                                    <option value="Tonila">Tonila</option>
                                    <option value="Totatiche">Totatiche</option>
                                    <option value="Tototlan">Tototlan</option>
                                    <option value="Tuxcacuesco">Tuxcacuesco</option>
                                    <option value="Tuxcueca">Tuxcueca</option>
                                    <option value="Tuxpan">Tuxpan</option>
                                    <option value="Union de San Antonio">Union de San Antonio</option>
                                    <option value="Union de Tula">Union de Tula</option>
                                    <option value="Valle de Guadalupe">Valle de Guadalupe</option>
                                    <option value="Valle de Juarez">Valle de Juarez</option>
                                    <option value="San Gabriel">San Gabriel</option>
                                    <option value="Villa Corona">Villa Corona</option>
                                    <option value="Villa Guerrero">Villa Guerrero</option>
                                    <option value="Villa Hidalgo">Villa Hidalgo</option>
                                    <option value="Ca">Ca</option>
                                    <option value="Yahualica de Gonzalez Gallo">Yahualica de Gonzalez Gallo</option>
                                    <option value="Zacoalco de Torres">Zacoalco de Torres</option>
                                    <option value="Zapopan">Zapopan</option>
                                    <option value="Zapotiltic">Zapotiltic</option>
                                    <option value="Zapotitlan de Vadillo">Zapotitlan de Vadillo</option>
                                    <option value="Zapotlan del Rey">Zapotlan del Rey</option>
                                    <option value="Zapotlanejo">Zapotlanejo</option>
                                    <option value="San Ignacio Cerro Gordo">San Ignacio Cerro Gordo</option>
                                  </select>
                                </div>
                                <div class="form-group col-sm-6 col-lg-4"  id="mexico" style="display: none;" >
                                  {!! Form::label('municipality', 'Municipio:') !!}
                                  <select name="municipality" class="input-lg form-control">
                                    <option value="Acambay">Acambay</option>
                                    <option value="Acolman">Acolman</option>
                                    <option value="Aculco">Aculco</option>
                                    <option value="Almoloya de Alquisiras">Almoloya de Alquisiras</option>
                                    <option value="Almoloya de Juarez">Almoloya de Juarez</option>
                                    <option value="Almoloya del Rio">Almoloya del Rio</option>
                                    <option value="Amanalco">Amanalco</option>
                                    <option value="Amatepec">Amatepec</option>
                                    <option value="Amecameca">Amecameca</option>
                                    <option value="Apaxco">Apaxco</option>
                                    <option value="Atenco">Atenco</option>
                                    <option value="Atizapan">Atizapan</option>
                                    <option value="Atizapan de Zaragoza">Atizapan de Zaragoza</option>
                                    <option value="Atlacomulco">Atlacomulco</option>
                                    <option value="Atlautla">Atlautla</option>
                                    <option value="Axapusco">Axapusco</option>
                                    <option value="Ayapango">Ayapango</option>
                                    <option value="Calimaya">Calimaya</option>
                                    <option value="Capulhuac">Capulhuac</option>
                                    <option value="Coacalco de Berriozabal">Coacalco de Berriozabal</option>
                                    <option value="Coatepec Harinas">Coatepec Harinas</option>
                                    <option value="Cocotitlan">Cocotitlan</option>
                                    <option value="Coyotepec">Coyotepec</option>
                                    <option value="Cuautitlan">Cuautitlan</option>
                                    <option value="Chalco">Chalco</option>
                                    <option value="Chapa de Mota">Chapa de Mota</option>
                                    <option value="Chapultepec">Chapultepec</option>
                                    <option value="Chiautla">Chiautla</option>
                                    <option value="Chicoloapan">Chicoloapan</option>
                                    <option value="Chiconcuac">Chiconcuac</option>
                                    <option value="Chimalhuacan">Chimalhuacan</option>
                                    <option value="Donato Guerra">Donato Guerra</option>
                                    <option value="Ecatepec de Morelos">Ecatepec de Morelos</option>
                                    <option value="Ecatzingo">Ecatzingo</option>
                                    <option value="Huehuetoca">Huehuetoca</option>
                                    <option value="Hueypoxtla">Hueypoxtla</option>
                                    <option value="Huixquilucan">Huixquilucan</option>
                                    <option value="Isidro Fabela">Isidro Fabela</option>
                                    <option value="Ixtapaluca">Ixtapaluca</option>
                                    <option value="Ixtapan de la Sal">Ixtapan de la Sal</option>
                                    <option value="Ixtapan del Oro">Ixtapan del Oro</option>
                                    <option value="Ixtlahuaca">Ixtlahuaca</option>
                                    <option value="Xalatlaco">Xalatlaco</option>
                                    <option value="Jaltenco">Jaltenco</option>
                                    <option value="Jilotepec">Jilotepec</option>
                                    <option value="Jilotzingo">Jilotzingo</option>
                                    <option value="Jiquipilco">Jiquipilco</option>
                                    <option value="Jocotitlan">Jocotitlan</option>
                                    <option value="Joquicingo">Joquicingo</option>
                                    <option value="Juchitepec">Juchitepec</option>
                                    <option value="Lerma">Lerma</option>
                                    <option value="Malinalco">Malinalco</option>
                                    <option value="Melchor Ocampo">Melchor Ocampo</option>
                                    <option value="Metepec">Metepec</option>
                                    <option value="Mexicaltzingo">Mexicaltzingo</option>
                                    <option value="Morelos">Morelos</option>
                                    <option value="Naucalpan de Juarez">Naucalpan de Juarez</option>
                                    <option value="Nezahualcoyotl">Nezahualcoyotl</option>
                                    <option value="Nextlalpan">Nextlalpan</option>
                                    <option value="Nicolas Romero">Nicolas Romero</option>
                                    <option value="Nopaltepec">Nopaltepec</option>
                                    <option value="Ocoyoacac">Ocoyoacac</option>
                                    <option value="Ocuilan">Ocuilan</option>
                                    <option value="El Oro">El Oro</option>
                                    <option value="Otumba">Otumba</option>
                                    <option value="Otzoloapan">Otzoloapan</option>
                                    <option value="Otzolotepec">Otzolotepec</option>
                                    <option value="Ozumba">Ozumba</option>
                                    <option value="Papalotla">Papalotla</option>
                                    <option value="La Paz">La Paz</option>
                                    <option value="Polotitlan">Polotitlan</option>
                                    <option value="Rayon">Rayon</option>
                                    <option value="San Antonio la Isla">San Antonio la Isla</option>
                                    <option value="San Felipe del Progreso">San Felipe del Progreso</option>
                                    <option value="San Martin de las Piramides">San Martin de las Piramides</option>
                                    <option value="San Mateo Atenco">San Mateo Atenco</option>
                                    <option value="San Simon de Guerrero">San Simon de Guerrero</option>
                                    <option value="Santo Tomas">Santo Tomas</option>
                                    <option value="Soyaniquilpan de Juarez">Soyaniquilpan de Juarez</option>
                                    <option value="Sultepec">Sultepec</option>
                                    <option value="Tecamac">Tecamac</option>
                                    <option value="Tejupilco">Tejupilco</option>
                                    <option value="Temamatla">Temamatla</option>
                                    <option value="Temascalapa">Temascalapa</option>
                                    <option value="Temascalcingo">Temascalcingo</option>
                                    <option value="Temascaltepec">Temascaltepec</option>
                                    <option value="Temoaya">Temoaya</option>
                                    <option value="Tenancingo">Tenancingo</option>
                                    <option value="Tenango del Aire">Tenango del Aire</option>
                                    <option value="Tenango del Valle">Tenango del Valle</option>
                                    <option value="Teoloyucan">Teoloyucan</option>
                                    <option value="Teotihuacan">Teotihuacan</option>
                                    <option value="Tepetlaoxtoc">Tepetlaoxtoc</option>
                                    <option value="Tepetlixpa">Tepetlixpa</option>
                                    <option value="Tepotzotlan">Tepotzotlan</option>
                                    <option value="Tequixquiac">Tequixquiac</option>
                                    <option value="Texcaltitlan">Texcaltitlan</option>
                                    <option value="Texcalyacac">Texcalyacac</option>
                                    <option value="Texcoco">Texcoco</option>
                                    <option value="Tezoyuca">Tezoyuca</option>
                                    <option value="Tianguistenco">Tianguistenco</option>
                                    <option value="Timilpan">Timilpan</option>
                                    <option value="Tlalmanalco">Tlalmanalco</option>
                                    <option value="Tlalnepantla de Baz">Tlalnepantla de Baz</option>
                                    <option value="Tlatlaya">Tlatlaya</option>
                                    <option value="Toluca">Toluca</option>
                                    <option value="Tonatico">Tonatico</option>
                                    <option value="Tultepec">Tultepec</option>
                                    <option value="Tultitlan">Tultitlan</option>
                                    <option value="Valle de Bravo">Valle de Bravo</option>
                                    <option value="Villa de Allende">Villa de Allende</option>
                                    <option value="Villa del Carbon">Villa del Carbon</option>
                                    <option value="Villa Guerrero">Villa Guerrero</option>
                                    <option value="Villa Victoria">Villa Victoria</option>
                                    <option value="Xonacatlan">Xonacatlan</option>
                                    <option value="Zacazonapan">Zacazonapan</option>
                                    <option value="Zacualpan">Zacualpan</option>
                                    <option value="Zinacantepec">Zinacantepec</option>
                                    <option value="Zumpahuacan">Zumpahuacan</option>
                                    <option value="Zumpango">Zumpango</option>
                                    <option value="Cuautitlan Izcalli">Cuautitlan Izcalli</option>
                                    <option value="Valle de Chalco Solidaridad">Valle de Chalco Solidaridad</option>
                                    <option value="Luvianos">Luvianos</option>
                                    <option value="San Jose del Rincon">San Jose del Rincon</option>
                                    <option value="Tonanitla">Tonanitla</option>
                                  </select>
                                </div>
                                <div class="form-group col-sm-6 col-lg-4"  id="michoacan" style="display: none;" >
                                  {!! Form::label('municipality', 'Municipio:') !!}
                                  <select name="municipality" class="input-lg form-control">
                                    <option value="Acuitzio">Acuitzio</option>
                                    <option value="Aguililla">Aguililla</option>
                                    <option value="Alvaro Obregon">Alvaro Obregon</option>
                                    <option value="Angamacutiro">Angamacutiro</option>
                                    <option value="Angangueo">Angangueo</option>
                                    <option value="Apatzingan">Apatzingan</option>
                                    <option value="Aporo">Aporo</option>
                                    <option value="Aquila">Aquila</option>
                                    <option value="Ario">Ario</option>
                                    <option value="Arteaga">Arteaga</option>
                                    <option value="Brise">Brise</option>
                                    <option value="Buenavista">Buenavista</option>
                                    <option value="Caracuaro">Caracuaro</option>
                                    <option value="Coahuayana">Coahuayana</option>
                                    <option value="Coalcoman de Vazquez Pallares">Coalcoman de Vazquez Pallares</option>
                                    <option value="Coeneo">Coeneo</option>
                                    <option value="Contepec">Contepec</option>
                                    <option value="Copandaro">Copandaro</option>
                                    <option value="Cotija">Cotija</option>
                                    <option value="Cuitzeo">Cuitzeo</option>
                                    <option value="Charapan">Charapan</option>
                                    <option value="Charo">Charo</option>
                                    <option value="Chavinda">Chavinda</option>
                                    <option value="Cheran">Cheran</option>
                                    <option value="Chilchota">Chilchota</option>
                                    <option value="Chinicuila">Chinicuila</option>
                                    <option value="Chucandiro">Chucandiro</option>
                                    <option value="Churintzio">Churintzio</option>
                                    <option value="Churumuco">Churumuco</option>
                                    <option value="Ecuandureo">Ecuandureo</option>
                                    <option value="Epitacio Huerta">Epitacio Huerta</option>
                                    <option value="Erongaricuaro">Erongaricuaro</option>
                                    <option value="Gabriel Zamora">Gabriel Zamora</option>
                                    <option value="Hidalgo">Hidalgo</option>
                                    <option value="La Huacana">La Huacana</option>
                                    <option value="Huandacareo">Huandacareo</option>
                                    <option value="Huaniqueo">Huaniqueo</option>
                                    <option value="Huetamo">Huetamo</option>
                                    <option value="Huiramba">Huiramba</option>
                                    <option value="Indaparapeo">Indaparapeo</option>
                                    <option value="Irimbo">Irimbo</option>
                                    <option value="Ixtlan">Ixtlan</option>
                                    <option value="Jacona">Jacona</option>
                                    <option value="Jimenez">Jimenez</option>
                                    <option value="Jiquilpan">Jiquilpan</option>
                                    <option value="Juarez">Juarez</option>
                                    <option value="Jungapeo">Jungapeo</option>
                                    <option value="Lagunillas">Lagunillas</option>
                                    <option value="Madero">Madero</option>
                                    <option value="Maravatio">Maravatio</option>
                                    <option value="Marcos Castellanos">Marcos Castellanos</option>
                                    <option value="Lazaro Cardenas">Lazaro Cardenas</option>
                                    <option value="Morelia">Morelia</option>
                                    <option value="Morelos">Morelos</option>
                                    <option value="Mugica">Mugica</option>
                                    <option value="Nahuatzen">Nahuatzen</option>
                                    <option value="Nocupetaro">Nocupetaro</option>
                                    <option value="Nuevo Parangaricutiro">Nuevo Parangaricutiro</option>
                                    <option value="Nuevo Urecho">Nuevo Urecho</option>
                                    <option value="Numaran">Numaran</option>
                                    <option value="Ocampo">Ocampo</option>
                                    <option value="Pajacuaran">Pajacuaran</option>
                                    <option value="Panindicuaro">Panindicuaro</option>
                                    <option value="Paracuaro">Paracuaro</option>
                                    <option value="Paracho">Paracho</option>
                                    <option value="Patzcuaro">Patzcuaro</option>
                                    <option value="Penjamillo">Penjamillo</option>
                                    <option value="Periban">Periban</option>
                                    <option value="La Piedad">La Piedad</option>
                                    <option value="Purepero">Purepero</option>
                                    <option value="Puruandiro">Puruandiro</option>
                                    <option value="Querendaro">Querendaro</option>
                                    <option value="Quiroga">Quiroga</option>
                                    <option value="Cojumatlan de Regules">Cojumatlan de Regules</option>
                                    <option value="Los Reyes">Los Reyes</option>
                                    <option value="Sahuayo">Sahuayo</option>
                                    <option value="San Lucas">San Lucas</option>
                                    <option value="Santa Ana Maya">Santa Ana Maya</option>
                                    <option value="Salvador Escalante">Salvador Escalante</option>
                                    <option value="Senguio">Senguio</option>
                                    <option value="Susupuato">Susupuato</option>
                                    <option value="Tacambaro">Tacambaro</option>
                                    <option value="Tancitaro">Tancitaro</option>
                                    <option value="Tangamandapio">Tangamandapio</option>
                                    <option value="Tangancicuaro">Tangancicuaro</option>
                                    <option value="Tanhuato">Tanhuato</option>
                                    <option value="Taretan">Taretan</option>
                                    <option value="Tarimbaro">Tarimbaro</option>
                                    <option value="Tepalcatepec">Tepalcatepec</option>
                                    <option value="Tingambato">Tingambato</option>
                                    <option value="Ting">Ting</option>
                                    <option value="Tiquicheo de Nicolas Romero">Tiquicheo de Nicolas Romero</option>
                                    <option value="Tlalpujahua">Tlalpujahua</option>
                                    <option value="Tlazazalca">Tlazazalca</option>
                                    <option value="Tocumbo">Tocumbo</option>
                                    <option value="Tumbiscatio">Tumbiscatio</option>
                                    <option value="Turicato">Turicato</option>
                                    <option value="Tuxpan">Tuxpan</option>
                                    <option value="Tuzantla">Tuzantla</option>
                                    <option value="Tzintzuntzan">Tzintzuntzan</option>
                                    <option value="Tzitzio">Tzitzio</option>
                                    <option value="Uruapan">Uruapan</option>
                                    <option value="Venustiano Carranza">Venustiano Carranza</option>
                                    <option value="Villamar">Villamar</option>
                                    <option value="Vista Hermosa">Vista Hermosa</option>
                                    <option value="Yurecuaro">Yurecuaro</option>
                                    <option value="Zacapu">Zacapu</option>
                                    <option value="Zamora">Zamora</option>
                                    <option value="Zinaparo">Zinaparo</option>
                                    <option value="Zinapecuaro">Zinapecuaro</option>
                                    <option value="Ziracuaretiro">Ziracuaretiro</option>
                                    <option value="Zitacuaro">Zitacuaro</option>
                                    <option value="Jose Sixto Verduzco">Jose Sixto Verduzco</option>
                                  </select>
                                </div>
                                <div class="form-group col-sm-6 col-lg-4"  id="morelos" style="display: none;" >
                                  {!! Form::label('municipality', 'Municipio:') !!}
                                  <select name="municipality" class="input-lg form-control">
                                    <option value="Amacuzac">Amacuzac</option>
                                    <option value="Atlatlahucan">Atlatlahucan</option>
                                    <option value="Axochiapan">Axochiapan</option>
                                    <option value="Ayala">Ayala</option>
                                    <option value="Coatlan del Rio">Coatlan del Rio</option>
                                    <option value="Cuautla">Cuautla</option>
                                    <option value="Cuernavaca">Cuernavaca</option>
                                    <option value="Emiliano Zapata">Emiliano Zapata</option>
                                    <option value="Huitzilac">Huitzilac</option>
                                    <option value="Jantetelco">Jantetelco</option>
                                    <option value="Jiutepec">Jiutepec</option>
                                    <option value="Jojutla">Jojutla</option>
                                    <option value="Jonacatepec">Jonacatepec</option>
                                    <option value="Mazatepec">Mazatepec</option>
                                    <option value="Miacatlan">Miacatlan</option>
                                    <option value="Ocuituco">Ocuituco</option>
                                    <option value="Puente de Ixtla">Puente de Ixtla</option>
                                    <option value="Temixco">Temixco</option>
                                    <option value="Tepalcingo">Tepalcingo</option>
                                    <option value="Tepoztlan">Tepoztlan</option>
                                    <option value="Tetecala">Tetecala</option>
                                    <option value="Tetela del Volcan">Tetela del Volcan</option>
                                    <option value="Tlalnepantla">Tlalnepantla</option>
                                    <option value="Tlaltizapan de Zapata">Tlaltizapan de Zapata</option>
                                    <option value="Tlaquiltenango">Tlaquiltenango</option>
                                    <option value="Tlayacapan">Tlayacapan</option>
                                    <option value="Totolapan">Totolapan</option>
                                    <option value="Xochitepec">Xochitepec</option>
                                    <option value="Yautepec">Yautepec</option>
                                    <option value="Yecapixtla">Yecapixtla</option>
                                    <option value="Zacatepec">Zacatepec</option>
                                    <option value="Zacualpan">Zacualpan</option>
                                    <option value="Temoac">Temoac</option>
                                  </select>
                                </div>
                                <div class="form-group col-sm-6 col-lg-4"  id="nayarit" style="display: none;" >
                                  {!! Form::label('municipality', 'Municipio:') !!}
                                  <select name="municipality" class="input-lg form-control">
                                    <option value="Acaponeta">Acaponeta</option>
                                    <option value="Ahuacatlan">Ahuacatlan</option>
                                    <option value="Amatlan de Ca">Amatlan de Ca</option>
                                    <option value="Compostela">Compostela</option>
                                    <option value="Huajicori">Huajicori</option>
                                    <option value="Ixtlan del Rio">Ixtlan del Rio</option>
                                    <option value="Jala">Jala</option>
                                    <option value="Xalisco">Xalisco</option>
                                    <option value="Del Nayar">Del Nayar</option>
                                    <option value="Rosamorada">Rosamorada</option>
                                    <option value="Ruiz">Ruiz</option>
                                    <option value="San Blas">San Blas</option>
                                    <option value="San Pedro Lagunillas">San Pedro Lagunillas</option>
                                    <option value="Santa Maria del Oro">Santa Maria del Oro</option>
                                    <option value="Santiago Ixcuintla">Santiago Ixcuintla</option>
                                    <option value="Tecuala">Tecuala</option>
                                    <option value="Tepic">Tepic</option>
                                    <option value="Tuxpan">Tuxpan</option>
                                    <option value="La Yesca">La Yesca</option>
                                    <option value="Bahia de Banderas">Bahia de Banderas</option>
                                  </select>
                                </div>
                                <div class="form-group col-sm-6 col-lg-4"  id="nuevoleon" style="display: none;" >
                                  {!! Form::label('municipality', 'Municipio:') !!}
                                  <select name="municipality" class="input-lg form-control">
                                    <option value="Abasolo">Abasolo</option>
                                    <option value="Agualeguas">Agualeguas</option>
                                    <option value="Los Aldamas">Los Aldamas</option>
                                    <option value="Allende">Allende</option>
                                    <option value="Anahuac">Anahuac</option>
                                    <option value="Apodaca">Apodaca</option>
                                    <option value="Aramberri">Aramberri</option>
                                    <option value="Bustamante">Bustamante</option>
                                    <option value="Cadereyta Jimenez">Cadereyta Jimenez</option>
                                    <option value="Carmen">Carmen</option>
                                    <option value="Cerralvo">Cerralvo</option>
                                    <option value="Cienega de Flores">Cienega de Flores</option>
                                    <option value="China">China</option>
                                    <option value="Dr. Arroyo">Dr. Arroyo</option>
                                    <option value="Dr. Coss">Dr. Coss</option>
                                    <option value="Dr. Gonzalez">Dr. Gonzalez</option>
                                    <option value="Galeana">Galeana</option>
                                    <option value="Garcia">Garcia</option>
                                    <option value="San Pedro Garza Garcia">San Pedro Garza Garcia</option>
                                    <option value="Gral. Bravo">Gral. Bravo</option>
                                    <option value="Gral. Escobedo">Gral. Escobedo</option>
                                    <option value="Gral. Teran">Gral. Teran</option>
                                    <option value="Gral. Trevi">Gral. Trevi</option>
                                    <option value="Gral. Zaragoza">Gral. Zaragoza</option>
                                    <option value="Gral. Zuazua">Gral. Zuazua</option>
                                    <option value="Guadalupe">Guadalupe</option>
                                    <option value="Los Herreras">Los Herreras</option>
                                    <option value="Higueras">Higueras</option>
                                    <option value="Hualahuises">Hualahuises</option>
                                    <option value="Iturbide">Iturbide</option>
                                    <option value="Juarez">Juarez</option>
                                    <option value="Lampazos de Naranjo">Lampazos de Naranjo</option>
                                    <option value="Linares">Linares</option>
                                    <option value="Marin">Marin</option>
                                    <option value="Melchor Ocampo">Melchor Ocampo</option>
                                    <option value="Mier y Noriega">Mier y Noriega</option>
                                    <option value="Mina">Mina</option>
                                    <option value="Montemorelos">Montemorelos</option>
                                    <option value="Monterrey">Monterrey</option>
                                    <option value="Paras">Paras</option>
                                    <option value="Pesqueria">Pesqueria</option>
                                    <option value="Los Ramones">Los Ramones</option>
                                    <option value="Rayones">Rayones</option>
                                    <option value="Sabinas Hidalgo">Sabinas Hidalgo</option>
                                    <option value="Salinas Victoria">Salinas Victoria</option>
                                    <option value="San Nicolas de los Garza">San Nicolas de los Garza</option>
                                    <option value="Hidalgo">Hidalgo</option>
                                    <option value="Santa Catarina">Santa Catarina</option>
                                    <option value="Santiago">Santiago</option>
                                    <option value="Vallecillo">Vallecillo</option>
                                    <option value="Villaldama">Villaldama</option>
                                  </select>
                                </div>
                                <div class="form-group col-sm-6 col-lg-4"  id="oaxaca" style="display: none;" >
                                  {!! Form::label('municipality', 'Municipio:') !!}
                                  <select name="municipality" class="input-lg form-control">
                                    <option value="Abejones">Abejones</option>
                                    <option value="Acatlan de Perez Figueroa">Acatlan de Perez Figueroa</option>
                                    <option value="Asuncion Cacalotepec">Asuncion Cacalotepec</option>
                                    <option value="Asuncion Cuyotepeji">Asuncion Cuyotepeji</option>
                                    <option value="Asuncion Ixtaltepec">Asuncion Ixtaltepec</option>
                                    <option value="Asuncion Nochixtlan">Asuncion Nochixtlan</option>
                                    <option value="Asuncion Ocotlan">Asuncion Ocotlan</option>
                                    <option value="Asuncion Tlacolulita">Asuncion Tlacolulita</option>
                                    <option value="Ayotzintepec">Ayotzintepec</option>
                                    <option value="El Barrio de la Soledad">El Barrio de la Soledad</option>
                                    <option value="Calihuala">Calihuala</option>
                                    <option value="Candelaria Loxicha">Candelaria Loxicha</option>
                                    <option value="Cienega de Zimatlan">Cienega de Zimatlan</option>
                                    <option value="Ciudad Ixtepec">Ciudad Ixtepec</option>
                                    <option value="Coatecas Altas">Coatecas Altas</option>
                                    <option value="Coicoyan de las Flores">Coicoyan de las Flores</option>
                                    <option value="La Compa">La Compa</option>
                                    <option value="Concepcion Buenavista">Concepcion Buenavista</option>
                                    <option value="Concepcion Papalo">Concepcion Papalo</option>
                                    <option value="Constancia del Rosario">Constancia del Rosario</option>
                                    <option value="Cosolapa">Cosolapa</option>
                                    <option value="Cosoltepec">Cosoltepec</option>
                                    <option value="Cuilapam de Guerrero">Cuilapam de Guerrero</option>
                                    <option value="Cuyamecalco Villa de Zaragoza">Cuyamecalco Villa de Zaragoza</option>
                                    <option value="Chahuites">Chahuites</option>
                                    <option value="Chalcatongo de Hidalgo">Chalcatongo de Hidalgo</option>
                                    <option value="Chiquihuitlan de Benito Juarez">Chiquihuitlan de Benito Juarez</option>
                                    <option value="Heroica Ciudad de Ejutla de Crespo">Heroica Ciudad de Ejutla de Crespo</option>
                                    <option value="Eloxochitlan de Flores Magon">Eloxochitlan de Flores Magon</option>
                                    <option value="El Espinal">El Espinal</option>
                                    <option value="Tamazulapam del Espiritu Santo">Tamazulapam del Espiritu Santo</option>
                                    <option value="Fresnillo de Trujano">Fresnillo de Trujano</option>
                                    <option value="Guadalupe Etla">Guadalupe Etla</option>
                                    <option value="Guadalupe de Ramirez">Guadalupe de Ramirez</option>
                                    <option value="Guelatao de Juarez">Guelatao de Juarez</option>
                                    <option value="Guevea de Humboldt">Guevea de Humboldt</option>
                                    <option value="Mesones Hidalgo">Mesones Hidalgo</option>
                                    <option value="Villa Hidalgo">Villa Hidalgo</option>
                                    <option value="Heroica Ciudad de Huajuapan de Leon">Heroica Ciudad de Huajuapan de Leon</option>
                                    <option value="Huautepec">Huautepec</option>
                                    <option value="Huautla de Jimenez">Huautla de Jimenez</option>
                                    <option value="Ixtlan de Juarez">Ixtlan de Juarez</option>
                                    <option value="Heroica Ciudad de Juchitan de Zaragoza">Heroica Ciudad de Juchitan de Zaragoza</option>
                                    <option value="Loma Bonita">Loma Bonita</option>
                                    <option value="Magdalena Apasco">Magdalena Apasco</option>
                                    <option value="Magdalena Jaltepec">Magdalena Jaltepec</option>
                                    <option value="Santa Magdalena Jicotlan">Santa Magdalena Jicotlan</option>
                                    <option value="Magdalena Mixtepec">Magdalena Mixtepec</option>
                                    <option value="Magdalena Ocotlan">Magdalena Ocotlan</option>
                                    <option value="Magdalena Pe">Magdalena Pe</option>
                                    <option value="Magdalena Teitipac">Magdalena Teitipac</option>
                                    <option value="Magdalena Tequisistlan">Magdalena Tequisistlan</option>
                                    <option value="Magdalena Tlacotepec">Magdalena Tlacotepec</option>
                                    <option value="Magdalena Zahuatlan">Magdalena Zahuatlan</option>
                                    <option value="Mariscala de Juarez">Mariscala de Juarez</option>
                                    <option value="Martires de Tacubaya">Martires de Tacubaya</option>
                                    <option value="Matias Romero Avenda">Matias Romero Avenda</option>
                                    <option value="Mazatlan Villa de Flores">Mazatlan Villa de Flores</option>
                                    <option value="Miahuatlan de Porfirio Diaz">Miahuatlan de Porfirio Diaz</option>
                                    <option value="Mixistlan de la Reforma">Mixistlan de la Reforma</option>
                                    <option value="Monjas">Monjas</option>
                                    <option value="Natividad">Natividad</option>
                                    <option value="Nazareno Etla">Nazareno Etla</option>
                                    <option value="Nejapa de Madero">Nejapa de Madero</option>
                                    <option value="Ixpantepec Nieves">Ixpantepec Nieves</option>
                                    <option value="Santiago Niltepec">Santiago Niltepec</option>
                                    <option value="Oaxaca de Juarez">Oaxaca de Juarez</option>
                                    <option value="Ocotlan de Morelos">Ocotlan de Morelos</option>
                                    <option value="La Pe">La Pe</option>
                                    <option value="Pinotepa de Don Luis">Pinotepa de Don Luis</option>
                                    <option value="Pluma Hidalgo">Pluma Hidalgo</option>
                                    <option value="San Jose del Progreso">San Jose del Progreso</option>
                                    <option value="Putla Villa de Guerrero">Putla Villa de Guerrero</option>
                                    <option value="Santa Catarina Quioquitani">Santa Catarina Quioquitani</option>
                                    <option value="Reforma de Pineda">Reforma de Pineda</option>
                                    <option value="La Reforma">La Reforma</option>
                                    <option value="Reyes Etla">Reyes Etla</option>
                                    <option value="Rojas de Cuauhtemoc">Rojas de Cuauhtemoc</option>
                                    <option value="Salina Cruz">Salina Cruz</option>
                                    <option value="San Agustin Amatengo">San Agustin Amatengo</option>
                                    <option value="San Agustin Atenango">San Agustin Atenango</option>
                                    <option value="San Agustin Chayuco">San Agustin Chayuco</option>
                                    <option value="San Agustin de las Juntas">San Agustin de las Juntas</option>
                                    <option value="San Agustin Etla">San Agustin Etla</option>
                                    <option value="San Agustin Loxicha">San Agustin Loxicha</option>
                                    <option value="San Agustin Tlacotepec">San Agustin Tlacotepec</option>
                                    <option value="San Agustin Yatareni">San Agustin Yatareni</option>
                                    <option value="San Andres Cabecera Nueva">San Andres Cabecera Nueva</option>
                                    <option value="San Andres Dinicuiti">San Andres Dinicuiti</option>
                                    <option value="San Andres Huaxpaltepec">San Andres Huaxpaltepec</option>
                                    <option value="San Andres Huayapam">San Andres Huayapam</option>
                                    <option value="San Andres Ixtlahuaca">San Andres Ixtlahuaca</option>
                                    <option value="San Andres Lagunas">San Andres Lagunas</option>
                                    <option value="San Andres Nuxi">San Andres Nuxi</option>
                                    <option value="San Andres Paxtlan">San Andres Paxtlan</option>
                                    <option value="San Andres Sinaxtla">San Andres Sinaxtla</option>
                                    <option value="San Andres Solaga">San Andres Solaga</option>
                                    <option value="San Andres Teotilalpam">San Andres Teotilalpam</option>
                                    <option value="San Andres Tepetlapa">San Andres Tepetlapa</option>
                                    <option value="San Andres Yaa">San Andres Yaa</option>
                                    <option value="San Andres Zabache">San Andres Zabache</option>
                                    <option value="San Andres Zautla">San Andres Zautla</option>
                                    <option value="San Antonino Castillo Velasco">San Antonino Castillo Velasco</option>
                                    <option value="San Antonino el Alto">San Antonino el Alto</option>
                                    <option value="San Antonino Monte Verde">San Antonino Monte Verde</option>
                                    <option value="San Antonio Acutla">San Antonio Acutla</option>
                                    <option value="San Antonio de la Cal">San Antonio de la Cal</option>
                                    <option value="San Antonio Huitepec">San Antonio Huitepec</option>
                                    <option value="San Antonio Nanahuatipam">San Antonio Nanahuatipam</option>
                                    <option value="San Antonio Sinicahua">San Antonio Sinicahua</option>
                                    <option value="San Antonio Tepetlapa">San Antonio Tepetlapa</option>
                                    <option value="San Baltazar Chichicapam">San Baltazar Chichicapam</option>
                                    <option value="San Baltazar Loxicha">San Baltazar Loxicha</option>
                                    <option value="San Baltazar Yatzachi el Bajo">San Baltazar Yatzachi el Bajo</option>
                                    <option value="San Bartolo Coyotepec">San Bartolo Coyotepec</option>
                                    <option value="San Bartolome Ayautla">San Bartolome Ayautla</option>
                                    <option value="San Bartolome Loxicha">San Bartolome Loxicha</option>
                                    <option value="San Bartolome Quialana">San Bartolome Quialana</option>
                                    <option value="San Bartolome Yucua">San Bartolome Yucua</option>
                                    <option value="San Bartolome Zoogocho">San Bartolome Zoogocho</option>
                                    <option value="San Bartolo Soyaltepec">San Bartolo Soyaltepec</option>
                                    <option value="San Bartolo Yautepec">San Bartolo Yautepec</option>
                                    <option value="San Bernardo Mixtepec">San Bernardo Mixtepec</option>
                                    <option value="San Blas Atempa">San Blas Atempa</option>
                                    <option value="San Carlos Yautepec">San Carlos Yautepec</option>
                                    <option value="San Cristobal Amatlan">San Cristobal Amatlan</option>
                                    <option value="San Cristobal Amoltepec">San Cristobal Amoltepec</option>
                                    <option value="San Cristobal Lachirioag">San Cristobal Lachirioag</option>
                                    <option value="San Cristobal Suchixtlahuaca">San Cristobal Suchixtlahuaca</option>
                                    <option value="San Dionisio del Mar">San Dionisio del Mar</option>
                                    <option value="San Dionisio Ocotepec">San Dionisio Ocotepec</option>
                                    <option value="San Dionisio Ocotlan">San Dionisio Ocotlan</option>
                                    <option value="San Esteban Atatlahuca">San Esteban Atatlahuca</option>
                                    <option value="San Felipe Jalapa de Diaz">San Felipe Jalapa de Diaz</option>
                                    <option value="San Felipe Tejalapam">San Felipe Tejalapam</option>
                                    <option value="San Felipe Usila">San Felipe Usila</option>
                                    <option value="San Francisco Cahuacua">San Francisco Cahuacua</option>
                                    <option value="San Francisco Cajonos">San Francisco Cajonos</option>
                                    <option value="San Francisco Chapulapa">San Francisco Chapulapa</option>
                                    <option value="San Francisco Chindua">San Francisco Chindua</option>
                                    <option value="San Francisco del Mar">San Francisco del Mar</option>
                                    <option value="San Francisco Huehuetlan">San Francisco Huehuetlan</option>
                                    <option value="San Francisco Ixhuatan">San Francisco Ixhuatan</option>
                                    <option value="San Francisco Jaltepetongo">San Francisco Jaltepetongo</option>
                                    <option value="San Francisco Lachigolo">San Francisco Lachigolo</option>
                                    <option value="San Francisco Logueche">San Francisco Logueche</option>
                                    <option value="San Francisco Nuxa">San Francisco Nuxa</option>
                                    <option value="San Francisco Ozolotepec">San Francisco Ozolotepec</option>
                                    <option value="San Francisco Sola">San Francisco Sola</option>
                                    <option value="San Francisco Telixtlahuaca">San Francisco Telixtlahuaca</option>
                                    <option value="San Francisco Teopan">San Francisco Teopan</option>
                                    <option value="San Francisco Tlapancingo">San Francisco Tlapancingo</option>
                                    <option value="San Gabriel Mixtepec">San Gabriel Mixtepec</option>
                                    <option value="San Ildefonso Amatlan">San Ildefonso Amatlan</option>
                                    <option value="San Ildefonso Sola">San Ildefonso Sola</option>
                                    <option value="San Ildefonso Villa Alta">San Ildefonso Villa Alta</option>
                                    <option value="San Jacinto Amilpas">San Jacinto Amilpas</option>
                                    <option value="San Jacinto Tlacotepec">San Jacinto Tlacotepec</option>
                                    <option value="San Jeronimo Coatlan">San Jeronimo Coatlan</option>
                                    <option value="San Jeronimo Silacayoapilla">San Jeronimo Silacayoapilla</option>
                                    <option value="San Jeronimo Sosola">San Jeronimo Sosola</option>
                                    <option value="San Jeronimo Taviche">San Jeronimo Taviche</option>
                                    <option value="San Jeronimo Tecoatl">San Jeronimo Tecoatl</option>
                                    <option value="San Jorge Nuchita">San Jorge Nuchita</option>
                                    <option value="San Jose Ayuquila">San Jose Ayuquila</option>
                                    <option value="San Jose Chiltepec">San Jose Chiltepec</option>
                                    <option value="San Jose del Pe">San Jose del Pe</option>
                                    <option value="San Jose Estancia Grande">San Jose Estancia Grande</option>
                                    <option value="San Jose Independencia">San Jose Independencia</option>
                                    <option value="San Jose Lachiguiri">San Jose Lachiguiri</option>
                                    <option value="San Jose Tenango">San Jose Tenango</option>
                                    <option value="San Juan Achiutla">San Juan Achiutla</option>
                                    <option value="San Juan Atepec">San Juan Atepec</option>
                                    <option value="Animas Trujano">Animas Trujano</option>
                                    <option value="San Juan Bautista Atatlahuca">San Juan Bautista Atatlahuca</option>
                                    <option value="San Juan Bautista Coixtlahuaca">San Juan Bautista Coixtlahuaca</option>
                                    <option value="San Juan Bautista Cuicatlan">San Juan Bautista Cuicatlan</option>
                                    <option value="San Juan Bautista Guelache">San Juan Bautista Guelache</option>
                                    <option value="San Juan Bautista Jayacatlan">San Juan Bautista Jayacatlan</option>
                                    <option value="San Juan Bautista Lo de Soto">San Juan Bautista Lo de Soto</option>
                                    <option value="San Juan Bautista Suchitepec">San Juan Bautista Suchitepec</option>
                                    <option value="San Juan Bautista Tlacoatzintepec">San Juan Bautista Tlacoatzintepec</option>
                                    <option value="San Juan Bautista Tlachichilco">San Juan Bautista Tlachichilco</option>
                                    <option value="San Juan Bautista Tuxtepec">San Juan Bautista Tuxtepec</option>
                                    <option value="San Juan Cacahuatepec">San Juan Cacahuatepec</option>
                                    <option value="San Juan Cieneguilla">San Juan Cieneguilla</option>
                                    <option value="San Juan Coatzospam">San Juan Coatzospam</option>
                                    <option value="San Juan Colorado">San Juan Colorado</option>
                                    <option value="San Juan Comaltepec">San Juan Comaltepec</option>
                                    <option value="San Juan Cotzocon">San Juan Cotzocon</option>
                                    <option value="San Juan Chicomezuchil">San Juan Chicomezuchil</option>
                                    <option value="San Juan Chilateca">San Juan Chilateca</option>
                                    <option value="San Juan del Estado">San Juan del Estado</option>
                                    <option value="San Juan del Rio">San Juan del Rio</option>
                                    <option value="San Juan Diuxi">San Juan Diuxi</option>
                                    <option value="San Juan Evangelista Analco">San Juan Evangelista Analco</option>
                                    <option value="San Juan Guelavia">San Juan Guelavia</option>
                                    <option value="San Juan Guichicovi">San Juan Guichicovi</option>
                                    <option value="San Juan Ihualtepec">San Juan Ihualtepec</option>
                                    <option value="San Juan Juquila Mixes">San Juan Juquila Mixes</option>
                                    <option value="San Juan Juquila Vijanos">San Juan Juquila Vijanos</option>
                                    <option value="San Juan Lachao">San Juan Lachao</option>
                                    <option value="San Juan Lachigalla">San Juan Lachigalla</option>
                                    <option value="San Juan Lajarcia">San Juan Lajarcia</option>
                                    <option value="San Juan Lalana">San Juan Lalana</option>
                                    <option value="San Juan de los Cues">San Juan de los Cues</option>
                                    <option value="San Juan Mazatlan">San Juan Mazatlan</option>
                                    <option value="San Juan Mixtepec -Dto. 08 -">San Juan Mixtepec -Dto. 08 -</option>
                                    <option value="San Juan Mixtepec -Dto. 26 -">San Juan Mixtepec -Dto. 26 -</option>
                                    <option value="San Juan ">San Juan </option>
                                    <option value="San Juan Ozolotepec">San Juan Ozolotepec</option>
                                    <option value="San Juan Petlapa">San Juan Petlapa</option>
                                    <option value="San Juan Quiahije">San Juan Quiahije</option>
                                    <option value="San Juan Quiotepec">San Juan Quiotepec</option>
                                    <option value="San Juan Sayultepec">San Juan Sayultepec</option>
                                    <option value="San Juan Tabaa">San Juan Tabaa</option>
                                    <option value="San Juan Tamazola">San Juan Tamazola</option>
                                    <option value="San Juan Teita">San Juan Teita</option>
                                    <option value="San Juan Teitipac">San Juan Teitipac</option>
                                    <option value="San Juan Tepeuxila">San Juan Tepeuxila</option>
                                    <option value="San Juan Teposcolula">San Juan Teposcolula</option>
                                    <option value="San Juan Yaee">San Juan Yaee</option>
                                    <option value="San Juan Yatzona">San Juan Yatzona</option>
                                    <option value="San Juan Yucuita">San Juan Yucuita</option>
                                    <option value="San Lorenzo">San Lorenzo</option>
                                    <option value="San Lorenzo Albarradas">San Lorenzo Albarradas</option>
                                    <option value="San Lorenzo Cacaotepec">San Lorenzo Cacaotepec</option>
                                    <option value="San Lorenzo Cuaunecuiltitla">San Lorenzo Cuaunecuiltitla</option>
                                    <option value="San Lorenzo Texmelucan">San Lorenzo Texmelucan</option>
                                    <option value="San Lorenzo Victoria">San Lorenzo Victoria</option>
                                    <option value="San Lucas Camotlan">San Lucas Camotlan</option>
                                    <option value="San Lucas Ojitlan">San Lucas Ojitlan</option>
                                    <option value="San Lucas Quiavini">San Lucas Quiavini</option>
                                    <option value="San Lucas Zoquiapam">San Lucas Zoquiapam</option>
                                    <option value="San Luis Amatlan">San Luis Amatlan</option>
                                    <option value="San Marcial Ozolotepec">San Marcial Ozolotepec</option>
                                    <option value="San Marcos Arteaga">San Marcos Arteaga</option>
                                    <option value="San Martin de los Cansecos">San Martin de los Cansecos</option>
                                    <option value="San Martin Huamelulpam">San Martin Huamelulpam</option>
                                    <option value="San Martin Itunyoso">San Martin Itunyoso</option>
                                    <option value="San Martin Lachila">San Martin Lachila</option>
                                    <option value="San Martin Peras">San Martin Peras</option>
                                    <option value="San Martin Tilcajete">San Martin Tilcajete</option>
                                    <option value="San Martin Toxpalan">San Martin Toxpalan</option>
                                    <option value="San Martin Zacatepec">San Martin Zacatepec</option>
                                    <option value="San Mateo Cajonos">San Mateo Cajonos</option>
                                    <option value="Capulalpam de Mendez">Capulalpam de Mendez</option>
                                    <option value="San Mateo del Mar">San Mateo del Mar</option>
                                    <option value="San Mateo Yoloxochitlan">San Mateo Yoloxochitlan</option>
                                    <option value="San Mateo Etlatongo">San Mateo Etlatongo</option>
                                    <option value="San Mateo Nejapam">San Mateo Nejapam</option>
                                    <option value="San Mateo Pe">San Mateo Pe</option>
                                    <option value="San Mateo Pi">San Mateo Pi</option>
                                    <option value="San Mateo Rio Hondo">San Mateo Rio Hondo</option>
                                    <option value="San Mateo Sindihui">San Mateo Sindihui</option>
                                    <option value="San Mateo Tlapiltepec">San Mateo Tlapiltepec</option>
                                    <option value="San Melchor Betaza">San Melchor Betaza</option>
                                    <option value="San Miguel Achiutla">San Miguel Achiutla</option>
                                    <option value="San Miguel Ahuehuetitlan">San Miguel Ahuehuetitlan</option>
                                    <option value="San Miguel Aloapam">San Miguel Aloapam</option>
                                    <option value="San Miguel Amatitlan">San Miguel Amatitlan</option>
                                    <option value="San Miguel Amatlan">San Miguel Amatlan</option>
                                    <option value="San Miguel Coatlan">San Miguel Coatlan</option>
                                    <option value="San Miguel Chicahua">San Miguel Chicahua</option>
                                    <option value="San Miguel Chimalapa">San Miguel Chimalapa</option>
                                    <option value="San Miguel del Puerto">San Miguel del Puerto</option>
                                    <option value="San Miguel del Rio">San Miguel del Rio</option>
                                    <option value="San Miguel Ejutla">San Miguel Ejutla</option>
                                    <option value="San Miguel el Grande">San Miguel el Grande</option>
                                    <option value="San Miguel Huautla">San Miguel Huautla</option>
                                    <option value="San Miguel Mixtepec">San Miguel Mixtepec</option>
                                    <option value="San Miguel Panixtlahuaca">San Miguel Panixtlahuaca</option>
                                    <option value="San Miguel Peras">San Miguel Peras</option>
                                    <option value="San Miguel Piedras">San Miguel Piedras</option>
                                    <option value="San Miguel Quetzaltepec">San Miguel Quetzaltepec</option>
                                    <option value="San Miguel Santa Flor">San Miguel Santa Flor</option>
                                    <option value="Villa Sola de Vega">Villa Sola de Vega</option>
                                    <option value="San Miguel Soyaltepec">San Miguel Soyaltepec</option>
                                    <option value="San Miguel Suchixtepec">San Miguel Suchixtepec</option>
                                    <option value="Villa Talea de Castro">Villa Talea de Castro</option>
                                    <option value="San Miguel Tecomatlan">San Miguel Tecomatlan</option>
                                    <option value="San Miguel Tenango">San Miguel Tenango</option>
                                    <option value="San Miguel Tequixtepec">San Miguel Tequixtepec</option>
                                    <option value="San Miguel Tilquiapam">San Miguel Tilquiapam</option>
                                    <option value="San Miguel Tlacamama">San Miguel Tlacamama</option>
                                    <option value="San Miguel Tlacotepec">San Miguel Tlacotepec</option>
                                    <option value="San Miguel Tulancingo">San Miguel Tulancingo</option>
                                    <option value="San Miguel Yotao">San Miguel Yotao</option>
                                    <option value="San Nicolas">San Nicolas</option>
                                    <option value="San Nicolas Hidalgo">San Nicolas Hidalgo</option>
                                    <option value="San Pablo Coatlan">San Pablo Coatlan</option>
                                    <option value="San Pablo Cuatro Venados">San Pablo Cuatro Venados</option>
                                    <option value="San Pablo Etla">San Pablo Etla</option>
                                    <option value="San Pablo Huitzo">San Pablo Huitzo</option>
                                    <option value="San Pablo Huixtepec">San Pablo Huixtepec</option>
                                    <option value="San Pablo Macuiltianguis">San Pablo Macuiltianguis</option>
                                    <option value="San Pablo Tijaltepec">San Pablo Tijaltepec</option>
                                    <option value="San Pablo Villa de Mitla">San Pablo Villa de Mitla</option>
                                    <option value="San Pablo Yaganiza">San Pablo Yaganiza</option>
                                    <option value="San Pedro Amuzgos">San Pedro Amuzgos</option>
                                    <option value="San Pedro Apostol">San Pedro Apostol</option>
                                    <option value="San Pedro Atoyac">San Pedro Atoyac</option>
                                    <option value="San Pedro Cajonos">San Pedro Cajonos</option>
                                    <option value="San Pedro Coxcaltepec Cantaros">San Pedro Coxcaltepec Cantaros</option>
                                    <option value="San Pedro Comitancillo">San Pedro Comitancillo</option>
                                    <option value="San Pedro el Alto">San Pedro el Alto</option>
                                    <option value="San Pedro Huamelula">San Pedro Huamelula</option>
                                    <option value="San Pedro Huilotepec">San Pedro Huilotepec</option>
                                    <option value="San Pedro Ixcatlan">San Pedro Ixcatlan</option>
                                    <option value="San Pedro Ixtlahuaca">San Pedro Ixtlahuaca</option>
                                    <option value="San Pedro Jaltepetongo">San Pedro Jaltepetongo</option>
                                    <option value="San Pedro Jicayan">San Pedro Jicayan</option>
                                    <option value="San Pedro Jocotipac">San Pedro Jocotipac</option>
                                    <option value="San Pedro Juchatengo">San Pedro Juchatengo</option>
                                    <option value="San Pedro Martir">San Pedro Martir</option>
                                    <option value="San Pedro Martir Quiechapa">San Pedro Martir Quiechapa</option>
                                    <option value="San Pedro Martir Yucuxaco">San Pedro Martir Yucuxaco</option>
                                    <option value="San Pedro Mixtepec -Dto. 22 -">San Pedro Mixtepec -Dto. 22 -</option>
                                    <option value="San Pedro Mixtepec -Dto. 26 -">San Pedro Mixtepec -Dto. 26 -</option>
                                    <option value="San Pedro Molinos">San Pedro Molinos</option>
                                    <option value="San Pedro Nopala">San Pedro Nopala</option>
                                    <option value="San Pedro Ocopetatillo">San Pedro Ocopetatillo</option>
                                    <option value="San Pedro Ocotepec">San Pedro Ocotepec</option>
                                    <option value="San Pedro Pochutla">San Pedro Pochutla</option>
                                    <option value="San Pedro Quiatoni">San Pedro Quiatoni</option>
                                    <option value="San Pedro Sochiapam">San Pedro Sochiapam</option>
                                    <option value="San Pedro Tapanatepec">San Pedro Tapanatepec</option>
                                    <option value="San Pedro Taviche">San Pedro Taviche</option>
                                    <option value="San Pedro Teozacoalco">San Pedro Teozacoalco</option>
                                    <option value="San Pedro Teutila">San Pedro Teutila</option>
                                    <option value="San Pedro Tidaa">San Pedro Tidaa</option>
                                    <option value="San Pedro Topiltepec">San Pedro Topiltepec</option>
                                    <option value="San Pedro Totolapam">San Pedro Totolapam</option>
                                    <option value="Villa de Tututepec de Melchor Ocampo">Villa de Tututepec de Melchor Ocampo</option>
                                    <option value="San Pedro Yaneri">San Pedro Yaneri</option>
                                    <option value="San Pedro Yolox">San Pedro Yolox</option>
                                    <option value="San Pedro y San Pablo Ayutla">San Pedro y San Pablo Ayutla</option>
                                    <option value="Villa de Etla">Villa de Etla</option>
                                    <option value="San Pedro y San Pablo Teposcolula">San Pedro y San Pablo Teposcolula</option>
                                    <option value="San Pedro y San Pablo Tequixtepec">San Pedro y San Pablo Tequixtepec</option>
                                    <option value="San Pedro Yucunama">San Pedro Yucunama</option>
                                    <option value="San Raymundo Jalpan">San Raymundo Jalpan</option>
                                    <option value="San Sebastian Abasolo">San Sebastian Abasolo</option>
                                    <option value="San Sebastian Coatlan">San Sebastian Coatlan</option>
                                    <option value="San Sebastian Ixcapa">San Sebastian Ixcapa</option>
                                    <option value="San Sebastian Nicananduta">San Sebastian Nicananduta</option>
                                    <option value="San Sebastian Rio Hondo">San Sebastian Rio Hondo</option>
                                    <option value="San Sebastian Tecomaxtlahuaca">San Sebastian Tecomaxtlahuaca</option>
                                    <option value="San Sebastian Teitipac">San Sebastian Teitipac</option>
                                    <option value="San Sebastian Tutla">San Sebastian Tutla</option>
                                    <option value="San Simon Almolongas">San Simon Almolongas</option>
                                    <option value="San Simon Zahuatlan">San Simon Zahuatlan</option>
                                    <option value="Santa Ana">Santa Ana</option>
                                    <option value="Santa Ana Ateixtlahuaca">Santa Ana Ateixtlahuaca</option>
                                    <option value="Santa Ana Cuauhtemoc">Santa Ana Cuauhtemoc</option>
                                    <option value="Santa Ana del Valle">Santa Ana del Valle</option>
                                    <option value="Santa Ana Tavela">Santa Ana Tavela</option>
                                    <option value="Santa Ana Tlapacoyan">Santa Ana Tlapacoyan</option>
                                    <option value="Santa Ana Yareni">Santa Ana Yareni</option>
                                    <option value="Santa Ana Zegache">Santa Ana Zegache</option>
                                    <option value="Santa Catalina Quieri">Santa Catalina Quieri</option>
                                    <option value="Santa Catarina Cuixtla">Santa Catarina Cuixtla</option>
                                    <option value="Santa Catarina Ixtepeji">Santa Catarina Ixtepeji</option>
                                    <option value="Santa Catarina Juquila">Santa Catarina Juquila</option>
                                    <option value="Santa Catarina Lachatao">Santa Catarina Lachatao</option>
                                    <option value="Santa Catarina Loxicha">Santa Catarina Loxicha</option>
                                    <option value="Santa Catarina Mechoacan">Santa Catarina Mechoacan</option>
                                    <option value="Santa Catarina Minas">Santa Catarina Minas</option>
                                    <option value="Santa Catarina Quiane">Santa Catarina Quiane</option>
                                    <option value="Santa Catarina Tayata">Santa Catarina Tayata</option>
                                    <option value="Santa Catarina Ticua">Santa Catarina Ticua</option>
                                    <option value="Santa Catarina Yosonotu">Santa Catarina Yosonotu</option>
                                    <option value="Santa Catarina Zapoquila">Santa Catarina Zapoquila</option>
                                    <option value="Santa Cruz Acatepec">Santa Cruz Acatepec</option>
                                    <option value="Santa Cruz Amilpas">Santa Cruz Amilpas</option>
                                    <option value="Santa Cruz de Bravo">Santa Cruz de Bravo</option>
                                    <option value="Santa Cruz Itundujia">Santa Cruz Itundujia</option>
                                    <option value="Santa Cruz Mixtepec">Santa Cruz Mixtepec</option>
                                    <option value="Santa Cruz Nundaco">Santa Cruz Nundaco</option>
                                    <option value="Santa Cruz Papalutla">Santa Cruz Papalutla</option>
                                    <option value="Santa Cruz Tacache de Mina">Santa Cruz Tacache de Mina</option>
                                    <option value="Santa Cruz Tacahua">Santa Cruz Tacahua</option>
                                    <option value="Santa Cruz Tayata">Santa Cruz Tayata</option>
                                    <option value="Santa Cruz Xitla">Santa Cruz Xitla</option>
                                    <option value="Santa Cruz Xoxocotlan">Santa Cruz Xoxocotlan</option>
                                    <option value="Santa Cruz Zenzontepec">Santa Cruz Zenzontepec</option>
                                    <option value="Santa Gertrudis">Santa Gertrudis</option>
                                    <option value="Santa Ines del Monte">Santa Ines del Monte</option>
                                    <option value="Santa Ines Yatzeche">Santa Ines Yatzeche</option>
                                    <option value="Santa Lucia del Camino">Santa Lucia del Camino</option>
                                    <option value="Santa Lucia Miahuatlan">Santa Lucia Miahuatlan</option>
                                    <option value="Santa Lucia Monteverde">Santa Lucia Monteverde</option>
                                    <option value="Santa Lucia Ocotlan">Santa Lucia Ocotlan</option>
                                    <option value="Santa Maria Alotepec">Santa Maria Alotepec</option>
                                    <option value="Santa Maria Apazco">Santa Maria Apazco</option>
                                    <option value="Santa Maria la Asuncion">Santa Maria la Asuncion</option>
                                    <option value="Heroica Ciudad de Tlaxiaco">Heroica Ciudad de Tlaxiaco</option>
                                    <option value="Ayoquezco de Aldama">Ayoquezco de Aldama</option>
                                    <option value="Santa Maria Atzompa">Santa Maria Atzompa</option>
                                    <option value="Santa Maria Camotlan">Santa Maria Camotlan</option>
                                    <option value="Santa Maria Colotepec">Santa Maria Colotepec</option>
                                    <option value="Santa Maria Cortijo">Santa Maria Cortijo</option>
                                    <option value="Santa Maria Coyotepec">Santa Maria Coyotepec</option>
                                    <option value="Santa Maria Chachoapam">Santa Maria Chachoapam</option>
                                    <option value="Villa de Chilapa de Diaz">Villa de Chilapa de Diaz</option>
                                    <option value="Santa Maria Chilchotla">Santa Maria Chilchotla</option>
                                    <option value="Santa Maria Chimalapa">Santa Maria Chimalapa</option>
                                    <option value="Santa Maria del Rosario">Santa Maria del Rosario</option>
                                    <option value="Santa Maria del Tule">Santa Maria del Tule</option>
                                    <option value="Santa Maria Ecatepec">Santa Maria Ecatepec</option>
                                    <option value="Santa Maria Guelace">Santa Maria Guelace</option>
                                    <option value="Santa Maria Guienagati">Santa Maria Guienagati</option>
                                    <option value="Santa Maria Huatulco">Santa Maria Huatulco</option>
                                    <option value="Santa Maria Huazolotitlan">Santa Maria Huazolotitlan</option>
                                    <option value="Santa Maria Ipalapa">Santa Maria Ipalapa</option>
                                    <option value="Santa Maria Ixcatlan">Santa Maria Ixcatlan</option>
                                    <option value="Santa Maria Jacatepec">Santa Maria Jacatepec</option>
                                    <option value="Santa Maria Jalapa del Marques">Santa Maria Jalapa del Marques</option>
                                    <option value="Santa Maria Jaltianguis">Santa Maria Jaltianguis</option>
                                    <option value="Santa Maria Lachixio">Santa Maria Lachixio</option>
                                    <option value="Santa Maria Mixtequilla">Santa Maria Mixtequilla</option>
                                    <option value="Santa Maria Nativitas">Santa Maria Nativitas</option>
                                    <option value="Santa Maria Nduayaco">Santa Maria Nduayaco</option>
                                    <option value="Santa Maria Ozolotepec">Santa Maria Ozolotepec</option>
                                    <option value="Santa Maria Papalo">Santa Maria Papalo</option>
                                    <option value="Santa Maria Pe">Santa Maria Pe</option>
                                    <option value="Santa Maria Petapa">Santa Maria Petapa</option>
                                    <option value="Santa Maria Quiegolani">Santa Maria Quiegolani</option>
                                    <option value="Santa Maria Sola">Santa Maria Sola</option>
                                    <option value="Santa Maria Tataltepec">Santa Maria Tataltepec</option>
                                    <option value="Santa Maria Tecomavaca">Santa Maria Tecomavaca</option>
                                    <option value="Santa Maria Temaxcalapa">Santa Maria Temaxcalapa</option>
                                    <option value="Santa Maria Temaxcaltepec">Santa Maria Temaxcaltepec</option>
                                    <option value="Santa Maria Teopoxco">Santa Maria Teopoxco</option>
                                    <option value="Santa Maria Tepantlali">Santa Maria Tepantlali</option>
                                    <option value="Santa Maria Texcatitlan">Santa Maria Texcatitlan</option>
                                    <option value="Santa Maria Tlahuitoltepec">Santa Maria Tlahuitoltepec</option>
                                    <option value="Santa Maria Tlalixtac">Santa Maria Tlalixtac</option>
                                    <option value="Santa Maria Tonameca">Santa Maria Tonameca</option>
                                    <option value="Santa Maria Totolapilla">Santa Maria Totolapilla</option>
                                    <option value="Santa Maria Xadani">Santa Maria Xadani</option>
                                    <option value="Santa Maria Yalina">Santa Maria Yalina</option>
                                    <option value="Santa Maria Yavesia">Santa Maria Yavesia</option>
                                    <option value="Santa Maria Yolotepec">Santa Maria Yolotepec</option>
                                    <option value="Santa Maria Yosoyua">Santa Maria Yosoyua</option>
                                    <option value="Santa Maria Yucuhiti">Santa Maria Yucuhiti</option>
                                    <option value="Santa Maria Zacatepec">Santa Maria Zacatepec</option>
                                    <option value="Santa Maria Zaniza">Santa Maria Zaniza</option>
                                    <option value="Santa Maria Zoquitlan">Santa Maria Zoquitlan</option>
                                    <option value="Santiago Amoltepec">Santiago Amoltepec</option>
                                    <option value="Santiago Apoala">Santiago Apoala</option>
                                    <option value="Santiago Apostol">Santiago Apostol</option>
                                    <option value="Santiago Astata">Santiago Astata</option>
                                    <option value="Santiago Atitlan">Santiago Atitlan</option>
                                    <option value="Santiago Ayuquililla">Santiago Ayuquililla</option>
                                    <option value="Santiago Cacaloxtepec">Santiago Cacaloxtepec</option>
                                    <option value="Santiago Camotlan">Santiago Camotlan</option>
                                    <option value="Santiago Comaltepec">Santiago Comaltepec</option>
                                    <option value="Santiago Chazumba">Santiago Chazumba</option>
                                    <option value="Santiago Choapam">Santiago Choapam</option>
                                    <option value="Santiago del Rio">Santiago del Rio</option>
                                    <option value="Santiago Huajolotitlan">Santiago Huajolotitlan</option>
                                    <option value="Santiago Huauclilla">Santiago Huauclilla</option>
                                    <option value="Santiago Ihuitlan Plumas">Santiago Ihuitlan Plumas</option>
                                    <option value="Santiago Ixcuintepec">Santiago Ixcuintepec</option>
                                    <option value="Santiago Ixtayutla">Santiago Ixtayutla</option>
                                    <option value="Santiago Jamiltepec">Santiago Jamiltepec</option>
                                    <option value="Santiago Jocotepec">Santiago Jocotepec</option>
                                    <option value="Santiago Juxtlahuaca">Santiago Juxtlahuaca</option>
                                    <option value="Santiago Lachiguiri">Santiago Lachiguiri</option>
                                    <option value="Santiago Lalopa">Santiago Lalopa</option>
                                    <option value="Santiago Laollaga">Santiago Laollaga</option>
                                    <option value="Santiago Laxopa">Santiago Laxopa</option>
                                    <option value="Santiago Llano Grande">Santiago Llano Grande</option>
                                    <option value="Santiago Matatlan">Santiago Matatlan</option>
                                    <option value="Santiago Miltepec">Santiago Miltepec</option>
                                    <option value="Santiago Minas">Santiago Minas</option>
                                    <option value="Santiago Nacaltepec">Santiago Nacaltepec</option>
                                    <option value="Santiago Nejapilla">Santiago Nejapilla</option>
                                    <option value="Santiago Nundiche">Santiago Nundiche</option>
                                    <option value="Santiago Nuyoo">Santiago Nuyoo</option>
                                    <option value="Santiago Pinotepa Nacional">Santiago Pinotepa Nacional</option>
                                    <option value="Santiago Suchilquitongo">Santiago Suchilquitongo</option>
                                    <option value="Santiago Tamazola">Santiago Tamazola</option>
                                    <option value="Santiago Tapextla">Santiago Tapextla</option>
                                    <option value="Villa Tejupam de la Union">Villa Tejupam de la Union</option>
                                    <option value="Santiago Tenango">Santiago Tenango</option>
                                    <option value="Santiago Tepetlapa">Santiago Tepetlapa</option>
                                    <option value="Santiago Tetepec">Santiago Tetepec</option>
                                    <option value="Santiago Texcalcingo">Santiago Texcalcingo</option>
                                    <option value="Santiago Textitlan">Santiago Textitlan</option>
                                    <option value="Santiago Tilantongo">Santiago Tilantongo</option>
                                    <option value="Santiago Tillo">Santiago Tillo</option>
                                    <option value="Santiago Tlazoyaltepec">Santiago Tlazoyaltepec</option>
                                    <option value="Santiago Xanica">Santiago Xanica</option>
                                    <option value="Santiago Xiacui">Santiago Xiacui</option>
                                    <option value="Santiago Yaitepec">Santiago Yaitepec</option>
                                    <option value="Santiago Yaveo">Santiago Yaveo</option>
                                    <option value="Santiago Yolomecatl">Santiago Yolomecatl</option>
                                    <option value="Santiago Yosondua">Santiago Yosondua</option>
                                    <option value="Santiago Yucuyachi">Santiago Yucuyachi</option>
                                    <option value="Santiago Zacatepec">Santiago Zacatepec</option>
                                    <option value="Santiago Zoochila">Santiago Zoochila</option>
                                    <option value="Nuevo Zoquiapam">Nuevo Zoquiapam</option>
                                    <option value="Santo Domingo Ingenio">Santo Domingo Ingenio</option>
                                    <option value="Santo Domingo Albarradas">Santo Domingo Albarradas</option>
                                    <option value="Santo Domingo Armenta">Santo Domingo Armenta</option>
                                    <option value="Santo Domingo Chihuitan">Santo Domingo Chihuitan</option>
                                    <option value="Santo Domingo de Morelos">Santo Domingo de Morelos</option>
                                    <option value="Santo Domingo Ixcatlan">Santo Domingo Ixcatlan</option>
                                    <option value="Santo Domingo Nuxaa">Santo Domingo Nuxaa</option>
                                    <option value="Santo Domingo Ozolotepec">Santo Domingo Ozolotepec</option>
                                    <option value="Santo Domingo Petapa">Santo Domingo Petapa</option>
                                    <option value="Santo Domingo Roayaga">Santo Domingo Roayaga</option>
                                    <option value="Santo Domingo Tehuantepec">Santo Domingo Tehuantepec</option>
                                    <option value="Santo Domingo Teojomulco">Santo Domingo Teojomulco</option>
                                    <option value="Santo Domingo Tepuxtepec">Santo Domingo Tepuxtepec</option>
                                    <option value="Santo Domingo Tlatayapam">Santo Domingo Tlatayapam</option>
                                    <option value="Santo Domingo Tomaltepec">Santo Domingo Tomaltepec</option>
                                    <option value="Santo Domingo Tonala">Santo Domingo Tonala</option>
                                    <option value="Santo Domingo Tonaltepec">Santo Domingo Tonaltepec</option>
                                    <option value="Santo Domingo Xagacia">Santo Domingo Xagacia</option>
                                    <option value="Santo Domingo Yanhuitlan">Santo Domingo Yanhuitlan</option>
                                    <option value="Santo Domingo Yodohino">Santo Domingo Yodohino</option>
                                    <option value="Santo Domingo Zanatepec">Santo Domingo Zanatepec</option>
                                    <option value="Santos Reyes Nopala">Santos Reyes Nopala</option>
                                    <option value="Santos Reyes Papalo">Santos Reyes Papalo</option>
                                    <option value="Santos Reyes Tepejillo">Santos Reyes Tepejillo</option>
                                    <option value="Santos Reyes Yucuna">Santos Reyes Yucuna</option>
                                    <option value="Santo Tomas Jalieza">Santo Tomas Jalieza</option>
                                    <option value="Santo Tomas Mazaltepec">Santo Tomas Mazaltepec</option>
                                    <option value="Santo Tomas Ocotepec">Santo Tomas Ocotepec</option>
                                    <option value="Santo Tomas Tamazulapan">Santo Tomas Tamazulapan</option>
                                    <option value="San Vicente Coatlan">San Vicente Coatlan</option>
                                    <option value="San Vicente Lachixio">San Vicente Lachixio</option>
                                    <option value="San Vicente Nu">San Vicente Nu</option>
                                    <option value="Silacayoapam">Silacayoapam</option>
                                    <option value="Sitio de Xitlapehua">Sitio de Xitlapehua</option>
                                    <option value="Soledad Etla">Soledad Etla</option>
                                    <option value="Villa de Tamazulapam del Progreso">Villa de Tamazulapam del Progreso</option>
                                    <option value="Tanetze de Zaragoza">Tanetze de Zaragoza</option>
                                    <option value="Taniche">Taniche</option>
                                    <option value="Tataltepec de Valdes">Tataltepec de Valdes</option>
                                    <option value="Teococuilco de Marcos Perez">Teococuilco de Marcos Perez</option>
                                    <option value="Teotitlan de Flores Magon">Teotitlan de Flores Magon</option>
                                    <option value="Teotitlan del Valle">Teotitlan del Valle</option>
                                    <option value="Teotongo">Teotongo</option>
                                    <option value="Tepelmeme Villa de Morelos">Tepelmeme Villa de Morelos</option>
                                    <option value="Heroica Villa Tezoatlan de Segura y Luna, Cuna de la Independenc">Heroica Villa Tezoatlan de Segura y Luna, Cuna de la Independenc</option>
                                    <option value="San Jeronimo Tlacochahuaya">San Jeronimo Tlacochahuaya</option>
                                    <option value="Tlacolula de Matamoros">Tlacolula de Matamoros</option>
                                    <option value="Tlacotepec Plumas">Tlacotepec Plumas</option>
                                    <option value="Tlalixtac de Cabrera">Tlalixtac de Cabrera</option>
                                    <option value="Totontepec Villa de Morelos">Totontepec Villa de Morelos</option>
                                    <option value="Trinidad Zaachila">Trinidad Zaachila</option>
                                    <option value="La Trinidad Vista Hermosa">La Trinidad Vista Hermosa</option>
                                    <option value="Union Hidalgo">Union Hidalgo</option>
                                    <option value="Valerio Trujano">Valerio Trujano</option>
                                    <option value="San Juan Bautista Valle Nacional">San Juan Bautista Valle Nacional</option>
                                    <option value="Villa Diaz Ordaz">Villa Diaz Ordaz</option>
                                    <option value="Yaxe">Yaxe</option>
                                    <option value="Magdalena Yodocono de Porfirio Diaz">Magdalena Yodocono de Porfirio Diaz</option>
                                    <option value="Yogana">Yogana</option>
                                    <option value="Yutanduchi de Guerrero">Yutanduchi de Guerrero</option>
                                    <option value="Villa de Zaachila">Villa de Zaachila</option>
                                    <option value="San Mateo Yucutindo">San Mateo Yucutindo</option>
                                    <option value="Zapotitlan Lagunas">Zapotitlan Lagunas</option>
                                    <option value="Zapotitlan Palmas">Zapotitlan Palmas</option>
                                    <option value="Santa Ines de Zaragoza">Santa Ines de Zaragoza</option>
                                    <option value="Zimatlan de Alvarez">Zimatlan de Alvarez</option>
                                  </select>
                                </div>
                                <div class="form-group col-sm-6 col-lg-4"  id="puebla" style="display: none;" >
                                  {!! Form::label('municipality', 'Municipio:') !!}
                                  <select name="municipality" class="input-lg form-control">
                                    <option value="Acajete">Acajete</option>
                                    <option value="Acateno">Acateno</option>
                                    <option value="Acatlan">Acatlan</option>
                                    <option value="Acatzingo">Acatzingo</option>
                                    <option value="Acteopan">Acteopan</option>
                                    <option value="Ahuacatlan">Ahuacatlan</option>
                                    <option value="Ahuatlan">Ahuatlan</option>
                                    <option value="Ahuazotepec">Ahuazotepec</option>
                                    <option value="Ahuehuetitla">Ahuehuetitla</option>
                                    <option value="Ajalpan">Ajalpan</option>
                                    <option value="Albino Zertuche">Albino Zertuche</option>
                                    <option value="Aljojuca">Aljojuca</option>
                                    <option value="Altepexi">Altepexi</option>
                                    <option value="Amixtlan">Amixtlan</option>
                                    <option value="Amozoc">Amozoc</option>
                                    <option value="Aquixtla">Aquixtla</option>
                                    <option value="Atempan">Atempan</option>
                                    <option value="Atexcal">Atexcal</option>
                                    <option value="Atlixco">Atlixco</option>
                                    <option value="Atoyatempan">Atoyatempan</option>
                                    <option value="Atzala">Atzala</option>
                                    <option value="Atzitzihuacan">Atzitzihuacan</option>
                                    <option value="Atzitzintla">Atzitzintla</option>
                                    <option value="Axutla">Axutla</option>
                                    <option value="Ayotoxco de Guerrero">Ayotoxco de Guerrero</option>
                                    <option value="Calpan">Calpan</option>
                                    <option value="Caltepec">Caltepec</option>
                                    <option value="Camocuautla">Camocuautla</option>
                                    <option value="Caxhuacan">Caxhuacan</option>
                                    <option value="Coatepec">Coatepec</option>
                                    <option value="Coatzingo">Coatzingo</option>
                                    <option value="Cohetzala">Cohetzala</option>
                                    <option value="Cohuecan">Cohuecan</option>
                                    <option value="Coronango">Coronango</option>
                                    <option value="Coxcatlan">Coxcatlan</option>
                                    <option value="Coyomeapan">Coyomeapan</option>
                                    <option value="Coyotepec">Coyotepec</option>
                                    <option value="Cuapiaxtla de Madero">Cuapiaxtla de Madero</option>
                                    <option value="Cuautempan">Cuautempan</option>
                                    <option value="Cuautinchan">Cuautinchan</option>
                                    <option value="Cuautlancingo">Cuautlancingo</option>
                                    <option value="Cuayuca de Andrade">Cuayuca de Andrade</option>
                                    <option value="Cuetzalan del Progreso">Cuetzalan del Progreso</option>
                                    <option value="Cuyoaco">Cuyoaco</option>
                                    <option value="Chalchicomula de Sesma">Chalchicomula de Sesma</option>
                                    <option value="Chapulco">Chapulco</option>
                                    <option value="Chiautla">Chiautla</option>
                                    <option value="Chiautzingo">Chiautzingo</option>
                                    <option value="Chiconcuautla">Chiconcuautla</option>
                                    <option value="Chichiquila">Chichiquila</option>
                                    <option value="Chietla">Chietla</option>
                                    <option value="Chigmecatitlan">Chigmecatitlan</option>
                                    <option value="Chignahuapan">Chignahuapan</option>
                                    <option value="Chignautla">Chignautla</option>
                                    <option value="Chila">Chila</option>
                                    <option value="Chila de la Sal">Chila de la Sal</option>
                                    <option value="Honey">Honey</option>
                                    <option value="Chilchotla">Chilchotla</option>
                                    <option value="Chinantla">Chinantla</option>
                                    <option value="Domingo Arenas">Domingo Arenas</option>
                                    <option value="Eloxochitlan">Eloxochitlan</option>
                                    <option value="Epatlan">Epatlan</option>
                                    <option value="Esperanza">Esperanza</option>
                                    <option value="Francisco Z. Mena">Francisco Z. Mena</option>
                                    <option value="General Felipe Angeles">General Felipe Angeles</option>
                                    <option value="Guadalupe">Guadalupe</option>
                                    <option value="Guadalupe Victoria">Guadalupe Victoria</option>
                                    <option value="Hermenegildo Galeana">Hermenegildo Galeana</option>
                                    <option value="Huaquechula">Huaquechula</option>
                                    <option value="Huatlatlauca">Huatlatlauca</option>
                                    <option value="Huauchinango">Huauchinango</option>
                                    <option value="Huehuetla">Huehuetla</option>
                                    <option value="Huehuetlan el Chico">Huehuetlan el Chico</option>
                                    <option value="Huejotzingo">Huejotzingo</option>
                                    <option value="Hueyapan">Hueyapan</option>
                                    <option value="Hueytamalco">Hueytamalco</option>
                                    <option value="Hueytlalpan">Hueytlalpan</option>
                                    <option value="Huitzilan de Serdan">Huitzilan de Serdan</option>
                                    <option value="Huitziltepec">Huitziltepec</option>
                                    <option value="Atlequizayan">Atlequizayan</option>
                                    <option value="Ixcamilpa de Guerrero">Ixcamilpa de Guerrero</option>
                                    <option value="Ixcaquixtla">Ixcaquixtla</option>
                                    <option value="Ixtacamaxtitlan">Ixtacamaxtitlan</option>
                                    <option value="Ixtepec">Ixtepec</option>
                                    <option value="Izucar de Matamoros">Izucar de Matamoros</option>
                                    <option value="Jalpan">Jalpan</option>
                                    <option value="Jolalpan">Jolalpan</option>
                                    <option value="Jonotla">Jonotla</option>
                                    <option value="Jopala">Jopala</option>
                                    <option value="Juan C. Bonilla">Juan C. Bonilla</option>
                                    <option value="Juan Galindo">Juan Galindo</option>
                                    <option value="Juan N. Mendez">Juan N. Mendez</option>
                                    <option value="Lafragua">Lafragua</option>
                                    <option value="Libres">Libres</option>
                                    <option value="La Magdalena Tlatlauquitepec">La Magdalena Tlatlauquitepec</option>
                                    <option value="Mazapiltepec de Juarez">Mazapiltepec de Juarez</option>
                                    <option value="Mixtla">Mixtla</option>
                                    <option value="Molcaxac">Molcaxac</option>
                                    <option value="Ca">Ca</option>
                                    <option value="Naupan">Naupan</option>
                                    <option value="Nauzontla">Nauzontla</option>
                                    <option value="Nealtican">Nealtican</option>
                                    <option value="Nicolas Bravo">Nicolas Bravo</option>
                                    <option value="Nopalucan">Nopalucan</option>
                                    <option value="Ocotepec">Ocotepec</option>
                                    <option value="Ocoyucan">Ocoyucan</option>
                                    <option value="Olintla">Olintla</option>
                                    <option value="Oriental">Oriental</option>
                                    <option value="Pahuatlan">Pahuatlan</option>
                                    <option value="Palmar de Bravo">Palmar de Bravo</option>
                                    <option value="Pantepec">Pantepec</option>
                                    <option value="Petlalcingo">Petlalcingo</option>
                                    <option value="Piaxtla">Piaxtla</option>
                                    <option value="Puebla">Puebla</option>
                                    <option value="Quecholac">Quecholac</option>
                                    <option value="Quimixtlan">Quimixtlan</option>
                                    <option value="Rafael Lara Grajales">Rafael Lara Grajales</option>
                                    <option value="Los Reyes de Juarez">Los Reyes de Juarez</option>
                                    <option value="San Andres Cholula">San Andres Cholula</option>
                                    <option value="San Antonio Ca">San Antonio Ca</option>
                                    <option value="San Diego la Mesa Tochimiltzingo">San Diego la Mesa Tochimiltzingo</option>
                                    <option value="San Felipe Teotlalcingo">San Felipe Teotlalcingo</option>
                                    <option value="San Felipe Tepatlan">San Felipe Tepatlan</option>
                                    <option value="San Gabriel Chilac">San Gabriel Chilac</option>
                                    <option value="San Gregorio Atzompa">San Gregorio Atzompa</option>
                                    <option value="San Jeronimo Tecuanipan">San Jeronimo Tecuanipan</option>
                                    <option value="San Jeronimo Xayacatlan">San Jeronimo Xayacatlan</option>
                                    <option value="San Jose Chiapa">San Jose Chiapa</option>
                                    <option value="San Jose Miahuatlan">San Jose Miahuatlan</option>
                                    <option value="San Juan Atenco">San Juan Atenco</option>
                                    <option value="San Juan Atzompa">San Juan Atzompa</option>
                                    <option value="San Martin Texmelucan">San Martin Texmelucan</option>
                                    <option value="San Martin Totoltepec">San Martin Totoltepec</option>
                                    <option value="San Matias Tlalancaleca">San Matias Tlalancaleca</option>
                                    <option value="San Miguel Ixitlan">San Miguel Ixitlan</option>
                                    <option value="San Miguel Xoxtla">San Miguel Xoxtla</option>
                                    <option value="San Nicolas Buenos Aires">San Nicolas Buenos Aires</option>
                                    <option value="San Nicolas de los Ranchos">San Nicolas de los Ranchos</option>
                                    <option value="San Pablo Anicano">San Pablo Anicano</option>
                                    <option value="San Pedro Cholula">San Pedro Cholula</option>
                                    <option value="San Pedro Yeloixtlahuaca">San Pedro Yeloixtlahuaca</option>
                                    <option value="San Salvador el Seco">San Salvador el Seco</option>
                                    <option value="San Salvador el Verde">San Salvador el Verde</option>
                                    <option value="San Salvador Huixcolotla">San Salvador Huixcolotla</option>
                                    <option value="San Sebastian Tlacotepec">San Sebastian Tlacotepec</option>
                                    <option value="Santa Catarina Tlaltempan">Santa Catarina Tlaltempan</option>
                                    <option value="Santa Ines Ahuatempan">Santa Ines Ahuatempan</option>
                                    <option value="Santa Isabel Cholula">Santa Isabel Cholula</option>
                                    <option value="Santiago Miahuatlan">Santiago Miahuatlan</option>
                                    <option value="Huehuetlan el Grande">Huehuetlan el Grande</option>
                                    <option value="Santo Tomas Hueyotlipan">Santo Tomas Hueyotlipan</option>
                                    <option value="Soltepec">Soltepec</option>
                                    <option value="Tecali de Herrera">Tecali de Herrera</option>
                                    <option value="Tecamachalco">Tecamachalco</option>
                                    <option value="Tecomatlan">Tecomatlan</option>
                                    <option value="Tehuacan">Tehuacan</option>
                                    <option value="Tehuitzingo">Tehuitzingo</option>
                                    <option value="Tenampulco">Tenampulco</option>
                                    <option value="Teopantlan">Teopantlan</option>
                                    <option value="Teotlalco">Teotlalco</option>
                                    <option value="Tepanco de Lopez">Tepanco de Lopez</option>
                                    <option value="Tepango de Rodriguez">Tepango de Rodriguez</option>
                                    <option value="Tepatlaxco de Hidalgo">Tepatlaxco de Hidalgo</option>
                                    <option value="Tepeaca">Tepeaca</option>
                                    <option value="Tepemaxalco">Tepemaxalco</option>
                                    <option value="Tepeojuma">Tepeojuma</option>
                                    <option value="Tepetzintla">Tepetzintla</option>
                                    <option value="Tepexco">Tepexco</option>
                                    <option value="Tepexi de Rodriguez">Tepexi de Rodriguez</option>
                                    <option value="Tepeyahualco">Tepeyahualco</option>
                                    <option value="Tepeyahualco de Cuauhtemoc">Tepeyahualco de Cuauhtemoc</option>
                                    <option value="Tetela de Ocampo">Tetela de Ocampo</option>
                                    <option value="Teteles de Avila Castillo">Teteles de Avila Castillo</option>
                                    <option value="Teziutlan">Teziutlan</option>
                                    <option value="Tianguismanalco">Tianguismanalco</option>
                                    <option value="Tilapa">Tilapa</option>
                                    <option value="Tlacotepec de Benito Juarez">Tlacotepec de Benito Juarez</option>
                                    <option value="Tlacuilotepec">Tlacuilotepec</option>
                                    <option value="Tlachichuca">Tlachichuca</option>
                                    <option value="Tlahuapan">Tlahuapan</option>
                                    <option value="Tlaltenango">Tlaltenango</option>
                                    <option value="Tlanepantla">Tlanepantla</option>
                                    <option value="Tlaola">Tlaola</option>
                                    <option value="Tlapacoya">Tlapacoya</option>
                                    <option value="Tlapanala">Tlapanala</option>
                                    <option value="Tlatlauquitepec">Tlatlauquitepec</option>
                                    <option value="Tlaxco">Tlaxco</option>
                                    <option value="Tochimilco">Tochimilco</option>
                                    <option value="Tochtepec">Tochtepec</option>
                                    <option value="Totoltepec de Guerrero">Totoltepec de Guerrero</option>
                                    <option value="Tulcingo">Tulcingo</option>
                                    <option value="Tuzamapan de Galeana">Tuzamapan de Galeana</option>
                                    <option value="Tzicatlacoyan">Tzicatlacoyan</option>
                                    <option value="Venustiano Carranza">Venustiano Carranza</option>
                                    <option value="Vicente Guerrero">Vicente Guerrero</option>
                                    <option value="Xayacatlan de Bravo">Xayacatlan de Bravo</option>
                                    <option value="Xicotepec">Xicotepec</option>
                                    <option value="Xicotlan">Xicotlan</option>
                                    <option value="Xiutetelco">Xiutetelco</option>
                                    <option value="Xochiapulco">Xochiapulco</option>
                                    <option value="Xochiltepec">Xochiltepec</option>
                                    <option value="Xochitlan de Vicente Suarez">Xochitlan de Vicente Suarez</option>
                                    <option value="Xochitlan Todos Santos">Xochitlan Todos Santos</option>
                                    <option value="Yaonahuac">Yaonahuac</option>
                                    <option value="Yehualtepec">Yehualtepec</option>
                                    <option value="Zacapala">Zacapala</option>
                                    <option value="Zacapoaxtla">Zacapoaxtla</option>
                                    <option value="Zacatlan">Zacatlan</option>
                                    <option value="Zapotitlan">Zapotitlan</option>
                                    <option value="Zapotitlan de Mendez">Zapotitlan de Mendez</option>
                                    <option value="Zaragoza">Zaragoza</option>
                                    <option value="Zautla">Zautla</option>
                                    <option value="Zihuateutla">Zihuateutla</option>
                                    <option value="Zinacatepec">Zinacatepec</option>
                                    <option value="Zongozotla">Zongozotla</option>
                                    <option value="Zoquiapan">Zoquiapan</option>
                                    <option value="Zoquitlan">Zoquitlan</option>
                                  </select>
                                </div>
                                <div class="form-group col-sm-6 col-lg-4"  id="queretaro" style="display: none;" >
                                  {!! Form::label('municipality', 'Municipio:') !!}
                                  <select name="municipality" class="input-lg form-control">
                                    <option value="Amealco de Bonfil">Amealco de Bonfil</option>
                                    <option value="Pinal de Amoles">Pinal de Amoles</option>
                                    <option value="Arroyo Seco">Arroyo Seco</option>
                                    <option value="Cadereyta de Montes">Cadereyta de Montes</option>
                                    <option value="Colon">Colon</option>
                                    <option value="Corregidora">Corregidora</option>
                                    <option value="Ezequiel Montes">Ezequiel Montes</option>
                                    <option value="Huimilpan">Huimilpan</option>
                                    <option value="Jalpan de Serra">Jalpan de Serra</option>
                                    <option value="Landa de Matamoros">Landa de Matamoros</option>
                                    <option value="El Marques">El Marques</option>
                                    <option value="Pedro Escobedo">Pedro Escobedo</option>
                                    <option value="Pe">Pe</option>
                                    <option value="Queretaro">Queretaro</option>
                                    <option value="San Joaquin">San Joaquin</option>
                                    <option value="San Juan del Rio">San Juan del Rio</option>
                                    <option value="Tequisquiapan">Tequisquiapan</option>
                                    <option value="Toliman">Toliman</option>
                                  </select>
                                </div>
                                <div class="form-group col-sm-6 col-lg-4"  id="quintanaroo" style="display: none;" >
                                  {!! Form::label('municipality', 'Municipio:') !!}
                                  <select name="municipality" class="input-lg form-control">
                                    <option value="Cozumel">Cozumel</option>
                                    <option value="Felipe Carrillo Puerto">Felipe Carrillo Puerto</option>
                                    <option value="Isla Mujeres">Isla Mujeres</option>
                                    <option value="Othon P. Blanco">Othon P. Blanco</option>
                                    <option value="Benito Juarez">Benito Juarez</option>
                                    <option value="Jose Maria Morelos">Jose Maria Morelos</option>
                                    <option value="Lazaro Cardenas">Lazaro Cardenas</option>
                                    <option value="Solidaridad">Solidaridad</option>
                                    <option value="Tulum">Tulum</option>
                                    <option value="Bacalar">Bacalar</option>
                                  </select>
                                </div>
                                <div class="form-group col-sm-6 col-lg-4"  id="sanluis" style="display: none;" >
                                  {!! Form::label('municipality', 'Municipio:') !!}
                                  <select name="municipality" class="input-lg form-control">
                                    <option value="Ahualulco">Ahualulco</option>
                                    <option value="Alaquines">Alaquines</option>
                                    <option value="Aquismon">Aquismon</option>
                                    <option value="Armadillo de los Infante">Armadillo de los Infante</option>
                                    <option value="Cardenas">Cardenas</option>
                                    <option value="Catorce">Catorce</option>
                                    <option value="Cedral">Cedral</option>
                                    <option value="Cerritos">Cerritos</option>
                                    <option value="Cerro de San Pedro">Cerro de San Pedro</option>
                                    <option value="Ciudad del Maiz">Ciudad del Maiz</option>
                                    <option value="Ciudad Fernandez">Ciudad Fernandez</option>
                                    <option value="Tancanhuitz">Tancanhuitz</option>
                                    <option value="Ciudad Valles">Ciudad Valles</option>
                                    <option value="Coxcatlan">Coxcatlan</option>
                                    <option value="Charcas">Charcas</option>
                                    <option value="Ebano">Ebano</option>
                                    <option value="Guadalcazar">Guadalcazar</option>
                                    <option value="Huehuetlan">Huehuetlan</option>
                                    <option value="Lagunillas">Lagunillas</option>
                                    <option value="Matehuala">Matehuala</option>
                                    <option value="Mexquitic de Carmona">Mexquitic de Carmona</option>
                                    <option value="Moctezuma">Moctezuma</option>
                                    <option value="Rayon">Rayon</option>
                                    <option value="Rioverde">Rioverde</option>
                                    <option value="Salinas">Salinas</option>
                                    <option value="San Antonio">San Antonio</option>
                                    <option value="San Ciro de Acosta">San Ciro de Acosta</option>
                                    <option value="San Luis Potosi">San Luis Potosi</option>
                                    <option value="San Martin Chalchicuautla">San Martin Chalchicuautla</option>
                                    <option value="San Nicolas Tolentino">San Nicolas Tolentino</option>
                                    <option value="Santa Catarina">Santa Catarina</option>
                                    <option value="Santa Maria del Rio">Santa Maria del Rio</option>
                                    <option value="Santo Domingo">Santo Domingo</option>
                                    <option value="San Vicente Tancuayalab">San Vicente Tancuayalab</option>
                                    <option value="Soledad de Graciano Sanchez">Soledad de Graciano Sanchez</option>
                                    <option value="Tamasopo">Tamasopo</option>
                                    <option value="Tamazunchale">Tamazunchale</option>
                                    <option value="Tampacan">Tampacan</option>
                                    <option value="Tampamolon Corona">Tampamolon Corona</option>
                                    <option value="Tamuin">Tamuin</option>
                                    <option value="Tanlajas">Tanlajas</option>
                                    <option value="Tanquian de Escobedo">Tanquian de Escobedo</option>
                                    <option value="Tierra Nueva">Tierra Nueva</option>
                                    <option value="Vanegas">Vanegas</option>
                                    <option value="Venado">Venado</option>
                                    <option value="Villa de Arriaga">Villa de Arriaga</option>
                                    <option value="Villa de Guadalupe">Villa de Guadalupe</option>
                                    <option value="Villa de la Paz">Villa de la Paz</option>
                                    <option value="Villa de Ramos">Villa de Ramos</option>
                                    <option value="Villa de Reyes">Villa de Reyes</option>
                                    <option value="Villa Hidalgo">Villa Hidalgo</option>
                                    <option value="Villa Juarez">Villa Juarez</option>
                                    <option value="Axtla de Terrazas">Axtla de Terrazas</option>
                                    <option value="Xilitla">Xilitla</option>
                                    <option value="Zaragoza">Zaragoza</option>
                                    <option value="Villa de Arista">Villa de Arista</option>
                                    <option value="Matlapa">Matlapa</option>
                                    <option value="El Naranjo">El Naranjo</option>
                                  </select>
                                </div>
                                <div class="form-group col-sm-6 col-lg-4"  id="sinaloa" style="display: none;" >
                                  {!! Form::label('municipality', 'Municipio:') !!}
                                  <select name="municipality" class="input-lg form-control">
                                    <option value="Ahome">Ahome</option>
                                    <option value="Angostura">Angostura</option>
                                    <option value="Badiraguato">Badiraguato</option>
                                    <option value="Concordia">Concordia</option>
                                    <option value="Cosala">Cosala</option>
                                    <option value="Culiacan">Culiacan</option>
                                    <option value="Choix">Choix</option>
                                    <option value="Elota">Elota</option>
                                    <option value="Escuinapa">Escuinapa</option>
                                    <option value="El Fuerte">El Fuerte</option>
                                    <option value="Guasave">Guasave</option>
                                    <option value="Mazatlan">Mazatlan</option>
                                    <option value="Mocorito">Mocorito</option>
                                    <option value="Rosario">Rosario</option>
                                    <option value="Salvador Alvarado">Salvador Alvarado</option>
                                    <option value="San Ignacio">San Ignacio</option>
                                    <option value="Sinaloa">Sinaloa</option>
                                    <option value="Navolato">Navolato</option>
                                  </select>
                                </div>
                                <div class="form-group col-sm-6 col-lg-4"  id="sonora" style="display: none;" >
                                  {!! Form::label('municipality', 'Municipio:') !!}
                                  <select name="municipality" class="input-lg form-control">
                                    <option value="Aconchi">Aconchi</option>
                                    <option value="Agua Prieta">Agua Prieta</option>
                                    <option value="Alamos">Alamos</option>
                                    <option value="Altar">Altar</option>
                                    <option value="Arivechi">Arivechi</option>
                                    <option value="Arizpe">Arizpe</option>
                                    <option value="Atil">Atil</option>
                                    <option value="Bacadehuachi">Bacadehuachi</option>
                                    <option value="Bacanora">Bacanora</option>
                                    <option value="Bacerac">Bacerac</option>
                                    <option value="Bacoachi">Bacoachi</option>
                                    <option value="Bacum">Bacum</option>
                                    <option value="Banamichi">Banamichi</option>
                                    <option value="Baviacora">Baviacora</option>
                                    <option value="Bavispe">Bavispe</option>
                                    <option value="Benjamin Hill">Benjamin Hill</option>
                                    <option value="Caborca">Caborca</option>
                                    <option value="Cajeme">Cajeme</option>
                                    <option value="Cananea">Cananea</option>
                                    <option value="Carbo">Carbo</option>
                                    <option value="La Colorada">La Colorada</option>
                                    <option value="Cucurpe">Cucurpe</option>
                                    <option value="Cumpas">Cumpas</option>
                                    <option value="Divisaderos">Divisaderos</option>
                                    <option value="Empalme">Empalme</option>
                                    <option value="Etchojoa">Etchojoa</option>
                                    <option value="Fronteras">Fronteras</option>
                                    <option value="Granados">Granados</option>
                                    <option value="Guaymas">Guaymas</option>
                                    <option value="Hermosillo">Hermosillo</option>
                                    <option value="Huachinera">Huachinera</option>
                                    <option value="Huasabas">Huasabas</option>
                                    <option value="Huatabampo">Huatabampo</option>
                                    <option value="Huepac">Huepac</option>
                                    <option value="Imuris">Imuris</option>
                                    <option value="Magdalena">Magdalena</option>
                                    <option value="Mazatan">Mazatan</option>
                                    <option value="Moctezuma">Moctezuma</option>
                                    <option value="Naco">Naco</option>
                                    <option value="Nacori Chico">Nacori Chico</option>
                                    <option value="Nacozari de Garcia">Nacozari de Garcia</option>
                                    <option value="Navojoa">Navojoa</option>
                                    <option value="Nogales">Nogales</option>
                                    <option value="Onavas">Onavas</option>
                                    <option value="Opodepe">Opodepe</option>
                                    <option value="Oquitoa">Oquitoa</option>
                                    <option value="Pitiquito">Pitiquito</option>
                                    <option value="Puerto Pe">Puerto Pe</option>
                                    <option value="Quiriego">Quiriego</option>
                                    <option value="Rayon">Rayon</option>
                                    <option value="Rosario">Rosario</option>
                                    <option value="Sahuaripa">Sahuaripa</option>
                                    <option value="San Felipe de Jesus">San Felipe de Jesus</option>
                                    <option value="San Javier">San Javier</option>
                                    <option value="San Luis Rio Colorado">San Luis Rio Colorado</option>
                                    <option value="San Miguel de Horcasitas">San Miguel de Horcasitas</option>
                                    <option value="San Pedro de la Cueva">San Pedro de la Cueva</option>
                                    <option value="Santa Ana">Santa Ana</option>
                                    <option value="Santa Cruz">Santa Cruz</option>
                                    <option value="Saric">Saric</option>
                                    <option value="Soyopa">Soyopa</option>
                                    <option value="Suaqui Grande">Suaqui Grande</option>
                                    <option value="Tepache">Tepache</option>
                                    <option value="Trincheras">Trincheras</option>
                                    <option value="Tubutama">Tubutama</option>
                                    <option value="Ures">Ures</option>
                                    <option value="Villa Hidalgo">Villa Hidalgo</option>
                                    <option value="Villa Pesqueira">Villa Pesqueira</option>
                                    <option value="Yecora">Yecora</option>
                                    <option value="General Plutarco Elias Calles">General Plutarco Elias Calles</option>
                                    <option value="Benito Juarez">Benito Juarez</option>
                                    <option value="San Ignacio Rio Muerto">San Ignacio Rio Muerto</option>
                                  </select>
                                </div>
                                <div class="form-group col-sm-6 col-lg-4"  id="tabasco" style="display: none;" >
                                  {!! Form::label('municipality', 'Municipio:') !!}
                                  <select name="municipality" class="input-lg form-control">
                                    <option value="Balancan">Balancan</option>
                                    <option value="Cardenas">Cardenas</option>
                                    <option value="Centla">Centla</option>
                                    <option value="Centro">Centro</option>
                                    <option value="Comalcalco">Comalcalco</option>
                                    <option value="Cunduacan">Cunduacan</option>
                                    <option value="Emiliano Zapata">Emiliano Zapata</option>
                                    <option value="Huimanguillo">Huimanguillo</option>
                                    <option value="Jalapa">Jalapa</option>
                                    <option value="Jalpa de Mendez">Jalpa de Mendez</option>
                                    <option value="Jonuta">Jonuta</option>
                                    <option value="Macuspana">Macuspana</option>
                                    <option value="Nacajuca">Nacajuca</option>
                                    <option value="Paraiso">Paraiso</option>
                                    <option value="Tacotalpa">Tacotalpa</option>
                                    <option value="Teapa">Teapa</option>
                                    <option value="Tenosique">Tenosique</option>
                                  </select>
                                </div>
                                <div class="form-group col-sm-6 col-lg-4"  id="tamaulipas" style="display: none;" >
                                  {!! Form::label('municipality', 'Municipio:') !!}
                                  <select name="municipality" class="input-lg form-control">
                                    <option value="Abasolo">Abasolo</option>
                                    <option value="Aldama">Aldama</option>
                                    <option value="Altamira">Altamira</option>
                                    <option value="Antiguo Morelos">Antiguo Morelos</option>
                                    <option value="Burgos">Burgos</option>
                                    <option value="Bustamante">Bustamante</option>
                                    <option value="Camargo">Camargo</option>
                                    <option value="Casas">Casas</option>
                                    <option value="Ciudad Madero">Ciudad Madero</option>
                                    <option value="Cruillas">Cruillas</option>
                                    <option value="Gomez Farias">Gomez Farias</option>
                                    <option value="Gonzalez">Gonzalez</option>
                                    <option value="G">G</option>
                                    <option value="Guerrero">Guerrero</option>
                                    <option value="Gustavo Diaz Ordaz">Gustavo Diaz Ordaz</option>
                                    <option value="Hidalgo">Hidalgo</option>
                                    <option value="Jaumave">Jaumave</option>
                                    <option value="Jimenez">Jimenez</option>
                                    <option value="Llera">Llera</option>
                                    <option value="Mainero">Mainero</option>
                                    <option value="El Mante">El Mante</option>
                                    <option value="Matamoros">Matamoros</option>
                                    <option value="Mendez">Mendez</option>
                                    <option value="Mier">Mier</option>
                                    <option value="Miguel Aleman">Miguel Aleman</option>
                                    <option value="Miquihuana">Miquihuana</option>
                                    <option value="Nuevo Laredo">Nuevo Laredo</option>
                                    <option value="Nuevo Morelos">Nuevo Morelos</option>
                                    <option value="Ocampo">Ocampo</option>
                                    <option value="Padilla">Padilla</option>
                                    <option value="Palmillas">Palmillas</option>
                                    <option value="Reynosa">Reynosa</option>
                                    <option value="Rio Bravo">Rio Bravo</option>
                                    <option value="San Carlos">San Carlos</option>
                                    <option value="San Fernando">San Fernando</option>
                                    <option value="San Nicolas">San Nicolas</option>
                                    <option value="Soto la Marina">Soto la Marina</option>
                                    <option value="Tampico">Tampico</option>
                                    <option value="Tula">Tula</option>
                                    <option value="Valle Hermoso">Valle Hermoso</option>
                                    <option value="Victoria">Victoria</option>
                                    <option value="Villagran">Villagran</option>
                                    <option value="Xicotencatl">Xicotencatl</option>
                                  </select>
                                </div>
                                <div class="form-group col-sm-6 col-lg-4"  id="tlaxcala" style="display: none;" >
                                  {!! Form::label('municipality', 'Municipio:') !!}
                                  <select name="municipality" class="input-lg form-control">
                                    <option value="Amaxac de Guerrero">Amaxac de Guerrero</option>
                                    <option value="Apetatitlan de Antonio Carvajal">Apetatitlan de Antonio Carvajal</option>
                                    <option value="Atlangatepec">Atlangatepec</option>
                                    <option value="Atltzayanca">Atltzayanca</option>
                                    <option value="Apizaco">Apizaco</option>
                                    <option value="Calpulalpan">Calpulalpan</option>
                                    <option value="El Carmen Tequexquitla">El Carmen Tequexquitla</option>
                                    <option value="Cuapiaxtla">Cuapiaxtla</option>
                                    <option value="Cuaxomulco">Cuaxomulco</option>
                                    <option value="Chiautempan">Chiautempan</option>
                                    <option value="Mu">Mu</option>
                                    <option value="Espa">Espa</option>
                                    <option value="Huamantla">Huamantla</option>
                                    <option value="Hueyotlipan">Hueyotlipan</option>
                                    <option value="Ixtacuixtla de Mariano Matamoros">Ixtacuixtla de Mariano Matamoros</option>
                                    <option value="Ixtenco">Ixtenco</option>
                                    <option value="Mazatecochco de Jose Maria Morelos">Mazatecochco de Jose Maria Morelos</option>
                                    <option value="Contla de Juan Cuamatzi">Contla de Juan Cuamatzi</option>
                                    <option value="Tepetitla de Lardizabal">Tepetitla de Lardizabal</option>
                                    <option value="Sanctorum de Lazaro Cardenas">Sanctorum de Lazaro Cardenas</option>
                                    <option value="Nanacamilpa de Mariano Arista">Nanacamilpa de Mariano Arista</option>
                                    <option value="Acuamanala de Miguel Hidalgo">Acuamanala de Miguel Hidalgo</option>
                                    <option value="Nativitas">Nativitas</option>
                                    <option value="Panotla">Panotla</option>
                                    <option value="San Pablo del Monte">San Pablo del Monte</option>
                                    <option value="Santa Cruz Tlaxcala">Santa Cruz Tlaxcala</option>
                                    <option value="Tenancingo">Tenancingo</option>
                                    <option value="Teolocholco">Teolocholco</option>
                                    <option value="Tepeyanco">Tepeyanco</option>
                                    <option value="Terrenate">Terrenate</option>
                                    <option value="Tetla de la Solidaridad">Tetla de la Solidaridad</option>
                                    <option value="Tetlatlahuca">Tetlatlahuca</option>
                                    <option value="Tlaxcala">Tlaxcala</option>
                                    <option value="Tlaxco">Tlaxco</option>
                                    <option value="Tocatlan">Tocatlan</option>
                                    <option value="Totolac">Totolac</option>
                                    <option value="Ziltlaltepec de Trinidad Sanchez Santos">Ziltlaltepec de Trinidad Sanchez Santos</option>
                                    <option value="Tzompantepec">Tzompantepec</option>
                                    <option value="Xaloztoc">Xaloztoc</option>
                                    <option value="Xaltocan">Xaltocan</option>
                                    <option value="Papalotla de Xicohtencatl">Papalotla de Xicohtencatl</option>
                                    <option value="Xicohtzinco">Xicohtzinco</option>
                                    <option value="Yauhquemehcan">Yauhquemehcan</option>
                                    <option value="Zacatelco">Zacatelco</option>
                                    <option value="Benito Juarez">Benito Juarez</option>
                                    <option value="Emiliano Zapata">Emiliano Zapata</option>
                                    <option value="Lazaro Cardenas">Lazaro Cardenas</option>
                                    <option value="La Magdalena Tlaltelulco">La Magdalena Tlaltelulco</option>
                                    <option value="San Damian Texoloc">San Damian Texoloc</option>
                                    <option value="San Francisco Tetlanohcan">San Francisco Tetlanohcan</option>
                                    <option value="San Jeronimo Zacualpan">San Jeronimo Zacualpan</option>
                                    <option value="San Jose Teacalco">San Jose Teacalco</option>
                                    <option value="San Juan Huactzinco">San Juan Huactzinco</option>
                                    <option value="San Lorenzo Axocomanitla">San Lorenzo Axocomanitla</option>
                                    <option value="San Lucas Tecopilco">San Lucas Tecopilco</option>
                                    <option value="Santa Ana Nopalucan">Santa Ana Nopalucan</option>
                                    <option value="Santa Apolonia Teacalco">Santa Apolonia Teacalco</option>
                                    <option value="Santa Catarina Ayometla">Santa Catarina Ayometla</option>
                                    <option value="Santa Cruz Quilehtla">Santa Cruz Quilehtla</option>
                                    <option value="Santa Isabel Xiloxoxtla">Santa Isabel Xiloxoxtla</option>
                                  </select>
                                </div>
                                <div class="form-group col-sm-6 col-lg-4"  id="veracruz" style="display: none;" >
                                  {!! Form::label('municipality', 'Municipio:') !!}
                                  <select name="municipality" class="input-lg form-control">
                                    <option value="Acajete">Acajete</option>
                                    <option value="Acatlan">Acatlan</option>
                                    <option value="Acayucan">Acayucan</option>
                                    <option value="Actopan">Actopan</option>
                                    <option value="Acula">Acula</option>
                                    <option value="Acultzingo">Acultzingo</option>
                                    <option value="Camaron de Tejeda">Camaron de Tejeda</option>
                                    <option value="Alpatlahuac">Alpatlahuac</option>
                                    <option value="Alto Lucero de Gutierrez Barrios">Alto Lucero de Gutierrez Barrios</option>
                                    <option value="Altotonga">Altotonga</option>
                                    <option value="Alvarado">Alvarado</option>
                                    <option value="Amatitlan">Amatitlan</option>
                                    <option value="Naranjos Amatlan">Naranjos Amatlan</option>
                                    <option value="Amatlan de los Reyes">Amatlan de los Reyes</option>
                                    <option value="Angel R. Cabada">Angel R. Cabada</option>
                                    <option value="La Antigua">La Antigua</option>
                                    <option value="Apazapan">Apazapan</option>
                                    <option value="Aquila">Aquila</option>
                                    <option value="Astacinga">Astacinga</option>
                                    <option value="Atlahuilco">Atlahuilco</option>
                                    <option value="Atoyac">Atoyac</option>
                                    <option value="Atzacan">Atzacan</option>
                                    <option value="Atzalan">Atzalan</option>
                                    <option value="Tlaltetela">Tlaltetela</option>
                                    <option value="Ayahualulco">Ayahualulco</option>
                                    <option value="Banderilla">Banderilla</option>
                                    <option value="Benito Juarez">Benito Juarez</option>
                                    <option value="Boca del Rio">Boca del Rio</option>
                                    <option value="Calcahualco">Calcahualco</option>
                                    <option value="Camerino Z. Mendoza">Camerino Z. Mendoza</option>
                                    <option value="Carrillo Puerto">Carrillo Puerto</option>
                                    <option value="Catemaco">Catemaco</option>
                                    <option value="Cazones de Herrera">Cazones de Herrera</option>
                                    <option value="Cerro Azul">Cerro Azul</option>
                                    <option value="Citlaltepetl">Citlaltepetl</option>
                                    <option value="Coacoatzintla">Coacoatzintla</option>
                                    <option value="Coahuitlan">Coahuitlan</option>
                                    <option value="Coatepec">Coatepec</option>
                                    <option value="Coatzacoalcos">Coatzacoalcos</option>
                                    <option value="Coatzintla">Coatzintla</option>
                                    <option value="Coetzala">Coetzala</option>
                                    <option value="Colipa">Colipa</option>
                                    <option value="Comapa">Comapa</option>
                                    <option value="Cordoba">Cordoba</option>
                                    <option value="Cosamaloapan de Carpio">Cosamaloapan de Carpio</option>
                                    <option value="Cosautlan de Carvajal">Cosautlan de Carvajal</option>
                                    <option value="Coscomatepec">Coscomatepec</option>
                                    <option value="Cosoleacaque">Cosoleacaque</option>
                                    <option value="Cotaxtla">Cotaxtla</option>
                                    <option value="Coxquihui">Coxquihui</option>
                                    <option value="Coyutla">Coyutla</option>
                                    <option value="Cuichapa">Cuichapa</option>
                                    <option value="Cuitlahuac">Cuitlahuac</option>
                                    <option value="Chacaltianguis">Chacaltianguis</option>
                                    <option value="Chalma">Chalma</option>
                                    <option value="Chiconamel">Chiconamel</option>
                                    <option value="Chiconquiaco">Chiconquiaco</option>
                                    <option value="Chicontepec">Chicontepec</option>
                                    <option value="Chinameca">Chinameca</option>
                                    <option value="Chinampa de Gorostiza">Chinampa de Gorostiza</option>
                                    <option value="Las Choapas">Las Choapas</option>
                                    <option value="Chocaman">Chocaman</option>
                                    <option value="Chontla">Chontla</option>
                                    <option value="Chumatlan">Chumatlan</option>
                                    <option value="Emiliano Zapata">Emiliano Zapata</option>
                                    <option value="Espinal">Espinal</option>
                                    <option value="Filomeno Mata">Filomeno Mata</option>
                                    <option value="Fortin">Fortin</option>
                                    <option value="Gutierrez Zamora">Gutierrez Zamora</option>
                                    <option value="Hidalgotitlan">Hidalgotitlan</option>
                                    <option value="Huatusco">Huatusco</option>
                                    <option value="Huayacocotla">Huayacocotla</option>
                                    <option value="Hueyapan de Ocampo">Hueyapan de Ocampo</option>
                                    <option value="Huiloapan de Cuauhtemoc">Huiloapan de Cuauhtemoc</option>
                                    <option value="Ignacio de la Llave">Ignacio de la Llave</option>
                                    <option value="Ilamatlan">Ilamatlan</option>
                                    <option value="Isla">Isla</option>
                                    <option value="Ixcatepec">Ixcatepec</option>
                                    <option value="Ixhuacan de los Reyes">Ixhuacan de los Reyes</option>
                                    <option value="Ixhuatlan del Cafe">Ixhuatlan del Cafe</option>
                                    <option value="Ixhuatlancillo">Ixhuatlancillo</option>
                                    <option value="Ixhuatlan del Sureste">Ixhuatlan del Sureste</option>
                                    <option value="Ixhuatlan de Madero">Ixhuatlan de Madero</option>
                                    <option value="Ixmatlahuacan">Ixmatlahuacan</option>
                                    <option value="Ixtaczoquitlan">Ixtaczoquitlan</option>
                                    <option value="Jalacingo">Jalacingo</option>
                                    <option value="Xalapa">Xalapa</option>
                                    <option value="Jalcomulco">Jalcomulco</option>
                                    <option value="Jaltipan">Jaltipan</option>
                                    <option value="Jamapa">Jamapa</option>
                                    <option value="Jesus Carranza">Jesus Carranza</option>
                                    <option value="Xico">Xico</option>
                                    <option value="Jilotepec">Jilotepec</option>
                                    <option value="Juan Rodriguez Clara">Juan Rodriguez Clara</option>
                                    <option value="Juchique de Ferrer">Juchique de Ferrer</option>
                                    <option value="Landero y Coss">Landero y Coss</option>
                                    <option value="Lerdo de Tejada">Lerdo de Tejada</option>
                                    <option value="Magdalena">Magdalena</option>
                                    <option value="Maltrata">Maltrata</option>
                                    <option value="Manlio Fabio Altamirano">Manlio Fabio Altamirano</option>
                                    <option value="Mariano Escobedo">Mariano Escobedo</option>
                                    <option value="Martinez de la Torre">Martinez de la Torre</option>
                                    <option value="Mecatlan">Mecatlan</option>
                                    <option value="Mecayapan">Mecayapan</option>
                                    <option value="Medellin">Medellin</option>
                                    <option value="Miahuatlan">Miahuatlan</option>
                                    <option value="Las Minas">Las Minas</option>
                                    <option value="Minatitlan">Minatitlan</option>
                                    <option value="Misantla">Misantla</option>
                                    <option value="Mixtla de Altamirano">Mixtla de Altamirano</option>
                                    <option value="Moloacan">Moloacan</option>
                                    <option value="Naolinco">Naolinco</option>
                                    <option value="Naranjal">Naranjal</option>
                                    <option value="Nautla">Nautla</option>
                                    <option value="Nogales">Nogales</option>
                                    <option value="Oluta">Oluta</option>
                                    <option value="Omealca">Omealca</option>
                                    <option value="Orizaba">Orizaba</option>
                                    <option value="Otatitlan">Otatitlan</option>
                                    <option value="Oteapan">Oteapan</option>
                                    <option value="Ozuluama de Mascare">Ozuluama de Mascare</option>
                                    <option value="Pajapan">Pajapan</option>
                                    <option value="Panuco">Panuco</option>
                                    <option value="Papantla">Papantla</option>
                                    <option value="Paso del Macho">Paso del Macho</option>
                                    <option value="Paso de Ovejas">Paso de Ovejas</option>
                                    <option value="La Perla">La Perla</option>
                                    <option value="Perote">Perote</option>
                                    <option value="Platon Sanchez">Platon Sanchez</option>
                                    <option value="Playa Vicente">Playa Vicente</option>
                                    <option value="Poza Rica de Hidalgo">Poza Rica de Hidalgo</option>
                                    <option value="Las Vigas de Ramirez">Las Vigas de Ramirez</option>
                                    <option value="Pueblo Viejo">Pueblo Viejo</option>
                                    <option value="Puente Nacional">Puente Nacional</option>
                                    <option value="Rafael Delgado">Rafael Delgado</option>
                                    <option value="Rafael Lucio">Rafael Lucio</option>
                                    <option value="Los Reyes">Los Reyes</option>
                                    <option value="Rio Blanco">Rio Blanco</option>
                                    <option value="Saltabarranca">Saltabarranca</option>
                                    <option value="San Andres Tenejapan">San Andres Tenejapan</option>
                                    <option value="San Andres Tuxtla">San Andres Tuxtla</option>
                                    <option value="San Juan Evangelista">San Juan Evangelista</option>
                                    <option value="Santiago Tuxtla">Santiago Tuxtla</option>
                                    <option value="Sayula de Aleman">Sayula de Aleman</option>
                                    <option value="Soconusco">Soconusco</option>
                                    <option value="Sochiapa">Sochiapa</option>
                                    <option value="Soledad Atzompa">Soledad Atzompa</option>
                                    <option value="Soledad de Doblado">Soledad de Doblado</option>
                                    <option value="Soteapan">Soteapan</option>
                                    <option value="Tamalin">Tamalin</option>
                                    <option value="Tamiahua">Tamiahua</option>
                                    <option value="Tampico Alto">Tampico Alto</option>
                                    <option value="Tancoco">Tancoco</option>
                                    <option value="Tantima">Tantima</option>
                                    <option value="Tantoyuca">Tantoyuca</option>
                                    <option value="Tatatila">Tatatila</option>
                                    <option value="Castillo de Teayo">Castillo de Teayo</option>
                                    <option value="Tecolutla">Tecolutla</option>
                                    <option value="Tehuipango">Tehuipango</option>
                                    <option value="Alamo Temapache">Alamo Temapache</option>
                                    <option value="Tempoal">Tempoal</option>
                                    <option value="Tenampa">Tenampa</option>
                                    <option value="Tenochtitlan">Tenochtitlan</option>
                                    <option value="Teocelo">Teocelo</option>
                                    <option value="Tepatlaxco">Tepatlaxco</option>
                                    <option value="Tepetlan">Tepetlan</option>
                                    <option value="Tepetzintla">Tepetzintla</option>
                                    <option value="Tequila">Tequila</option>
                                    <option value="Jose Azueta">Jose Azueta</option>
                                    <option value="Texcatepec">Texcatepec</option>
                                    <option value="Texhuacan">Texhuacan</option>
                                    <option value="Texistepec">Texistepec</option>
                                    <option value="Tezonapa">Tezonapa</option>
                                    <option value="Tierra Blanca">Tierra Blanca</option>
                                    <option value="Tihuatlan">Tihuatlan</option>
                                    <option value="Tlacojalpan">Tlacojalpan</option>
                                    <option value="Tlacolulan">Tlacolulan</option>
                                    <option value="Tlacotalpan">Tlacotalpan</option>
                                    <option value="Tlacotepec de Mejia">Tlacotepec de Mejia</option>
                                    <option value="Tlachichilco">Tlachichilco</option>
                                    <option value="Tlalixcoyan">Tlalixcoyan</option>
                                    <option value="Tlalnelhuayocan">Tlalnelhuayocan</option>
                                    <option value="Tlapacoyan">Tlapacoyan</option>
                                    <option value="Tlaquilpa">Tlaquilpa</option>
                                    <option value="Tlilapan">Tlilapan</option>
                                    <option value="Tomatlan">Tomatlan</option>
                                    <option value="Tonayan">Tonayan</option>
                                    <option value="Totutla">Totutla</option>
                                    <option value="Tuxpan">Tuxpan</option>
                                    <option value="Tuxtilla">Tuxtilla</option>
                                    <option value="Ursulo Galvan">Ursulo Galvan</option>
                                    <option value="Vega de Alatorre">Vega de Alatorre</option>
                                    <option value="Veracruz">Veracruz</option>
                                    <option value="Villa Aldama">Villa Aldama</option>
                                    <option value="Xoxocotla">Xoxocotla</option>
                                    <option value="Yanga">Yanga</option>
                                    <option value="Yecuatla">Yecuatla</option>
                                    <option value="Zacualpan">Zacualpan</option>
                                    <option value="Zaragoza">Zaragoza</option>
                                    <option value="Zentla">Zentla</option>
                                    <option value="Zongolica">Zongolica</option>
                                    <option value="Zontecomatlan de Lopez y Fuentes">Zontecomatlan de Lopez y Fuentes</option>
                                    <option value="Zozocolco de Hidalgo">Zozocolco de Hidalgo</option>
                                    <option value="Agua Dulce">Agua Dulce</option>
                                    <option value="El Higo">El Higo</option>
                                    <option value="Nanchital de Lazaro Cardenas del Rio">Nanchital de Lazaro Cardenas del Rio</option>
                                    <option value="Tres Valles">Tres Valles</option>
                                    <option value="Carlos A. Carrillo">Carlos A. Carrillo</option>
                                    <option value="Tatahuicapan de Juarez">Tatahuicapan de Juarez</option>
                                    <option value="Uxpanapa">Uxpanapa</option>
                                    <option value="San Rafael">San Rafael</option>
                                    <option value="Santiago Sochiapan">Santiago Sochiapan</option>
                                  </select>
                                </div>
                                <div class="form-group col-sm-6 col-lg-4"  id="yucatan" style="display: none;" >
                                  {!! Form::label('municipality', 'Municipio:') !!}
                                  <select name="municipality" class="input-lg form-control">
                                    <option value="Abala">Abala</option>
                                    <option value="Acanceh">Acanceh</option>
                                    <option value="Akil">Akil</option>
                                    <option value="Baca">Baca</option>
                                    <option value="Bokoba">Bokoba</option>
                                    <option value="Buctzotz">Buctzotz</option>
                                    <option value="Cacalchen">Cacalchen</option>
                                    <option value="Calotmul">Calotmul</option>
                                    <option value="Cansahcab">Cansahcab</option>
                                    <option value="Cantamayec">Cantamayec</option>
                                    <option value="Celestun">Celestun</option>
                                    <option value="Cenotillo">Cenotillo</option>
                                    <option value="Conkal">Conkal</option>
                                    <option value="Cuncunul">Cuncunul</option>
                                    <option value="Cuzama">Cuzama</option>
                                    <option value="Chacsinkin">Chacsinkin</option>
                                    <option value="Chankom">Chankom</option>
                                    <option value="Chapab">Chapab</option>
                                    <option value="Chemax">Chemax</option>
                                    <option value="Chicxulub Pueblo">Chicxulub Pueblo</option>
                                    <option value="Chichimila">Chichimila</option>
                                    <option value="Chikindzonot">Chikindzonot</option>
                                    <option value="Chochola">Chochola</option>
                                    <option value="Chumayel">Chumayel</option>
                                    <option value="Dzan">Dzan</option>
                                    <option value="Dzemul">Dzemul</option>
                                    <option value="Dzidzantun">Dzidzantun</option>
                                    <option value="Dzilam de Bravo">Dzilam de Bravo</option>
                                    <option value="Dzilam Gonzalez">Dzilam Gonzalez</option>
                                    <option value="Dzitas">Dzitas</option>
                                    <option value="Dzoncauich">Dzoncauich</option>
                                    <option value="Espita">Espita</option>
                                    <option value="Halacho">Halacho</option>
                                    <option value="Hocaba">Hocaba</option>
                                    <option value="Hoctun">Hoctun</option>
                                    <option value="Homun">Homun</option>
                                    <option value="Huhi">Huhi</option>
                                    <option value="Hunucma">Hunucma</option>
                                    <option value="Ixil">Ixil</option>
                                    <option value="Izamal">Izamal</option>
                                    <option value="Kanasin">Kanasin</option>
                                    <option value="Kantunil">Kantunil</option>
                                    <option value="Kaua">Kaua</option>
                                    <option value="Kinchil">Kinchil</option>
                                    <option value="Kopoma">Kopoma</option>
                                    <option value="Mama">Mama</option>
                                    <option value="Mani">Mani</option>
                                    <option value="Maxcanu">Maxcanu</option>
                                    <option value="Mayapan">Mayapan</option>
                                    <option value="Merida">Merida</option>
                                    <option value="Mococha">Mococha</option>
                                    <option value="Motul">Motul</option>
                                    <option value="Muna">Muna</option>
                                    <option value="Muxupip">Muxupip</option>
                                    <option value="Opichen">Opichen</option>
                                    <option value="Oxkutzcab">Oxkutzcab</option>
                                    <option value="Panaba">Panaba</option>
                                    <option value="Peto">Peto</option>
                                    <option value="Progreso">Progreso</option>
                                    <option value="Quintana Roo">Quintana Roo</option>
                                    <option value="Rio Lagartos">Rio Lagartos</option>
                                    <option value="Sacalum">Sacalum</option>
                                    <option value="Samahil">Samahil</option>
                                    <option value="Sanahcat">Sanahcat</option>
                                    <option value="San Felipe">San Felipe</option>
                                    <option value="Santa Elena">Santa Elena</option>
                                    <option value="Seye">Seye</option>
                                    <option value="Sinanche">Sinanche</option>
                                    <option value="Sotuta">Sotuta</option>
                                    <option value="Sucila">Sucila</option>
                                    <option value="Sudzal">Sudzal</option>
                                    <option value="Suma">Suma</option>
                                    <option value="Tahdziu">Tahdziu</option>
                                    <option value="Tahmek">Tahmek</option>
                                    <option value="Teabo">Teabo</option>
                                    <option value="Tecoh">Tecoh</option>
                                    <option value="Tekal de Venegas">Tekal de Venegas</option>
                                    <option value="Tekanto">Tekanto</option>
                                    <option value="Tekax">Tekax</option>
                                    <option value="Tekit">Tekit</option>
                                    <option value="Tekom">Tekom</option>
                                    <option value="Telchac Pueblo">Telchac Pueblo</option>
                                    <option value="Telchac Puerto">Telchac Puerto</option>
                                    <option value="Temax">Temax</option>
                                    <option value="Temozon">Temozon</option>
                                    <option value="Tepakan">Tepakan</option>
                                    <option value="Tetiz">Tetiz</option>
                                    <option value="Teya">Teya</option>
                                    <option value="Ticul">Ticul</option>
                                    <option value="Timucuy">Timucuy</option>
                                    <option value="Tinum">Tinum</option>
                                    <option value="Tixcacalcupul">Tixcacalcupul</option>
                                    <option value="Tixkokob">Tixkokob</option>
                                    <option value="Tixmehuac">Tixmehuac</option>
                                    <option value="Tixpehual">Tixpehual</option>
                                    <option value="Tizimin">Tizimin</option>
                                    <option value="Tunkas">Tunkas</option>
                                    <option value="Tzucacab">Tzucacab</option>
                                    <option value="Uayma">Uayma</option>
                                    <option value="Ucu">Ucu</option>
                                    <option value="Uman">Uman</option>
                                    <option value="Valladolid">Valladolid</option>
                                    <option value="Xocchel">Xocchel</option>
                                    <option value="Yaxcaba">Yaxcaba</option>
                                    <option value="Yaxkukul">Yaxkukul</option>
                                    <option value="Yobain">Yobain</option>
                                  </select>
                                </div>
                                <div class="form-group col-sm-6 col-lg-4"  id="zacatecas" style="display: none;" >
                                  {!! Form::label('municipality', 'Municipio:') !!}
                                  <select name="municipality" class="input-lg form-control">
                                    <option value="Apozol">Apozol</option>
                                    <option value="Apulco">Apulco</option>
                                    <option value="Atolinga">Atolinga</option>
                                    <option value="Benito Juarez">Benito Juarez</option>
                                    <option value="Calera">Calera</option>
                                    <option value="Ca">Ca</option>
                                    <option value="Concepcion del Oro">Concepcion del Oro</option>
                                    <option value="Cuauhtemoc">Cuauhtemoc</option>
                                    <option value="Chalchihuites">Chalchihuites</option>
                                    <option value="Fresnillo">Fresnillo</option>
                                    <option value="Trinidad Garcia de la Cadena">Trinidad Garcia de la Cadena</option>
                                    <option value="Genaro Codina">Genaro Codina</option>
                                    <option value="General Enrique Estrada">General Enrique Estrada</option>
                                    <option value="General Francisco R. Murguia">General Francisco R. Murguia</option>
                                    <option value="El Plateado de Joaquin Amaro">El Plateado de Joaquin Amaro</option>
                                    <option value="General Panfilo Natera">General Panfilo Natera</option>
                                    <option value="Guadalupe">Guadalupe</option>
                                    <option value="Huanusco">Huanusco</option>
                                    <option value="Jalpa">Jalpa</option>
                                    <option value="Jerez">Jerez</option>
                                    <option value="Jimenez del Teul">Jimenez del Teul</option>
                                    <option value="Juan Aldama">Juan Aldama</option>
                                    <option value="Juchipila">Juchipila</option>
                                    <option value="Loreto">Loreto</option>
                                    <option value="Luis Moya">Luis Moya</option>
                                    <option value="Mazapil">Mazapil</option>
                                    <option value="Melchor Ocampo">Melchor Ocampo</option>
                                    <option value="Mezquital del Oro">Mezquital del Oro</option>
                                    <option value="Miguel Auza">Miguel Auza</option>
                                    <option value="Momax">Momax</option>
                                    <option value="Monte Escobedo">Monte Escobedo</option>
                                    <option value="Morelos">Morelos</option>
                                    <option value="Moyahua de Estrada">Moyahua de Estrada</option>
                                    <option value="Nochistlan de Mejia">Nochistlan de Mejia</option>
                                    <option value="Noria de Angeles">Noria de Angeles</option>
                                    <option value="Ojocaliente">Ojocaliente</option>
                                    <option value="Panuco">Panuco</option>
                                    <option value="Pinos">Pinos</option>
                                    <option value="Rio Grande">Rio Grande</option>
                                    <option value="Sain Alto">Sain Alto</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Sombrerete">Sombrerete</option>
                                    <option value="Susticacan">Susticacan</option>
                                    <option value="Tabasco">Tabasco</option>
                                    <option value="Tepechitlan">Tepechitlan</option>
                                    <option value="Tepetongo">Tepetongo</option>
                                    <option value="Teul de Gonzalez Ortega">Teul de Gonzalez Ortega</option>
                                    <option value="Tlaltenango de Sanchez Roman">Tlaltenango de Sanchez Roman</option>
                                    <option value="Valparaiso">Valparaiso</option>
                                    <option value="Vetagrande">Vetagrande</option>
                                    <option value="Villa de Cos">Villa de Cos</option>
                                    <option value="Villa Garcia">Villa Garcia</option>
                                    <option value="Villa Gonzalez Ortega">Villa Gonzalez Ortega</option>
                                    <option value="Villa Hidalgo">Villa Hidalgo</option>
                                    <option value="Villanueva">Villanueva</option>
                                    <option value="Zacatecas">Zacatecas</option>
                                    <option value="Trancoso">Trancoso</option>
                                    <option value="Santa Maria de la Paz">Santa Maria de la Paz</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group col-sm-12 col-lg-12">
                                <div class="form-group col-sm-6 col-lg-4">
                                  {!! Form::label('colony', 'Colonia:') !!}
                                  {!! Form::text('colony', null, [
                                    'style' => 'text-transform:uppercase',
                                    'class' => 'form-control input-lg', 
                                    'placeholder' => 'ESCRIBE COLONIA', 
                                    'required' => 'required',
                                    'data-parsley-trigger ' => 'input focusin',
                                    'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                                  </div>

                                  <div class="form-group col-sm-6 col-lg-4">
                                    {!! Form::label('type_of_road', 'Tipo Vialidad:') !!}
                                    {!! Form::select('type_of_road', ['AMPLIACIÓN' => 'AMPLIACIÓN', 'ANDADOR' => 'ANDADOR', 'AVENIDA' => 'AVENIDA', 'BOULEVARD' => 'BOULEVARD', 'CALLE' => 'CALLE', 'CALLEJÓN' => 'CALLEJÓN', 'CALZADA' => 'CALZADA', 'CERRADA' => 'CERRADA', 'CIRCUITO' => 'CIRCUITO', 'CIRCUNVALACIÓN' => 'CIRCUNVALACIÓN', 'CONTINUACIÓN' => 'CONTINUACIÓN', 'CORREDOR' => 'CORREDOR', 'DIAGONAL' => 'DIAGONAL', 'EJE VIAL' => 'EJE VIAL', 'PASAJE' => 'PASAJE', 'PEATONAL' => 'PEATONAL', 'PERIFÉRICO' => 'PERIFÉRICO', 'PRIVADA' => 'PRIVADA', 'PROLONGACIÓN' => 'PROLONGACIÓN', 'RETORNO' => 'RETORNO', 'VIADUCTO' => 'VIADUCTO'], null, [
                                      'style' => 'text-transform:uppercase',
                                      'class' => 'form-control input-lg',
                                      'required' => 'required',
                                      'data-parsley-trigger ' => 'input focusin',]) !!}
                                    </div>

                                    <div class="form-group col-sm-6 col-lg-4">
                                      {!! Form::label('name_road', 'Nombre Vialidad:') !!}
                                      {!! Form::text('name_road', null, [
                                        'style' => 'text-transform:uppercase',
                                        'class' => 'form-control input-lg', 
                                        'placeholder' => 'ESCRIBE NOMBRE VIALIDAD', 
                                        'required' => 'required',
                                        'data-parsley-trigger ' => 'input focusin',
                                        'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                                      </div>
                                    </div>
                                    <div class="form-group col-sm-12 col-lg-12">
                                      <div class="form-group col-sm-6 col-lg-4">
                                        {!! Form::label('outdoor_number', 'Nº E.:') !!}
                                        {!! Form::text('outdoor_number', null, [
                                          'style' => 'text-transform:uppercase',
                                          'class' => 'form-control input-lg', 
                                          'placeholder' => 'ESCRIBE NÚMERO EXTERIOR',
                                          'required' => 'required',
                                          'data-parsley-type' => 'digits',
                                          'data-parsley-maxlength' => '5',
                                          'data-parsley-trigger ' => 'input focusin',
                                          'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                                        </div>

                                        <div class="form-group col-sm-6 col-lg-4">
                                          {!! Form::label('interior_number', 'Nº I.:') !!}
                                          {!! Form::text('interior_number', null, [
                                            'style' => 'text-transform:uppercase',
                                            'class' => 'form-control input-lg', 
                                            'placeholder' => 'ESCRIBE NÚMERO INTERIOR', 
                                            'required' => 'required',
                                            'data-parsley-type' => 'digits',
                                            'data-parsley-maxlength' => '5',   
                                            'data-parsley-trigger ' => 'input focusin',
                                            'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                                          </div>

                                          <div class="form-group col-sm-6 col-lg-4">
                                            {!! Form::label('postal_code', 'Código Postal:') !!}
                                            <input type="number" name="postal_code" class="form-control input-lg" placeholder="ESCRIBE CÓDIGO POSTAL" required="required" data-parsley-trigger="input focusin" data-parsley-type="digits" data-parsley-maxlength="5">
                                          </div>
                                        </div>
                                        <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Siguiente</button>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row setup-content" id="step-3">
                                    <div class="col-xs-12">
                                      <div class="col-md-12">
                                        <h3> Identificaciones</h3>
                                        <div class="form-group col-sm-12 col-lg-12">
                                          <div class="form-group col-sm-6 col-lg-4">
                                            {!! Form::label('ine', 'CLAVE DE ELECTOR INE:') !!} <a href="http://listanominal.ine.mx/" target="_blank" onClick="window.open(this.href, this.target, 'width=500,height=500'); return false;"> CONSULTA INE</a>
                                            {!! Form::text('ine', null, [
                                              'style' => 'text-transform:uppercase',
                                              'class' => 'form-control input-lg', 
                                              'placeholder' => 'ESCRIBE INE', 
                                              'required' => 'required',
                                              'data-parsley-type' => 'digits',
                                              'data-parsley-trigger ' => 'input focusin',
                                              'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
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
                                                {!! Form::label('rfc', 'RFC:') !!}
                                                {!! Form::text('rfc', null, [
                                                  'style' => 'text-transform:uppercase',
                                                  'class' => 'form-control input-lg', 
                                                  'placeholder' => 'ESCRIBE RFC', 
                                                  'required' => 'required',
                                                  'data-parsley-trigger ' => 'input focusin',
                                                  'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                                                </div>
                                              </div>
                                              <div class="form-group col-sm-12 col-lg-12">
                                                <div class="form-group col-sm-6 col-lg-4">
                                                  {!! Form::label('passport', 'PASAPORTE:') !!}
                                                  {!! Form::text('passport', null, [
                                                    'style' => 'text-transform:uppercase',
                                                    'class' => 'form-control input-lg', 
                                                    'placeholder' => 'ESCRIBE PASAPORTE', 
                                                    'required' => 'required',
                                                    'data-parsley-trigger ' => 'input focusin',
                                                    'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                                                  </div>

                                                  <div class="form-group col-sm-6 col-lg-4">
                                                    {!! Form::label('number_imss', 'IMSS:') !!}
                                                    {!! Form::text('number_imss', null, [
                                                      'style' => 'text-transform:uppercase',
                                                      'class' => 'form-control input-lg', 
                                                      'placeholder' => 'ESCRIBE FOLIO DE IMSS', 
                                                      'required' => 'required',
                                                      'data-parsley-trigger ' => 'input focusin',
                                                      'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                                                    </div>

                                                    <div class="form-group col-sm-6 col-lg-4">
                                                      {!! Form::label('driver_license', 'Licencia de Conducir:') !!}
                                                      {!! Form::text('driver_license', null, [
                                                        'style' => 'text-transform:uppercase',
                                                        'class' => 'form-control input-lg', 
                                                        'placeholder' => 'ESCRIBE LICENCIA DE CONDUCIR', 
                                                        'required' => 'required',
                                                        'data-parsley-trigger ' => 'input focusin',
                                                        'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                                                      </div>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-lg-12">
                                                      <div class="form-group col-sm-6 col-lg-4">
                                                        {!! Form::label('professional_id', 'Cédula Profesional:') !!}
                                                        {!! Form::text('professional_id', null, [
                                                          'style' => 'text-transform:uppercase',
                                                          'class' => 'form-control input-lg', 
                                                          'placeholder' => 'ESCRIBE CÉDULA PROFESIONAL', 
                                                          'required' => 'required',
                                                          'data-parsley-trigger ' => 'input focusin',
                                                          'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                                                        </div>
                                                      </div>
                                                      <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Siguiente</button>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="row setup-content" id="step-4">
                                                  <div class="col-xs-12">
                                                    <div class="col-md-12">
                                                      <h3> Roles</h3>
                                                      @php
                                                      $roles = App\Role::all();
                                                      @endphp  
                                                      <div class="form-group col-sm-12 col-lg-12">               
                                                        <div class="btn-group btn-group" data-toggle="buttons">
                                                          @foreach ($roles as $role) 
                                                          <label class="btn active">
                                                            <input type="checkbox" required="required" data-parsley-trigger="input focusin" name='roles[]' value="{{ $role->id }}"><i class="fa fa-square-o fa-2x"></i><i class="fa fa-check-square-o fa-2x"></i><span> {{ $role->name }}
                                                          </label>
                                                          @endforeach
                                                        </div>
                                                      </div>
                                                      <div class="box-body" >
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
    $("#colima").hide();
    $("#chihuahua").hide();
    $("#df").hide();
    $("#durango").hide();
    $("#guanajuato").hide();
    $("#guerrero").hide();
    $("#hidalgo").hide();
    $("#jalisco").hide();
    $("#mexico").hide();
    $("#michoacan").hide();
    $("#morelos").hide();
    $("#nayarit").hide();
    $("#nuevoleon").hide();
    $("#oaxaca").hide();
    $("#puebla").hide();
    $("#queretaro").hide();
    $("#quintanaroo").hide();
    $("#sanluis").hide();
    $("#sinaloa").hide();
    $("#sonora").hide();
    $("#tabasco").hide();
    $("#tamaulipas").hide();
    $("#tlaxcala").hide();
    $("#veracruz").hide();
    $("#yucatan").hide();
    $("#zacatecas").hide();
  }
  if (id == "AGUASCALIENTES") {
    $("#aguascalientes").show();
    $("#chiapas").hide();
    $("#bajacalifornia").hide();
    $("#bajacaliforniasur").hide();
    $("#campeche").hide();
    $("#coahuila").hide();
    $("#colima").hide();
    $("#chihuahua").hide();
    $("#df").hide();
    $("#durango").hide();
    $("#guanajuato").hide();
    $("#guerrero").hide();
    $("#hidalgo").hide();
    $("#jalisco").hide();
    $("#mexico").hide();
    $("#michoacan").hide();
    $("#morelos").hide();
    $("#nayarit").hide();
    $("#nuevoleon").hide();
    $("#oaxaca").hide();
    $("#puebla").hide();
    $("#queretaro").hide();
    $("#quintanaroo").hide();
    $("#sanluis").hide();
    $("#sinaloa").hide();
    $("#sonora").hide();
    $("#tabasco").hide();
    $("#tamaulipas").hide();
    $("#tlaxcala").hide();
    $("#veracruz").hide();
    $("#yucatan").hide();
    $("#zacatecas").hide();
  }
  if (id == "BAJA CALIFORNIA") {
    $("#aguascalientes").hide();
    $("#chiapas").hide();
    $("#bajacalifornia").show();
    $("#bajacaliforniasur").hide();
    $("#campeche").hide();
    $("#coahuila").hide();
    $("#colima").hide();
    $("#chihuahua").hide();
    $("#df").hide();
    $("#durango").hide();
    $("#guanajuato").hide();
    $("#guerrero").hide();
    $("#hidalgo").hide();
    $("#jalisco").hide();
    $("#mexico").hide();
    $("#michoacan").hide();
    $("#morelos").hide();
    $("#nayarit").hide();
    $("#nuevoleon").hide();
    $("#oaxaca").hide();
    $("#puebla").hide();
    $("#queretaro").hide();
    $("#quintanaroo").hide();
    $("#sanluis").hide();
    $("#sinaloa").hide();
    $("#sonora").hide();
    $("#tabasco").hide();
    $("#tamaulipas").hide();
    $("#tlaxcala").hide();
    $("#veracruz").hide();
    $("#yucatan").hide();
    $("#zacatecas").hide();
  }
  if (id == "BAJA CALIFORNIA SUR") {
    $("#aguascalientes").hide();
    $("#chiapas").hide();
    $("#bajacalifornia").hide();
    $("#bajacaliforniasur").show();
    $("#campeche").hide();
    $("#coahuila").hide();
    $("#colima").hide();
    $("#chihuahua").hide();
    $("#df").hide();
    $("#durango").hide();
    $("#guanajuato").hide();
    $("#guerrero").hide();
    $("#hidalgo").hide();
    $("#jalisco").hide();
    $("#mexico").hide();
    $("#michoacan").hide();
    $("#morelos").hide();
    $("#nayarit").hide();
    $("#nuevoleon").hide();
    $("#oaxaca").hide();
    $("#puebla").hide();
    $("#queretaro").hide();
    $("#quintanaroo").hide();
    $("#sanluis").hide();
    $("#sinaloa").hide();
    $("#sonora").hide();
    $("#tabasco").hide();
    $("#tamaulipas").hide();
    $("#tlaxcala").hide();
    $("#veracruz").hide();
    $("#yucatan").hide();
    $("#zacatecas").hide();
  }
  if (id == "CAMPECHE") {
    $("#aguascalientes").hide();
    $("#chiapas").hide();
    $("#bajacalifornia").hide();
    $("#bajacaliforniasur").hide();
    $("#campeche").show();
    $("#coahuila").hide();
    $("#colima").hide();
    $("#chihuahua").hide();
    $("#df").hide();
    $("#durango").hide();
    $("#guanajuato").hide();
    $("#guerrero").hide();
    $("#hidalgo").hide();
    $("#jalisco").hide();
    $("#mexico").hide();
    $("#michoacan").hide();
    $("#morelos").hide();
    $("#nayarit").hide();
    $("#nuevoleon").hide();
    $("#oaxaca").hide();
    $("#puebla").hide();
    $("#queretaro").hide();
    $("#quintanaroo").hide();
    $("#sanluis").hide();
    $("#sinaloa").hide();
    $("#sonora").hide();
    $("#tabasco").hide();
    $("#tamaulipas").hide();
    $("#tlaxcala").hide();
    $("#veracruz").hide();
    $("#yucatan").hide();
    $("#zacatecas").hide();
  }
  if (id == "COAHUILA DE ZARAGOZA") {
    $("#aguascalientes").hide();
    $("#chiapas").hide();
    $("#bajacalifornia").hide();
    $("#bajacaliforniasur").hide();
    $("#campeche").hide();
    $("#coahuila").show();
    $("#colima").hide();
    $("#chihuahua").hide();
    $("#df").hide();
    $("#durango").hide();
    $("#guanajuato").hide();
    $("#guerrero").hide();
    $("#hidalgo").hide();
    $("#jalisco").hide();
    $("#mexico").hide();
    $("#michoacan").hide();
    $("#morelos").hide();
    $("#nayarit").hide();
    $("#nuevoleon").hide();
    $("#oaxaca").hide();
    $("#puebla").hide();
    $("#queretaro").hide();
    $("#quintanaroo").hide();
    $("#sanluis").hide();
    $("#sinaloa").hide();
    $("#sonora").hide();
    $("#tabasco").hide();
    $("#tamaulipas").hide();
    $("#tlaxcala").hide();
    $("#veracruz").hide();
    $("#yucatan").hide();
    $("#zacatecas").hide();
  }
  if (id == "COLIMA") {
    $("#aguascalientes").hide();
    $("#chiapas").hide();
    $("#bajacalifornia").hide();
    $("#bajacaliforniasur").hide();
    $("#campeche").hide();
    $("#coahuila").hide();
    $("#colima").show();
    $("#chihuahua").hide();
    $("#df").hide();
    $("#durango").hide();
    $("#guanajuato").hide();
    $("#guerrero").hide();
    $("#hidalgo").hide();
    $("#jalisco").hide();
    $("#mexico").hide();
    $("#michoacan").hide();
    $("#morelos").hide();
    $("#nayarit").hide();
    $("#nuevoleon").hide();
    $("#oaxaca").hide();
    $("#puebla").hide();
    $("#queretaro").hide();
    $("#quintanaroo").hide();
    $("#sanluis").hide();
    $("#sinaloa").hide();
    $("#sonora").hide();
    $("#tabasco").hide();
    $("#tamaulipas").hide();
    $("#tlaxcala").hide();
    $("#veracruz").hide();
    $("#yucatan").hide();
    $("#zacatecas").hide();
  }
  if (id == "CHIHUAHUA") {
    $("#aguascalientes").hide();
    $("#chiapas").hide();
    $("#bajacalifornia").hide();
    $("#bajacaliforniasur").hide();
    $("#campeche").hide();
    $("#coahuila").hide();
    $("#colima").hide();
    $("#chihuahua").show();
    $("#df").hide();
    $("#durango").hide();
    $("#guanajuato").hide();
    $("#guerrero").hide();
    $("#hidalgo").hide();
    $("#jalisco").hide();
    $("#mexico").hide();
    $("#michoacan").hide();
    $("#morelos").hide();
    $("#nayarit").hide();
    $("#nuevoleon").hide();
    $("#oaxaca").hide();
    $("#puebla").hide();
    $("#queretaro").hide();
    $("#quintanaroo").hide();
    $("#sanluis").hide();
    $("#sinaloa").hide();
    $("#sonora").hide();
    $("#tabasco").hide();
    $("#tamaulipas").hide();
    $("#tlaxcala").hide();
    $("#veracruz").hide();
    $("#yucatan").hide();
    $("#zacatecas").hide();
  }
  if (id == "DISTRITO FEDERAL") {
    $("#aguascalientes").hide();
    $("#chiapas").hide();
    $("#bajacalifornia").hide();
    $("#bajacaliforniasur").hide();
    $("#campeche").hide();
    $("#coahuila").hide();
    $("#colima").hide();
    $("#chihuahua").hide();
    $("#df").show();
    $("#durango").hide();
    $("#guanajuato").hide();
    $("#guerrero").hide();
    $("#hidalgo").hide();
    $("#jalisco").hide();
    $("#mexico").hide();
    $("#michoacan").hide();
    $("#morelos").hide();
    $("#nayarit").hide();
    $("#nuevoleon").hide();
    $("#oaxaca").hide();
    $("#puebla").hide();
    $("#queretaro").hide();
    $("#quintanaroo").hide();
    $("#sanluis").hide();
    $("#sinaloa").hide();
    $("#sonora").hide();
    $("#tabasco").hide();
    $("#tamaulipas").hide();
    $("#tlaxcala").hide();
    $("#veracruz").hide();
    $("#yucatan").hide();
    $("#zacatecas").hide();
  }
  if (id == "DURANGO") {
    $("#aguascalientes").hide();
    $("#chiapas").hide();
    $("#bajacalifornia").hide();
    $("#bajacaliforniasur").hide();
    $("#campeche").hide();
    $("#coahuila").hide();
    $("#colima").hide();
    $("#chihuahua").hide();
    $("#df").hide();
    $("#durango").show();
    $("#guanajuato").hide();
    $("#guerrero").hide();
    $("#hidalgo").hide();
    $("#jalisco").hide();
    $("#mexico").hide();
    $("#michoacan").hide();
    $("#morelos").hide();
    $("#nayarit").hide();
    $("#nuevoleon").hide();
    $("#oaxaca").hide();
    $("#puebla").hide();
    $("#queretaro").hide();
    $("#quintanaroo").hide();
    $("#sanluis").hide();
    $("#sinaloa").hide();
    $("#sonora").hide();
    $("#tabasco").hide();
    $("#tamaulipas").hide();
    $("#tlaxcala").hide();
    $("#veracruz").hide();
    $("#yucatan").hide();
    $("#zacatecas").hide();
  }
  if (id == "GUANAJUARO") {
    $("#aguascalientes").hide();
    $("#chiapas").hide();
    $("#bajacalifornia").hide();
    $("#bajacaliforniasur").hide();
    $("#campeche").hide();
    $("#coahuila").hide();
    $("#colima").hide();
    $("#chihuahua").hide();
    $("#df").hide();
    $("#durango").hide();
    $("#guanajuato").show();
    $("#guerrero").hide();
    $("#hidalgo").hide();
    $("#jalisco").hide();
    $("#mexico").hide();
    $("#michoacan").hide();
    $("#morelos").hide();
    $("#nayarit").hide();
    $("#nuevoleon").hide();
    $("#oaxaca").hide();
    $("#puebla").hide();
    $("#queretaro").hide();
    $("#quintanaroo").hide();
    $("#sanluis").hide();
    $("#sinaloa").hide();
    $("#sonora").hide();
    $("#tabasco").hide();
    $("#tamaulipas").hide();
    $("#tlaxcala").hide();
    $("#veracruz").hide();
    $("#yucatan").hide();
    $("#zacatecas").hide();
  }
  if (id == "GUERRERO") {
    $("#aguascalientes").hide();
    $("#chiapas").hide();
    $("#bajacalifornia").hide();
    $("#bajacaliforniasur").hide();
    $("#campeche").hide();
    $("#coahuila").hide();
    $("#colima").hide();
    $("#chihuahua").hide();
    $("#df").hide();
    $("#durango").hide();
    $("#guanajuato").hide();
    $("#guerrero").show();
    $("#hidalgo").hide();
    $("#jalisco").hide();
    $("#mexico").hide();
    $("#michoacan").hide();
    $("#morelos").hide();
    $("#nayarit").hide();
    $("#nuevoleon").hide();
    $("#oaxaca").hide();
    $("#puebla").hide();
    $("#queretaro").hide();
    $("#quintanaroo").hide();
    $("#sanluis").hide();
    $("#sinaloa").hide();
    $("#sonora").hide();
    $("#tabasco").hide();
    $("#tamaulipas").hide();
    $("#tlaxcala").hide();
    $("#veracruz").hide();
    $("#yucatan").hide();
    $("#zacatecas").hide();
  }
  if (id == "HIDALGO") {
    $("#aguascalientes").hide();
    $("#chiapas").hide();
    $("#bajacalifornia").hide();
    $("#bajacaliforniasur").hide();
    $("#campeche").hide();
    $("#coahuila").hide();
    $("#colima").hide();
    $("#chihuahua").hide();
    $("#df").hide();
    $("#durango").hide();
    $("#guanajuato").hide();
    $("#guerrero").hide();
    $("#hidalgo").show();
    $("#jalisco").hide();
    $("#mexico").hide();
    $("#michoacan").hide();
    $("#morelos").hide();
    $("#nayarit").hide();
    $("#nuevoleon").hide();
    $("#oaxaca").hide();
    $("#puebla").hide();
    $("#queretaro").hide();
    $("#quintanaroo").hide();
    $("#sanluis").hide();
    $("#sinaloa").hide();
    $("#sonora").hide();
    $("#tabasco").hide();
    $("#tamaulipas").hide();
    $("#tlaxcala").hide();
    $("#veracruz").hide();
    $("#yucatan").hide();
    $("#zacatecas").hide();
  }
  if (id == "JALISCO") {
    $("#aguascalientes").hide();
    $("#chiapas").hide();
    $("#bajacalifornia").hide();
    $("#bajacaliforniasur").hide();
    $("#campeche").hide();
    $("#coahuila").hide();
    $("#colima").hide();
    $("#chihuahua").hide();
    $("#df").hide();
    $("#durango").hide();
    $("#guanajuato").hide();
    $("#guerrero").hide();
    $("#hidalgo").hide();
    $("#jalisco").show();
    $("#mexico").hide();
    $("#michoacan").hide();
    $("#morelos").hide();
    $("#nayarit").hide();
    $("#nuevoleon").hide();
    $("#oaxaca").hide();
    $("#puebla").hide();
    $("#queretaro").hide();
    $("#quintanaroo").hide();
    $("#sanluis").hide();
    $("#sinaloa").hide();
    $("#sonora").hide();
    $("#tabasco").hide();
    $("#tamaulipas").hide();
    $("#tlaxcala").hide();
    $("#veracruz").hide();
    $("#yucatan").hide();
    $("#zacatecas").hide();
  }
  if (id == "MÉXICO") {
    $("#aguascalientes").hide();
    $("#chiapas").hide();
    $("#bajacalifornia").hide();
    $("#bajacaliforniasur").hide();
    $("#campeche").hide();
    $("#coahuila").hide();
    $("#colima").hide();
    $("#chihuahua").hide();
    $("#df").hide();
    $("#durango").hide();
    $("#guanajuato").hide();
    $("#guerrero").hide();
    $("#hidalgo").hide();
    $("#jalisco").hide();
    $("#mexico").show();
    $("#michoacan").hide();
    $("#morelos").hide();
    $("#nayarit").hide();
    $("#nuevoleon").hide();
    $("#oaxaca").hide();
    $("#puebla").hide();
    $("#queretaro").hide();
    $("#quintanaroo").hide();
    $("#sanluis").hide();
    $("#sinaloa").hide();
    $("#sonora").hide();
    $("#tabasco").hide();
    $("#tamaulipas").hide();
    $("#tlaxcala").hide();
    $("#veracruz").hide();
    $("#yucatan").hide();
    $("#zacatecas").hide();
  }
  if (id == "MICHOACÁN") {
    $("#aguascalientes").hide();
    $("#chiapas").hide();
    $("#bajacalifornia").hide();
    $("#bajacaliforniasur").hide();
    $("#campeche").hide();
    $("#coahuila").hide();
    $("#colima").hide();
    $("#chihuahua").hide();
    $("#df").hide();
    $("#durango").hide();
    $("#guanajuato").hide();
    $("#guerrero").hide();
    $("#hidalgo").hide();
    $("#jalisco").hide();
    $("#mexico").hide();
    $("#michoacan").show();
    $("#morelos").hide();
    $("#nayarit").hide();
    $("#nuevoleon").hide();
    $("#oaxaca").hide();
    $("#puebla").hide();
    $("#queretaro").hide();
    $("#quintanaroo").hide();
    $("#sanluis").hide();
    $("#sinaloa").hide();
    $("#sonora").hide();
    $("#tabasco").hide();
    $("#tamaulipas").hide();
    $("#tlaxcala").hide();
    $("#veracruz").hide();
    $("#yucatan").hide();
    $("#zacatecas").hide();
  }
  if (id == "MORELOS") {
    $("#aguascalientes").hide();
    $("#chiapas").hide();
    $("#bajacalifornia").hide();
    $("#bajacaliforniasur").hide();
    $("#campeche").hide();
    $("#coahuila").hide();
    $("#colima").hide();
    $("#chihuahua").hide();
    $("#df").hide();
    $("#durango").hide();
    $("#guanajuato").hide();
    $("#guerrero").hide();
    $("#hidalgo").hide();
    $("#jalisco").hide();
    $("#mexico").hide();
    $("#michoacan").hide();
    $("#morelos").show();
    $("#nayarit").hide();
    $("#nuevoleon").hide();
    $("#oaxaca").hide();
    $("#puebla").hide();
    $("#queretaro").hide();
    $("#quintanaroo").hide();
    $("#sanluis").hide();
    $("#sinaloa").hide();
    $("#sonora").hide();
    $("#tabasco").hide();
    $("#tamaulipas").hide();
    $("#tlaxcala").hide();
    $("#veracruz").hide();
    $("#yucatan").hide();
    $("#zacatecas").hide();
  }
  if (id == "NAYARIT") {
    $("#aguascalientes").hide();
    $("#chiapas").hide();
    $("#bajacalifornia").hide();
    $("#bajacaliforniasur").hide();
    $("#campeche").hide();
    $("#coahuila").hide();
    $("#colima").hide();
    $("#chihuahua").hide();
    $("#df").hide();
    $("#durango").hide();
    $("#guanajuato").hide();
    $("#guerrero").hide();
    $("#hidalgo").hide();
    $("#jalisco").hide();
    $("#mexico").hide();
    $("#michoacan").hide();
    $("#morelos").hide();
    $("#nayarit").show();
    $("#nuevoleon").hide();
    $("#oaxaca").hide();
    $("#puebla").hide();
    $("#queretaro").hide();
    $("#quintanaroo").hide();
    $("#sanluis").hide();
    $("#sinaloa").hide();
    $("#sonora").hide();
    $("#tabasco").hide();
    $("#tamaulipas").hide();
    $("#tlaxcala").hide();
    $("#veracruz").hide();
    $("#yucatan").hide();
    $("#zacatecas").hide();
  }
  if (id == "NUEVO LEÓN") {
    $("#aguascalientes").hide();
    $("#chiapas").hide();
    $("#bajacalifornia").hide();
    $("#bajacaliforniasur").hide();
    $("#campeche").hide();
    $("#coahuila").hide();
    $("#colima").hide();
    $("#chihuahua").hide();
    $("#df").hide();
    $("#durango").hide();
    $("#guanajuato").hide();
    $("#guerrero").hide();
    $("#hidalgo").hide();
    $("#jalisco").hide();
    $("#mexico").hide();
    $("#michoacan").hide();
    $("#morelos").hide();
    $("#nayarit").hide();
    $("#nuevoleon").show();
    $("#oaxaca").hide();
    $("#puebla").hide();
    $("#queretaro").hide();
    $("#quintanaroo").hide();
    $("#sanluis").hide();
    $("#sinaloa").hide();
    $("#sonora").hide();
    $("#tabasco").hide();
    $("#tamaulipas").hide();
    $("#tlaxcala").hide();
    $("#veracruz").hide();
    $("#yucatan").hide();
    $("#zacatecas").hide();
  }
  if (id == "OAXACA") {
    $("#aguascalientes").hide();
    $("#chiapas").hide();
    $("#bajacalifornia").hide();
    $("#bajacaliforniasur").hide();
    $("#campeche").hide();
    $("#coahuila").hide();
    $("#colima").hide();
    $("#chihuahua").hide();
    $("#df").hide();
    $("#durango").hide();
    $("#guanajuato").hide();
    $("#guerrero").hide();
    $("#hidalgo").hide();
    $("#jalisco").hide();
    $("#mexico").hide();
    $("#michoacan").hide();
    $("#morelos").hide();
    $("#nayarit").hide();
    $("#nuevoleon").hide();
    $("#oaxaca").show();
    $("#puebla").hide();
    $("#queretaro").hide();
    $("#quintanaroo").hide();
    $("#sanluis").hide();
    $("#sinaloa").hide();
    $("#sonora").hide();
    $("#tabasco").hide();
    $("#tamaulipas").hide();
    $("#tlaxcala").hide();
    $("#veracruz").hide();
    $("#yucatan").hide();
    $("#zacatecas").hide();
  }
  if (id == "PUEBLA") {
    $("#aguascalientes").hide();
    $("#chiapas").hide();
    $("#bajacalifornia").hide();
    $("#bajacaliforniasur").hide();
    $("#campeche").hide();
    $("#coahuila").hide();
    $("#colima").hide();
    $("#chihuahua").hide();
    $("#df").hide();
    $("#durango").hide();
    $("#guanajuato").hide();
    $("#guerrero").hide();
    $("#hidalgo").hide();
    $("#jalisco").hide();
    $("#mexico").hide();
    $("#michoacan").hide();
    $("#morelos").hide();
    $("#nayarit").hide();
    $("#nuevoleon").hide();
    $("#oaxaca").hide();
    $("#puebla").show();
    $("#queretaro").hide();
    $("#quintanaroo").hide();
    $("#sanluis").hide();
    $("#sinaloa").hide();
    $("#sonora").hide();
    $("#tabasco").hide();
    $("#tamaulipas").hide();
    $("#tlaxcala").hide();
    $("#veracruz").hide();
    $("#yucatan").hide();
    $("#zacatecas").hide();
  }
  if (id == "QUERÉTARO") {
    $("#aguascalientes").hide();
    $("#chiapas").hide();
    $("#bajacalifornia").hide();
    $("#bajacaliforniasur").hide();
    $("#campeche").hide();
    $("#coahuila").hide();
    $("#colima").hide();
    $("#chihuahua").hide();
    $("#df").hide();
    $("#durango").hide();
    $("#guanajuato").hide();
    $("#guerrero").hide();
    $("#hidalgo").hide();
    $("#jalisco").hide();
    $("#mexico").hide();
    $("#michoacan").hide();
    $("#morelos").hide();
    $("#nayarit").hide();
    $("#nuevoleon").hide();
    $("#oaxaca").hide();
    $("#puebla").hide();
    $("#queretaro").show();
    $("#quintanaroo").hide();
    $("#sanluis").hide();
    $("#sinaloa").hide();
    $("#sonora").hide();
    $("#tabasco").hide();
    $("#tamaulipas").hide();
    $("#tlaxcala").hide();
    $("#veracruz").hide();
    $("#yucatan").hide();
    $("#zacatecas").hide();
  }
  if (id == "QUINTANA ROO") {
    $("#aguascalientes").hide();
    $("#chiapas").hide();
    $("#bajacalifornia").hide();
    $("#bajacaliforniasur").hide();
    $("#campeche").hide();
    $("#coahuila").hide();
    $("#colima").hide();
    $("#chihuahua").hide();
    $("#df").hide();
    $("#durango").hide();
    $("#guanajuato").hide();
    $("#guerrero").hide();
    $("#hidalgo").hide();
    $("#jalisco").hide();
    $("#mexico").hide();
    $("#michoacan").hide();
    $("#morelos").hide();
    $("#nayarit").hide();
    $("#nuevoleon").hide();
    $("#oaxaca").hide();
    $("#puebla").hide();
    $("#queretaro").hide();
    $("#quintanaroo").show();
    $("#sanluis").hide();
    $("#sinaloa").hide();
    $("#sonora").hide();
    $("#tabasco").hide();
    $("#tamaulipas").hide();
    $("#tlaxcala").hide();
    $("#veracruz").hide();
    $("#yucatan").hide();
    $("#zacatecas").hide();
  }
  if (id == "SAN LUIS POTOSÍ") {
    $("#aguascalientes").hide();
    $("#chiapas").hide();
    $("#bajacalifornia").hide();
    $("#bajacaliforniasur").hide();
    $("#campeche").hide();
    $("#coahuila").hide();
    $("#colima").hide();
    $("#chihuahua").hide();
    $("#df").hide();
    $("#durango").hide();
    $("#guanajuato").hide();
    $("#guerrero").hide();
    $("#hidalgo").hide();
    $("#jalisco").hide();
    $("#mexico").hide();
    $("#michoacan").hide();
    $("#morelos").hide();
    $("#nayarit").hide();
    $("#nuevoleon").hide();
    $("#oaxaca").hide();
    $("#puebla").hide();
    $("#queretaro").hide();
    $("#quintanaroo").hide();
    $("#sanluis").show();
    $("#sinaloa").hide();
    $("#sonora").hide();
    $("#tabasco").hide();
    $("#tamaulipas").hide();
    $("#tlaxcala").hide();
    $("#veracruz").hide();
    $("#yucatan").hide();
    $("#zacatecas").hide();
  }
  if (id == "SINALOA") {
    $("#aguascalientes").hide();
    $("#chiapas").hide();
    $("#bajacalifornia").hide();
    $("#bajacaliforniasur").hide();
    $("#campeche").hide();
    $("#coahuila").hide();
    $("#colima").hide();
    $("#chihuahua").hide();
    $("#df").hide();
    $("#durango").hide();
    $("#guanajuato").hide();
    $("#guerrero").hide();
    $("#hidalgo").hide();
    $("#jalisco").hide();
    $("#mexico").hide();
    $("#michoacan").hide();
    $("#morelos").hide();
    $("#nayarit").hide();
    $("#nuevoleon").hide();
    $("#oaxaca").hide();
    $("#puebla").hide();
    $("#queretaro").hide();
    $("#quintanaroo").hide();
    $("#sanluis").hide();
    $("#sinaloa").show();
    $("#sonora").hide();
    $("#tabasco").hide();
    $("#tamaulipas").hide();
    $("#tlaxcala").hide();
    $("#veracruz").hide();
    $("#yucatan").hide();
    $("#zacatecas").hide();
  }
  if (id == "SONORA") {
    $("#aguascalientes").hide();
    $("#chiapas").hide();
    $("#bajacalifornia").hide();
    $("#bajacaliforniasur").hide();
    $("#campeche").hide();
    $("#coahuila").hide();
    $("#colima").hide();
    $("#chihuahua").hide();
    $("#df").hide();
    $("#durango").hide();
    $("#guanajuato").hide();
    $("#guerrero").hide();
    $("#hidalgo").hide();
    $("#jalisco").hide();
    $("#mexico").hide();
    $("#michoacan").hide();
    $("#morelos").hide();
    $("#nayarit").hide();
    $("#nuevoleon").hide();
    $("#oaxaca").hide();
    $("#puebla").hide();
    $("#queretaro").hide();
    $("#quintanaroo").hide();
    $("#sanluis").hide();
    $("#sinaloa").hide();
    $("#sonora").show();
    $("#tabasco").hide();
    $("#tamaulipas").hide();
    $("#tlaxcala").hide();
    $("#veracruz").hide();
    $("#yucatan").hide();
    $("#zacatecas").hide();
  }
  if (id == "TABASCO") {
    $("#aguascalientes").hide();
    $("#chiapas").hide();
    $("#bajacalifornia").hide();
    $("#bajacaliforniasur").hide();
    $("#campeche").hide();
    $("#coahuila").hide();
    $("#colima").hide();
    $("#chihuahua").hide();
    $("#df").hide();
    $("#durango").hide();
    $("#guanajuato").hide();
    $("#guerrero").hide();
    $("#hidalgo").hide();
    $("#jalisco").hide();
    $("#mexico").hide();
    $("#michoacan").hide();
    $("#morelos").hide();
    $("#nayarit").hide();
    $("#nuevoleon").hide();
    $("#oaxaca").hide();
    $("#puebla").hide();
    $("#queretaro").hide();
    $("#quintanaroo").hide();
    $("#sanluis").hide();
    $("#sinaloa").hide();
    $("#sonora").hide();
    $("#tabasco").show();
    $("#tamaulipas").hide();
    $("#tlaxcala").hide();
    $("#veracruz").hide();
    $("#yucatan").hide();
    $("#zacatecas").hide();
  }
  if (id == "TAMAULIPAS") {
    $("#aguascalientes").hide();
    $("#chiapas").hide();
    $("#bajacalifornia").hide();
    $("#bajacaliforniasur").hide();
    $("#campeche").hide();
    $("#coahuila").hide();
    $("#colima").hide();
    $("#chihuahua").hide();
    $("#df").hide();
    $("#durango").hide();
    $("#guanajuato").hide();
    $("#guerrero").hide();
    $("#hidalgo").hide();
    $("#jalisco").hide();
    $("#mexico").hide();
    $("#michoacan").hide();
    $("#morelos").hide();
    $("#nayarit").hide();
    $("#nuevoleon").hide();
    $("#oaxaca").hide();
    $("#puebla").hide();
    $("#queretaro").hide();
    $("#quintanaroo").hide();
    $("#sanluis").hide();
    $("#sinaloa").hide();
    $("#sonora").hide();
    $("#tabasco").hide();
    $("#tamaulipas").show();
    $("#tlaxcala").hide();
    $("#veracruz").hide();
    $("#yucatan").hide();
    $("#zacatecas").hide();
  }
  if (id == "TLAXCALA") {
    $("#aguascalientes").hide();
    $("#chiapas").hide();
    $("#bajacalifornia").hide();
    $("#bajacaliforniasur").hide();
    $("#campeche").hide();
    $("#coahuila").hide();
    $("#colima").hide();
    $("#chihuahua").hide();
    $("#df").hide();
    $("#durango").hide();
    $("#guanajuato").hide();
    $("#guerrero").hide();
    $("#hidalgo").hide();
    $("#jalisco").hide();
    $("#mexico").hide();
    $("#michoacan").hide();
    $("#morelos").hide();
    $("#nayarit").hide();
    $("#nuevoleon").hide();
    $("#oaxaca").hide();
    $("#puebla").hide();
    $("#queretaro").hide();
    $("#quintanaroo").hide();
    $("#sanluis").hide();
    $("#sinaloa").hide();
    $("#sonora").hide();
    $("#tabasco").hide();
    $("#tamaulipas").hide();
    $("#tlaxcala").show();
    $("#veracruz").hide();
    $("#yucatan").hide();
    $("#zacatecas").hide();
  }
  if (id == "VERACRUZ") {
    $("#aguascalientes").hide();
    $("#chiapas").hide();
    $("#bajacalifornia").hide();
    $("#bajacaliforniasur").hide();
    $("#campeche").hide();
    $("#coahuila").hide();
    $("#colima").hide();
    $("#chihuahua").hide();
    $("#df").hide();
    $("#durango").hide();
    $("#guanajuato").hide();
    $("#guerrero").hide();
    $("#hidalgo").hide();
    $("#jalisco").hide();
    $("#mexico").hide();
    $("#michoacan").hide();
    $("#morelos").hide();
    $("#nayarit").hide();
    $("#nuevoleon").hide();
    $("#oaxaca").hide();
    $("#puebla").hide();
    $("#queretaro").hide();
    $("#quintanaroo").hide();
    $("#sanluis").hide();
    $("#sinaloa").hide();
    $("#sonora").hide();
    $("#tabasco").hide();
    $("#tamaulipas").hide();
    $("#tlaxcala").hide();
    $("#veracruz").show();
    $("#yucatan").hide();
    $("#zacatecas").hide();
  }
  if (id == "YUCATÁN") {
    $("#aguascalientes").hide();
    $("#chiapas").hide();
    $("#bajacalifornia").hide();
    $("#bajacaliforniasur").hide();
    $("#campeche").hide();
    $("#coahuila").hide();
    $("#colima").hide();
    $("#chihuahua").hide();
    $("#df").hide();
    $("#durango").hide();
    $("#guanajuato").hide();
    $("#guerrero").hide();
    $("#hidalgo").hide();
    $("#jalisco").hide();
    $("#mexico").hide();
    $("#michoacan").hide();
    $("#morelos").hide();
    $("#nayarit").hide();
    $("#nuevoleon").hide();
    $("#oaxaca").hide();
    $("#puebla").hide();
    $("#queretaro").hide();
    $("#quintanaroo").hide();
    $("#sanluis").hide();
    $("#sinaloa").hide();
    $("#sonora").hide();
    $("#tabasco").hide();
    $("#tamaulipas").hide();
    $("#tlaxcala").hide();
    $("#veracruz").hide();
    $("#yucatan").show();
    $("#zacatecas").hide();
  }
  if (id == "ZACATECAS") {
    $("#aguascalientes").hide();
    $("#chiapas").hide();
    $("#bajacalifornia").hide();
    $("#bajacaliforniasur").hide();
    $("#campeche").hide();
    $("#coahuila").hide();
    $("#colima").hide();
    $("#chihuahua").hide();
    $("#df").hide();
    $("#durango").hide();
    $("#guanajuato").hide();
    $("#guerrero").hide();
    $("#hidalgo").hide();
    $("#jalisco").hide();
    $("#mexico").hide();
    $("#michoacan").hide();
    $("#morelos").hide();
    $("#nayarit").hide();
    $("#nuevoleon").hide();
    $("#oaxaca").hide();
    $("#puebla").hide();
    $("#queretaro").hide();
    $("#quintanaroo").hide();
    $("#sanluis").hide();
    $("#sinaloa").hide();
    $("#sonora").hide();
    $("#tabasco").hide();
    $("#tamaulipas").hide();
    $("#tlaxcala").hide();
    $("#veracruz").hide();
    $("#yucatan").hide();
    $("#zacatecas").show();
  }
}
</script>

@include('employees.validate_curp')

