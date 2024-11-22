<?php
session_start();
include("almacen/querys/conexion.php");
$con = conectar();
$sql = "SELECT * FROM productos WHERE cantidad > 0";
$query = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Site CSS -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="css/responsive.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="css/custom.css">

	<link rel="stylesheet" href="css/index.css">


	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Site Metas -->
	<title>MINIBAJA</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Site Icons -->
	<link rel="shortcut icon" href="images/logo1.png" type="image/x-icon">
</head>

<body>
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="index.php">
					<img src="images/logo1.png" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="index.php">Inicio</a></li>
						<li class="nav-item"><a class="nav-link" href="menu.php">Menú</a></li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown" data-categoria="all">Mas</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="about.php">Deseas trabajar?</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->

	<!-- Start slides -->
	<br><br>
	<div id="slides" class="cover-slides">
		<ul class="slides-container">
			<li class="text-left">
				<img src="images/fondo.jpeg" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong>MINIBAJA<br> Tu escuela, tu estilo, tu tienda: ¡Gran variedad de alimentos y bebidas a tu alcance!</strong></h1>
							<p class="m-b-40">Comida a precios bajos y de excelente calidad.</p>
							<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="menu.php">Ordena Ahora !</a></p>
						</div>
					</div>
				</div>
			</li>
			<li class="text-left">
				<img src="images/fondo.jpeg" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong>MINIBAJA<br> ¡Gran variedad de alimentos y bebidas a tu alcance!</strong></h1>
							<p class="m-b-40">Comida a precios bajos y de excelente calidad.</p>
							<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="menu.php">Ordena Ahora !</a></p>
						</div>
					</div>
				</div>
			</li>
			<li class="text-left">
				<img src="images/fondo.jpeg" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong>MINIBAJA<br> Alimenta tu mente y tu paladar: ¡Gran variedad de alimentos y bebidas a tu alcance!</strong></h1>
							<p class="m-b-40">Comida a precios bajos y de excelente calidad.</p>
							<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="menu.php">Ordena Ahora !</a></p>
						</div>
					</div>
				</div>
			</li>
		</ul>
		<div class="slides-navigation">
			<a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
			<a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
		</div>
	</div>
	<!-- End slides -->

	<!-- Start About -->
	<div class="about-section-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12 text-center">
					<div class="inner-column">
						<h1>Bienvenido a <span>MINIBAJA</span></h1>
						<h4>Sobre Nostros</h4>
						<p>En Minibaja, nos enorgullece ser el lugar perfecto para satisfacer tus antojos y necesidades durante tu jornada escolar.</p>


					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<img src="images/PUERK.jpeg" alt="" class="img-fluid">
				</div>
			</div>
		</div>
	</div>
	<!-- End About -->

	<!-- Start QT -->
	<div class="qt-box qt-background">
		<div class="container">
			<div class="row">
				<div class="col-md-8 ml-auto mr-auto text-center">
					<p class="lead ">
						"Ven y conocenos productos de calidad hasta la puerta de tu salón!"
					</p>
					<span class="lead">MINIBAJA</span>
				</div>
			</div>
		</div>
	</div>
	<!-- End QT -->

	<!-- Start Menu -->
	<div class="menu-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Menú de MINIBAJA</h2>
						<p>Productos que frecuentemente cuenta Minibaja</p>
					</div>
				</div>
			</div>

			<div class="row inner-menu-box">
				<div class="col-3">
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true" data-categoria="all">Todo</a>
						<a class="nav-link" id="v-pills-bebidas-tab" data-toggle="pill" href="#v-pills-bebidas" role="tab" aria-controls="v-pills-bebidas" aria-selected="false" data-categoria="Bebidas">Bebidas</a>
						<a class="nav-link" id="v-pills-comida-tab" data-toggle="pill" href="#v-pills-comida" role="tab" aria-controls="v-pills-comida" aria-selected="false" data-categoria="Comida">Comida</a>
						<a class="nav-link" id="v-pills-dulces-tab" data-toggle="pill" href="#v-pills-dulces" role="tab" aria-controls="v-pills-dulces" aria-selected="false" data-categoria="Dulces">Dulces</a>
						<a class="nav-link" id="v-pills-postres-tab" data-toggle="pill" href="#v-pills-postres" role="tab" aria-controls="v-pills-postres" aria-selected="false" data-categoria="Postres">Postres</a>

					</div>
				</div>
				<div class="col-9">
					<div class="tab-content" id="v-pills-tabContent">
						<!-- Pestaña de "Todo" -->
						<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
							<div class="row">
								<?php
								$sql = "SELECT * FROM productos WHERE cantidad > 0";
								$result = $con->query($sql);
								if ($result->num_rows > 0) {
									while ($row = $result->fetch_assoc()) {
								?>
										<div class="col-lg-4 col-md-6 special-grid all">
											<div class="gallery-single fix">
												<img style="width: 300px;" src="data:image/jpg;base64,<?= base64_encode($row['imagen']) ?>" class="img-fluid" alt="<?= $row['nombre'] ?>">
												<div class="why-text">
													<h4><?= $row['nombre'] ?></h4>
													<h5>$<?= $row['precio'] ?></h5>
													<!-- Formulario para agregar al carrito -->
													<form method="post" action="agregar_carrito.php">
														<input type="hidden" name="producto_id" value="<?= $row['id_productos'] ?>">
														<input type="hidden" name="producto_nombre" value="<?= $row['nombre'] ?>">
														<input type="hidden" name="producto_precio" value="<?= $row['precio'] ?>">
													</form>
												</div>
											</div>
										</div>
								<?php
									}
								} else {
									echo "No se encontraron productos.";
								}
								?>
							</div>

							<!-- Pestaña de "Comida" -->
							<div class="tab-pane fade" id="v-pills-comida" role="tabpanel" aria-labelledby="v-pills-comida-tab">
								<div class="row">
									<?php
									$sql = "SELECT * FROM productos WHERE categoria = 1 AND cantidad > 0"; // Cambia 1 por el ID de categoría correcto
									$result = $con->query($sql);

									if ($result->num_rows > 0) {
										while ($row = $result->fetch_assoc()) {
									?>
											<div class="col-lg-4 col-md-6 special-grid Comida"> <!-- Asegúrate de que la clase sea "Comida" -->
												<div class="gallery-single fix">
													<img style="width: 300px;" src="data:image/jpg;base64,<?= base64_encode($row['imagen']) ?>" class="img-fluid" alt="<?= $row["nombre"] ?>">
													<div class="why-text">
														<h4><?= $row['nombre'] ?></h4>
														<h5>$<?= $row['precio'] ?></h5>
														<!-- Formulario para agregar al carrito -->
														<form method="post" action="agregar_carrito.php">
															<input type="hidden" name="producto_id" value="<?= $row['id_productos'] ?>">
															<input type="hidden" name="producto_nombre" value="<?= $row['nombre'] ?>">
															<input type="hidden" name="producto_precio" value="<?= $row['precio'] ?>">
														</form>
													</div>
												</div>
											</div>
									<?php
										}
									} else {
										echo "No se encontraron productos en esta categoría.";
									}
									?>
								</div>
							</div>

							<!-- Pestaña de "Bebidas" -->
							<div class="tab-pane fade" id="v-pills-bebidas" role="tabpanel" aria-labelledby="v-pills-bebidas-tab">
								<div class="row">
									<?php
									$sql = "SELECT * FROM productos WHERE categoria = 2 AND cantidad > 0"; // Cambia 2 por el ID de categoría correcto
									$result = $con->query($sql);

									if ($result->num_rows > 0) {
										while ($row = $result->fetch_assoc()) {
									?>
											<div class="col-lg-4 col-md-6 special-grid Bebidas"> <!-- Asegúrate de que la clase sea "Bebidas" -->
												<div class="gallery-single fix">
													<img style="width: 300px;" src="data:image/jpg;base64,<?= base64_encode($row['imagen']) ?>" class="img-fluid" alt="<?= $row['nombre'] ?>">
													<div class="why-text">
														<h4><?= $row['nombre'] ?></h4>
														<h5>$<?= $row['precio'] ?></h5>
														<!-- Formulario para agregar al carrito -->
														<form method="post" action="agregar_carrito.php">
															<input type="hidden" name="producto_id" value="<?= $row['id_productos'] ?>">
															<input type="hidden" name="producto_nombre" value="<?= $row['nombre'] ?>">
															<input type="hidden" name="producto_precio" value="<?= $row['precio'] ?>">
														</form>
													</div>
												</div>
											</div>
									<?php
										}
									} else {
										echo "No se encontraron productos en esta categoría.";
									}
									?>
								</div>
							</div>

							<!-- Pestaña de "Dulces" -->
							<div class="tab-pane fade" id="v-pills-dulces" role="tabpanel" aria-labelledby="v-pills-dulces-tab">
								<div class="row">
									<?php
									$sql = "SELECT * FROM productos WHERE categoria = 3 AND cantidad > 0"; // Cambia 3 por el ID de categoría correcto
									$result = $con->query($sql);

									if ($result->num_rows > 0) {
										while ($row = $result->fetch_assoc()) {
									?>
											<div class="col-lg-4 col-md-6 special-grid Dulces"> <!-- Asegúrate de que la clase sea "Dulces" -->
												<div class="gallery-single fix">
													<img style="width: 300px;" src="data:image/jpg;base64,<?= base64_encode($row['imagen']) ?>" class="img-fluid" alt="<?= $row["nombre"] ?>">
													<div class="why-text">
														<h4><?= $row['nombre'] ?></h4>
														<h5>$<?= $row['precio'] ?></h5>
														<!-- Formulario para agregar al carrito -->
														<form method="post" action="agregar_carrito.php">
															<input type="hidden" name="producto_id" value="<?= $row['id_productos'] ?>">
															<input type="hidden" name="producto_nombre" value="<?= $row['nombre'] ?>">
															<input type="hidden" name="producto_precio" value="<?= $row['precio'] ?>">
														</form>
													</div>
												</div>
											</div>
									<?php
										}
									} else {
										echo "No se encontraron productos en esta categoría.";
									}
									?>
								</div>
							</div>

							<!-- Pestaña de "Postres" -->
							<div class="tab-pane fade" id="v-pills-postres" role="tabpanel" aria-labelledby="v-pills-postres-tab">
								<div class="row">
									<?php
									$sql = "SELECT * FROM productos WHERE categoria = 4 AND cantidad > 0"; // Cambia 4 por el ID de categoría correcto
									$result = $con->query($sql);

									if ($result->num_rows > 0) {
										while ($row = $result->fetch_assoc()) {
									?>
											<div class="col-lg-4 col-md-6 special-grid Postres"> <!-- Asegúrate de que la clase sea "Postres" -->
												<div class="gallery-single fix">
													<img style="width: 300px;" src="data:image/jpg;base64,<?= base64_encode($row['imagen']) ?>" class="img-fluid" alt="<?= $row["nombre"] ?>">
													<div class="why-text">
														<h4><?= $row['nombre'] ?></h4>
														<h5>$<?= $row['precio'] ?></h5>
														<!-- Formulario para agregar al carrito -->
														<form method="post" action="agregar_carrito.php">
															<input type="hidden" name="producto_id" value="<?= $row['id_productos'] ?>">
															<input type="hidden" name="producto_nombre" value="<?= $row['nombre'] ?>">
															<input type="hidden" name="producto_precio" value="<?= $row['precio'] ?>">
														</form>
													</div>
												</div>
											</div>
									<?php
										}
									} else {
										echo "No se encontraron productos en esta categoría.";
									}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Menu -->



		<!-- Start Customer Reviews -->
		<div class="customer-reviews-box">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading-title text-center">
							<h2></h2>
							<p> </p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8 mr-auto ml-auto text-center">
						<div id="reviews" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner mt-4">
								<div class="carousel-item text-center active">
									<div class="img-box p-1 border rounded-circle m-auto">
										<img class="d-block w-100 rounded-circle" src="images/quotations-button.png" alt="">
									</div>
									<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">OBJETIVOS</strong></h5>

									<p class="m-0 pt-3">
										<li>
											Tener los primeros lugares en las computadoras
											Desarrollar habilidades nuevas para la implementación de otras carreras
											Hacer más participe al genero femenino
											Escalar otro nivel de competencias
											Tomar conocimientos del trabajo laboral asi teniendo conocimientos en la industria
										</li>
										<li>

										</li>
									</p>
								</div>
								<div class="carousel-item text-center">
									<div class="img-box p-1 border rounded-circle m-auto">
										<img class="d-block w-100 rounded-circle" src="images/quotations-button.png" alt="">
									</div>
									<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">VISIÓN</strong></h5>

									<p class="m-0 pt-3">En el futuro implementar más carreras para que sea reconocido el proyecto por su creatividad, compromiso con la sustentabilidad y contribución del bienestar estudiantil para futuros proyectos en la comunidad academica </p>
								</div>
								<div class="carousel-item text-center">
									<div class="img-box p-1 border rounded-circle m-auto">
										<img class="d-block w-100 rounded-circle" src="images/quotations-button.png" alt="">
									</div>
									<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">MISION</strong></h5>

									<p class="m-0 pt-3">Apoyar a nuevas generaciones con el proyecto mini baja implementando oportunidades para la expansión, diversificación del menu y mejoras de calidad de servicio .</p>
								</div>
							</div>
							<a class="carousel-control-prev" href="#reviews" role="button" data-slide="prev">
								<i class="fa fa-angle-left" aria-hidden="true"></i>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#reviews" role="button" data-slide="next">
								<i class="fa fa-angle-right" aria-hidden="true"></i>
								<span class="sr-only">Next</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Customer Reviews -->

		<!-- Start Contact info -->
		<div class="contact-imfo-box">
			<div class="container">
				<div class="row">
					<div class="col-md-4 arrow-right">
						<i class="fa fa-volume-control-phone"></i>
						<div class="overflow-hidden">
							<h4>Telefono</h4>
							<p class="lead">
								+52 5563250028
							</p>
						</div>
					</div>
					<div class="col-md-4 arrow-right">
						<i class="fa fa-envelope"></i>
						<div class="overflow-hidden">
							<h4>Email</h4>
							<p class="lead">
								minibaja@gmail.com
							</p>
						</div>
					</div>
					<div class="col-md-4">
						<i class="fa fa-map-marker"></i>
						<div class="overflow-hidden">
							<h4>Ubicacion</h4>
							<p class="lead">
								Universidad Politecnica de Tecamac
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Contact info -->

		<!-- Start Footer -->
		<footer class="footer-area bg-f">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<h3>Sobre nosotros</h3>
						<p>Apoyar a nuevas generaciones con el proyecto mini baja implementando oportunidades para la expansión, diversificación del menu y mejoras de calidad de servicio.</p>
					</div>
					<div class="col-lg-3 col-md-6">
						<h3>Unete</h3>
						<div class="subscribe_form">
							<form class="subscribe_form">
								<input name="EMAIL" id="subs-email" class="form_input" placeholder="Email Address..." type="email">
								<button type="submit" class="submit">Enviar</button>
								<div class="clearfix"></div>
							</form>
						</div>
						<ul class="list-inline f-social">
							<li class="list-inline-item"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						</ul>
					</div>
					<div class="col-lg-3 col-md-6">
						<h3>Informacion</h3>
						<p class="lead">Universidad Politecnica de Tecamac</p>
						<p class="lead"><a href="#">+52 5563250028</a></p>
						<p><a href="#"> minibaja@gmail.com</a></p>
					</div>
					<div class="col-lg-3 col-md-6">
						<h3>Horarios</h3>
						<p><span class="text-color">Lunes: </span>9Am - 7Pm</p>
						<p><span class="text-color">Martes-Miercoles :</span> 9Am - 7Pm</p>
						<p><span class="text-color">Jueves-Viernes :</span> 9Am - 7Pm</p>
					</div>
				</div>
			</div>

			<div class="copyright">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<p class="company-name">Todos los derechos reservados. &copy; 2023 <a href="#">Minibaja</a> Diseñado por: Grupo 2723IS
							</p>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- End Footer -->

		<a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>

		<!-- ALL JS FILES -->
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script>
			$(document).ready(function() {
				// Mostrar todos los productos al principio
				$('.special-grid').show();

				// Escuchar el clic en los enlaces de categoría
				$('.nav-link').on('click', function() {
					// Ocultar todos los productos
					$('.special-grid').hide();

					// Obtener la categoría seleccionada
					var categoria = $(this).data('categoria');

					// Mostrar los productos de la categoría seleccionada
					$('.' + categoria).show();
				});
			});
		</script>
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<!-- ALL PLUGINS -->
		<script src="js/jquery.superslides.min.js"></script>
		<script src="js/images-loded.min.js"></script>
		<script src="js/isotope.min.js"></script>
		<script src="js/baguetteBox.min.js"></script>
		<script src="js/custom.js"></script>
</body>

</html>