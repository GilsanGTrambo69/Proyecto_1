<?php
include 'assets/conexion.php';

//consulta inicial para que se muestren todos los datos
$query = "SELECT * from usuarios";

if(isset($_POST['consulta'])) {    
    //función que permite quitar los caracteres especiales que pueda el usuario incluir en la búsqueda
    $revisar = mysqli_real_escape_string($nexus,$_POST['consulta']);
    $query = "SELECT * from usuarios where documento_usuario LIKE '%$revisar%' or nombre_usuario LIKE '%$revisar%' or apellido_usuario LIKE '%$revisar%'";
}

$resultado = mysqli_query($nexus, $query);

if(mysqli_num_rows($resultado)>0) { ?>
    <table class="users-table">
        <thead>
            <tr class="users-table">
                <th>Documento</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Rol</th>
                <th>Contraseña</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
    <?php
    while($mostrar = mysqli_fetch_assoc($resultado)) { ?>
        <tr>
            <th><?php echo $mostrar['documento_usuario'] ?></th>
            <th><?php echo $mostrar['nombre_usuario'] ?></th>
            <th><?php echo $mostrar['apellido_usuario'] ?></th>
            <th><?php echo $mostrar['correo_usuario'] ?></th>
            <th>
                <?php
                $tipo = $mostrar['id_rol_usuario'];
                switch($tipo) {
                    case 1: echo "Aprendiz"; break;
                    case 2: echo "Instructor"; break;
                    case 3: echo "Bienestar"; break;
                }
                ?>
            </th>
            <th><?php echo $mostrar['contraseña_usuario'] ?></th>
            <th><a href="actualizar.php?doc=<?= $mostrar['documento_usuario'] ?>" class="users-table--edit">Editar</a></th>
            <th><a href="eliminar.php?doc=<?= $mostrar['documento_usuario'] ?>" class="users-table--delete">Eliminar</a></th>    
        </tr>
    <?php } ?>
    </table>
<?php }
else {    
    echo "No existen datos";
}
?>
