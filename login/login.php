<!DOCTYPE html>
<html lang="es">

<head>
     <meta charset="UTF-8">

     <link rel="shortcut icon" href="img/logo1.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>MINIBAJA</title>
</head>

<body>
    <!-- boton de regresar -->

    
    <div class="limiter">
        <div class="container-login100" style="background-image: url('img/FONDO1.jpg');">
            <div class="wrap-login100 p-t-30 p-b-50">
                <span class="login100-form-title p-b-41">
                    <img src="img/logo1.png" width="100" height="100">
                    <h1> Bienvenido </h1>
                </span>

                <form  class="login100-form validate-form p-b-33 p-t-5" action="validar_login.php"  method="post">
                <div class="wrap-input100 validate-input" data-validate = "Enter username">
                <input class="input100" type="text" placeholder="Ingresa tu usuario" name="usuario" required>
                
</div>
                <div class="wrap-input100 validate-input" data-validate="Enter password">
                <input class="input100"  type="password" placeholder="Ingrese contraseña" name="password" required>
               
</div>
                <div class="container-login100-form-btn m-t-32"> 
                <input type="submit" value="Iniciar sesion" class="login100-form-btn">
                
                <a href="registro_login.php" class="login100-form-btn">Registrarse</a>
                </div>
                <br><br>
                <a href="../index.php" class="login100-form-btn">Regresar</a>
                </form>
            </div>
        </div>
</div>
</body>
</html>