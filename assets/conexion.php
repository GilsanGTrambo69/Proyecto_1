<?php
#Conexion con la base de datos:
$servidor = 'localhost:3308';
$usuario = 'root';
$contra = '';
$base = 'nexus_code';

$nexus = mysqli_connect($servidor, $usuario, $contra, $base);
if(!$nexus)
{
	echo "Problema al conectar a la base de datos";
}
else
{
	/*echo "Conexion exitosa";*/
}

?>