<?php

require_once('class-product.php');

class ProductType extends Product{
    protected $size;
    protected $color;
    protected $sex;
    protected $height;
    protected $width;
    protected $depth;

    public function __construct(
        $size = null,
        $color = null,
        $sex = null,
        $height = null,
        $width = null,
        $depth = null
    ){
        $this->size = $size;
        $this->color = $color;
        $this->sex = $sex;
        $this->height = $height;
        $this->width = $width;
        $this->depth = $depth;
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

}


?>