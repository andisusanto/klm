<?php
include_once('../classes/Company.php');
$Conn = Connection::get_DefaultConnection();
try {
    $Company = Company::GetObjectByKey($Conn, $_POST['Id']);
    $Company->Name = $_POST['Name'];
    $Company->ContactNumber = $_POST['ContactNumber'];
    $Company->Address = $_POST['Address'];
    $Company->Skype = $_POST['Skype'];
    $Company->Facebook = $_POST['Facebook'];
    $Company->Email = $_POST['Email'];
    $Company->WorkingTime = $_POST['WorkingTime'];
    
    $stamp = date('Y-m-d-h-s');
    $uploaddir = '../images/company/';
    $fileName = $_FILES['Logo']['name'];     
    $tmpName  = $_FILES['Logo']['tmp_name'];
    $fileName = $stamp.'-'.$fileName;
    $uploadfile = $uploaddir . $fileName;

    if($fileName !== $stamp.'-'){
      move_uploaded_file($tmpName, $uploadfile);
      $Company->Logo = $fileName;
    }

   $Company->Update();
   $Conn->Commit();
   
    header('location:editCompany.php');
} catch (Exception $e) {
    include('../classes/errorHandler.php');
}
?>