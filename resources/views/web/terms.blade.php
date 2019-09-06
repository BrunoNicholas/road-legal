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
            			<h2 class="card-title"> User Policy - User Terms | <a href="{{ url('/') }}" class="btn btn-sm btn-primary"> Back </a> </h2>
            		</div>
                    <div class="card-body background transparent text-left">
                    	<ol class="list-group">
							<li class="list-group-item">
								<p>By using {{ config('app.name') }}, you agree to the whole user policy agreement and the user terms when you are fully logged in.</p>
							</li>
							<li class="list-group-item">
								<p>The platform is only for sensitization, all content here is meant to be backed up by the individual providers and should not be meant for campaigns.</p>
							</li>
							<li class="list-group-item">
								<p>A few maintenance fees could be found attached to the content in {{ config('app.name') }}. This is not a place for selling other goods or advertising other companies but only to the information provided</p>
							</li>
							<li class="list-group-item">
								<p>We hold accountability and confidentiality of the users registered with us, other business happening off the platform, we are not responsible.</p>
							</li>
							<li class="list-group-item">
								<p>Cases and other misunderstandings could lead to your account being blocked until you abide by the user policy and terms.</p>
							</li>
						</ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection