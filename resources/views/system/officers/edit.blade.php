@extends('layouts.site')
@section('title') Edit Officer Profile @endsection

@section('styles')  @endsection
@section('page_name') Edit Traffic Officer Profile | {{ config('app.name') }} @endsection
@section('content')
<div class="block-header">
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('officers.index') }}"> Traffic Officers </a></li>
        <li class="breadcrumb-item active" aria-current="page"> Edit Officer </li>
    </ol>
    <span class="breadcrumb"> Edit Traffic Officers - {{ config('app.name') }} </span>
</div>
@include('layouts.includes.notifications')
<div class="row">
  	<div class="col-md-12">
    	<div class="card">
    		<div class="card-header card-header-success card-header-icon">
      			<div class="card-icon"> <i class="material-icons">location_searching</i> </div>
      			<h4 class="card-title"> Edit the vehicle details | {{ config('app.name') }} </h4>
    		</div>
    		<div class="card-body background-transparent">
    			<div class="row">



    			</div>
    		</div>
    	</div>
    </div>
</div>
@endsection
