<?php

/**
 * This is the model class for table "Gallery".
 *
 * The followings are the available columns in table 'Gallery':
 * @property string $Id
 * @property string $Content
 * @property string $Title
 * @property string $TransDate
 * @property integer $Pinned
 *
 * The followings are the available model relations:
 * @property Galleryphoto[] $galleryphotos
 */
class Gallery extends CActiveRecord
{

    public static function getPinnedGalleries()
    {
        return Gallery::model()->findAll(array(
                                                               'condition' => 'Pinned = 1',
                                                               'order' => 'TransDate DESC'
                                                          )
                                                     );
    }
    public static function getNonPinnedGalleries($limit = 0)
    {
        $arr = array(
                        'condition' => 'Pinned = 0',
                        'order' => 'TransDate DESC'
                    );
        if($limit > 0 )
        {
            $arr = CMap::mergeArray($arr, array('limit'=>$limit));
        }
        return Gallery::model()->findAll($arr);
    }
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Gallery';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Content, Title, TransDate', 'required'),
			array('Pinned', 'numerical', 'integerOnly'=>true),
			array('Content', 'length', 'max'=>5000),
			array('Title', 'length', 'max'=>80),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, Content, Title, TransDate, Pinned', 'safe', 'on'=>'search'),
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
			'galleryphotos' => array(self::HAS_MANY, 'GalleryPhoto', 'Gallery'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'Content' => 'Content',
			'Title' => 'Title',
			'TransDate' => 'Trans Date',
			'Pinned' => 'Pinned',
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
		$criteria->compare('Content',$this->Content,true);
		$criteria->compare('Title',$this->Title,true);
		$criteria->compare('TransDate',$this->TransDate,true);
		$criteria->compare('Pinned',$this->Pinned);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Gallery the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
