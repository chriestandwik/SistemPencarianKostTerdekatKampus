 <?php 
	  	$getId = $_GET["detail"];
	   	$tampildetail = mysql_query("SELECT * FROM tbl_objek WHERE id='$getId'");
  		$d=mysql_fetch_array($tampildetail);
		$idwisata = $d['id'];
		$namawsiata = $d['nama'];
		$gambarwsiata = $d['sampul'];
		$alamat = $d['alamat'];
		$deskripsi = $d['deskripsi'];
		$lat = $d['latitude'];
		$long = $d['longitude'];
	   ?>
       
                        <h2 class="post-title" align="center"><a href="#"><?php echo "$namawsiata"; ?></a></h2>

                       <p align="center"> <img src="media/600-<?php echo"$gambarwsiata";?>" width="60%" class="thumbnail"></p>
                          <p><?php echo html_entity_decode($deskripsi); ?></p>
                          <p>Alamat :  <?php echo"$alamat"; ?></p>
         <p>Koordinat :  <?php echo"$lat, $long"; ?></p></br></br>
         <p><a href="<?php echo"?menu=kuisioner&id=$idwisata"; ?>">
    	 <span class="btn btn-info btn-small fa fa-bar-chart-o"> Beri Nilai Kelayakan</span> </a></p>

   


         
   
      