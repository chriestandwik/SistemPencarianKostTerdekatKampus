<?php
  $getID = $_GET["id"];
  $sql="select * from tbl_provinsi where id='$getID' ";
  $q=mysql_query($sql);
  $d=mysql_fetch_array($q);
  $idprovinsi=$d["id"];
  $idpulau=$d["id_pulau"];
  $namaprov=$d["nama"];
  
?>

        <h2 class="content-header-title">Edit Provinsi</h2></br>

  <form class="form-horizontal" role="form" method="POST" action="">
        <div class="form-group">
        <label class="col-md-2">Kepulauan</label>
            <div class="col-md-4">
            <select name="pulau" class="form-control">
            <option>--Pilih Pulau--</option>
            <?php
            //mengambil nama-nama propinsi yang ada di database
            $propinsi = mysql_query("SELECT * FROM tbl_pulau ORDER BY id asc");
            while($p=mysql_fetch_array($propinsi)){
			if(($p[id])== $idpulau) { $status= "selected"; }
			else $status="";
            echo "<option value=\"$p[id]\" $status >$p[nama]</option>\n";
            }
            ?>
            </select>
            </div> </div>
            
        <div class="form-group">
        <label class="col-md-2">Provinsi</label>
            <div class="col-md-4">
            <input name="namaprov" type="text" value="<?php echo $namaprov ?>" class="form-control" required="required">
            </div> </div>
        </br>
          <div class="col-md-2"></div>
			<div class="form-group">&nbsp;
                <button type="submit" class="btn btn-sm btn-success">Ubah Provinsi</button>
                <a href="?menu=dataprovinsi"><button type="button" class="btn btn-sm btn-tertiary">Batal</button></a>
              </div>
    </fieldset>
  </form>
   
<!-- PROSES SIMPAN -->
<?php // simpan
  if($_SERVER['REQUEST_METHOD'] == "POST"){
      $id_provinsi = $_POST['idprov'];
	$namaprovinsi = $_POST['namaprov'];
	$idpulau = $_POST['pulau'];
	

       $sqlsimpan = "UPDATE tbl_provinsi SET
					id_pulau = '$idpulau',
                    nama = '$namaprovinsi' WHERE id = '$getID'";
      mysql_query($sqlsimpan)
      or die ("Gagal Perintah SQL". mysql_error());
      echo "<script>alert('Data Provinsi Berhasil Diubah ');document.location.href='?menu=dataprovinsi';</script>";
  }
?>

