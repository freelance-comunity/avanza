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
                <p class="responsivo test" style="text-overflow:ellipsis;">Datos</p>
            </div>
            <div class="stepwizard-step p" id="myparrafo">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p class="responsivo test" style="text-overflow:ellipsis;">Ubicación</p>
            </div>
            <div class="stepwizard-step p" id="myparrafo">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p class="responsivo test" style="text-overflow:ellipsis;">Negocio</p>
            </div>
            <div class="stepwizard-step p" id="myparrafo">
                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                <p class="responsivo test" style="text-overflow:ellipsis;">Aval</p>
            </div>
            <div class="stepwizard-step p" id="myparrafo">
                <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
                <p class="responsivo test" style="text-overflow:ellipsis;">Referencias</p>
            </div>
            <div class="stepwizard-step p" id="myparrafo">
                <a href="#step-6" type="button" class="btn btn-default btn-circle" disabled="disabled">6</a>
                <p  class="responsivo test" style="text-overflow:ellipsis;">Digitalización</p>
            </div>
        </div>
    </div>
    <div class="box-body">

     <div class="row setup-content" id="step-1">



        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('firts_name', 'Nombre(s):') !!}
            {!! Form::text('firts_name', null, [ 'style' => 'text-transform:uppercase','class' => 'form-control input-lg', 'placeholder'=>'ESCRIBE EL NOMBRE CLIENTE','required'=>'required', 'data-parsley-trigger' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
        </div>

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('last_name', 'Apellido Paterno:') !!}
            {!! Form::text('last_name', null, [ 'style' => 'text-transform:uppercase','class' => 'form-control input-lg', 'placeholder'=>'ESCRIBE EL APELLIDO PATERNO','required'=>'required', 'data-parsley-trigger' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
        </div>

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
                {!! Form::label('ine', 'INE:') !!}
                {!! Form::text('ine', null, ['class' => 'form-control input-lg', 'placeholder'=>'ESCRIBE LA INE','required'=>'required','data-parsley-trigger ' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('civil_status', 'Estado Civil:') !!}
                {!! Form::select('civil_status',['SOLTERO(A)' => 'SOLTERO(A)', 'CASADO(A)' => 'CASADO(A)','VIUDO(A)'=>'VIUDO(A)','DIVORCIADO(A)'=>'DIVORCIADO(A)'], null, ['class' => 'form-control input-lg', 'required' => 'required','data-parsley-trigger ' => 'input focusin',]) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('scholarship', 'Grado Escolar:') !!}
                {!! Form::select('scholarship',['NINGUNA' => 'NINGUNA', 'SABE LEER' => 'SABE LEER', 'PRIMARIA' => 'PRIMARIA', 'SECUNDARIA' => 'SECUNDARIA', 'BACHILLERATO' => 'BACHILLERATO', 'LICENCIATURA' => 'LICENCIATURA', 'POSGRADO' => 'POSGRADO'], null, ['class' => 'form-control input-lg', 'required' => 'required','data-parsley-trigger ' => 'input focusin']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('phone', 'Teléfono:') !!}
                {!! Form::text('phone', null, ['class' => 'form-control input-lg', 'placeholder' => 'TELÉFONO', 'required' => 'required', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();','data-parsley-trigger ' => 'input focusin',
                'data-parsley-type' => 'digits', 'data-parsley-maxlength' => '10',]) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('no_economic_dependent', 'No. de Dependientes Economicos') !!}
                {!! Form::select('no_economic_dependent',['0'=>'0','1' => '1', ' 2' => ' 2', '3' => '3', '4' => '4', '5' => '5'], null, ['class' => 'form-control input-lg', 'required' => 'required', 'data-parsley-trigger ' => 'input focusin',]) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('no_familys', 'No. Familias') !!}
                {!! Form::select('no_familys',['0'=>'0','1' => '1', ' 2' => ' 2', '3' => '3', '4' => '4', '5' => '5'], null, ['class' => 'form-control input-lg', 'required' => 'required', 'data-parsley-trigger ' => 'input focusin',]) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('type_of_housing', 'Tipo de Vivienda') !!}
                {!! Form::select('type_of_housing',['PROPIA'=>'PROPIA','FAMILIAR' => 'FAMILIAR', ' RENTA' => ' RENTA', 'HIPOTECA' => 'HIPOTECA'], null, ['class' => 'form-control input-lg', 'data-parsley-trigger ' => 'input focusin', 'required' => 'required']) !!}
            </div>

            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('avatar', 'Imagen:') !!}
                {!! Form::file('avatar', [
                    'required' => 'required',
                    'data-parsley-trigger ' => 'input focusin',
                    ]) !!}
                </div>


                @php
                $count = App\Models\Branch::all();
                @endphp

                <div class="form-group col-sm-12 col-lg-12">
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
                {{-- Geolocation address client --}}
                <div class="col-md-6">
                    <div class="gllpLatlonPicker">
                      <label for="exampleInputEmail1">DIRECCIÓN DEL CLIENTE</label>
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
                  <label for="exampleInputEmail1">DIRECCIÓN DEL NEGOCIO</label>
                  <br/><br/>
                  <div class="gllpMap">Google Maps</div>
                  <br/>
                  <input type="hidden" id="lat_bussines" name="latitude_company" class="gllpLatitude" value="16.753239967660058"/>
                  <input type="hidden" id="lon_bussines" name="length_company" class="gllpLongitude" value="-93.11789682636714"/>
                  <input type="hidden" class="gllpZoom" value="15"/>
                  <input type="button" id="update_bussines" class="gllpUpdateButton" style="display: none;" value="Actualizar">
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
                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('street', 'Calle:') !!}
                    {!! Form::text('street', null, ['class' => 'form-control input-lg', 'placeholder'=>'ESCRIBE EL NOMBRE DE LA CALLE','required'=>'required','data-parsley-trigger ' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                </div>
                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('number', 'Número de Casa:') !!}
                    {!! Form::text('number', null, ['class' => 'form-control input-lg', 'placeholder'=>'ESCRIBE EL NÚMERO DE LA CASA','required'=>'required','data-parsley-trigger ' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                </div>
                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('colony', 'Colonia:') !!}
                    {!! Form::text('colony', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE COLONIA', 'required' => 'required','data-parsley-trigger ' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                </div>
                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('municipality', 'Municipio:') !!}
                    {!! Form::text('municipality', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE MUNICIPIO', 'required' => 'required','data-parsley-trigger ' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                </div>
                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('state', 'Estado:') !!}
                    {!! Form::select('state',['placeholder'=>'SELECCIONE UN ESTADO','AGUASCALIENTES' => 'AGUASCALIENTES', 'BAJA CALIFORNIA' => 'BAJA CALIFORNIA', 'BAJA CALIFORNIA SUR' => 'BAJA CALIFORNIA SUR','CAMPECHE' => 'CAMPECHE','COAHUILA' => 'COAHUILA','COLIMA' => 'COLIMA','CHIAPAS' => 'CHIAPAS','CHIHUAHUA' => 'CHIHUAHUA','DISTRITO FEDERAL' => 'DISTRITO FEDERAL','DURANGO' => 'DURANGO','JALISCO' => 'JALISCO','MÉXICO' => 'MÉXICO','MICHOACÁN' => 'MICHOACÁN','MORELOS' => 'MORELOS','NAYARIT' => 'NAYARIT','NUEVO LEÓN' => 'NUEVO LEÓN','OAXACA' => 'OAXACA','PUEBLA' => 'PUEBLA','QUERÉTARO' => 'QUERÉTARO','QUINTANA ROO'=>'QUINTANA ROO','SAN LUIS POTOSÍ'=> 'SAN LUIS POTOSÍ','SINALOA'=>'SINALOA','SONORA','SONORA','TABASCO'=>'TABASCO','TAMAULIPAS'=>'TAMAULIPAS','TLAXCALA'=>'TLAXCALA','VERACRUZ'=>'VERACRUZ','YUCATÁN'=>'YUCATÁN','ZACATECAS'=>'ZACATECAS'], null, ['class' => 'form-control input-lg', 'required' => 'required','data-parsley-trigger ' => 'input focusin',]) !!}
                </div>
                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('postal_code', 'Código Postal:') !!}
                    {!! Form::text('postal_code', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE CÓDIGO POSTAL', 'required' => 'required','data-parsley-trigger ' => 'input focusin','data-parsley-type' => 'digits','data-parsley-maxlength' => '5', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                </div>
                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('references', 'Referencias:') !!}
                    {!! Form::text('references', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE REFERENCIA DEL DOMICILIO', 'required' => 'required','data-parsley-trigger ' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
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
                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('phone_company', 'Teléfono del Negocio:') !!}
                    {!! Form::text('phone_company', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE NÚMERO DEL TELÉFONO', 'required' => 'required','data-parsley-trigger ' => 'input focusin', 'data-parsley-type' => 'digits', 'data-parsley-maxlength' => '10','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                </div>

                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('name_company', 'Nombre del Negocio:') !!}
                    {!! Form::text('name_company', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE NOMBRE DEL NEGOCIO', 'required' => 'required','data-parsley-trigger ' => 'input focusin','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                </div>
                <div class="form-group col-sm-12 col-lg-12">
                    <h3 style="text-align: center;"> 
                       <span class="label label-danger">Activos</span> 
                   </h3>                
               </div>
               <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('inventory', 'Inventario ($):') !!}
                {!! Form::text('inventory', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE LA CANTIDAD DEL INVENTARIO', 'required' => 'required','data-parsley-trigger ' => 'input focusin','data-parsley-type' => 'digits','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('machinery_equipment', 'Maq y Equip($):') !!}
                {!! Form::text('machinery_equipment', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE LA CANTIDAD DE LA MAQUINARIA Y EQUIPO', 'required' => 'required','data-parsley-trigger ' => 'input focusin','data-parsley-type' => 'digits','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('vehicles', 'Vehículos($):') !!}
                {!! Form::text('vehicles', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE LA CANTIDAD DE VEHÍCULOS', 'required' => 'required','data-parsley-trigger ' => 'input focusin','data-parsley-type' => 'digits','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('property', 'Inmuebles($):') !!}
                {!! Form::text('property', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE LA CANTIDAD DEL INMUEBLE', 'required' => 'required','data-parsley-trigger ' => 'input focusin','data-parsley-type' => 'digits','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('box_benck', 'Caja, Bancos($):') !!}
                {!! Form::text('box_benck', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE LA CANTIDAD', 'required' => 'required','data-parsley-trigger ' => 'input focusin','data-parsley-type' => 'digits','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('accounts', 'Ctas/Cobrar($):') !!}
                {!! Form::text('accounts', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE LA CANTIDAD', 'required' => 'required',   'data-parsley-trigger ' => 'input focusin','data-parsley-type' => 'digits','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-12 col-lg-12">
                <h3 style="text-align: center;"> 
                   <span class="label label-danger">Pasivos</span> 
               </h3>                
           </div>
           <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('suppliers', 'Proveedores($):') !!}
            {!! Form::text('suppliers', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE LA CANTIDAD', 'required' => 'required','data-parsley-trigger ' => 'input focusin','data-parsley-type' => 'digits','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
        </div>
        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('credits', 'Créditos($):') !!}
            {!! Form::text('credits', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE LA CANTIDAD', 'required' => 'required','data-parsley-trigger ' => 'input focusin','data-parsley-type' => 'digits','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
        </div>
        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('payments', 'Pago al mes($):') !!}
            {!! Form::text('payments', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE LA CANTIDAD', 'required' => 'required','data-parsley-trigger ' => 'input focusin','data-parsley-type' => 'digits','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
        </div>
        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('specify', 'Especifica:') !!}
            {!! Form::text('specify', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESPECIFICA', 'required' => 'required','data-parsley-trigger ' => 'input focusin','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
        </div>
        <div class="form-group col-sm-12 col-lg-12">
            <h3 style="text-align: center;"> 
               <span class="label label-danger">Ingresos</span> 
           </h3>                
       </div>
       <div class="form-group col-sm-6 col-lg-4">
        {!! Form::label('weekday', 'Entre semana:') !!}
        {!! Form::text('weekday', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE LA CANTIDAD', 'required' => 'required','data-parsley-trigger ' => 'input focusin','data-parsley-type' => 'digits','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
    </div>
    <div class="form-group col-sm-6 col-lg-4">
        {!! Form::label('weekend', 'Fines de Semana:') !!}
        {!! Form::text('weekend', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE LA CANTIDAD', 'required' => 'required','data-parsley-trigger ' => 'input focusin','data-parsley-type' => 'digits','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
    </div>
    <div class="form-group col-sm-6 col-lg-4">
        {!! Form::label('utility', 'Utilidad:') !!}
        {!! Form::text('utility', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE LA CANTIDAD', 'required' => 'required','data-parsley-trigger ' => 'input focusin','data-parsley-type' => 'digits','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
    </div>
    <div class="form-group col-sm-6 col-lg-4">
        {!! Form::label('other_income', 'Otros Ingresos:') !!}
        {!! Form::text('other_income', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE LA CANTIDAD', 'required' => 'required','data-parsley-trigger ' => 'input focusin','data-parsley-type' => 'digits','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
    </div>
    <div class="form-group col-sm-12 col-lg-12">
        <h3 style="text-align: center;"> 
           <span class="label label-danger">Costos</span> 
       </h3>                
   </div>
   <div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('rent', 'Renta:') !!}
    {!! Form::text('rent', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE LA CANTIDAD', 'required' => 'required','data-parsley-trigger ' => 'input focusin','data-parsley-type' => 'digits','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
</div>
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('salary', 'Sueldos:') !!}
    {!! Form::text('salary', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE LA CANTIDAD', 'required' => 'required','data-parsley-trigger ' => 'input focusin','data-parsley-type' => 'digits','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
</div>
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('others', 'Otros Luz/Agua:') !!}
    {!! Form::text('others', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE LA CANTIDAD', 'required' => 'required','data-parsley-trigger ' => 'input focusin','data-parsley-type' => 'digits','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
</div>


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
                {!! Form::text('name_aval', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE NOMBRE DEL AVAL', 'required' => 'required', 'data-parsley-trigger ' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>

            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('last_name_aval', 'Apellido Paterno:') !!}
                {!! Form::text('last_name_aval', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE APELLIDO PATERNO DEL AVAL', 'required' => 'required', 'data-parsley-trigger ' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>

            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('mothers_name_aval', 'Apellido Materno:') !!}
                {!! Form::text('mothers_name_aval', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE APELLIDO MATERNO DEL AVAL', 'required' => 'required', 'data-parsley-trigger ' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('birthdate_aval', 'Fecha de nacimiento:') !!}
                <input type="date" name="birthdate_aval" class="form-control input-lg" required="required" data-parsley-trigger="input focusin">
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('curp_aval', 'CURP:') !!}
                {!! Form::text('curp_aval', null, [
                    'style' => 'text-transform:uppercase',
                    'class' => 'form-control input-lg', 
                    'id' => 'curp_input',
                    'oninput' => 'validarI(this)',
                    'placeholder' => 'ESCRIBE CURP', 
                    'required' => 'required',
                    'data-parsley-trigger ' => 'input focusin',
                    'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                    <pre id="resultados"></pre>
                </div>
                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('phone_aval', 'Teléfono:') !!}
                    {!! Form::text('phone_aval', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE TELÉFONO DEL AVAL', 'required' => 'required','data-parsley-trigger ' => 'input focusin','data-parsley-type' => 'digits', 'data-parsley-maxlength' => '10', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                </div>
                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('civil_status_aval', 'Estado Civil:') !!}
                    {!! Form::select('civil_status_aval',['SOLTERO(A)' => 'SOLTERO(A)', 'CASADO(A)' => 'CASADO(A)','VIUDO(A)'=>'VIUDO(A)','DIVORCIADO(A)'=>'DIVORCIADO(A)'], null, ['class' => 'form-control input-lg', 'required' => 'required','data-parsley-trigger ' => 'input focusin',]) !!}
                </div>
                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('scholarship_aval', 'Grado Escolar:') !!}
                    {!! Form::select('scholarship_aval',['NINGUNA' => 'NINGUNA', 'SABE LEER' => 'SABE LEER', 'PRIMARIA' => 'PRIMARIA', 'SECUNDARIA' => 'SECUNDARIA', 'BACHILLERATO' => 'BACHILLERATO', 'LICENCIATURA' => 'LICENCIATURA', 'POSGRADO' => 'POSGRADO'], null, ['class' => 'form-control input-lg', 'required' => 'required','data-parsley-trigger ' => 'input focusin',]) !!}
                </div>
                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('street_aval', 'Calle:') !!}
                    {!! Form::text('street_aval', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE COLONIA', 'required' => 'required', 'data-parsley-trigger ' => 'input focusin','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                </div>
                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('number_aval', 'Número de casa:') !!}
                    {!! Form::text('number_aval', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE COLONIA', 'required' => 'required','data-parsley-trigger ' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                </div>
                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('colony_aval', 'Colonia:') !!}
                    {!! Form::text('colony_aval', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE COLONIA', 'required' => 'required', 'data-parsley-trigger ' => 'input focusin','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                </div>
                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('municipality_aval', 'Municipio:') !!}
                    {!! Form::text('municipality_aval', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE MUNICIPIO', 'required' => 'required','data-parsley-trigger ' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                </div>
                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('state_aval', 'Estado:') !!}
                    {!! Form::select('state_aval',['placeholder'=>'SELECCIONE UN ESTADO','AGUASCALIENTES' => 'AGUASCALIENTES', 'BAJA CALIFORNIA' => 'BAJA CALIFORNIA', 'BAJA CALIFORNIA SUR' => 'BAJA CALIFORNIA SUR','CAMPECHE' => 'CAMPECHE','COAHUILA' => 'COAHUILA','COLIMA' => 'COLIMA','CHIAPAS' => 'CHIAPAS','CHIHUAHUA' => 'CHIHUAHUA','DISTRITO FEDERAL' => 'DISTRITO FEDERAL','DURANGO' => 'DURANGO','JALISCO' => 'JALISCO','MÉXICO' => 'MÉXICO','MICHOACÁN' => 'MICHOACÁN','MORELOS' => 'MORELOS','NAYARIT' => 'NAYARIT','NUEVO LEÓN' => 'NUEVO LEÓN','OAXACA' => 'OAXACA','PUEBLA' => 'PUEBLA','QUERÉTARO' => 'QUERÉTARO','QUINTANA ROO'=>'QUINTANA ROO','SAN LUIS POTOSÍ'=> 'SAN LUIS POTOSÍ','SINALOA'=>'SINALOA','SONORA','SONORA','TABASCO'=>'TABASCO','TAMAULIPAS'=>'TAMAULIPAS','TLAXCALA'=>'TLAXCALA','VERACRUZ'=>'VERACRUZ','YUCATÁN'=>'YUCATÁN','ZACATECAS'=>'ZACATECAS'], null, ['class' => 'form-control input-lg', 'required' => 'required','data-parsley-trigger ' => 'input focusin']) !!}
                </div>     
                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('postal_code_aval', 'Código Postal:') !!}
                    {!! Form::text('postal_code_aval', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE COLONIA', 'required' => 'required','data-parsley-trigger ' => 'input focusin','data-parsley-type' => 'digits','data-parsley-maxlength' => '5', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                </div>
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Siguiente</button>
            </div>

        </div>
    </div>
    <!-- CLIENTS AVAL-->

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
                {!! Form::text('firts_name_reference_1', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE EL NOMBRE', 'required' => 'required','data-parsley-trigger ' => 'input focusin','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('last_name_reference_1', 'Apellido Paterno:') !!}
                {!! Form::text('last_name_reference_1', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE EL APELLIDO PATERNO', 'required' => 'required','data-parsley-trigger ' => 'input focusin','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>

            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('mothers_last_name_reference_1', 'Apellido Materno:') !!}
                {!! Form::text('mothers_last_name_reference_1', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE EL APELLIDO MATERNO', 'required' => 'required','data-parsley-trigger ' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>

            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('phone_reference_1', 'Teléfono:') !!}
                {!! Form::text('phone_reference_1', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE EL TELÉFONO', 'required' => 'required', 'data-parsley-trigger ' => 'input focusin', 'data-parsley-type' => 'digits',
                'data-parsley-maxlength' => '10','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <hr>

            <div class="form-group col-sm-12 col-lg-12">
                <h3 style="text-align: center;"> 
                   <span class="label label-danger">Referencia 2</span> 
               </h3>                
           </div>
           <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('firts_name_reference_2', 'Nombre(s):') !!}
            {!! Form::text('firts_name_reference_2', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE EL NOMBRE', 'required' => 'required','data-parsley-trigger ' => 'input focusin','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
        </div>
        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('last_name_reference_2', 'Apellido Paterno:') !!}
            {!! Form::text('last_name_reference_2', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE EL APELLIDO PATERNO ', 'required' => 'required','data-parsley-trigger ' => 'input focusin','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
        </div>

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('mothers_last_name_reference_2', 'Apellido Materno:') !!}
            {!! Form::text('mothers_last_name_reference_2', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE EL APELLIDO MATERNO', 'required' => 'required','data-parsley-trigger ' => 'input focusin','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
        </div>

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('phone_reference_2', 'Teléfono:') !!}
            {!! Form::text('phone_reference_2', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE EL TELÉFONO', 'required' => 'required', 'data-parsley-trigger ' => 'input focusin','data-parsley-type' => 'digits','data-parsley-maxlength' => '10','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
        </div>

        <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Siguiente</button>

    </div>
</div>
</div>

<!-- CLIENTS DOCUMENTS-->
<div class="row setup-content" id="step-6">
    <div class="col-xs-12">
        <div class="col-md-12">
            <h3> Digitalización</h3>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('ine_document', 'INE:') !!}
                {!! Form::file('ine_document', [
                    'required' => 'required',
                    'data-parsley-trigger ' => 'input focusin',
                    ]) !!}
                </div>
                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('curp_document', 'CURP:') !!}
                    {!! Form::file('curp_document', [
                        'required' => 'required',
                        'data-parsley-trigger ' => 'input focusin',
                        ]) !!}
                    </div>
                    <div class="form-group col-sm-6 col-lg-4">
                        {!! Form::label('proof_of_addres', 'Comprobante de Domicilio:') !!}
                        {!! Form::file('proof_of_addres', [
                            'required' => 'required',
                            'data-parsley-trigger ' => 'input focusin',
                            ]) !!}
                        </div>
                        <button class="btn btn-success btn-lg pull-right" type="submit">Guardar</button>
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

    @include('clients.curp')