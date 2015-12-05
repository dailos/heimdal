<?php

class ClientController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}
	
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' action
				'actions'=>array('index','status','operation','realtime','displayOperation', 'getOperationData'),
				'users'=>array('@'),
			),						
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{				
		//Redirect to the first device
		if(is_array(Yii::app()->user->clientMenu))
		{
			$this->redirect(Yii::app()->user->clientMenu[0]['url']);			
		}
		else
		{
			$this->render('error');
		}	
	}

	public function actionStatus($id = null){		
		if(in_array($id, Yii::app()->user->devices))
		{			
			if(!$dataProvider = Yii::app()->session['devices_'.$id])
			{
				$criteria = new CDbCriteria;
				$criteria->with = array('ifaces', 'ifaces.ports');	
				$criteria->together = true;		
				$criteria->addInCondition('t.id', array($id)); 								
				$dataProvider=new CActiveDataProvider('Device', array('criteria'=>$criteria));		
				Yii::app()->session['device_'.$id] = $dataProvider;
			}
			$this->render('status',array( 'dataProvider'=>$dataProvider));
		}
		else
		{
			$this->render('error');
		}
	}

	public function actionOperation($id = null){
		if(in_array($id, Yii::app()->user->devices))
		{		
			$criteria = new CDbCriteria;
			$criteria->with = array( 
				'iface' =>array(				
					'joinType' => 'INNER JOIN',
					'condition' => 'iface.device_id='.$id,
					'order' => 't.start DESC'
				)
			);				 							
			$dataProvider=new CActiveDataProvider('Operation', array('criteria'=>$criteria));				
			$this->render('operation',array( 'dataProvider'=>$dataProvider,	'deviceId' => $id));
		}
		else
		{
			$this->render('error');
		}
	}

	public function actionRealtime($id = null){
		if(in_array($id, Yii::app()->user->devices))
		{					
			$this->render('realtime',array('deviceId' => $id));
		}
		else
		{
			$this->render('error');
		}
	}

	public function actionDisplayOperation($id = null)
	{
		$model = Record::model()->findAllByAttributes(array('operation_id'=> $id));				
		$values = CHtml::listData($model, 'port_id','value' ,'timestamp');				
		$jsonarray = array();				
		foreach ($values as $date => $value) {							
			$jsonarray[] = array_merge(array($date), $value);			
		}											
		$model = Operation::model()->with('iface')->findByPK($id);
		$model->nextPrev();																
		$this->render('displayOperation', array(
			'values' => $jsonarray, 
			'operation' => $model,		
		));		
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='client-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
