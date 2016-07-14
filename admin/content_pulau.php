
        <h2 class="content-header-title">Daftar Nama Pulau</h2></br>
      <a href="?menu=tambahpulau"><span class="btn btn-success btn-sm">   Tambah Pulau</span></a></p>
	<table align="center" class="table table-striped table-bordered table-highlight">
    <thead>
      <tr align="center">
        <th width="5%"  >No.</th>
        <th >Nama Pulau</th>
        <th width="20%" style="text-align:center;">Menu</th>
        </tr>
    </thead>
   <tbody>
<?php  
  $s="select * from `tbl_pulau` order by `id` asc";
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
				$idpulau = $d["id"];							
				$namapulau=$d["nama"];
						
				echo"<tr>
					<td>$no</td>
					<td>$namapulau</td>
					<td><center>
					<a href='?menu=editpulau&id=$idpulau'><span class='btn btn-primary btn-sm' >  Ubah</span></a>
					<a href='?menu=datapulau&pro=hapus&id=$idpulau' onClick='return confirm(\"Apakah anda yakin untuk menghapus data ini?\")'>				 					<span class='btn btn-danger btn-sm' >  Hapus</span></a>
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
		$s="delete from tbl_pulau where id='$idkrit' ";
		$delete=mysql_query($s);
		if($delete){
			echo "<script>alert('Data Berhasil Dihapus');document.location.href='?menu=datapulau';</script>";
		}
		else{
			echo"<script>alert('Data Gagal Dihapus !');document.location.href='?menu=datapulau';</script>";
		}
	}
?>