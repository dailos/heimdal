<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	/**
	 * Authenticates a user.	 
	 * @return boolean whether authentication succeeds.
	 */	
	public function authenticate()
	{
		$user = User::model()->findByAttributes(array('username'=>$this->username));

		if ($user===null) 
		{ // No user found!
    		$this->errorCode=self::ERROR_USERNAME_INVALID;
		} 
		else if ($user->password !== SHA1($this->password) ) 
		{ // Invalid password!
    		$this->errorCode=self::ERROR_PASSWORD_INVALID;
		} 
		else 
		{ // Okay!    		
			if(!$user->admin)
			{
				$ARData = DeviceUser::model()->with('device')->findAllByAttributes(array('user_id'=>$user->id)); 
				$devices = CHtml::listData( $ARData, 'device_id','device.reference' );	
				$menu = array();
				$mydevices = array();
				foreach ($devices as $id=>$name)
				{
					$menu[] = array('label' => $name, 'url' => '/client/status/'.$id);
					$mydevices[]=$id;

				}					
    			$this->setState('clientMenu',$menu);
    			$this->setState('devices',$mydevices);
			}
    		$this->setState('isAdmin',$user->admin ? true: false);    		
    		$this->_id=$user->id;    		
    		$this->errorCode=self::ERROR_NONE;
    	}

    	return !$this->errorCode;
    }
   
    public function getId()
    {
        return $this->_id;
    }
   
}