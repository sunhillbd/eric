<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ESE Law</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="description" content="Avalon Admin Theme">
    <meta name="author" content="The Red Team">

    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,700' rel='stylesheet' type='text/css'>

    <!--[if lt IE 10]>
    {!! Html::script('assets/js/media.match.min.js') !!}
    {!! Html::script('assets/js/placeholder.min.js') !!}
    <![endif]-->
    {!! Html::style('assets/fonts/font-awesome/css/font-awesome.min.css') !!}

    {!! Html::style('assets/css/styles.css') !!}

    {!! Html::style('assets/plugins/jstree/dist/themes/avalon/style.min.css') !!}

    {!! Html::style('assets/plugins/codeprettifier/prettify.css') !!}

    {!! Html::style('assets/plugins/iCheck/skins/minimal/blue.css') !!}


    <!-- Html5 shim and Respond.js IE8 support of Html5 elements and media queries. Placeholdr.js enables the placeholder attribute -->
    <!--[if lt IE 9]>
    {!! Html::style('assets/css/ie8.css') !!}


        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>
    {!! Html::script('assets/plugins/charts-flot/excanvas.min.js') !!}
        <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- The following CSS are included as plugins and can be removed if unused-->

    @yield('styles')
   {{-- <style>
        .dashboardloginform, .dashboardloginform:focus {
            border-top: none;
            border-right: none;
            border-left: none;
            border-radius: 0;
            background-color: transparent;
            border-bottom: 2px solid #999;
            font-size: 16px;
        }
        .dashboardloginform::-webkit-input-placeholder {
            color: #5f7676;
        }
    </style>
    
<link href="assets/plugins/form-daterangepicker/daterangepicker-bs3.css" type="text/css" rel="stylesheet">    	<!-- DateRangePicker -->
<link href="assets/plugins/switchery/switchery.css" type="text/css" rel="stylesheet">        					<!-- Switchery -->
<link href="assets/plugins/fullcalendar/fullcalendar.css" type="text/css" rel="stylesheet"> 	--}}					<!-- FullCalendar -->

    </head>

    <body class="infobar-offcanvas">
        
        @include('frontend.dashboard.partials.header')

        <div id="wrapper">
            <div id="layout-static">

                @include('frontend.dashboard.partials.sidebar')

                <div class="static-content-wrapper">


                        <span class="pull-right">
                                @if(isset(auth()->user()->first_name))

                                    Welcome Mr {{ auth()->user()->first_name }}
                                @endif
                        </span>


                    @yield('content')

                </div>
            </div>
        </div>

      @include('frontend.dashboard.partials.footer')


        {!! Html::script('assets/js/jquery-1.10.2.min.js') !!}

        {!! Html::script('assets/js/jqueryui-1.9.2.min.js') !!}

        {!! Html::script('assets/js/bootstrap.min.js') !!}

        {!! Html::script('assets/plugins/jquery-slimscroll/jquery.slimscroll.js') !!}

        {!! Html::script('assets/plugins/sparklines/jquery.sparklines.min.js') !!}

        {!! Html::script('assets/plugins/jstree/dist/jstree.min.js') !!}

        {!! Html::script('assets/plugins/codeprettifier/prettify.js') !!}

        {!! Html::script('assets/plugins/bootstrap-switch/bootstrap-switch.js') !!}
        {!! Html::script('assets/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js') !!}
        {!! Html::script('assets/plugins/iCheck/icheck.min.js') !!}
        {!! Html::script('assets/js/enquire.min.js') !!}
        {!! Html::script('assets/plugins/bootbox/bootbox.js') !!}
        {!! Html::script('assets/js/application.js') !!}
        {!! Html::script('assets/demo/demo.js') !!}
        {!! Html::script('assets/demo/demo-switcher.js') !!}
        {!! Html::script('assets/plugins/simpleWeather/jquery.simpleWeather.min.js') !!}
        {!! Html::script('assets/js/responsivenav.js') !!}




        @yield('scripts')

<!-- End loading site level scripts -->
    
<!-- Load page level scripts-->

<!-- End loading page level scripts-->

    </body>
</html>