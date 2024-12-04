<?php

$nexus = mysqli_connect('localhost:3306', 'root', '', 'nexus_code');

$doc=$_POST['doc'];
$name=$_POST['name'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$rol=$_POST['rol'];
$password=$_POST['password'];

$sql="UPDATE usuarios SET documento_usuario='$doc', nombre_usuario='$name', apellido_usuario='$lastname', correo_usuario='$email', id_rol_usuario='$rol', contraseña_usuario='$password' WHERE documento_usuario='$doc'";
$query=mysqli_query($nexus, $sql);

if($query){
    header("Location:registro1.php");
};

?>