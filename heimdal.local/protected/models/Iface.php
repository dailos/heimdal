<?php

/**
 * This is the model class for table "iface".
 *
 * The followings are the available columns in table 'iface':
 * @property integer $id
 * @property string $name
 * @property string $lastactivity
 * @property integer $device_id
 * @property integer $pollingtime
 * @property integer $detectioncycles
 *
 * The followings are the available model relations:
 * @property Device $device
 * @property Operation[] $operations
 * @property Port[] $ports
 */
class Iface extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'iface';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('device_id, pollingtime, detectioncycles', 'required'),
			array('device_id, pollingtime, detectioncycles', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>45),
			array('lastactivity', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, lastactivity, device_id, pollingtime, detectioncycles', 'safe', 'on'=>'search'),
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
			'device' => array(self::BELONGS_TO, 'Device', 'device_id'),
			'operations' => array(self::HAS_MANY, 'Operation', 'iface_id'),
			'ports' => array(self::HAS_MANY, 'Port', 'iface_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Nombre',
			'lastactivity' => 'Último encendido',
			'device_id' => 'Dispositivo',
			'pollingtime' => 'Intervalo de muestreo',
			'detectioncycles' => 'Ciclos de detección',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('lastactivity',$this->lastactivity,true);
		$criteria->compare('device_id',$this->device_id);
		$criteria->compare('pollingtime',$this->pollingtime);
		$criteria->compare('detectioncycles',$this->detectioncycles);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Iface the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
