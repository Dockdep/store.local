<?php

/**
 * This is the model class for table "produser".
 *
 * The followings are the available columns in table 'produser':
 * @property integer $prod_id
 * @property string $name
 * @property integer $parent_id
 */
class Produser extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'produser';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('parent_id, category_id', 'numerical','integerOnly'=>true),
			array('name', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('prod_id, name, parent_id, category_id',  'safe', 'on'=>'search'),
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
			'prod_id' => 'Prod',
			'name' => 'Name',
			'parent_id' => 'Parent',
            'category_id' => 'Categories',
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

		$criteria->compare('prod_id',$this->prod_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('parent_id',$this->parent_id);
        $criteria->compare('category_id',$this->category_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getMainWatch()
    {
        return $this->findAll("parent_id = '0' AND category_id = '1'");

    }

    public function getByParent($id)
    {
        $result = $this->findAll("parent_id = :id AND category_id = '1'", array('id' =>$id));
        if(!$result) {
            $result = $this->findAll("prod_id = :id AND category_id = '1'", array('id' =>$id));
        }
        return $result;

    }

    public function getProduserName($id) {
         $result = $this->getByParent($id);
         foreach($result as $item) {
             $array[] = $item['prod_id'];
         }
        return $array;
    }

    public function getParentname($id) {
            $a = $this->find("prod_id = :id AND category_id = '1'", array('id' =>$id));
            return  $a;

    }

    public function get()
    {

    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Produser the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function notChild($parent_id)
    {
        if( $parent_id != null && $parent_id['0']['parent_id'] ) {
            return $this->getParentname($parent_id['0']['parent_id']);
        }

    }
}
