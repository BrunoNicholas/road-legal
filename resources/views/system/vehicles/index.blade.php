@extends('layouts.site')
@section('title') Vehicles @endsection

@section('styles')  @endsection
@section('page_name') Registered Vehicles | {{ config('app.name') }} @endsection
@section('content')
<div class="block-header not-info">
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
        {{-- <li class="breadcrumb-item"><a href="{{ route('companies.index') }}"> Insurance Companies </a></li> --}}
        {{-- <li class="breadcrumb-item"><a href="{{ route('roles.index') }}"> User Roles</a></li> --}}
        <li class="breadcrumb-item active" aria-current="page"> Vehicles </li>
    </ol>
    <span class="breadcrumb">Company &amp; Individual Vehicles - {{ config('app.name') }} @role(['super-admin','admin']) - <a href="{{ route('vehicles.create') }}"> <button class="badge btn-info btn-sm"> Add New </button> </a>@endrole </span>
</div>
@include('layouts.includes.notifications')
<div class="row">
    <div class="col-md-12">
        <div class="card">
    		<div class="card-body background-transparent">
      			<div class="row">
                    <div class="table-responsive">
                        <table class="table" id="datatables" class="table table-striped table-no-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Policy Holder</th>
                                    <th>Policy Number</th>
                                    <th>Car No. Plate</th>
                                    <th>Model/Make</th>
                                    <th>Seating Capacity</th>
                                    <th>Expiry Date</th>
                                    <th class="text-center">MTP Status</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0; ?>
                                @foreach($vehicles as $vehicle)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td><a href="{{ route('owners.show',$vehicle->car_owner_id) }}" title="View Policy Holder's details">{{ App\Models\CarOwner::where('id',$vehicle->car_owner_id)->first()->owner_name }}</a></td>
                                        <td>{{ $vehicle->policy_no }}</td>
                                        <td>{{ $vehicle->no_plate }}</td>
                                        <td>{{ $vehicle->car_model }}</td>
                                        <td class="text-center">{{ $vehicle->seating_capacity }}</td>
                                        <td>{{ $vehicle->date_of_expiry }}</td>
                                        <td style="text-transform: capitalize;">{{ $vehicle->status }}</td>
                                        <td class="td-actions text-center">
                                            <a href="{{ route('vehicles.show', $vehicle->id) }}" rel="tooltip" class="btn btn-info btn-round btn-sm" style="margin: 2px;" title="View MTP vehicle details">
                                                <i class="material-icons">done</i> View
                                            </a>
                                            <a href="{{ route('vehicles.edit', $vehicle->id) }}" rel="tooltip" class="btn btn-success btn-round btn-sm" style="margin: 2px;" title="Edit MTP vehicle details">
                                                <i class="material-icons">edit</i> Edit
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

      			</div>
    		</div>
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
              [10, 25, 50, "View All"]
            ],
            responsive: true,
            language: {
              search: "_INPUT_",
              searchPlaceholder: "Search MTP details",
            },
            "columnDefs": [
              { "orderable": false, "targets": 5 },
            ],
          });
        });
    </script>
@endsection