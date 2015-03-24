<?php
include_once('../classes/PageContent.php');
$Conn = Connection::get_DefaultConnection();
try {
    $PageContent = PageContent::GetObjectByKey($Conn, $_POST['Id']);
    $PageContent->Content = $_POST['Content'];
    
   $PageContent->Update();
   $Conn->Commit();
   
    header('location:pageContent.php');
} catch (Exception $e) {
    include('../classes/errorHandler.php');
}
?>