<?php include_once('BaseObject.php'); ?>
<?php include_once('Exceptions.php'); ?>
<?php
class Company extends BaseObject{
   const TABLENAME = 'Company';
   public function __construct($mySQLi){
       parent::__contruct($mySQLi);
   }
    public $Address;
    public $ContactNumber;
    public $Facebook;
    public $WorkingTime;
    public $Skype;
    public $Email;
    public $Name;
    public $Logo;

   public function get_SaveQuery(){
       $mySQLi = $this->get_mySQLi();
       return "INSERT INTO ".self::TABLENAME."(Address,ContactNumber,Facebook,WorkingTime,Skype,Email,Name,Logo,LockField) VALUES('".$mySQLi->real_escape_string($this->Address)."','".$mySQLi->real_escape_string($this->ContactNumber)."','".$mySQLi->real_escape_string($this->Facebook)."','".$mySQLi->real_escape_string($this->WorkingTime)."','".$mySQLi->real_escape_string($this->Skype)."','".$mySQLi->real_escape_string($this->Email)."','".$mySQLi->real_escape_string($this->Name)."','".$mySQLi->real_escape_string($this->Logo)."','".$mySQLi->real_escape_string($this->LockField)."')";}
   public function get_UpdateQuery(){
       $mySQLi = $this->get_mySQLi();
       return "UPDATE ".self::TABLENAME." SET Address = '".$mySQLi->real_escape_string($this->Address)."', ContactNumber = '".$mySQLi->real_escape_string($this->ContactNumber)."', Facebook = '".$mySQLi->real_escape_string($this->Facebook)."', WorkingTime = '".$mySQLi->real_escape_string($this->WorkingTime)."', Skype = '".$mySQLi->real_escape_string($this->Skype)."', Email = '".$mySQLi->real_escape_string($this->Email)."', Name = '".$mySQLi->real_escape_string($this->Name)."', Logo = '".$mySQLi->real_escape_string($this->Logo)."', LockField = '".$mySQLi->real_escape_string($this->LockField)."' WHERE Id = '".$mySQLi->real_escape_string($this->Id)."'";}
   protected function get_TableName(){
       return self::TABLENAME;
   }

   public static function GetObjectByKey($mySQLi, $Id){
       if($result = $mySQLi->query("SELECT * FROM ".self::TABLENAME." WHERE Id = ".$mySQLi->real_escape_string($Id)." LIMIT 1")){
           if($row = $result->fetch_array()){
               $tmpCompany = new Company($mySQLi);
               $tmpCompany->Id = $row['Id'];
               $tmpCompany->Address = $row['Address'];
               $tmpCompany->ContactNumber = $row['ContactNumber'];
               $tmpCompany->Facebook = $row['Facebook'];
               $tmpCompany->WorkingTime = $row['WorkingTime'];
               $tmpCompany->Skype = $row['Skype'];
               $tmpCompany->Email = $row['Email'];
               $tmpCompany->Name = $row['Name'];
               $tmpCompany->Logo = $row['Logo'];

               $tmpCompany->LockField = $row['LockField'];
               return $tmpCompany;
           }
           else
           {
               return false;
           }
       }
       else
       {  
           throw new InvalidQueryException;
       }
   }
   public static function LoadCollection($mySQLi, $Criteria = '1 = 1',$sort='',$page=0,$totalitem=0){
       $tmpQuery = "SELECT  * FROM ".self::TABLENAME." WHERE ".$mySQLi->real_escape_string($Criteria);
       if ($sort != ''){ $tmpQuery .= " "."ORDER BY ".$sort; }
       if ($page > 0 && $totalitem > 0){
           $start = ($page-1) * $totalitem;
           $tmpQuery .= " LIMIT ".$start.",".$totalitem;
       }
       if ($result = $mySQLi->query($tmpQuery)){
           $Companys = array();
           while ($row = $result->fetch_array()){
               $tmpCompany = new Company($mySQLi);
               $tmpCompany->Id = $row['Id'];
               $tmpCompany->LockField = $row['LockField'];
               $tmpCompany->Address = $row['Address'];
               $tmpCompany->ContactNumber = $row['ContactNumber'];
               $tmpCompany->Facebook = $row['Facebook'];
               $tmpCompany->WorkingTime = $row['WorkingTime'];
               $tmpCompany->Skype = $row['Skype'];
               $tmpCompany->Email = $row['Email'];
               $tmpCompany->Name = $row['Name'];
               $tmpCompany->Logo = $row['Logo'];

               $Companys[] = $tmpCompany;
           }
           return $Companys;
       }
       else
       {
           throw new InvalidQueryException;
       }
   }
   public static function Delete($mySQLi,$Id){
       if ($result = $mySQLi->query("DELETE FROM ".self::TABLENAME." WHERE Id=".$mySQLi->real_escape_string($Id))){
           if ($mySQLi->affected_rows == 0){
               throw new ObjectNotFoundException;
           }
       }
       else
       {
           throw new InvalidQueryException;
       }
   }
}
?>