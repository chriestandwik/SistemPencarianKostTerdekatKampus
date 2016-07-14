<?php
mysql_connect("localhost","root","");
mysql_select_db("indowisata");
$kota = $_GET['provinsi'];
$kec = mysql_query("SELECT * FROM tbl_kabupaten WHERE id_provinsi='$kota'");
echo "<option>-- Pilih Kecamatan --</option>";
while($k = mysql_fetch_array($kec)){
    echo "<option value=\"".$k['id']."\">".$k['nama']."</option>\n";
}
?>