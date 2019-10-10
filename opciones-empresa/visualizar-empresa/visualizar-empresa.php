
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
    <title>Visualizar</title>
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
                            <a href="../../Pagina-Central/index.php" class="logo">
                                <img src="img/Fly-blue2.png" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- ACCOUNT -->
                    <div class="clearfix">
                        <div class="header-ctn"> 
                            <div class="dropdown" id="dropdown">
                                
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="../configuracion-empresa/perfil-empresa.php"><i class="fa fa-cog icon-profile-dropdown "></i>Actualizar Perfil</a>
                                    <a class="dropdown-item" href="../visualizar-empresa/visualizar-empresa.php"><i class="fas fa-eye icon-profile-dropdown selected-sidebar"></i></i>Visualización Perfil</a>
                                    <a class="dropdown-item" href="../registrar-sucursal/registrar-sucursal.php"><i class="fas fa-store icon-profile-dropdown"></i></i>Registrar Sucursal</a>
                                    <a class="dropdown-item" href="../registrar-promociones/registrar-promociones.php"><i class="fas fa-gift icon-profile-dropdown"></i>Registrar Promociones</a>
                                    <a class="dropdown-item" href="../dashboard-admin/dashboard-admin.html"><i class="fas fa-chart-bar icon-profile-dropdown"></i>Dashboard Administrativo</a>
                                    <a class="dropdown-item" href="../../Backend/ajax/ajax-company/company.php?action=logoutCompany"><i class="fa fa-sign-out icon-profile-dropdown"></i>Salir</a>
                                  </div>
                            </div>
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
            <div class="border-right" id="sidebar-wrapper">
                <div class="list-group list-group-flush">
                    <a href="../configuracion-empresa/perfil-empresa.php" class="list-group-item list-group-item-action">Actualizar Perfil</a>
                    <a href="../visualizar-empresa/visualizar-empresa.php" class="list-group-item list-group-item-action selected-sidebar ">Visualizar Perfil</a>
                    <a href="../registrar-sucursal/registrar-sucursal.php" class="list-group-item list-group-item-action">Registrar Sucursal</a>
                    <a href="../registrar-promociones/registrar-promociones.php" class="list-group-item list-group-item-action">Registrar Promociones</a>
                    <a href="../dashboard-admin/dashboard-admin.html" class="list-group-item list-group-item-action">Dashboard Administrativo</a>
        
                    <a href="../../Backend/ajax/ajax-company/company.php?action=logoutCompany" class="list-group-item list-group-item-action">Salir</a>
            </div>
        </div>
                    <!-- /#sidebar-wrapper -->
        <div id="page-content-wrapper">
            <div class="container2">
                <div id="companyVisual" class="row">
                    
                </div>
                <div class="branchs-office">
                        <h1 class="title-new-branch-office">Sucursales Actuales</h1>
                        <div class="container">
                            <div class="row" id="branchData">
                                
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
                                    <li><a href="../configuracion-empresa/perfil-empresa.html">Actualizar Perfil</a></li>
                                    <li><a href="../registrar-sucursal/registrar-sucursal.html">Registrar Sucursales</a></li>
                                    <li><a href="../registrar-promociones/registrar-promociones.html">Registrar Promociones</a></li>
                                    <li><a href="#">Salir</a></li>
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