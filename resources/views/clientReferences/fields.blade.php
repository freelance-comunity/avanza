
<div class="box box-danger">
    <div class="box-header with-border">
     <h3>REFENCIA</h3>
     <div class="form-group col-sm-6 col-lg-12">
        <div class="form-group col-sm-6 col-lg-4">
          {!! Form::label('name_reference', 'Nombre:') !!}
          {!! Form::text('name_reference', null, ['class' => 'form-control input-lg', 'placeholder' => 'NOMBRE DE LA REFENCIA', 'data-parsley-trigger ' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
      </div>
      <div class="form-group col-sm-6 col-lg-4">
          {!! Form::label('last_name_reference', 'Apellido Paterno:') !!}
          {!! Form::text('last_name_reference', null, ['class' => 'form-control input-lg', 'placeholder' => 'NOMBRE DE LA REFENCIA', 'data-parsley-trigger ' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
      </div>
      <div class="form-group col-sm-6 col-lg-4">
          {!! Form::label('mothers_name_reference', 'Apellido Materno:') !!}
          {!! Form::text('mothers_name_reference', null, ['class' => 'form-control input-lg', 'placeholder' => 'NOMBRE DE LA REFENCIA', 'data-parsley-trigger ' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
      </div>
  </div>
  <div class="form-group col-sm-6 col-lg-12">
    <div class="form-group col-sm-6 col-lg-4">
      {!! Form::label('phone_reference', 'Teléfono:') !!}
      <input type="number" name="phone_reference" class="form-control input-lg" id="telefono" placeholder="TELÉFONO" required="required" data-parsley-trigger="input focusin" data-parsley-type="digits" data-parsley-maxlength="10">
  </div>
  <div class="form-group col-sm-6 col-lg-4">
      {!! Form::label('relationship', 'Parentesco:') !!}
      {!! Form::select('relationship',['PADRE' => 'PADRE', 'MADRE' => 'MADRE','SUEGRO(A)'=>'SUEGRO(A)','ESPOSO(A)'=>'ESPOSO(A)','HIJO(A)'=>'HIJO(A)','YERNO'=>'YERNO','NUERA'=>'NUERA','ABUELO(A)'=>'ABUELO(A)','NIETO(A)'=>'NIETO(A)','HERMANO(A)'=>'HERMANO(A)','CUÑADO(A)'=>'CUÑADO(A)','SOBRINO(A)'=>'SOBRINO(A)','TIO(A)'=>'TIO(A)','AMIGO(A)'=>'AMIGO(A)'], null, ['class' => 'form-control input-lg', 'required' => 'required','data-parsley-trigger ' => 'input focusin',]) !!}
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



