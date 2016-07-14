<?php
        $getId = $_GET["id"];
	   	$tampildetail = mysql_query("SELECT * FROM tbl_objek WHERE id='$getId'");
  		$d=mysql_fetch_array($tampildetail);
		$idwisata = $d['id'];
		$alamat = $d['alamat'];
		$namawsiata = $d['nama'];
		$deskripsi = $d['deskripsi'];
		//$iduser = $_SESSION["1KODELOG"];
		//$nama = $_SESSION["1CNAMA"];
		?>

            <h2 class="content-header-title">Penilaian Kelayakan</h2>

       <!-- /.content-header -->
        <?php
		  $sql="select * from tbl_penilaian order by id_jawaban asc ";
		  $q=mysql_query($sql);
		  $jum=mysql_num_rows($q);
		  $d=mysql_fetch_array($q);
		  $kode=$d["id_jawaban"];
		  $urut=substr($kode,-3)+1;
			if($urut>9){$kodeauto="$kode"."J0".$urut;}
			else if($urut>99){$kodeauto="$kode"."J".$urut;}
			else{$kodeauto="$kode"."J00".$urut;}
		$kodetanya = substr($kodeauto,1);
		$idtanya = "K".$kodetanya;
	    ?>
		<!--CONTENT PERTANYAAN -->
        <?php
		$TampilDeskripsi = html_entity_decode($deskripsi);
		if ($getId == 0){
			echo "<h3 align='center' class='text-danger'>
			<i class='fa fa-warning'>&nbsp;&nbsp;&nbsp;Anda Belum Memilih Objek Wisata</i></h3></p>
			<div align='center'><a href='?menu=datawisata'><p align='center' class='btn btn-success'>Pilih Objek Wisata</p></a></div>
			";
			} 
		else{
			$_SESSION["s_idjawaban"]=$kodeauto;
			$_SESSION["s_idwisata"]=$idwisata;
			echo"
			<table width='1063' border='0'>
			  <tr>
				<td valign='top' width='171' height='35'><small><b>Nama Objek Wisata</b></small></td>
				<td valign='top' width='14'>:</td>
				<td valign='top' width='864'> $namawsiata</td>
			  </tr>
			  <tr>
				<td height='30' valign='top'><b>Lokasi</b></td>
				<td valign='top'>:</td>
				<td valign='top'> $alamat</td>
			  </tr></p>
			  <tr>
				<td height='30' valign='top'><small><b>Deskripsi</b></small></td>
				<td valign='top'>&nbsp;</td>
				<td valign='top'>&nbsp;</td>
			  </tr>
			  <tr>
				<td colspan='3'><div class='well'>$TampilDeskripsi </td>
				</tr>
			</table>
			</div>
        <div align='center'><a href='?menu=pertanyaan&kodepertanyaan=K001'>
        <button class='btn btn-success fa fa-play' type='submit' id='simpanBio' name='simpanBio'>&nbsp; Mulai Penilaian</button></a></div>
			";
			}
		 ?>