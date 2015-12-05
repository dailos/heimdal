<?php

/**
 * This is the model class for table "port".
 *
 * The followings are the available columns in table 'port':
 * @property integer $id
 * @property string $name
 * @property string $ref
 * @property string $type
 * @property double $onthreshold
 * @property double $alarmthreshold
 * @property integer $ontransient
 * @property integer $offtransient
 * @property integer $detectioncycles
 * @property integer $iface_id
 *
 * The followings are the available model relations:
 * @property Iface $iface
 * @property Record[] $records
 */
class Port extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'port';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, ref, type, onthreshold, alarmthreshold, ontransient, offtransient, iface_id', 'required'),
			array('ontransient, offtransient, iface_id', 'numerical', 'integerOnly'=>true),
			array('onthreshold, alarmthreshold', 'numerical'),
			array('name, ref, type', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, ref, type, onthreshold, alarmthreshold, ontransient, offtransient, iface_id', 'safe', 'on'=>'search'),
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
			'iface' => array(self::BELONGS_TO, 'Iface', 'iface_id'),
			'records' => array(self::HAS_MANY, 'Record', 'port_id'),
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
			'ref' => 'Referencia',
			'type' => 'Tipo',
			'onthreshold' => 'Nivel de encendido',
			'alarmthreshold' => 'Nivel de alarma',
			'ontransient' => 'Transitorio de encendido',
			'offtransient' => 'Transitorio de apagado',			
			'iface_id' => 'Interface',
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
		$criteria->compare('ref',$this->ref,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('onthreshold',$this->onthreshold);
		$criteria->compare('alarmthreshold',$this->alarmthreshold);
		$criteria->compare('ontransient',$this->ontransient);
		$criteria->compare('offtransient',$this->offtransient);	
		$criteria->compare('iface_id',$this->iface_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Port the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
