<?php
class WishList{
	protected $keyCompany;
	protected $keyProduct;
	protected $keyUser;

	public function getData(){
		$a['keyCompany']=$this->keyCompany;
		$a['keyProduct']=$this->keyProduct;
		$a['keyUser']=$this->keyUser;
		return $a;
	}

	public static function addWish($db){

	}
	public static function deleteWish($db,$keyproduct){
		
	}


	public function getKeyCompany(){
		return $this->keyCompany;
	}

	public function setKeyCompany($keyCompany){
		$this->keyCompany = $keyCompany;
	}
	public function getKeyProduct(){
		return $this->keyProduct;
	}

	public function setKeyProduct($keyProduct){
		$this->keyProduct = $keyProduct;
	}
	public function getKeyUser(){
		return $this->keyUser;
	}

	public function setKeyUser($keyUser){
		$this->keyUser = $keyUser;
	}

	public function addProduct($db){
		$result = $db->getReference('users')
		->getChild($this->keyUser)
		->getChild('productsPurchased')
		->push($this->getData());

		if ($result->getKey() != null)
			return '{"mensaje":"Producto Agregado a lista de Deseos","key":"'.$result->getKey().'"}';
		else 
			return '{"mensaje":"Error al guardar el producto"}';
	
	
	}

}
?>