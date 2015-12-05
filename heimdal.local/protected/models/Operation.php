<?php

/**
 * This is the model class for table "operation".
 *
 * The followings are the available columns in table 'operation':
 * @property integer $id
 * @property string $start
 * @property string $end
 * @property integer $alarm
 * @property integer $iface_id
 *
 * The followings are the available model relations:
 * @property Iface $iface
 * @property Record[] $records
 */
class Operation extends CActiveRecord
{

	private $prevId = null;
   	private $nextId = null;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'operation';
	}

	//Virtual field

	public function getDuration()
	{
		return  Yii::app()->Date->duration($this->start,$this->end);
	}

	public function getAlarmMessage(){
		//$type = $this->alarm? 'important' : 'success';
		$label = $this->alarm? 'FALLO' : 'NORMAL';
		return $label;
		//return 	$this->widget('bootstrap.widgets.TbLabel', array('type'=>$type,'label'=>$label));
	}


	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('iface_id', 'required'),
			array('alarm, iface_id', 'numerical', 'integerOnly'=>true),
			array('start, end', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, start, end, alarm, iface_id, duration', 'safe', 'on'=>'search'),
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
			'records' => array(self::HAS_MANY, 'Record', 'operation_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'start' => 'Encendido',
			'end' => 'Apagado',
			'alarm' => 'Anomalía',
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
		$criteria->compare('start',$this->start,true);
		$criteria->compare('end',$this->end,true);
		$criteria->compare('alarm',$this->alarm);
		$criteria->compare('duration',$this->duration);
		$criteria->compare('iface_id',$this->iface_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


   public function nextPrev() 
   {
  		$records=NULL;	    
	    $records=$this->findAll(array('select'=>'id', 'order'=>'id DESC'));
	    foreach($records as $i=>$r){
	    	if($r->id == $this->id){
	       		$this->nextId = isset($records[$i-1]) ? $records[$i-1]->id : NULL;
	       		$this->prevId = isset($records[$i+1]) ? $records[$i+1]->id : NULL;
	       		break;
	        }
	    }    	
	}

	public function getPrevId() {
	    return $this->prevId;
	}

	public function getNextId() {
	    return $this->nextId;
   	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Operation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
