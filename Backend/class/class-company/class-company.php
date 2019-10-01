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
	protected $productos;

	public function __construct(
		$nameCompany = null,
		$descriptionCompany = null,
		$oriented = null,
		$fundationDate = null,
		$emailCompany = null,
		$passwordCompany = null,
		$postalCode = null,
		$country = null,
		$state = null,
		$addressCompany = null,
		$phoneNumberCompany = null,
		$latituteLongitud = null,
		$productos = null
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
		$this->productos = $productos;
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
	public function getProductos(){
		return $this->productos;
	}

	public function setProductos($productos){
		$this->sessionState = $sessionState;
	}
	public function getsessionState(){
		return $this->sessionState;
	}

	public function setsessionState($sessionState){
		$this->sessionState = $sessionState;
	}



	public function createCompany(){
	}
	public function obtainCompany(){
	}
	public function obtainCompanys(){
	}
	public function deleteCompany(){
	}
	public function updateCompany(){
	}

}
?>