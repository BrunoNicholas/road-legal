@extends('layouts.auth')

@section('title') Welcome @endsection
@section('content')
<div class="container text-center">
    <div class="row">
        @include('layouts.includes.web_side')
        <div class="col-md-8">
            <div class="row">
                <div class="card">
                    <div class="card-header card-header-icon card-header-primary">
                        <h2 class="card-title"> Welcome to {{ config('app.name') }}! </h2>
                    </div>
                    <div class="card-body background-transparent">
                        <p>A mobile traffic third party insurance management system for your vehicle!</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header card-header-icon card-header-success">
                                        <div class="card-icon"> <i class="material-icons">bookmarks</i> </div>
                                        <h4 class="card-title"> Procedure for Buying </h4>
                                    </div>
                                    <div class="card-body text-left">
                                        <ul type="arrow" style="min-height: 220px; overflow-y: auto;">
                                            <li>Get a driving license</li>
                                            <li>Get a good sum of cash</li>
                                            <li>Be legal in the country</li>
                                            <li>Buy yourself a ride</li>
                                        </ul>
                                        <div class="text-center">
                                            <a href="{{ route('more.details') }}" class="btn btn-rose btn-sm btn-block"><i class="material-icons">link</i>MORE</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header card-header-icon card-header-success">
                                        <div class="card-icon"> <i class="material-icons">card_giftcard</i> </div>
                                        <h4 class="card-title"> Requirements For Buying</h4>
                                    </div>
                                    <div class="card-body text-left">
                                        <ul style="min-height: 220px; overflow-y: auto;">
                                            <li>Money in the bank</li>
                                            <li>Driving License</li>
                                            <li>Sales Agreement</li>
                                            <li>Full consent age (18 and above)</li>
                                        </ul>
                                        <div class="text-center">
                                            <a href="https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=1&cad=rja&uact=8&ved=2ahUKEwiV4Kjoz-jjAhVRrxoKHSxBDL4QFjAAegQIARAC&url=https%3A%2F%2Fwww.iser-uganda.org%2Fimages%2Fdownloads%2FHandbook_on_Land-Rights_Interests_and_Acquisition_Processes_in_Uganda.pdf&usg=AOvVaw27dYXZ-kklHDAXwfE5ted_" target="_blank" class="btn btn-rose btn-sm btn-block"><i class="material-icons">link</i> Know your land rights</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection