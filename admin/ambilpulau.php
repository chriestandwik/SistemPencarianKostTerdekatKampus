<?php
mysql_connect("localhost","root","");
mysql_select_db("indowisata");
$id_pulau = $_GET['pulau'];
$kota = mysql_query("SELECT * FROM tbl_provinsi WHERE id_pulau='$id_pulau'");
echo "<option>-- Pilih Provinsi --</option>";
while($k = mysql_fetch_array($kota)){
    echo "<option value=\"$k[id]\">$k[nama]</option>\n";
}
?>
