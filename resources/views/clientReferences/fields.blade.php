<div class="box box-danger">
    <div class="box-header with-border">
        <div>
            <h3> Datos de la Referencia</h3>
        </div>
        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('firts_name_reference', 'Nombre(s):') !!}
            {!! Form::text('firts_name_reference', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE EL NOMBRE', 'required' => 'required','data-parsley-trigger ' => 'input focusin','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
        </div>
        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('last_name_reference', 'Apellido Paterno:') !!}
            {!! Form::text('last_name_reference',  null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE EL APELLIDO PATERNO', 'required' => 'required','data-parsley-trigger ' => 'input focusin','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
        </div>

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('mothers_last_name_reference', 'Apellido Materno:') !!}
            {!! Form::text('mothers_last_name_reference', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE EL APELLIDO MATERNO', 'required' => 'required','data-parsley-trigger ' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
        </div>

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('phone_reference', 'Teléfono:') !!}
            {!! Form::text('phone_reference', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE EL TELÉFONO', 'required' => 'required', 'data-parsley-trigger ' => 'input focusin', 'data-parsley-type' => 'digits',
            'data-parsley-maxlength' => '10','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
        </div>



        <button class="btn btn-success btn-lg pull-right" type="submit">Guardar</button>

    </div>    
</div>

