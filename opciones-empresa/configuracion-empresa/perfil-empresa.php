
<?php
require_once('../../Backend/class/class-company/class-company.php');
require_once('../../Backend/class/class-database/database.php');

$database = new Database();
if(!Company::verifyAuthenticity($database->getDB()))
    header("Location: error.html");




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/Fly-purpole.ico" type="image/x-icon">
    <title>Perfil Empresa</title>
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
                                    <span>Empresa</span>
                                    <img class="profile-image" src="img/logo-example.jpg">
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="../configuracion-empresa/perfil-empresa.html"><i class="fa fa-cog icon-profile-dropdown selected-sidebar"></i>Actualizar Perfil</a>
                                    <a class="dropdown-item" href="../visualizar-empresa/visualizar-empresa.html"><i class="fas fa-eye icon-profile-dropdown"></i></i>Visualización Perfil</a>
                                    <a class="dropdown-item" href="../registrar-sucursal/registrar-sucursal.html"><i class="fas fa-store icon-profile-dropdown"></i></i>Registrar Sucursal</a>
                                    <a class="dropdown-item" href="../registrar-promociones/registrar-promociones.html"><i class="fas fa-gift icon-profile-dropdown"></i>Registrar Promociones</a>
                                    <a class="dropdown-item" href="../dashboard-admin/dashboard-admin.html"><i class="fas fa-chart-bar icon-profile-dropdown"></i>Dashboard Administrativo</a>
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
                <a href="../configuracion-empresa/perfil-empresa.html" class="list-group-item list-group-item-action selected-sidebar">Actualizar Perfil</a>
                <a href="../visualizar-empresa/visualizar-empresa.html" class="list-group-item list-group-item-action">Visualizar Perfil</a>
                <a href="../registrar-sucursal/registrar-sucursal.html" class="list-group-item list-group-item-action">Registrar Sucursal</a>
                <a href="../registrar-promociones/registrar-promociones.html" class="list-group-item list-group-item-action">Registrar Promociones</a>
                <a href="../dashboard-admin/dashboard-admin.html" class="list-group-item list-group-item-action">Dashboard Administrativo</a>
                <a href="#" class="list-group-item list-group-item-action">Salir</a>
              </div>
            </div>
            <!-- /#sidebar-wrapper -->
        
            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="col-md-3 col-xs-12 col-lg-12">
                    <form enctype="multipart/form-data" method="POST">
                        <div id="dataProfile">
                            <div id="Imagen" class="image-profile">
                                <img class="box-profile-image" src="img/logo-example.jpg" alt="profile-image" title="Cambiar Imagen">
                            </div>
                            <div id="imagen2" class="image-profile2">
                                <img src="img/background-banner-example.jpg" class="box-profile-banner" alt="" title="Cambiar Banner">
                            </div>
                        </div>
                        <input id="urlimagen" name="uploadedfile" type="file">
                        <button id="buttonUpload" type="button" value="" onclick="subirImagen()">Subir Imagen</button>
                        <input type="file" id="urlbanner" name="uploadfile">
                        <button id="buttonUploadBanner" type="button" value="" onclick="subirImagenBanner()">Subir Banner</button>
                        <hr class="hr1">   
                        <h2>Listos para modificar tus campos.</h2>
                        <h1>Datos Principales</h1>
                        <table>
                            <tbody class="col-md-12 col-xs-12 col-lg-12">
                                <tr>
                                    <td><label for="">Nombre Completo de la Empresa</label><br></td>
                                    <td><input type="text" value="Empresa"><br></td>
                                </tr>
                                <tr>
                                    <td><label for="">Descripción</label><br></td>
                                    <td><textarea name="description" id="description" cols="30" rows="5"></textarea></td>
                                </tr>
                                <tr>
                                    <td><label for="">Rubro</label><br></td>
                                    <td><input type="text" value="Tecnologia"></td>
                                </tr>
                                <tr>
                                    <td><label for="">Fecha de Fundación</label><br></td>
                                    <td><input type="date" name="" value="2019-09-05" id="date"></td>
                                </tr>
                                <tr>
                                    <td><label for="">Correo Electroníco Empresarial</label><br></td>
                                    <td><input type="text" value="Pedro@gmail.com"></td>
                                </tr>
                                <tr>
                                    <td><label for="">Contraseña Actual</label><br></td>
                                    <td><input type="text" value="Pepitos14"></td>
                                </tr>
                            </tbody>
                        </table>
                        <h1>Ubicación</h1>
                        <table>
                            <tbody class="col-md-12 col-xs-12 col-lg-12">
                                <tr>
                                    <td><label for="">Código Postal</label><br></td>
                                    <td><input type="text" value="+220"></td>
                                </tr>
                                <tr>
                                    <td><label for="">Pais</label><br></td>
                                    <td><select name="" id="country">
                                        <option value="">Seleccione Pais</option>
                                    </select>
                                    
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="">Estado o Departamento</label><br></td>
                                    <td><input type="text" value="New York"></td>
                                </tr>
                                <tr>
                                    <td><label for="">Dirección</label><br></td>
                                    <td><input type="text" value="1420 Bronx south"></td>
                                </tr>
                                <tr>
                                    <td><label for="">Teléfono</label><br></td>
                                    <td><input type="text" value="892-257-26"></td>
                                </tr>
                                <tr>
                                        <td><label for="">Latitud Longitud</label><br></td>
                                        <td><input type="text" value="892-257-26"></td>
                                    </tr>
                            <tr>
                            </tr>
                            </tbody>
                        </table>
                        <h1>
                            Google Maps
                        </h1>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15480.31647848449!2d-87.2208135802246!3d14.072505100000008!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2shn!4v1568590266578!5m2!1ses-419!2shn" width="600" height="450" frameborder="0" class="google-maps" allowfullscreen=""></iframe>
                        <button class="btn-save-changes form-control" type="button">Guardar Cambios</button>
                    </form>
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
                                    <li><a href="#">Actualizar Perfil</a></li>
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