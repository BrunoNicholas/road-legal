@extends('layouts.site')
@section('title') Officers @endsection

@section('styles')  @endsection
@section('page_name') Traffic Officers | {{ config('app.name') }} @endsection
@section('content')
<div class="block-header not-info">
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"> Officers </li>
    </ol>
    <span class="breadcrumb"> Registered Police Officers - {{ config('app.name') }} @role(['super-admin','admin']) <a href="{{ route('officers.create') }}"> <button class="badge btn-info btn-sm"> Add New </button> </a>@endrole </span>
</div>
@include('layouts.includes.notifications')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-success card-header-icon">
                <h4 class="card-title"> The legally registered traffic officers | {{ config('app.name') }} </h4>
        		</div>
        		<div class="card-body background-transparent">
          			<div class="row">
                        <div class="table-responsive">
                            <table class="table" id="datatables" class="table table-striped table-no-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Officer Name</th>
                                        <th>Officer Email</th>
                                        <th>Officer Telephone</th>
                                        <th>Police ID</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=0; ?>
                                    @foreach($officers as $officer)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ App\User::where('id',$officer->user_id)->first()->name }}</td>
                                            <td>{{ App\User::where('id',$officer->user_id)->first()->email }}</td>
                                            <td>{{ App\User::where('id',$officer->user_id)->first()->telephone }}</td>
                                            <td>{{ $officer->police_id }}</td>
                                            <td>{{ $officer->status }}</td>
                                            <td class="td-actions text-center">
                                                <a href="{{ route('officers.show', $officer->id) }}" rel="tooltip" class="btn btn-info btn-round btn-sm" style="margin: 2px;" title="View ofiicer's details">
                                                    <i class="material-icons">done</i> View
                                                </a>
                                                <a href="{{ route('officers.edit', $officer->id) }}" rel="tooltip" class="btn btn-success btn-round btn-sm" style="margin: 2px;" title="Edit ofiicer's details">
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