<?php
function Upload($uploadName){
    $direktori          = "../media/";
    $direktoriThumb     = "../media/";
    $file               = $direktori.$uploadName;
   
    //simpan gambar ukuran sebenernya
    $realImagesName     = $_FILES['F1']['tmp_name'];
    move_uploaded_file($realImagesName, $file);
   
    //identitas file gambar
    $realImages             = imagecreatefromjpeg($file);
    $width                  = imageSX($realImages);
    $height                 = imageSY($realImages);
   
    //simpan ukuran thumbs
    $thumbWidth     = 600;
	$thumbHeight    = 220;
    //$thumbHeight    = ($thumbWidth / $width) * $height;
   
    //mengubah ukuran gambar
    $thumbImage = imagecreatetruecolor($thumbWidth, $thumbHeight);
    imagecopyresampled($thumbImage, $realImages, 0,0,0,0, $thumbWidth, $thumbHeight, $width, $height);
   
    //simpan gambar thumbnail
    imagejpeg($thumbImage,$direktoriThumb."600-".$uploadName);
   
    //hapus objek gambar dalam memori
    imagedestroy($realImages);
    imagedestroy($thumbImage);
    }

?> 