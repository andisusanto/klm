<?php
session_start();
include_once('../classes/BannerPhoto.php');
$Conn = Connection::get_DefaultConnection();
try {
    $BannerPhoto = new BannerPhoto($Conn);
    $BannerPhoto->Sequence = 1;
    $BannerPhoto->Title = $_POST['Title'];
    
    if(isset($_POST['Active'])){$Active = 1;}else{$Active = 0;}
    $BannerPhoto->Active = $Active;
    
    $stamp = date('Y-m-d-h-s');
    $uploaddir = '../images/bannerphoto/';
    $fileName = $_FILES['Photo']['name'];     
    $tmpName  = $_FILES['Photo']['tmp_name'];
    $fileName = $stamp.'-'.$fileName;
    $uploadfile = $uploaddir . $fileName;

    if($fileName == $stamp.'-'){
            $BannerPhoto->Photo = "";
        } else {
            $BannerPhoto->Photo = $fileName;
            move_uploaded_file($tmpName, $uploadfile);
        }

	$BannerPhoto->Save();
	$Conn->Commit();
	header('location:banner.php');
} catch (Exception $e) {
	include('../classes/errorHandler.php');
}
?>