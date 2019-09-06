<div class="sidebar" data-color="green" data-background-color="black" data-image="{{ asset('assets/img/sidebar-1.jpg') }}">
	<!--
		Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger | rose"
		Tip 2: you can also add an image using data-image tag
	-->
	<div class="logo">
		<a href="{{ route('home') }}" class="simple-text logo-mini"> <b>NC</b> </a>
		<a href="{{ route('home') }}" class="simple-text logo-normal"> {{ config('app.name') }} </a>
	</div>
	<div class="sidebar-wrapper">
		<div class="user">
			<div class="photo">
				<img src="{{ asset('files/profile/images/' . Auth::user()->profile_image ) }}" alt="pfl-img" />
			</div>
			<div class="user-info">
				<a data-toggle="collapse" href="#collapseExample" class="username">
					<span> {{ Auth::user()->name }} <b class="caret"></b> </span>
				</a>
				<div class="collapse" id="collapseExample">
					<ul class="nav">
						<li class="nav-item">
							<a class="nav-link" href="{{ route('profile') }}">
								<span class="sidebar-mini"> MP </span>
								<span class="sidebar-normal"> My Profile </span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
								<span class="sidebar-mini"> LO </span>
								<span class="sidebar-normal"> Logout </span>
							</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<ul class="nav">
			<li class="nav-item">
				<a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded=&quot;true&quot;>
					<i><img style="width:25px" src="{{ asset('assets/img/favicon.png') }}"></i>
					<p> START <b class="caret"></b></p>
				</a>
				<div class="collapse  @if(route('home') == Request::fullUrl() || route('admin') == Request::fullUrl() || route('user.home') == Request::fullUrl()) show @endif" id="laravelExample">
					<ul class="nav">
						<li class="nav-item @if(route('home') == Request::fullUrl() || route('admin') == Request::fullUrl()) active @endif">
							<a class="nav-link" href="{{ route('home') }}">
								<span class="sidebar-mini"> H </span>
								<span class="sidebar-normal"> Home </span>
							</a>
						</li>
						@role(['super-admin','admin'])
							<li class="nav-item @if(route('user.home') == Request::fullUrl()) active @endif">
								<a class="nav-link" href="{{ route('user.home') }}">
									<span class="sidebar-mini"> UH </span>
									<span class="sidebar-normal"> User Home </span>
								</a>
							</li>
						@endrole
					</ul>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="collapse" href="#pagesExamples" aria-expanded=&quot;true&quot;>
					<i class="material-icons">image</i> <p> System <b class="caret"></b> </p>
				</a>
				<div class="collapse @if(route('companies.index') == Request::fullUrl() || route('owners.index') == Request::fullUrl() || route('vehicles.index') == Request::fullUrl() || route('posts.index') == Request::fullUrl() || route('questions.index') == Request::fullUrl() || route('accounts.index') == Request::fullUrl() || route('officers.index') == Request::fullUrl() || route('profile') == Request::fullUrl()) show @endif" id="pagesExamples">
					<ul class="nav">
						<li class="nav-item @if(route('companies.index') == Request::fullUrl()) active @endif">
							<a class="nav-link" href="{{ route('companies.index') }}">
								<span class="sidebar-mini"> IC </span>
								<span class="sidebar-normal"> Insurance Companies </span>
							</a>
						</li>
						<li class="nav-item @if(route('owners.index') == Request::fullUrl()) active @endif">
							<a class="nav-link" href="{{ route('owners.index') }}">
								<span class="sidebar-mini"> RD </span>
								<span class="sidebar-normal"> Registered Drivers </span>
							</a>
						</li>
						<li class="nav-item @if(route('vehicles.index') == Request::fullUrl()) active @endif">
							<a class="nav-link" href="{{ route('vehicles.index') }}">
								<span class="sidebar-mini"> M </span>
								<span class="sidebar-normal"> MTP </span>
							</a>
						</li>
						<li class="nav-item @if(route('accounts.index') == Request::fullUrl()) active @endif">
							<a class="nav-link" href="{{ route('accounts.index') }}">
								<span class="sidebar-mini"> UA </span>
								<span class="sidebar-normal"> User Accounts </span>
							</a>
						</li>
						<li class="nav-item @if(route('officers.index') == Request::fullUrl()) active @endif">
							<a class="nav-link" href="{{ route('officers.index') }}">
								<span class="sidebar-mini"> PO </span>
								<span class="sidebar-normal"> Police Officers </span>
							</a>
						</li>
						<li class="nav-item @if(route('posts.index') == Request::fullUrl()) active @endif">
							<a class="nav-link" href="{{ route('posts.index') }}">
								<span class="sidebar-mini"> IP </span> <span class="sidebar-normal"> Informative Posts </span>
							</a>
						</li>
						<li class="nav-item @if(route('questions.index') == Request::fullUrl()) active @endif">
							<a class="nav-link" href="{{ route('questions.index') }}">
								<span class="sidebar-mini"> AQ </span>
								<span class="sidebar-normal"> Asked Questions </span>
							</a>
						</li>
						<li class="nav-item @if(route('profile') == Request::fullUrl()) active @endif">
							<a class="nav-link" href="{{ route('profile') }}">
								<span class="sidebar-mini"> MP </span>
								<span class="sidebar-normal"> My Profiles </span>
							</a>
						</li>
					</ul>
				</div>
			</li>
			<!-- I know all things! -->
			<li class="nav-item @if(route('profile') == Request::fullUrl()) active @endif">
				<a class="nav-link" href="{{ route('profile') }}">
					<i class="material-icons">timeline</i> <p> My Profile </p>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
					<i class="material-icons">lock</i> <p> Logout </p>
				</a>
			</li>
		</ul>
	</div>
</div>