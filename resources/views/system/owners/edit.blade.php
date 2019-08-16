@extends('layouts.site')
@section('title') Edit Vehicle Details @endsection

@section('styles')  @endsection
@section('page_name') Edit Vehicle Details | {{ config('app.name') }} @endsection
@section('content')

@include('layouts.includes.notifications')
<div class="row">
  	<div class="col-md-9">
      <form method="post" action="{{ route('owners.update', $owner->id) }}" autocomplete="off" class="form-horizontal">
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
                    <h4 class="card-title"> Edit driver/owner of a vehicle </h4>
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
                              <input class="form-control" name="owner_name"  id="input-owner_name" type="text" placeholder="User Names" value="{{ $owner->owner_name }}" required aria-required="true" autofocus />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-7">
                          <div class="form-group">
                              <input class="form-control" name="owner_email" id="input-owner_email" type="email" placeholder="Company Email" value="{{ $owner->owner_email }}" required />
                              </div>
                          </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label" for="input-un"> Telephone </label>
                      <div class="col-sm-7">
                          <div class="form-group">
                              <input class="form-control" input type="text" value="{{ $owner->owner_telephone }}" name="owner_telephone" id="input-un" placeholder="Use telephone number" />
                          </div>
                      </div>
                    </div>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> 
                    <div class="row">
                        <label class="col-sm-2 col-form-label" for="input-un"> Previous car purchase date </label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" input type="date" name="purchase_date" value="{{ $owner->purchase_date }}" id="input-un" placeholder="Purchase date" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label" for="input-un"> Previous car expiry date </label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" input type="date" value="{{ $owner->expiry_date }}" name="expiry_date" id="input-un" placeholder="Drivers number" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label" for="input-st"> Status </label>
                        <div class="col-sm-7">
                            <div class="form-control">
                                <input class="" input type="radio" name="status" id="input-st" value="Active" @if ($owner->status == 'Active')
                                  checked 
                                @endif/><label for="input-st">Active</label>
                                <input class="" input type="radio" name="status" id="input-st1" value="Busy" @if ($owner->status == 'Busy')
                                  checked 
                                @endif/><label for="input-st1">Busy</label>
                                <input class="" input type="radio" name="status" id="input-st2" value="Pending" @if ($owner->status == 'Pending')
                                  checked 
                                @endif/><label for="input-st2">Pending</label>
                                <input class="" input type="radio" name="status" id="input-st3" value="Blocked" @if ($owner->status == 'Blocked')
                                  checked 
                                @endif/><label for="input-st3">Blocked</label>
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
