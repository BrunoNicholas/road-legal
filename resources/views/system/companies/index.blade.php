@extends('layouts.site')
@section('title') Insurance Companies @endsection

@section('styles')  @endsection
@section('page_name') Registered Insurance Companies | {{ config('app.name') }} @endsection
@section('content')
<div class="block-header not-info">
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"> Insurance Companies </li>
    </ol>
    <span class="breadcrumb">Insurance Companies - {{ config('app.name') }} @role(['super-admin','admin'])| <a href="{{ route('companies.create') }}"> <button class="badge btn-info btn-sm"> Add New </button> </a>@endrole </span>
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
                                  <th>Company Name</th>
                                  <th>Company Email</th>
                                  <th>Telephone</th>
                                  <th class="text-right">Status</th>
                                  <th class="text-right">Actions</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php $i=0; ?>
                              @foreach($companies as $company)
                                  <tr>
                                      <td>{{ ++$i }}</td>
                                      <td>{{ $company->company_name }}</td>
                                      <td>{{ $company->company_email }}</td>
                                      <td>{{ $company->company_telephone }}</td>
                                      <td>{{ $company->status }}</td>
                                      <td class="td-actions text-center">
                                          <a href="{{ route('companies.show', $company->id) }}" rel="tooltip" class="btn btn-info btn-round btn-sm" style="margin: 2px;" title="View company details">
                                              <i class="material-icons">done</i> View
                                          </a>
                                          <a href="{{ route('companies.edit', $company->id) }}" rel="tooltip" class="btn btn-success btn-round btn-sm" style="margin: 2px;" title="Edit company details">
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
              searchPlaceholder: "Search insurance companies",
            },
            "columnDefs": [
              { "orderable": false, "targets": 5 },
            ],
          });
        });
    </script>
@endsection