@extends('layouts.site')
@section('title') System Users @endsection

@section('styles') @endsection
@section('page_name') System Users @endsection
@section('content')
	@include('layouts.includes.notifications')
	
	<div class="row">
        <div class="col-md-12">
            <div class="card">
	            <div class="card-header card-header-rose card-header-icon">
	                <div class="card-icon">  <i class="material-icons">group</i> </div>
	                <h4 class="card-title"> System Users </h4>
	            </div>
              	<div class="card-body">
                    <div class="row">
                    	<div class="col-12 text-right">
                      		<a href="{{ route('users.create') }}" class="btn btn-sm btn-rose">Add User</a>
                    	</div>
                  	</div>
                    <div class="table-responsive">
                  		<table id="datatables" class="table table-striped table-no-bordered table-hover" style="display:none">
                    		<thead class="text-primary">
                      			<th> Photo </th>
                      			<th> Names </th>
                      			<th> Gender </th>
                      			<th> Email </th>
                      			<th> Role </th>
                      			<th> Status </th>
                      			<th class="text-right"> Actions </th>
                      		</thead>
                    		<tbody> <?php $i=0; ?>
	                    		@foreach($users as $user)
	                                <tr>
	                          			<td> 
	                          				<div class="avatar avatar-sm rounded-circle img-circle" style="width:100px; height:100px;overflow: hidden;">
	                                			<img src="{{ asset('files/profile/images/'.$user->profile_image) }}" alt="user" style="max-width: 100px;">
	                            			</div>
	                            		</td>
	                            		<td> {{ $user->name }} </td>
	                            		<td> {{ $user->gender }} </td>
	                            		<td> {{ $user->email }} </td>
	                            		<td> {{ App\Models\Role::where('name',$user->role)->get()->first()->display_name }} </td>
	                            		<td> {{ $user->status }} </td>
	                            		<td class="td-actions text-right">
											<form action="{{ route('users.destroy',$user->id) }}" method="post"> 
			                                    @csrf 
			                                    {{ method_field('DELETE') }}
			                                    <a rel="tooltip" class="btn btn-rose btn-link" href="{{ route('users.show',$user->id) }}" data-original-title="View {{ $user->name }}'s details" title="View {{ $user->name }}'s details">
			                                        <i class="material-icons">person</i><div class="ripple-container"></div>
			                                    </a>
			                                    <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('users.edit',$user->id) }}" data-original-title="Edit {{ $user->name }}'s details" title="Edit {{ $user->name }}'s details">
			                                        <i class="material-icons">edit</i><div class="ripple-container"></div>
			                                    </a>
			                                    <button type="button" class="btn btn-danger btn-link" data-original-title="" title="Delete {{ $user->name }}'s profile" onclick="confirm('Are you sure you want to delete this user?') ? this.parentElement.submit() : ''">
			                                        <i class="material-icons">close</i> <div class="ripple-container"></div>
			                                    </button>
			                                </form>
			                            </td>
			                        </tr> <!-- {{ ++$i }} -->
			                    @endforeach
		                    </tbody>
                  		</table>
                  	</div>
              	</div>
              	{{ $users->links() }}
            </div>
        </div>
    </div>

@endsection
@section('scripts')
	<script>
		$(document).ready(function() {
	      $('#datatables').fadeIn(1100);
	      $('#datatables').DataTable({
	        "pagingType": "full_numbers",
	        "lengthMenu": [
	          [10, 25, 50, -1],
	          [10, 25, 50, "All"]
	        ],
	        responsive: true,
	        language: {
	          search: "_INPUT_",
	          searchPlaceholder: "Search users",
	        },
	        "columnDefs": [
	          { "orderable": false, "targets": 5 },
	        ],
	      });
	    });
	</script>
@endsection