<!DOCTYPE html>
<html lang="es">
<head>
	<link rel="shortcut icon" href="img/logo1.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registro de Usuario</title>
</head>
<body>
	<?php
	include("../almacen/querys/conexion.php");
	$con = conectar();
	?>
	<div class="limiter">
        <div class="container-login100" style="background-image: url('img/FONDO1.jpg');">
            <div class="wrap-login100 p-t-30 p-b-50">
              <span class="login100-form-title p-b-41">
			  <h1>Registro De Usuario</h1>
        </span>
		<form class="login100-form validate-form p-b-33 p-t-5" action="registrar_login.php" method="POST" enctype="multipart/form-data">
			<input type="text" name="id_rol" maxlength="30" value="1" hidden>
			<div class="wrap-input100 validate-input" data-validate = "Enter username">
			<input class="input100" type="text" placeholder="Ingresa tu nombre" name="nombres" maxlength="50" required>
			</div>
			<div class="wrap-input100 validate-input" data-validate = "Enter username">
			<input class="input100" type="text" placeholder="Ingresa tu apellido paterno" name="ap" maxlength="50" required>
			</div>
			<div class="wrap-input100 validate-input" data-validate = "Enter username">
			<input class="input100" type="text" placeholder="Ingresa tu apellido materno" name="am" maxlength="50" required>
			</div>
			<div class="wrap-input100 validate-input" data-validate = "Enter username">
			<input class="input100" type="number" placeholder="Ingresa tu edad" name="edad" min="18" max="99" required>
			</div>
			<div class="wrap-input100 validate-input" data-validate = "Enter username">
			<input class="input100" type="text" placeholder="Ingresa tu usuario" name="usuario" maxlength="20" required>
			</div>
			<div class="wrap-input100 validate-input" data-validate = "Enter username">
			<input class="input100" type="password" placeholder="Ingresa una contraseña" name="password" maxlength="20" required>
			</div>
			<div class="wrap-input100 validate-input" data-validate = "Enter username">
			<input class="input100" type="email" placeholder="Ingresa tu correo" name="correo" maxlength="40" required>
			</div>
			<div class="container-login100-form-btn m-t-32"> 
			<input type="submit" name="agregar" class="login100-form-btn" value="Registrarse">
			<a href="login.php" class="login100-form-btn">Iniciar sesion</a>
			</div>
		</form>
</body>
</html>