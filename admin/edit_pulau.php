<?php
  $getID = $_GET["id"];
  $sql="select * from tbl_pulau where id='$getID' ";
  $q=mysql_query($sql);
  $d=mysql_fetch_array($q);
  $kode=$d["id"];
  $namapulau=$d["nama"];
  
?>
        <h2 class="content-header-title">Edit Pulau</h2></br>
  <form class="form-horizontal" role="form" method="POST" action="">
      
            <input name="idpulau" type="hidden" value="<?php echo $kode ?>" class="form-control" readonly="readonly">
            
        <div class="form-group">
        <label class="col-md-2">Nama Pulau</label>
            <div class="col-md-4">
            <input name="namapulau" type="text" value="<?php echo $namapulau ?>" class="form-control" required="required">
            </div> </div>
        </br>
          <div class="col-md-2"></div>
			<div class="form-group">&nbsp;
                <button type="submit" class="btn btn-sm btn-success">Ubah Pulau</button>
                <a href="?menu=datapulau"><button type="button" class="btn btn-sm btn-tertiary">Batal</button></a>
              </div>
    </fieldset>
  </form>
  
<!-- PROSES SIMPAN -->
<?php // simpan
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $id_pulau = $_POST['idpulau'];
	$nama_pulau = $_POST['namapulau'];
	
      $sqlsimpan = "UPDATE tbl_pulau SET
                    nama = '$nama_pulau'
					WHERE  id = '$id_pulau'";
      mysql_query($sqlsimpan)
      or die ("Gagal Perintah SQL". mysql_error());
      echo "<script>alert('Data Pulau Berhasil Diubah ');document.location.href='?menu=datapulau';</script>";
  }
?>

