   <div class="box box-danger">
    <div class="box-header with-border">
      <h3 class="box-title">Productos</h3>
  </div>  

  <div class="box-body">
    <div class="form-group col-sm-6 col-lg-4">
        {!! Form::label('code', 'Codigo del Producto:') !!}
        {!! Form::text('code', null, [ 'style' => 'text-transform:uppercase',
          'class' => 'form-control input-lg', 
          'placeholder'=>'ESCRIBE EL CODIGO DEL PRODUCTO',
          'required'=>'required',
          'data-parsley-trigger ' => 'input focusin',
          'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
      </div>


      <div class="form-group col-sm-6 col-lg-4">
        {!! Form::label('name', 'Nombre del Producto:') !!}
        {!! Form::text('name', null, [ 'style' => 'text-transform:uppercase',
          'class' => 'form-control input-lg', 
          'placeholder'=>'ESCRIBE EL NOMBRE DEL PRODUCTO',
          'required'=>'required',
          'data-parsley-trigger ' => 'input focusin',
          'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
      </div>


      <div class="form-group col-sm-6 col-lg-4">
        {!! Form::label('interest_of_cup', 'Interés:') !!}
        {!! Form::text('interest_of_cup', null, [
            'style' => 'text-transform:uppercase',
            'class' => 'form-control input-lg',
            'placeholder'=>'ESCRIBE EL INTERÉS DEL PRODUCTO',
            'required'=>'required',
            'data-parsley-trigger ' => 'input focusin',
            'data-parsley-type' => 'digits',
            'data-parsley-maxlength' => '2',
            'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
        </div> 

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('ammount_max', 'Monto  Máximo:') !!}
            {!! Form::text('ammount_max', null, [
                'style' => 'text-transform:uppercase',
                'class' => 'form-control input-lg',
                'placeholder'=>'ESCRIBE EL MONTO MÁXIMO',
                'required'=>'required',
                'data-parsley-trigger ' => 'input focusin',
                'data-parsley-type' => 'digits',
                'data-parsley-maxlength' => '5',
                'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
              </div> 


        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('ammount_min', 'Monto Mínimo:') !!}
            {!! Form::text('ammount_min', null, [
                'style' => 'text-transform:uppercase',
                'class' => 'form-control input-lg',
                'placeholder'=>'ESCRIBE EL MONTO MÍNIMO',
                'required'=>'required',
                'data-parsley-trigger ' => 'input focusin',
                'data-parsley-type' => 'digits',
                'data-parsley-maxlength' => '5',
                'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
              </div> 


        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('surcharge', 'Recargo:') !!}
            {!! Form::text('surcharge', null, [
                'style' => 'text-transform:uppercase',
                'class' => 'form-control input-lg',
                'placeholder'=>'ESCRIBE EL RECARGO',
                'required'=>'required',
                'data-parsley-trigger ' => 'input focusin',
                'data-parsley-type' => 'digits',
                'data-parsley-maxlength' => '5',
                'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
              </div> 



        <div class="form-group col-sm-12">
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
        </div>

    </div>
