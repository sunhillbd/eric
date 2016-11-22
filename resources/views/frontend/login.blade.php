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
        <script src="assets/js/media.match.min.js"></script>
        <script src="assets/js/placeholder.min.js"></script>
    <![endif]-->

    <link href="assets/fonts/font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet">
    <link href="assets/css/styles.css" type="text/css" rel="stylesheet">

    <link href="assets/plugins/jstree/dist/themes/avalon/style.min.css" type="text/css" rel="stylesheet">
    <link href="assets/plugins/codeprettifier/prettify.css" type="text/css" rel="stylesheet">
    <link href="assets/plugins/iCheck/skins/minimal/blue.css" type="text/css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries. Placeholdr.js enables the placeholder attribute -->
    <!--[if lt IE 9]>
        <link href="assets/css/ie8.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>
        <script type="text/javascript" src="assets/plugins/charts-flot/excanvas.min.js"></script>
        <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- The following CSS are included as plugins and can be removed if unused-->

    <style>
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
<link href="assets/plugins/fullcalendar/fullcalendar.css" type="text/css" rel="stylesheet"> 						<!-- FullCalendar -->

    </head>

    <body class="infobar-offcanvas">
        
        <header id="topnav" class="navbar navbar-inverse navbar-fixed-top clearfix" role="banner">
        	<a href="{{ route('index') }}"><img src="images/logo-dark.png" alt="ESE Law Logo" class="logo"></a>
        	<ul class="nav navbar-nav toolbar pull-right topnav" id="myTopnav">
                <li class="icon"><a href="javascript:void(0);" onclick="myFunction()">&#9776;</a></li>
                <li><a href="how-it-works.html">How It Works</a></li>
                <li><a href="resources.html">Resources</a></li>
                <li><a href="pricing.html">Pricing</a></li>
                <li><a href="{{ route('register') }}">Sign-Up</a></li>
                <li><a href="{{ route('auth.login') }}">Login </a></li>
            </ul>
		</header>

        <div id="wrapper">
            <div id="layout-static">
                <div class="static-sidebar-wrapper sidebar-default">
                    <div class="static-sidebar">
                        <div class="sidebar">
							<div class="widget stay-on-collapse" id="widget-sidebar">
								{{--<nav role="navigation" class="widget-body">--}}
									{{--<ul class="acc-menu">--}}
										{{--<li><a href="dashboard.html"><i class="fa fa-home"></i><span>Dashboard</span></a></li>--}}
                                        {{--<li><a href="javascript:;"><i class="fa fa-pencil"></i><span>Forms</span></a>--}}
											{{--<ul class="acc-menu">--}}
												{{--<li><a href="press.html">Press</a></li>--}}
												{{--<li><a href="#">Leading role</a></li>--}}
												{{--<li><a href="#">Major significance</a></li>--}}
												{{--<li><a href="#">Critical role</a></li>--}}
												{{--<li><a href="#">High compensation</a></li>--}}
												{{--<li><a href="#">Major commercial success</a></li>--}}
											{{--</ul>--}}
										{{--</li>--}}
									{{--</ul>--}}
								{{--</nav>--}}
							</div>
						</div>
                    </div>
                </div>
                <div class="static-content-wrapper">
                    <div class="static-content">
                        <div class="page-content">
                            <div class="container-fluid">
                            	<div class="row">
	                        		<div class="col-md-12">
                                        <div style="width: 400px; display: block; margin: 100px auto 0 auto;">
    	                        			<div class="form-group" style="text-align: center;">
                                                <div class="col-md-12">

                                                    @if (count($errors) > 0)
                                                        <div class="alert alert-danger">
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif

                                                    @if (session()->has('success'))
                                                        <div class="alert alert-success">
                                                            {{ session('success') }}
                                                        </div>
                                                    @endif
                                                    {!! Form::open(['route' => 'auth.login','class'=>'nobottommargin']) !!}


                                                    {!! Form::text('email',null,['class'=>'form-control dashboardloginform','placeholder'=>'Email']) !!}
                                                    <br><br>


                                                    {!! Form::password('password',['class'=>'form-control dashboardloginform','placeholder'=>'Password']) !!}<br><br>
                                                    <button class="button " id="sign-in" name="sign-in" value="sign-up">Sign-in</button>

                                                    {!! Form::close() !!}
                                                    <a data-toggle="modal" data-target="#myModal" href="javascript:void(0)">forgot your password?</a>


                                                </div>
                                            </div>
    	                        		</div>
                                    </div>
	                        	</div>
                            </div> <!-- .container-fluid -->
                        </div> <!-- #page-content -->
                    </div>
                </div>
            </div>
        </div>

        <footer role="contentinfo">
            <div class="container clearfix">
                <div class="col-md-6 copyrightinfo">
                    Copyrights © 2016 ESE Law<br>
                    <div id="copyright-links">
                        <a href="terms-of-use.html">Terms of Use</a> / <a href="privacy-policy.html">Privacy Policy</a> / <a href="about-us.html">About Us</a>
                    </div>
                </div>
                <div class="col-md-6 contactinfo">
                    <div class="pull-right">
                        <a href="mailto:info@eselaw.com">info@eselaw.com</a> · +1 (917) 250-0517
                    </div>
                </div>
            </div>
        </footer>

<!-- Load site level scripts -->

        @include('frontend.partials.reset-password-modal')

<script src="assets/js/jquery-1.10.2.min.js"></script> 							<!-- Load jQuery -->
<script src="assets/js/jqueryui-1.9.2.min.js"></script> 							<!-- Load jQueryUI -->
<script src="assets/js/bootstrap.min.js"></script> 								<!-- Load Bootstrap -->

<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script> 	<!-- Slimscroll for custom scrolls -->
<script src="assets/plugins/sparklines/jquery.sparklines.min.js"></script>  		<!-- Sparkline -->
<script src="assets/plugins/jstree/dist/jstree.min.js"></script>  				<!-- jsTree -->

<script src="assets/plugins/codeprettifier/prettify.js"></script> 				<!-- Code Prettifier  -->
<script src="assets/plugins/bootstrap-switch/bootstrap-switch.js"></script> 		<!-- Swith/Toggle Button -->

<script src="assets/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js"></script>  <!-- Bootstrap Tabdrop -->

<script src="assets/plugins/iCheck/icheck.min.js"></script>     					<!-- iCheck -->

<script src="assets/js/enquire.min.js"></script> 										<!-- Enquire for Responsiveness -->

<script src="assets/plugins/bootbox/bootbox.js"></script>					<!-- BOOTBOX -->

<script src="assets/js/application.js"></script>
<script src="assets/demo/demo.js"></script>
<script src="assets/demo/demo-switcher.js"></script>

<script src="assets/plugins/simpleWeather/jquery.simpleWeather.min.js"></script> 
<script src="assets/js/responsivenav.js"></script>

<!-- End loading site level scripts -->
    
<!-- Load page level scripts-->

<!-- End loading page level scripts-->

    </body>
</html>