<?php
session_start();
include_once('../classes/Project.php');
$Conn = Connection::get_DefaultConnection();
try {
    $Project = new Project($Conn);
    $Project->Name = $_POST['Name'];
    $Project->Description = $_POST['Description'];
    
    if(isset($_POST['Active'])){$Active = 1;}else{$Active = 0;}
    $Project->Active = $Active;
    
	$Project->Save();
	$Conn->Commit();
	header('location:project.php');
} catch (Exception $e) {
	include('../classes/errorHandler.php');
}
?>