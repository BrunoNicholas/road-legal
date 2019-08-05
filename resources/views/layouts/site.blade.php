<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  	<meta charset="utf-8" />
  	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png') }}">
  	<link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png') }}">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  	<title> @yield('title') | {{ config('app.name') }} </title>
  	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  	<link rel="canonical" href="{{ url('/') }}">
  	<meta itemprop="name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Uganda National Farmers Federation members data collection">
  	<!--     Fonts and icons     -->
  	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  	<!-- CSS Files -->
  	<link href="{{ asset('assets/css/material-dashboard.css?v=2.1.1') }}" rel="stylesheet" />
  	<!-- CSS Just for demo purpose, don't include it in your project -->
  	@yield('styles')
  	<!-- Google Tag Manager -->
    <script>
      (function(w,d,s,l,i){
          w[l]=w[l]||[];w[l].push({
            'gtm.start': new Date().getTime(),event:'gtm.js'
          });
          var f=d.getElementsByTagName(s)[0], j=d.createElement(s), dl=l!='dataLayer'?'&l='+l:'';
          j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        }
      )
      (window,document,'script','dataLayer','GTM-NKDMSK6');
    </script>
      <!-- End Google Tag Manager -->
    <script>
    		// Facebook Pixel Code Don't Delete
    		  ! function(f, b, e, v, n, t, s) {
        			if (f.fbq) return;
        			n = f.fbq = function() {
        				  n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        			};
        			if (!f._fbq) f._fbq = n;
        			n.push = n;
        			n.loaded = !0;
        			n.version = '2.0';
        			n.queue = [];
        			t = b.createElement(e);
        			t.async = !0;
        			t.src = v;
        			s = b.getElementsByTagName(e)[0];
        			s.parentNode.insertBefore(t, s)
    		}(window,document, 'script', '//connect.facebook.net/en_US/fbevents.js');
    		try {
      			fbq('init', '111649226022273');
      			fbq('track', "PageView");
    		} catch (err) {
    			 console.log('Facebook Track Error:', err);
    		}
  	</script>
</head>
<body class="">
	  <style> #ofBar { display:none; } </style>
  	<!-- Google Tag Manager (noscript) -->
  	<noscript>
  		  <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe>
  	</noscript>
    <!-- End Google Tag Manager (noscript) -->
  	<noscript>
    	  <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&ev=PageView&noscript=1" />
  	</noscript>

  	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>
        <div class="wrapper ">
    	      @include('layouts.includes.side')
			      <div class="main-panel"> 
        	      <!-- Navbar -->
    			      @include('layouts.includes.header')
      		      <!-- End Navbar -->
              	<div class="content">
          			    <div class="container-fluid">
          			      	@yield('content')
          			    </div>
          			</div>
        		    @include('layouts.includes.footer')
			      </div>
	      </div>
        @include('layouts.includes.right')
    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap-material-design.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.bootstrap-wizard.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap-selectpicker.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap-tagsinput.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jasny-bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery-jvectormap.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/nouislider.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <script src="{{ asset('assets/js/plugins/arrive.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/chartist.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
    <script src="{{ asset('assets/js/material-dashboard.js?v=2.1.0') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/demo/demo.js') }}"></script>
    <script src="{{ asset('assets/js/application.js') }}"></script>
    <script src="{{ asset('assets/demo/jquery.sharrre.js') }}"></script>
    @yield('scripts')
    <script>
      	$(document).ready(function () {
        		//
          });
        $('#myTable').DataTable( {
            buttons: [
                {
                    extend: 'print',
                    text: 'Print current page',
                    exportOptions: {
                        modifier: {
                            page: 'current'
                        }
                    }
                }
            ]
        } );
    </script>
    <script>
	    $(document).ready(function() {
	      	// Javascript method's body can be found in assets/js/demos.js
	      	md.initDashboardPageCharts();
	      	md.initVectorMap();
	    });
	  </script>
</body>

</html>
