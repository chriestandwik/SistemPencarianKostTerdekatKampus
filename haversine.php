<?php
$getlat = $_GET["lat"];
$getlong = $_GET["long"];
$namaLokasi = $_GET["nama"];
$radius = $_GET["radius"];
?>
<h4>Wisata Terdekat</h4> </br>  

<?php
$sql = "SELECT id,nama,
    ( 6371 * ACOS( SIN( RADIANS( latitude ) ) * SIN( RADIANS( $getlat ) ) + COS( RADIANS( longitude - $getlong ) ) * COS( RADIANS( latitude ) ) * COS( RADIANS( $getlat ) ) ) ) AS jarak
    FROM tbl_objek
   HAVING jarak < $radius AND jarak!=0
    ORDER BY jarak ASC
   " ;
 
    $hasil = mysql_query($sql);
	
    if ($hasil > 0)
    {
			$data = mysql_fetch_array($hasil);
				$iddekt = $data[id];
				$dist =round($data['jarak'],3);
				echo"
				<span class='badge badge-success'></li>$data[nama] : $data[jarak] Km</span></br>";

    }
else
{
    echo "Tidak Ada Data";
}

echo "</br></br>";
$sql2 = "SELECT id,nama,
    ( 6371 * ACOS( SIN( RADIANS( latitude ) ) * SIN( RADIANS( $getlat ) ) + COS( RADIANS( longitude - $getlong ) ) * COS( RADIANS( latitude ) ) * COS( RADIANS( $getlat ) ) ) ) AS jarak2
    FROM tbl_objek WHERE id NOT LIKE ('$iddekt')
    HAVING jarak2 < $radius AND jarak2!=0
    ORDER BY jarak2 ASC " ;
    $hasil2 = mysql_query($sql2);
    if ($hasil2 > 0)
    {
		echo "
					    <table class='table table-bordered table-striped'>
						 <tr class='info'>
						  <td>Wisata Terdekat Radius $radius Kilometer</td>
						  <td>Jarak</td>
						</tr>";
			while ($data2 = mysql_fetch_array($hasil2))
			{
				$dist2 =round($data2['jarak2'],3);
				echo"<tr>
				<td>$data2[nama]</td>
				<td>$dist2 Km</td>
				</tr>";
			}
	echo"</table>";
    }
else
{
    echo "Tidak Ada Data";
}
?>

<h4>Alternatif Tempat Wisata Pilihan Pengunjung</h4>
   <table  class="table table-striped table-bordered table-highlight">
      <tr class='warning'>
        <th> Wisata dengan penilaian terbanyak dari pengunjung</th>
        <th>Penilai</th>
        <th>Skor</th>
      </tr>
<?php
                $q=mysql_query("SELECT id_objek, COUNT(id_objek) AS jumlah  FROM tbl_detailpenilaian GROUP BY id_objek ORDER BY jumlah DESC");
                $d=mysql_fetch_array($q);
				$idk = $d["id_objek"];
				$jumlahpenilai = $d["jumlah"];
					$sobj = mysql_query("SELECT * FROM tbl_objek WHERE id='$idk'");
					$dobj=mysql_fetch_array($sobj);
					$idwis = $dobj["id"];
					$namaobjek = $dobj["nama"];
						$sskor = mysql_query("SELECT SUM(IF(id_objek LIKE '$idwis',point_sks,0)) AS totalskor FROM tbl_detailpenilaian ");
						$dskor=mysql_fetch_array($sskor);
						
						$totalskor = round($dskor["totalskor"],3);

                    echo"
					<tr>
					<td>$namaobjek</td>
					<td>$jumlahpenilai Penilai</td>
					<td>$totalskor</td>
					</tr>";
				?>
                </table>
