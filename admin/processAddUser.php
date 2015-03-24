<?php
session_start();
include_once('../classes/Admin.php');
$Conn = Connection::get_DefaultConnection();
try {
    $Admin = new Admin($Conn);
    $Admin->Username = $_POST['Username'];
    $Admin->SetPassword($_POST['Password']);
    
	$Admin->Save();
	$Conn->Commit();
	header('location:user.php');
} catch (Exception $e) {
	include('../classes/errorHandler.php');
}
?>