<?php include_once('BaseObject.php'); ?>
<?php include_once('Exceptions.php'); ?>
<?php
class Project extends BaseObject{
   const TABLENAME = 'Project';
   public function __construct($mySQLi){
       parent::__contruct($mySQLi);
   }
    public $Description;
    public $Active;
    public $Name;

   public function get_SaveQuery(){
       $mySQLi = $this->get_mySQLi();
       return "INSERT INTO ".self::TABLENAME."(Description,Active,Name,LockField) VALUES('".$mySQLi->real_escape_string($this->Description)."','".$mySQLi->real_escape_string($this->Active)."','".$mySQLi->real_escape_string($this->Name)."','".$mySQLi->real_escape_string($this->LockField)."')";}
   public function get_UpdateQuery(){
       $mySQLi = $this->get_mySQLi();
       return "UPDATE ".self::TABLENAME." SET Description = '".$mySQLi->real_escape_string($this->Description)."', Active = '".$mySQLi->real_escape_string($this->Active)."', Name = '".$mySQLi->real_escape_string($this->Name)."', LockField = '".$mySQLi->real_escape_string($this->LockField)."' WHERE Id = '".$mySQLi->real_escape_string($this->Id)."'";}
   protected function get_TableName(){
       return self::TABLENAME;
   }
   public function get_ProjectPhoto($page=0,$totalitem=0){
       return ProjectPhoto::LoadCollection($this->get_mySQLi(),"Project = ".$this->Id,'Id DESC',$page,$totalitem);
   }

   public static function GetObjectByKey($mySQLi, $Id){
       if($result = $mySQLi->query("SELECT * FROM ".self::TABLENAME." WHERE Id = ".$mySQLi->real_escape_string($Id)." LIMIT 1")){
           if($row = $result->fetch_array()){
               $tmpProject = new Project($mySQLi);
               $tmpProject->Id = $row['Id'];
               $tmpProject->Description = $row['Description'];
               $tmpProject->Active = $row['Active'];
               $tmpProject->Name = $row['Name'];

               $tmpProject->LockField = $row['LockField'];
               return $tmpProject;
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
           $Projects = array();
           while ($row = $result->fetch_array()){
               $tmpProject = new Project($mySQLi);
               $tmpProject->Id = $row['Id'];
               $tmpProject->LockField = $row['LockField'];
               $tmpProject->Description = $row['Description'];
               $tmpProject->Active = $row['Active'];
               $tmpProject->Name = $row['Name'];

               $Projects[] = $tmpProject;
           }
           return $Projects;
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