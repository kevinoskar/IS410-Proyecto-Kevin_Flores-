<?php

class User{

protected $name;
protected $lastName;
protected $birthday;
protected $gender;
protected $postal;
protected $country;
protected $state;
protected $address;
protected $email;
protected $password;
protected $clientCode;
protected $nameOwner;
protected $creditNumber;
protected $expirationDate;
protected $cvv;
protected $urlProfileImage;
protected $productsPurchased;
protected $wishList;
protected $companysFollowing;
protected $sessionState;
    
    public function __construct(
        $name,
        $lastName,
        $birthday,
        $gender,
        $postal,
        $country,
        $state,
        $address,
        $email,
        $password,
        $clientCode,
        $nameOwner,
        $creditNumber,
        $expirationDate,
        $cvv,
        $urlProfileImage,
        $productsPurchased,
        $wishList,
		$companysFollowing,
		$sessionState

    ){
        $this->$name=name;
        $this->$lastName=lastName;
        $this->$birthday=birthday;
        $this->$gender=gender;
        $this->$postal=postal;
        $this->$country=country;
        $this->$state=state;
        $this->$address=address;
        $this->$email=email;
        $this->$password=password;
        $this->$clientCode=clientCode;
        $this->$nameOwner=nameOwner;
        $this->$creditNumber=creditNumber;
        $this->$expirationDate=expirationDate;
        $this->$cvv=cvv;
        $this->$urlProfileImage=urlProfileImage;
        $this->$productsPurchased = productsPurchased;
		$this->$wishList = wishList;
		$this->$sessionState = sessionState;
	}
    //Methods

    public function getData(){
        $arrayUser['name']=$this->name;
        $arrayUser['lastName']=$this->lastName;
        $arrayUser['birthday']=$this->birthday;
        $arrayUser['gender']=$this->gender;
        $arrayUser['postal']=$this->postal;
        $arrayUser['country']=$this->country;
        $arrayUser['state']=$this->state;
        $arrayUser['address']=$this->address;
        $arrayUser['email']=$this->email;
        $arrayUser['password']=$this->password;
        $arrayUser['clientCode']=$this->clientCode;
        $arrayUser['nameOwner']=$this->nameOwner;
        $arrayUser['creditNumber']=$this->creditNumber;
        $arrayUser['expirationDate']=$this->expirationDate;
        $arrayUser['cvv']=$this->cvv;
        $arrayUser['urlProfileImage']=$this->urlProfileImage;
        $arrayUser['productsPurchased']=$this->productsPurchased;
        $arrayUser['wishList']=$this->wishList;
		$arrayUser['companysFollowing']=$this->companysFollowing;
		$arrayUser['sessionState']=$this->sessionState;
        return $arrayUser;

    }
    



    //Getters & Setters
	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}
	public function getLastName(){
		return $this->lastName;
	}

	public function setLastName($lastName){
		$this->lastName = $lastName;
	}
	public function getBirthday(){
		return $this->birthday;
	}

	public function setBirthday($birthday){
		$this->birthday = $birthday;
	}
	public function getGender(){
		return $this->gender;
	}

	public function setGender($gender){
		$this->gender = $gender;
	}
	public function getPostal(){
		return $this->postal;
	}

	public function setPostal($postal){
		$this->postal = $postal;
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
	public function getAddress(){
		return $this->address;
	}

	public function setAddress($address){
		$this->address = $address;
	}
	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}
	public function getPassword(){
		return $this->password;
	}

	public function setPassword($password){
		$this->password = $password;
	}
	public function getNameOwner(){
		return $this->nameOwner;
	}

	public function setNameOwner($nameOwner){
		$this->nameOwner = $nameOwner;
	}
	public function getCreditNumber(){
		return $this->creditNumber;
	}

	public function setCreditNumber($creditNumber){
		$this->creditNumber = $creditNumber;
	}
	public function getExpirationDate(){
		return $this->expirationDate;
	}

	public function setExpirationDate($expirationDate){
		$this->expirationDate = $expirationDate;
	}
	public function getCvv(){
		return $this->cvv;
	}

	public function setCvv($cvv){
		$this->cvv = $cvv;
	}
	public function getUrlProfileImage(){
		return $this->urlProfileImage;
	}

	public function setUrlProfileImage($urlProfileImage){
		$this->urlProfileImage = $urlProfileImage;
	}
	public function getProductsPurchased(){
		return $this->productsPurchased;
	}

	public function setProductsPurchased($productsPurchased){
		$this->productsPurchased = $productsPurchased;
	}
	public function getWishList(){
		return $this->wishList;
	}

	public function setWishList($wishList){
		$this->wishList = $wishList;
	}
	public function getCompanysFollowing(){
		return $this->companysFollowing;
	}

	public function setCompanysFollowing($companysFollowing){
		$this->companysFollowing = $companysFollowing;
	}
	public function getsessionState(){
		return $this->sessionState;
	}

	public function setsessionState($sessionState){
		$this->sessionState = $sessionState;
	}
	

}



?>