@extends('layouts.site')
@section('title') Edit Vehicle Details @endsection

@section('styles')  @endsection
@section('page_name') Edit Vehicle Details | {{ config('app.name') }} @endsection
@section('content')

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