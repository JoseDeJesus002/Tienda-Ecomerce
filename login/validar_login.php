<?php
$usuario=$_POST['usuario'];
$pass=$_POST['password'];
session_start();
$_SESSION['usuario']=$usuario;
$conexion=mysqli_connect("localhost","root","","almacenminibaja");
$consulta="SELECT*FROM usuarios WHERE Usuario = '$usuario' and password = '$pass'";
$resultado=mysqli_query($conexion,$consulta);
$filas=mysqli_fetch_array($resultado);
if($filas['id_rol']== 1){
    echo '<script language="javascript">
    window.location.href = "../index.php";
    </script>';
}
else
    if($filas['id_rol']==2){
        echo '<script language="javascript">
        alert("Bienvenido administrador");  
        window.location.href = "../almacen/main.php";
        </script>';
    }
else{
    ?>
    <?php
    include("login.php");
    echo '<script language="javascript">
    alert("Autenticacion incorrecta");  
    window.location="login.php"
    </script>';
    ?>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>    