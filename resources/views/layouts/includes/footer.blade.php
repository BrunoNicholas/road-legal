<footer class="footer">
	<div class="container-fluid">
		<nav class="float-left">
				<ul>
				<li> <a href="{{ url('/') }}"> {{ config('app.name') }} </a> </li>
			</ul>
		</nav>
		<div class="copyright float-right not-info"> 
			&copy; <script> document.write(new Date().getFullYear()) </script>, Developed with  
			<i class="material-icons">favorite</i> by <a href="mailto:sbnibro256@gmail.com" target="_blank"> Bruno Nicholas </a> With the {{ config('app.name') }} Team.
		</div>
	</div>
</footer>