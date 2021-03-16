<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_us', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->longText('message');
            // $table->integer('user_id')->unsigned();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_us');
    }
}


// // لعرض الخريطة فى لوحة التحكم
// <script>

// 	    function init() {

// 	    	var myLatlng = new google.maps.LatLng({{ $street->lat }},{{ $street->lng }});

// 	    	var lat1 = {{ $street->lat }};

// 	    	var lng1 = {{ $street->lng }};

// 	        var map = new google.maps.Map(document.getElementById('map_canvas'), {
// 	            center: myLatlng,
// 	            zoom: 12
// 	       });

// 	        var marker = new google.maps.Marker({
// 				draggable: true,
// 				position: myLatlng,
// 				map: map,
// 				title: "Your location"
// 			});

// 			google.maps.event.addListener(marker, 'dragend', function (event) {
// 				document.getElementById("latbox").value = this.getPosition().lat();
// 				document.getElementById("lngbox").value = this.getPosition().lng();

// 			});

// 	        var searchBox = new google.maps.places.SearchBox(document.getElementById('pac-input'));

// 	        map.controls[google.maps.ControlPosition.TOP_CENTER].push(document.getElementById('pac-input'));

// 	        google.maps.event.addListener(searchBox, 'places_changed', function() {

// 	            searchBox.set('map', null);

// 	            var places = searchBox.getPlaces();

// 	            var bounds = new google.maps.LatLngBounds();

// 	            var i, place;

// 	            for (i = 0; place = places[i]; i++) {

// 	                (function(place) {

// 	                    var marker = new google.maps.Marker({
// 	                    	draggable: true,
// 	                        position: place.geometry.location
// 	                    });

// 	                    marker.bindTo('map', searchBox, 'map');

// 	                    google.maps.event.addListener(marker, 'map_changed', function() {

// 	                        if (!this.getMap()) {
// 	                            this.unbindAll();
// 	                        }

// 	                        google.maps.event.addListener(marker, 'dragend', function (event) {
// 								document.getElementById("latbox").value = this.getPosition().lat();
// 								document.getElementById("lngbox").value = this.getPosition().lng();

// 							});

// 	                        document.getElementById("latbox").value = this.getPosition().lat();

// 	                        document.getElementById("lngbox").value = this.getPosition().lng();
// 	                    });

// 	                    bounds.extend(place.geometry.location);

// 	                }(place));
// 	            }

// 	            map.fitBounds(bounds);

// 	            searchBox.set('map', map);

// 	            map.setZoom(Math.min(map.getZoom(),12));

// 	        });

// 	        $('#pac-close').on('click', function() {

// 	    		searchBox.set('map', null);

// 	    		document.getElementById('pac-input').value = '';

// 				map.setCenter(myLatlng);

// 				document.getElementById("latbox").value = lat1;

// 				document.getElementById("lngbox").value = lng1;

// 	    	});
// 	    }

// 	    google.maps.event.addDomListener(window, 'load', init);

// 	</script>


//     $streets = Street::where('status', 1)->where('approve_radius', 1)->get();

//     // Point Lat and Long
//     $pointLat = $lat;
//     $pointLng = $lng;

//     $arr = [];

//     foreach ($streets as $street) {

//         $radius = $street->radius * 0.62; // in KM

//         $lng_min = $pointLng - $radius / abs(cos(deg2rad($pointLng)) * 69);
//         $lng_max = $pointLng + $radius / abs(cos(deg2rad($pointLng)) * 69);
//         $lat_min = $pointLat - ($radius / 69);
//         $lat_max = $pointLat + ($radius / 69);

//         if (($lat_min <= $street['lat'] && $street['lat'] <= $lat_max) && ($lng_min <= $street['lng'] && $street['lng'] <= $lng_max)) {

//                 $arr[] = $street->id;

//         }

//     }

   
