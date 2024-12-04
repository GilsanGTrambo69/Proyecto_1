<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/crearr.css">

</head>
<body>
    <div class="users-form">
        <!-- Formulario para crear un nuevo usuario -->
        <form action="insertar.php" method="POST">
            <h1> Crear usuario </h1>
            <input type="documento" name="doc" placeholder="Documento" required>
            <input type="text" name="name" placeholder="Nombre" requerid>
            <input type="text" name="lastname" placeholder="Apellido" required>
            <input type="email" name="email" placeholder="Correo" required>
            <input type="text" name="rol" placeholder="Rol" required>
            <input type="text" name="password" placeholder="Contraseña" required>

            <input type="submit" value="Agregar usuario">
        </form> 
    </div>
</body>
</html>
