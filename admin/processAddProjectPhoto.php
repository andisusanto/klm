<?php
include_once('../classes/ProjectPhoto.php');
$Conn = Connection::get_DefaultConnection();
try {
      $ProjectPhoto = new ProjectPhoto($Conn);

$ProjectPhoto->Project = $_POST['Pid'];
$ProjectPhoto->Title = $_POST['Title'];
$ProjectPhoto->Sequence = 1;


    if(isset($_POST['Active'])){$Active = 1;}else{$Active = 0;}
    $ProjectPhoto->Active = $Active;


 	$stamp = date('Y-m-d-h-s');
    $uploaddir = '../images/projectphoto/';
    $fileName = $_FILES['Photo']['name'];     
    $tmpName  = $_FILES['Photo']['tmp_name'];
    $fileName = $stamp.'-'.$fileName;
    $uploadfile = $uploaddir . $fileName;

    if($fileName !== $stamp.'-'){
      $ProjectPhoto->Photo = $fileName;
      move_uploaded_file($tmpName, $uploadfile);
    }else{
    	throw new FileUploadException;
    }

   $ProjectPhoto->Save();
   $Conn->Commit();
   header('location:editProject.php?Id='.$_POST['Pid']);
} catch (Exception $e) {
   include('../classes/errorHandler.php');
}
?>