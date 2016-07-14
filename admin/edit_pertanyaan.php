<?php
  $getID = $_GET["id"];
  $sql="select * from tbl_pertanyaan where id_pertanyaan='$getID' ";
  $q=mysql_query($sql);
  $d=mysql_fetch_array($q);
  $id_tanya=$d["id_pertanyaan"];
  $id_kriteria=$d["id_kriteria"];
  $pertanyaan=$d["pertanyaan"];
  
?>

        <h2 class="content-header-title">Edit Pertanyaan</h2></br>

  <form class="form-horizontal" role="form" method="POST" action="">
        <div class="form-group">
        <label class="col-md-2">Jenis Kriteria</label>
            <div class="col-md-4">
            <input name="id_kriteria" type="text" value="<?php echo $id_kriteria ?>" class="form-control" readonly="readonly">
            </div> </div>
            
        <div class="form-group">
        <label class="col-md-2">Pertanyaan</label>
            <div class="col-md-4">
           <textarea cols="34" rows="4" name="pertanyaan"><?php echo $pertanyaan ?></textarea>
            </div> </div>
        </br>
          <div class="col-md-2"></div>
			<div class="form-group">&nbsp;
                <button type="submit" class="btn btn-sm btn-success">Ubah Pertanyaan</button>
                <a href="?menu=pertanyaan"><button type="button" class="btn btn-sm btn-tertiary">Batal</button></a>
              </div>
    </fieldset>
  </form>
   
<!-- PROSES SIMPAN -->
<?php // simpan
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $edpertanyaan = $_POST['pertanyaan'];
	

      $sqlsimpan = "UPDATE tbl_pertanyaan SET
                    id_pertanyaan = '$id_tanya',
					pertanyaan = '$edpertanyaan',
					id_kriteria = '$id_kriteria'
					WHERE  id_pertanyaan = '$getID'";
      mysql_query($sqlsimpan)
      or die ("Gagal Perintah SQL". mysql_error());
      echo "<script>alert('Data Pertanyaan Berhasil Diubah ');document.location.href='?menu=pertanyaan';</script>";
  }
?>

