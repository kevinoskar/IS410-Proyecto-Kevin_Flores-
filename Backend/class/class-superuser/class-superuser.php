<?php
class SuperUser{
	protected $emailSuperuser;
	protected $passwordSuperuser;

	public function getEmailSuperuser(){
		return $this->emailSuperuser;
    }
    public function __construct(
        $emailSuperuser,
        $passwordSuperuser

    ){
        $this->emailSuperuser=$emailSuperuser;
        $this->passwordSuperuser=$passwordSuperuser;
    }

    public function getData(){
        $SU['emailSuperuser']=$this->emailSuperuser;
        $SU['passwordSuperuser']=password_hash($this->passwordSuperuser,PASSWORD_DEFAULT);
        return $SU;
    }
    public function createSuperuser($db){
        $super=$this->getData();
        $result=$db->getReference('superuser')
            ->push($super);

        if($result->getKey() != null)
			return '{"mensaje":"SuperUsuario guardado con éxito","key":"'.$result->getKey().'"}';
		else 
			return '{"mensaje":"Error al guardar el superUsuario"}';
		
    }


	public function setEmailSuperuser($emailSuperuser){
		$this->emailSuperuser = $emailSuperuser;
	}
	public function getPasswordSuperuser(){
		return $this->passwordSuperuser;
	}

	public function setPasswordSuperuser($passwordSuperuser){
		$this->passwordSuperuser = $passwordSuperuser;
	}

	public static function loginSuperuser($db,$emailSuperuser,$passwordSuperuser){
        $result=$db->getReference('superuser')
			->orderByChild('emailSuperuser')
			->equalTo($emailSuperuser)
			->getSnapshot()
            ->getValue();
            
            $key=array_key_first($result);
            $valid=password_verify($passwordSuperuser,$result[$key]['passwordSuperuser']);
            
            $answer['valid']=$valid==1?true:false;
            if($answer['valid']){
                $answer['keySuperuser']=$key;
                $answer['emailSuperuser']=$result[$key]['emailSuperuser'];
                $answer['tokenSuperuser']=bin2hex(openssl_random_pseudo_bytes(16));
                setcookie('keySuperuser',$answer['keySuperuser'],time()+(86400*30),"/");
                setcookie('emailSuperuser',$answer['emailSuperuser'],time()+(86400*30),"/");
                setcookie('tokenSuperuser',$answer['tokenSuperuser'],time()+(86400*30),"/");
    
    
                $db->getReference('superuser/'.$key.'/tokenSuperuser')
                    ->set($answer['tokenSuperuser']);
            }
            echo json_encode($answer);
    
    }
    public static function logoutSuperuser(){
		setcookie('key','',time()-3600,"/");
		setcookie('emailSuperuser','',time()-3600,"/");
		setcookie('tokenSuperuser','',time()-3600,"/");
		header("Location: ../../../Login/index.html");

    }
    public static function verifyAuthenticity($db){
		if(!isset($_COOKIE['keySuperuser']))
			return false;
		$result=$db->getReference('superuser')
				->getChild($_COOKIE['keySuperuser'])
				->getValue();

			if($result['tokenSuperuser']==$_COOKIE['tokenSuperuser'])
				return true;
			else
				return false;
			
	}

}
?>