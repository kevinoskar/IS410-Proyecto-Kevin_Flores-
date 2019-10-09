<?php
    header('Content-Type: application/json'); 
    require_once('../../class/class-company/class-company.php');
    require_once('../../class/class-database/database.php');
    require_once('../../class/class-company/class-branch-office.php');
    
    $database = new Database();
    
    if ($_SERVER['REQUEST_METHOD'] =='POST' && isset($_GET['keyCompany'])){
        $branchOffice=new BranchOffice(
                $_POST['branchOfficeName'],
                $_POST['branchOfficeAddress'],
                $_POST['branchOfficeLatLon'],
                $_POST['branchOfficeWorkers'],
                $_POST['branchOfficePhone'],
                $_POST['branchOfficeEmail'],
                $_POST['branchOfficeImage']
            );
        echo $branchOffice->createBranchOffice($database->getDB(),$_GET['keyCompany']);

    }
    
    if ($_SERVER['REQUEST_METHOD']=='GET' && !isset($_GET['idBranch'])  && isset($_GET['keyCompany'])){
        BranchOffice::obtainBranchOffices($database->getDB(),$_GET['keyCompany']);
    }
    if ($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['keyCompany'])  && isset($_GET['idBranch'])){
        BranchOffice::obtainBranchOffice($database->getDB(),$_GET['keyCompany'],$_GET['idBranch']);
    }
    
    if ($_SERVER['REQUEST_METHOD']=='DELETE' &&  isset($_GET['keyCompany'])  && isset($_GET['idBranch'])){
        BranchOffice::deleteBranchOffice($database->getDB(),$_GET['keyCompany'],$_GET['idBranch']);
    }
    
    if ($_SERVER['REQUEST_METHOD'] =='PUT' && isset($_GET['keyCompany']) && isset($_GET['idBranch'])){
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
