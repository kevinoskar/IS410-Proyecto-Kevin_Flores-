
<?php

class ProductPurchased {
	protected $productName;
	protected $productCode;
	protected $productModel;
	protected $productbrand;
	protected $productDescription;
	protected $productQuantity;
	protected $productType;
	protected $productPrice;
	protected $productDiscountPorcentage;
	protected $productTotalPrice;
	protected $productImages;
	protected $size;
    protected $color;
    protected $sex;
    protected $height;
    protected $width;
    protected $depth;
	protected $key;
	protected $comments;
	


	public function __construct(
		$productName,
		$productCode,
		$productModel,
		$productbrand,
		$productDescription,
		$productQuantity,
		$productType,
		$productPrice,
		$productDiscountPorcentage,
		$productTotalPrice,
		$size,
        $color,
        $sex,
        $height,
        $width,
		$depth,
		$productImages
	)
	{
		$this->productName = $productName;
		$this->productCode = $productCode;
		$this->productModel = $productModel;
		$this->productbrand = $productbrand;
		$this->productDescription = $productDescription;
		$this->productQuantity = $productQuantity;
		$this->productType = $productType;
		$this->productPrice = $productPrice;
		$this->productDiscountPorcentage = $productDiscountPorcentage;
		$this->productTotalPrice = $productTotalPrice;
		$this->size = $size;
        $this->color = $color;
        $this->sex = $sex;
        $this->height = $height;
        $this->width = $width;
		$this->depth = $depth;
		$this->productImages = $productImages;
	}
	public function getData(){
			$productA['productName']=$this->productName;
			$productA['productCode']=$this->productCode;
			$productA['productModel']=$this->productModel;
			$productA['productbrand']=$this->productbrand;
			$productA['productDescription']=$this->productDescription;
			$productA['productQuantity']=$this->productQuantity;
			$productA['productType']=$this->productType;
			$productA['productPrice']=$this->productPrice;
			$productA['productDiscountPorcentage']=$this->productDiscountPorcentage;
			$productA['productTotalPrice']=$this->productTotalPrice;
			$productA['size']=$this->size;
        	$productA['color']=$this->color;
        	$productA['sex']=$this->sex;
        	$productA['height']=$this->height;
        	$productA['width']=$this->width;
			$productA['depth']=$this->depth;
			$productA['productImages']=$this->productImages;
			return $productA;
	}


	public function createProduct($db,$key){
		$product = $this->getData();
		$result = $db->getReference("users/{$key}/productsPurchased/")
			->push($product);
		   
		if ($result->getKey() != null)
			return '{"mensaje":"Producto Anexado con exito","keyUser":"'.$key.'","keyProduct":"'.$result->getKey().'"}';
		else 
			return '{"mensaje":"Error al guardar el registro"}';
    }
}
?>