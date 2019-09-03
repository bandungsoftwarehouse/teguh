<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="Infotech Solusindo">
    <meta name="keyword" content="Infotech Solusindo, Indonesia, Application for Custom">

    <title>{{ config('app.name', '__demo__') }}</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="lineicons/style.css">    
    <style type="text/css">
        /*LEFT NAVIGATION ICON*/
        .dcjq-icon {
            height:17px;
            width:17px;
            display:inline-block;
            /* background: url("img/nav-expand.png") no-repeat top; */
            background: url("{{ localasset('img/nav-expand.png') }}") no-repeat top;
            border-radius:3px;
            -moz-border-radius:3px;
            -webkit-border-radius:3px;
            position:absolute;
            right:10px;
            top:15px;
        }
        .active .dcjq-icon {
            background: url("{{ localasset('img/nav-expand.png') }}") no-repeat bottom;
            /* background: url("img/nav-expand.png") no-repeat bottom; */
            border-radius:3px;
            -moz-border-radius:3px;
            -webkit-border-radius:3px;
        }
        /*---*/
    </style> 
    <!-- Custom styles for this template -->
    <link href="{{ localasset('css/style.css') }}" rel="stylesheet">
    <link href="{{ localasset('css/style-responsive.css') }}" rel="stylesheet">

    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
@guest
    @yield('content')
@else    
  @csrf
  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="{{ route('home') }}" class="logo"><b>{{ config('app.name', 'Laravel') }}</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    @guest
                    <li><a class="logout" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    @else
		    <li>
                        <a class="logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                         {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
    		        </form>
                    </li>
                    @endguest
            	</ul>
            </div>
        </header>
      <!--header end-->
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <div class="profile">
              	  <p class="centered"><a href="/profile"><img src="{{ asset('users/'.auth()->user()->foto) }}" class="img-circle" width="60"></a></p> 
              	  <h5 class="centered">{{ auth()->user()->name }}</h5>
              </div>
              @include('layouts.sidebar-menu')
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              @yield('content')
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
	      {{ $date }} - <a href="{{ route('home') }}">{{ config('app.name', 'Laravel') }}</a>
              <a href="{{ route('home') }}#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <!-- Scripts -->
    {{-- <script src="{{ localasset('js/app.js') }}" defer></script> --}}
    <script src="{{ localasset('js/chart-master/Chart.js') }}"></script>

    <script src="{{ localasset('js/common-scripts.js') }}"></script>
    
    <script type="text/javascript" src="js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="js/gritter-conf.js"></script>

    <!--script for this page-->
    @yield('scripts')
@endguest  

  </body>
</html>
