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
        <input type="hidden" name="client_id" value="{{ $client->id}}">
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
          {!! Form::label('interest_rate', 'Tasa Interé:') !!}
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
            {!! Form::text('dues', null, [
              'style' => 'text-transform:uppercase',
              'class' => 'form-control input-lg', 
              'required'=>'required',
              'data-parsley-trigger ' => 'input focusin',
              'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>

            <div class="form-group col-sm-6 col-lg-4">
              {!! Form::label('periodicity', 'Periodicidad:') !!}
              {!! Form::text('periodicity', null, [
                'style' => 'text-transform:uppercase',
                'class' => 'form-control input-lg', 
                'required'=>'required',
                'data-parsley-trigger ' => 'input focusin',
                'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
              </div>


              <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('warranty_type', 'Tipo de Garrantía:') !!}
                {!! Form::text('warranty_type', null, [
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

                          <input type="hidden" name="civil_status" value="{{$client->civil_status}}">
                          <input type="hidden" name="scholarship" value="{{$client->scholarship}}">
                          <input type="hidden" name="phone" value="{{$client->phone}}">
                          <input type="hidden" name="dependents" value="{{$client->no_economic_dependent}}">
                          <input type="hidden" name="no_familys" value="{{$client->no_familys}}">
                          <input type="hidden" name="type_of_housing" value="{{$client->type_of_housing}}">
                          <input type="hidden" name="street" value="{{$client->location->street}}">
                          <input type="hidden" name="number" value="{{$client->location->number}}">
                          <input type="hidden" name="colony" value="{{$client->location->colony}}">
                          <input type="hidden" name="municipality" value="{{$client->location->municipality}}">
                          <input type="hidden" name="state" value="{{$client->location->state}}">
                          <input type="hidden" name="postal_code" value="{{$client->location->postal_code}}">
                          <input type="hidden" name="references" value="{{$client->location->references}}">
                          <input type="hidden" name="street_company" value="{{$client->company->street_company}}">
                          <input type="hidden" name="number_company" value="{{$client->company->number_company}}">
                          <input type="hidden" name="colony_company" value="{{$client->company->colony_company}}">
                          <input type="hidden" name="municipality_company" value="{{$client->company->municipality_company}}">
                          <input type="hidden" name="state_company" value="{{$client->company->state_company}}">
                          <input type="hidden" name="postal_code_company" value="{{$client->company->postal_code_company}}">
                          <input type="hidden" name="phone_company" value="{{$client->company->phone_company}}">
                          <input type="hidden" name="name_company" value="{{$client->company->name_company}}">
                          <input type="hidden" name="inventory" value="{{$client->company->inventory}}">
                          <input type="hidden" name="maq_equi" value="{{$client->company->machinery_equipment}}">
                          <input type="hidden" name="vehicles" value="{{$client->company->vehicles}}">
                          <input type="hidden" name="property" value="{{$client->company->property}}">
                          <input type="hidden" name="box_benck" value="{{$client->company->box_benck}}">
                          <input type="hidden" name="accounts" value="{{$client->company->accounts}}">
                          <input type="hidden" name="suppliers" value="{{$client->company->suppliers}}">
                          <input type="hidden" name="credits" value="{{$client->company->credits}}">
                          <input type="hidden" name="payments" value="{{$client->company->payments}}">
                          <input type="hidden" name="specify" value="{{$client->company->specify}}">
                          <input type="hidden" name="weekday" value="{{$client->company->weekday}}">
                          <input type="hidden" name="weekend" value="{{$client->company->weekend}}">
                          <input type="hidden" name="utility" value="{{$client->company->utility}}">
                          <input type="hidden" name="other_income" value="{{$client->company->other_income}}">
                          <input type="hidden" name="rent" value="{{$client->company->rent}}">
                          <input type="hidden" name="salary" value="{{$client->company->salary}}">
                          <input type="hidden" name="others" value="{{$client->company->others}}">                          


                          @php
                          $aval = $client->aval;
                          @endphp

                          @foreach($aval as $aval)
                          <input type="hidden" name="name_aval" value="{{$aval->name_aval}}">
                          <input type="hidden" name="last_name_aval" value="{{$aval->last_name_aval}}">
                          <input type="hidden" name="mothers_name_aval" value="{{$aval->mothers_name_aval}}">
                          <input type="hidden" name="birthdate_aval" value="{{$aval->birthdate_aval}}">
                          <input type="hidden" name="curp_aval" value="{{$aval->curp_aval}}">
                          <input type="hidden" name="phone_aval" value="{{$aval->phone_aval}}">
                          <input type="hidden" name="civil_status_aval" value="{{$aval->civil_status_aval}}">
                          <input type="hidden" name="scholarship_aval" value="{{$aval->scholarship_aval}}">
                          <input type="hidden" name="street_aval" value="{{$aval->street_aval}}">
                          <input type="hidden" name="number_aval" value="{{$aval->number_aval}}">
                          <input type="hidden" name="name_aval" value="{{$aval->name_aval}}">
                          <input type="hidden" name="colony_aval" value="{{$aval->colony_aval}}">
                          <input type="hidden" name="municipality_aval" value="{{$aval->municipality_aval}}">
                          <input type="hidden" name="state_aval" value="{{$aval->state_aval}}">
                          <input type="hidden" name="postal_code_aval" value="{{$aval->postal_code_aval}}">
                          @endforeach

                          @php
                          $references = $client->references;
                          @endphp
                          @foreach ($references as $reference)
                          <input type="hidden" name="firts_name_reference"   value="{{$reference->firts_name_reference}}">
                          <input type="hidden" name="last_name_reference"  value="{{$reference->last_name_reference}}">
                          <input type="hidden" name="mothers_last_name_reference"  value="{{$reference->mothers_last_name_reference}}">
                          <input type="hidden" name="phone_reference"  value="{{$reference->phone_reference}}">

                          <input type="hidden" name="firts_name_reference2"  value="{{$reference->firts_name_reference}}">
                          <input type="hidden" name="last_name_reference2"  value="{{$reference->last_name_reference}}">
                          <input type="hidden" name="mothers_last_name_referesnce2"  value="{{$reference->mothers_last_name_reference}}">
                          <input type="hidden" name="phone_reference2" value="{{$reference->phone_reference}}">


                          @endforeach
                          
                           <div class="form-group col-sm-6 col-lg-4">
                          {!! Form::label('collection_period', 'Período de Cobro:') !!}
                          {!! Form::text('collection_period',null, [
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
                          </div>
                          <div class="form-group col-sm-6 col-lg-4">
                            {!! Form::label('status', 'status:') !!}
                            {!! Form::text('status', null, [
                            'style' => 'text-transform:uppercase',
                            'class' => 'form-control input-lg', 
                            'required'=>'required',
                            'data-parsley-trigger ' => 'input focusin',
                            'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                          </div>



                          <div class="form-group col-sm-12">
                            {!! Form::submit('GUARDAR', ['class' => 'btn btn-primary']) !!}
                          </div>
