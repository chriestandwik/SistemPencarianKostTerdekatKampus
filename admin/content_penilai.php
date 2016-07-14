<div class="container">

  <div class="content">
    <div class="content-container">
      <div class="content-header">
        <h2 class="content-header-title">Daftar Penilai</h2>
      </div> <!-- /.content-header -->
      <a href="?menu=tambahprofesi"><span class="btn btn-success btn-small fa fa-plus">   Tambah Profesi Penilai</span></a></p>
	<table align="center" class="table table-striped table-bordered table-highlight">
     <thead>
      <tr align="center">
        <th width="5%" >No.</th>
        <th width="66%" >Profesi</th>
        <th>Bobot</th>
        <th width="20%" >Menu</th>
        </tr>
      </thead>
    <tbody>
<?php  
  $s="select * from `tbl_profesi` order by `id_profesi` asc";
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
				$idprofesi = $d["id_profesi"];							
				$namaprofesi = $d["nama_profesi"];
				$bobot=$d["bobot"];
						
				echo"<tr>
					<td>$no</td>
					<td>$namaprofesi</td>
					<td>$bobot</td>
					<td><center>
					<a href='?menu=editprofesi&id=$idprofesi'><span class='btn btn-secondary btn-small fa fa-edit' >  Ubah</span></a>
					<a href='?menu=penilai&pro=hapus&id=$idprofesi' onClick='return confirm(\"Apakah anda yakin untuk menghapus data ini?\")'>				 					<span class='btn btn-warning btn-small fa fa-times' >  Hapus</span></a>
					</td></center>
				</tr>";  
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='6'><center>DATA PENGGUNA BELUM TERSEDIA</center></td></tr>";}
?>
</tbody>
</table>
    </div> <!-- /.content-container -->
      
  </div> <!-- /.content -->

</div>
<?php	//	menghapus data
	if($_GET["pro"]=="hapus"){
		$idp =$_GET["id"];
		$s="delete from tbl_profesi where id_profesi='$idp' ";
		$delete=mysql_query($s);
		if($delete){
			echo "<script>alert('Data Berhasil Dihapus');document.location.href='?menu=penilai';</script>";
		}
		else{
			echo"<script>alert('Data Gagal Dihapus !');document.location.href='?menu=penilai';</script>";
		}
	}
?>