<?php
  $sql="select * from tbl_provinsi order by id desc ";
  $q=mysql_query($sql);
  $jum=mysql_num_rows($q);
  $d=mysql_fetch_array($q);
  $kode=$d["id"];
  $urut=$jum+1;
?>
        <h2 class="content-header-title">Tambah Provinsi</h2></br>
     
  <form class="form-horizontal" role="form" method="POST" action="">
        <div class="form-group">
         <input name="idprov" type="hidden" value="<?php echo $urut ?>">
        <label class="col-md-2">Kepulauan</label>
            <div class="col-md-4">
            <select name="pulau" class="form-control">
            <option>--Pilih Pulau--</option>
            <?php
            //mengambil nama-nama propinsi yang ada di database
            $propinsi = mysql_query("SELECT * FROM tbl_pulau ORDER BY id asc");
            while($p=mysql_fetch_array($propinsi)){
            echo "<option value=\"$p[id]\">$p[nama]</option>\n";
            }
            ?>
            </select>
            </div> </div>
            
        <div class="form-group">
        <label class="col-md-2">Nama Provinsi</label>
            <div class="col-md-4">
           <input name="namaprov" type="text" value="" class="form-control" required="required">
            </div> </div>
        </br>
          <div class="col-md-2"></div>
			<div class="form-group">&nbsp;
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="?menu=pertanyaan"><button type="button" class="btn btn-tertiary">Batal</button></a>
              </div>
    </fieldset>
  </form>
 
<!-- PROSES SIMPAN -->
<?php // simpan
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $id_provinsi = $_POST['idprov'];
	$namaprovinsi = $_POST['namaprov'];
	$idpulau = $_POST['pulau'];

      $sqlsimpan = "INSERT INTO tbl_provinsi SET
	  				id = '$id_provinsi',
					id_pulau = '$idpulau',
                    nama = '$namaprovinsi'";
      mysql_query($sqlsimpan)
      or die ("Gagal Perintah SQL". mysql_error());
      echo "<script>alert('Data Provinsi Berhasil Ditambahkan ');document.location.href='?menu=dataprovinsi';</script>";
  }
?>

