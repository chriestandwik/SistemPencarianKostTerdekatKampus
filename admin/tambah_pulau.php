<?php
  $sql="select * from tbl_pulau";
  $query=mysql_query($sql);
  $jumlah=mysql_num_rows($query);
  $urut = $jumlah + 1;
  
		//if($jumlah > 0){
			$s="select * from tbl_pulau order by id desc";
  			$q=mysql_query($s);
			$d=mysql_fetch_array($q);
			$kode=$d["id"];
			$idpulau=$kode+1;
				//if($trim<10){$kodeauto="t0".$trim;}
				//else if($trim>100){$kodeauto="t".$trim;}
			//}
		//else{
			  //if($jumlah<10){$kodeauto="t0".$urut;}
			 // else if($jumlah>=10){$kodeauto="t".$urut;}
			//}
	
?>

        <h2 class="content-header-title">Tambah Pulau</h2></br>

  <form class="form-horizontal" role="form" method="POST" action="">
  
            <input name="idpulau" type="hidden" value="<?php echo $idpulau ?>" class="form-control" readonly="readonly">

            
        <div class="form-group">
        <label class="col-md-2">Nama Pulau</label>
            <div class="col-md-4">
            <input name="namapulau" type="text" value="" class="form-control" required="required">
            </div> </div>
        </br>
          <div class="col-md-2"></div>
			<div class="form-group">&nbsp;
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="?menu=datapulau"><button type="button" class="btn btn-tertiary">Batal</button></a>
              </div>
    </fieldset>
  </form>

<!-- PROSES SIMPAN -->
<?php // simpan
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $id_pulau = $_POST['idpulau'];
	$nama_pulau = $_POST['namapulau'];
	
      $sqlsimpan = "INSERT INTO tbl_pulau SET
	  				id = '$id_pulau',
                    nama = '$nama_pulau'";
      mysql_query($sqlsimpan)
      or die ("Gagal Perintah SQL". mysql_error());
      echo "<script>alert('Data Pulau Berhasil Ditambahkan ');document.location.href='?menu=datapulau';</script>";
  }
?>

