@extends('layouts.site')
@section('title') Add Insurance Company @endsection

@section('styles')  @endsection
@section('page_name') New Insurance Company | {{ config('app.name') }} @endsection
@section('content')
<div class="block-header">
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('companies.index') }}"> Insurance Companies </a></li>
        {{-- <li class="breadcrumb-item"><a href="{{ route('roles.index') }}"> User Roles</a></li> --}}
        <li class="breadcrumb-item active" aria-current="page"> Add New </li>
    </ol>
    <span class="breadcrumb">Insurance Companies - {{ config('app.name') }}  </span>
</div>
@include('layouts.includes.notifications')
<div class="row">
  	<div class="col-md-9">
        <form method="post" action="{{ route('companies.store') }}" autocomplete="off" class="form-horizontal">
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
                              <input class="form-control" name="company_name" id="input-company_name" type="text" placeholder="Company Name" value="" required aria-required="true" autofocus />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Company Email</label>
                        <div class="col-sm-7">
                          <div class="form-group">
                              <input class="form-control" name="company_email" id="input-company_email" type="email" placeholder="Company Email" value="" required />
                              </div>
                          </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label" for="input-un"> Telephone </label>
                      <div class="col-sm-7">
                          <div class="form-group">
                              <input class="form-control" input type="text" name="company_telephone" id="input-un" placeholder="Company telephone number" />
                          </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label" for="input-un"> Registered Drivers </label>
                      <div class="col-sm-7">
                          <div class="form-group">
                              <input class="form-control" input type="number" name="drivers_number" id="input-un" placeholder="Drivers number" />
                          </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label" for="input-un"> Company location (GPS Cordinates) </label>
                      <div class="col-sm-7">
                          <div class="form-group">
                              <input class="form-control" input type="text" name="location" id="input-un" placeholder="0.246 32.011" />
                          </div>
                      </div>
                    </div>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">                                
                    <div class="row">
                      <label class="col-sm-2 col-form-label" for="input-st"> Status </label>
                      <div class="col-sm-7">
                          <div class="form-control">
                              <input class="" input type="radio" name="status" id="input-st" value="Active" /><label for="input-st">Active</label>
                              <input class="" input type="radio" name="status" id="input-st1" value="Busy" /><label for="input-st1">Busy</label>
                              <input class="" input type="radio" name="status" id="input-st2" value="Pending" /><label for="input-st2">Pending</label>
                              <input class="" input type="radio" name="status" id="input-st3" value="Blocked" /><label for="input-st3">Blocked</label>
                          </div>
                      </div>
                    </div>
                </div>
                <div class="card-footer ml-auto mr-auto">
                    <button type="submit" class="btn btn-success">SUBMIT</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
