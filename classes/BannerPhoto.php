<?php include_once('BaseObject.php'); ?>
<?php include_once('Exceptions.php'); ?>
<?php
class BannerPhoto extends BaseObject{
   const TABLENAME = 'BannerPhoto';
   public function __construct($mySQLi){
       parent::__contruct($mySQLi);
   }
    public $Photo;
    public $Title;
    public $Sequence;
    public $Active;

   public function get_SaveQuery(){
       $mySQLi = $this->get_mySQLi();
       return "INSERT INTO ".self::TABLENAME."(Photo,Title,Sequence,Active,LockField) VALUES('".$mySQLi->real_escape_string($this->Photo)."','".$mySQLi->real_escape_string($this->Title)."','".$mySQLi->real_escape_string($this->Sequence)."','".$mySQLi->real_escape_string($this->Active)."','".$mySQLi->real_escape_string($this->LockField)."')";}
   public function get_UpdateQuery(){
       $mySQLi = $this->get_mySQLi();
       return "UPDATE ".self::TABLENAME." SET Photo = '".$mySQLi->real_escape_string($this->Photo)."', Title = '".$mySQLi->real_escape_string($this->Title)."', Sequence = '".$mySQLi->real_escape_string($this->Sequence)."', Active = '".$mySQLi->real_escape_string($this->Active)."', LockField = '".$mySQLi->real_escape_string($this->LockField)."' WHERE Id = '".$mySQLi->real_escape_string($this->Id)."'";}
   protected function get_TableName(){
       return self::TABLENAME;
   }

   public static function GetObjectByKey($mySQLi, $Id){
       if($result = $mySQLi->query("SELECT * FROM ".self::TABLENAME." WHERE Id = ".$mySQLi->real_escape_string($Id)." LIMIT 1")){
           if($row = $result->fetch_array()){
               $tmpBannerPhoto = new BannerPhoto($mySQLi);
               $tmpBannerPhoto->Id = $row['Id'];
               $tmpBannerPhoto->Photo = $row['Photo'];
               $tmpBannerPhoto->Title = $row['Title'];
               $tmpBannerPhoto->Sequence = $row['Sequence'];
               $tmpBannerPhoto->Active = $row['Active'];

               $tmpBannerPhoto->LockField = $row['LockField'];
               return $tmpBannerPhoto;
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
           $BannerPhotos = array();
           while ($row = $result->fetch_array()){
               $tmpBannerPhoto = new BannerPhoto($mySQLi);
               $tmpBannerPhoto->Id = $row['Id'];
               $tmpBannerPhoto->LockField = $row['LockField'];
               $tmpBannerPhoto->Photo = $row['Photo'];
               $tmpBannerPhoto->Title = $row['Title'];
               $tmpBannerPhoto->Sequence = $row['Sequence'];
               $tmpBannerPhoto->Active = $row['Active'];

               $BannerPhotos[] = $tmpBannerPhoto;
           }
           return $BannerPhotos;
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