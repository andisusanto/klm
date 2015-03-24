<?php include_once('BaseObject.php'); ?>
<?php include_once('Exceptions.php'); ?>
<?php
class PageContent extends BaseObject{
   const TABLENAME = 'PageContent';
   public function __construct($mySQLi){
       parent::__contruct($mySQLi);
   }
    public $PageName;
    public $Content;

   public function get_SaveQuery(){
       $mySQLi = $this->get_mySQLi();
       return "INSERT INTO ".self::TABLENAME."(PageName,Content,LockField) VALUES('".$mySQLi->real_escape_string($this->PageName)."','".$mySQLi->real_escape_string($this->Content)."','".$mySQLi->real_escape_string($this->LockField)."')";}
   public function get_UpdateQuery(){
       $mySQLi = $this->get_mySQLi();
       return "UPDATE ".self::TABLENAME." SET PageName = '".$mySQLi->real_escape_string($this->PageName)."', Content = '".$mySQLi->real_escape_string($this->Content)."', LockField = '".$mySQLi->real_escape_string($this->LockField)."' WHERE Id = '".$mySQLi->real_escape_string($this->Id)."'";}
   protected function get_TableName(){
       return self::TABLENAME;
   }

   public static function GetObjectByKey($mySQLi, $Id){
       if($result = $mySQLi->query("SELECT * FROM ".self::TABLENAME." WHERE Id = ".$mySQLi->real_escape_string($Id)." LIMIT 1")){
           if($row = $result->fetch_array()){
               $tmpPageContent = new PageContent($mySQLi);
               $tmpPageContent->Id = $row['Id'];
               $tmpPageContent->PageName = $row['PageName'];
               $tmpPageContent->Content = $row['Content'];

               $tmpPageContent->LockField = $row['LockField'];
               return $tmpPageContent;
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
           $PageContents = array();
           while ($row = $result->fetch_array()){
               $tmpPageContent = new PageContent($mySQLi);
               $tmpPageContent->Id = $row['Id'];
               $tmpPageContent->LockField = $row['LockField'];
               $tmpPageContent->PageName = $row['PageName'];
               $tmpPageContent->Content = $row['Content'];

               $PageContents[] = $tmpPageContent;
           }
           return $PageContents;
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