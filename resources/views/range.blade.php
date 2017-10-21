@extends('layouts.app')

@section('main-content')
@section('contentheader_title')
Range
@endsection

<div style="position: relative; padding: 200px;">

    <div>
        <input type="text" id="range_10" value="" name="range_10" />
    </div>

</div>
<script>

    $(function () {

        $("#range").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 5000,
            from: 1000,
            to: 4000,
            type: 'double',
            step: 1,
            prefix: "$",
            grid: true
        });

    });
</script>
<script>
$("#range_10").ionRangeSlider({
    min: 500,
    max: 5000,
    from: 500,
    step: 100,
    prettify_enabled: false
});
</script>

<div id="anterior" style="display: none;"> 
            <h4>Plazo: <strong><span id="demomodalidaddiario"></span></strong></h4>
            <div class=" col-sm-6 col-lg-12 "  class="slidecontainer">
              <input type="range" min="1" max="25" value="12" class="slider" name="modalidaddiario" onChange="calculardiario()" id="modalidaddiario">
            </div><br>
            <input type="hidden" id="tasadiario" name="tasadiario" value="0.15">
            <h4>Monto Solicitado: <strong>$<span id="demordiario"></span></strong></h4>
            <div class=" col-sm-6 col-lg-12 "  class="slidecontainer">
              <input type="range" min="500" max="10000" value="5000" class="slider" name="capitaldiario" onChange="calculardiario()" id="capitaldiario">
            </div>
            <br>
            <input type="hidden" id="interesdiario" name="interesdiario" value="Norway">
            {!! Form::label('totaldiario', 'Cuota:') !!}  
            {!! Form::text('totaldiario', 'null', ['class' => 'form-control input-lg', 'id' => 'totalndiario', 'readonly' => 'readonly']) !!} 
            {!! Form::label('totalpaymentdiario', 'Total a Pagar:') !!}  
            {!! Form::text('totalpaymentdiario', null, ['class' => 'form-control input-lg', 'id' => 'totalpaymentdiario', 'readonly' => 'readonly']) !!}   
          </div>

          <div id="semanal" style="display: none;"  ">
            <input type="hidden" name="modalidad" id="modalidad" value="1">
            <input type="hidden" id="tasa" name="tasa" value="0.15">
            <h4>Monto Solicitado: <strong>$<span id="demo"></span></strong></h4>
            <div class=" col-sm-6 col-lg-12 " class="slidecontainer">
              <input type="range" min="200" max="5000" value="2500" class="slider" name="capital" onChange="calcular()" id="myRange">
            </div>
            <br>
            {!! Form::label('refrendo', 'Refrendo:') !!}  
            {!! Form::text('refrendo', null, ['class' => 'form-control input-lg', 'id' => 'refrendo', 'readonly' => 'readonly']) !!}
            <input type="hidden" id="interes" name="interes">
            {!! Form::label('total', 'Total a pagar:') !!}  
            {!! Form::text('total', null, ['class' => 'form-control input-lg', 'id' => 'totaln', 'readonly' => 'readonly']) !!}
          </div>

          <div id="credidiario4" style="display: none;"  ">
            <h4>Semanas: <strong><span id="democredi4"></span></strong></h4>
            <div class=" col-sm-6 col-lg-12 " class="slidecontainer">
              <input type="range" min="1" max="4" value="2" class="slider" name="modalidadfour" onChange="calcularcredi4()" id="modalidadfour">
            </div>
            <input type="hidden" id="tasafour" name="tasafour" value="0.28">
            <br>   
            <h4>Monto Solicitado: <strong>$<span id="democredi44"></span></strong></h4>
            <div class=" col-sm-6 col-lg-12 " id="slidecontainer">
              <input type="range" min="500" max="10000" value="5000" class="slider" name="capitalfour" onChange="calcularcredi4()" id="capitalfour">
            </div>
            <br>
            {!! Form::label('refrendofour', 'Refrendo:') !!}  
            {!! Form::text('refrendofour', null, ['class' => 'form-control input-lg', 'id' => 'refrendofour', 'readonly' => 'readonly']) !!}
            <input type="hidden" id="interesfour" name="interesfour">
            {!! Form::label('totalfour', 'Total a pagar:') !!}  
            {!! Form::text('totalfour', null, ['class' => 'form-control input-lg', 'id' => 'totalnfour', 'readonly' => 'readonly']) !!}
          </div>
<!--semanal-->
<script>
  function calcular()
  {
    capital = eval(document.getElementById('myRange').value);
    tasa = eval(document.getElementById('tasa').value);
    interes = capital * tasa;

    document.getElementById('interes').value=interes;
    modalidad = eval(document.getElementById('modalidad').value);

    utilidad_neta = capital + interes;
    total= utilidad_neta/modalidad;
    var formatter = new Intl.NumberFormat('en-US', {
      style: 'currency',
      currency: 'USD',
      minimumFractionDigits: 2,
    });

    var formatterr = new Intl.NumberFormat('en-US', {
      style: 'currency',
      currency: 'USD',
      minimumFractionDigits: 2,
    });


    document.getElementById('totaln').value=formatterr.format(Math.ceil(total));
    document.getElementById('refrendo').value=formatter.format(Math.ceil(interes));         
  }


  function calcularcredi4()
  {
    capitalfour = eval(document.getElementById('capitalfour').value);
    tasafour = eval(document.getElementById('tasafour').value);
    interesfour = capitalfour * tasafour;

    document.getElementById('interesfour').value=interesfour;
    modalidadfour = eval(document.getElementById('modalidadfour').value);

    utilidad_netafour = capitalfour + interesfour;
    totalfour= utilidad_netafour/modalidadfour;
    var formatterfour = new Intl.NumberFormat('en-US', {
      style: 'currency',
      currency: 'USD',
      minimumFractionDigits: 2,
    });

    var formatterrfourfour = new Intl.NumberFormat('en-US', {
      style: 'currency',
      currency: 'USD',
      minimumFractionDigits: 2,
    });


    document.getElementById('totalnfour').value=formatterrfourfour.format(Math.ceil(totalfour));
    document.getElementById('refrendofour').value=formatterfour.format(Math.ceil(interesfour));         
  }
  function calcularr()
  {
    capitalr = eval(document.getElementById('capitalr').value);
    tasar = eval(document.getElementById('tasar').value);
    interesr = capitalr * tasar;

    document.getElementById('interesr').value=interes;
    modalidadr = eval(document.getElementById('modalidadr').value);

    utilidad_netar = capitalr + interesr;
    totalr= utilidad_netar/modalidadr;

    var formatterr = new Intl.NumberFormat('en-US', {
      style: 'currency',
      currency: 'USD',
      minimumFractionDigits: 2,
    });


    document.getElementById('totalnr').value=formatterr.format(Math.ceil(totalr));  

    var formatter = new Intl.NumberFormat('en-US', {
      style: 'currency',
      currency: 'USD',
      minimumFractionDigits: 2,
    });

    totalpayment =  capitalr + interesr;
    document.getElementById('totalpayment').value = formatter.format(Math.ceil(totalpayment));  
  }

  function calculardiario()
  {
    capitaldiario = eval(document.getElementById('capitaldiario').value);
    tasadiario= eval(document.getElementById('tasadiario').value);
    interesdiario = capitaldiario * tasadiario;

    document.getElementById('interesdiario').value=interes;
    modalidaddiario = eval(document.getElementById('modalidaddiario').value);

    utilidad_netadiario = capitaldiario + interesdiario;
    totaldiario= utilidad_netadiario/modalidaddiario;

    var formatterr = new Intl.NumberFormat('en-US', {
      style: 'currency',
      currency: 'USD',
      minimumFractionDigits: 2,
    });


    document.getElementById('totalndiario').value=formatterr.format(Math.ceil(totaldiario));  

    var formatter = new Intl.NumberFormat('en-US', {
      style: 'currency',
      currency: 'USD',
      minimumFractionDigits: 2,
    });

    totalpaymentdiario =  capitaldiario + interesdiario;
    document.getElementById('totalpaymentdiario').value = formatter.format(Math.ceil(totalpaymentdiario));  
  }
</script>


<script>
  var slider = document.getElementById("myRange");
  var output = document.getElementById("demo");
  output.innerHTML = slider.value;

  slider.oninput = function() {
    output.innerHTML = this.value;
  }
</script>

<script>
  var slider3 = document.getElementById("modalidadfour");
  var output3 = document.getElementById("democredi4");
  output3.innerHTML = slider3.value;

  slider3.oninput = function() {
    output3.innerHTML = this.value;
  }
</script>
<script>
  var slider4 = document.getElementById("capitalfour");
  var output4 = document.getElementById("democredi44");
  output4.innerHTML = slider4.value;

  slider4.oninput = function() {
    output4.innerHTML = this.value;
  }
  
</script>


<script>
  var slider1 = document.getElementById("modalidadr");
  var output1 = document.getElementById("demomodalidad");
  output1.innerHTML = slider1.value;

  slider1.oninput = function() {
    output1.innerHTML = this.value;
  }

</script>
<script>
  var sliderdiario = document.getElementById("modalidaddiario");
  var outputdiario = document.getElementById("demomodalidaddiario");
  outputdiario.innerHTML = sliderdiario.value;

  sliderdiario.oninput = function() {
    outputdiario.innerHTML = this.value;
  }

</script>
<script>
 var slider2 = document.getElementById("capitalr");
 var output2 = document.getElementById("demor");
 output2.innerHTML = slider2.value;

 slider2.oninput = function() {
  output2.innerHTML = this.value;
}

</script>
<script>
 var slider2diario = document.getElementById("capitaldiario");
 var output2diario = document.getElementById("demordiario");
 output2diario.innerHTML = slider2diario.value;

 slider2diario.oninput = function() {
  output2diario.innerHTML = this.value;
}

</script>

<!--END ADMIN & DG-->
@endsection
