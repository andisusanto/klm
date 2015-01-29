<?php

/**
 * This is the model class for table "Configuration".
 *
 * The followings are the available columns in table 'Configuration':
 * @property string $Id
 * @property string $LoyaltyPointConversionRate
 * @property string $AmountToGetALoyaltyPoint
 * @property string $AdminEmail
 * @property string $NewArrivalCutOffDate
 */
class Configuration extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Configuration';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('LoyaltyPointConversionRate, AmountToGetALoyaltyPoint, AdminEmail, NewArrivalCutOffDate', 'required'),
			array('LoyaltyPointConversionRate', 'length', 'max'=>4),
			array('AmountToGetALoyaltyPoint', 'length', 'max'=>18),
			array('AdminEmail', 'length', 'max'=>80),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, LoyaltyPointConversionRate, AmountToGetALoyaltyPoint, AdminEmail, NewArrivalCutOffDate', 'safe', 'on'=>'search'),
		);
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
			'LoyaltyPointConversionRate' => 'Loyalty Point Conversion Rate',
			'AmountToGetALoyaltyPoint' => 'Amount To Get Aloyalty Point',
			'AdminEmail' => 'Admin Email',
			'NewArrivalCutOffDate' => 'New Arrival Cut Off Date',
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
		$criteria->compare('LoyaltyPointConversionRate',$this->LoyaltyPointConversionRate,true);
		$criteria->compare('AmountToGetALoyaltyPoint',$this->AmountToGetALoyaltyPoint,true);
		$criteria->compare('AdminEmail',$this->AdminEmail,true);
		$criteria->compare('NewArrivalCutOffDate',$this->NewArrivalCutOffDate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Configuration the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
