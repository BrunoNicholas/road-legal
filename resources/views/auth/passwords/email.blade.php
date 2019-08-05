@extends('layouts.auth')

@section('title') Reset Account Password @endsection
@section('content')
    <div class="col-md-9 ml-auto mr-auto mb-1 text-center"> <h3>Enter your email and check your inbox | {{ config('app.name') }}. </h3> </div>
    </div>
    <div class="row">
      	<div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
        	<form class="form" method="POST" action="{{ route('password.email') }}">
          		@csrf
              @foreach ($errors->all() as $error)
                  <p class="alert alert-danger">{{ $error }}</p>
              @endforeach

              @if (session('success'))
                  <div class="alert alert-success">
                      {{ session('success') }}
                  </div>
              @endif
          		<div class="card card-login card-hidden">
            		<div class="card-header card-header-rose text-center">
              			<h4 class="card-title">Send Password Reset Request</h4>
            		</div>
            		<div class="card-body ">
              			<span class="form-group  bmd-form-group" >
                			<div class="input-group">
                  				<div class="input-group-prepend">
				                    <span class="input-group-text"> <i class="material-icons">email</i> </span>
				                </div>
                  				<input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="exampleEmails" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autofocus>
                  				@if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
              			</span>
            		</div>
		            <div class="card-footer justify-content-center">
		              <button type="submit" class="btn btn-rose btn-link btn-lg">Reset Password</button>
		            </div>
          		</div>
        	</form>
        	<div class="row">
          		<div class="col-6">
                  @if (Route::has('password.request'))
                      <a href="{{ route('password.request') }}" class="text-light">
                      	  <small>{{ __('Forgot password?') }}</small>
                  	  </a>
                  @endif
                </div>
          		<div class="col-6 text-right">
              		<a href="{{ route('register') }}" class="text-light">
                  		<small>Create new account</small>
              		</a>
          		</div>
        	</div>
      	</div>
    </div>
@endsection
