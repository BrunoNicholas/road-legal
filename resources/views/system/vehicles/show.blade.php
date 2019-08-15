@extends('layouts.site')
@section('title') Vehicle Details @endsection

@section('styles')  @endsection
@section('page_name') View Vehicle Details | {{ config('app.name') }} @endsection
@section('content')
<div class="row">
  	<div class="col-md-12">
    	<div class="card">
    		<div class="card-header card-header-success card-header-icon">
      			<div class="card-icon"> <i class="material-icons">location_searching</i> </div>
      			<h4 class="card-title"> Vehicle details and validity | {{ Auth::user()->name }} </h4>
    		</div>
    		<div class="card-body background-transparent">
    			<div class="row">



    			</div>
    		</div>
    	</div>
    </div>
</div>
@endsection
