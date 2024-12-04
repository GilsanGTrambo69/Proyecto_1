<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/proyecto(gilversión)/assets/css/login.css">
    <title>Login</title>
</head>
    <body>
        <center>
            <div class="modal-correo" id="modal1">
                <p class="normal-text">Ingresa tu correo para enviar el codigo de verificación</p>
                <p class="green-text">Introduce el correo</p>
                <form action="logicamail.php" method="POST">
                    <br>
                    <br>
                    <?php
                    if(isset($_SESSION['response'])):
                    ?>

                    <h2> <?php echo $_SESSION['response'] ;?> </h2>

                    <?php unset($_SESSION['response']); endif; ?>

                    <div>
                        <input 
                        class="email-verificacion" 
                        type="email" 
                        name="email"
                        id="email" 
                        required
                        placeholder="Correo">
                    </div>
                    
                    <br>
                    <br>
                    <div>
                        <!-- Botón para redirigir a Login_Nexus.php con JavaScript -->
                        <input 
                            class="cerrar-modal" 
                            type="button" 
                            value="Atras" 
                            onclick="window.location.href='Login_Nexus.php';"
                        >       
                        <button class="submit-confirmar-Correo" value="Confirmar" name="send">Enviar</button>
                    </div>
                </form>
            </div>
        </center>
    </body>
</html>