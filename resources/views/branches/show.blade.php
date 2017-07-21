@extends('layouts.app')

@section('main-content')
@section('contentheader_title')
Detalles de la {{$branch->name}}
@endsection
<div class="container">
  <div class="box box-danger">
      <div class="box-header with-border">
        <div class="row">
            <div class="col-md-4">
              <!-- Widget: user widget style 1 -->
              <div class="box box-widget widget-user-2 bg-navy">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header ">
                  <h3 class="widget-user-username">{{strtoupper($branch->name)}}</h3>
                  <h5 class="widget-user-desc">{{strtoupper($branch->address) }}</h5>
              </div>
              <div class="box-footer no-padding">
                  <ul class="nav nav-stacked">
                    <li><a href="#">Empleados <span class="pull-right badge bg-blue">31</span></a></li>
                    <li><a href="#">Clientes <span class="pull-right badge bg-aqua">5</span></a></li>
                    <li><a href="#">Creditos Activos <span class="pull-right badge bg-green">12</span></a></li>
                    <li><a href="#">Total de Créditos <span class="pull-right badge bg-red">842</span></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="timeline-item">
        <div class="timeline-body">
            <div class="container" style="width: 100%;
            margin: 0 auto;
            margin-top:5px;">
            <div id="map_container" style="position: relative;"></div>
            <div id="map" style=" height: 0;
            overflow: hidden;
            padding-bottom: 22.25%;
            padding-top: 30px;
            position: relative;"></div>
        </div>  
        @include('branches.script-map')

    </div>

</div>
<!--Aqui va la otra parte line 587-->
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Graficas
    <small>{{$branch->name}}</small>
</h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-6"> 

        <canvas id="myChart" width="5" height="5"></canvas>
        <script>
            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["{{$branch->name}}"],
                    datasets: [{
                        label: '# of Votes',
                        data: ["{{$branch->count()}}"],
                        backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        </script>
    </div>
    
    <!-- /.col (LEFT) -->
    <div class="col-md-6">
    <p>Grafica Pastel</p>
    <canvas id="pie-chart" width="800" height="700"></canvas>
        <script>
        new Chart(document.getElementById("pie-chart"), {
    type: 'doughnut',
    data: {
      labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
      datasets: [{
        label: "Population (millions)",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
        data: [2478,5267,734,784,433]
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Predicted world population (millions) in 2050'
      }
    }
});
</script>
</div>
<!-- /.col (RIGHT) -->
</div>
<!-- /.row -->


</section>


<!-- /.col -->
</div>
<!-- /.row -->
</div>
</div>
</div>
@endsection