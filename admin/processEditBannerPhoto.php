<?php
include_once('../classes/BannerPhoto.php');
$Conn = Connection::get_DefaultConnection();
try {
    $BannerPhoto = BannerPhoto::GetObjectByKey($Conn, $_POST['Id']);
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

    if($fileName !== $stamp.'-'){
      move_uploaded_file($tmpName, $uploadfile);
      $BannerPhoto->Photo = $fileName;
    }

   $BannerPhoto->Update();
   $Conn->Commit();
   
    header('location:banner.php');
} catch (Exception $e) {
    include('../classes/errorHandler.php');
}
?>