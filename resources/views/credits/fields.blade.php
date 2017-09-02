 <div class="box box-danger">
  <div class="box-header with-border">
    <h3 class="box-title">Solicitud de Crédito</h3>
  </div>  

  <div class="box-body">
 

   <input type="hidden" name="adviser" value="{{ Auth::user()->name }} {{ Auth::user()->father_last_name }} {{ Auth::user()->mother_last_name }}">
   <div class="form-group col-sm-6 col-lg-12">
     <div class="form-group col-sm-6 col-lg-4">
      {!! Form::label('date', 'Fecha:') !!}
      <input type="date" name="date" class="form-control input-lg" required="required" data-parsley-trigger="input focusin">
    </div>
    <div class="form-group col-sm-6 col-lg-4">
      {!! Form::label('ammount', 'Monto Crédito:') !!}
        <!--{!! Form::text('ammount',  null, [
          'style' => 'text-transform:uppercase',
          'class' => 'form-control input-lg', 
          'placeholder' => 'ESCRIBA EL MONTO ', 'required' => 'required',
          'data-parsley-trigger ' => 'input focusin',
          'data-parsley-type' => 'digits',
          'data-parsley-maxlength' => '5',
          'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}-->
          <input type="number" name="ammount" placeholder="ESCRIBA EL MONTO" class="form-control input-lg" data-parsley-trigger="input focusin" required="required">
        </div>
        @if ($product->name == 'DIARIO')
        <div class="form-group col-sm-6 col-lg-4">
          {!! Form::label('dues', 'No. Cuotas:') !!}
          {!! Form::select('dues', ['25'=>'25','30'=>'30', '52'=>'52','60'=>'60'],null, [
            'style' => 'text-transform:uppercase',
            'class' => 'form-control input-lg', 
            'required'=>'required',
            'data-parsley-trigger ' => 'input focusin',
            'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
          </div>
          @else
          <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('dues', 'No. Cuotas:') !!}
            {!! Form::select('dues', ['1'=>'1'],null, [
              'style' => 'text-transform:uppercase',
              'class' => 'form-control input-lg', 
              'required'=>'required',
              'data-parsley-trigger ' => 'input focusin',
              'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            @endif
          </div>
          <input type="hidden" name="branch" value="{{ $client->branch->name}}">



          <input type="hidden" name="interest_rate" value="{{$product->interest_of_cup}}">

          <input type="hidden" name="periodicity" value="{{$product->name}}">
          <input type="hidden" name="firts_name" value="{{$client->firts_name}}">
          <input type="hidden" name="last_name" value="{{$client->last_name}}">
          <input type="hidden" name="mothers_last_name" value="{{$client->mothers_last_name}}">
          <input type="hidden" name="curp" value="{{$client->curp}}">
          <input type="hidden" name="ine" value="{{$client->ine}}">
          <input type="hidden" name="client_id" value="{{ $client->id}}">
           <div class="form-group col-sm-6 col-lg-12">
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
                'class' => 'form-control input-lg', 
                'id'    => 'signature',
                'required'=>'required',
                'data-parsley-trigger ' => 'input focusin',
                'readonly'
                ]) !!}
              </div>
              </div>
                <div class="form-group col-sm-12 col-lg-12">
              <div class="form-group col-sm-12 col-lg-12">
                <div id="signature-pad" class="m-signature-pad">
                  <div class="m-signature-pad--body">
                    <canvas style="border: 1px solid black; height: 200px;"></canvas>
                  </div>
                  <div class="m-signature-pad--footer">
                    <button type="button" class="button clear" data-action="clear">Limpiar</button>
                    <button type="button" class="button save" data-action="save">Usar</button>
                  </div>
                </div>

              </div>
              </div>
              <input type="hidden" name="type_product" value="{{$product->id}}">
              <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

              <div class="box-body" >
               <div class="col-md-4">
                <div class="btn-group">
                  {!! Form::submit('Guardar', ['class' => 'uppercase btn btn-primary', 'id' => 'save']) !!}
                </div>
              </div> 
            </div>
          </div>                            
        </div>
        @include('credits.signature')

