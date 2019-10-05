<?php
    header('Content-Type: application/json'); 
    require_once('../../class/class-company/class-product.php');
    require_once('../../class/class-database/database.php');
    require_once('../../class/class-compoany/class-company-php');

    $database = new Database();
    
    if ($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['keyCompany'])){
        $product=Product::obtainProduct($database->getDB(),$_POST['keyCompany'],$_POST['keyProduct']);
        echo $Wish->addProduct($database->getDB());
    }
    

?>