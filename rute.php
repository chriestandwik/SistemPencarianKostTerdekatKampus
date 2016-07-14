<h4>Rute Wisata </h4>
			<hr>
<style type="text/css">
  #map {
    width: 100%;
    height: 400px;
    margin-top: 10px;
  }

#directionsPanel {
    float: none;
    width: 100%;
    height: 400px;
    overflow: auto;
  }
</style>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>
  var directionsDisplay, map;
  function calculateRoute(from, to) {
    // Center initialized to Lafayette IN
    var travelMode = $('input[name="travelMode"]:checked').val();
    var myOptions = {
      zoom: 10,
      center: new google.maps.LatLng(-2.401183, 116.543652),
      mapTypeId: google.maps.MapTypeId.ROADMAP,
    };
    var panel = document.getElementById("directionsPanel");
    // Draw the map
    var mapObject = new google.maps.Map(document.getElementById("map"), myOptions);

    var directionsService = new google.maps.DirectionsService();
    var directionsRequest = {
      origin: from,
      destination: to,
      travelMode: google.maps.DirectionsTravelMode[travelMode],
      unitSystem: google.maps.UnitSystem.IMPERIAL
    };
    directionsService.route(
      directionsRequest,
      function(response, status)
      {
        if (status == google.maps.DirectionsStatus.OK)
        {
           directionsDisplay = new google.maps.DirectionsRenderer({
            map: mapObject,
            directions: response
          });
        }
        if (panel != null) {
		directionsDisplay.setPanel(panel);
		}
        else
          $("#error").append("Unable to retrieve your route<br />");
      }
    );
  }

  $(document).ready(function() {
    // If the browser supports the Geolocation API
    if (typeof navigator.geolocation == "undefined") {
      $("#error").text("Your browser doesn't support the Geolocation API");
      return;
    }

    $("#from-link, #to-link").click(function(event) {
      event.preventDefault();
      var addressId = this.id.substring(0, this.id.indexOf("-"));

      navigator.geolocation.getCurrentPosition(function(position) {
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({
          "location": new google.maps.LatLng(position.coords.latitude, position.coords.longitude)
        },
        function(results, status) {
          if (status == google.maps.GeocoderStatus.OK)
            $("#" + addressId).val(results[0].formatted_address);
          else
            $("#error").append("Unable to retrieve your address<br />");
        });
      },
      function(positionError){
        $("#error").append("Error: " + positionError.message + "<br />");
      },
      {
        enableHighAccuracy: true,
        timeout: 10 * 1000 // 10 seconds
      });
    });

    $("#calculate-route").submit(function(event) {
      event.preventDefault();
      calculateRoute($("#from").val(), $("#to").val());
    });
  });
  google.maps.event.addDomListener(window, 'load', initialize);

</script>
          <form id="calculate-route" name="calculate-route" action="#" method="get" class="form-inline">
           <div class="form-group">
            <label for="from">Lokasi Awal:</label><br />
            <input type="text" id="from" name="from" required="required" placeholder="Alamat Asal" size="40"  class="form-control input-sm"/>
            <input type="button" id="from-link" href="#" value=" Ambil Lokasi saat ini" class="btn btn-info btn-sm" /></div><br /><br />
          	<div class="form-group">
            <label for="to">Lokasi Tujuan: <?php echo $businessname;?></label><br />
            <input type="text" id="to" name="to" value="<?php echo $address1;?><?php echo $address2;?>" size="40" class="form-control input-sm" />
            <!--<a id="to-link" href="#">Get my position</a> -->
            </div><br /><br />
             <label>Mode Perjalanan</label><br />
           <label><input type="radio" name="travelMode" value="DRIVING" checked /> Berkendara</label><br />
          <label><input type="radio" name="travelMode" value="BICYCLING" /> Bersepeda</label><br />
          <label><input type="radio" name="travelMode" value="TRANSIT" /> Kendaraan Umum</label><br />
          <label><input type="radio" name="travelMode" value="WALKING" /> Berjalan</label><br />
            <input type="submit" value="Tampilkan Rute" class="btn btn-success btn-sm" />
            <input type="reset" class="btn btn-success btn-sm" />
          </form>
          <div id="map"></div>
          <div id="directionsPanel"></div>
          <p id="error"></p>