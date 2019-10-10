
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
    <title>Registrar Promociones</title>
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
                            <div class="dropdown" id="main">
                               
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
                <a href="../visualizar-empresa/visualizar-empresa.html" class="list-group-item list-group-item-action">Visualizar Perfil</a>
                <a href="../registrar-sucursal/registrar-sucursal.php" class="list-group-item list-group-item-action">Registrar Sucursal</a>
                <a href="../registrar-promociones/registrar-promociones.php" class="list-group-item list-group-item-action selected-sidebar">Registrar Promociones</a>
                <a href="../dashboard-admin/dashboard-admin.html" class="list-group-item list-group-item-action">Dashboard Administrativo</a>
    
                <a href="../../Backend/ajax/ajax-company/company.php?action=logoutCompany" class="list-group-item list-group-item-action">Salir</a>
              </div>
            </div>
            <!-- /#sidebar-wrapper -->
        
            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-xs-12 col-lg-12">
                            <div class="content-new-product">
                                <label class="title-new-product">Nuevo Producto</label>
                                <div class="description">
                                    <form id="formproduct">
                                        <h1>Descripción del producto</h1></br>
                                        <input type="text" name="productName" id="productName" placeholder="Nombre del Producto">
                                        <input type="text"name="productCode" id="productCode" placeholder="Código">
                                        <input type="text" name="productModel" id="productModel" placeholder="Modelo">
                                        <input type="text" name="productbrand" id="productbrand" placeholder="Marca">
                                        <textarea name="productDescription" id="productDescription" cols="20" rows="6" placeholder="Descripción"></textarea>
                                        <input type="number" name="productQuantity" id="productQuantity" placeholder="Cantidad en existencia">
                                        
                                        <select name="productType" id="productType">
                                    
                                        </select></br>
                                        <div class="price-box" id="prices">
                                            <h1>Precio Lempiras</h1></br>
                                            <label >Precio Original L.</label>
                                            <input type="text" id="productPrice" name="productPrice"  placeholder=" L.00.00">
                                            <label >Porcentaje de Descuento</label>
                                            <input id="productDiscountPorcentage" name="productDiscountPorcentage" type="text" placeholder="%00.00" onkeyup="calcularPorcentaje()" >
                                            <label >Precio Total L.</label>
                                            <input type="text" name="productTotalPrice" id="productTotalPrice">
                                        </div> 
                                        <div id="especification">
                                            <h1>Características específicas</h1>
                                            <h1>Talla-Size</h1>
                                            <select id="size" name="size">
                                                <option value="S">Small (Corta)</option>
                                                <option value="M">Medium (Mediana)</option>
                                                <option value="L">Large (Larga)</option>
                                                <option value="XL"> Extra Large (Extra Larga)</option>
                                            </select>
                                        </div>
                                            <h1>Color</h1>
                                            <div id="color">
                                                <select name="color" id="color">
                                                    <option value="black">Negro</option>>
                                                    <option value="white">Blanco</option>>
                                                    <option value="blue">Azul</option>>
                                                    <option value="red">Rojo</option>>
                                                    <option value="yellow">Amarillo</option>>
                                                    <option value="orange">Naranja</option>>
                                                    <option value="silver">Plateado</option>>
                                                    <option value="gold">Dorado</option>
                                                </select>
                                            </div>
                                            <h1>Sexo</h1>
                                                <select name="sex" id="sex">
                                                    <option value="F" id="F">Femenino</option>
                                                    <option value="M" id="M">Masculino</option>
                                                    <option value="Bi" id="Bi">Ambos sexos</option>
                                                </select>
                                            <h1>Tamaño</h1>
                                                <div>
                                                    <input id="height" name="height" type="number" placeholder="Altura">Altura en metros
                                                    <input id="width" name="width" type="number" placeholder="Anchura">Anchura en metros
                                                    <input id="depth" name="depth" type="number" placeholder="Profundidad">Profundad metros
                                                </div>
                                        </div>
                                        <div id="imageProduct"class="image-product">
                                            <h1>Subir Imagen(obligatorio)</h1>
                                        </div>
                                        <div id="imagenFileUpload">
                                            <input type="file" id="productImages" name="productImages">
                                            <div class="see-picture" id="pictureProduct">
                                                <img src="" alt="Aqui va la foto.">
                                            </div>
                                        <button type="button" class="btn-save-changes" onclick="subirImagen()">Subir Imagen</button></br>
                                        
                                        </div>
                                        <div id="button">

                                        </div>
                                        <div id="qrcode">

                                        </div>


                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="content-all-products container">
                            <label class="title-all-products">Todos los Productos</label>
                            <div id="product-category" >
                                <h1 class="head-title-product">Lista</h1>
                                <div class=" row category"id="category">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Ventana Modal--><!--Cuidado con el id al hacerlo dinamico-->
            <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
               
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
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery.qrcode.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/controlador.js"></script>
    
</body>
</html>