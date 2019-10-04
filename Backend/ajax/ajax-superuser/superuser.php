<?php
    header('Content-Type: application/json'); 
    require_once('../../class/class-database/database.php');
    require_once('../../class/class-superuser/class-superuser.php');
    
    $database = new Database();

    if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_GET['action']) && $_GET['action']=='login'){
        SuperUser::loginSuperuser($database->getDB(),$_POST['emailSuperuser'],$_POST['passwordSuperuser']);
        exit();
    }
    if($_SERVER['REQUEST_METHOD'] =='POST'){
        
        $su=new SuperUser(
            $_POST['emailSuperuser'],
            $_POST['passwordSuperuser']
        );

        echo $su->createSuperuser($database->getDB());

        exit();
    }

?>
