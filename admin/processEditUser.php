<?php
include_once('../classes/Admin.php');
$Conn = Connection::get_DefaultConnection();
try {
    $Admin = Admin::GetObjectByKey($Conn, $_POST['Id']);
    $Admin->Username = $_POST['Username'];
    
    if($_POST['Password'] !== "") $Admin->SetPassword($_POST['Password']);

   $Admin->Update();
   $Conn->Commit();
   
    header('location:user.php');
} catch (Exception $e) {
    include('../classes/errorHandler.php');
}
?>