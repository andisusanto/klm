<?php include_once('BaseObject.php'); ?>
<?php
abstract class UserBase extends BaseObject{
	public $Username;
	protected $StoredPassword;
	public function __construct($mySQLi){
		parent::__contruct($mySQLi);
	}
	public function SetPassword($Password){
		$this->StoredPassword = md5($Password);
	}
	public function ComparePassword($Password){
		return $this->StoredPassword == md5($Password);
	}
}
?>