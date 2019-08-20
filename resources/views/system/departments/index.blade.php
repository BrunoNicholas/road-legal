@extends('layouts.site')
@section('title') System Departments @endsection

@section('styles')  @endsection
@section('page_name') System Departments | {{ config('app.name') }} @endsection
@section('content')
<div class="block-header">
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
        {{-- <li class="breadcrumb-item"><a href="{{ route('categories.index') }}"> Market Categories</a></li> --}}
        {{-- <li class="breadcrumb-item"><a href="{{ route('roles.index') }}"> User Roles</a></li> --}}
        <li class="breadcrumb-item active" aria-current="page">  </li>
    </ol>
    <span class="breadcrumb">Departments - {{ config('app.name') }} @role(['super-admin','admin'])| <a href="{{ route('companies.create') }}"> <button class="badge btn-info btn-sm"> Add New </button> </a>@endrole </span>
</div>
@include('layouts.includes.notifications')
<div class="row">
  	<div class="col-md-12">
      	<div class="card">
        		<div class="card-header card-header-success card-header-icon">
          			<div class="card-icon"> <i class="material-icons">flag</i> </div>
          			<h4 class="card-title"> System Departments | {{ Auth::user()->name }} </h4>
        		</div>
        		<div class="card-body background-transparent">
          			<div class="row" id="datatables" class="table table-striped table-no-bordered table-hover">



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