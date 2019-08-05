@extends('layouts.auth')

@section('title') Verify your account! @endsection
@section('content')
    <div class="col-md-9 ml-auto mr-auto mb-1 text-center">
        <h3>Welcome to {{ config('app.name') }}. Please verify your account first!</h3>
    </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
            <div class="text-center">{{ __('Verify Throuhg Your Email Address') }}</div>

            <div class="card-body">
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif

                {{ __('Before proceeding, please check your email for a verification link.') }}
                {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}" class="btn btn-sm btn-success">{{ __('click here to request another') }}</a>.
                <hr>
                <div class="form-group form-animate-text text-center" style="margin-top:40px !important; font-size: 15px;">
                    <a href="{{ route('logout') }}" class="btn btn-sm btn-danger btn-round" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout!</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>
                </div>
            </div>
        </div>
    </div>
@endsection




{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
        </div>
    </div>
</div>
@endsection --}}
