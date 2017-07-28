 <div class="box box-danger">
  <div class="box-header with-border">
    <h3 class="box-title">Solicitud de Crédito</h3>
  </div>  

  <div class="box-body">
    <div class="form-group col-sm-6 col-lg-4">
      {!! Form::label('adviser', 'Promotor:') !!}
      <input type="text" name="adviser" value=" {{ Auth::user()->name }} {{ Auth::user()->father_last_name }} {{ Auth::user()->mother_last_name }}", class="form-control input-lg" required="required" data-parsley-trigger="input focusin" readonly="">
    </div>

    <div class="form-group col-sm-6 col-lg-4">
      {!! Form::label('date', 'Fecha:') !!}
      <input type="date" name="date" class="form-control input-lg" required="required" data-parsley-trigger="input focusin">
    </div>
    


    <div class="form-group col-sm-6 col-lg-4">
      {!! Form::label('branch', 'Sucursal:') !!}
      {!! Form::text('branch',$client->branch->name, [
        'style' => 'text-transform:uppercase',
        'class' => 'form-control input-lg', 
        'required'=>'required',
        'data-parsley-trigger ' => 'input focusin',
        'readonly'=>'readonly',
        'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
        
      </div>
      <div class="form-group col-sm-6 col-lg-4">
        {!! Form::label('ammount', 'Monto Crédito:') !!}
        {!! Form::text('ammount',  null, [
          'style' => 'text-transform:uppercase',
          'class' => 'form-control input-lg', 
          'placeholder' => 'ESCRIBA EL MONTO ', 'required' => 'required',
          'data-parsley-trigger ' => 'input focusin',
          'data-parsley-type' => 'digits',
          'data-parsley-maxlength' => '5',
          'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
        </div>
        <div class="form-group col-sm-6 col-lg-4">
          {!! Form::label('interest_rate', 'Tasa Interés(%):') !!}
          {!! Form::text('interest_rate', $product->interest_of_cup, [
            'style' => 'text-transform:uppercase',
            'class' => 'form-control input-lg', 
            'required'=>'required',
            'data-parsley-trigger ' => 'input focusin',
            'readonly'=>'readonly',
            'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
          </div>
          <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('dues', 'No. Cuotas:') !!}
            {!! Form::select('dues', ['25'=>'25','30'=>'30'],null, [
              'style' => 'text-transform:uppercase',
              'class' => 'form-control input-lg', 
              'required'=>'required',
              'data-parsley-trigger ' => 'input focusin',
              'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>

            <div class="form-group col-sm-6 col-lg-4">
              {!! Form::label('periodicity', 'Periodicidad:') !!}
              {!! Form::text('periodicity', $product->name, [
                'style' => 'text-transform:uppercase',
                'class' => 'form-control input-lg', 
                'required'=>'required',
                'readonly'=>'readonly',
                'data-parsley-trigger ' => 'input focusin',
                'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
              </div>


              <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('warranty_type', 'Tipo de Garrantía:') !!}
                {!! Form::select('warranty_type',['LIQUIDA'=>'LIQUIDA','PRENDARIA'=>'PRENDARIA','AVALES'=>'AVALES'], null, [
                  'style' => 'text-transform:uppercase',
                  'class' => 'form-control input-lg', 
                  'required'=>'required',
                  'data-parsley-trigger ' => 'input focusin',
                  'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                </div>

                <div class="form-group col-sm-6 col-lg-4">
                  {!! Form::label('firts_name', 'Nombre:') !!}
                  {!! Form::text('firts_name', $client->firts_name, [
                    'style' => 'text-transform:uppercase',
                    'class' => 'form-control input-lg', 
                    'required'=>'required',
                    'data-parsley-trigger ' => 'input focusin',
                    'readonly' =>'readonly',
                    'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                  </div>

                  <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('last_name', 'Apellido Paterno:') !!}
                    {!! Form::text('last_name',$client->last_name, [
                      'style' => 'text-transform:uppercase',
                      'class' => 'form-control input-lg', 
                      'required'=>'required',
                      'data-parsley-trigger ' => 'input focusin',
                      'readonly'=>'readonly',
                      'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                    </div>


                    <div class="form-group col-sm-6 col-lg-4">
                      {!! Form::label('mothers_last_name', 'Apellido Materno:') !!}
                      {!! Form::text('mothers_last_name', $client->mothers_last_name, [
                        'style' => 'text-transform:uppercase',
                        'class' => 'form-control input-lg', 
                        'required'=>'required',
                        'data-parsley-trigger ' => 'input focusin',
                        'readonly'=>'readonly',
                        'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                      </div>


                      <div class="form-group col-sm-6 col-lg-4">
                        {!! Form::label('curp', 'Curp:') !!}
                        {!! Form::text('curp', $client->curp, [
                          'style' => 'text-transform:uppercase',
                          'class' => 'form-control input-lg', 
                          'required'=>'required',
                          'data-parsley-trigger ' => 'input focusin',
                          'readonly'=>'readonly',
                          'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                        </div>


                        <div class="form-group col-sm-6 col-lg-4">
                          {!! Form::label('ine', 'Ine:') !!}
                          {!! Form::text('ine', $client->ine, [
                            'style' => 'text-transform:uppercase',
                            'class' => 'form-control input-lg', 
                            'required'=>'required',
                            'data-parsley-trigger ' => 'input focusin',
                            'readonly'=>'readonly',
                            'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                          </div>

                          <input type="hidden" name="client_id" value="{{ $client->id}}">
                          

                          
                          <div class="form-group col-sm-6 col-lg-4">
                            {!! Form::label('collection_period', 'Horario Sugerido de Cobro:') !!}
                            {!! Form::select('collection_period',['MAÑANA'=>'MAÑANA','MEDIO DÍA'=>'MEDIO DIA','TARDE'=>'TARDE'],null, [
                              'style' => 'text-transform:uppercase',
                              'class' => 'form-control input-lg', 
                              'required'=>'required',
                              'data-parsley-trigger ' => 'input focusin',
                              'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                            </div>
                            <div class="form-group col-sm-6 col-lg-4">
                              {!! Form::label('firm', 'Firma:') !!}
                              {!! Form::text('firm',null, [
                                'style' => 'text-transform:uppercase',
                                'class' => 'form-control input-lg', 
                                'required'=>'required',
                                'data-parsley-trigger ' => 'input focusin',
                                'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                              </div>
                              <input type="hidden" name="type_product" value="{{$product->id}}">

                              <div class="form-group col-sm-12">
                                {!! Form::submit('GUARDAR', ['class' => 'btn btn-primary']) !!}
                              </div>


                            </div>


                            
                          </div>

