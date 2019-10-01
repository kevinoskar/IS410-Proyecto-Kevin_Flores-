<?php
    header('Content-Type: application/json'); 
    require_once('../../class/class-company/class-company.php');
    require_once('../../class/class-database/database.php');
    require_once('../../class/class-company/class-product.php');
    
    $database = new Database();

    if ($_SERVER['REQUEST_METHOD'] =='POST'){
        $product=new Product(
            $_POST['productName'],
            $_POST['productCode'],
            $_POST['productModel'],
            $_POST['productbrand'],
            $_POST['productDescription'],
            $_POST['productQuantity'],
            $_POST['productPrice'],
            $_POST['productDiscountPorcentage'],
            $_POST['productTotalPrice'],
            $_POST['productImages']
            );
        $product->setKey($_POST['key']);
        echo $product->createProduct($database->getDB());

    }
    
    if ($_SERVER['REQUEST_METHOD']=='GET' && !isset($_GET['id'])){
        Company::obtainCompanys($database->getDB());
    }
    if ($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['id'])){
        Company::obtainCompany($database->getDB(),$_GET['id']);
    }
    
    if ($_SERVER['REQUEST_METHOD']=='DELETE' && isset($_GET['id'])){
        Company::deleteCompany($database->getDB(),$_GET['id']);
    }
    
    if ($_SERVER['REQUEST_METHOD'] =='PUT' && isset($_GET['id'])){
        $_PUT=array();
        if ($_SERVER['REQUEST_METHOD'] == 'PUT')
            parse_str(file_get_contents("php://input"), $_PUT);
    
        $com = new Company(
            $_PUT['nameCompany'],
            $_PUT['descriptionCompany'],
            $_PUT['oriented'],
            $_PUT['fundationDate'],
            $_PUT['emailCompany'],
            $_PUT['passwordCompany'],
            $_PUT['postalCode'],
            $_PUT['country'],
            $_PUT['state'],
            $_PUT['addressCompany'],
            $_PUT['phoneNumberCompany'],
            $_PUT['latituteLongitud'],
            $_PUT['productos']

        );
        echo $com->updateCompany($database->getDB(),$_GET['id']);
    }
?>
