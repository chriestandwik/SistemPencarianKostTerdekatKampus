
<?php
	
	$server="localhost";
	$pmkai="root";
	$passwd="123456";
	$db="indowisata";  
	
	$id_mysql=mysql_connect($server,$pmkai,$passwd);
	if (! $id_mysql){
		die("Tak dapat melakukan koneksi ke server MySQL");
	}
	
	$db_master=mysql_select_db($db,$id_mysql);
	if (! $db_master){
		die("Tak dapat mengakses database $db");
	}	
	
?>