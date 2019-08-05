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
@section('content')
<div class="row">
  	<div class="col-md-12">
    	<div class="card">
    		<div class="card-header card-header-success card-header-icon">
      			<div class="card-icon"> <i class="material-icons">home</i> </div>
      			<h4 class="card-title"> {{ Auth::user()->name }} | {{ App\Models\Role::where('name',Auth::user()->role)->first()->display_name }} <small> - List of available land sold all over the country!</small> </h4>
    		</div>
    		<div class="card-body background-transparent" style="padding: 0px;">
    			<div class="row">
    				<div class="col-md-8">
    					<div id="map" style="width: 100%; height: 400px"></div>
    				</div>
    				<div class="col-md-4">
    					<div class="row">
                            <div class="col-md-12">
                                <p>Land sold: Kampala, Uganda (GPS - [0.347596, 32.582520])</p>
                            </div>
                            <div class="col-md-12">
                                <p>Land sold: Soroti, Uganda (GPS - [1.628504, 32.239380])</p>
                            </div>
                            <div class="col-md-12">
                                <p>Land sold: Kabeeramaido, Uganda (GPS - [1.573594, 33.530273])</p>
                            </div>
                            <div class="col-md-12">
                                <p>Land sold: Mbarara, Uganda (GPS - [0.140076, 31.008911])</p>
                            </div>
    						<div class="col-md-12">
    							
    						</div>
    						<div class="col-md-12">
    							
    						</div>
    						<div class="col-md-12">
    							
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

        L.marker([0.347596,32.582520]).bindPopup('Kampala').addTo(cities),
        L.marker([1.628504,32.239380]).bindPopup('Owned land').addTo(cities),
        L.marker([1.573594,33.530273]).bindPopup('Owned land').addTo(cities),
        L.marker([0.140076,31.008911]).bindPopup('Owned land').addTo(cities);

		var mbAttr = 'Map data &copy; {{ config('app.name') }}, ' +
				'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a> ',
			mbUrl = 'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';
		var grayscale   = L.tileLayer(mbUrl, {id: 'mapbox.light', attribution: mbAttr}),
			streets  = L.tileLayer(mbUrl, {id: 'mapbox.streets',   attribution: mbAttr});
		var map = L.map('map', {
			center: [0.347596, 32.582520],
			zoom: 6,
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