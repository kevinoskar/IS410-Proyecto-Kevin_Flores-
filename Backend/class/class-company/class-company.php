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
	protected $latituteLongitud;
	protected $products=NULL;
	protected $keyCompany;

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
		$latituteLongitud,
		$products
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
		$this->latituteLongitud = $latituteLongitud;
		$this->products = $products;
	}

	public function getData(){
		$arrayCompanys['nameCompany']=$this->nameCompany;
		$arrayCompanys['descriptionCompany']=$this->descriptionCompany;
		$arrayCompanys['oriented']=$this->oriented;
		$arrayCompanys['fundationDate']=$this->fundationDate;
		$arrayCompanys['emailCompany']=$this->emailCompany;
		$arrayCompanys['passwordCompany']=$this->passwordCompany;
		$arrayCompanys['postalCode']=$this->postalCode;
		$arrayCompanys['country']=$this->country;
		$arrayCompanys['state']=$this->state;
		$arrayCompanys['addressCompany']=$this->addressCompany;
		$arrayCompanys['phoneNumberCompany']=$this->phoneNumberCompany;
		$arrayCompanys['latituteLongitud']=$this->latituteLongitud;
		$arrayCompanys['products']=$this->products;
		return $arrayCompanys;

	}

	public function createCompany($db){
		$company = $this->getData();
		$result = $db->getReference('companys')
		   ->push($company);
		   
		if ($result->getKey() != null)
			return '{"mensaje":"Empresa Guardada con exito","key":"'.$result->getKey().'"}';
		else 
			return '{"mensaje":"Error al guardar el registro"}';
		
		
		$this->setKeyCompany($result->getKey());	
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
	public function getLatituteLongitud(){
		return $this->latituteLongitud;
	}

	public function setLatituteLongitud($latituteLongitud){
		$this->latituteLongitud = $latituteLongitud;
	}
	public function getProducts(){
		return $this->products;
	}

	public function setProducts($products){
		$this->products = $products;
	}
	public function getsessionState(){
		return $this->sessionState;
	}

	public function setsessionState($sessionState){
		$this->sessionState = $sessionState;
	}
	public function getKeyCompany(){
		return $this->keyCompany;
	}

	public function setKeyCompany($keyCompany){
		$this->keyCompany = $keyCompany;
	}
	
}
?>