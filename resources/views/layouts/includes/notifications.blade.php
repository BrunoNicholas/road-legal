@if($message = Session::get('danger'))
	<p id="msger" style="display: none;">{{ $message }}</p>
	<div class="alert alert-danger" onmouseout="md.showNotification('top','center',document.getElementById('msger').innerHTML,'danger')"> 
		<img src="{{ asset('files/profile/images/' . Auth::user()->profile_image) }}" width="30" class="rounded-circle" alt="img"> 
		 Abbort <i class="fa fa-times-circle"></i> : {{ $message }}
	    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
	    	<span aria-hidden="true">&times;</span> 
	    </button>
	</div>
@endif
@if($message = Session::get('warning'))
	<p id="msger" style="display: none;">{{ $message }}</p>
	<div class="alert alert-warning" onmouseout="md.showNotification('top','center',document.getElementById('msger').innerHTML,'warning')"> 
		<img src="{{ asset('files/profile/images/' . Auth::user()->profile_image) }}" width="30" class="rounded-circle" alt="img"> 
		 Warning <i class="fa fa-info-circle"></i> : <b>{{ $message }}</b>
	    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    	<span aria-hidden="true">&times;</span> 
	    </button>
	</div>
@endif
@if($message = Session::get('success'))
	<p id="msger" style="display: none;">{{ $message }}</p>
	<div class="alert alert-success" onmouseout="md.showNotification('top','center',document.getElementById('msger').innerHTML,'success')"> 
		<img src="{{ asset('files/profile/images/' . Auth::user()->profile_image) }}" width="30" class="rounded-circle" alt="img"> 
		 Success <i class="fa fa-check"></i> : <b>{{ $message }}</b>
	    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
	    	<span aria-hidden="true">&times;</span> 
	    </button>
	</div>
@endif
@if($message = Session::get('info'))
	<p id="msger" style="display: none;">{{ $message }}</p>
	<div class="alert alert-info" onmouseout="md.showNotification('top','center',document.getElementById('msger').innerHTML,'info')"> 
		<img src="{{ asset('files/profile/images/' . Auth::user()->profile_image) }}" width="30" class="rounded-circle" alt="img"> 
		 Notice <i class="fa fa-lightbulb"></i> : <b>{{ $message }}</b>
	    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
	    	<span aria-hidden="true">&times;</span> 
	    </button>
	</div>
@endif
