<?php
    header('Content-Type: application/json'); 
    require_once('../../class/class-user/class-user.php');
    require_once('../../class/class-database/database.php');
    
    $database = new Database();

    if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_GET['action']) && $_GET['action']=='login'){
        User::loginUser($database->getDB(),$_POST['email'],$_POST['password']);
        exit();
    }
    if($_SERVER['REQUEST_METHOD'] =='GET' && isset($_GET['action']) && $_GET['action']=='logout'){
        User::logoutUser();
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] =='POST'){
        $u = new User(
            $_POST['name'],
            $_POST['lastName'],
            $_POST['birthday'],
            $_POST['gender'],
            $_POST['postal'],
            $_POST['country'],
            $_POST['state'],
            $_POST['address'],
            $_POST['email'],
            $_POST['password'],
            $_POST['nameOwner'],
            $_POST['creditNumber'],
            $_POST['expirationDate'],
            $_POST['cvv'],
            $_POST['urlProfileImage']
            );
        echo $u->createUser($database->getDB());
        exit();
    }

    if ($_SERVER['REQUEST_METHOD']=='GET' && !isset($_GET['id'])){
        if(!isset($_COOKIE['key'])){
            echo '{"mensaje":"Access Denied"}';
            exit();
        }
        User::obtainUsers($database->getDB());
        exit();
    }
    if ($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['id'])){
        if(!isset($_COOKIE['key'])){
            echo '{"mensaje":"Access Denied"}';
            exit();
        }
        User::obtainUser($database->getDB(),$_GET['id']);
        exit();
    }
    
    if ($_SERVER['REQUEST_METHOD']=='DELETE' && isset($_GET['id'])){
        if(!isset($_COOKIE['key'])){
            echo '{"mensaje":"Access Denied"}';
            exit();
        }
        User::deleteUser($database->getDB(),$_GET['id']);
        exit();
    }
    
    if ($_SERVER['REQUEST_METHOD'] =='PUT' && isset($_GET['id'])){
        if(!isset($_COOKIE['key'])){
            echo '{"mensaje":"Access Denied"}';
            exit();
        }
        $_PUT=array();
        if ($_SERVER['REQUEST_METHOD'] == 'PUT')
            parse_str(file_get_contents("php://input"), $_PUT);
    
        $u = new User(
            $_PUT['name'],
            $_PUT['lastName'],
            $_PUT['birthday'],
            $_PUT['gender'],
            $_PUT['postal'],
            $_PUT['country'],
            $_PUT['state'],
            $_PUT['address'],
            $_PUT['email'],
            $_PUT['password'],
            $_PUT['nameOwner'],
            $_PUT['creditNumber'],
            $_PUT['expirationDate'],
            $_PUT['cvv']

        );
        echo $u->updateUser($database->getDB(),$_GET['id']);
        exit();
    }


?>
