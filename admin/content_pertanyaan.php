<h2 class="content-header-title">Daftar Pertanyaan</h2></br>
      <!-- /.content-header -->
      <a href="?menu=tambahpertanyaan"><span class="btn btn-success btn-sm">   Tambah Pertanyaan</span></a></p>
      <div class="table-responsive"> 
	  <table align="center" class="table table-striped table-bordered table-highlight">
     <thead>
      <tr align="center">
        <th width="5%" >No.</th>
        <th width="25%" >Jenis Kriteria</th>
        <th>Pertanyaan</th>
        <th width="20%" >Menu</th>
        </tr>
      </thead>
    <tbody>
<?php  
  $s="select * from `tbl_pertanyaan` order by `id_pertanyaan` asc";
  $q=mysql_query($s);
  $jum=mysql_num_rows($q);
		if($jum > 0){
//--------------------------------------------------------------------------------------------
			$batas   = 10;
			$page = $_GET['page'];
			if(empty($page)){$posawal  = 0;$page = 1;}
			else{$posawal = ($page-1) * $batas;}

			$s2 = $s." LIMIT $posawal,$batas";
			$q2  = mysql_query($s2);
			$no = $posawal+1;
//--------------------------------------------------------------------------------------------									
			while($d=mysql_fetch_array($q2)){
				$idPertanyaan = $d["id_pertanyaan"];							
				$idKriteria = $d["id_kriteria"];
				$pertanyaan=$d["pertanyaan"];
				$skriteria = mysql_query("SELECT * FROM tbl_kriteria WHERE id_kriteria='$idKriteria'");
    			$X=mysql_fetch_array($skriteria);
					$namaKriteria = $X["nama_kriteria"];		
				echo"<tr>
					<td>$no</td>
					<td>$namaKriteria</td>
					<td>$pertanyaan</td>
					<td><center>
					<a href='?menu=editpertanyaan&id=$idPertanyaan'><span class='btn btn-primary btn-sm' >  Ubah</span></a>
					<a href='?menu=pertanyaan&pro=hapus&id=$idPertanyaan' onClick='return confirm(\"Apakah anda yakin untuk menghapus data ini?\")'>				 					<span class='btn btn-danger btn-sm' >  Hapus</span></a>
					</td></center>
				</tr>";  
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='6'><center>DATA PERTANYAAN BELUM TERSEDIA</center></td></tr>";}
?>
</tbody>
</table></div>
<?php 
//Langkah 3: Hitung total data dan page 
$tampil2 = mysql_query("select * from tbl_pertanyaan ");
$jmldata = mysql_num_rows($tampil2);
if($jmldata>0){
$jmlhal  = ceil($jmldata/$batas);
echo "<center>";
	if($page > 1){
		$prev=$page-1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&menu=pertanyaan'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&menu=pertanyaan'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&menu=pertanyaan'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</center>";
	}//if jmldata
else{
$tampil2 = mysql_query("select * from tbl_pertanyaan ");
$jmldata = mysql_num_rows($tampil2);
}
echo "<p align=center>Total <b>$jmldata</b> Data</p> ";
 

?>
<?php	//	menghapus data
	if($_GET["pro"]=="hapus"){
		$idp =$_GET["id"];
		$s="delete from tbl_pertanyaan where id_pertanyaan='$idp' ";
		$delete=mysql_query($s);
		if($delete){
			echo "<script>alert('Data Berhasil Dihapus');document.location.href='?menu=pertanyaan';</script>";
		}
		else{
			echo"<script>alert('Data Gagal Dihapus !');document.location.href='?menu=pertanyaan';</script>";
		}
	}
?>