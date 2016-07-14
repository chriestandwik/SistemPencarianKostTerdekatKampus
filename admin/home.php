<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$mnu=$_GET["menu"]; 
include"../config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Indowisata - Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
<link rel="stylesheet" href="../css/style.css" type="text/css"/>
    <!-- Custom styles for this template -->

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body role="document">

    <!-- Fixed navbar -->
     <div class="container">
   
    <!-- Carousel
    ================================================== -->
     <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide">
      <div class="carousel-inner">
        <div class="item active">
          <img src="../img/header.jpg" alt="">
        </div>
      </div>
    </div><!-- /.carousel --><!-- /.carousel -->
     
       <nav class="navbar navbar-default">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                      <li class="<?php if($mnu=="dashboard"){ echo"active";} ?>"><a href="?menu=dashboard">Beranda</a></li>
                      <li class="<?php if($mnu=="lokasiwisata"){ echo"active";} ?>"><a href="?menu=lokasiwisata">Data Wisata</a></li>
                      <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      Data Wilayah <span class="caret"></span></a>
                      <ul class="dropdown-menu" role="menu">
                      <li class="<?php if($mnu=="datapulau"){ echo"active";} ?>"><a href="?menu=datapulau">Data Kepulauan</a></li>
                      <li class="<?php if($mnu=="dataprovinsi"){ echo"active";} ?>"><a href="?menu=dataprovinsi">Data Provinsi</a></li>
                      <li class="<?php if($mnu=="datakabupaten"){ echo"active";} ?>"><a href="?menu=datakabupaten">Data Kabupaten</a></li>
                        </ul>
                      </li>
                     
                      <li class="<?php if($mnu=="kriteria"){ echo"active";} ?>"><a href="?menu=kriteria">Kriteria Kelayakan</a></li>
                      <li class="<?php if($mnu=="pertanyaan"){ echo"active";} ?>"><a href="?menu=pertanyaan">Pertanyaan Kuisioner</a></li>
                      <li class="<?php if($mnu=="keluar"){ echo"active";} ?>"><a href="?menu=keluar">Logout</a></li>
                      </ul>
                    </li>
                  </ul>
          </div><!--/.nav-collapse -->
      </nav>
      <!------ content ---->
       <div class="isihalaman">
                 <?php $mnu=$_GET["menu"]; 
				  if ($mnu=="dashboard"){ include"content_dashboard.php";}
				  else if($mnu=="manageuser"){include"content_user.php";}
				  else if($mnu=="penilai"){include"content_penilai.php";}
				  else if($mnu=="tambahprofesi"){include"tambah_profesi.php";}
				  else if($mnu=="editprofesi"){include"edit_profesi.php";}
				  else if($mnu=="lokasiwisata"){include "content_lokasiwis.php";}
				  else if($mnu=="tambahwisata"){include "tambah_wisata.php";}
				  else if($mnu=="editwisata"){include "edit_wisata.php";}
				  else if($mnu=="kriteria"){include"content_kriteria.php";}
				  else if($mnu=="tambahkriteria"){include"tambah_kriteria.php";}
				  else if($mnu=="editkriteria"){include"edit_kriteria.php";}
				  else if($mnu=="pertanyaan"){include"content_pertanyaan.php";}
				  else if($mnu=="tambahpertanyaan"){include"tambah_pertanyaan.php";}
				  else if($mnu=="editpertanyaan"){include"edit_pertanyaan.php";}
				  else if($mnu=="datapulau"){include"content_pulau.php";}
				  else if($mnu=="tambahpulau"){include"tambah_pulau.php";}
				  else if($mnu=="editpulau"){include"edit_pulau.php";}
				  else if($mnu=="dataprovinsi"){include"content_provinsi.php";}
				  else if($mnu=="tambahprovinsi"){include"tambah_provinsi.php";}
				  else if($mnu=="editprovinsi"){include"edit_provinsi.php";}
				  else if($mnu=="datakabupaten"){include"content_kabupaten.php";}
				  else if($mnu=="tambahkabupaten"){include"tambah_kabupaten.php";}
				  else if($mnu=="editkabupaten"){include"edit_kabupaten.php";}
				  else if($mnu=="keluar"){include"logout.php";}
				  else{	}?>
                </div>
      <!------- end content ---->
      <div class="footerweb">
        </br> 
        <p align="center">
        <small>&copy; 2014 - Indowisata </small> | <small>Universitas Kanjuruhan Malang  &reg; Chriestan Dwi K.</small></p>
        </br></br>
        </div>
         
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap-dropdown.js"></script>
    <script src="../js/bootstrap-collapse.js"></script>
     <script src="../js/bootstrap-carousel.js"></script>
       <script type="text/javascript" src="../js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="../js/jquery-ui-1.8.6.custom.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="../js/jquery.geocomplete.js"></script>
    <script>
      $(function(){
        $("#geocomplete").geocomplete({
         
          details: "form",
          types: ["geocode", "establishment"],
        });

        $("#find").click(function(){
          $("#geocomplete").trigger("geocode");
        });
      });
    </script>
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>
</html>