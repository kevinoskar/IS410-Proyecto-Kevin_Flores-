
<?php
require_once('../../Backend/class/class-company/class-company.php');
require_once('../../Backend/class/class-database/database.php');

$database = new Database();
if(!Company::verifyAuthenticity($database->getDB())){
    header("Location: error.html");
}




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/Fly-purpole.ico" type="image/x-icon">
    <title>Registrar Sucursal</title>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
    <link type="text/css" rel="stylesheet" href="css/main.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" >
    <script src="https://kit.fontawesome.com/b46271b076.js"></script>
</head>
<body>
    <header>
        <div id="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-xs-12 col-lg-6">
                        <div class="header-logo">
                            <a href="../../Pagina-Central/index.html" class="logo">
                                <img src="img/Fly-blue2.png" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- ACCOUNT -->
                    <div class="clearfix">
                        <div class="header-ctn"> 
                            <div class="dropdown" id="dropdown1">
                               
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar -->
            <div class="border-right" id="sidebar-wrapper">
              <div class="list-group list-group-flush">
                <a href="../configuracion-empresa/perfil-empresa.php" class="list-group-item list-group-item-action">Actualizar Perfil</a>
                <a href="../visualizar-empresa/visualizar-empresa.html" class="list-group-item list-group-item-action ">Visualizar Perfil</a>
                <a href="../registrar-sucursal/registrar-sucursal.php" class="list-group-item list-group-item-action selected-sidebar">Registrar Sucursal</a>
                <a href="../registrar-promociones/registrar-promociones.php" class="list-group-item list-group-item-action">Registrar Promociones</a>
                <a href="../dashboard-admin/dashboard-admin.html" class="list-group-item list-group-item-action">Dashboard Administrativo</a>
                <a href="../../Backend/ajax/ajax-company/company.php?action=logoutCompany" class="list-group-item list-group-item-action">Salir</a>
              </div>
            </div>
            <!-- /#sidebar-wrapper -->
        
            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="col-md-3 col-xs-12 col-lg-12">
                   <div class="container1">
                        <form id="formBranchOffice">
                            <h1 class="title-branch-office">Nueva Sucursal</h1>
                            <table class="branch-office-main">
                                <tbody>
                                    <tr>
                                        <td>
                                            <input name="branchOfficeName" id="branchOfficeName" type="text"placeholder="Nombre de la Sucursal">
                                            <input name="branchOfficeAddress" id="branchOfficeAddress" type="text" placeholder="Ubicación">
                                            <input name="branchOfficeLatLon" id="branchOfficeLatLon"type="text"placeholder="Latitud-Longitud">
                                            <input name="branchOfficeWorkers" id="branchOfficeWorkers"type="number" placeholder="Cantidad Total de Personal">
                                            <input name="branchOfficePhone" id="branchOfficePhone"type="tel"placeholder="Teléfono">
                                            <input name="branchOfficeEmail" id="branchOfficeEmail"type="email"placeholder="Correo Electrónico">
                                        </td>
                                        <td id="Imagen">
                                            <div id="imagenUpload">   
                                                <img class="branch-office-image" src="img/background-banner-example.jpg">
                                            </div>
                                            <input type="file" id="branchOfficeImage" name="branchOfficeImage"><br>
                                            <button type="button" id="buttonUpload" onclick="subirImagen()">Subir Imagen</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="foot-branch" id="addBranchoffice">
                                
                            </div>
                        </form>
                   </div> 
                </div>
                <div class="branchs-office">
                    <h1 class="title-new-branch-office">Sucursales Actuales</h1>
                    <div class="container">
                        <div class="row" id="branchoffice">
                            <div class="col-md-12 col-xs-12 col-lg-12">
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer id="footer">
            <div class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-xs-6">
                            <div class="footer">
                                <h3 class="footer-title">Nosotros</h3>
                                <p>Sólidez y servicio de entrega en tiempo y forma, logrando la fidelidad de nuestros clientes.</p>
                                <ul class="footer-links">
                                    <li><a><i class="fa fa-map-marker"></i>UNAH Tegucigalpa, HN</a></li>
                                    <li><a><i class="fa fa-phone"></i>504 233 865 42</a></li>
                                    <li><a><i class="fa fa-envelope-o"></i>infofly@fly-support.com</a></li>
                                </ul>
                            </div>
                        </div>    
    
                        <div class="col-md-4 col-xs-6">
                            <div class="footer">
                                <h3 class="footer-title">Informacion</h3>
                                <ul class="footer-links">
                                    <li>
                                        <div class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                              Nosotros
                                            </a>
                                            <ul class="dropdown-menu ul1">
                                                <p>Sólidez y servicio de entrega en tiempo y forma, logrando la fidelidad de nuestros clientes.</p>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                              Contáctanos
                                            </a>
                                            <ul class="dropdown-menu ul1">
                                                <li><a><i class="fa fa-map-marker"></i>UNAH Tegucigalpa, HN</a></li>
                                                <li><a><i class="fa fa-phone"></i>504 233 865 42</a></li>
                                                <li><a><i class="fa fa-envelope-o"></i>infofly@fly-support.com</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li><a href="../../Politicas/Politica-Privacidad/politicas.html">Política y Privacidad</a></li>
                                    <li><a href="../../Politicas/Ordenes-Envio/ordenes.html">Ordenes y Envíos</a></li>
                                    <li><a href="../../Politicas/Terminos-condiciones/terminos.html">Términos y condiciones</a></li>
                                </ul>
                            </div>
                        </div>
    
                        <div class="col-md-4 col-xs-6">
                            <div class="footer">
                                <h3 class="footer-title">Servicio</h3>
                                <ul class="footer-links">
                                    <li><a href="../configuracion-empresa/perfil-empresa.php">Actualizar Perfil</a></li>
                                    <li><a href="../registrar-sucursal/registrar-sucursal.php">Registrar Sucursales</a></li>
                                    <li><a href="../registrar-promociones/registrar-promociones.php">Registrar Promociones</a></li>
                                    <li><a href="../../Backend/ajax/ajax-company/company.php?action=logoutCompany">Salir</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- bottom footer -->
            <div id="bottom-footer" class="section">
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <ul class="footer-payments">
                                <li><a href="#"><i class="fab fa-cc-visa"></i></a></li>
                                <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                                <li><a href="#"><i class="fab fa-cc-paypal"></i></a></li>
                                <li><a href="#"><i class="fab fa-cc-mastercard"></i></a></li>
                                <li><a href="#"><i class="fab fa-cc-discover"></i></a></li>
                                <li><a href="#"><i class="fab fa-cc-amex"></i></a></li>
                            </ul>
                            <span class="copyright">
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Fly.com </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
    </footer>
    
</body>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/controlador.js"></script>
</html>