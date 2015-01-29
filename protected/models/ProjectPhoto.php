<?php

/**
 * This is the model class for table "GalleryPhoto".
 *
 * The followings are the available columns in table 'GalleryPhoto':
 * @property string $Id
 * @property string $Gallery
 * @property string $Photo
 * @property string $Title
 * @property string $Sequence
 * @property integer $IsActive
 */
class GalleryPhoto extends CActiveRecord
{
    public $PhotoFile;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'GalleryPhoto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Gallery, Photo, Title, Sequence', 'required'),
            array('PhotoFile','file', 'allowEmpty'=>FALSE, 'on'=>'insert'),
            array('PhotoFile','file', 'allowEmpty'=>TRUE, 'on'=>'update'),
			array('IsActive', 'numerical', 'integerOnly'=>true),
			array('Gallery, Sequence', 'length', 'max'=>10),
			array('Photo', 'length', 'max'=>100),
			array('Title', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, Gallery, Photo, Title, Sequence, IsActive', 'safe', 'on'=>'search'),
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
			'gallery' => array(self::BELONGS_TO, 'Gallery', 'Gallery'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'Gallery' => 'Gallery',
			'Photo' => 'Photo',
			'Title' => 'Title',
			'Sequence' => 'Sequence',
			'IsActive' => 'Is Active',
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
		$criteria->compare('Gallery',$this->Gallery,true);
		$criteria->compare('Photo',$this->Photo,true);
		$criteria->compare('Title',$this->Title,true);
		$criteria->compare('Sequence',$this->Sequence,true);
		$criteria->compare('IsActive',$this->IsActive);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GalleryPhoto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
