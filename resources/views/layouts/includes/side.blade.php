<div class="sidebar" data-color="green" data-background-color="black" data-image="{{ asset('assets/img/sidebar-1.jpg') }}">
	<!--
		Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger | rose"
		Tip 2: you can also add an image using data-image tag
	-->
	<div class="logo">
		<a href="{{ route('home') }}" class="simple-text logo-mini"> <b>LU</b> </a>
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
				<a class="nav-link" data-toggle="collapse" href="#laravelExample"  aria-expanded=&quot;true&quot;>
					<i><img style="width:25px" src="{{ asset('assets/img/favicon.png') }}"></i>
					<p> System Dashboards <b class="caret"></b></p>
				</a>
				<div class="collapse  show" id="laravelExample">
					<ul class="nav">
						<li class="nav-item @if(route('home') == Request::fullUrl()) active @endif">
							<a class="nav-link" href="{{ route('home') }}">
								<span class="sidebar-mini"> H </span>
								<span class="sidebar-normal"> Home </span>
							</a>
						</li>
						@role(['super-admin','admin'])
							<li class="nav-item @if(route('admin') == Request::fullUrl()) active @endif">
								<a class="nav-link" href="{{ route('admin') }}">
									<span class="sidebar-mini"> A </span>
									<span class="sidebar-normal"> Administrator </span>
								</a>
							</li>
						@endrole
					</ul>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="collapse" href="#pagesExamples" >
					<i class="material-icons">image</i> <p> System <b class="caret"></b> </p>
				</a>
				<div class="collapse" id="pagesExamples">
					<ul class="nav">
						<li class="nav-item @if(route('posts.index') == Request::fullUrl()) active @endif">
							<a class="nav-link" href="{{ route('posts.index') }}">
								<span class="sidebar-mini"> IP </span> <span class="sidebar-normal"> Informative Posts </span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('questions.index') }}">
								<span class="sidebar-mini"> AQ </span>
								<span class="sidebar-normal"> Asked Questions </span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('organisations.index') }}">
								<span class="sidebar-mini"> LO </span>
								<span class="sidebar-normal"> Land Organisations </span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('titles.index') }}">
								<span class="sidebar-mini"> LT </span>
								<span class="sidebar-normal"> Land Titles </span>
							</a>
						</li>
						<li class="nav-item ">
							<a class="nav-link" href="javascript:void(0)">
								<span class="sidebar-mini"> MP </span>
								<span class="sidebar-normal"> My Participations </span>
							</a>
						</li>
					</ul>
				</div>
			</li>
			<!-- I know all things! -->
			<li class="nav-item ">
				<a class="nav-link" data-toggle="collapse" href="#mapsExamples" >
				<i class="material-icons">place</i>
				<p> Maps
				<b class="caret"></b>
				</p>
				</a>
				<div class="collapse " id="mapsExamples">
					<ul class="nav">
						<li class="nav-item  @if(route('home') == Request::fullUrl()) active @endif">
							<a class="nav-link" href="{{ route('home') }}">
								<span class="sidebar-mini"> FM </span> <span class="sidebar-normal"> Full Map </span>
							</a>
						</li>
						<li class="nav-item ">
							<a class="nav-link" href="javascript:void(0)" onclick="return alert('Feature still under developement!\nSorry for the incinvenience')">
								<span class="sidebar-mini"> BD </span> <span class="sidebar-normal"> By District </span>
							</a>
						</li>
						<li class="nav-item ">
							<a class="nav-link" href="{{ route('departments.index') }}">
								<span class="sidebar-mini"> MD </span> <span class="sidebar-normal"> Management Departments </span>
							</a>
						</li>
					</ul>
				</div>
			</li>
			<li class="nav-item @if(route('user.home') == Request::fullUrl()) active @endif">
				<a class="nav-link" href="{{ route('user.home') }}">
					<i class="material-icons">timeline</i> <p> Data Settings </p>
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