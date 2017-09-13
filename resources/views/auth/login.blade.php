@extends('layouts.auth')

@section('htmlheader_title')
Inicio de Sesión
@endsection

@section('content')
<body class="hold-transition login-page">

    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/home') }}"><b>CREDI</b>EFECTIVO</a>
        </div><!-- /.login-logo -->

        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="login-box-body">
            <p class="login-box-msg">Introduce tus credenciales de acceso</p>
            <form action="{{ url('/login') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="md-form form-group has-feedback">
                    <input type="email" class="form-control input-lg" placeholder="Correo Electrónico" name="email"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="md-form form-group has-feedback">
                    <input type="password" class="form-control input-lg" placeholder="Contraseña" name="password"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember"> Recordar
                            </label>
                        </div>
                    </div><!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-danger btn-block">Entrar</button>
                    </div><!-- /.col -->
                </div>
            </form>

            <a style="color: rgb(194, 71, 54);" href="{{ url('/password/reset') }}">¿Olvidaste tu contraseña?</a><br>

        </div><!-- /.login-box-body -->
        <center>
            <a href="https://ssl.comodo.com">
                <img src="https://ssl.comodo.com/images/trusted-site-seal.png" alt="Comodo Trusted Site Seal" width="113" height="59" style="border: 0px;"></a><br> <span style="font-weight:bold; font-size:7pt"><a href="https://ssl.comodo.com">SSL Certificate</a></span><br>
            </center>
        </div><!-- /.login-box -->

        @include('layouts.partials.scripts_auth')

        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
            });
        </script>
    </body>

    @endsection
