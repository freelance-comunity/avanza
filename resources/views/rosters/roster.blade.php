<!DOCTYPE html>
<html>
<head>
  <title>Nomina</title>
  <style type="text/css">
  .clearfix:after {
    content: "";
    display: table;
    clear: both;
  }
  #logo {
    text-align: center;
    margin-bottom: 10px;
  }
  #logo img {
    width: 250px;
  }
  #div1 {
    float: left;
  }
  #div10, #div11, #div12 {
    width: 200px;
    height: 50px;
    margin-right: 50px;
    float: right;
  }
  .firm_employee{
   padding-right: 10px;
   padding-left: 200px;
 }

</style>
</head>
<body>
 <header class="clearfix">
  <div id="logo">
    <img src="{{ asset('img/logo.jpg') }}">
  </div> 
</header>
<main>
  <div>
    <div id="div1">
      RECIBO DE NOMINA: {{$roster->name_employee}} <br>
      NO. EMPLEADO: {{$roster->number_employee}} <br>
      REGION: {{$roster->coordination}}<br>
      SUCURSAL: {{$roster->branch_office}}<br>
      ESQUEMA DE PAGO: {{$roster->payment_scheme}} &nbsp;&nbsp;&nbsp;&nbsp;  PERIODO: {{$roster->payment_period}} 
    </div>
  </div>
  <div>
    <div id="div10">
     FECHA: {{$roster->date}}<br>
   </div>
 </div>
 <br><br><br><br><br>
 <hr>
 <div id="div1">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PERCEPCIONES: ${{number_format($roster->perceptions,2)}} &nbsp;&nbsp;&nbsp;&nbsp; DEDUCCIONES: ${{number_format($roster->deductions,2)}}&nbsp;&nbsp;&nbsp;&nbsp; NETO A PAGAR: ${{number_format($roster->grandchild_pay)}}
</div>
<br>
<hr>
<div id="div1">
 <h6 style="text-align: center; width:50%"><img  class="displayed" src="{{ asset('uploads/rosters/') }}/{{ $roster->coordinating_firm }}" style="height: 45px; max-width: 50%;"><br>{{$roster->coordinating_name}}
 </h6>
</div>
<div class="firm_employee">
  <h6><img  class="displayed" src="{{ asset('uploads/rosters/') }}/{{ $roster->employee_firm }}" style="height: 45px; max-width: 50%;"><br>{{$roster->name_employee}}
  </h6></div>
  <br>
  <div>
    - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
  </div>
  <br>
  <header class="clearfix">
  <div id="logo">
    <img src="{{ asset('img/logo.jpg') }}">
  </div> 
</header>
<main>
  <div>
    <div id="div1">
      RECIBO DE NOMINA: {{$roster->name_employee}} <br>
      NO. EMPLEADO: {{$roster->number_employee}} <br>
      REGION: {{$roster->coordination}}<br>
      SUCURSAL: {{$roster->branch_office}}<br>
      ESQUEMA DE PAGO: {{$roster->payment_scheme}} &nbsp;&nbsp;&nbsp;&nbsp;  PERIODO: {{$roster->payment_period}} 
    </div>
  </div>
  <div>
    <div id="div10">
     FECHA: {{$roster->date}}<br>
   </div>
 </div>
 <br><br><br><br><br>
 <hr>
 <div id="div1">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PERCEPCIONES: ${{number_format($roster->perceptions,2)}} &nbsp;&nbsp;&nbsp;&nbsp; DEDUCCIONES: ${{number_format($roster->deductions,2)}}&nbsp;&nbsp;&nbsp;&nbsp; NETO A PAGAR: ${{number_format($roster->grandchild_pay)}}
</div>
<br>
<hr>
<div id="div1">
 <h6 style="text-align: center; width:50%"><img  class="displayed" src="{{ asset('uploads/rosters/') }}/{{ $roster->coordinating_firm }}" style="height: 45px; max-width: 50%;"><br>{{$roster->coordinating_name}}
 </h6>
</div>
<div class="firm_employee">
  <h6><img  class="displayed" src="{{ asset('uploads/rosters/') }}/{{ $roster->employee_firm }}" style="height: 45px; max-width: 50%;"><br>{{$roster->name_employee}}
  </h6></div>
  <br>
</main>
</body>
</html>