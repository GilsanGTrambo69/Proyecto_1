<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/proyecto(gilversión)/assets/css/login.css">
    <title>Login</title>
</head>
    <body>
        <div class="modal-codigo" id="modal1">
            <center>
                <p class="normal-text">Se ha enviado un código de verificación a tu correo</p>
                <p class="green-text">Introduce el codigo de verificación</p>
            </center>
            <form action="post">
                <br>
                <br>
                <center>
                <input class="codigo-verificacion" id="codigo-verificacion" type="text" placeholder="codigo" required>
                </center>
                <br>
                <p><a class="green-text" href="">Volver a enviar un código</a></p>
                <br>
                <div>
                    <!--<button class="cerrar-modal" type="button">Atras</button> -->
                    <input class="cerrar-modal" type="button" value="Atras">
                    
                    <input class="submit-confirmar-Correo" id="submit-confirmar-correo" type="submit" value="Confirmar" disabled onclick="" >
                </div>
            </form>
        </div>
        
        <script>
            //se seleccionan los elementos
            const selectText1 = document.getElementById('codigo-verificacion');
            const selectSubmit = document.getElementById('submit-confirmar-correo');

            //evento para detectar cambios en el campo de texto
            selectText1.addEventListener('input', function(){
                if (this.value.trim() !== ''){ //se verifica si el campo esta vacio
                    selectSubmit.disabled = false; //se habilita el boton si hay un texto escrito
                } else {
                    selectSubmit.disabled = true; //se deshabilita el boton si no hay texto escrito
                }
            });
        </script>
    </body>
</html>