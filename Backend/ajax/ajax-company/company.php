<?php
    header('Content-Type: application/json'); 
    require_once('../../class/class-company/class-company.php');
    require_once('../../class/class-database/database.php');
    require_once('../../class/class-company/class-product.php');
    
    $database = new Database();

    if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_GET['action']) && $_GET['action']=='login'){
        Company::loginCompany($database->getDB(),$_POST['emailCompany'],$_POST['passwordCompany']);
        exit();
    }
    if($_SERVER['REQUEST_METHOD'] =='GET' && isset($_GET['action']) && $_GET['action']=='logoutCompany'){
        Company::logoutCompany();
        exit();
    }


    if($_SERVER['REQUEST_METHOD'] =='GET' && isset($_GET['action']) && $_GET['action']=='CompanyAccessKey'){
        Company::tokenAndKey();
        exit();
    }



    if ($_SERVER['REQUEST_METHOD'] =='POST'){
        $com = new Company(
            $_POST['nameCompany'],
            $_POST['descriptionCompany'],
            $_POST['oriented'],
            $_POST['fundationDate'],
            $_POST['emailCompany'],
            $_POST['passwordCompany'],
            $_POST['postalCode'],
            $_POST['country'],
            $_POST['state'],
            $_POST['addressCompany'],
            $_POST['phoneNumberCompany'],
            $_POST['latitute'],
            $_POST['longitude'],
            $_POST['urlbanner'],
            $_POST['urlimageCompany']
            

        );

        echo $com->createCompany($database->getDB());

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
            $_PUT['postalCode'],
            $_PUT['passwordCompany'],
            $_PUT['country'],
            $_PUT['state'],
            $_PUT['addressCompany'],
            $_PUT['phoneNumberCompany'],
            $_PUT['latitute'],
            $_PUT['longitude'],
            $_PUT['urlbanner'],
            $_PUT['urlimageCompany'],
            $_PUT['tokenCompany']
        );
        echo $com->updateCompany($database->getDB(),$_GET['id']);
        
    }
?>
