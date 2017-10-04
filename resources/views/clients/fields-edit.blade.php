<style>
    #resultadoedit {
        background-color: red;
        color: white;
        font-weight: bold;
    }
    #resultadoedit.ok {
        background-color: green;
    }
</style>
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
            {!! Form::text('firts_name', null, [ 'style' => 'text-transform:uppercase','class' => 'form-control input-lg', 'placeholder'=>'ESCRIBE EL NOMBRE CLIENTE','required'=>'required', 'data-parsley-trigger' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
        </div>

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('last_name', 'Apellido Paterno:') !!}
            {!! Form::text('last_name',null, [ 'style' => 'text-transform:uppercase','class' => 'form-control input-lg', 'placeholder'=>'ESCRIBE EL APELLIDO PATERNO','required'=>'required', 'data-parsley-trigger' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
        </div>

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('mothers_last_name', 'Apellido Materno:') !!}
            {!! Form::text('mothers_last_name',null, [ 'style' => 'text-transform:uppercase','class' => 'form-control input-lg', 'placeholder'=>'ESCRIBE EL APELLIDO MATERNO','required'=>'required', 'data-parsley-trigger ' => 'input focusin','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
        </div>

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('curp', 'Curp:') !!}
            {!! Form::text('curp', null, [
                        'style' => 'text-transform:uppercase',
                        'class' => 'form-control input-lg', 
                        'id' => 'curp_input',
                        'oninput' => 'validarE(this)',
                        'placeholder' => 'ESCRIBE CURP', 
                        'required' => 'required',
                        'data-parsley-trigger ' => 'input focusin',
                        'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                     <pre id="resultadoedit"></pre>
        </div>
        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('ine', 'Ine:') !!}
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
            {!! Form::select('no_economic_dependent',['0'=>'0','1' => '1', ' 2' => ' 2', '3' => '3', '4' => '4', '5' => '5'],  null, ['class' => 'form-control input-lg', 'required' => 'required', 'data-parsley-trigger ' => 'input focusin',]) !!}
        </div>
        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('no_familys', 'No. Familias') !!}
            {!! Form::select('no_familys',['0'=>'0','1' => '1', ' 2' => ' 2', '3' => '3', '4' => '4', '5' => '5'], null, ['class' => 'form-control input-lg', 'required' => 'required', 'data-parsley-trigger ' => 'input focusin',]) !!}
        </div>
        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('type_of_housing', 'Tipo de Vivienda') !!}
            {!! Form::select('type_of_housing',['PROPIA'=>'PROPIA','FAMILIAR' => 'FAMILIAR', ' RENTA' => ' RENTA', 'HIPOTECA' => 'HIPOTECA'], null, ['class' => 'form-control input-lg', 'data-parsley-trigger ' => 'input focusin', 'required' => 'required']) !!}
        </div>
        @if (Auth::user()->hasRole(['administrador', 'director-general'])) 
         <div class="form-group col-sm-6 col-lg-4">
          {!! Form::label('maximun_amount', 'Monto Máximo') !!}
          <input type="number" name="maximun_amount" class="form-control input-lg" placeholder="MONTO MAXIMO" required="required" data-parsley-trigger="input focusin" data-parsley-type="digits" value="{{$client->maximun_amount}}" data-parsley-maxlength="10">
        </div>
        @endif
       @if(Auth::user()->hasRole(['ejecutivo-de-credito','coordinador-regional', 'coordinador-sucursal']))
         <div class="form-group col-sm-6 col-lg-4">
          {!! Form::label('maximun_amount', 'Monto Máximo') !!}
          <input type="number" name="maximun_amount" class="form-control input-lg" readonly="readonly" placeholder="MONTO MAXIMO" required="required" data-parsley-trigger="input focusin" value="{{$client->maximun_amount}}" data-parsley-type="digits" data-parsley-maxlength="10">
        </div>
        @endif
        <input type="hidden" name="avatar" value="{{$client->avatar}}">


        @php
        $count = App\Models\Branch::all();
        @endphp

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('branch_id', '* Sucursal:') !!}
            <select name="branch_id" required="required" data-parsley-trigger="input focusin" value="{{ old('branch_id') }}" class="form-control input-lg" ">
                @foreach($count as $branches)
                <option value="{{$branches->id}}" {{ ($branches->id == $client->branch_id) ? 'selected=selected' : '' }}>
                    {{$branches->name}} 
                    @endforeach
                </select>
            </div>
            <button class="btn btn-success btn-lg pull-right" type="submit">Guardar</button>
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
function validarE(input) {
    var curp = input.value.toUpperCase(),
    resultadoedit = document.getElementById("resultadoedit"),
    valido = "No válido";

    if (curpValida(curp)) { // ⬅️ Acá se comprueba
        valido = "Válido";
        resultadoedit.classList.add("ok");
    } else {
        resultadoedit.classList.remove("ok");
    }

    resultadoedit.innerText = "CURP: " + curp + "\nFormato: " + valido;
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


@include('clients.curp')