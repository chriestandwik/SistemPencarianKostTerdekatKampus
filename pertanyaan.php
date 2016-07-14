<?php
$getidTanya = $_GET["kodepertanyaan"];
$getId = $_GET["id"];
$getStatus = $_GET["status"];
$tampildetail = mysql_query("SELECT * FROM tbl_kriteria WHERE id_kriteria='$getidTanya'");
$d=mysql_fetch_array($tampildetail);
$idkrit = $d['id_kriteria'];
$namakrit = $d['nama_kriteria'];
$bobotk = $d['bobot'];
$nama = $_SESSION["1CNAMA"];
?>

                <h3 >Penilaian Kelayakan Wisata </h3>
            </br>
        
		<!--CONTENT PERTANYAAN -->
 		<?php
		$url = "?menu=pertanyaan&kodepertanyaan=$getidTanya&status=1";
		echo "<h4><b>$namakrit Objek Wisata</b></h4>";
		   echo"
		   <div class='well'>
		   <form id=\"validate-enhanced\" class=\"form parsley-form\" action=\"".$_SERVER['PHP_SELF']."".$url."\" method=\"post\">";
		  $s="select * from `tbl_pertanyaan` where `id_kriteria` = '$getidTanya' ";
		  $q=mysql_query($s);
		  $jum=mysql_num_rows($q);
				if($jum > 0){
//--------------------------------------------------------------------------------------------
			$batas   = $jum;
			$posawal  = 0;
			//$page = $_GET['page'];
			//if(empty($page)){$posawal  = 0;$page = 1;}
			//else{$posawal = ($page-1) * $batas;}

			$s2 = $s." LIMIT $posawal,$batas";
			$q2  = mysql_query($s2);
			$no = $posawal+1;

//--------------------------------------------------------------------------------------------									
			while($d=mysql_fetch_array($q2)){
				$IDPertanyaan = $d["id_pertanyaan"];
				$IDKriteria = $d["id_kriteria"];							
				$pertanyaan=$d["pertanyaan"];
						$skriteria = mysql_query("SELECT * FROM tbl_kriteria WHERE id_kriteria='$IDKriteria'");
    					$X=mysql_fetch_array($skriteria);
						$namaKriteria = $X["nama_kriteria"];
						
				echo" 
				<table border='0'>
				<tr>
				<td height='34'  colspan'5' valign='bottom'><b>$no. $pertanyaan</b></br></br></td>	
				</tr></table>
				<table>
				 <tr>
				 	<td width='25'></td>
					<td width='155'><input type='radio' name='radio".$getidTanya."-".$no."' id='r1".$IDPertanyaan."' value='5' 
					class='icheck-input' data-required='true'  required /> Sangat Setuju</td>
					<td width='124'><input type='radio' name='radio".$getidTanya."-".$no."' id='r2".$IDPertanyaan."' value='4'
					 class='icheck-input' data-required='true' required /> Setuju</td>
					<td width='110'><input type='radio' name='radio".$getidTanya."-".$no."' id='r3".$IDPertanyaan."' value='3'
					class='icheck-input' data-required='true' required /> Ragu</td>
					<td width='145'><input type='radio' name='radio".$getidTanya."-".$no."' id='r4".$IDPertanyaan."' value='2' 
					class='icheck-input' data-required='true' required /> Tidak Setuju</td>
					<td width='195'><input type='radio' name='radio".$getidTanya."-".$no."' id='r5".$IDPertanyaan."' value='1' 
					class='icheck-input' data-required='true' required /> Sangat Tidak Setuju</td>
				 </tr></table><hr color='#333333'>
				</p>";
				$no++; 
				}
			}//while
			else{echo"<tr><td colspan='6'><center>DATA PERTANYAAN BELUM TERSEDIA</center></td></tr>";}
			$idtanyaPtng=substr($IDPertanyaan,3);
			//if($idtanyaPtng>9){$idtanyaPtng=substr($IDPertanyaan,0,-2);}
			//else if($a>99){$idtanyaPtng=substr($IDPertanyaan,0,-3);}
			echo "<input type='submit' name='SubmitJawaban' value='Submit Jawaban' class='btn btn-success' /></form></br>";
		if(isset($_POST['SubmitJawaban'])){
			//$idtanyaPtng=substr($IDPertanyaan,0,-1);
		$pemisah = "-";
		$total = 0;
		for($a=1; $a<=$jum; $a++){
		//$indexTanya=substr($IDPertanyaan,-3);
		//if($a>9){$idtanyaPtng=substr($IDPertanyaan,0,-2);}
			//else if($a>99){$idtanyaPtng=substr($IDPertanyaan,0,-3);}
			//else{$idtanyaPtng=substr($IDPertanyaan,0,-1);}
		if(isset($_POST['radio'.$getidTanya.$pemisah.$a])){
		$cur = $_POST['radio'.$getidTanya.$pemisah.$a];
		
		//echo "Nilai Pertanyaan ".$a."  =  ".$cur." Point</br>";
		 $total += $cur;
		}
		}
		$nilaiMaks = $jum*5;
		$totalskor = ($total/$nilaiMaks)*$bobotk;
		$_SESSION["total".$getidTanya.""]=$totalskor;
		$trimtanya = substr($getidTanya,3);
		if($getStatus=1){
			$sql="select * from `tbl_kriteria`";
			$hasil=mysql_query($sql);
			$jumlahkriteria=mysql_num_rows($hasil);
			$next = $trimtanya + 1;
			if($next > $jumlahkriteria){
			echo "<script>alert('Semua penilaian telah terjawab, Terima Kasih !');
			document.location.href='?menu=skorkelayakan';</script>";
			}
			echo "<script>document.location.href='?menu=pertanyaan&kodepertanyaan=K00".$next."';</script>";
		}
		//echo "Total: ".$total;
		}
		
		echo"  </div>";
?>
        </div>