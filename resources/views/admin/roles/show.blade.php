@extends('layouts.site')
@section('title') Role Details @endsection

@section('styles') @endsection
@section('page_name') Role Details @endsection
@section('content')
	@include('layouts.includes.notifications')
	<div class="row">
	    <div class="col-md-8">
	        <div class="card">
		        <div class="card-header card-header-icon card-header-info">
		            <div class="card-icon"> <i class="material-icons">perm_identity</i> </div>
		            <h4 class="card-title"> User Role Details </h4>
		        </div>
	          	<div class="card-body">
	            	<form method="post" enctype="multipart/form-data" action="#" autocomplete="off" class="form-horizontal">

			            <div class="row">
			                <label class="col-sm-2 col-form-label">Name</label>
			                <div class="col-sm-7">
			                  	<div class="form-group">
				                    <input class="form-control" name="" id="input-name" type="text" placeholder="Name" value="{{ $role->name }}" required="true" aria-required="true" disabled />
				                </div>
			                </div>
			            </div>

			            <div class="row">
			                <label class="col-sm-2 col-form-label">Display Name</label>
			                <div class="col-sm-7">
			                  	<div class="form-group">
				                    <input class="form-control" name="" id="input-email" type="" placeholder="Display name" value="{{ $role->display_name }}" disabled/>
				                </div>
			                </div>
			            </div>

			            <div class="row">
			                <label class="col-sm-2 col-form-label"> Descriptions </label>
			                <div class="col-sm-7">
			                  	<div class="form-control">
				                    <span>{{ $role->description }}</span>
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
		              	<img class="img" src="{{ asset('assets/img/favicon.png') }}" alt="User" />
		            </a>
		        </div>
		        <div class="card-body">
		            <h6 class="card-category text-gray">{{ $role->display_name }}</h6>
		            <h4 class="card-title"> {{ $role->name }} </h4>
		            <p class="card-description"> {{ $role->description }} </p>
		            <p>Created at {{ $role->created_at }}</p>
		            <p>Last updated at {{ $role->updated_at }}</p>
		            <div class="row">
		            	<div class="col-md">
		            		<a href="{{ route('roles.index') }}" class="btn btn-info btn-round btn-block"> Back </a>
		            	</div>
		            	<div class="col-md">
		            		<form action="{{ route('roles.destroy',$role->id) }}" method="post"> 
		                        @csrf 
		                        {{ method_field('DELETE') }}
		                        <button type="button" class="btn btn-rose btn-round btn-block" title="Delete {{ $role->name }}'s profile" onclick="confirm('Are you sure you want to delete this role?') ? this.parentElement.submit() : ''">
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