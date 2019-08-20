@extends('layouts.site')
@section('title') Add Officer @endsection

@section('styles')  @endsection
@section('page_name') Add Traffic Officer | {{ config('app.name') }} @endsection
@section('content')
<div class="block-header">
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('officers.index') }}"> Traffic Officers </a></li>
        <li class="breadcrumb-item active" aria-current="page"> Add Officer </li>
    </ol>
    <span class="breadcrumb"> Add Traffic Officers - {{ config('app.name') }} </span>
</div>
@include('layouts.includes.notifications')
<div class="row">
  	<div class="col-md-9">
        <form method="post" action="{{ route('officers.store') }}" autocomplete="off" class="form-horizontal">
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
                    <h4 class="card-title">Add new traffic officer's profile </h4>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a href="{{ route('officers.index') }}" class="btn btn-sm btn-primary">Back to list</a>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 col-form-label">Select From Users</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <select class="selectpicker col-sm-12 pl-0 pr-0" name="user_id" id="input-user_id" autofocus>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" title="{{ $user->name . ' - ' . $user->email . ' - ' . $user->telephone }}">{{ $user->name . ' - ' . $user->status}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-3 col-form-label" for="input-un"> Police ID </label>
                      <div class="col-sm-7">
                          <div class="form-group">
                              <input class="form-control" input type="text" name="police_id" id="input-un" placeholder="Enter officer's Identification" />
                          </div>
                      </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 col-form-label" for="input-st"> Status </label>
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
