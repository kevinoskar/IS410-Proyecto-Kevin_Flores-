<?php
    header('Content-Type: application/json'); 
    require_once('../../class/class-company/class-company.php');
    require_once('../../class/class-database/database.php');
    require_once('../../class/class-company/class-product.php');
    
    $database = new Database();
    
    if ($_SERVER['REQUEST_METHOD'] =='POST' && isset($_GET['keyCompany'])){
        $product=new Product(
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
        echo $product->createProduct($database->getDB(),$_GET['keyCompany']);

    }
    
    if ($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['keyCompany']) && !isset($_GET['idProduct'])){
        Product::obtainProducts($database->getDB(),$_GET['keyCompany']);
    }
    if ($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['keyCompany'])  && isset($_GET['idProduct'])){
        Product::obtainProduct($database->getDB(),$_GET['keyCompany'],$_GET['idProduct']);
    }
    
    /*if ($_SERVER['REQUEST_METHOD']=='DELETE' &&  isset($_GET['key'])  && isset($_GET['id'])){
        Product::deleteProduct($database->getDB(),$_GET['key'],$_GET['id']);
    }*/
    
    if ($_SERVER['REQUEST_METHOD'] =='PUT' && isset($_GET['key']) && isset($_GET['id'])){
        $_PUT=array();
        if ($_SERVER['REQUEST_METHOD'] == 'PUT')
            parse_str(file_get_contents("php://input"), $_PUT);
        
            $product=new Product(
                $_PUT['productName'],
                $_PUT['productCode'],
                $_PUT['productModel'],
                $_PUT['productbrand'],
                $_PUT['productDescription'],
                $_PUT['productQuantity'],
                $_PUT['productPrice'],
                $_PUT['productDiscountPorcentage'],
                $_PUT['productTotalPrice'],
                $_PUT['productImages'],
                $_POST['size'],
                $_POST['color'],
                $_POST['sex'],
                $_POST['height'],
                $_POST['width'],
                $_POST['depth']

                );
        echo $product->updateProduct($database->getDB(),$_GET['key'],$_GET['id']);
    }


?>
