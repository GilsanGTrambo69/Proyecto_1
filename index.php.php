<?php

include("assets/conexion.php");
include("controlador.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Login</title>
    <style>
        /* Contenedor para el input y el botón */
        .input-container {
            position: relative;
            width: 300px; /* Ajusta el ancho según sea necesario */
        }

        /* Estilo del botón */
        .input-container button {
            position: absolute;
            right: -122px;
            top: 37%;
            transform: translateY(-50%);
            padding: 5px 10px;
            /*background-color: none; */
            color: black;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        /* Efecto hover en el botón 
        .input-container button:hover {
            background-color: none;
        } */
    </style>

</head>
<body>
    <?php
    if(isset($_SESSION['msg']))
    {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }?>
    <form action="" method="post">
    <br>
    <section class="form-login">
        <!--<h1 class="Nombre-login">Incio de Sesion</h1> -->
        <form action="post" >
            <center>
                <img
                height="125"
                width="275"
                src="https://pic.surf/yj" 
                alt="nexus_logo"
                loading="lazy">
            </center>

                <div>
                    <input
                    class="input_grande"
                    type="documento"
                    name="documento"
                    placeholder="Documento"
                    height="40"
                    width="50"
                    >
                </div>
                <br>
                <div class="input-container">
                    <input
                    class="input_grande"
                    id="input_password"
                    type="password"
                    name="contraseña"
                    placeholder="Contraseña"
                    height="40"
                    width="40"
                    maxlength="50"
                    required>
                    <button type="button" id="togglePassword">Ver</button>
                    <?php
                    ?>
                    <script>
                        //Scrip para alterar la visibilidad de la contraseña
                        const togglePassword = document.getElementById('togglePassword');
                        const passwordInput = document.getElementById('input_password');

                        togglePassword.addEventListener('click', function () {
                            const type = passwordInput.type === 'password' ? 'text' : 'password';
                            passwordInput.type = type;

                            //cambiar el icono del boton
                            this.textContent = type === 'password' ? 'Ver' : 'Des ver';
                        });
                    </script>
                </div>
                <br>
                <p class="text_link"><a href="ingresar_correo_modal.php">He olvidado mi contraseña</a></p>
                <p class="text_link"><a href="registro.php">No tengo una cuenta registrada</a></p>
                <p class="text_link"><a href="registro1.php">Modulos</a></p>
                <div>
                    <input 
                    class="submit"
                    type="submit"  
                    name="ingresar"
                    value="Ingresar">
                </div>
        </form>


    </section>
    <!--
    <section>
        <center>
            <div class="modal-correo" id="modal1">
                <p class="normal-text">Ingresa tu correo para enviar el codigo de verificación</p>
                <p class="green-text">Introduce el correo</p>
                <foSrm action="post">
                    <br>
                    <br>
                    <input class="email-verificacion" type="email" require placeholder="Correo">
                    <br>
                    <br>
                    <div>
                        <!--<button class="cerrar-modal" type="button">Atras</button> --
                        <input class="cerrar-modal" type="button" value="Atras">
                        <input class="submit-confirmar-Correo" type="submit" value="Confirmar" ><a href="ingresar_codigo_modal.php"></a>
                    </div>
                </foSrm>
            </div>
        </center>
    </section> -->


</body>
</html>