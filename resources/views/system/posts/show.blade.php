@extends('layouts.site')
@section('title') View Post @endsection

@section('styles')  @endsection
@section('page_name') View Post Details | {{ config('app.name') }} @endsection
@section('content')
<div class="block-header not-info">
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('companies.index') }}"> Insurance Companies </a></li>
        <li class="breadcrumb-item"><a href="{{ route('posts.index') }}"> Information Posts</a></li>
        <li class="breadcrumb-item active" aria-current="page"> View Post </li>
    </ol>
    <span class="breadcrumb"> View Post - {{ config('app.name') }} </span>
</div>
@include('layouts.includes.notifications')
<div class="row">
  	<div class="col-md-12">
    	<div class="card">
    		<div class="card-header card-header-success card-header-icon">
      			<div class="card-icon"> <i class="material-icons">flag</i> </div>
      			<h4 class="card-title"> View Post Of Information &amp; Comments | {{ config('app.name') }} </h4>
    		</div>
    		<div class="card-body background-transparent">
    			<div class="row">



    			</div>
    		</div>
    	</div>
    </div>
</div>
@endsection
