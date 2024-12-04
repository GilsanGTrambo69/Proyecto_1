<?php

$nexus = mysqli_connect('localhost:3308', 'root', '', 'nexus_code');

$doc=$_GET['doc'];
$sql="SELECT * FROM usuarios WHERE documento_usuario='$doc'";
$query=mysqli_query($nexus, $sql);
$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/crearr.css">
    <title>Editar usuarios</title>
</head>

<body>
    <div class="users-form">
        <form action="editar.php" method="POST">
            <h1> Editar usuario </h1>
            <input type="hidden" name="doc" placeholder="Documento" value="<?=$row['documento_usuario']?>">
            <input type="text" name="name" placeholder="Nombre" value="<?=$row['nombre_usuario']?>">
            <input type="text" name="lastname" placeholder="Apellido" value="<?=$row['apellido_usuario']?>">
            <input type="text" name="email" placeholder="Correo" value="<?=$row['correo_usuario']?>">
            <input type="text" name="rol" placeholder="Rol" value="<?=$row['id_rol_usuario']?>">
            <input type="text" name="password" placeholder="Contraseña" value="<?=$row['contraseña_usuario']?>">

            <input type= "submit" value="Actualizar información">
        </form>
    </div>

</body>
</html>