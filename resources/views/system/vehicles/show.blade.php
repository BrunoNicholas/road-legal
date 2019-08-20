@extends('layouts.site')
@section('title') Vehicle Details @endsection

@section('styles')  @endsection
@section('page_name') View Vehicle Details | {{ config('app.name') }} @endsection
@section('content')
<div class="block-header">
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
        {{-- <li class="breadcrumb-item"><a href="{{ route('companies.index') }}"> Insurance Companies </a></li> --}}
        <li class="breadcrumb-item"><a href="{{ route('vehicles.index') }}"> MTP Vehicles </a></li>
        <li class="breadcrumb-item active" aria-current="page"> Vehicle Details </li>
    </ol>
    <span class="breadcrumb">Vehicle Details - {{ config('app.name') }} </span>
</div>
@include('layouts.includes.notifications')
<div class="row">
  	<div class="col-md-8">
      	<div class="card">
        		<div class="card-header card-header-success card-header-icon">
          			<div class="card-icon"> <i class="material-icons">location_searching</i> </div>
          			<h4 class="card-title"> Vehicle details and validity | {{ config('app.name') }} </h4>
        		</div>
        		<div class="card-body background-transparent">
          			<div class="row">
                    <table class="table m-b-0">
                      <thead>
                          <tr>
                              <th scope="col"><b>#</b></th>
                              <th scope="col"><b>Attribute</b></th>
                              <th scope="col"><b>Value</b></th>
                              <th scope="col"><b>More</b></th>
                          </tr>
                      </thead>
                      <?php $i=0; ?>
                      <tbody>
                          @if($vehicle->company_id)
                              <tr>
                                  <th scope="row">{{ ++$i }}</th>
                                  <td> Comapany Names </td>
                                  <td>{{ App\Models\Company::where('id',$vehicle->company_id)->first()->company_name }}</td>
                                  <td> <a target="_blank" href="{{ route('companies.show',$vehicle->company_id) }}" class="label btn-sm btn-info">View Company</a> </td>
                              </tr>
                          @endif
                          @if($vehicle->car_owner_id)
                              <tr>
                                  <th scope="row">{{ ++$i }}</th>
                                  <td> Policy Holder </td>
                                  <td>{{ App\Models\CarOwner::where('id',$vehicle->car_owner_id)->first()->owner_name }}</td>
                                  <td></td>
                              </tr>
                          @endif
                          @if($vehicle->car_category)
                              <tr>
                                  <th scope="row">{{ ++$i }}</th>
                                  <td> Ownership </td>
                                  <td>{{ $vehicle->car_category }}</td>
                                  <td></td>
                              </tr>
                          @endif
                          @if($vehicle->car_model)
                              <tr>
                                  <th scope="row">{{ ++$i }}</th>
                                  <td>Model</td>
                                  <td>{{ $vehicle->car_model }}</td>
                                  <td></td>
                              </tr>
                          @endif
                          @if($vehicle->reg_no)
                              <tr>
                                  <th scope="row">{{ ++$i }}</th>
                                  <td>Registration Number </td>
                                  <td>{{ $vehicle->reg_no }}</td>
                                  <td></td>
                              </tr>
                          @endif
                          @if($vehicle->policy_no)
                              <tr>
                                  <th scope="row">{{ ++$i }}</th>
                                  <td>Policy Number</td>
                                  <td>{{ $vehicle->policy_no }}</td>
                                  <td></td>
                              </tr>
                          @endif
                          @if($vehicle->no_plate)
                              <tr>
                                  <th scope="row">{{ ++$i }}</th>
                                  <td>Number Plate</td>
                                  <td>{{ $vehicle->no_plate }}</td>
                                  <td></td>
                              </tr>
                          @endif
                          @if($vehicle->seating_capacity)
                              <tr>
                                  <th scope="row">{{ ++$i }}</th>
                                  <td>Seating Capacity</td>
                                  <td>{{ $vehicle->seating_capacity }}</td>
                                  <td></td>
                              </tr>
                          @endif
                          @if($vehicle->gross_weight)
                              <tr>
                                  <th scope="row">{{ ++$i }}</th>
                                  <td>Gross weight</td>
                                  <td>{{ $vehicle->gross_weight }}</td>
                                  <td></td>
                              </tr>
                          @endif
                          @if($vehicle->car_price)
                              <tr>
                                  <th scope="row">{{ ++$i }}</th>
                                  <td>Car Price </td>
                                  <td>{{ $vehicle->car_price . ' ' . $vehicle->price_units }}</td>
                                  <td></td>
                              </tr>
                          @endif
                          @if($vehicle->premium_charged)
                              <tr>
                                  <th scope="row">{{ ++$i }}</th>
                                  <td>Premuim Charged</td>
                                  <td>{{ $vehicle->premium_charged . ' ' . $vehicle->price_units }}</td>
                                  <td></td>
                              </tr>
                          @endif
                          @if($vehicle->date_of_issue)
                              <tr>
                                  <th scope="row">{{ ++$i }}</th>
                                  <td>Date of Issuing</td>
                                  <td>{{ $vehicle->date_of_issue }}</td>
                                  <td></td>
                              </tr>
                          @endif
                          @if($vehicle->date_of_expiry)
                              <tr>
                                  <th scope="row">{{ ++$i }}</th>
                                  <td>Expiry Date</td>
                                  <td>{{ $vehicle->date_of_expiry }}</td>
                                  <td></td>
                              </tr>
                          @endif
                          @if($vehicle->issuing_authority)
                              <tr>
                                  <th scope="row">{{ ++$i }}</th>
                                  <td>Issuing Authority</td>
                                  <td>{{ $vehicle->issuing_authority }}</td>
                                  <td></td>
                              </tr>
                          @endif
                          @if($vehicle->created_at)
                              <tr>
                                  <th scope="row">{{ ++$i }}</th>
                                  <td>Date added the record</td>
                                  <td>{{ $vehicle->created_at }}</td>
                                  <td></td>
                              </tr>
                          @endif
                      </tbody>
                  </table>
          			</div>
        		</div>
      	</div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon"> <i class="material-icons">location_searching</i> </div>
                <h4 class="card-title"> Operations </h4>
            </div>
            <div class="card-body background-transparent">
                <div class="row">
                    <a href="javascript:void(0)" class="col-md-12" style="min-height: 100px;">  </a>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                              <a href="{{ route('vehicles.index') }}" class="btn btn-info btn-round btn-block"> Back </a>
                            </div>
                            <div class="col-md-6">
                                <form action="{{ route('vehicles.destroy',$vehicle->id) }}" method="post"> 
                                    @csrf 
                                    {{ method_field('DELETE') }}
                                    <button type="button" class="btn btn-rose btn-round btn-block" title="Delete this vehicle!" onclick="confirm('Are you sure you want to delete this vehicle. This is not reversible.') ? this.parentElement.submit() : ''">DELETE </button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
