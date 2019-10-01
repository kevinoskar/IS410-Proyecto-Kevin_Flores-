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

	public function __construct(
		$productName = null,
		$productCode = null,
		$productModel = null,
		$productbrand = null,
		$productDescription = null,
		$productQuantity = null,
		$productPrice = null,
		$productDiscountPorcentage = null,
		$productTotalPrice = null,
		$productImages = null
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

	public function createProduct(){
	}
	public function obtainProduct(){
	}
	public function obtainProducts(){
	}
	public function deleteProduct(){
	}
	public function updateProduct(){
	}

}
?>