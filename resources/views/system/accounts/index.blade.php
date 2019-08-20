@extends('layouts.site')
@section('title') Drivers @endsection

@section('styles')  @endsection
@section('page_name') Drivers &amp; Owners | {{ config('app.name') }} @endsection
@section('content')
<div class="block-header">
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
        {{-- <li class="breadcrumb-item"><a href="{{ route('companies.index') }}"> Insurance Companies </a></li> --}}
        <li class="breadcrumb-item"><a href="{{ route('owners.index') }}"> Owners &amp; Drivers</a></li> 
        <li class="breadcrumb-item active" aria-current="page"> Accounts </li>
    </ol>
    <span class="breadcrumb">Vehicle Owners &amp; Drivers - {{ config('app.name') }} @role(['super-admin','admin'])| <a href="{{ route('accounts.create') }}"> <button class="badge btn-info btn-sm"> Add New </button> </a>@endrole </span>
</div>
@include('layouts.includes.notifications')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon"> <i class="material-icons">location_searching</i> </div>
                <h4 class="card-title"> Find all accounts as per policy holder | {{ config('app.name') }} </h4>
        		</div>
        		<div class="card-body background-transparent">
          			<div class="row">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Policy Holder</th>
                                        <th>Company Associate</th>
                                        <th>Balance</th>
                                        <th>Pending Debt</th>
                                        <th class="text-right">Status</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=0; ?>
                                    @foreach($accounts as $account)



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
