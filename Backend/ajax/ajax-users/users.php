<?php
    header('Content-Type: application/json'); 
    require_once('../../class/class-user/class-user.php');
    require_once('../../class/class-database/database.php');
    
    $database = new Database();

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
            $_POST['clientCode'],
            $_POST['nameOwner'],
            $_POST['creditNumber'],
            $_POST['expirationDate'],
            $_POST['cvv']

            );
        echo $u->createUser($database->getDB());

    }

    /*
    if ($_SERVER['REQUEST_METHOD']=='GET' && !isset($_GET['id'])){
        
    }
    if ($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['id'])){
        
    }
    
    if ($_SERVER['REQUEST_METHOD']=='DELETE' && isset($_GET['id'])){
        
    }
    /*
    if ($_SERVER['REQUEST_METHOD'] =='PUT' && isset($_GET['id'])){
        $_PUT=array();
        if ($_SERVER['REQUEST_METHOD'] == 'PUT')
            parse_str(file_get_contents("php://input"), $_PUT);
    
        $u = new Usuario(
            $_PUT['firstName'],
            $_PUT['lastName'],
            $_PUT['email'],
            $_PUT['password'],
            $_PUT['gender'],
            $_PUT['birthdate']
        );
        $u->actualizarUsuario(,$_GET['id']);
    }
    */
?>
