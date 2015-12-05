<?php
class ApiController extends Controller
{		

	private $_device = null;
	
	public function filters()
	{
		return array();
	}

	public function beforeAction()
	{											
	   	if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) 
	    {	        	    	
	        return false;
	    }	   	  
	  	$this->_device =  Device::model()->findByPk($_SERVER['PHP_AUTH_USER']);  		     	  	    
	    if($this->_device===null) 
	    {	        
	        return false;
	    } 	    
	    else if($this->_device->token != $_SERVER['PHP_AUTH_PW']) 
	    {	        
	        return false;
	    }	    
	    return true;
	}

	public function actionRegister()
	{			 								
		$this->_device->saveAttributes(array('ip' => Yii::app()->request->userHostAddress));				
		$ifaces=Iface::model()->with('ports')->findAll('LOWER(device_id)=?',array(strtolower($this->_device->id)));					   		
	    if(!empty($ifaces))
	    {
	    	$tmpIfaces = [];
	        foreach($ifaces as $iface)
	        {        
	        	$tmpIface = $iface->attributes;	        		        	
	        	foreach($iface->ports as $port)
	        	{
	        	 	$tmpIface['ports'][] = $port->attributes ;	        	
	        	}
	        	$tmpIfaces[] = $tmpIface;
	        }
	    }    
	    $this->_sendResponse(200, $tmpIfaces);
	}

	public function actionOperation()	
	{						
		$post = file_get_contents("php://input");
		$postData = CJSON::decode($post, true);				
		$this->_device->ifaces[$postData['iface_id']]->saveAttributes(array('lastactivity' => $postData['start']));

		$operation = new Operation; 					
		$postData['alarm'] = $postData['alarm']? 1 : 0;
		$operation->attributes=$postData;						
		$transaction = Yii::app()->db->beginTransaction();
		try
		{
			$operation->save();
			$operation_id = $operation->id;	

			foreach($postData['records'] as $record)
			{
				$record['operation_id']  = $operation_id;
				$recordModel = new Record;				
				$recordModel->attributes = $record;				
				$recordModel->save();
			}
			$transaction->commit();
			$this->_sendResponse(200);
		}
		catch(Exception $e)
		{
			$transaction->rollBack();
			$this->_sendResponse(400);
		}	   
	}

	private function _sendResponse($status = 400, $data = array())
	{
		$msg = 'Bad Request';
		if($status == 200)
			$msg = 'OK'; 	   
	    header('HTTP/1.1 ' . $status . ' ' . $msg); 
	    header('Content-Type: application/json' );	   
	    echo CJSON::encode($data);	   	  
	    Yii::app()->end();
	}	

}
