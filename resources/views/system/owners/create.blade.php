@extends('layouts.site')
@section('title') Add Vehicles @endsection

@section('styles')  @endsection
@section('page_name') Register Vehicles | {{ config('app.name') }} @endsection
@section('content')
<div class="block-header not-info">
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('owners.index') }}"> Drivers &amp; Owners </a></li>
        {{-- <li class="breadcrumb-item"><a href="{{ route('roles.index') }}"> User Roles</a></li> --}}
        <li class="breadcrumb-item active" aria-current="page"> Owners &amp; Drivers </li>
    </ol>
    <span class="breadcrumb">Vehicle Owners &amp; Drivers - {{ config('app.name') }} </span>
</div>
@include('layouts.includes.notifications')
<div class="row">
  	<div class="col-md-9">
    	<form method="post" action="{{ route('owners.store') }}" autocomplete="off" class="form-horizontal">
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
                    <h4 class="card-title">Add New Owner/Driver </h4>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a href="{{ route('owners.index') }}" class="btn btn-sm btn-primary">Back to list</a>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Driver Names</label>
                        <div class="col-sm-7">
                          <div class="form-group">
                              <input class="form-control" name="owner_name" id="input-owner_name" type="text" placeholder="User Names" value="" required aria-required="true" autofocus />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-7">
                          <div class="form-group">
                              <input class="form-control" name="owner_email" id="input-owner_email" type="email" placeholder="Company Email" value="" required />
                              </div>
                          </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label" for="input-un"> Telephone </label>
                      <div class="col-sm-7">
                          <div class="form-group">
                              <input class="form-control" input type="text" name="owner_telephone" id="input-un" placeholder="Use telephone number" />
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
                    <button type="submit" class="btn btn-success"><i class="material-icons">done</i> SUBMIT</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
