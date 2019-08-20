@extends('layouts.site')
@section('title') Account Details @endsection

@section('styles')  @endsection
@section('page_name') View Account Details | {{ config('app.name') }} @endsection
@section('content')
<div class="block-header">
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('owners.index') }}"> Owners &amp; Drivers</a></li> 
        <li class="breadcrumb-item"><a href="{{ route('accounts.index') }}"> Account </a></li> 
        <li class="breadcrumb-item active" aria-current="page"> Account Details </li>
    </ol>
    <span class="breadcrumb">View Account Details - {{ config('app.name') }} </span>
</div>
@include('layouts.includes.notifications')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon"> <i class="material-icons">location_searching</i> </div>
                <h4 class="card-title"> View the account details | {{ config('app.name') }} </h4>
            </div>
            <div class="card-body background-transparent">
                <table class="table m-b-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Attribute</th>
                            <th scope="col">Value</th>
                            <th scope="col">More</th>
                        </tr>
                    </thead>
                    <?php $i=0; ?>
                    <tbody>
                        @if($account->car_id)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>MTP (Vehicle)</td>
                                <td>{{ App\Models\Car::where('id',$account->car_id)->first()->no_plate . ' - ' . App\Models\Car::where('id',$account->car_id)->first()->car_model }}</td>
                                <td> <a href="{{ route('vehicles.show',$account->car_id) }}" target="_blank"><button class="btn btn-info btn-sm">View MTP</button></a> </td>
                            </tr>
                        @endif
                        @if($account->balance)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>Account Balance</td>
                                <td>{{ $account->balance }}</td>
                                <td></td>
                            </tr>
                        @endif
                        @if($account->debt)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>Account Debt</td>
                                <td>{{ $account->debt }}</td>
                                <td></td>
                            </tr>
                        @endif
                        @if($account->car_owner_id)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>Policy Holder</td>
                                <td>{{ $account->car_owner_id ? App\Models\CarOwner::where('id',$account->car_owner_id)->first()->owner_name : '' }}</td>
                                <td> <a href="{{ route('owners.show',$account->car_owner_id) }}" target="_blank"><button class="btn btn-primary btn-sm">View Details</button></a> </td>
                            </tr>
                        @endif
                        @if($account->company_id)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>Associated Company</td>
                                <td>{{ App\Models\Company::where('id',$account->company_id)->first()->company_name }}</td>
                                <td><a href="{{ route('companies.show',$account->company_id) }}" target="_blank"><button class="btn btn-success btn-sm">View Details</button></a></td>
                            </tr>
                        @endif

                        @if($account->status)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>Account status</td>
                                <td>{{ $account->status }}</td>
                                <td></td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon"> <i class="material-icons">location_searching</i> </div>
                <h4 class="card-title text-center"> Operations </h4>
            </div>
            <div class="card-body background-transparent">
                <div class="row">
                    <div class="col-md-12" style="min-height: 100px;">
                        <label></span>
                        <br>
                        <label></span>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                              <a href="{{ route('accounts.index') }}" class="btn btn-info btn-round btn-block"> Back </a>
                            </div>
                            <div class="col-md-6">
                                <form action="{{ route('accounts.destroy',$account->id) }}" method="post"> 
                                    @csrf 
                                    {{ method_field('DELETE') }}
                                    <button type="button" class="btn btn-rose btn-round btn-block" title="Delete this company!" onclick="confirm('Are you sure you want to delete this account. This is not reversible?') ? this.parentElement.submit() : ''">
                                        DELETE <div class="ripple-container"></div>
                                     </button>
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
