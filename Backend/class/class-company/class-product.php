<?php
class Product{
	protected $productName;
	protected $productCode;
	protected $productModel;
	protected $productbrand;
	protected $productDescription;
	protected $productQuantity;
	protected $productPrice;
	protected $productDiscountPorcentage;
	protected $productTotalPrice;
	protected $productImages;
	protected $key;

	public function __construct(
		$productName,
		$productCode,
		$productModel,
		$productbrand,
		$productDescription,
		$productQuantity,
		$productPrice,
		$productDiscountPorcentage,
		$productTotalPrice,
		$productImages
	){
		$this->productName = $productName;
		$this->productCode = $productCode;
		$this->productModel = $productModel;
		$this->productbrand = $productbrand;
		$this->productDescription = $productDescription;
		$this->productQuantity = $productQuantity;
		$this->productPrice = $productPrice;
		$this->productDiscountPorcentage = $productDiscountPorcentage;
		$this->productTotalPrice = $productTotalPrice;
		$this->productImages = $productImages;
	}
	public function getData(){
			$productA['productName']=$this->productName;
			$productA['productCode']=$this->productCode;
			$productA['productModel']=$this->productModel;
			$productA['productbrand']=$this->productbrand;
			$productA['productDescription']=$this->productDescription;
			$productA['productQuantity']=$this->productQuantity;
			$productA['productPrice']=$this->productPrice;
			$productA['productDiscountPorcentage']=$this->productDiscountPorcentage;
			$productA['productTotalPrice']=$this->productTotalPrice;
			$productA['productImages']=$this->productImages;
			return $productA;
	}


	public function createProduct($db){
		$product = $this->getData();
		$result = $db->getReference('companys')
			->getChild($this->getKey()) 
			->getChild('products') 
			->push($product);
		   
		if ($result->getKey() != null)
			return '{"mensaje":"Producto Anexado con exito","key":"'.$result->getKey().'"}';
		else 
			return '{"mensaje":"Error al guardar el registro"}';
	}

	public static function obtainProduct(){

	}
	public static function obtainProducts(){

	}
	public static function deleteProduct(){
		$result=$db->getReference('companys')
			->getChild($keyfirebase)
			->getChild('products')
			->remove();
		echo '{"mensaje":"Se eliminó la empresa con id '.$keyfirebase.'"}';
	}

	public function updateProduct(){

	}





	public function getProductName(){
		return $this->productName;
	}

	public function setProductName($productName){
		$this->productName = $productName;
	}
	public function getProductCode(){
		return $this->productCode;
	}

	public function setProductCode($productCode){
		$this->productCode = $productCode;
	}
	public function getProductModel(){
		return $this->productModel;
	}

	public function setProductModel($productModel){
		$this->productModel = $productModel;
	}
	public function getProductbrand(){
		return $this->productbrand;
	}

	public function setProductbrand($productbrand){
		$this->productbrand = $productbrand;
	}
	public function getProductDescription(){
		return $this->productDescription;
	}

	public function setProductDescription($productDescription){
		$this->productDescription = $productDescription;
	}
	public function getProductQuantity(){
		return $this->productQuantity;
	}

	public function setProductQuantity($productQuantity){
		$this->productQuantity = $productQuantity;
	}
	public function getProductPrice(){
		return $this->productPrice;
	}

	public function setProductPrice($productPrice){
		$this->productPrice = $productPrice;
	}
	public function getProductDiscountPorcentage(){
		return $this->productDiscountPorcentage;
	}

	public function setProductDiscountPorcentage($productDiscountPorcentage){
		$this->productDiscountPorcentage = $productDiscountPorcentage;
	}
	public function getProductTotalPrice(){
		return $this->productTotalPrice;
	}

	public function setProductTotalPrice($productTotalPrice){
		$this->productTotalPrice = $productTotalPrice;
	}
	public function getProductImages(){
		return $this->productImages;
	}

	public function setProductImages($productImages){
		$this->productImages = $productImages;
	}

	public function setKey($key){
		$this->key=$key;
	}
	public function getKey(){
		return $this->key;
	}
}
?>