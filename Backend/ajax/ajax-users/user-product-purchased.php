<?php

header('Content-Type: application/json'); 
require_once('../../class/class-company/class-company.php');
require_once('../../class/class-database/database.php');
require_once('../../class/class-user/class-purchased.php');

$database=new Database();

if ($_SERVER['REQUEST_METHOD'] =='POST' && isset($_GET['keyUser'])){
    $product=new ProductPurchased(
        $_POST['productName'],
        $_POST['productCode'],
        $_POST['productModel'],
        $_POST['productbrand'],
        $_POST['productDescription'],
        $_POST['productQuantity'],
        $_POST['productType'],
        $_POST['productPrice'],
        $_POST['productDiscountPorcentage'],
        $_POST['productTotalPrice'],
        $_POST['size'],
        $_POST['color'],
        $_POST['sex'],
        $_POST['height'],
        $_POST['width'],
        $_POST['depth'],
        $_POST['productImages']

        );
    echo $product->createProduct($database->getDB(),$_GET['keyUser']);

}
if ($_SERVER['REQUEST_METHOD'] =='GET' && isset($_GET['keyUser']) && isset($_GET['keyProductUser'])){
    ProductPurchased::obtainProductPurchased($database->getDB(),$_GET['keyUser'],$_GET['keyProductUser']);
}


?>