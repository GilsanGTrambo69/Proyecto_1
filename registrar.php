<?php
session_start();
include 'assets/conexion.php';

$hoy = date('Y-m-d H:i:s');

$nom = $_POST['user_name'];
$ape = $_POST['surname'];
$email = $_POST['email'];
$doc = $_POST['documento'];
$code = $_POST['code'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
$pass = md5($pass1);
$roles = $_POST['roles'];

//consultar si el usuario ya esta registrado

$cant_prev = mysqli_num_rows(mysqli_query($nexus, "SELECT * from usuarios where documento_usuario = '$doc'"));
if($cant_prev > 0)
{
    //ya hay alguien registrado
    $_SESSION['msg'] = "Ya existe un usuario registrado";
    header('Location: registro.php');
}
else
{
    if($pass1 == $pass2)
    {
        switch($roles)
        {
            case 1:
                //crear el aprendiz
                $new = "INSERT into usuarios (documento_usuario, nombre_usuario, apellido_usuario, correo_usuario, id_rol_usuario, contraseña_usuario) 
                values ('$doc', '$nom', '$ape', '$email', '1', '$pass')";
                $exe_new = mysqli_query($nexus, $new);
                if($exe_new)
                {
                    //alerta de exito
                    $_SESSION['msg'] = "Aprendiz registrado exitosamente";
                    header('Location: Login_Nexus.php');
                }
            break;

            case 2:
                //revisar el codigo para el usuario
                $rev_inst = "SELECT * from code_registro where doc_usu_cod = '$doc' and code_cod = '$code' and tipo_rol_cod = '$roles'";
                $exe_rev_inst = mysqli_query($nexus, $rev_inst);
                $data_rev_inst = mysqli_fetch_array($exe_rev_inst); $codigo_dispo = $data_rev_inst['id_cod'];
                $cant_rev_inst = mysqli_num_rows($exe_rev_inst);
                if($cant_rev_inst > 0)
                {
                    //registrar el instructor
                    $new_inst = "INSERT into usuarios (documento_usuario, nombre_usuario, apellido_usuario, correo_usuario, id_rol_usuario, contraseña_usuario) 
                    values ('$doc', '$nom', '$ape', '$email', '2', '$pass')";
                    $exe_new_inst = mysqli_query($nexus, $new_inst);
                    if($exe_new_inst)
                    {
                        //actualizar el estado del codigo
                        $act_cod = mysqli_query($nexus, "UPDATE code_registro set est_cod = 'Usado', fec_regi_cod = '$hoy' where id_cod = '$codigo_dispo'");
                        //alerta de exito
                        $_SESSION['msg'] = "Instructor registrado exitosamente";
                        header('Location: Login_Nexus.php');
                    }
                }
                else
                {
                    //alerta que el codigo no es para este usuario
                    $_SESSION['msg'] = "Código erróneo";
                    header('Location: registro.php');
                }
            break;

            case 3:
                //revisar el codigo para el usuario
                $rev_bien = "SELECT * from code_registro where doc_usu_cod = '$doc' and code_cod = '$code' and tipo_rol_cod = '$roles'";
                $exe_rev_bien = mysqli_query($nexus, $rev_bien);
                $data_rev_bien = mysqli_fetch_array($exe_rev_bien); $codigo_dispo = $data_rev_bien['id_cod'];
                $cant_rev_bien = mysqli_num_rows($exe_rev_bien);
                if($cant_rev_bien > 0)
                {
                    //registrar el bienstar
                    $new_bien = "INSERT into usuarios (documento_usuario, nombre_usuario, apellido_usuario, correo_usuario, id_rol_usuario, contraseña_usuario) 
                    values ('$doc', '$nom', '$ape', '$email', '3', '$pass')";
                    $exe_new_bien = mysqli_query($nexus, $new_bien);
                    if($exe_new_bien)
                    {
                        //actualizar el estado del codigo
                        $act_cod = mysqli_query($nexus, "UPDATE code_registro set est_cod = 'Usado', fec_regi_cod = '$hoy' where id_cod = '$codigo_dispo'");
                        //alerta de exito
                        $_SESSION['msg'] = "Funcionario bienestar registrado exitosamente";
                        header('Location: Login_Nexus.php');
                    }
                }
                else
                {
                    //alerta que el codigo no es para este usuario
                    $_SESSION['msg'] = "Código erróneo";
                    header('Location: registro.php');
                }
            break;
        }
    }
    else
    {
        //alert: contraseñas no coinciden
        $_SESSION['msg'] = "Las contraseñas no coinciden";
        header('Location: registro.php');
    }
}



?>