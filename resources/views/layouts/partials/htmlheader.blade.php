<head>
  <meta charset="UTF-8">
  <title>CREDIEFECTIVO</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Bootstrap 3.3.4 -->
  <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
  <!-- Font Awesome Icons -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- Ionicons -->
  <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="{{ asset('/css/AdminLTE.css') }}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
        -->
        <link href="{{ asset('/css/skins/skin-blue.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/css/skins/skin-red.css') }}" rel="stylesheet" type="text/css" />
        <!-- iCheck -->
        <link href="{{ asset('/plugins/iCheck/square/blue.css') }}" rel="stylesheet" type="text/css" />

        <!-- jQuery 2.1.4 -->
        <script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>

        <!--Gmaps-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBis8yocWXMzyTo7TsPea27M5ldBmlP1dg"></script>
        <link rel="stylesheet" href="{{ asset('css/gmaps/jquery-gmaps-latlon-picker.css') }}">
        <script src="{{ asset('js/gmaps/jquery-gmaps-latlon-picker.js')}}"></script>

        <!-- Toastr -->
        <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
        {{--  Datatables --}}
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
        <!--ChartJs-->
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js" />-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

        {{-- Form Wizard --}}
        <!-- Ionicons -->
        <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />

        <style>
          body{
            font-weight: bold;
          }
          .stepwizard-step p {
            margin-top: 10px;
          }

          .stepwizard-row {
            display: table-row;
          }

          .stepwizard {
            display: table;
            width: 100%;
            position: relative;
          }

          .stepwizard-step button[disabled] {
            opacity: 1 !important;
            filter: alpha(opacity=100) !important;
          }

          .stepwizard-row:before {
            top: 14px;
            bottom: 0;
            position: absolute;
            content: " ";
            width: 100%;
            height: 1px;
            background-color: #ccc;
            z-order: 0;

          }

          .stepwizard-step {
            display: table-cell;
            text-align: center;
            position: relative;
          }

          .btn-circle {
            width: 30px;
            height: 30px;
            text-align: center;
            padding: 6px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 15px;
          }

          /* Style checkbox */
          label.btn span {
            font-size: 1.5em ;
          }

          label input[type="radio"] ~ i.fa.fa-circle-o{
            color: #c8c8c8;    display: inline;
          }
          label input[type="radio"] ~ i.fa.fa-dot-circle-o{
            display: none;
          }
          label input[type="radio"]:checked ~ i.fa.fa-circle-o{
            display: none;
          }
          label input[type="radio"]:checked ~ i.fa.fa-dot-circle-o{
            color: #7AA3CC;    display: inline;
          }
          label:hover input[type="radio"] ~ i.fa {
            color: #7AA3CC;
          }

          label input[type="checkbox"] ~ i.fa.fa-square-o{
            color: #c8c8c8;    display: inline;
          }
          label input[type="checkbox"] ~ i.fa.fa-check-square-o{
            display: none;
          }
          label input[type="checkbox"]:checked ~ i.fa.fa-square-o{
            display: none;
          }
          label input[type="checkbox"]:checked ~ i.fa.fa-check-square-o{
            color: #7AA3CC;    display: inline;
          }
          label:hover input[type="checkbox"] ~ i.fa {
            color: #7AA3CC;
          }

          div[data-toggle="buttons"] label.active{
            color: #7AA3CC;
          }

          div[data-toggle="buttons"] label {
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: normal;
            line-height: 2em;
            text-align: left;
            white-space: nowrap;
            vertical-align: top;
            cursor: pointer;
            background-color: none;
            border: 0px solid 
            #c8c8c8;
            border-radius: 3px;
            color: #c8c8c8;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            -o-user-select: none;
            user-select: none;
          }

          div[data-toggle="buttons"] label:hover {
            color: #7AA3CC;
          }

          div[data-toggle="buttons"] label:active, div[data-toggle="buttons"] label.active {
            -webkit-box-shadow: none;
            box-shadow: none;
          }
        </style>
      </head>