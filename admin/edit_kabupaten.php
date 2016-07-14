<?php
$getid = $_GET["id"];
  $sql="select * from tbl_kabupaten where id='$getid' ";
  $q=mysql_query($sql);
  $jum=mysql_num_rows($q);
  $d=mysql_fetch_array($q);
  $kode=$d["id"];
  $idprov=$d["id_provinsi"];
  		$sql2="select * from tbl_provinsi where id='$idprov' ";
		$q2=mysql_query($sql2);
		$d2=mysql_fetch_array($q2);
		$idpul=$d2["id_pulau"];
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
			 if($p[id]==$idpul){ $select = "selected"; } else $select="";
           	echo "<option value=\"$p[id]\" $select>$p[nama]</option>\n";
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
        <label class="col-md-2">Nama Kabupaten</label>
            <div class="col-md-4">
           <input name="namakab" type="text" value="<?php echo $d[nama] ?>" class="form-control" required="required">
            </div> </div>
        </br>
          <div class="col-md-2"></div>
			<div class="form-group">&nbsp;
                <button type="submit" class="btn btn-success">Ubah Data</button>
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

      $sqlsimpan = "UPDATE tbl_kabupaten SET
					id_provinsi = '$namaprov',
                    nama = '$namakab' where id='$getid'";
					
      mysql_query($sqlsimpan)
      or die ("Gagal Perintah SQL". mysql_error());
      echo "<script>alert('Data Provinsi Berhasil Diubah ');document.location.href='?menu=datakabupaten';</script>";
  }
?>

