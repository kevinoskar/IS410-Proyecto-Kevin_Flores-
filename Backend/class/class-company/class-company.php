<?php
class Company{
	protected $nameCompany;
	protected $descriptionCompany;
	protected $oriented;
	protected $fundationDate;
	protected $emailCompany;
	protected $passwordCompany;
	protected $postalCode;
	protected $country;
	protected $state;
	protected $addressCompany;
	protected $phoneNumberCompany;
	protected $latitute;
	protected $longitude;
	protected $products=NULL;
	protected $branchOffice=NULL;
	protected $urlbanner;
	protected $urlimagenCompany;


	

	public function __construct(
		$nameCompany,
		$descriptionCompany,
		$oriented,
		$fundationDate,
		$emailCompany,
		$passwordCompany,
		$postalCode,
		$country,
		$state,
		$addressCompany,
		$phoneNumberCompany,
		$latitute,
		$longitude,
		$urlbanner,
		$urlimagenCompany

	){
		$this->nameCompany = $nameCompany;
		$this->descriptionCompany = $descriptionCompany;
		$this->oriented = $oriented;
		$this->fundationDate = $fundationDate;
		$this->emailCompany = $emailCompany;
		$this->passwordCompany = $passwordCompany;
		$this->postalCode = $postalCode;
		$this->country = $country;
		$this->state = $state;
		$this->addressCompany = $addressCompany;
		$this->phoneNumberCompany = $phoneNumberCompany;
		$this->latitute = $latitute;
		$this->longitude=$longitude;
		$this->urlbanner = $urlbanner;
		$this->urlimagenCompany = $urlimagenCompany;
	}

	public function getData(){
		$arrayCompanys['nameCompany']=$this->nameCompany;
		$arrayCompanys['descriptionCompany']=$this->descriptionCompany;
		$arrayCompanys['oriented']=$this->oriented;
		$arrayCompanys['fundationDate']=$this->fundationDate;
		$arrayCompanys['emailCompany']=$this->emailCompany;
		$arrayCompanys['passwordCompany']=password_hash($this->passwordCompany,PASSWORD_DEFAULT);
		$arrayCompanys['postalCode']=$this->postalCode;
		$arrayCompanys['country']=$this->country;
		$arrayCompanys['state']=$this->state;
		$arrayCompanys['addressCompany']=$this->addressCompany;
		$arrayCompanys['phoneNumberCompany']=$this->phoneNumberCompany;
		$arrayCompanys['latitute']=$this->latitute;
		$arrayCompanys['longitude']=$this->longitude;
		$arrayCompanys['urlbanner']=$this->urlbanner;
		$arrayCompanys['urlimagenCompany']=$this->urlimagenCompany;
		return $arrayCompanys;

	}

	public function createCompany($db){
		$company = $this->getData();
		$result = $db->getReference('companys')
		   ->push($company);
		   
		if ($result->getKey() != null){
				$answer['valid']=true;
				$answer['keyCompany']=$result->getKey();
				$answer['emailCompany']=$company['emailCompany'];
				$answer['tokenCompany']=bin2hex(openssl_random_pseudo_bytes(16));
				setcookie('keyCompany',$answer['keyCompany'],time()+(86400*30),"/");
				setcookie('emailCompany',$answer['emailCompany'],time()+(86400*30),"/");
				setcookie('tokenCompany',$answer['tokenCompany'],time()+(86400*30),"/");


				$db->getReference('companys/'.$result->getKey().'/tokenCompany')
					->set($answer['tokenCompany']);

			return '{"mensaje":"Empresa Guardada con exito","key":"'.$result->getKey().'",
					"valid":"true"}';
		
			}else {
				return '{"mensaje":"Error al guardar el registro"}';
		
		}
	}

	public static function obtainCompany($db,$keyfirebase){
		$result=$db->getReference('companys')
			->getChild($keyfirebase)
			->getValue();
		echo json_encode($result);

	}
	public static function obtainCompanys($db){
		$result=$db->getReference('companys')
			->getSnapshot()
			->getValue();
		echo json_encode($result);

	}
	public static function deleteCompany($db,$keyfirebase){
		$result=$db->getReference('companys')
			->getChild($keyfirebase)
			->remove();
		echo '{"mensaje":"Se eliminó la empresa con id '.$keyfirebase.'"}';
	}
	public function updateCompany($db,$keyfirebase){
		$result = $db->getReference('companys')
		->getChild($keyfirebase)
		->set($this->getData());
	
		if ($result->getKey() != null)
			return '{"mensaje":"Empresa actualizada","key":"'.$result->getKey().'"}';
		else 
			return '{"mensaje":"Error al actualizar la empresa"}';
	}
	public static function loginCompany($db,$emailCompany,$passwordCompany){
		$result=$db->getReference('companys')
			->orderByChild('emailCompany')
			->equalTo($emailCompany)
			->getSnapshot()
			->getValue();
		
		$key=array_key_first($result);
		$valid=password_verify($passwordCompany,$result[$key]['passwordCompany']);
		
		$answer['valid']=$valid==1?true:false;
		if($answer['valid']){
			$answer['keyCompany']=$key;
			$answer['emailCompany']=$result[$key]['emailCompany'];
			$answer['tokenCompany']=bin2hex(openssl_random_pseudo_bytes(16));
			setcookie('keyCompany',$answer['keyCompany'],time()+(86400*30),"/");
			setcookie('emailCompany',$answer['emailCompany'],time()+(86400*30),"/");
			setcookie('tokenCompany',$answer['tokenCompany'],time()+(86400*30),"/");


			$db->getReference('companys/'.$key.'/tokenCompany')
				->set($answer['tokenCompany']);
				echo json_encode($answer);
		}else{
			echo '{"valid":"false"}';
			exit();
		}
	}
	public static function logoutCompany(){
		setcookie('keyCompany','',time()-3600,"/");
		setcookie('emailCompany','',time()-3600,"/");
		setcookie('tokenCompany','',time()-3600,"/");
		header("Location: ../../../Login/index.html");

	}

	public static function verifyAuthenticity($db){
		if(!isset($_COOKIE['keyCompany']))
			return false;
		

		$result=$db->getReference('companys')
				->getChild($_COOKIE['keyCompany'])
				->getValue();

			if($result['tokenCompany']==$_COOKIE['tokenCompany'])
				return true;
			else
				return false;
			
	}
	public static function tokenAndKey(){
		if(isset($_COOKIE['keyCompany'])){
			$result['keyCompany']=$_COOKIE['key'];
			$result['tokenCompany']=$_COOKIE['tokenCompany'];
			echo json_encode($result);	 

		}
		exit();
	}
	





	public function getNameCompany(){
		return $this->nameCompany;
	}

	public function setNameCompany($nameCompany){
		$this->nameCompany = $nameCompany;
	}
	public function getDescriptionCompany(){
		return $this->descriptionCompany;
	}

	public function setDescriptionCompany($descriptionCompany){
		$this->descriptionCompany = $descriptionCompany;
	}
	public function getOriented(){
		return $this->oriented;
	}

	public function setOriented($oriented){
		$this->oriented = $oriented;
	}
	public function getFundationDate(){
		return $this->fundationDate;
	}

	public function setFundationDate($fundationDate){
		$this->fundationDate = $fundationDate;
	}
	public function getEmailCompany(){
		return $this->emailCompany;
	}

	public function setEmailCompany($emailCompany){
		$this->emailCompany = $emailCompany;
	}
	public function getPasswordCompany(){
		return $this->passwordCompany;
	}

	public function setPasswordCompany($passwordCompany){
		$this->passwordCompany = $passwordCompany;
	}
	public function getPostalCode(){
		return $this->postalCode;
	}

	public function setPostalCode($postalCode){
		$this->postalCode = $postalCode;
	}
	public function getCountry(){
		return $this->country;
	}

	public function setCountry($country){
		$this->country = $country;
	}
	public function getState(){
		return $this->state;
	}

	public function setState($state){
		$this->state = $state;
	}
	public function getAddressCompany(){
		return $this->addressCompany;
	}

	public function setAddressCompany($addressCompany){
		$this->addressCompany = $addressCompany;
	}
	public function getPhoneNumberCompany(){
		return $this->phoneNumberCompany;
	}

	public function setPhoneNumberCompany($phoneNumberCompany){
		$this->phoneNumberCompany = $phoneNumberCompany;
	}
	public function getLatitute(){
		return $this->latitute;
	}

	public function setLatitute($latitute){
		$this->latitute = $latitute;
	}
	public function getLongitude(){
		return $this->longitude;
	}

	public function setLongitude($longitude){
		$this->longitude = $longitude;
	}
	public function getProducts(){
		return $this->products;
	}

	public function setProducts($products){
		$this->products = $products;
	}
	public function getKeyCompany(){
		return $this->keyCompany;
	}

	public function setKeyCompany($keyCompany){
		$this->keyCompany = $keyCompany;
	}
	public function getBranchOffice(){
		return $this->branchOffice;
	}

	public function setBranchOffice($branchOffice){
		$this->branchOffice = $branchOffice;
	}
	
}
?>