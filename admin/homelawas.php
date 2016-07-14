<?php
$mnu=$_GET["menu"]; 
include"../config.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="../images/favicon.png" type="image/png">

  <title>Indowisata</title>

   <link href="../css/style.default.css" rel="stylesheet">
  <link href="../css/jquery.datatables.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>

<body>

<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>
  <div class="leftpanel">
    <div class="logopanel">
        <h1><span>[</span> Ind <i class="glyphicon glyphicon-globe"></i> wisata <span>]</span></h1>
    </div><!-- logopanel -->
    <div class="leftpanelinner">     
        <!-- This is only visible to small devices -->
        <div class="visible-xs hidden-sm hidden-md hidden-lg">   
            <div class="media userlogged">
                <img alt="" src="../images/photos/loggeduser.png" class="media-object">
                <div class="media-body">
                    <h4>Anonymous</h4>
                </div>
            </div>
          
            <h5 class="sidebartitle actitle">Account</h5>
            <ul class="nav nav-pills nav-stacked nav-bracket mb30">
              <li><a href="profile.html"><i class="fa fa-user"></i> <span>Profile</span></a></li>
              <li><a href="#"><i class="fa fa-cog"></i> <span>Account Settings</span></a></li>
              <li><a href="#"><i class="fa fa-question-circle"></i> <span>Help</span></a></li>
              <li><a href="?menu=keluar"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
            </ul>
        </div>
      
    <h5 class="sidebartitle">	Menu</h5>
    <ul class="nav nav-pills nav-stacked nav-bracket">
          <li class="<?php if($mnu=="dashboard"){ echo"active";} ?>">
          	<a href="?menu=dashboard"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
          <li class="<?php if($mnu=="lokasiwisata"){ echo"active";} ?>">
          	<a href="?menu=lokasiwisata"><i class="fa fa-laptop"></i> <span>Data Wisata</span></a></li>
          <li class="nav-parent <?php if($mnu=="datawisata"){ echo"active";} ?>">
          	<a href="#"><i class="glyphicon glyphicon-indent-left"></i> <span>Data Wilayah</span></a>
              <ul class="children">
                <li><a href="general-forms.html"><i class="fa fa-caret-right"></i> Data Kepulauan</a></li>
                <li><a href="form-layouts.html"><i class="fa fa-caret-right"></i> Data Provinsi</a></li>
                <li><a href="form-validation.html"><i class="fa fa-caret-right"></i> Data Kabupaten</a></li>
              </ul>
          </li>
          <li class="<?php if($mnu=="kriteria"){ echo"active";} ?>">
          	<a href="?menu=kriteria"><i class="glyphicon glyphicon-stats"></i> <span>Kriteria Kelayakan</span></a></li>
          <li class="<?php if($mnu=="pertanyaan"){ echo"active";} ?>">
          	<a href="?menu=pertanyaan"><i class="glyphicon glyphicon-list-alt"></i> <span>Pertanyaan Kuisioner</span></a></li>
    </ul><!-- infosummary -->
      
    </div><!-- leftpanelinner -->
  </div><!-- leftpanel -->
  
  <div class="mainpanel">
    
    <div class="headerbar">
      
      <a class="menutoggle"><i class="fa fa-bars"></i></a>
      
      <form class="searchform" action="http://themepixels.com/demo/webbracket/index.html" method="post">
        <input type="text" class="form-control" name="keyword" placeholder="Search here..." />
      </form>
      
      <div class="header-right">
        <ul class="headermenu">   
          <li>
            <div class="btn-group">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <img src="../images/photos/admin.jpg" alt="" />
                Anonymous
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                <li><a href="profile.html"><i class="glyphicon glyphicon-user"></i> My Profile</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Account Settings</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-question-sign"></i> Help</a></li>
                <li><a href="?menu=keluar"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </div><!-- header-right -->
      
    </div><!-- headerbar -->
    
    <!-- contentpanel -->
     <div class="contentpanel">
       <div class="panel panel-success panel-alt">
          <div class="panel-heading">
              <h3 class="panel-title">Panel Title</h3>
            </div>
            <div class="panel-body">   
             <?php $mnu=$_GET["menu"]; 
				  if ($mnu=="dashboard"){ include"content_dashboard.php";}
				  else if($mnu=="manageuser"){include"content_user.php";}
				  else if($mnu=="penilai"){include"content_penilai.php";}
				  else if($mnu=="tambahprofesi"){include"tambah_profesi.php";}
				  else if($mnu=="editprofesi"){include"edit_profesi.php";}
				  else if($mnu=="lokasiwisata"){include "content_lokasiwis.php";}
				  else if($mnu=="tambahwisata"){include "tambah_wisata.php";}
				  else if($mnu=="kriteria"){include"content_kriteria.php";}
				  else if($mnu=="tambahkriteria"){include"tambah_kriteria.php";}
				  else if($mnu=="editkriteria"){include"edit_kriteria.php";}
				  else if($mnu=="pertanyaan"){include"content_pertanyaan.php";}
				  else if($mnu=="tambahpertanyaan"){include"tambah_pertanyaan.php";}
				  else if($mnu=="editpertanyaan"){include"edit_pertanyaan.php";}
				  else if($mnu=="inbox"){include"system/sms/inbox.php";}
				  else if($mnu=="outbox"){include"system/sms/outbox.php";}
				  else if($mnu=="pesantext"){include"system/sms/pesantext.php";}
				  else if($mnu=="autoreply"){include"system/sms/autoreply.php";}
				  else if($mnu=="user"){include"system/adminsystem/user.php";}
				  else if($mnu=="keluar"){include"logout.php";}
				  else{	}?>
             </div>
          </div>
    </div>
    
  </div><!-- mainpanel --> 
</section>


<script src="../js/jquery-1.10.2.min.js"></script>
<script src="../js/jquery-migrate-1.2.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/modernizr.min.js"></script>
<script src="../js/jquery.sparkline.min.js"></script>
<script src="../js/toggles.min.js"></script>
<script src="../js/retina.min.js"></script>
<script src="../js/jquery.cookies.js"></script>

<script src="../js/flot/flot.min.js"></script>
<script src="../js/flot/flot.resize.min.js"></script>
<script src="../js/morris.min.js"></script>
<script src="../js/raphael-2.1.0.min.js"></script>

<script src="../js/jquery.datatables.min.js"></script>
<script src="../js/chosen.jquery.min.js"></script>

<script src="../js/custom.js"></script>
<script src="../js/dashboard.js"></script>

</body>
</html>
