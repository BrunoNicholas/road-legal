@extends('layouts.site')
@section('title') Accounts @endsection

@section('styles')  @endsection
@section('page_name') User Accounts| {{ config('app.name') }} @endsection
@section('content')
<div class="block-header not-info">
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
        {{-- <li class="breadcrumb-item"><a href="{{ route('companies.index') }}"> Insurance Companies </a></li> --}}
        <li class="breadcrumb-item"><a href="{{ route('owners.index') }}"> Owners &amp; Drivers</a></li> 
        <li class="breadcrumb-item active" aria-current="page"> Accounts </li>
    </ol>
    <span class="breadcrumb">MTP User Accounts - {{ config('app.name') }} @role(['super-admin','admin'])| <a href="{{ route('accounts.create') }}"> <button class="badge btn-info btn-sm"> Add New </button> </a>@endrole </span>
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
                                <tr class="text-center">
                                    <th class="text-center">#</th>
                                    <th>MTP (Vehicle)</th>
                                    <th>Balance</th>
                                    <th>Debt</th>
                                    <th>Policy Holder</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0; ?>
                                @foreach($accounts as $account)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ App\Models\Car::where('id',$account->car_id)->first()->no_plate . ' - ' . App\Models\Car::where('id',$account->car_id)->first()->car_model }}</td>  
                                        <td class="text-center">{{ $account->balance }}</td>  
                                        <td class="text-center">{{ $account->debt }}</td>  
                                        <td class="text-center">{{ $account->car_owner_id ? App\Models\CarOwner::where('id',$account->car_owner_id)->first()->owner_name : '' }}</td>
                                        <td class="text-center">{{ $account->status }}</td>

                                        <td class="td-actions text-center">
                                            <a href="{{ route('accounts.show', $account->id) }}" rel="tooltip" class="btn btn-info btn-round btn-sm" style="margin: 2px;" title="View account details">
                                                  <i class="material-icons">done</i> View
                                            </a>
                                            <a href="{{ route('accounts.edit', $account->id) }}" rel="tooltip" class="btn btn-success btn-round btn-sm" style="margin: 2px;" title="Edit account details">
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