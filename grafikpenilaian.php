<h3 align="center"> </h3>

<div style="size:20%;"><center>
<script language='javascript' src='js/FusionCharts.js'></script>
<?php
  # Include FusionCharts PHP Class
  # Create object for Column 3D chart
  $FC = new FusionCharts("Column3D","800","400");

  # Setting Relative Path of chart swf file.
  $FC->setSwfPath("Charts/");

  # Store chart attributes in a variable
  $strParam="caption= Grafik Objek Wisata Berdasarkan Jumlah Penilaian Pengunjung ; xAxisName=Nama Kriteria ;yAxisName=Nilai;decimalPrecision=3; formatNumberScale=100;";

  # Set chart attributes
  $FC->setChartParams($strParam);
  
 $qw2=mysql_query("select distinct id_objek from tbl_detailpenilaian order by id_objek");
	 	while($dw2=mysql_fetch_array($qw2)){
	  	$idpem2 = $dw2["id_objek"];
				$sobj = mysql_query("SELECT * FROM tbl_objek WHERE id='$idpem2'");
				$dobj=mysql_fetch_array($sobj);
				$idwis = $dobj["id"];
				$namaobjek = $dobj["nama"];
	  					$sskor2 = mysql_query("SELECT SUM(IF(id_objek LIKE '$idpem2',skor,0)) AS totalskor FROM tbl_detailpenilaian ");
						$dskor2=mysql_fetch_array($sskor2);			
						$totalskor2 = round($dskor2["totalskor"],3);				
						//echo"$totalskor2</br>";
						$FC->addChartData("$totalskor2","name=$namaobjek");
	  
	  	}
	  
	  	 # add chart values and category names
 
    # Render Chart
    $FC->renderChart();
  ?>                                
</div></center></br>
<table class='table table-striped table-bordered table-highlight' align="center">
	<tr bgcolor="#CCCCCC">
    <td><strong>Nama Wisata</strong></td>
    <td><strong>Jumlah Penilai</strong></td>
    <td><strong>Skor</strong></td>
    </tr>                              
	<?php
	 
		$qw2=mysql_query("select distinct id_objek from tbl_detailpenilaian order by id_objek");
	 	while($dw2=mysql_fetch_array($qw2)){
	  	$idpem2 = $dw2["id_objek"];
				$sobj = mysql_query("SELECT * FROM tbl_objek WHERE id='$idpem2'");
				$dobj=mysql_fetch_array($sobj);
				$idwis = $dobj["id"];
				$namaobjek = $dobj["nama"];
	  					$sskor2 = mysql_query("SELECT SUM(IF(id_objek LIKE '$idpem2',skor,0)) AS totalskor FROM tbl_detailpenilaian ");
						$dskor2=mysql_fetch_array($sskor2);			
						$totalskor2 = round($dskor2["totalskor"],3);
				$q=mysql_query("SELECT COUNT(id_objek) AS jumlah  FROM tbl_detailpenilaian WHERE id_objek='$idwis'");
                $d=mysql_fetch_array($q);
				$idk = $d["id_objek"];
				$jumlahpenilai = $d["jumlah"];				
						echo"<tr><td>$namaobjek</td>
						<td>$jumlahpenilai Penilai</td>
						<td>$totalskor2</td>
						</tr>";
	  
	  }
    ?>
</table> 