@extends('layouts.site')
@section('title') Add Question @endsection

@section('styles')  @endsection
@section('page_name') Ask A Question | {{ config('app.name') }} @endsection
@section('content')
<div class="row">
  	<div class="col-md-12">
    	<div class="card">
    		<div class="card-header card-header-success card-header-icon">
      			<div class="card-icon"> <i class="material-icons">question_answer</i> </div>
      			<h4 class="card-title"> Ask Question | {{ Auth::user()->name }} </h4>
    		</div>
    		<div class="card-body background-transparent">
    			<div class="row">



    			</div>
    		</div>
    	</div>
    </div>
</div>
@endsection
