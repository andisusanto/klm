<?php
include_once('../classes/Admin.php');
$Conn = Connection::get_DefaultConnection();
try {
   
	$AdminId = $_GET['Id'];
   Admin::Delete($Conn, $AdminId);

   $Conn->Commit();
   header('location:user.php');
} catch (Exception $e) {
   include('../classes/errorHandler.php');
}
?>