@extends('layouts.site')
@section('title') Home @endsection

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" 
    	integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" 
    	crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" 
    	integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" 
    	crossorigin=""></script>
@endsection
@section('page_name') Home @endsection
<?php $remove[] = "'"; $remove[] = '"'; $remove[] = "-";?>
@section('content')
<div class="row">
  	<div class="col-md-12">
    	<div class="card">
    		<div class="card-header card-header-success card-header-icon">
      			<div class="card-icon"> <i class="material-icons">home</i> </div>
      			<h4 class="card-title"> {{ Auth::user()->name }} ({{ App\Models\Role::where('name',Auth::user()->role)->first()->display_name }}) <small> - List of insurance companies registered!</small> </h4>
    		</div>
    		<div class="card-body background-transparent" style="padding: 0px;">
    			<div class="row">
    				<div class="col-md-8">
    					<div id="map" style="width: 100%; height: 400px"></div>
    				</div>
    				<div class="col-md-4">
                        <div class="row text-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="">Companies</div><hr>
                                        <span>Active: {{ App\Models\Company::where('status','Active')->get()->count() }}</span>
                                        <span>Total: {{ App\Models\Company::all()->count() }}</span> - <a href="{{ route('companies.index') }}"><button class="btn btn-primary btn-sm">Details</button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="">Policy Holders</div><hr>
                                        <span>Active: {{ App\Models\CarOwner::where('status','Active')->get()->count() }}</span>
                                        <span>Total: {{ App\Models\CarOwner::all()->count() }}</span> - <a href="{{ route('owners.index') }}"><button class="btn btn-primary btn-sm">Details</button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="">MTP Accounts</div><hr>
                                        <span>Active: {{ App\Models\Car::where('status','Active')->get()->count() }}</span>
                                        <span>Total: {{ App\Models\Car::all()->count() }}</span> - <a href="{{ route('vehicles.index') }}"><button class="btn btn-primary btn-sm">Details</button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="">Traffic Officers</div><hr>
                                        <span>Active: {{ App\Models\Officer::where('status','Active')->get()->count() }}</span>
                                        <span>Total: {{ App\Models\Officer::all()->count() }}</span> - <a href="{{ route('officers.index') }}"><button class="btn btn-primary btn-sm">Details</button></a>
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
@section('scripts')
	<script>
        var cities = L.layerGroup();

        regions = {{ str_replace( $remove, "", $gpsponts) }};

        @for ($i = 0; $i<$ptNum; $i++)
        L.marker(regions[{{ $i }}]).bindPopup('Active Company {{ $i+1 }}').addTo(cities)@if($i<($ptNum-1)),
@else;
@endif
        @endfor

        var mbAttr = 'Map data &copy; {{ config('app.name') }}, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a> ',
            mbUrl = 'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';
        var grayscale   = L.tileLayer(mbUrl, {id: 'mapbox.light', attribution: mbAttr}),
            streets  = L.tileLayer(mbUrl, {id: 'mapbox.streets',   attribution: mbAttr});
        var map = L.map('map', {
            center: [1.735574, 32.662354],
            zoom: 5.5,
            layers: [grayscale, cities]
        });
        var baseLayers = {
            "Grayscale": grayscale,
            "Streets": streets
        };
        var overlays = {
            "Cities": cities
        };
        L.control.layers(baseLayers, overlays).addTo(map);
    </script> 
@endsection