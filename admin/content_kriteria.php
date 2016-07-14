
        <h2 class="content-header-title">Daftar Kriteria</h2></br>
      <a href="?menu=tambahkriteria"><span class="btn btn-success btn-sm">   Tambah Kriteria</span></a></p>
	<table align="center" class="table table-striped table-bordered table-highlight">
    <thead>
      <tr align="center">
        <th width="5%"  >No.</th>
        <th width="15%"  >ID Kriteria</th>
        <th >Nama Kriteria</th>
        <th >Bobot</th>
        <th width="20%" style="text-align:center;">Menu</th>
        </tr>
    </thead>
   <tbody>
<?php  
  $s="select * from `tbl_kriteria` order by `id_kriteria` asc";
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
				$idkriteria = $d["id_kriteria"];							
				$namakriteria=$d["nama_kriteria"];
				$bobot=$d["bobot"];
						
				echo"<tr>
					<td>$no</td>
					<td>$idkriteria</td>
					<td>$namakriteria</td>
					<td>$bobot</td>
					<td><center>
					<a href='?menu=editkriteria&id=$idkriteria'><span class='btn btn-primary btn-sm' >  Ubah</span></a>
					<a href='?menu=kriteria&pro=hapus&id=$idkriteria' onClick='return confirm(\"Apakah anda yakin untuk menghapus data ini?\")'>				 					<span class='btn btn-danger btn-sm' >  Hapus</span></a>
					</td></center>
				</tr>";  
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='6'><center><B>DATA KRITERIA BELUM TERSEDIA</B></center></td></tr>";}
?>
</tbody>
</table>

<?php	//	menghapus data
	if($_GET["pro"]=="hapus"){
		$idkrit=$_GET["id"];
		$s="delete from tbl_kriteria where id_kriteria='$idkrit' ";
		$delete=mysql_query($s);
		if($delete){
			echo "<script>alert('Data Berhasil Dihapus');document.location.href='?menu=kriteria';</script>";
		}
		else{
			echo"<script>alert('Data Gagal Dihapus !');document.location.href='?menu=kriteria';</script>";
		}
	}
?>