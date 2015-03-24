<?php
include_once('../classes/BannerPhoto.php');
$Conn = Connection::get_DefaultConnection();
try {
   
	$BannerPhotoId = $_GET['Id'];
   BannerPhoto::Delete($Conn, $BannerPhotoId);

   $Conn->Commit();
   header('location:banner.php');
} catch (Exception $e) {
   include('../classes/errorHandler.php');
}
?>