<?php
	require_once('../../Backend/class/class-user/class-user.php');
	require_once('../../Backend/class/class-database/database.php');
 
	$database = new Database();
	if(!User::verifyAuthenticity($database->getDB()))
		header("Location: error.html");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/Fly-purpole.ico" type="image/x-icon">
    <title>Perfil Usuario</title>
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
                            <div class="dropdown">
                                <button class="hearder-icons btn-profile dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#"><i class="fa fa-cog icon-profile-dropdown selected-sidebar"></i>Configuración</a>
                                    <a class="dropdown-item" href="../historial-usuario/historial-usuario.html"><i class="fas fa-shopping-bag icon-profile-dropdown"></i>Historial de compras</a>
                                    <a class="dropdown-item" href="../lista-deseos-usuario/lista-deseos-usuario.html"><i class="fas fa-heart icon-profile-dropdown"></i></i>Lista de Deseos</a>
                                    <a class="dropdown-item" href="../empresas-siguiendo-usuario/empresas-siguiendo.html"><i class="fas fa-building icon-profile-dropdown"></i>Empresas Siguiendo</a>
                                    <a class="dropdown-item" href="#"><i class="fa fa-sign-out icon-profile-dropdown"></i>Salir</a>
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

            <!-- Sidebar -->
            <div class="border-right" id="sidebar-wrapper">
              <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action selected-sidebar">Configuración</a>
                <a href="../../opciones-usuario/historial-usuario/historial-usuario.html" class="list-group-item list-group-item-action">Historial de compras</a>
                <a href="../../opciones-usuario/lista-deseos-usuario/lista-deseos-usuario.html" class="list-group-item list-group-item-action">Lista de Deseos</a>
                <a href="../../opciones-usuario/empresas-siguiendo-usuario/empresas-siguiendo.html" class="list-group-item list-group-item-action">Empresas que sigues</a>
              </div>
            </div>
            <!-- /#sidebar-wrapper -->
        
            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="col-md-3 col-xs-12 col-lg-12">
                    <form id="formProfile" enctype="multipart/form-data" method="POST">
                            
                    </form>
                </div>
            </div>
    </main>
    <footer id="footer">
            <div class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-xs-6">
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
    
                        <div class="col-md-3 col-xs-6">
                            <div class="footer">
                                <h3 class="footer-title">Categorias</h3>
                                <ul class="footer-links">
                                    <li><a href="#">Tecnología</a></li>
                                    <li><a href="#">Moda</a></li>
                                    <li><a href="#">Deportes</a></li>
                                    <li><a href="#">Hogar</a></li>
                                    <li><a href="#">Electrodomésticos</a></li>
                                    <li><a href="#">Accesorios</a></li>
                                </ul>
                            </div>
                        </div>
    
                        <div class="clearfix visible-xs"></div>
    
                        <div class="col-md-3 col-xs-6">
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
    
                        <div class="col-md-3 col-xs-6">
                            <div class="footer">
                                <h3 class="footer-title">Servicio</h3>
                                <ul class="footer-links">
                                    <li><a href="#">Mi cuenta</a></li>
                                    <li><a href="../historial-usuario/historial-usuario.html">Ver Carrito</a></li>
                                    <li><a href="../lista-deseos-usuario/lista-deseos-usuario.html">Lista de Deseos</a></li>

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