@extends('layouts.site')
@section('title') Add Question @endsection

@section('styles')  @endsection
@section('page_name') Ask A Question | {{ config('app.name') }} @endsection
@section('content')
<div class="block-header">
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('companies.index') }}"> Insurance Companies </a></li>
        <li class="breadcrumb-item"><a href="{{ route('questions.index') }}"> Questions </a></li>
        <li class="breadcrumb-item active" aria-current="page"> Add New </li>
    </ol>
    <span class="breadcrumb">New Posts - {{ config('app.name') }} </span>
</div>
@include('layouts.includes.notifications')
<div class="row">
  	<div class="col-md-12">
    	<div class="card">
    		<div class="card-header card-header-success card-header-icon">
      			<div class="card-icon"> <i class="material-icons">question_answer</i> </div>
      			<h4 class="card-title"> Ask Question | {{ config('app.name') }} </h4>
    		</div>
    		<div class="card-body background-transparent">
    			<div class="row">



    			</div>
    		</div>
    	</div>
    </div>
</div>
@endsection
