<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'CREDIEFECTIVO')
        <small>@yield('contentheader_description')</small>
        <!--<img src="{{ asset('img/logo.jpg') }}" style="width: 250px; height: 100px;" class="img-responsive" alt="">-->
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {{ trans('adminlte_lang::message.level') }}</a></li>
        <li class="active">{{ trans('adminlte_lang::message.here') }}</li>
    </ol>
</section>