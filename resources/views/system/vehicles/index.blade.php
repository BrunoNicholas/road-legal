@extends('layouts.site')
@section('title') Vehicles @endsection

@section('styles')  @endsection
@section('page_name') Registered Vehicles | {{ config('app.name') }} @endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon"> <i class="material-icons">location_searching</i> </div>
                <h4 class="card-title"> The vehicles that have registred successfully | {{ Auth::user()->name }} </h4>
        		</div>
        		<div class="card-body background-transparent">
          			<div class="row">



          			</div>
        		</div>
      	</div>
    </div>
</div>
@endsection
