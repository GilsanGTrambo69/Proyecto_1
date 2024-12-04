<?php
// Establece la conexión a la base de datos
$nexus = mysqli_connect('localhost:3308', 'root', '', 'nexus_code');

// Consulta para obtener los registros de la página actual
$sql = "SELECT * FROM usuarios";
$query = mysqli_query($nexus, $sql); // Ejecuta la consulta

?>

<style type="text/css">
    .barra {
        height: 600px; /* Limitar la altura para hacer visible la barra de desplazamiento */
        line-height: 1em;
        overflow-y: scroll; /* Mostrar la barra de desplazamiento cuando el contenido se desborde */
        width: 100%;
        padding: 10px;
        border: 3px solid #ccc; /* Establecer un borde para visualizar la zona */
        }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/crearr.css">
    <title>registros</title>
</head>
<body>
    <p class="users-form"><a href="crear_usuario.php">Crear usuario</a></p>
    <div align="right">
        <label for="caja_busqueda">Buscar: </label>
        <input type="text" name="caja_busqueda" id="caja_busqueda" class="" autofocus>
    </div>
    <br><br><br>
    <!-- aqui en este div van a aparecer los valores -->
    <div class="barra">
    <div id="datos" class="users-table">
            <!-- Tabla para mostrar los usuarios registrados -->
            <table>
                <thead>
                    <tr>
                        <th> Documento</th>
                        <th> Nombre</th>
                        <th> Apellido</th>
                        <th> Correo</th>
                        <th> Rol</th>
                        <th> Contraseña</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Bucle para mostrar cada usuario en una fila de la tabla -->
                    <?php while($row = mysqli_fetch_array($query)): ?>
                    <tr>
                        <th><?= $row['documento_usuario'] ?></th>
                        <th><?= $row['nombre_usuario'] ?></th>
                        <th><?= $row['apellido_usuario'] ?></th>
                        <th><?= $row['correo_usuario'] ?></th>
                        <th>
                            <?php
                            $tipo = $row['id_rol_usuario'];
                            switch($tipo) {
                                case 1: echo "Aprendiz"; break;
                                case 2: echo "Instructor"; break;
                                case 3: echo "Bienestar"; break;
                            }
                            ?>
                        </th>
                        <th><?= $row['contraseña_usuario'] ?></th>
                        <th><a href="actualizar.php?doc=<?= $row['documento_usuario'] ?>" class="users-table--edit">Editar</a></th>
                        <th><a href="eliminar.php?doc=<?= $row['documento_usuario'] ?>" class="users-table--delete">Eliminar</a></th>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
    </div>
    </div>
    <!-- scripts que permiten que la búsqueda funcione-->
    <script src="jquery.min.js"></script>
    <script src="main_clientes.js"></script>
</body>
</html>
