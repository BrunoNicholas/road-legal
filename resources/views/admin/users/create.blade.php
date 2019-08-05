@extends('layouts.site')
@section('title') Add User @endsection

@section('styles') @endsection
@section('page_name') Add User @endsection
@section('content')
	@include('layouts.includes.notifications')
	<div class="row">
        <div class="col-md-12">
		    <form method="post" enctype="multipart/form-data" action="{{ route('users.store') }}" autocomplete="off" class="form-horizontal">
		        @csrf
		        <input type="hidden" name="_method" value="post">
	            <div class="card ">
		            <div class="card-header card-header-rose card-header-icon">
		                <div class="card-icon"> <i class="material-icons">person</i> </div>
		                <h4 class="card-title">Add User</h4>
		            </div>
	             	<div class="card-body ">
		                <div class="row">
		                  	<div class="col-md-12 text-right">
		                      	<a href="{{ route('users.index') }}" class="btn btn-sm btn-rose">Back to list</a>
		                  	</div>
		                </div>
		                <div class="row">
		                  	<label class="col-sm-2 col-form-label">Name</label>
		                  	<div class="col-sm-7">
		                    	<div class="form-group">
		                      		<input class="form-control" name="name" id="input-name" type="text" placeholder="Full Names" value="" required="true" aria-required="true"/>
		                        </div>
		                  	</div>
		                </div>
		                <div class="row">
		                  	<label class="col-sm-2 col-form-label">Email</label>
	                  		<div class="col-sm-7">
	                    		<div class="form-group">
	                      			<input class="form-control" name="email" id="input-email" type="email" placeholder="Email" value="" required />
	                            </div>
	                        </div>
		                </div>
		                <div class="row">
			                <label class="col-sm-2 col-form-label" for="input-one"> Gender </label>
			                <div class="col-sm-7">
			                    <div class="form-control">
			                      	<input input type="radio" name="gender" id="input-on1" value="Male" /><label for="input-on1">Male</label>
			                      	<input input type="radio" name="gender" id="input-on2" value="Female" /><label for="input-on2">Female</label>
			                    </div>
			                </div>
		                </div>
		                <div class="row">
			                <label class="col-sm-2 col-form-label" for="input-un"> Location </label>
			                <div class="col-sm-7">
			                    <div class="form-group">
			                      	<input class="form-control" input type="text" name="location" id="input-un" placeholder="Location" />
			                    </div>
			                </div>
		                </div>
	                	<div class="row">
			                <label class="col-sm-2 col-form-label"> Role </label>
			                <div class="col-sm-7">
			                    <div class="form-group">
				                    <select class="selectpicker col-sm-12 pl-0 pr-0" name="role" data-style="select-with-transition" title="" data-size="100">
				                    	@foreach($roles as $role)
				                        	<option value="{{ $role->name }}" title="{{ $role->description }}"> {{ $role->display_name }} </option>
				                        @endforeach
				                    </select>
			                    </div>
			                </div>
		                </div>
		                <input type="hidden" name="password" value="{{ bcrypt('dollar') }}">
		                <div class="row">
			                <label class="col-sm-2 col-form-label" for="input-st"> Status </label>
			                <div class="col-sm-7">
			                    <div class="form-control">
			                      	<input class="" input type="radio" name="status" id="input-st" value="Active" /><label for="input-st">Active</label>
			                      	<input class="" input type="radio" name="status" id="input-st1" value="Busy" /><label for="input-st1">Busy</label>
			                      	<input class="" input type="radio" name="status" id="input-st2" value="Away" /><label for="input-st2">Away</label>
			                      	<input class="" input type="radio" name="status" id="input-st3" value="Blocked" /><label for="input-st3">Blocked</label>
			                    </div>
			                </div>
		                </div>
		            </div>
		            <div class="card-footer ml-auto mr-auto">
		                <button type="submit" class="btn btn-rose">Add User</button>
		            </div>
	        	</div>
		    </form>
        </div>
    </div>
@endsection
@section('scripts') @endsection