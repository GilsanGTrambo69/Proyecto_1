<?php
session_start();
require 'assets/conexion.php';

if(isset($_POST['send']))
{

    $correo = $_POST['email'];

    $consul = mysqli_query($nexus, "SELECT * from usuarios where correo_usuario = '$correo'");
    $cant_consul = mysqli_num_rows($consul);
    if($cant_consul > 0)
    {
        //envio del mensaje
        $_SESSION['response'] = "El mensaje fue enviado al correo";
        header('Location: ingresar_correo_modal.php');
    }
    else
    {
        $_SESSION['response'] = "El correo no pertenece a ningún usuario registrado";
        header('Location: ingresar_correo_modal.php');
    }


        


    ///redirigimos
    header("/proyecto(gilversión)/Ingresar_correo_modal.php");
}