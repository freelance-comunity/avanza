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
<div class="box box-danger">
    <div class="box-header with-border">
        <div>
            <h3> Datos del Aval</h3>
        </div>
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
      {!! Form::label('curp_aval', 'CURP:') !!}<a href="https://consultas.curp.gob.mx/CurpSP/" target="_blank" onClick="window.open(this.href, this.target, 'width=500,height=500'); return false;"> CONSULTA CURP</a>
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

  {{-- <div class="form-group col-sm-6 col-lg-4">
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

</div> --}}
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

<input type="hidden" name="client_id" value="{{ $client->id}}">
<div class="box-body" >
 <div class="col-md-4">
    <div class="btn-group">
      {!! Form::submit('Guardar', ['class' => 'uppercase btn btn-primary', 'id' => 'save']) !!}
  </div>
</div> 
</div>
@include('clients.curp')
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

  $('#formaval').on('change', '#state_for_aval', function(){
    var municipality = $('#formaval').find('#municipality_for_aval');
    municipality.html('');
    setstate($(this).val(),municipality);
}); 
  
</script>


