
<?php
	require_once('../Backend/class/class-superuser/class-superuser.php');
	require_once('../Backend/class/class-database/database.php');
 
	$database = new Database();
	if(!isset($_COOKIE['keySuperuser']))
		header("Location: error.html");


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/Fly-purpole.ico" type="image/x-icon">
    <title>Super Usuario</title>
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
                                    <span>Super Usuario Admin</span>
                                    <img class="profile-image" src="img/SuperSU.png">
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                    <a class="dropdown-item" href="#"><i class="fas fa-chart-bar icon-profile-dropdown"></i>Dashboard Administrativo</a>
                                    <a class="dropdown-item" href=""><i class="fa fa-sign-out icon-profile-dropdown"></i>Salir</a>
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
            <div id="page-content-wrapper">
               <div class="container">
                   <div class="row">
                       <div class="col-md-12 col-xs-12 col-lg-12">
                            <form id="usersSU">
                                <h1>Información de Usuarios</h1>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label>Usuarios Registrados Actualmente</label>
                                            </td>
                                            <td>
                                                <label>10</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Usuarios del Sexo Masculinos </label>
                                            </td>
                                            <td>
                                                <label>3</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Usuarios del Sexo Femenino</label>
                                            </td>
                                            <td>
                                                <label>7</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Compras Totales Realizadas</label>
                                            </td>
                                            <td>
                                                <label>350</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Usuarios Observadores</label>
                                            </td>
                                            <td>
                                                <label>7809</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>
                                                    Promedio de Compra por Usuario
                                                </label>
                                            </td>
                                            <td>
                                                <label>0.5</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>
                                                    Actualizaciones de Usuarios a sus perfiles
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    20 por día.
                                                </label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                            <form id="companySU">
                                <h1>Información de Empresas</h1>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label>Cantidad Total de Empresas Registradas</label>
                                            </td>
                                            <td>
                                                <label>7</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>
                                                    Empresas Nacionales
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    2
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>
                                                    Empresas Internacionales
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    3
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>
                                                    Productos totales
                                                </label>
                                        </td>
                                            <td>
                                                <label>
                                                    140
                                                </label>
                                        </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>
                                                    Productos Comprados
                                                </label>
                                        </td>
                                            <td>
                                                <label>
                                                    90
                                                </label>
                                        </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>
                                                    Productos en Tienda
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    60
                                                </label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
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
                                    <li><a href="../Politicas/Politica-Privacidad/politicas.html">Política y Privacidad</a></li>
                                    <li><a href="../Politicas/Ordenes-Envio/ordenes.html">Ordenes y Envíos</a></li>
                                    <li><a href="../Politicas/Terminos-condiciones/terminos.html">Términos y condiciones</a></li>
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