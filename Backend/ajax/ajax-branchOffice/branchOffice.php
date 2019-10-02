<?php
    header('Content-Type: application/json'); 
    require_once('../../class/class-company/class-company.php');
    require_once('../../class/class-database/database.php');
    require_once('../../class/class-company/class-branch-office.php');
    
    $database = new Database();
    
    if ($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['key'])){
        $branchOffice=new BranchOffice(
                $_POST['branchOfficeName'],
                $_POST['branchOfficeAddress'],
                $_POST['branchOfficeLatLon'],
                $_POST['branchOfficeWorkers'],
                $_POST['branchOfficePhone'],
                $_POST['branchOfficeEmail'],
                $_POST['branchOfficeImage']
            );
        echo $branchOffice->createBranchOffice($database->getDB(),$_POST['key']);

    }
    
    if ($_SERVER['REQUEST_METHOD']=='GET' && !isset($_GET['id'])  && isset($_GET['key'])){
        BranchOffice::obtainBranchOffices($database->getDB(),$_GET['key']);
    }
    if ($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['key'])  && isset($_GET['id'])){
        BranchOffice::obtainBranchOffice($database->getDB(),$_GET['key'],$_GET['id']);
    }
    
    if ($_SERVER['REQUEST_METHOD']=='DELETE' &&  isset($_GET['key'])  && isset($_GET['id'])){
        BranchOffice::deleteBranchOffice($database->getDB(),$_GET['key'],$_GET['id']);
    }
    
    if ($_SERVER['REQUEST_METHOD'] =='PUT' && isset($_GET['key']) && isset($_GET['id'])){
        $_PUT=array();
        if ($_SERVER['REQUEST_METHOD'] == 'PUT')
            parse_str(file_get_contents("php://input"), $_PUT);
        
            $branchOffice=new BranchOffice(
                $_PUT['branchOfficeName'],
                $_PUT['branchOfficeAddress'],
                $_PUT['branchOfficeLatLon'],
                $_PUT['branchOfficeWorkers'],
                $_PUT['branchOfficePhone'],
                $_PUT['branchOfficeEmail'],
                $_PUT['branchOfficeImage']
               
                );
        echo $branchOffice->updateBranchOffice($database->getDB(),$_GET['key'],$_GET['id']);
    }


?>
