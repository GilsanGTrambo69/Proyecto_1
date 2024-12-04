<?php
session_start();

if (!empty($_POST["ingresar"])){
    if (!empty ($_POST ["documento"]) and !empty ($_POST ["contraseña"])) 
    {
        $documento=$_POST["documento"];
        $contra=$_POST["contraseña"];
        $contraseña = md5($contra);
        $sql=$nexus->query("SELECT * from usuarios where documento_usuario='$documento' and contraseña_usuario='$contraseña'");
        if ($datos=$sql->fetch_object()) 
        {
            $doc_sesion = $datos->documento_usuario;
            $rol_sesion = $datos->id_rol_usuario;
            $_SESSION["documento"]=$doc_sesion;
            switch($rol_sesion)
            {
                case 1: header('Location: aprendiz/aprendiz.php'); break;
                case 2: header('Location: instructor/instructor.php'); break;
                case 3: header('Location: bienestar/bienestar.php'); break;
            }
        } else 
        {
            echo '<div class= "" ><font color="red">Datos Incorrectos</font></div>';
        }
        
    } else 
    {
        echo '<div class= "" ><font color="red">Campos Vacios</font></div>';
    }
 }
 ?>