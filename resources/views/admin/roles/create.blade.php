@extends('layouts.site')
@section('title') Add Role @endsection
@section('styles') @endsection
@section('page_name') Add Role @endsection
@section('content')
	@include('layouts.includes.notifications')
	<div class="row">
        <div class="col-md-9">
		    <form method="post" enctype="multipart/form-data" action="{{ route('roles.store') }}" autocomplete="off" class="form-horizontal">
		        @csrf
		        <input type="hidden" name="_method" value="post">
	            <div class="card ">
		            <div class="card-header card-header-rose card-header-icon">
		                <div class="card-icon"> <i class="material-icons">lock</i> </div>
		                <h4 class="card-title">Add Role</h4>
		            </div>
	             	<div class="card-body ">
		                <div class="row">
		                  	<div class="col-md-12 text-right">
		                      	<a href="{{ route('roles.index') }}" class="btn btn-sm btn-rose">Back to list</a>
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
		                  	<label class="col-sm-2 col-form-label">Display Name</label>
	                  		<div class="col-sm-7">
	                    		<div class="form-group">
	                      			<input class="form-control" name="display_name" id="input-email" type="text" placeholder="Display name" value="" required />
	                            </div>
	                        </div>
		                </div>
		                <div class="row">
			                <label class="col-sm-2 col-form-label" for="input-description"> Description </label>
			                <div class="col-sm-7">
			                    <div class="form-group">
			                      	<textarea class="form-control" name="description" id="input-description" placeholder="Description"></textarea>
			                    </div>
			                </div>
		                </div>
	                	<div class="row">
			                <label class="col-sm-2 col-form-label"> Permissions </label>
			                <div class="col-sm-7">
			                    <div class="form-group">
				                    <div class="row">
                                        <div class="col-4"> </div>
                                        <div class="col-8" style="max-height: 300px; overflow-y: auto;">
                                        	<?php $a=0; ?>
                                            @foreach($permissions as $permission)
                                                <input type="checkbox" name="permission[]" value="{{ $permission->id }}" id="permckbx{{ $a }}"> <label for="permckbx{{ $a }}">{{ $permission->display_name }} </label> <br>
                                                <!-- {{ ++$a }} -->
                                            @endforeach
                                        </div>
                                    </div>
			                    </div>
			                </div>
		                </div>
		            </div>
		            <div class="card-footer ml-auto mr-auto">
		                <button type="submit" class="btn btn-rose">Add Role</button>
		            </div>
	        	</div>
		    </form>
        </div>
    </div>
@endsection
@section('scripts') @endsection