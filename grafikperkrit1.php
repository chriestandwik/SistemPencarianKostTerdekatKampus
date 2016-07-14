<form name="tahun" class="form-search">
<p><strong>Pilih Objek Wisata</strong></p>
      <select name="cbTahun" onchange="location=document.tahun.cbTahun.options[document.tahun.cbTahun.selectedIndex].value">
      <?php
	  $getid = $_GET["id"]; 
	  $qtahun=mysql_query("select * from tbl_objek order by id asc");
	  echo"<option value=''>-- Pilih Objek Wisata --</option>";
	  while($d=mysql_fetch_array($qtahun)){
	  ?>
      <option value="?menu=grafperkriteria1&id=<?php echo $d["id"] ?>" 
	  <?php if($getid==$d["id"]) echo "selected";?> >
      <?php echo $d["nama"] ?></option>
      <?php 
	   } 
	  ?>
      </select>
</form>

<div style="size:20%;"><center>
<script language='javascript' src='js/FusionCharts.js'></script>
<?php
  # Include FusionCharts PHP Class
  # Create object for Column 3D chart
  $FC = new FusionCharts("Column2D","800","400");

  # Setting Relative Path of chart swf file.
  $FC->setSwfPath("Charts/");

  # Store chart attributes in a variable
  $strParam="caption= Grafik Objek Wisata Berdasarkan Penilaian Per Kriteria ; xAxisName=Nama Kriteria ;yAxisName=Nilai;decimalPrecision=3; formatNumberScale=100;";

  # Set chart attributes
  $FC->setChartParams($strParam);
  
  $s="select * from `tbl_detailpenilaian` where `id_objek`='$getid'";
  $q=mysql_query($s);
  while($d=mysql_fetch_array($q)){							
	  $skorkrit1 = $d[skor_kriteria1];
	  $skorkrit2 = $d[skor_kriteria2];
	  $skorkrit3 = $d[skor_kriteria3];
	  $skorkrit4 = $d[skor_kriteria4];
	  $skorkrit5 = $d[skor_kriteria5];
	  
  }
	  
	  	 # add chart values and category names
  		  $FC->addChartData("$skorkrit1","name=Nilai Budaya");
		  $FC->addChartData("$skorkrit2","name=Nilai Fisik");
		  $FC->addChartData("$skorkrit3","name=Produk Pariwisata");
		  $FC->addChartData("$skorkrit4","name=Pengalaman");
		  $FC->addChartData("$skorkrit5","name=Akomodasi");

    # Render Chart
    $FC->renderChart();
  ?>                                
</div></center></br>