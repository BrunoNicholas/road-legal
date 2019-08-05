@extends('layouts.site')
@section('title') Questions @endsection

@section('styles')  @endsection
@section('page_name') Edit Question | {{ config('app.name') }} @endsection
@section('content')
<div class="row">
  	<div class="col-md-12">
    	<div class="card">
    		<div class="card-header card-header-success card-header-icon">
      			<div class="card-icon"> <i class="material-icons">question_answer</i> </div>
      			<h4 class="card-title"> Edit Question | {{ Auth::user()->name }} </h4>
    		</div>
    		<div class="card-body background-transparent">
    			<div class="row">



    			</div>
    		</div>
    	</div>
    </div>
</div>
@endsection
