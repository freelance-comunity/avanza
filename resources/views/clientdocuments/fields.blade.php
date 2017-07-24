<!-- CLIENTS DOCUMENTS-->
<div class="box box-danger">
    <div class="box-header with-border">
        <div>
        <h3> Datos del Aval</h3>
      </div>
    <div class="col-xs-12">
        <div class="col-md-12">	
            <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('ine', 'INE:') !!}
                {!! Form::file('ine') !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('curp', 'CURP:') !!}
                {!! Form::file('curp') !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('proof_of_addres', 'Comprobante de Domicilio:') !!}
                {!! Form::file('proof_of_addres') !!}
            </div>
            <button class="btn btn-success btn-lg pull-right" type="submit">Guardar</button>
        </div>
    </div>
</div>