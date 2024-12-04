<?php
session_start();

include '../assets/conexion.php';

if (empty($_SESSION["documento"])){
    header("location:Login_Nexus.php");
}
//consultar los datos de la persona
$doc = $_SESSION['documento'];
$aprendiz = $nexus->query("SELECT * from usuarios where documento_usuario='$doc'");
$data_aprendiz = $aprendiz->fetch_object();
$nom_ape = $data_aprendiz->nombre_usuario;
$ape_ape = $data_aprendiz->apellido_usuario;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inicio</title>
</head>
<body>
<h1>BIENVENIDO PELELE</h1>
    <div>
       <?php
       echo "Hola"." ".$nom_ape." ".$ape_ape." - Aprendiz ";
       ?>
    </div>    
    <div>
    <p class="cerrar"><a href="../controlador_cerrar_sesion.php">Cerrar Sesión</a></p>
    </div>
</body>
</html>
