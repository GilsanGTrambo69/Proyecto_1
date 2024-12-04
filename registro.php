<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuario</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <?php
    if(isset($_SESSION['msg']))
    {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <section class="form-registro">
        <form action="registrar.php" method="POST">
            <center><img class="logo" src="assets/img/nexus_logo.png" alt="nexus_logo"></center>
            <div>
                <input
                class="input_registro"
                type="text"
                name="user_name"
                placeholder="Nombres"
                required
                >
            </div>
            <div>
                <input 
                class="input_registro"
                type="text"
                name="surname"
                placeholder="Apellidos"
                required
                >
            </div>
            <div>
                <input
                class="input_registro"
                type="email"
                name="email"
                placeholder="Correo"
                required
                >
            </div>
            <div class="contenedor">

                <input 
                class="input_registro"
                type="number" 
                name="documento"
                placeholder="Numero de Documento"
                required
                >
            </div>
            <div class="contenedor">
                <select class="menu-roles" id="opciones-roles" name="roles">
                <option class="opc1" value="" disable selected hidden>Rol Sena</option>
                <option class="opc" value="1">Aprendiz</option>
                <option class="opc" value="2">Instructor</option>
                <option class="opc" value="3">Bienestar al aprendiz</option>
            </select>
            </div>
            <div>
                <input 
                class="input_registro"
                id="Input_registro" 
                type="text"
                name="code"
                placeholder="Código del rol"
                disabled
                >
            </div>
            
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
                    background-color: none;
                    color: black;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                }

                /* Efecto hover en el botón */
                .input-container button:hover {
                    background-color: none;
                }
            </style>

            <div class="input-container">
                <input 
                class="input_registro"
                id="input_registro_password" 
                type="password"
                name="pass1"
                maxlength="50";
                placeholder="Contraseña"
                required
                >
                <button type="button" id="togglePassword2" >Ver</button>
            </div>

            <script>
                //Scrip para alterar la visibilidad de la contraseña
                const togglePassword = document.getElementById('togglePassword2');
                const passwordInput = document.getElementById('input_registro_password');

                togglePassword.addEventListener('click', function () {
                    const type = passwordInput.type === 'password' ? 'text' : 'password';
                    passwordInput.type = type;

                    //cambiar el icono del boton
                    this.textContent = type === 'password' ? 'Ver' : 'Des ver';
                });
            </script>

            <div class="input-container">
                <input
                class="input_registro"
                id="password-required"
                type="password"
                name="pass2"
                maxlength="50";
                placeholder="Confirmar Contraseña"
                required
                >
                <button type="button" id="togglePassword1">Ver</button>
            </div>

            <script>
                //Scrip para alterar la visibilidad de la contraseña
                const togglePassword1 = document.getElementById('togglePassword1');
                const passwordInput1 = document.getElementById('password-required');

                togglePassword1.addEventListener('click', function () {
                    const type = passwordInput1.type === 'password' ? 'text' : 'password';
                    passwordInput1.type = type;

                    //cambiar el icono del boton
                    this.textContent = type === 'password' ? 'Ver' : 'Des ver';
                });
            </script>

            <div>
                <input 
                class="button-radio" 
                type="checkbox" 
                id="checkbox1" 
                required 
                >
                <label for="checkbox1"><a class="text-underline" href="Terminos_condiciones.php" target="_blank">Acepto terminos y condiciones de privacidad</a></label>
            </div>
            <div>
                <input 
                class="button-radio" 
                type="checkbox" 
                id="checkbox2" 
                required
                >
                <label for="checkbox2"><a class="text-underline" href="https://youtu.be/BtLSaxRnIhc?si=NWQXZpE3tVkAA77C" target="_blank">Acepto recibir correos relacionados a noticias y eventos</a></label>
            </div>
            <br>
            <div>
                <input
                class="submit"
                type="submit"
                value="Registrarme"
                >
            </div>
        </form>
    </section>

    <script>
        // se seleccionan los elementos (la opcion del menu desplegable y el campo de texto)
        const selectMenu = document.getElementById('opciones-roles');
        const textInput = document.getElementById('Input_registro');

        // se agrega un evento para detectar cambios en el menú desplegable
        selectMenu.addEventListener('change', function() {
        if (this.value === '2' || this.value === '3') {
          textInput.disabled = false; // se habilita el campo de texto
        } else {
          textInput.disabled = true;  // se deshabilita el campo de texto
        }
        });
    </script>

</body>
</html>