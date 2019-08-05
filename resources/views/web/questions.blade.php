@extends('layouts.auth')

@section('title') Terms &amp; Conditions @endsection
@section('content')
<div class="container text-center">
    <div class="row">
        @include('layouts.includes.web_side')
        <div class="col-md-8">
            <div class="row">
            	<div class="card">
            		<div class="card-header card-header-icon card-header-primary">
            			<h2 class="card-title"> Public Asked QUestions | <a href="{{ url('/') }}" class="btn btn-sm btn-primary"> Back </a> </h2>
            		</div>
                    <div class="card-body background transparent">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-info">
                                    Sorry there are currently no questions made public yet!
                                    <br>
                                    You can subscribe by <a href="{{ route('register') }}">creating an account</a> or by <a href="{{ route('login') }}">logging in</a>
                                </p>

                            </div>
                        </div>
                    </div>

            		




            	</div>
            </div>
        </div>
    </div>
</div>
@endsection