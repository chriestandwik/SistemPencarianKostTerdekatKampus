<?php
$getnip=$_GET["kddosen"];
mysql_connect("localhost","root","");
mysql_select_db("nilai_dosen");
	$sql="select * from tb_dosen where kd_dosen='$getnip'";
	$hasil=mysql_query($sql);
	$d=mysql_fetch_array($hasil);
		$nama=$d["nama_dosen"];
		$nip = $d["kd_dosen"];
		$pangkat= $d["pangkat"];
		$nuptk = $d["nuptk"];
		$namasekolah = $d["nama_sekolah"];
		$alamatsekolah = $d["alamat_sekolah"];
		$tanggal_kerja = $d["tanggal_kerja"];
		$periodepenilaian = $d["periode_penilaian"];
		
require('fpdf.php');
class PDF extends FPDF{
	function Header(){
		$this->Image('logo.png',5,3,-215);
		$this->SetFont('Arial','B',12);
		$this->text(35,8,'PENILAIAN KINERJA DOSEN');
		$this->text(35,15,'UNIVERSITAS KANJURUHAN MALANG');
		$this->setFont('Arial','',9);
		$this->text(35,20,'Jl. S. Supriadi No 48 - Website : www.unikama.ac.id.');
		$this->text(0,24,'_________________________________________________________________________________________________________________________');
		$this->SetFont('Arial','B',16);
		$this->text(0,23,'_________________________________________________________________________________________________________________________');
	}
}

$tgl = date('d M Y');
$pdf = new PDF();
$pdf->Open();
$pdf->addPage();
$pdf->setAutoPageBreak(false);

$pdf->setFont('Arial','B',9);
$pdf->text(8,31,'Nama Dosen ');
$pdf->text(69,31,': '.$nama);
$pdf->text(8,36,'Kode Dosen');
$pdf->text(69,36,': '.$nip);
$pdf->text(8,41,'Tahun Ajaran');
$pdf->text(69,41,': '.$pangkat);

$pdf->setFont('Arial','B',9);
$pdf->text(8,49,'Nilai BKD ');
$pdf->setFont('Arial','',9);
$pdf->text(8,50,'_________ ');
$sskor = mysql_query("SELECT SUM(IF(kd_dosen LIKE '$nip',point_sks,0)) AS total_pendidikan FROM penilaian_bid_pendidikan ");
$dskor=mysql_fetch_array($sskor);
$total_pend = $dskor[total_pendidikan];
$pdf->text(10,55,'> Nilai Akhir Pendidikan');
$pdf->text(69,55,': '.number_format($total_pend,3));
$s3 = mysql_query("SELECT SUM(IF(kd_dosen LIKE '$nip',point_sks,0)) AS total_pengabdian FROM penilaian_bid_pengabdian");
$d3=mysql_fetch_array($s3);
$total_pengabd = $d3[total_pengabdian];
$pdf->text(10,60,'> Nilai Akhir Pengabdian');
$pdf->text(69,60,': '.number_format($total_pengabd,3));
$s2 = mysql_query("SELECT SUM(IF(kd_dosen LIKE '$nip',point_sks,0)) AS total_penelitian FROM penilaian_bid_penelitian ");
$d2=mysql_fetch_array($s2);
$total_peneliti = $d2[total_penelitian];
$pdf->text(10,65,'> Nilai Akhir Penelitian');
$pdf->text(69,65,': '.number_format($total_peneliti,3));
$sp1 = mysql_query("SELECT SUM(IF(kd_dosen LIKE '$nip',point_sks,0)) AS total1 FROM penilaian_bid_penunjang_sivitas");
$dp1=mysql_fetch_array($sp1);

$sp2 = mysql_query("SELECT SUM(IF(kd_dosen LIKE '$nip',point_sks,0)) AS total2 FROM penilaian_bid_penunjang_univ_struk");
$dp2=mysql_fetch_array($sp2);

$sp3 = mysql_query("SELECT SUM(IF(kd_dosen LIKE '$nip',point_sks,0)) AS total3 FROM penilaian_bid_penunjang_univ_nonstruk");
$dp3=mysql_fetch_array($sp3);

$sp4 = mysql_query("SELECT SUM(IF(kd_dosen LIKE '$nip',point_sks,0)) AS total4 FROM penilaian_bid_penunjang_seko_struk");
$dp4=mysql_fetch_array($sp4);

$sp5 = mysql_query("SELECT SUM(IF(kd_dosen LIKE '$nip',point_sks,0)) AS total5 FROM penilaian_bid_penunjang_seko_nonstruk");
$dp5=mysql_fetch_array($sp5);

$sp6 = mysql_query("SELECT SUM(IF(kd_dosen LIKE '$nip',point_sks,0)) AS total6 FROM penilaian_bid_penunjang_poli_struk");
$dp6=mysql_fetch_array($sp6);

$sp7 = mysql_query("SELECT SUM(IF(kd_dosen LIKE '$nip',point_sks,0)) AS total7 FROM penilaian_bid_penunjang_poli_nonstruk");
$dp7=mysql_fetch_array($sp7);

$sp8 = mysql_query("SELECT SUM(IF(kd_dosen LIKE '$nip',point_sks,0)) AS total8 FROM penilaian_bid_penunjang_poli_nonstruk");
$dp8=mysql_fetch_array($sp8);

$total_penunjang = (($dp1[total1])+($dp2[total2])+($dp3[total3])+($dp4[total4])+($dp5[total5])+($dp6[total6])+($dp7[total7])+($dp8[total8]));
$pdf->text(10,70,'> Nilai Akhir Penunjang');
$pdf->text(69,70,': '.number_format($total_penunjang,3));
$spr1 = mysql_query("SELECT SUM(IF(kd_dosen LIKE '$nip',point_sks,0)) AS total_prof1 FROM penilaian_bid_prof_menulis");
$dpr1 = mysql_fetch_array($spr1);

$spr2 = mysql_query("SELECT SUM(IF(kd_dosen LIKE '$nip',point_sks,0)) AS total_prof2 FROM penilaian_bid_prof_membuat");
$dpr2 = mysql_fetch_array($spr2);

$spr3 = mysql_query("SELECT SUM(IF(kd_dosen LIKE '$nip',point_sks,0)) AS total_prof3 FROM penilaian_bid_prof_menyebarluaskan");
$dpr3 = mysql_fetch_array($spr3);

$total_prof = (($dpr1[total_prof1]) + ($dpr2[total_prof2]) + ($dpr3[total_prof3]));
$pdf->text(10,75,'> Nilai Akhir Professor');
$pdf->text(69,75,': '.number_format($total_prof,3));
$pdf->setFont('Arial','B',9);
$pdf->text(8,84,'Nilai DP3 ');
$pdf->setFont('Arial','',9);
$pdf->text(8,85,'_________ ');
$q_tampil=mysql_query("select * from  tb_penilaian_dp3 where kd_dosen='$nip'");
$data=mysql_fetch_array($q_tampil);
$pdf->text(10,90,'> Nilai Kesetiaan');
$pdf->text(69,90,': '.$data[na_kesetiaan]);
$pdf->text(10,95,'> Nilai Prestasi kerja');
$pdf->text(69,95,': '.$data[na_prestasikerja]);
$pdf->text(10,100,'> Nilai Tanggung Jawab');
$pdf->text(69,100,': '.$data[na_tanggungjawab]);
$pdf->text(10,105,'> Nilai Ketaatan');
$pdf->text(69,105,': '.$data[na_ketaatan]);
$pdf->text(10,110,'> Nilai Kejujuran');
$pdf->text(69,110,': '.$data[na_kejujuran]);
$pdf->text(10,115,'> Nilai Kerjasama');
$pdf->text(69,115,': '.$data[na_kerjasama]);
$pdf->text(10,120,'> Nilai Prakarsa');
$pdf->text(69,120,': '.$data[na_prakarsa]);
$pdf->text(10,125,'> Nilai Kepemimpinan');
$pdf->text(69,125,': '.$data[na_kepemimpinan]);
$qna = mysql_query("select * from  tb_penilaian_akhir where kd_dosen='$nip'");
$dna=mysql_fetch_array($qna);
$pdf->setFont('Arial','B',9);
$pdf->text(8,135,'Nilai Akhir BKD ');
$pdf->text(69,135,': '.$dna[na_bkd]);
$pdf->text(8,140,'Nilai Akhir DP3 ');
$pdf->text(69,140,': '.$dna[na_dp3]);
$pdf->text(8,145,'Status ');
$pdf->text(69,145,': '.$dna[status]);


$yi = 41;
$ya = 75;
//$pdf->CELL(40,6,'TGL LAHIR',1,0,'C',1);
//$pdf->CELL(40,6,'ALAMAT',1,0,'C',1);
//$pdf->CELL(27,6,'NOMOR TELP',1,0,'C',1);
$ya = 81;
//$sql = mysql_query("select * from  tbl_penilaian where nip = '$getnip' order by id_kriteria asc");
$i = 1;
$no = 1;
$max = 31;
$row = 6;
//while($data = mysql_fetch_array($sql)){
	//$sql2 = mysql_query("select * from  tbl_kriteria where id_kriteria = '$data[id_kriteria]'");
	//$d2 = mysql_fetch_array($sql2);
$pdf->setXY(8,$ya);
$pdf->setFont('arial','',9);
$ya = $ya+$row;
$no++;
$i++;
$ketua = $data[f_ketuapanitia];
//}
$pdf->output();
?>