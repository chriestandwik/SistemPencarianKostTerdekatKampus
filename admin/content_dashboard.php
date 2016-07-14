<?php
 $s="select * from `tbl_user` where `level`='administrator'";
	$q=mysql_query($s);
	$jum=mysql_num_rows($q);
?>
        <h2>Dashboard Administrator</h2>
        <ol class="breadcrumb">
          <li><a href="#">Beranda</a></li>
          <li class="active">Dashboard Administrator</li>
        </ol><!-- /.content-header -->
        
      

