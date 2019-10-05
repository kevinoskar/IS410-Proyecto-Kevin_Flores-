<?php
	require_once('../Backend/class/class-user/class-user.php');
	require_once('../Backend/class/class-database/database.php');
 
	$database = new Database();
	if(!isset($_COOKIE['key']))
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
						<div class="col-md-5">
							<div class="header-search">
								<form>
									<select id="categories" class="input-select">
										<option value="0">Categorias</option>
										<option value="1">Empresa A 01</option>
										<option value="1">Empresa A 02</option>
									</select>
									<input class="input" placeholder="Busca aquí">
									<button class="search-btn">Buscar</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div>
									<a class="hearder-icons"href="#">
										<i class="fa fa-heart-o"></i>
										<span>Deseos</span>
										<div class="qty">2</div>
									</a>
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggl hearder-icons" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Carito</span>
										<div class="qty">3</div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
											<div class="product-widget">
												<div class="product-img">
													<img src="./img/product01.png" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">product name goes here</a></h3>
													<h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>

											<div class="product-widget">
												<div class="product-img">
													<img src="./img/product02.png" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">Nombre del Producto</a></h3>
													<h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>
										</div>
										<div class="cart-summary">
											<small>3 Item(s) seleccionados</small>
											<h5>SUBTOTAL: $2940.00</h5>
										</div>
										<div class="cart-btns">
											<a href="#">Ver Carrito</a>
											<a href="#">Comprar <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
								
								<div class="dropdown">
                                <button class="hearder-icons btn-profile dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span>Kevin González</span>
                                    <img class="profile-image" src="img/profile-image-anounimous.jpg">
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="../opciones-usuario/configuracion-usuario/perfil-usuario.html"><i class="fa fa-cog icon-profile-dropdown"></i>Configuración</a>
                                    <a class="dropdown-item" href="../opciones-usuario/historial-usuario/historial-usuario.html"><i class="fas fa-shopping-bag icon-profile-dropdown"></i>Historial de compras</a>
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

		<nav id="navigation">
			<div class="container">
				<div id="responsive-nav">

					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="#">Home</a></li>
						<li><a href="#">Categorias</a></li>
						<li><a href="#">Empresas</a></li>
						<li><a href="#">Recientes</a></li>
					</ul>
				</div>
			</div>
		</nav>
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
							<h3 class="title">(Categoria)</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab1">Laptops</a></li>
									<li><a data-toggle="tab" href="#tab1">Smartphones</a></li>
									<li><a data-toggle="tab" href="#tab1">Cameras</a></li>
									<li><a data-toggle="tab" href="#tab1">Accessorios</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!--Categorias-->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="./img/product01.png" alt="">
												<div class="product-label">
													<span class="sale">-30%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Empresa A</p>
												<h3 class="product-name"><a href="#">Nombre del Producto</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Agregar Lista de Deseos</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">Agregar a comparar</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Ver</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Agregar Carrito</button>
											</div>
										</div>
										<!-- /product -->

										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="./img/product02.png" alt="">
												<div class="product-label">
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Empresa B</p>
												<h3 class="product-name"><a href="#">Nombre del Producto</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Agregar Lista de Deseos</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">Agregar a comparar</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Ver</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Agregar Carrito</button>
											</div>
										</div>
										<!-- /product -->

										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="./img/product03.png" alt="">
												<div class="product-label">
													<span class="sale">-30%</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Empresa C</p>
												<h3 class="product-name"><a href="#">Nombre del Producto</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
												<div class="product-rating">
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Agregar Lista de Deseos</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">Agregar a comparar</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Ver</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button onclick="redireccionar()" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Agregar Carrito</button>
											</div>
										</div>
										<!-- /product -->

										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="./img/product04.png" alt="">
											</div>
											<div class="product-body">
												<p class="product-category">Empresa D</p>
												<h3 class="product-name"><a href="#">Nombre del Producto</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Agregar Lista de Deseos</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">Agregar a comparar</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Ver</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Agregar Carrito</button>
											</div>
										</div>
										<!-- /product -->

										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="./img/product05.png" alt="">
											</div>
											<div class="product-body">
												<p class="product-category">Empresa E</p>
												<h3 class="product-name"><a href="#">Nombre del Producto</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Agregar Lista de Deseos</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">Agregar a comparar</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Ver</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Agregar Carrito</button>
											</div>
										</div>
										<!-- /product -->
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Categoria B</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab2">Laptops</a></li>
									<li><a data-toggle="tab" href="#tab2">Smartphones</a></li>
									<li><a data-toggle="tab" href="#tab2">Cameras</a></li>
									<li><a data-toggle="tab" href="#tab2">Accessories</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="./img/product06.png" alt="">
												<div class="product-label">
													<span class="sale">-30%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Empresa A</p>
												<h3 class="product-name"><a href="#">Nombre del Producto</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Agregar Lista de Deseos</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">Agregar a comparar</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Ver</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Agregar Carrito</button>
											</div>
										</div>
										<!-- /product -->

										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="./img/product07.png" alt="">
												<div class="product-label">
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Empresa B</p>
												<h3 class="product-name"><a href="#">Nombre del Producto</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Agregar Lista de Deseos</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">Agregar a comparar</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Ver</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Agregar carrito</button>
											</div>
										</div>
										<!-- /product -->

										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="./img/product08.png" alt="">
												<div class="product-label">
													<span class="sale">-30%</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Empresa C</p>
												<h3 class="product-name"><a href="#">Nombre del Producto</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
												<div class="product-rating">
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Agregar Lista de Deseos</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">Agregar a comparar</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Ver</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Agregar carrito</button>
											</div>
										</div>
										<!-- /product -->

										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="./img/product09.png" alt="">
											</div>
											<div class="product-body">
												<p class="product-category">Empresa D</p>
												<h3 class="product-name"><a href="#">Nombre del Producto</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Agregar Lista de Deseos</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">Agregar a comparar</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Ver</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Agregar carrito</button>
											</div>
										</div>
										<!-- /product -->

										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="./img/product01.png" alt="">
											</div>
											<div class="product-body">
												<p class="product-category">Empresa E</p>
												<h3 class="product-name"><a href="#">Nombre del Producto</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Agregar Lista de Deseos</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">Agregar a comparar</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Ver</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Agregar carrito</button>
											</div>
										</div>
										<!-- /product -->
									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Categoria 2</h4>
							<div class="section-nav">
								<div id="slick-nav-3" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-3">
							<div>
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product07.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Empresa A</p>
										<h3 class="product-name"><a href="#">Nombre del Producto</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product08.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Empresa B</p>
										<h3 class="product-name"><a href="#">Nombre del Producto</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product09.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Empresa C</p>
										<h3 class="product-name"><a href="#">Nombre del Producto</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- product widget -->
							</div>

							<div>
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product01.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Empresa D</p>
										<h3 class="product-name"><a href="#">Nombre del Producto</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product02.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Empresa E</p>
										<h3 class="product-name"><a href="#">Nombre del Producto</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product03.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Empresa A</p>
										<h3 class="product-name"><a href="#">Nombre del Producto</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- product widget -->
							</div>
						</div>
					</div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Categoria 3</h4>
							<div class="section-nav">
								<div id="slick-nav-4" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-4">
							<div>
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product04.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Empresa B</p>
										<h3 class="product-name"><a href="#">Nombre del Producto</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product05.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Empresa C</p>
										<h3 class="product-name"><a href="#">Nombre del Producto</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product06.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Empresa D</p>
										<h3 class="product-name"><a href="#">Nombre del Producto</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- product widget -->
							</div>

							<div>
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product07.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Empresa F</p>
										<h3 class="product-name"><a href="#">Nombre del Producto</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product08.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Empresa G</p>
										<h3 class="product-name"><a href="#">Nombre del Producto</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product09.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Empresa H</p>
										<h3 class="product-name"><a href="#">Nombre del Producto</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- product widget -->
							</div>
						</div>
					</div>

					<div class="clearfix visible-sm visible-xs"></div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Categoria 5</h4>
							<div class="section-nav">
								<div id="slick-nav-5" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-5">
							<div>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product01.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Empresa A</p>
										<h3 class="product-name"><a href="#">Nombre del Producto</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>

								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product02.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Empresa D</p>
										<h3 class="product-name"><a href="#">Nombre del Producto</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>

								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product03.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Empresa G</p>
										<h3 class="product-name"><a href="#">Nombre del Producto</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>

							</div>

							<div>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product04.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Empresa C</p>
										<h3 class="product-name"><a href="#">Nombre del Producto</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product05.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Empresa D</p>
										<h3 class="product-name"><a href="#">Nombre del Producto</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product06.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Empresa E</p>
										<h3 class="product-name"><a href="#">Nombre del Producto</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
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
									<li><a href="#">Mi cuenta</a></li>
									<li><a href="#">Ver Carrito</a></li>
									<li><a href="#">Lista de Deseos</a></li>
									<li><a href="#">Ayuda</a></li>
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

	</body>
</html>
