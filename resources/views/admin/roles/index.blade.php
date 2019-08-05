@extends('layouts.site')
@section('title') User Roles @endsection

@section('styles') @endsection
@section('page_name') User Roles @endsection
@section('content')
	@include('layouts.includes.notifications')

	<div class="row">
        <div class="col-md-12">
            <div class="card">
	            <div class="card-header card-header-rose card-header-icon">
	                <div class="card-icon">  <i class="material-icons">group</i> </div>
	                <h4 class="card-title"> User Roles </h4>
	            </div>
              	<div class="card-body">
                    <div class="row">
                    	<div class="col-12 text-right">
                      		<a href="{{ route('roles.create') }}" class="btn btn-sm btn-rose">Add New</a>
                    	</div>
                  	</div>
                    <div class="table-responsive">
                  		<table id="datatables" class="table table-striped table-no-bordered table-hover" style="display:none">
                    		<thead class="text-primary">
                    			<th> # </th>
                      			<th> Name </th>
                      			<th> Display Name </th>
                      			<th> Description </th>
                      			<th class="text-right"> Actions </th>
                      		</thead>
                    		<tbody> <?php $i=0; ?>
	                    		@foreach($roles as $role)
	                                <tr>
	                                	<td> {{ ++$i }} </td>
	                            		<td> {{ $role->name }} </td>
	                            		<td> {{ $role->display_name }} </td>
	                            		<td> {{ $role->description }} </td>
	                            		@role('super-admin')
	                            		<td class="td-actions text-right">
											<form action="{{ route('roles.destroy',$role->id) }}" method="post"> 
			                                    @csrf 
			                                    {{ method_field('DELETE') }}
			                                    <a rel="tooltip" class="btn btn-rose btn-link" href="{{ route('roles.show',$role->id) }}" data-original-title="View {{ $role->name }}'s details" title="View {{ $role->name }}'s details">
			                                        <i class="material-icons">person</i><div class="ripple-container"></div>
			                                    </a>
			                                    <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('roles.edit',$role->id) }}" data-original-title="Edit {{ $role->name }}'s details" title="Edit {{ $role->name }}'s details">
			                                        <i class="material-icons">edit</i><div class="ripple-container"></div>
			                                    </a>
			                                    <button type="button" class="btn btn-danger btn-link" data-original-title="" title="Delete {{ $role->name }}'s profile" onclick="confirm('Are you sure you want to delete this role?') ? this.parentElement.submit() : ''">
			                                        <i class="material-icons">close</i> <div class="ripple-container"></div>
			                                    </button>
			                                </form>
			                            </td>
			                            @endrole
			                        </tr>
			                    @endforeach
		                    </tbody>
                  		</table>
                  	</div>
              	</div>
              	{{ $roles->links() }}
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