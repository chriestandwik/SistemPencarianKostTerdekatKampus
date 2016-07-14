<?php
  $getID = $_GET["id"];
  $sql="select * from tbl_kriteria where id_kriteria='$getID' ";
  $q=mysql_query($sql);
  $d=mysql_fetch_array($q);
  $kode=$d["id_kriteria"];
  $namakriteria=$d["nama_kriteria"];
  $bobot=$d["bobot"];
  
?>
        <h2 class="content-header-title">Edit Kriteria</h2></br>
  <form class="form-horizontal" role="form" method="POST" action="">
        <div class="form-group">
        <label class="col-md-2">ID Kriteria</label>
            <div class="col-md-4">
            <input name="id_kriteria" type="text" value="<?php echo $kode ?>" class="form-control" readonly="readonly">
            </div> </div>
            
        <div class="form-group">
        <label class="col-md-2">Nama Kriteria</label>
            <div class="col-md-4">
            <input name="nama_kriteria" type="text" value="<?php echo $namakriteria ?>" class="form-control" required="required">
            </div> </div>
            
        <div class="form-group">
        <label class="col-md-2">Bobot</label>
            <div class="col-md-4">
            <input name="bobot" type="text" value="<?php echo $bobot ?>" class="form-control" required="required">
            </div> </div>
        </br>
          <div class="col-md-2"></div>
			<div class="form-group">&nbsp;
                <button type="submit" class="btn btn-sm btn-success">Ubah Kriteria</button>
                <a href="?menu=kriteria"><button type="button" class="btn btn-sm btn-tertiary">Batal</button></a>
              </div>
    </fieldset>
  </form>
  
<!-- PROSES SIMPAN -->
<?php // simpan
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $idkriteria = $_POST['id_kriteria'];
	$namakriteria = $_POST['nama_kriteria'];
    $bobot = $_POST['bobot'];
	

      $sqlsimpan = "UPDATE tbl_kriteria SET
                    nama_kriteria = '$namakriteria',
					bobot = '$bobot'
					WHERE  id_kriteria = '$idkriteria'";
      mysql_query($sqlsimpan)
      or die ("Gagal Perintah SQL". mysql_error());
      echo "<script>alert('Data Kriteria Berhasil Diubah ');document.location.href='?menu=kriteria';</script>";
  }
?>

