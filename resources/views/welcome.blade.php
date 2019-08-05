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
                        <p>Are you interested in purchasing or selling legal land in Uganda?</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header card-header-icon card-header-success">
                                        <div class="card-icon"> <i class="material-icons">bookmarks</i> </div>
                                        <h4 class="card-title"> Procedure for Buying </h4>
                                    </div>
                                    <div class="card-body text-left">
                                        <ul type="arrow" style="min-height: 220px; overflow-y: auto;">
                                            <li>Visit the site</li>
                                            <li>Get a professional Lawyer</li>
                                            <li>Meet the original owner</li>
                                            <li>User a professional surveyor</li>
                                            <li>Make payment of Land title</li>
                                            <li>Requirement for transfer</li>
                                            <li>Property evaluation</li>
                                            <li>Stamp duty payment</li>
                                            <li>Registration of transfer</li>
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
                                            <li>National identification details</li>
                                            <li>Land title transfer forms</li>
                                            <li>Sales Agreement</li>
                                            <li>Full consent age (18 and above)</li>
                                            <li>Registration of transfer</li>
                                        </ul>
                                        <div class="text-center">
                                            <a href="https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=1&cad=rja&uact=8&ved=2ahUKEwiV4Kjoz-jjAhVRrxoKHSxBDL4QFjAAegQIARAC&url=https%3A%2F%2Fwww.iser-uganda.org%2Fimages%2Fdownloads%2FHandbook_on_Land-Rights_Interests_and_Acquisition_Processes_in_Uganda.pdf&usg=AOvVaw27dYXZ-kklHDAXwfE5ted_" target="_blank" class="btn btn-rose btn-sm btn-block"><i class="material-icons">link</i> Know your land rights</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <a href="http://mlhud.go.ug/" class="btn btn-block btn-info" target="_blank" title="Go to the Ministry of Lands, Housing and Urban Developement site!">Ministry of Lands</a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="https://www.ulc.go.ug/" class="btn btn-block btn-info" target="_blank" title="Got to the Uganda Land Commission site">Land Commission </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="http://www.nhcc.co.ug/#/landing" target="_blank" title="National Housing Construction Cooperation (NHCC)" class="btn btn-block btn-info">Housing & Construction</a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="http://mlhud.go.ug/department-of-land-registration/" target="_blank" class="btn btn-block btn-info" title="Go to the land title verification site">Title Verification</a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=1&cad=rja&uact=8&ved=2ahUKEwjbmY-n1ujjAhVHZcAKHRltD_8QFjAAegQIARAB&url=http%3A%2F%2Fmlhud.go.ug%2Fdepartment-of-land-registration%2F&usg=AOvVaw0Unm3ktbAlgzL9bxIPX5Rj" class="btn btn-block btn-info" target="_blank" title="Go to Land Registration Body">Land Registration</a>
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