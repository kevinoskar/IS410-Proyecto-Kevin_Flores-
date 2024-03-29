<?php
require_once('class-company.php');

class Product {
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
		$result = $db->getReference("companys/{$key}/products/")
			->push($product);
		   
		if ($result->getKey() != null)
			return '{"mensaje":"Producto Anexado con exito","keyCompany":"'.$key.'","keyProduct":"'.$result->getKey().'"}';
		else 
			return '{"mensaje":"Error al guardar el registro"}';
	}

	public static function obtainProduct($db,$keyfirebaseCompany,$keyProduct){
		$result=$db->getReference("companys/{$keyfirebaseCompany}/products/{$keyProduct}/")
			->getValue();

		echo json_encode($result);
	}
	public static function obtainProducts($db,$firebaseCompany){
		$result=$db->getReference('companys')
		->getChild($firebaseCompany)
		->getChild('products')
		->getSnapshot()
		->getValue();

		
		echo json_encode($result);
	}
	public static function deleteProduct($db,$keyfirebaseCompany,$keyProduct){
		$result=$db->getReference("companys/{$keyfirebaseCompany}/products/{$keyProduct}/")
			->remove();

		echo '{"mensaje":"Se eliminó el producto con id '.$keyProduct.' de la empresa con id '.$keyfirebaseCompany.'"}';
	
	}
	public function updateProduct($db,$keyfirebaseCompany,$keyProduct){
		$prod=$this->getData();
		$result = $db->getReference('companys')
		->getChild($keyfirebaseCompany)
		->getChild('products')
		->getChild($keyProduct)
		->set($prod);
	
		if ($result->getKey() != null)
			return '{"mensaje":"Producto actualizado","key":"'.$result->getKey().'"}';
		else 
			return '{"mensaje":"Error al actualizar el producto"}';
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

	public function setKeyCompany($key){
		$this->key=$key;
	}
	public function getKeyCompany(){
		return $this->key;
	}
	public function getSize(){
        return $this->size;
    }

    public function setSize($size){
        $this->size = $size;
    }
    public function getColor(){
        return $this->color;
    }

    public function setColor($color){
        $this->color = $color;
    }
    public function getSex(){
        return $this->sex;
    }

    public function setSex($sex){
        $this->sex = $sex;
    }
    public function getHeight(){
        return $this->height;
    }

    public function setHeight($height){
        $this->height = $height;
    }
    public function getWidth(){
        return $this->width;
    }

    public function setWidth($width){
        $this->width = $width;
    }
    public function getDepth(){
        return $this->depth;
    }

    public function setDepth($depth){
        $this->depth = $depth;
	}
	
	public function getComments(){
		return $this->comments;
	}

	public function setComments($comments){
		$this->comments = $comments;
	}
	public function getProductType(){
		return $this->productType;
	}

	public function setProductType($productType){
		$this->productType = $productType;
	}
}
?>