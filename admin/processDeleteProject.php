<?php
include_once('../classes/Project.php');
$Conn = Connection::get_DefaultConnection();
try {
   
	$ProjectId = $_GET['Id'];

   $Query = "DELETE FROM ProjectPhoto WHERE Project = ".$ProjectId;
   $Conn->query($Query);
   Project::Delete($Conn, $ProjectId);

   $Conn->Commit();
   header('location:project.php');
} catch (Exception $e) {
   include('../classes/errorHandler.php');
}
?>