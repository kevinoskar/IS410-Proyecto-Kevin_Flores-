<?php
	require_once('../Backend/class/class-user/class-user.php');
	require_once('../Backend/class/class-database/database.php');
 
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
		<title>Fly Store</title>
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>
		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>
		<link type="text/css" rel="stylesheet" href="css/main.css"/>
		<script src="https://kit.fontawesome.com/b46271b076.js"></script>
    </head>
	<body>
		<header>
			<div id="header">
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-xs-12">
							<div class="header-logo">
								<a href="#" class="logo">
									<img src="img/Fly-blue2.png" alt="">
								</a>
							</div>
						</div>

						<!-- ACCOUNT -->
						<div class="clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div>
									<a class="hearder-icons"href="../opciones-usuario/lista-deseos-usuario/lista-deseos-usuario.html">
										<i class="fa fa-heart-o"></i>
										<span>Deseos</span>
										<div class="qty">2</div>
									</a>
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								<div>
									<a class="dropdown-toggl hearder-icons" href="../opciones-usuario/historial-usuario/historial-usuario.php">
										<i class="fa fa-shopping-cart"></i>
										<span>Carrito</span>
										<div class="qty">3</div>
									</a>	
								</div>
								
								<div class="dropdown">
                                <button class="hearder-icons btn-profile dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="../opciones-usuario/configuracion-usuario/perfil-usuario.php"><i class="fa fa-cog icon-profile-dropdown"></i>Configuración</a>
                                    <a class="dropdown-item" href="../opciones-usuario/historial-usuario/historial-usuario.php"><i class="fas fa-shopping-bag icon-profile-dropdown"></i>Historial de compras</a>
                                    <a class="dropdown-item" href="../opciones-usuario/lista-deseos-usuario/lista-deseos-usuario.html"><i class="fas fa-heart icon-profile-dropdown"></i></i>Lista de Deseos</a>
                                    <a class="dropdown-item" href="../opciones-usuario/empresas-siguiendo-usuario/empresas-siguiendo.html"><i class="fas fa-building icon-profile-dropdown"></i>Empresas Siguiendo</a>
                                    <a class="dropdown-item" href="../Backend/ajax/ajax-users/users.php?action=logout"><i class="fa fa-sign-out icon-profile-dropdown"></i>Salir</a>
                                  </div>
                            </div>
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>

								</div>
								<!-- Menu Toogle -->
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
		<div class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-lg-6 col-xs-6" >
						<div class="shop">
							<div class="shop-img">
								<img src="./img/tecnology-desk.jpg" class="img1" alt="">
							</div>
							<div class="shop-body">
								<h3>Tecnología<br>Collección</h3>
								<a href="#" class="cta-btn">Comprar <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-lg-6 col-xs-6" >
						<div class="shop">
							<div class="shop-img">
								<img src="./img/moda-live.jpg" alt="">
							</div>
							<div class="shop-body">
								<h3>Moda<br>Collección</h3>
								<a href="#" class="cta-btn">Comprar <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>

					<div class="col-md-4 col-lg-6 col-xs-6" >
						<div class="shop">
							<div class="shop-img">
								<img src="./img/sport-ball.jpg" alt="">
							</div>
							<div class="shop-body">
								<h3>Deportes<br>Collección</h3>
								<a href="#" class="cta-btn">Comprar <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-lg-6 col-xs-6" >
						<div class="shop">
							<div class="shop-img">
								<img src="./img/electrodomestic.jpg" alt="">
							</div>
							<div class="shop-body">
								<h3>Electrodomésticos<br>Collección</h3>
								<a href="#" class="cta-btn">Comprar <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-lg-6 col-xs-6" >
						<div class="shop">
							<div class="shop-img">
								<img src="./img/hogar-livingroom.jpg" alt="">
							</div>
							<div class="shop-body">
								<h3>Hogar<br>Collección</h3>
								<a href="#" class="cta-btn">Comprar <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-lg-6 col-xs-6" >
						<div class="shop">
							<div class="shop-img">
								<img src="./img/accesories-man-women.jpg" alt="">
							</div>
							<div class="shop-body">
								<h3>Accesorios<br>Collección</h3>
								<a href="#" class="cta-btn">Comprar <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Todos los Productos</h3>
						</div>
					</div>
					<!--Categorias-->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" id="productstoBuy"data-nav="#slick-nav-1">
										<!-- product -->
									
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- FOOTER -->
		<footer id="footer">
			<div class="section">
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Nosotros</h3>
								<p>Sólidez y servicio de entrega en tiempo y forma, logrando la fidelidad de nuestros clientes.</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>UNAH Tegucigalpa, HN</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>504 233 865 42</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>infofly@fly-support.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categorias</h3>
								<ul class="footer-links">
									<li><a>Tecnología</a></li>
									<li><a>Moda</a></li>
									<li><a>Deportes</a></li>
									<li><a>Hogar</a></li>
									<li><a>Electrodomésticos</a></li>
									<li><a>Accesorios</a></li>
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
												<li><a ><i class="fa fa-map-marker"></i>UNAH Tegucigalpa, HN</a></li>
												<li><a ><i class="fa fa-phone"></i>504 233 865 42</a></li>
												<li><a ><i class="fa fa-envelope-o"></i>infofly@fly-support.com</a></li>
											</ul>
										</div>
									</li>
									<li><a href="#">Política y Privacidad</a></li>
									<li><a href="#">Ordenes y Envíos</a></li>
									<li><a href="#">Términos y condiciones</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Servicio</h3>
								<ul class="footer-links">
									<li><a href="../opciones-usuario/configuracion-usuario/perfil-usuario.html">Mi cuenta</a></li>
									<li><a href="../opciones-usuario/historial-usuario/historial-usuario.html">Comprado</a></li>
									<li><a href="../opciones-usuario/lista-deseos-usuario/lista-deseos-usuario.html">Lista de Deseos</a></li>
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

		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>
		<script src="js/controlador.js"></script>

	</body>
</html>
