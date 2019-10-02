
<?php
    header('Content-Type: application/json'); 
    require_once('../../class/class-company/class-product.php');
    require_once('../../class/class-database/database.php');
    require_once('../../class/class-user/class-wish-list.php');

    $database = new Database();
    
    if ($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['keyCompany'])){
        $product=Product::obtainProduct($database->getDB(),$_POST['keyCompany'],$_POST['keyProduct']);
        $Wish=new WishList(
            $_POST['keyCompany'],
            $_POST['keyProduct'],
            $_POST['keyUser']
    
        );
        echo $Wish->addProduct($database->getDB());
    }
    

?>