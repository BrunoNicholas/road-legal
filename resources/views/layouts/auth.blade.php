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
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
	<link href="{{ asset('assets/css/material-dashboard.css?v=2.1.1') }}" rel="stylesheet" />
	@yield('styles')
	<!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NKDMSK6');</script>

    <!-- end of google tag manager -->
    <script>
      // Facebook Pixel Code Don't Delete
        ! function(f, b, e, v, n, t, s) {
          if (f.fbq) return;
          n = f.fbq = function() {
            n.callMethod ?
              n.callMethod.apply(n, arguments) : n.queue.push(arguments)
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
        }(window,
          document, 'script', '//connect.facebook.net/en_US/fbevents.js');
        try {
          fbq('init', '111649226022273');
          fbq('track', "PageView");
        } catch (err) {
          console.log('Facebook Track Error:', err);
        }
    </script>
</head>
<body class="off-canvas-sidebar">
    <style> #ofBar { display:none; } </style>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
    <noscript>
        <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&ev=PageView&noscript=1" />
    </noscript>

    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
  		<div class="container">
  		    <div class="navbar-wrapper">
  		      <a class="navbar-brand" href="{{ url('/') }}"> {{ config('app.name') }} </a>
  		    </div>
  		    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
  		      	<span class="sr-only">Toggle navigation</span>
  			    <span class="navbar-toggler-icon icon-bar"></span>
  			    <span class="navbar-toggler-icon icon-bar"></span>
  			    <span class="navbar-toggler-icon icon-bar"></span>
  		    </button>
  		    <div class="collapse navbar-collapse justify-content-end">
  		      	<ul class="navbar-nav">
  			        @guest
  					    {{-- @permission('can_register') --}}
  				        <li class="nav-item">
  					        <a href="{{ route('register') }}" class="nav-link">
  					            <i class="material-icons">person_add</i> Register
  					        </a>
  				        </li>
  				        {{-- @endpermission --}}
  				        <li class="nav-item active">
  					        <a href="{{ route('login') }}" class="nav-link">
  					            <i class="material-icons">fingerprint</i> Login
  					        </a>
  				        </li>
  				    @else
  				    	<li class="nav-item">
  					        <a href="{{ route('home') }}" class="nav-link">
  					            <i class="material-icons">dashboard</i> Home
  					        </a>
  				        </li>
  				    @endguest
  		        </ul>
  		    </div>
  		</div>
  	</nav>
	<div class="wrapper wrapper-full-page">
    	<div class="page-header login-page header-filter" filter-color="black" style="background-image: url('{{ asset('assets/img/law.jpg') }}'); background-size: cover; background-position: top center;align-items: center;">
  		<!-- you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
  		<div class="container">
    		<div class="row">
    			@yield('content')
    		</div>
    	</div>
    	@include('layouts.includes.footer')
  		</div>
	</div>
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
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('app.mapkey') }}"></script>
    <script src="{{ asset('assets/js/plugins/chartist.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
    <script src="{{ asset('assets/js/material-dashboard.js?v=2.1.0') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/demo/demo.js') }}"></script>
    <script src="{{ asset('assets/js/application.js') }}"></script>
    <script src="{{ asset('assets/demo/jquery.sharrre.js') }}"></script>
        <script>
          $(document).ready(function () {
            
            $('#facebook').sharrre({
              share: {
                facebook: true
              },
              enableHover: false,
              enableTracking: false,
              enableCounter: false,
              click: function(api, options) {
                api.simulateClick();
                api.openPopup('facebook');
              },
              template: '<i class="fab fa-facebook-f"></i> Facebook',
              url: '{{ route('login') }}'
            });

            $('#google').sharrre({
              share: {
                googlePlus: true
              },
              enableCounter: false,
              enableHover: false,
              enableTracking: true,
              click: function(api, options) {
                api.simulateClick();
                api.openPopup('googlePlus');
              },
              template: '<i class="fab fa-google-plus"></i> Google',
              url: '{{ route('login') }}'
            });

            $('#twitter').sharrre({
              share: {
                twitter: true
              },
              enableHover: false,
              enableTracking: false,
              enableCounter: false,
              buttons: {
                twitter: {
                  via: 'CreativeTim'
                }
              },
              click: function(api, options) {
                api.simulateClick();
                api.openPopup('twitter');
              },
              template: '<i class="fab fa-twitter"></i> Twitter',
              url: '{{ route('login') }}'
            });

          });
        </script>
        <script>
  $(document).ready(function() {
    md.checkFullPageBackgroundImage();
    setTimeout(function() {
      // after 1000 ms we add the class animated to the login/register card
      $('.card').removeClass('card-hidden');
    }, 700);
  });
</script>
        
</body>

</html>



