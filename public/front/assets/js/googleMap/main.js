// global "map" variable
var map;
var marker = false;

function initMap() {
  var lat_input = $('form#createRealty [name="lat"]'),
      lng_input = $('form#createRealty [name="lng"]'),
      address1_input = $('form#createRealty [name="address1"]'),
      input = document.getElementById('pac-input');

  var infowindow = new google.maps.InfoWindow({ 
    size: new google.maps.Size(150,50)
  });

  // A function to create the marker and set up the event window function 
  function createMarker(latlng, name, html) {
      var contentString = html;
      var marker = new google.maps.Marker({
          position: latlng,
          map: map,
          zIndex: Math.round(latlng.lat()*-100000)<<5
      });

      google.maps.event.addListener(marker, 'click', function() {
          infowindow.setContent(contentString); 
          infowindow.open(map,marker);
          });
      google.maps.event.trigger(marker, 'click');    
      return marker;
  }

  // create the map
  var myOptions = {
    zoom: 5,
    center: new google.maps.LatLng(28, 32),
    mapTypeControl: true,
    mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
    navigationControl: true,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }

  map = new google.maps.Map(document.getElementById("map"), myOptions);
  var geocoder = new google.maps.Geocoder();

  var autocomplete = new google.maps.places.Autocomplete(input);
  autocomplete.bindTo('bounds', map);

  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

  var marker = new google.maps.Marker({
    map: map
  });

  marker.addListener('click', function() {
    infowindow.open(map, marker);
  });

  autocomplete.addListener('place_changed', function() {
    infowindow.close();
    var place = autocomplete.getPlace();
    if (!place.geometry) {
      return;
    }

    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17);
    }

    // Set the position of the marker using the place ID and location.
    marker.setPlace({
      placeId: place.place_id,
      location: place.geometry.location
    });
    marker.setVisible(true);

    /*infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
        'Place ID: ' + place.place_id + '<br>' +
        place.formatted_address);*/
    var formatted_address = place.formatted_address.split(',');
    //console.log($.trim(formatted_address.pop()));
    infowindow.setContent("<b>Country</b><br>"+place.formatted_address);
    infowindow.open(map, marker);
  });

  google.maps.event.addListener(map, 'click', function(event) {
    infowindow.close();

    //call function to create marker
    if (marker) {
      marker.setMap(null);
      marker = null;
    }

    geocoder.geocode({
      'latLng': event.latLng
    }, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        if (results[0]) {
          var formatted_address = results[0].formatted_address;

          // Serving create new realty form
          lat_input.val(results[0].geometry.location.lat());
          lng_input.val(results[0].geometry.location.lng());
          address1_input.val(formatted_address);

          marker = createMarker(event.latLng, "name", "<b>Country</b><br>"+results[0].formatted_address);
        }
      }
    });
  });
}

/*
    var map;

      function initMap() {
        var myLatlng = {
          lat: 28, lng: 32
        };

        var infowindow = new google.maps.InfoWindow({ 
          size: new google.maps.Size(150,50)
        });

        map = new google.maps.Map(document.getElementById('map'), {
          center: myLatlng,
          zoom: 5
        });

        var marker = new google.maps.Marker({
          position: {lat: 32, lng: 42},
          map: map,
          title: 'Some realty ad, click to show details'
        });

        var marker = new google.maps.Marker({
          position: {lat: 22, lng: 42},
          map: map,
          title: 'Some realty ad, click to show details'
        });

        map.addListener('center_changed', function() {
          // 3 seconds after the center of the map has changed, pan back to the
          // marker.
          window.setTimeout(function() {
            map.panTo(marker.getPosition());
          }, 3000);
        });

        marker.addListener('click', function() {
          window.location.href = 'realty/1';
        });



        google.maps.event.addListener(map, 'click', function( event ){
          //alert( "Latitude: "+event.latLng.lat()+" "+", longitude: "+event.latLng.lng() ); 
          marker = createMarker(event.latLng, "name", "<b>Location</b><br>"+event.latLng);
        });
      }
*/

/*
    var citylist = [
      ["Algiers","Algeria"],
      ["Gaborone","Botswana"],
      ["Kinshasa","Democratic Republic of the Congo"],
      ["Alexandria","Egypt"],
      ["Hegaz","Obour","Cairo","Egypt"],
      ["Addis Ababa","Ethiopia"],
      ["Accra","Ghana"],
      ["Nairobi","Kenya"],
      ["Casablanca","Morocco"],
      ["Lagos","Nigeria"],
      ["Dakar","Senegal"]
    ];

    var geocoder, map;

    function initMap() {
      geocoder = new google.maps.Geocoder();
      var latlng = new google.maps.LatLng(-0.397, 5.644);

      var options = {
        zoom: 3,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }

      map = new google.maps.Map(document.getElementById("map"), options);
      for (var i = 0; i < 10; i++) {
        var address = citylist[i][0] + ', ' + citylist[i][1];
        codeAddress(address);
      }
    };
    function codeAddress(address) {
      geocoder.geocode({ 'address': address }, function(results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
          map.setCenter(results[0].geometry.location);
          var marker = new google.maps.Marker({
              map: map,
              position: results[0].geometry.location
          });
        } else {
          alert("Geocode unsuccessful");
        }
      });
    };
*/