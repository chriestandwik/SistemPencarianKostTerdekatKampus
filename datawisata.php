<div class="well"> 
<div class="row">
<?php
$page = $_GET["page"];  
  $s="select * from `tbl_objek` order by `id` asc";
  $q=mysql_query($s);
  $jum=mysql_num_rows($q);
		if($jum > 0){
//--------------------------------------------------------------------------------------------
			$batas   = 6;
			if(empty($page)){$posawal  = 0;$page = 1;}
			else{$posawal = ($page-1) * $batas;}

			$s2 = $s." LIMIT $posawal,$batas";
			$q2  = mysql_query($s2);
			$no = $posawal+1;
//--------------------------------------------------------------------------------------------									
			while($d=mysql_fetch_array($q2)){
				$kodeobj = $d["id"];							
				$username=$d["nama"];
				$namalengkap=$d["alamat"];
				$deskrip=$d["deskripsi"];
				$gambarwisata = $d["sampul"];
				$des = html_entity_decode(substr($deskrip,0,128));
				
				echo "
				<div class='col-lg-4'>
				<div class='panel panel-primary'>
				  <div class='panel-heading'>
					<h3 class='panel-title'>".$username."</h3>
				  </div>
				  	<div class='panel-body'>
					 
						  <div class='thumbnail'><img src='media/600-".$gambarwisata."' style='width: 100%' alt='Gambar Wisata' /></div>
					 
					<div style='padding: 9px 9px 9px 9px;'>
			   <p><small>".strip_tags(html_entity_decode($des))."..</small></p>
			   <a href='?menu=detailwisata&detail=$kodeobj'>Lihat Selengkapnya . . .</a>
			   </div>
			   </div>
			   </div>
			   </div>
				";
				
			//$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='6'><center>DATA wisata BELUM TERSEDIA</center></td></tr>";}
	?>
</div></div>
 <?php 
//Langkah 3: Hitung total data dan page 
$tampil2 = mysql_query("select * from tbl_objek ");
$jmldata = mysql_num_rows($tampil2);
if($jmldata>0){
$jmlhal  = ceil($jmldata/$batas);
echo "<center>";
	if($page > 1){
		$prev=$page-1;
		echo "<a href='$_SERVER[PHP_SELF]?page=$prev&menu=datawisata'><span class='badge badge-success'><i class='icon-step-backward'></i> Prev</span></a> ";
	}
	else{echo "<span class=badge bg-inverse><i class='icon-step-backward'></i> Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&menu=datawisata'>$i</a> ";}
	else{echo " <span class='badge badge-warning'>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<a href='$_SERVER[PHP_SELF]?page=$next&menu=datawisata'><span class='badge badge-success'>Next <i class='icon-step-forward'></i></span></a>";
	}
	else{ echo "<span class='badge bg-label'>Next <i class='icon-step-forward'></i></span>";}
	echo "</center>";
	}//if jmldata
else{
$tampil2 = mysql_query("select * from tbl_informasi ");
$jmldata = mysql_num_rows($tampil2);
}
echo "</br><p align=center>Total <b>$jmldata</b> tempat wisata</p> ";
?>
 <!-- /.row -->      
