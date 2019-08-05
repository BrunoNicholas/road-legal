@extends('layouts.site')
@section('title') {{ Auth::user()->name }} Profile @endsection
@section('styles')  @endsection
@section('page_name') My Profile @endsection
@section('content')
    @include('layouts.includes.notifications')
    @foreach ($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
    @endforeach

    <div class="row">
	    <div class="col-md-8">
	        <div class="card">
		        <div class="card-header card-header-icon card-header-success">
		            <div class="card-icon"> <i class="material-icons">perm_identity</i> </div>
		            <h4 class="card-title"> Update Your Profile </h4>
		        </div>
	          	<div class="card-body">
	            	<form method="post" enctype="multipart/form-data" action="{{ route('profile.update') }}" autocomplete="off" class="form-horizontal">
	              		@csrf   
	              		{{-- method_field('PATCH') --}}
	              		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	              		@foreach ($errors->all() as $error) <p class="alert alert-danger">{{ $error }}</p> @endforeach
                        @if (session('success')) <div class="alert alert-success"> {{ session('success') }} </div> @endif

	              		<div class="row">
	                		<label class="col-sm-2 col-form-label">Profile Photo</label>
			                <div class="col-sm-7">
			                  	<div class="fileinput fileinput-new text-center" data-provides="fileinput">
			                    	<div class="fileinput-new thumbnail img-circle">
										<img src="https://material-dashboard-pro-laravel.creative-tim.com/material/img/placeholder.jpg" alt="user">
			                        </div>
			                    	<div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
				                    <div>
				                      	<span class="btn btn-success btn-file">
					                        <span class="fileinput-new"> Select Image </span>
					                        <span class="fileinput-exists"> Change </span>
					                        <input type="file" name="profile_image" accept=".jpg, .png, .jpeg" id = "input-picture" />
					                    </span>
				                        <a href="#pablo" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">
				                        	<i class="fa fa-times"></i> Remove
				                        </a>
				                        <button type="submit" class="btn btn-primary"> Update Image</button>
				                    </div>
				                </div>
			                </div>
	              		</div>
	              	</form>
	              	<form method="post" enctype="multipart/form-data" action="{{ route('users.update', Auth::user()->id) }}" autocomplete="off" class="form-horizontal">
	              		@csrf   
	              		{{ method_field('PATCH') }}
			            <div class="row">
			                <label class="col-sm-2 col-form-label">Name</label>
			                <div class="col-sm-7">
			                  	<div class="form-group">
				                    <input class="form-control" name="name" id="input-name" type="text" placeholder="Name" value="{{ Auth::user()->name }}" required="true" aria-required="true"/>
				                </div>
			                </div>
			            </div>

			            <div class="row">
			                <label class="col-sm-2 col-form-label">Email</label>
			                <div class="col-sm-7">
			                  	<div class="form-group">
				                    <input class="form-control" name="email" id="input-email" type="email" placeholder="Email" value="{{ Auth::user()->email }}" required />
				                </div>
			                </div>
			            </div>

			            <input type="hidden" name="router" value="profile">

			            <input type="hidden" name="role" value="{{ Auth::user()->role }}">

			            <div class="row">
			                <label class="col-sm-2 col-form-label"> Gender </label>
			                <div class="col-sm-7">
			                  	<div class="form-control">
				                    <input name="gender" id="input-gender-m" type="radio" value="Male" aria-required="true" @if (Auth::user()->gender == 'Male')
				                    	checked 
				                    @endif/> <label for="input-gender-m">Male</label>
				                    <input name="gender" id="input-gender-f" type="radio" value="Female" aria-required="true" @if (Auth::user()->gender == 'Female')
				                    	checked 
				                    @endif/> <label for="input-gender-f">Female</label>
				                </div>
			                </div>
			            </div>

			            <div class="row">
			                <label class="col-sm-2 col-form-label"> Telephone </label>
			                <div class="col-sm-7">
			                  	<div class="form-group">
				                    <input class="form-control" name="telephone" id="input-telephone" type="text" placeholder="0000-000000" value="{{ Auth::user()->telephone }}" aria-required="true"/>
				                </div>
			                </div>
			            </div>

			            <div class="row">
			                <label class="col-sm-2 col-form-label"> Location </label>
			                <div class="col-sm-7">
			                  	<div class="form-group">
				                    <input class="form-control" name="location" id="input-location" type="text" placeholder="Your location" value="{{ Auth::user()->location }}" aria-required="true"/>
				                </div>
			                </div>
			            </div>

			            <div class="row">
			                <label class="col-sm-2 col-form-label"> Status </label>
			                <div class="col-sm-7">
			                  	<div class="form-control">
				                    <input name="status" id="input-status-1" type="radio" value="Active" aria-required="true" @if (Auth::user()->status == 'Active')
				                    	checked="checked"
				                    @endif/> <label for="input-gender-m">Active</label>
				                    <input name="status" id="input-status-2" type="radio" value="Away" aria-required="true" @if (Auth::user()->status == 'Away')
				                    	checked="checked"
				                    @endif/> <label for="input-status-f" > Away </label>
				                    <input name="status" id="input-status-3" type="radio" value="Busy" aria-required="true" @if (Auth::user()->status == 'Busy')
				                    	checked="checked"
				                    @endif/> <label for="input-status-f" >Busy</label>
				                </div>
			                </div>
			            </div>
	              		<button type="submit" class="btn btn-success pull-right">Update Profile</button>
	              		<div class="clearfix"></div>
	            	</form>
	          	</div>
	        </div>

	        <div class="card">
		        <div class="card-header card-header-icon card-header-success">
		            <div class="card-icon"> <i class="material-icons">lock</i> </div>
		            <h4 class="card-title">Change password</h4>
		        </div>
		        <div class="card-body">
		            <form method="post" action="{{ route('password.update') }}" class="form-horizontal">
		              	@csrf
	                    {{-- method_field('PATCH') --}}
	                    @foreach ($errors->all() as $error)
	                        <p class="alert alert-danger">{{ $error }}</p>
	                    @endforeach

	                    @if (session('success'))
	                        <div class="alert alert-success">
	                            {{ session('success') }}
	                        </div>
	                    @endif

	                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">

			            <div class="row">
			                <label class="col-sm-2 col-form-label" for="input-current-password"> Current Password </label>
			                <div class="col-sm-7">
			                  	<div class="form-group">
			                    	<input class="form-control" input type="password" name="previous_password" id="input-current-password" placeholder="Current Password" value="" required />
			                    </div>
			                </div>
			            </div>

			            <div class="row">
			                <label class="col-sm-2 col-form-label" for="input-password">New Password</label>
			                <div class="col-sm-7">
			                  	<div class="form-group">
			                    	<input class="form-control" name="password" id="input-password" type="password" placeholder="New Password" required />
			                    </div>
			                </div>
			            </div>
			            <div class="row">
			                <label class="col-sm-2 col-form-label" for="input-password-confirmation">Confirm New Password</label>
			                <div class="col-sm-7">
				                <div class="form-group">
				                    <input class="form-control" name="confirm_password" id="input-password-confirmation" type="password" placeholder="Confirm New Password" required />
				                </div>
			                </div>
			            </div>
		              	<button type="submit" class="btn btn-success pull-right">Change password</button>
		              	<div class="clearfix"></div>
		            </form>
		        </div>
	        </div>
	    </div>
      	<div class="col-md-4">
	        <div class="card card-profile">
		        <div class="card-avatar">
		            <a href="#pablo">
		              	<img class="img" src="{{ asset('files/profile/images/'.Auth::user()->profile_image) }}" />
		            </a>
		        </div>
		        <div class="card-body">
		            <h6 class="card-category text-gray">{{ App\Models\Role::where('name', Auth::user()->role)->get()->first()->display_name }}</h6>
		            <h4 class="card-title"> {{ Auth::user()->name }} </h4>
		            <p class="card-description"> {{ App\Models\Role::where('name', Auth::user()->role)->get()->first()->description }} </p>
		            <p>Created on {{ Auth::user()->created_at }}</p>
		            <p>Last updated on {{ Auth::user()->updated_at }}</p>
		            <a href="{{ route('home') }}" class="btn btn-success btn-round"> Home </a>
		        </div>
	        </div>
      	</div>
    </div>

@endsection
@section('scripts') @endsection