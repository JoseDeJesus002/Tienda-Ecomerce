<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en"><!-- Basic -->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Site Metas -->
	<title>MINI BAJA</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Site Icons -->
	<link rel="shortcut icon" href="images/logo1.png" type="image/x-icon">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Site CSS -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="css/responsive.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="css/custom.css">

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
						<li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
						<li class="nav-item"><a class="nav-link" href="menu.php">Menu</a></li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Mas</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="about.php">Deseas trabajar?</a>
								<a class="dropdown-item" href="login/login.php">Inciar sesion</a>
							</div>
						</li>

				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->

	<!-- Start header -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Deseas trabajar con nostros?</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End header -->

	<!-- Start About -->
	<div class="about-section-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 text-center">
					<div class="inner-column">
						<h1>Bienvenido a<span> MINIBAJA</span></h1>
						<h4>Como puedo hacerlo?</h4>
						<p>
							¡Únete y emprende con nosotros en el emocionante proyecto "Minibaja"! Estamos buscando estudiantes ambiciosos y apasionados que deseen ser parte de una experiencia única en la que podrán vender deliciosos alimentos y bebidas mientras también tienen la oportunidad de convertirse en proveedores de productos. Minibaja es tu boleto para una aventura culinaria y empresarial que cambiará tu vida.. </p>

					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<img src="images/JOB.jpeg" alt="" class="img-fluid">
				</div>
				<div class="col-md-12">
					<div class="inner-pt">
						<center>
							<h1>Te interesa</h1>
						</center>
						<center>
							<p>Si te interesa puedes llamar y contactarnos en mediante el correo</p>
						</center>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End About -->



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
						<p>Apoyar a nuevas generaciones con el proyecto minibaja implementando oportunidades para la expansión, diversificación del menu y mejoras de calidad de servicio.</p>
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
							<p class="company-name">Todos los derechos reservados. &copy; 2023 <a href="#">Minibaja</a> Diseñado por : Grupo 2723IS
							</p>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- End Footer -->

	<a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>

	<!-- ALL JS FILES -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!-- ALL PLUGINS -->
	<script src="js/jquery.superslides.min.js"></script>
	<script src="js/images-loded.min.js"></script>
	<script src="js/isotope.min.js"></script>
	<script src="js/baguetteBox.min.js"></script>
	<script src="js/form-validator.min.js"></script>
	<script src="js/contact-form-script.js"></script>
	<script src="js/custom.js"></script>
</body>

</html>