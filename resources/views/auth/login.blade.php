@extends('layouts.auth')

@section('title') Login @endsection
@section('content')
    <div class="col-md-9 ml-auto mr-auto mb-1 text-center">
        <h3>Welcome back to {{ config('app.name') }}. </h3>
    </div>
    </div>
    <div class="row">
      	<div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
        	<form class="form" method="POST" action="{{ route('login') }}">
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
              			<h4 class="card-title">Login</h4>
          				<div class="social-line" style="display: none;">
            				<a href="#pablo" class="btn btn-just-icon btn-link btn-white">
              					<i class="fa fa-facebook-square"></i>
            				</a>
            				<a href="#pablo" class="btn btn-just-icon btn-link btn-white">
              					<i class="fa fa-twitter"></i>
            				</a>
            				<a href="#pablo" class="btn btn-just-icon btn-link btn-white">
              					<i class="fa fa-google-plus"></i>
            				</a>
          				</div>
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
              			<span class="form-group bmd-form-group">
                			<div class="input-group">
                  				<div class="input-group-prepend">
                    				<span class="input-group-text"> <i class="material-icons">lock_outline</i> </span>
                    			</div>
                  				<input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="examplePassword" name="password" placeholder="{{ __('Password') }}" required>
                  				@if ($errors->has('password'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                          @endif
                          </div>
              			</span>
		              	<div class="form-check mr-auto ml-3 mt-3">
			                <label class="form-check-label">
			                    <input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
			                    <span class="form-check-sign"> <span class="check"></span> </span>
			                </label>
		                </div>
            		</div>
		            <div class="card-footer justify-content-center">
		              <button type="submit" class="btn btn-rose btn-link btn-lg">Lets Go</button>
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