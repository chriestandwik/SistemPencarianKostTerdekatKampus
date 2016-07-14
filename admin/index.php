<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="../images/favicon.png" type="image/png">

  <title>Login Admin</title>

  <link href="../css/style.default.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>

<body class="notfound">

<!-- Preloader -->


<section>
  
    <div class="lockedpanel">
        <div class="loginuser">
            <img src="../img/admin.jpg" alt="" />
        </div>
        <div class="logged">
            <h4>Administrator Login</h4>
        </div>
        <form method="post" action="">
        <input type="text" class="form-control uname" placeholder="Nama Pengguna" name="txtuser" required/>
            <input type="password" class="form-control" placeholder="Kata Sandi" name="txtpass" required />
            <button class="btn btn-success btn-block" type="submit" name="login">Login</button>
        </form>
    </div><!-- lockedpanel -->
  
</section>


<script src="../js/jquery-1.10.2.min.js"></script>
<script src="../js/jquery-migrate-1.2.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/modernizr.min.js"></script>
<script src="../js/retina.min.js"></script>
<script src="../js/custom.js"></script>

</body>
</html>
<?php	//	LOGIN SYSTEM
	require_once"../config.php";
	if(isset($_POST["login"])){//post dari form login
		$username=$_POST["txtuser"];
		$password=md5($_POST["txtpass"]);
		$sql="select * from `tbl_admin` where username='$username' and password='$password'";
		$hasil=mysql_query($sql);
		$ada=mysql_num_rows($hasil);
		$data=mysql_fetch_array($hasil);
		$username=$data["username"];
		$ckode=$data["id_admin"];
		if($ada >0){ //jika data ada maka daftarkan session
			$_SESSION["1KODELOG"]=$ckode;
			$_SESSION["1ULOGIN"]=$username;
			
			echo "<script>alert('Selemat datang $username, LOGIN BERHASIL');document.location.href='home.php';</script>"; //login berhasil
		}
		else{
			session_destroy();
			echo "<script >alert('Username / Password salah !');document.location.href='index.php';</script>"; //login gagal
		}
	
	}

?>