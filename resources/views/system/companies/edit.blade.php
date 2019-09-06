@extends('layouts.site')
@section('title') Edit Insurance Company @endsection

@section('styles')  @endsection
@section('page_name') Edit Insurance Company | {{ config('app.name') }} @endsection
@section('content')
<div class="block-header not-info">
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('companies.index') }}"> Insurance Companies </a></li>
        {{-- <li class="breadcrumb-item"><a href="{{ route('roles.index') }}"> User Roles</a></li> --}}
        <li class="breadcrumb-item active" aria-current="page"> Edit Company </li>
    </ol>
    <span class="breadcrumb">Edit Company - {{ config('app.name') }}  </span>
</div>
@include('layouts.includes.notifications')
<div class="row">
  	<div class="col-md-12">
      	<form method="post" action="{{ route('companies.update', $company->id) }}" autocomplete="off" class="form-horizontal">
            @csrf
            {{ method_field('PATCH') }}
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
                    <h4 class="card-title">Add New Insurance Company</h4>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a href="{{ route('companies.index') }}" class="btn btn-sm btn-primary">Back to list</a>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Company Name</label>
                        <div class="col-sm-7">
                          <div class="form-group">
                              <input class="form-control" name="company_name" id="input-company_name" type="text" placeholder="Company Name" value="{{ $company->company_name }}" required aria-required="true" autofocus />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Company Email</label>
                        <div class="col-sm-7">
                          <div class="form-group">
                              <input class="form-control" name="company_email" id="input-company_email" type="email" placeholder="Company Email" value="{{ $company->company_email }}" required />
                              </div>
                          </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label" for="input-un"> Telephone </label>
                      <div class="col-sm-7">
                          <div class="form-group">
                              <input class="form-control" input type="text" name="company_telephone" value="{{ $company->company_telephone }}" id="input-un" placeholder="Company telephone number" />
                          </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label" for="input-un"> Number of drivers </label>
                      <div class="col-sm-7">
                          <div class="form-group">
                              <input class="form-control" input type="number" value="{{ $company->drivers_number }}" name="drivers_number" id="input-un" placeholder="Drivers number" />
                          </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label" for="input-un"> Company location (GPS Cordinates) </label>
                      <div class="col-sm-7">
                          <div class="form-group">
                              <input class="form-control" input type="text" value="{{ $company->location }}" name="location" id="input-un" placeholder="0.246 32.011" />
                          </div>
                      </div>
                    </div>
                    <input type="hidden" name="user_id" value="{{ $company->user_id }}">
                    <div class="row">
                      <label class="col-sm-2 col-form-label" for="input-st"> Status </label>
                      <div class="col-sm-7">
                          <div class="form-control">
                              <input class="" input type="radio" name="status" id="input-st" value="Active" @if ($company->status == 'Active')
                                checked 
                              @endif/><label for="input-st">Active</label>
                              <input class="" input type="radio" name="status" id="input-st1" value="Busy" @if ($company->status == 'Busy')
                                checked 
                              @endif/><label for="input-st1">Busy</label>
                              <input class="" input type="radio" name="status" id="input-st2" value="Pending" @if ($company->status == 'Pending')
                                checked 
                              @endif/><label for="input-st2">Pending</label>
                              <input class="" input type="radio" name="status" id="input-st3" value="Blocked" @if ($company->status == 'Blocked')
                                checked 
                              @endif/><label for="input-st3">Blocked</label>
                          </div>
                      </div>
                    </div>
                </div>
                <div class="card-footer ml-auto mr-auto">
                    <button type="submit" class="btn btn-info">SUBMIT</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
