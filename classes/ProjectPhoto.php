<?php include_once('BaseObject.php'); ?>
<?php include_once('Exceptions.php'); ?>
<?php
class ProjectPhoto extends BaseObject{
   const TABLENAME = 'ProjectPhoto';
   public function __construct($mySQLi){
       parent::__contruct($mySQLi);
   }
    public $Sequence;
    public $Project;
    public $Photo;
    public $Title;
    public $Active;

   public function get_SaveQuery(){
       $mySQLi = $this->get_mySQLi();
       return "INSERT INTO ".self::TABLENAME."(Sequence,Project,Photo,Title,Active,LockField) VALUES('".$mySQLi->real_escape_string($this->Sequence)."','".$mySQLi->real_escape_string($this->Project)."','".$mySQLi->real_escape_string($this->Photo)."','".$mySQLi->real_escape_string($this->Title)."','".$mySQLi->real_escape_string($this->Active)."','".$mySQLi->real_escape_string($this->LockField)."')";}
   public function get_UpdateQuery(){
       $mySQLi = $this->get_mySQLi();
       return "UPDATE ".self::TABLENAME." SET Sequence = '".$mySQLi->real_escape_string($this->Sequence)."', Project = '".$mySQLi->real_escape_string($this->Project)."', Photo = '".$mySQLi->real_escape_string($this->Photo)."', Title = '".$mySQLi->real_escape_string($this->Title)."', Active = '".$mySQLi->real_escape_string($this->Active)."', LockField = '".$mySQLi->real_escape_string($this->LockField)."' WHERE Id = '".$mySQLi->real_escape_string($this->Id)."'";}
   protected function get_TableName(){
       return self::TABLENAME;
   }

   public static function GetObjectByKey($mySQLi, $Id){
       if($result = $mySQLi->query("SELECT * FROM ".self::TABLENAME." WHERE Id = ".$mySQLi->real_escape_string($Id)." LIMIT 1")){
           if($row = $result->fetch_array()){
               $tmpProjectPhoto = new ProjectPhoto($mySQLi);
               $tmpProjectPhoto->Id = $row['Id'];
               $tmpProjectPhoto->Sequence = $row['Sequence'];
               $tmpProjectPhoto->Project = $row['Project'];
               $tmpProjectPhoto->Photo = $row['Photo'];
               $tmpProjectPhoto->Title = $row['Title'];
               $tmpProjectPhoto->Active = $row['Active'];

               $tmpProjectPhoto->LockField = $row['LockField'];
               return $tmpProjectPhoto;
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
           $ProjectPhotos = array();
           while ($row = $result->fetch_array()){
               $tmpProjectPhoto = new ProjectPhoto($mySQLi);
               $tmpProjectPhoto->Id = $row['Id'];
               $tmpProjectPhoto->LockField = $row['LockField'];
               $tmpProjectPhoto->Sequence = $row['Sequence'];
               $tmpProjectPhoto->Project = $row['Project'];
               $tmpProjectPhoto->Photo = $row['Photo'];
               $tmpProjectPhoto->Title = $row['Title'];
               $tmpProjectPhoto->Active = $row['Active'];

               $ProjectPhotos[] = $tmpProjectPhoto;
           }
           return $ProjectPhotos;
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