@extends('layouts.site')
@section('title') User Details @endsection

@section('styles') @endsection
@section('page_name') User Details @endsection
@section('content')
	@include('layouts.includes.notifications')

	<div class="row">
	    <div class="col-md-8">
	        <div class="card">
		        <div class="card-header card-header-icon card-header-info">
		            <div class="card-icon"> <i class="material-icons">perm_identity</i> </div>
		            <h4 class="card-title"> User Details </h4>
		        </div>
	          	<div class="card-body">
	            	<form method="post" enctype="multipart/form-data" action="#" autocomplete="off" class="form-horizontal">

			            <div class="row">
			                <label class="col-sm-2 col-form-label">Name</label>
			                <div class="col-sm-7">
			                  	<div class="form-group">
				                    <input class="form-control" name="name" id="input-name" type="text" placeholder="Name" value="{{ $user->name }}" required="true" aria-required="true" disabled />
				                </div>
			                </div>
			            </div>

			            <div class="row">
			                <label class="col-sm-2 col-form-label">Email</label>
			                <div class="col-sm-7">
			                  	<div class="form-group">
				                    <input class="form-control" name="email" id="input-email" type="email" placeholder="Email" value="{{ $user->email }}" required disabled />
				                </div>
			                </div>
			            </div>

			            <div class="row">
			                <label class="col-sm-2 col-form-label"> Gender </label>
			                <div class="col-sm-7">
			                  	<div class="form-control">
				                    <span>{{ $user->gender }}</span>
				                </div>
			                </div>
			            </div>

			            <div class="row">
			                <label class="col-sm-2 col-form-label"> Telephone </label>
			                <div class="col-sm-7">
			                  	<div class="form-group">
				                    <input class="form-control" name="telephone" id="input-telephone" type="text" placeholder="0000-000000" value="{{ $user->telephone }}" aria-required="true" disabled="" />
				                </div>
			                </div>
			            </div>

			            <div class="row">
			                <label class="col-sm-2 col-form-label"> Location </label>
			                <div class="col-sm-7">
			                  	<div class="form-group">
				                    <input class="form-control" name="location" id="input-location" type="text" placeholder="Your location" value="{{ $user->location }}" aria-required="true" disabled />
				                </div>
			                </div>
			            </div>
			            <input type="hidden" name="role" value="{{ $user->role }}">
			            <div class="row">
			                <label class="col-sm-2 col-form-label"> Status </label>
			                <div class="col-sm-7">
			                  	<div class="form-control">
				                    <span>{{ $user->status }}</span>
				                </div>
			                </div>
			            </div>
	              		<!-- <button type="submit" class="btn btn-info pull-right">Update Profile</button> -->
	              		<div class="clearfix"></div>
	            	</form>
	          	</div>
	        </div>
	    </div>
      	<div class="col-md-4">
	        <div class="card card-profile">
		        <div class="card-avatar">
		            <a href="#pablo">
		              	<img class="img" src="{{ asset('files/profile/images/'.$user->profile_image) }}" />
		            </a>
		        </div>
		        <div class="card-body">
		            <h6 class="card-category text-gray">{{ App\Models\Role::where('name', $user->role)->get()->first()->display_name }}</h6>
		            <h4 class="card-title"> {{ $user->name }} </h4>
		            <p class="card-description"> {{ App\Models\Role::where('name', $user->role)->get()->first()->description }} </p>
		            <p>Created on {{ $user->created_at }}</p>
		            <p>Last updated on {{ $user->updated_at }}</p>
		            <div class="row">
		            	<div class="col-md">
		            		<a href="{{ route('users.index') }}" class="btn btn-info btn-round btn-block"> Back </a>
		            	</div>
		            	<div class="col-md">
		            		<form action="{{ route('users.destroy',$user->id) }}" method="post"> 
		                        @csrf 
		                        {{ method_field('DELETE') }}
		                        <button type="button" class="btn btn-rose btn-round btn-block" title="Delete {{ $user->name }}'s profile" onclick="confirm('Are you sure you want to delete this user?') ? this.parentElement.submit() : ''">
		                            DELETE <div class="ripple-container"></div>
		                        </button>
		                    </form>
		            	</div>
		            </div>

		        </div>
	        </div>
      	</div>
    </div>

@endsection
@section('scripts') @endsection