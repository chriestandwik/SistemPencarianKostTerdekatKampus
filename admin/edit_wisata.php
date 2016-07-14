<?php
include "thumb.php";
 $getID = $_GET["id"];
  $sql="select * from tbl_objek where id='$getID' ";
  $q=mysql_query($sql);
  $d=mysql_fetch_array($q);
  $idobj=$d["id"];
  $namawis=$d["nama"];
  $lt = $d["latitude"];
  $lg = $d["longitude"];
  $almt = $d["alamat"];
  $deskrp = $d["deskripsi"];
?>
<script type="text/javascript" src="../js/jquery_cbbox.js"></script>
		  <script type="text/javascript">
          var htmlobjek;
          $(document).ready(function(){
            //apabila terjadi event onchange terhadap object <select id=propinsi>
            $("#pulau").change(function(){
              var pulau = $("#pulau").val();
              $.ajax({
                  url: "ambilpulau.php",
                  data: "pulau="+pulau,
                  cache: false,
                  success: function(msg){
                      //jika data sukses diambil dari server kita tampilkan
                      //di <select id=kota>
                      $("#provinsi").html(msg);
                  }
              });
            });
            $("#provinsi").change(function(){
              var provinsi = $("#provinsi").val();
              $.ajax({
                  url: "ambilprovinsi.php",
                  data: "provinsi="+provinsi,
                  cache: false,
                  success: function(msg){
                      $("#kabupaten").html(msg);
                  }
              });
            });
          });
          
          </script>
      <h2 class="content-header-title">Edit Objek Wisata</h2></br>
      <form class="form-horizontal" enctype='multipart/form-data' method="POST" >
<div class="form-group">
      <label class="col-md-2">Lokasi awal</label>
    <div class="col-md-4">
<input id="geocomplete" type="text" placeholder="Masukkan alamat anda disini dan klik simpan" class="form-control block" value="" required="required" />
	  </div></div>
		 <fieldset>
            
        <div class="form-group">
        <label class="col-md-2">Latitude</label>
            <div class="col-md-4">
            <input name="lat" type="text" value="<?php echo $lt ?>" class="form-control" required="required" readonly="readonly">
            </div></div>
            
        <div class="form-group">
        <label  class="col-md-2">Longitude</label>
            <div class="col-md-4">
            <input name="lng" type="text" value="<?php echo $lg ?>"  class="form-control" required="required" readonly="readonly">
            </div></div>
            
       	<div class="form-group">     
        <label class="col-md-2">Alamat lengkap</label>
        	<div class="col-md-4">
           <input name="formatted_address" type="textarea" value="<?php echo $almt ?>" class="form-control" readonly="readonly">
            </div></div>
             <small>Geser Marker pada peta untuk menentukan lokasi yang diinginkan</small>
      <div class="map_canvas" style="height:300px;border:1px solid green;"></div></p><a id="reset" href="#" style="display:none;">Reset Marker</a></br>
    <h3> Deskripsi Wisata </h3>
    <hr />
 	 <div class="form-group">
        <label class="col-md-2">Nama Wisata</label>
            <div class="col-md-4">
            <input name="name" type="text" value="<?php echo $namawis ?>" class="form-control">
            </div> </div>
            
       <div class="form-group">
        <label class="col-md-2">Kepulauan</label>
            <div class="col-md-4">
            <select name="pulau" id="pulau" class="form-control">
            <option>--Pilih Pulau--</option>
            <?php
            //mengambil nama-nama propinsi yang ada di database
            $pulau = mysql_query("SELECT * FROM tbl_pulau ORDER BY id asc");
            while($p=mysql_fetch_array($pulau)){
           	echo "<option value=\"$p[id]\">$p[nama]</option>\n";
            }
            ?>
            </select>
            </div> </div>
            
                   <div class="form-group">
                  <label class="col-md-2">Provinsi</label>
                  <div class="col-md-4">
                  <select name="provinsi" id="provinsi" class="form-control">
                  <option>--Pilih Provinsi--</option>
                  </select>
                  </div> </div>
                  
                  <div class="form-group">
                  <label class="col-md-2">Kabupaten</label>
                  <div class="col-md-4">
                  <select name="kabupaten" id="kabupaten" class="form-control">
                  <option>--Pilih Kabupaten--</option>
                  </select>
                  </div> </div>
                  
                   <div class="form-group">
        <label class="col-md-2">Gambar Wisata</label>
            <div class="col-md-4">
            <input type='file' name='F1'>
            </div> </div>

        
        <div class="form-group">    
        <label class="col-md-2">Deskripsi</label>
        <div class="col-md-4">
        <textarea  class="form-control" rows="3" name="deskrip"><?php echo $deskrp ?></textarea>
        </div></div>
        
        
 			</br><label class="col-md-2"></label>
			<div class="form-group col-md-4">
                &nbsp;<button type="submit" class="btn btn-success">Ubah Data</button>
                <a href="?menu=lokasiwisata"><button type="button" class="btn btn-tertiary">Batal</button></a>
              </div>
              </fieldset>
      </form>
    
	  <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    
    <script src="../../js/jquery.geocomplete.js"></script>
    
    <script>
      $(function(){
        $("#geocomplete").geocomplete({
          map: ".map_canvas",
          details: "form ",
          markerOptions: {
            draggable: true
          }
        });
        
        $("#geocomplete").bind("geocode:dragged", function(event, latLng){
          $("input[name=lat]").val(latLng.lat());
          $("input[name=lng]").val(latLng.lng());
          $("#reset").show();
        });
        
        
        $("#reset").click(function(){
          $("#geocomplete").geocomplete("resetMarker");
          $("#reset").hide();
          return false;
        });
        
        $("#find").click(function(){
          $("#geocomplete").trigger("geocode");
        }).click();
      });
    </script>
    <?php // simpan
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $idobj = $urut;
	$namaobj = $_POST['name'];
	$lat = $_POST['lat'];
    $long = $_POST['lng'];
	$alamat = $_POST['formatted_address'];
	$id_prov = $_POST['provinsi'];
    $id_kab = $_POST['kabupaten'];
	$deskrip = $_POST['deskrip'];
	$F1Name     = $_FILES['F1']['name'];
	
	Upload($F1Name);
  
    $sqlsimpan = "UPDATE tbl_objek SET
                    id_provinsi = '$id_prov',
					id_kabupaten = '$id_kab',
					nama = '$namaobj',
					alamat = '$alamat',
					latitude = '$lat',
					longitude = '$long',
					sampul = '$F1Name',
					deskripsi = '$deskrip' where id = '$getID'";
      mysql_query($sqlsimpan)
      or die ("Gagal Perintah SQL". mysql_error());
      echo "<script>alert('Data Wisata Berhasil Diubah ');document.location.href='?menu=lokasiwisata';</script>";
  }
?>



