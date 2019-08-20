@extends('layouts.site')
@section('title') Drivers @endsection

@section('styles')  @endsection
@section('page_name') Drivers &amp; Owners | {{ config('app.name') }} @endsection
@section('content')
<div class="block-header">
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
        {{-- <li class="breadcrumb-item"><a href="{{ route('companies.index') }}"> Insurance Companies </a></li> --}}
        {{-- <li class="breadcrumb-item"><a href="{{ route('roles.index') }}"> User Roles</a></li> --}}
        <li class="breadcrumb-item active" aria-current="page"> Owners &amp; Drivers </li>
    </ol>
    <span class="breadcrumb">Vehicle Owners &amp; Drivers - {{ config('app.name') }} @role(['super-admin','admin'])| <a href="{{ route('owners.create') }}"> <button class="badge btn-info btn-sm"> Add New </button> </a>@endrole </span>
</div>
@include('layouts.includes.notifications')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon"> <i class="material-icons">location_searching</i> </div>
                <h4 class="card-title"> The list of all who own or drive vehicles | {{ config('app.name') }} </h4>
        		</div>
        		<div class="card-body background-transparent">
          			<div class="row">
                        <div class="table-responsive">
                            <table class="table" id="datatables" class="table table-striped table-no-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Company Name</th>
                                        <th>Company Email</th>
                                        <th>Telephone</th>
                                        <th class="text-right">Status</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=0; ?>
                                    @foreach($officers as $officer)



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