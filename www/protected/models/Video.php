<?php

/**
 * This is the model class for table "Video".
 *
 * The followings are the available columns in table 'Video':
 * @property string $id
 * @property string $cate
 * @property string $name
 * @property string $sapo
 * @property string $youtube_key
 * @property string $link
 * @property string $thumb
 *
 * The followings are the available model relations:
 * @property Categories $cate0
 */
class Video extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'video';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cate', 'required'),
			array('cate', 'length', 'max'=>11),
			array('name, sapo, youtube_key, link, thumb', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, cate, name, sapo, youtube_key, link, thumb', 'safe', 'on'=>'search'),
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
			'cate0' => array(self::BELONGS_TO, 'Categories', 'cate'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cate' => 'Cate',
			'name' => 'Name',
			'sapo' => 'Sapo',
			'youtube_key' => 'Youtube Key',
			'link' => 'Link',
			'thumb' => 'Thumb',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('cate',$this->cate,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('sapo',$this->sapo,true);
		$criteria->compare('youtube_key',$this->youtube_key,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('thumb',$this->thumb,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Video the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
