<?php
$getnip=$_GET["nip"];
mysql_connect("localhost","root","");
mysql_select_db("indowisata");
		
require('fpdf.php');
class PDF extends FPDF{

}

$tgl = date('d M Y');
$pdf = new PDF();
$pdf->Open();
$pdf->addPage();
$pdf->setAutoPageBreak(false);
$pdf->setFont('Arial','B',12);
$pdf->text(8,15,'Kuisioner Penilaian Objek Wisata ');
$pdf->setFont('Arial','B',9);
$pdf->text(8,31,'Nama Penilai ');
$pdf->text(69,31,': '.$nama);
$pdf->text(8,36,'Alamat');
$pdf->text(69,36,': '.$nip);
$pdf->text(8,41,'Pekerjaan');
$pdf->text(69,41,': '.$pangkat);
$pdf->text(8,46,'Objek Wisata Yang Dinilai');
$pdf->text(69,46,': '.$pangkat);
$yi = 41;
$ya = 49;
$pdf->setFont('Arial','B',9);
$pdf->setFillColor(222,222,222);
$pdf->setXY(6,$ya);
$pdf->CELL(10,6,'No',1,0,'C',1);
$pdf->CELL(65,6,'Nama Dosen',1,0,'C',1);
$pdf->CELL(10,6,'SS',1,0,'C',1);
$pdf->CELL(10,6,'S',1,0,'C',1);
$pdf->CELL(10,6,'R',1,0,'C',1);
$pdf->CELL(10,6,'TS',1,0,'C',1);
$pdf->CELL(10,6,'STS',1,0,'C',1);
$ya = 55;
$q_tampil=mysql_query("select * from  tbl_pertanyaan order by id_pertanyaan asc");
$i = 1;
$no = 1;
$max = 31;
$row = 6;
while($data=mysql_fetch_array($q_tampil)){
$pdf->setXY(6,$ya);
$pdf->setFont('arial','',9);
$pdf->setFillColor(255,255,255);
$pdf->cell(10,6,$no,1,0,'C',1);
$pdf->cell(85,12,$data[pertanyaan],1,0,'L',1);
$pdf->cell(10,6,$data[tahun],1,0,'C',1);
$pdf->cell(10,6,$data[tahun],1,0,'C',1);
$pdf->cell(10,6,$data[tahun],1,0,'C',1);
$pdf->cell(10,6,$data[tahun],1,0,'C',1);
$pdf->cell(10,6,$data[tahun],1,0,'C',1);
$ya = $ya+$row;
$no++;
$i++;
$ketua = $data[f_ketuapanitia];
}

$pdf->output();
?>