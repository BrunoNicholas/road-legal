<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
      	<div class="navbar-wrapper">
        	<div class="navbar-minimize">
          		<button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
            		<i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
            		<i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
          		</button>
        	</div>
        	<a class="navbar-brand" href="#pablo"> @yield('page_name') </a>
      	</div>
      	<button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        	<span class="sr-only">Toggle navigation</span>
        	<span class="navbar-toggler-icon icon-bar"></span>
        	<span class="navbar-toggler-icon icon-bar"></span>
        	<span class="navbar-toggler-icon icon-bar"></span>
      	</button>
      	<div class="collapse navbar-collapse justify-content-end">
        	<form class="navbar-form" action="#" method="POST">
          		<div class="input-group no-border">
        			<input type="text" value="" name="" class="form-control" placeholder="Search app...">
            		<button type="submit" class="btn btn-white btn-round btn-just-icon">
              			<i class="material-icons">search</i> <div class="ripple-container"></div>
        			</button>
          		</div>
        	</form>
        	<ul class="navbar-nav">
        		<!-- 
          		<li class="nav-item">
            		<a class="nav-link" href="javascript:void(0)">
              			<i class="material-icons">dashboard</i> <p class="d-lg-none d-md-block"> Stats </p>
            		</a>
          		</li> -->
          		<li class="nav-item dropdown">
            		<a class="nav-link" href="javascript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              			<i class="material-icons">notifications</i> <span class="notification">2</span>
              			<p class="d-lg-none d-md-block"> Some Actions </p>
            		</a>
		            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
		              	<a class="dropdown-item" href="{{ route('profile') }}">Please update your profile!</a>
		              	<a class="dropdown-item" href="{{ url('/') }}">Welcome to {{ config('app.name') }}</a>
		            </div>
          		</li>
          		<li class="nav-item dropdown">
            		<a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            			<img src="{{ asset('files/profile/images/' . Auth::user()->profile_image ) }}" alt="pfl-img" width="30px" />
              			<!-- <i class="material-icons">person</i> <p class="d-lg-none d-md-block"> Account </p> -->
              			<span> {{ Auth::user()->name }} </span>
            		</a>
            		<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                		<a class="dropdown-item" href="{{ route('profile') }}"> <i class="material-icons">person</i><span>Profile</span></a>
                		<a class="dropdown-item" href="javascript:void(0)"> <i class="material-icons">settings</i> <span>Settings</span></a>
                		<div class="dropdown-divider"></div>
                		<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> <i class="material-icons">lock</i><span> Log out </span></a>
            		</div>
            	</li>
            </ul>
      	</div>
    </div>
</nav>