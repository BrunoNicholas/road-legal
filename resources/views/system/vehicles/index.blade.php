@extends('layouts.site')
@section('title') Vehicles @endsection

@section('styles')  @endsection
@section('page_name') Registered Vehicles | {{ config('app.name') }} @endsection
@section('content')
<div class="block-header">
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
        {{-- <li class="breadcrumb-item"><a href="{{ route('companies.index') }}"> Insurance Companies </a></li> --}}
        {{-- <li class="breadcrumb-item"><a href="{{ route('roles.index') }}"> User Roles</a></li> --}}
        <li class="breadcrumb-item active" aria-current="page"> Vehicles </li>
    </ol>
    <span class="breadcrumb">Company &amp; Individual Vehicles - {{ config('app.name') }} @role(['super-admin','admin']) <a href="{{ route('vehicles.create') }}"> <button class="badge btn-info btn-sm"> Add New </button> </a>@endrole </span>
</div>
@include('layouts.includes.notifications')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon"> <i class="material-icons">location_searching</i> </div>
                <h4 class="card-title"> The vehicles that have registred successfully | {{ config('app.name') }} </h4>
        		</div>
        		<div class="card-body background-transparent">
          			<div class="row">
                        <div class="table-responsive">
                            <table class="table">
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
                                    @foreach($vehicles as $vehicle)



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
