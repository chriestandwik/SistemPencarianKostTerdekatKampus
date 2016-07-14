<?php
include"koneksi.php";
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
        });
        
        </script>
        <h2 class="content-header-title">Tambah Kabupaten</h2></br>
     
  		<form class="form-horizontal" role="form" method="POST" action="">
        <div class="form-group">
        <input name="idkab" type="hidden" value="<?php echo $urut ?>">
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
                  <input type="text" name="propinsi" id="propinsi">
                  </div> </div>

            
        <div class="form-group">
        <label class="col-md-2">Nama Kabupaten</label>
            <div class="col-md-4">
           <input name="namakab" type="text" value="" class="form-control" required="required">
            </div> </div>
        </br>
          <div class="col-md-2"></div>
			<div class="form-group">&nbsp;
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="?menu=datakabupaten"><button type="button" class="btn btn-tertiary">Batal</button></a>
              </div>
    </fieldset>
  </form>
 
<!-- PROSES SIMPAN -->
<?php // simpan
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $id_kabupaten = $_POST['idkab'];
	$namaprov = $_POST['provinsi'];
	$namakab = $_POST['namakab'];

      $sqlsimpan = "INSERT INTO tbl_kabupaten SET
	  				id = '$id_kabupaten',
					id_provinsi = '$namaprov',
                    nama = '$namakab'";
					
      mysql_query($sqlsimpan)
      or die ("Gagal Perintah SQL". mysql_error());
      echo "<script>alert('Data Provinsi Berhasil Ditambahkan ');document.location.href='?menu=datakabupaten';</script>";
  }
?>

