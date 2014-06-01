<?php
/**
 * This is the model class for table "goods".
 *
 * The followings are the available columns in table 'goods':
 * @property integer $id
 * @property string $title
 * @property integer $stock
 * @property string $desc_min
 * @property string $desc_full
 * @property string $date
 * @property integer $price
 * @property string $currency
 * @property string $pic_min
 * @property string $pic_full
 * @property integer $child_id
 * @property string $gender
 * @property string $description
 * @property string $keywords
 * @property string $draft
 * @property string $type
 */

class Goods extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
    public $attr=array();
	public function tableName()
	{
		return 'goods';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'required'),
			array('stock, price, type, child_id, draft', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>120),
			array('currency', 'length', 'max'=>4),
			array('pic_min, pic_full', 'length', 'max'=>135),
			array('gender', 'length', 'max'=>10),
            array('desc_min, desc_full, description, keywords, date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, stock, desc_min, desc_full, date, price, currency, pic_min, pic_full, child_id, gender, description, keywords, draft, type', 'safe', 'on'=>'search'),
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
			'id' => 'Goods',
			'title' => 'Title',
			'stock' => 'Наличие',
			'desc_min' => 'Desc Min',
			'desc_full' => 'Desc Full',
			'date' => 'Date',
			'price' => 'Price',
			'currency' => 'Currency',
			'pic_min' => 'Pic Min',
			'pic_full' => 'Pic Full',
			'child_id' => 'Child',
			'gender' => 'Gender',
			'description' => 'Description',
			'keywords' => 'Keywords',
            'draft' => 'Опубликовать',
            'type' => 'Тип',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('stock',$this->stock);
		$criteria->compare('desc_min',$this->desc_min,true);
		$criteria->compare('desc_full',$this->desc_full,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('currency',$this->currency,true);
		$criteria->compare('pic_min',$this->pic_min,true);
		$criteria->compare('pic_full',$this->pic_full,true);
		$criteria->compare('child_id',$this->child_id);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('keywords',$this->keywords,true);
        $criteria->compare('draft',$this->draft,true);
        $criteria->compare('type',$this->type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Goods the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}