@extends('layouts.site')
@section('title') Add Vehicles @endsection

@section('styles')  @endsection
@section('page_name') Register Vehicles | {{ config('app.name') }} @endsection
@section('content')
<div class="block-header">
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
        {{-- <li class="breadcrumb-item"><a href="{{ route('companies.index') }}"> Insurance Companies </a></li> --}}
        <li class="breadcrumb-item"><a href="{{ route('vehicles.index') }}"> MTP Vehicles </a></li>
        <li class="breadcrumb-item active" aria-current="page"> Add New </li>
    </ol>
    <span class="breadcrumb">Add Vehicle Details - {{ config('app.name') }} </span>
</div>
@include('layouts.includes.notifications')
<div class="row">
  	<div class="col-md-9">
        <form method="post" action="{{ route('vehicles.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card ">
                <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon"> <i class="material-icons">person</i> </div>
                    <h4 class="card-title">Add New MTP Car/Vehicle </h4>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a href="{{ route('vehicles.index') }}" class="btn btn-sm btn-primary">Back to list</a>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label"> Policy Holder </label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <select class="selectpicker col-sm-12 pl-0 pr-0" name="car_owner_id" data-style="select-with-transition" title="" data-size="100" required autofocus>
                                    @foreach($owners as $owner)
                                        <option value="{{ $owner->id }}" title="{{ $owner->owner_name .' - '. $owner->owner_email .' - '. $owner->owner_telephone }}"> {{ $owner->owner_name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label"> Company Attached </label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <select class="selectpicker col-sm-12 pl-0 pr-0" name="company_id" data-style="select-with-transition" title="" data-size="100">
                                    <option value="">Select company (Optional)</option>
                                    @foreach($companies as $company)
                                        <option value="{{ $company->id }}" title="{{ $company->company_email .' - '. $company->company_telephone }}"> {{ $company->company_name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label" for="input-st"> Car Categry </label>
                        <div class="col-sm-7">
                            <div class="form-control">
                                <input class="" input type="radio" name="car_category" id="input-st" value="Private" /><label for="input-st" checked>Private</label>
                                <input class="" input type="radio" name="car_category" id="input-st1" value="Company Owned" /><label for="input-st1">Company Owned (Fleet)</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Car Model</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" name="car_model" id="input-car_model" type="text" placeholder="Model/Make of the Vehicle" value="" required aria-required="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Registration Number</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" name="reg_no" id="input-reg_no" type="text" placeholder="Car Registration Number" value="" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label" for="input-policy_no"> Policy Number </label>
                      <div class="col-sm-7">
                          <div class="form-group">
                              <input class="form-control" input type="text" name="policy_no" id="input-policy_no" placeholder="Car policy number" />
                          </div>
                      </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label" for="input-no_plate"> Number Plate </label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" input type="text" name="no_plate" id="input-no_plate" placeholder="Vehicle number plate" />
                            </div>
                         </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label" for="input-seating_capacity"> Seating Capacity </label>
                      <div class="col-sm-7">
                          <div class="form-group">
                              <input class="form-control" input type="number" name="seating_capacity" id="input-seating_capacity" placeholder="Seating Capacity" />
                          </div>
                      </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label" for="input-gross_weight"> Gross Weight </label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" input type="number" name="gross_weight" id="input-gross_weight" placeholder="Gross weight" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label" for="input-car_price"> Car Price </label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" input type="number" name="car_price" id="input-car_price" placeholder="Vehicle price" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label" for="input-premium_charged"> Premium Charged </label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" input type="number" name="premium_charged" id="input-premium_charged" placeholder="Premium charged" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label" for="input-price_units"> Price Units </label>
                      <div class="col-sm-7">
                          <div class="form-group">
                              <input class="form-control" input type="text" name="price_units" id="input-price_units" placeholder="Price units (UGX, USD)" />
                          </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label" for="input-issuing_authority"> Issuing Authority </label>
                      <div class="col-sm-7">
                          <div class="form-group">
                              <input class="form-control" input type="text" name="issuing_authority" id="input-issuing_authority" placeholder="Authority issuing " />
                          </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label" for="input-date_of_issue"> Date of Issuing </label>
                      <div class="col-sm-7">
                          <div class="form-group">
                              <input class="form-control" input type="date" name="date_of_issue" id="input-date_of_issue" placeholder="" />
                          </div>
                      </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label" for="input-date_of_expiry"> Expiry Date </label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" input type="date" name="date_of_expiry" id="input-date_of_expiry" placeholder="" />
                            </div>
                        </div>
                    </div>
                </div>
            <div class="card-footer ml-auto mr-auto">
                    <button type="submit" class="btn btn-success"><i class="material-icons">done</i> SUBMIT </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
