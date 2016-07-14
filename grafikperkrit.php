<?php

include"FusionCharts/FC_Colors.php";

include"FusionCharts/FusionCharts.php";

echo"<SCRIPT LANGUAGE='Javascript' SRC='js/FusionCharts.js'></SCRIPT>";
   
 $strXML="<graph caption='Grafik Penilaian Wisata Berdasarkan Skor Per Kriteria' yAxisName='Skor Penilaian Per Kriteria' decimalPrecision='3' formatNumberScale='3'>";
 
   
	$kategori="<categories>";
	$data = "<dataset seriesName='Nilai Budaya' color='".getFCColor()."' >";
	$data1 = "<dataset seriesName='Nilai Fisik' color='".getFCColor()."' >";
	$data2 = "<dataset seriesName='Produk Pariwisata' color='".getFCColor()."' >";
	$data3 = "<dataset seriesName='Nilai Edukatif' color='".getFCColor()."' >";
	$data4 = "<dataset seriesName='Akomodasi' color='".getFCColor()."' >";
	
	$sql="select distinct id_objek from tbl_detailpenilaian "; 
	$qr=mysql_query($sql); 
	while($Data=mysql_fetch_array($qr)){
		$idobj = $Data['id_objek'];
		$sobj = mysql_query("SELECT * FROM tbl_objek WHERE id='$idobj'");
				$dobj=mysql_fetch_array($sobj);
				$idwis = $dobj["id"];
				$namaobjek = $dobj["nama"];
					 $sskor = mysql_query("SELECT SUM(skor_kriteria1) AS skor1,
		  							   SUM(skor_kriteria2) AS skor2,
									   SUM(skor_kriteria3) AS skor3,
									   SUM(skor_kriteria4) AS skor4,
									   SUM(skor_kriteria5) AS skor5 FROM tbl_detailpenilaian where id_objek ='$idwis' ");
					$dskor=mysql_fetch_array($sskor);
		
   	$arrData[0][1]="$namaobjek";
   
   	$arrData[0][2]="$dskor[skor1]";
   
   	$arrData[0][3]="$dskor[skor2]";
	
    $arrData[0][4]="$dskor[skor3]";
	
	$arrData[0][5]="$dskor[skor4]";
	
	$arrData[0][6]="$dskor[skor5]";
	
	  
   foreach ($arrData as $arSubData) {
      $kategori .= "<category name='".$arSubData[1]."' />";
      $data .= "<set value='".$arSubData[2] ."' />";
      $data1 .= "<set value='".$arSubData[3] ."' />";
	  $data2 .= "<set value='".$arSubData[4] ."' />";
	  $data3 .= "<set value='".$arSubData[5] ."' />";
	  $data4 .= "<set value='".$arSubData[6] ."' />";
   }
}
$kategori .= "</categories>";

   $data .= "</dataset>";
   $data1 .= "</dataset>";
   $data2 .= "</dataset>";
   $data3 .= "</dataset>";
   $data4 .= "</dataset>";
   $strXML .= $kategori . $data . $data1 . $data2 . $data3 . $data4;
   $strXML .= "</graph>";
   echo renderChart("FusionCharts/FCF_MSColumn3D.swf", "", $strXML, "productSales", 800, 400);

?>