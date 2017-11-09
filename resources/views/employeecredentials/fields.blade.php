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
        <h3 class="box-title">EDITAR IDENTIFICACIONES</h3>
    </div>
    <div class="box-body">

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('ine', 'INE:') !!}
            {!! Form::text('ine', null, [
                'class' => 'form-control input-lg',
                'required' => 'required',
                'data-parsley-type' => 'digits',
                'data-parsley-trigger ' => 'input focusin',
                ]) !!}
            </div>

            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('curp', 'CURP:') !!}
                {!! Form::text('curp', null, [
                    'class' => 'form-control input-lg',
                    'id' => 'curp_input',
                    'oninput' => 'validarInput(this)',
                    'placeholder' => 'ESCRIBE CURP', 
                    'required' => 'required',
                    'data-parsley-trigger ' => 'input focusin',
                    'onkeyup' => 'javascript:this.value=this.value.toUpperCase();'
                    ]) !!}
                </div>

                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('rfc', 'RFC:') !!}
                    {!! Form::text('rfc', null, [
                        'class' => 'form-control input-lg',
                        'required' => 'required',
                        'data-parsley-trigger ' => 'input focusin',
                        ]) !!}
                    </div>

                    <div class="form-group col-sm-6 col-lg-4">
                        {!! Form::label('passport', 'PASAPORTE:') !!}
                        {!! Form::text('passport', null, [
                            'class' => 'form-control input-lg',
                            'required' => 'required',
                            'data-parsley-trigger ' => 'input focusin',
                            ]) !!}
                        </div>

                        <div class="form-group col-sm-6 col-lg-4">
                            {!! Form::label('number_imss', 'IMSS:') !!}
                            {!! Form::text('number_imss', null, [
                                'class' => 'form-control input-lg',
                                'required' => 'required',
                                'data-parsley-trigger ' => 'input focusin',
                                ]) !!}
                            </div>

                            <div class="form-group col-sm-6 col-lg-4">
                                {!! Form::label('driver_license', 'Licencia de Conducir:') !!}
                                {!! Form::text('driver_license', null, [
                                    'class' => 'form-control input-lg',
                                    'required' => 'required',
                                    'data-parsley-trigger ' => 'input focusin',
                                    ]) !!}
                                </div>

                                <div class="form-group col-sm-6 col-lg-4">
                                    {!! Form::label('professional_id', 'Cédula Profesional:') !!}
                                    {!! Form::text('professional_id', null, [
                                        'class' => 'form-control input-lg',
                                        'required' => 'required',
                                        'data-parsley-trigger ' => 'input focusin',
                                        ]) !!}
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
