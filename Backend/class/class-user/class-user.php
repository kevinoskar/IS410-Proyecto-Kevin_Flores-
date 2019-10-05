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
protected $nameOwner;
protected $creditNumber;
protected $expirationDate;
protected $cvv;
protected $urlProfileImage;
protected $productsPurchased;
protected $wishList;
protected $companysFollowing;
    
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
        $nameOwner,
        $creditNumber,
        $expirationDate,
		$cvv,
		$urlProfileImage
    ){
        $this->name=$name;
        $this->lastName=$lastName;
        $this->birthday=$birthday;
        $this->gender=$gender;
        $this->postal=$postal;
        $this->country=$country;
        $this->state=$state;
        $this->address=$address;
        $this->email=$email;
        $this->password=$password;
        $this->nameOwner=$nameOwner;
        $this->creditNumber=$creditNumber;
        $this->expirationDate=$expirationDate;
		$this->cvv=$cvv;
		$this->urlProfileImage=$urlProfileImage;
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
        $arrayUser['password']=password_hash($this->password,PASSWORD_DEFAULT);
        $arrayUser['nameOwner']=$this->nameOwner;
        $arrayUser['creditNumber']=$this->creditNumber;
        $arrayUser['expirationDate']=$this->expirationDate;
        $arrayUser['cvv']=$this->cvv;
        $arrayUser['urlProfileImage']=$this->urlProfileImage;
        $arrayUser['productsPurchased']=$this->productsPurchased;
        $arrayUser['wishList']=$this->wishList;
		$arrayUser['companysFollowing']=$this->companysFollowing;
        return $arrayUser;

    }
    
	public function createUser($db){
		$users = $this->getData();
		$result = $db->getReference('users')
		   ->push($users);
		   
		if ($result->getKey() != null)
			return '{"mensaje":"Usuario Guardado con exito","key":"'.$result->getKey().'"}';
		else 
			return '{"mensaje":"Error al guardar el registro"}';
	}

	public static function deleteUser($db,$keyfirebase){
		$result=$db->getReference('users')
			->getChild($keyfirebase)
			->remove();
		echo '{"mensaje":"Se eliminó el usuario con id '.$keyfirebase.'"}';
	}

	public static function obtainUser($db,$keyfirebase){
		$result=$db->getReference('users')
			->getChild($keyfirebase)
			->getValue();
		echo json_encode($result);
	}

	public static function obtainUsers($db){
		$result=$db->getReference('users')
			->getSnapshot()
			->getValue();
		echo json_encode($result);
	}
	public function updateUser($db,$keyfirebase){
		$result = $db->getReference('users')
		->getChild($keyfirebase)
		->set($this->getData());
	
		if ($result->getKey() != null)
			return '{"mensaje":"Usuario actualizado","key":"'.$result->getKey().'"}';
		else 
			return '{"mensaje":"Error al actualizar el registro"}';
	}
	public static function loginUser($db,$email,$password){
		$result=$db->getReference('users')
			->orderByChild('email')
			->equalTo($email)
			->getSnapshot()
			->getValue();
	
		$key=array_key_first($result);
		$valid=password_verify($password,$result[$key]['password']);
		
		$answer['valid']=$valid==1?true:false;
		if($answer['valid']){
			$answer['key']=$key;
			$answer['email']=$result[$key]['email'];
			$answer['token']=bin2hex(openssl_random_pseudo_bytes(16));
			setcookie('key',$answer['key'],time()+(86400*30),"/");
			setcookie('email',$answer['email'],time()+(86400*30),"/");
			setcookie('token',$answer['token'],time()+(86400*30),"/");


			$db->getReference('users/'.$key.'/token')
				->set($answer['token']);
		}
		echo json_encode($answer);
	}
	public static function logoutUser(){
		setcookie('key','',time()-3600,"/");
		setcookie('email','',time()-3600,"/");
		setcookie('token','',time()-3600,"/");
		header("Location: ../../../Login/index.html");

	}

	public static function verifyAuthenticity($db){
		if(!isset($_COOKIE['key']))
			return false;
		$result=$db->getReference('users')
				->getChild($_COOKIE['key'])
				->getValue();

			if($result['token']==$_COOKIE['token'])
				return true;
			else
				return false;
			
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

}



?>