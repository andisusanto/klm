<?php
include_once('../classes/ProjectPhoto.php');
$Conn = Connection::get_DefaultConnection();
try {
   ProjectPhoto::Delete($Conn, $_GET['Id']);
   $Conn->Commit();
   header('location:editProject.php?Id='.$_GET['Pid']);
} catch (Exception $e) {
   include('../classes/errorHandler.php');
}
?>