<?php
session_start();
session_destroy();
echo "<script>alert('TERIMAKASIH ATAS PARTISIPASINYA');document.location.href='../index.php';</script>";
?>