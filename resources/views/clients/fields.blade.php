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
          {!! Form::text('firts_name', null, [ 'style' => 'text-transform:uppercase','class' => 'form-control input-lg', 'placeholder'=>'ESCRIBE EL NOMBRE CLIENTE','required'=>'required', 'data-parsley-trigger' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase(); myFunction()']) !!}
        </div>
        <div class="form-group col-sm-6 col-lg-4">
          {!! Form::label('last_name', 'Apellido Paterno:') !!}
          {!! Form::text('last_name', null, [ 'style' => 'text-transform:uppercase','class' => 'form-control input-lg', 'placeholder'=>'ESCRIBE EL APELLIDO PATERNO','required'=>'required', 'data-parsley-trigger' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase(); myFunction()']) !!}
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
          <input type="number" name="phone" class="form-control input-lg" id="telefono" placeholder="TELÉFONO" required="required" data-parsley-trigger="input focusin" data-parsley-type="digits" data-parsley-maxlength="10">
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

        {{-- @php
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
        </div>  --}}
      </div> 
       <input type="hidden" name="branch_id" value="{{ Auth::user()->branch_id }}">
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
              {!! Form::text('street', null, ['class' => 'form-control input-lg', 'placeholder'=>'ESCRIBE EL NOMBRE DE LA CALLE', 'id' => 'calle' ,'required'=>'required','data-parsley-trigger ' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
              {!! Form::label('number', 'Número de Casa:') !!}
              {!! Form::text('number', null, ['class' => 'form-control input-lg', 'placeholder'=>'ESCRIBE EL NÚMERO DE LA CASA','id'=>'numero','required'=>'required','data-parsley-trigger ' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>

            <div class="form-group col-sm-6 col-lg-4">
              {!! Form::label('state', 'Estado:') !!}
              <select name="state" id="state_for_client" class="form-control input-lg"> 
               <option value="">Todo México</option>
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
         </div>
         <div class="form-group col-sm-6 col-lg-12">
           <div class="form-group col-sm-6 col-lg-4">
             <label>Municipio</label>
             <select name="municipality" id="municipality_for_client" class="form-control input-lg">

             </select>
           </div>

           <div class="form-group col-sm-6 col-lg-4" >
            {!! Form::label('colony', 'Colonia:') !!}
            {!! Form::text('colony', null, ['class' => 'form-control input-lg', 'placeholder'=>'ESCRIBE LA COLONIA','id'=>'colonia','required'=>'required','data-parsley-trigger ' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}

          </div>


          <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('postal_code', 'Código Postal:') !!}
            <input type="number" name="postal_code" class="form-control input-lg" id="cp" placeholder="ESCRIBE EL CÓDIGO POSTAL" required="required" data-parsley-trigger="input focusin" data-parsley-type="digits"  data-parsley-maxlength="5">
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
        <h3>¿La dirección del cliente es la misma del negocio?</h3>
        <div class="form-group col-sm-6 col-lg-12">
          <button id="buttonok" class="btn  btn-lg btn-primary">SI</button>
          <button id="buttonoff" class="btn btn-lg btn-success">No</button>

        </div>
        <script>

          var state = '';
          var municipality = '';
          var street = '';
          var number = '';
          var colony = '';
          var cp = '';
          $(document).ready(function(){
            $("#buttonok").click(function(){

              $('#formclient').find('select[name="state_company"]').val(state);
              $('#formclient').find('select[name="municipality_company"]').val(municipality);
              $('#formclient').find('input[name="street_company"]').val(street);
              $('#formclient').find('input[name="number_company"]').val(number);
              $('#formclient').find('input[name="colony_company"]').val(colony);
              $('#formclient').find('input[name="postal_code_company"]').val(cp);
              $("#sii").toggle();
            });
          });

          $(document).ready(function(){
            $("#buttonoff").click(function(){
              $('#formclient').find('select[name="state_company"]').val('');
              $('#formclient').find('select[name="municipality_company"]').val('');
              $('#formclient').find('input[name="street_company"]').val('');
              $('#formclient').find('input[name="number_company"]').val('');
              $('#formclient').find('input[name="colony_company"]').val('');
              $('#formclient').find('input[name="postal_code_company"]').val('');
              $("#sii").toggle();
            });
          });
        </script>
        <script>
          $(document).ready(function () {
            $("#calle").keyup(function () {
              street = $(this).val();  
            });
            $("#numero").keyup(function () {
              number = $(this).val();  
            });
            $("#colonia").keyup(function () {
              colony = $(this).val();  
            });
            $("#cp").keyup(function () {
              cp = $(this).val();  
            });
           /* $("#telefono").keyup(function () {
              var value = $(this).val();
              $("#telefonodos").val(value);
            });*/
          });

        </script>
        <div class="form-group col-sm-6 col-lg-12" id="myForm">
          <div class="form-group col-sm-6 col-lg-12" id="sii" style="display: none;">
            <div class="form-group col-sm-6 col-lg-12">
              <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('name_company', 'Nombre del Negocio:') !!}
                {!! Form::text('name_company', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE NOMBRE DEL NEGOCIO',  'data-parsley-trigger ' => 'input focusin','onkeyup' => 'javascript:this.value=this.value.toUpperCase(); ']) !!}
              </div>

              <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('street_company', 'Calle:') !!}
                {!! Form::text('street_company', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE EL NOMBRE DE LA CALLE', 'id'=>'calledos', 'data-parsley-trigger ' => 'input focusin','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
              </div> 
              <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('number_company', 'Número de Casa:') !!}
                {!! Form::text('number_company', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE EL NÚMERO DE LA CASA','id'=>'numerodos', 'data-parsley-trigger ' => 'input focusin','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
              </div>  

            </div>
            <div class="form-group col-sm-6 col-lg-12">
              <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('state_company', 'Estado:') !!}
                <select name="state_company" id="state_for_company" onChange="estadodos(this.value);" class="form-control input-lg"> 
                 <option value="" class="selected">TODO MÉXICO</option>
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
             <div class="form-group col-sm-6 col-lg-4">
               <label>Municipio</label>
               <select name="municipality_company"  id="municipality_for_company" class="form-control input-lg">

               </select>
             </div>
             <div class="form-group col-sm-6 col-lg-4">
              {!! Form::label('colony_company', 'Colonia:') !!}
              {!! Form::text('colony_company', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE COLONIA','id'=>'coloniados', 'data-parsley-trigger ' => 'input focusin','onkeyup' => 'javascript:this.value=this.value.toUpperCase(); ']) !!}
            </div>
          </div>

          <div class="form-group col-sm-6 col-lg-12">
            <div class="form-group col-sm-6 col-lg-4">
              {!! Form::label('postal_code_company', 'Código Postal:') !!}
              <input type="number" name="postal_code_company" class="form-control input-lg" onfocus="marcar(this);" id="cpdos" ; placeholder="ESCRIBE  CÓDIGO POSTAL"  data-parsley-trigger="input focusin"  data-parsley-type="digits" data-parsley-maxlength="5">
            </div>
            <div class="form-group col-sm-6 col-lg-4">
              {!! Form::label('phone_company', 'Teléfono del Negocio:') !!}
              <input type="number" name="phone_company" class="form-control input-lg" onfocus="marcar(this);" id="telefonodos" placeholder="TELÉFONO"  data-parsley-trigger="input focusin" data-parsley-type="digits" data-parsley-maxlength="10">
            </div>
          </div>
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
            $("#no").hide(1500);
          }
          if (id == "No") {
            $("#si").hide();
            $("#no").hide(1500);
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
            {!! Form::label('state_aval', 'Estado:') !!}
            <select name="state_aval" id="state_for_aval" onChange="estadotres(this.value);" class="form-control input-lg"> 
             <option value="">Todo México</option>
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

         <div class="form-group col-sm-6 col-lg-4">
           <label>Municipio</label>
           <select name="municipality_aval" id="municipality_for_aval" class="form-control input-lg">

           </select>
         </div>
         
       </div>
       <div class="form-group col-sm-6 col-lg-12">
         <div class="form-group col-sm-6 col-lg-4">
          {!! Form::label('colony_aval', 'Colonia:') !!}
          {!! Form::text('colony_aval', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE COLONIA',  'data-parsley-trigger ' => 'input focusin','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
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
          'required'=>'required'
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
              'required'=>'required'
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
  $('#formclient').on('change', '#state_for_client', function(){
    var municipality = $('#formclient').find('#municipality_for_client');
    municipality.html('');
    setstate($(this).val(),municipality);
    state = $(this).val(); 

  });
  $('#formclient').on('change', '#municipality_for_client', function(){
    //var state = $('#formclient').find('select[name="state_company"]').val();
    var municipalitytag = $('#formclient').find('#municipality_for_company');
    municipalitytag.html('');
    setstate(state ,municipalitytag);
    municipality = $(this).val();

  });
  $('#formclient').on('change', '#state_for_company', function(){
    var municipality = $('#formclient').find('#municipality_for_company');
    municipality.html('');
    setstate($(this).val(),municipality);
  });
  $('#formclient').on('change', '#state_for_aval', function(){
    var municipality = $('#formclient').find('#municipality_for_aval');
    municipality.html('');
    setstate($(this).val(),municipality);
  }); 
  
</script>


@include('clients.curp')