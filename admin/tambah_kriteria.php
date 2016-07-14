<?php
  $sql="select * from tbl_kriteria order by id_kriteria desc ";
  $q=mysql_query($sql);
  $jum=mysql_num_rows($q);
  $d=mysql_fetch_array($q);
  $kode=$d["id_kriteria"];
  $urut=substr($kode,-3)+1;
  	if($urut>9){$kodeauto="$kd"."K0".$urut;}
	else if($urut>99){$kodeauto="$kd"."K".$urut;}
	else{$kodeauto="$kd"."K00".$urut;}
?>

        <h2 class="content-header-title">Tambah Kriteria</h2>

  <form class="form-horizontal" role="form" method="POST" action="">
        <div class="form-group">
        <label class="col-md-2">ID Kriteria</label>
            <div class="col-md-4">
            <input name="id_kriteria" type="text" value="<?php echo $kodeauto ?>" class="form-control" readonly="readonly">
            </div> </div>
            
        <div class="form-group">
        <label class="col-md-2">Nama Kriteria</label>
            <div class="col-md-4">
            <input name="nama_kriteria" type="text" value="" class="form-control" required="required">
            </div> </div>
            
        <div class="form-group">
        <label class="col-md-2">Bobot</label>
            <div class="col-md-4">
            <input name="bobot" type="text" value="" class="form-control" required="required">
            </div> </div>
        </br>
          <div class="col-md-2"></div>
			<div class="form-group">&nbsp;
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="?menu=kriteria"><button type="button" class="btn btn-tertiary">Batal</button></a>
              </div>
    </fieldset>
  </form>

<!-- PROSES SIMPAN -->
<?php // simpan
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $idkriteria = $_POST['id_kriteria'];
	$namakriteria = $_POST['nama_kriteria'];
    $bobot = $_POST['bobot'];
	

      $sqlsimpan = "INSERT INTO tbl_kriteria SET
	  				id_kriteria = '$idkriteria',
                    nama_kriteria = '$namakriteria',
					bobot = '$bobot'";
      mysql_query($sqlsimpan)
      or die ("Gagal Perintah SQL". mysql_error());
      echo "<script>alert('Data Kriteria Berhasil Ditambahkan ');document.location.href='?menu=kriteria';</script>";
  }
?>

