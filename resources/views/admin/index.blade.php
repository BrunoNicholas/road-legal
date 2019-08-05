@extends('layouts.site')
@section('title') Administrator @endsection

@section('styles') @endsection
@section('page_name') Administrator @endsection
@section('content')
	@include('layouts.includes.notifications')
	@include('layouts.includes.notify_admin')

	<div class="row">
		<div class="col-md-12">
	        <div class="card ">
	            <div class="card-header ">
	              	<h4 class="card-title">Administrator Control Panel - <small class="description"> System &amp; User Controls </small></h4>
	            </div>
	            <div class="card-body ">
		            <ul class="nav nav-pills nav-pills-success" role="tablist">
		                <li class="nav-item">
		                  	<a class="nav-link active" data-toggle="tab" href="#link1" role="tablist"> Users </a>
		                </li>
		                <li class="nav-item">
		                  	<a class="nav-link" data-toggle="tab" href="#link2" role="tablist"> Roles </a>
		                </li>
		                <li class="nav-item">
		                  	<a class="nav-link" data-toggle="tab" href="#link3" role="tablist"> Settings </a>
		                </li>
		            </ul>
	              	<div class="tab-content tab-space">
	                	<div class="tab-pane active" id="link1">
	                  		<div class="card">
					            <div class="card-body">
						            <div class="table-responsive">
						                <table class="table">
							                <thead>
							                    <tr>
							                      	<th class="text-center">#</th>
							                      	<th>Name</th>
							                      	<th>Role</th>
							                      	<th>Location</th>
							                      	<th class="text-right">Status</th>
							                      	<th class="text-right">Actions</th>
							                    </tr>
							                </thead>
							                <tbody>
							                	<?php $i=0; ?>
							                	@foreach($users as $user)
							                		@if($i < 5)
								                    <tr>
									                    <td class="text-center">{{ ++$i }}</td>
									                    <td> {{ $user->name }} </td>
									                    <td> {{ App\Models\Role::where('name',$user->role)->get()->first()->display_name }} </td>
									                    <td> {{ $user->location }} </td>
									                    <td class="text-right"> {{ $user->status }} </td>
									                    <td class="td-actions text-center">
									                        <a href="{{ route('users.show', $user->id) }}" rel="tooltip" class="btn btn-info btn-round" style="margin: 2px;" title="View user details">
									                          	<i class="material-icons">person</i>
									                        </a>
									                        <a href="{{ route('users.edit', $user->id) }}" rel="tooltip" class="btn btn-success btn-round" style="margin: 2px;" title="Edit user details">
									                          	<i class="material-icons">edit</i>
									                        </a>
									                        <!--
									                        <a href="javascript:void(0)" rel="tooltip" class="btn btn-danger btn-round" style="margin: 2px;">
									                          	<i class="material-icons">close</i>
									                        </a> -->
									                    </td>
								                    </tr>
								                    @endif
								                @endforeach
							                </tbody>
						                </table>
						            </div>
						            <a href="{{ route('users.index') }}" class="btn btn-success btn-sm">All Users</a>
						            <a href="{{ route('users.create') }}" class="btn btn-info btn-sm">Add User</a>
					            </div>
					        </div>
	                	</div>
	                	<!-- /end of tab 1 -->
	                	<!-- start of tab 2  -->
		                <div class="tab-pane" id="link2">
		                  	<div class="card">
					            <div class="card-body">
						            <div class="table-responsive">
						                <table class="table">
							                <thead>
							                    <tr>
							                      	<th class="text-center">#</th>
							                      	<th>Name</th>
							                      	<th>Role</th>
							                      	<th>Description</th>
							                      	<th class="text-right">Actions</th>
							                    </tr>
							                </thead>
							                <tbody>
							                	<?php $i=0; ?>
							                	@foreach($roles as $role)
							                		@if($i < 5)
								                    <tr>
									                    <td class="text-center">{{ ++$i }}</td>
									                    <td> {{ $role->name }} </td>
									                    <td> {{ $role->display_name }} 	</td>
									                    <td> {{ $role->description }} 	</td>
									                    <td class="td-actions text-center">
									                        <a href="{{ route('roles.show', $role->id) }}" rel="tooltip" class="btn btn-warning btn-round" style="margin: 2px;" title="View role details">
									                          	<i class="material-icons">lock</i>
									                        </a>
									                        <a href="{{ route('roles.edit', $role->id) }}" rel="tooltip" class="btn btn-success btn-round" style="margin: 2px;" title="Edit role details">
									                          	<i class="material-icons">edit</i>
									                        </a>
									                        <!--
									                        <a href="javascript:void(0)" rel="tooltip" class="btn btn-danger btn-round" style="margin: 2px;">
									                          	<i class="material-icons">close</i>
									                        </a> -->
									                    </td>
								                    </tr>
								                    @endif
								                @endforeach
							                </tbody>
						                </table>
						            </div>
						            <a href="{{ route('roles.index') }}" class="btn btn-warning btn-sm">All Roles</a>
						            <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm">Add Role</a>
					            </div>
					        </div>
		                </div>

		                <div class="tab-pane" id="link3">
		                  	<span class="text-info"><i> No settings scheduled here! </i></span>
		                </div>
	              </div>
	            </div>
	        </div>
        </div>
	</div>
@endsection
@section('scripts') @endsection