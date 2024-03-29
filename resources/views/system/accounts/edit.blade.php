@extends('layouts.site')
@section('title') Edit Account Details @endsection

@section('styles')  @endsection
@section('page_name') Edit Account Details | {{ config('app.name') }} @endsection
@section('content')
<div class="block-header not-info">
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('owners.index') }}"> Owners &amp; Drivers</a></li> 
        <li class="breadcrumb-item"><a href="{{ route('accounts.index') }}"> Account </a></li> 
        <li class="breadcrumb-item active" aria-current="page"> Edit Account </li>
    </ol>
    <span class="breadcrumb">Edit Account - {{ config('app.name') }} </span>
</div>
@include('layouts.includes.notifications')
<div class="row">
  	<div class="col-md-9">
        <form method="post" action="{{ route('accounts.update', $account->id) }}" autocomplete="off" class="form-horizontal">
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
                    <h4 class="card-title"> Create New Account </h4>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a href="{{ route('accounts.index') }}" class="btn btn-sm btn-info">Back to list</a>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 col-form-label">Driver (Policy Holder)</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <select class="selectpicker col-sm-12 pl-0 pr-0" name="car_owner_id" id="input-car_owner_id" autofocus>
                                    <option value="{{ $account->car_owner_id }}">{{ $account->car_owner_id ? App\Models\CarOwner::where('id',$account->car_owner_id)->first()->owner_name : '' }} - Select to change</option>
                                    @foreach($owners as $owner)
                                        <option value="{{ $owner->id }}" title="{{ $owner->owner_name . ' - ' . $owner->owner_telephone . '- ' . $owner->status }}">{{ $owner->owner_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 col-form-label"> Insurance Company </label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <select class="selectpicker col-sm-12 pl-0 pr-0" name="company_id" id="input-company_id">
                                    <option value="{{ $account->company_id }}">{{ $account->company_id ? App\Models\Company::where('id',$account->company_id)->first()->company_name : '' }} - Select to change</option>
                                    @foreach($companies as $company)
                                        <option value="{{ $company->id }}" title="{{ $company->company_name . ' - ' . $company->company_email . '- ' . $company->status }}">{{ $company->company_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="car_id" value="{{ $account->car_id }}">
                    <div class="row">
                        <label class="col-sm-3 col-form-label">Account Balance</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" name="balance" id="input-balance" type="number" placeholder="Account Balance (UGX)" value="{{ $account->balance }}" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 col-form-label">Account Debt</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" value="{{ $account->debt }}" name="debt" id="input-debt" type="number" placeholder="Account Debt (UGX)" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 col-form-label" for="input-st"> Account Status </label>
                        <div class="col-sm-7 text-center">
                            <div class="form-control">
                                <input class="" input type="radio" name="status" id="input-st" value="Active" @if ($account->statu == 'Active') checked 
                                @endif />
                                <label for="input-st">Active</label>
                                <input class="" input type="radio" name="status" id="input-st1" value="Inactive" @if ($account->statu == 'Inactive') checked 
                                @endif />
                                <label for="input-st1">Inactive</label>
                                <input class="" input type="radio" name="status" id="input-st2" value="Suspended" @if ($account->statu == 'Suspended') checked 
                                @endif />
                                <label for="input-st2">Suspended</label>
                                <input class="" input type="radio" name="status" id="input-st3" value="Blocked" @if ($account->statu == 'Blocked') checked @endif />
                                <label for="input-st3">Blocked</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ml-auto mr-auto">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="material-icons">done</i> Update Account</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
