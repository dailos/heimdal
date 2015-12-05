<?php

/**
 * This is the model class for table "record".
 *
 * The followings are the available columns in table 'record':
 * @property integer $id
 * @property string $timestamp
 * @property double $value
 * @property integer $port_id
 * @property integer $operation_id
 *
 * The followings are the available model relations:
 * @property Port $port
 * @property Operation $operation
 */
class Record extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'record';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('port_id, operation_id', 'required'),
			array('port_id, operation_id', 'numerical', 'integerOnly'=>true),
			array('value', 'numerical'),
			array('timestamp', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, timestamp, value, port_id, operation_id', 'safe', 'on'=>'search'),
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
			'port' => array(self::BELONGS_TO, 'Port', 'port_id'),
			'operation' => array(self::BELONGS_TO, 'Operation', 'operation_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'timestamp' => 'Hora',
			'value' => 'Valor',
			'port_id' => 'Puerto',
			'operation_id' => 'Operación',
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
		$criteria->compare('timestamp',$this->timestamp,true);
		$criteria->compare('value',$this->value);
		$criteria->compare('port_id',$this->port_id);
		$criteria->compare('operation_id',$this->operation_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Record the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
