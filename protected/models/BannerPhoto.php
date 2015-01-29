<?php

/**
 * This is the model class for table "BannerPhoto".
 *
 * The followings are the available columns in table 'BannerPhoto':
 * @property string $Id
 * @property string $Sequence
 * @property string $Photo
 * @property integer $Active
 * @property string $Title
 */
class BannerPhoto extends CActiveRecord
{
    public $PhotoFile;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'BannerPhoto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Sequence, Active, Title', 'required'),
            array('PhotoFile','file', 'allowEmpty'=>FALSE, 'on'=>'insert'),
            array('PhotoFile','file', 'allowEmpty'=>TRUE, 'on'=>'update'),
			array('Active', 'numerical', 'integerOnly'=>true),
			array('Sequence', 'length', 'max'=>10),
			array('Title', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, Sequence, Photo, Active, Title', 'safe', 'on'=>'search'),
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
			'Sequence' => 'Sequence',
			'Photo' => 'Photo',
			'Active' => 'Active',
			'Title' => 'Title',
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
		$criteria->compare('Sequence',$this->Sequence,true);
		$criteria->compare('Photo',$this->Photo,true);
		$criteria->compare('Active',$this->Active);
		$criteria->compare('Title',$this->Title,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BannerPhoto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
