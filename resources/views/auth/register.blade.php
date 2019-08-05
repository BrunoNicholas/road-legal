@extends('layouts.auth')

@section('title') Register @endsection
@section('content')
<div class="col-md-10 ml-auto mr-auto">
    <div class="card card-signup">
        <h2 class="card-title text-center">Register to {{ config('app.name') }}</h2>
    	<div class="card-body">
      		<div class="row">
        		<div class="col-md-5 ml-auto">
          			<div class="info info-horizontal">
            			<div class="icon icon-rose"> <i class="material-icons">timeline</i> </div>
            			<div class="description">
              				<h4 class="info-title">Data Analysis</h4>
              				<p class="description">
                  				Review the data analized by high end Artificial Intelligence Algorithms.
                  			</p>
            			</div>
          			</div>
          			{{--
          			<div class="info info-horizontal">
            			<div class="icon icon-primary"> <i class="material-icons">code</i> </div>
            			<div class="description">
              				<h4 class="info-title">Fully Coded in HTML5</h4>
              					<p class="description">
				                    We&#039;ve developed the website with HTML5 and CSS3. The client has access to the code using GitHub.
				                </p>
            			</div>
          			</div>
          			<div class="info info-horizontal">
            			<div class="icon icon-info"> <i class="material-icons">group</i> </div>
            			<div class="description">
              				<h4 class="info-title">Built Audience</h4>
              				<p class="description"> There is also a Fully Customizable CMS Admin Dashboard for this product. </p>
            			</div>
          			</div> --}}
        		</div>
        		<div class="col-md-5 mr-auto">
        			<div class="social text-center" style="display: none;">
            			<button class="btn btn-just-icon btn-round btn-twitter">
              				<i class="fa fa-twitter"></i>
              			</button>
            			<button class="btn btn-just-icon btn-round btn-dribbble">
              				<i class="fa fa-dribbble"></i>
            			</button>
            			<button class="btn btn-just-icon btn-round btn-facebook">
              				<i class="fa fa-facebook"> </i>
            			</button>
            			<h4 class="mt-3"> or be classical </h4>
          			</div>
          
          			<form class="form" action="{{ route('register') }}" method="POST">
            			@csrf
                  @foreach ($errors->all() as $error)
                      <p class="alert alert-danger">{{ $error }}</p>
                  @endforeach

                  @if (session('success'))
                      <div class="alert alert-success">
                          {{ session('success') }}
                      </div>
                  @endif
            			<div class="has-default mb-3">
              				<div class="input-group">
                				<div class="input-group-prepend">
                  					<span class="input-group-text"> <i class="material-icons">face</i> </span>
                				</div>
                				<input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Full Names') }}" required autofocus>
                				@if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
            			</div>
            			<div class="has-default mb-3">
              				<div class="input-group">
                				<div class="input-group-prepend">
                  					<span class="input-group-text">
                    					<i class="material-icons">mail</i>
                  					</span>
                				</div>
                				<input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="{{ __('E-Mail Address') }}" required>
                            </div>
            			</div>
            			<div class="has-default mb-3">
              				<div class="input-group">
                				<div class="input-group-prepend">
                  					<span class="input-group-text"> <i class="material-icons">lock_outline</i></span>
                				</div>
                				<input type="password" name="password" placeholder="{{ __('Password') }}" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required>
                				@if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
            			</div>
            			<div class="has-default mb-3">
              				<div class="input-group"> 
              					<div class="input-group-prepend"> 
              						<span class="input-group-text"> <i class="material-icons">lock_outline</i></span>
                				</div>
                				<input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Confirm Password') }}" required>
              				</div>
            			</div>
            			<div class="form-check">
              				<label class="form-check-label">
                				<input class="form-check-input" type="checkbox" name="policy" value="1" checked >
                				<span class="form-check-sign"> <span class="check"></span> </span>
                				I agree with the  <a href="#">terms and conditions</a>
              				</label>
            			</div>
            			<div class="text-center">
              				<button type="submit" class="btn btn-primary btn-round mt-4">{{ __('Get Started') }}</button>
            			</div>
          			</form>
        		</div>
      		</div>
    	</div>
  	</div>
</div>
@endsection