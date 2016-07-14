<?php
  $sql="select * from tbl_pertanyaan order by id_pertanyaan desc ";
  $q=mysql_query($sql);
  $jum=mysql_num_rows($q);
  $d=mysql_fetch_array($q);
  $kode=$d["id_pertanyaan"];
  $urut=$jum+1;
?>
        <h2 class="content-header-title">Tambah Pertanyaan</h2></br>
     
  <form class="form-horizontal" role="form" method="POST" action="">
        <div class="form-group">
         <input name="id_pertanyaan" type="hidden" value="<?php echo $urut ?>">
        <label class="col-md-2">Kategori Kriteria</label>
            <div class="col-md-4">
            <select name="kriteria" id="kriteria"  class="form-control">
            <option>--Pilih Kategori--</option>
            <?php
            //mengambil nama-nama propinsi yang ada di database
            $propinsi = mysql_query("SELECT * FROM tbl_kriteria ORDER BY id_kriteria asc");
            while($p=mysql_fetch_array($propinsi)){
            echo "<option value=\"$p[id_kriteria]\">$p[nama_kriteria]</option>\n";
            }
            ?>
            </select>
            </div> </div>
            
        <div class="form-group">
        <label class="col-md-2">Pertanyaan</label>
            <div class="col-md-6">
            <textarea id="as-ex-2" name="pertanyaan" class="form-control" rows="3"></textarea>
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
    $IDpertanyaan = $_POST['id_pertanyaan'];
	$pertanyaan = $_POST['pertanyaan'];
	$id_kriteriaCbox = $_POST['kriteria'];
	$prof = substr($id_kriteriaCbox,-4);

      $sqlsimpan = "INSERT INTO tbl_pertanyaan SET
	  				id_pertanyaan = '$IDpertanyaan',
					id_kriteria = '$prof',
                    pertanyaan = '$pertanyaan'";
      mysql_query($sqlsimpan)
      or die ("Gagal Perintah SQL". mysql_error());
      echo "<script>alert('Data pertanyaan Berhasil Ditambahkan ');document.location.href='?menu=pertanyaan';</script>";
  }
?>

