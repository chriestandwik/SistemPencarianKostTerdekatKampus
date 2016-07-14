 <div class="content">
         <h3>Lokasi awal</h3>
        </br>
  <form class="form-horizontal" role="form" method="post" action="">
     <div class="form-group">
      <label class="col-md-2">Lokasi awal</label>
    <div class="col-md-4">
<input id="geocomplete" type="text" placeholder="Masukkan alamat anda disini dan klik simpan" class="form-control block" value="" required="required" />
	  </div></div>
		 <fieldset>
            
        <div class="form-group">
        <label class="col-md-2">Latitude</label>
            <div class="col-md-4">
            <input name="lat" type="text" value="" class="form-control" required="required" readonly="readonly" >
            </div></div>
            
        <div class="form-group">
        <label  class="col-md-2">Longitude</label>
            <div class="col-md-4">
            <input name="lng" type="text" value=""  class="form-control" required="required" readonly="readonly">
            </div></div>
            
       	<div class="form-group">     
        <label class="col-md-2">Alamat lengkap</label>
        	<div class="col-md-4">
           <input name="formatted_address" type="textarea" value="" class="form-control" readonly="readonly">
            </div></div>
            
        <div class="form-group">     
        <label class="col-md-2">Radius</label>
        	<div class="col-md-4">
           <input name="radius" type="text" value="" class="form-control" >
            </div></div>
        
        </br>
            <div class="col-md-2"></div>
			<div class="form-group">&nbsp;
                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="reset" class="btn btn-tertiary">Reset</button>
                </div>
      </fieldset>
  </form>
  </div>
  <!-- Auto increment id -->
      <!-- PROSES SIMPAN -->
	<?php // simpan
      if($_SERVER['REQUEST_METHOD'] == "POST"){

        $latitude 	= $_POST['lat'];
        $longitude 	= $_POST['lng'];
		 $radius 	= $_POST['radius'];
		echo "<script>document.location.href='?menu=haversine&lat=$latitude&long=$longitude&radius=$radius';</script>";
      }
    ?>


    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="../../js/jquery.geocomplete.js"></script>
    <script>
      $(function(){
        $("#geocomplete").geocomplete({
          details: "form",
          types: ["geocode", "establishment"],
		  country: 'id'
        });
      });
    </script>
   