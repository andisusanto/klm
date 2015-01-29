<?php

/**
 * This is the model class for table "Admin".
 *
 * The followings are the available columns in table 'Admin':
 * @property string $Id
 * @property string $UserName
 * @property string $StoredPassword
 * @property integer $ChangePasswordOnLogOn
 */
class Admin extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Admin';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('UserName, StoredPassword, ChangePasswordOnLogOn', 'required'),
			array('ChangePasswordOnLogOn', 'numerical', 'integerOnly'=>true),
			array('UserName', 'length', 'max'=>45),
			array('StoredPassword', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, UserName, StoredPassword, ChangePasswordOnLogOn', 'safe', 'on'=>'search'),
		);
	}
    
    public function setPassword($password)
    {
        $this->StoredPassword = md5($password);
    }
    
    public function comparePassword($password)
    {
        return md5($password) == $this->StoredPassword;
    }
    
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'UserName' => 'User Name',
			'StoredPassword' => 'Stored Password',
			'ChangePasswordOnLogOn' => 'Change Password On Log On',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('Id',$this->Id,true);
		$criteria->compare('UserName',$this->UserName,true);
		$criteria->compare('StoredPassword',$this->StoredPassword,true);
		$criteria->compare('ChangePasswordOnLogOn',$this->ChangePasswordOnLogOn);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Admin the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
