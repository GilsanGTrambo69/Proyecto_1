<?php
$documento=$_POST['documento'];
$contraseña=$_POST['contraseña'];

session_start();
$_SESSION['documento']=$documento;

$nexus = mysqli_connect('localhost:3308', 'root', '', 'nexus_code');

$consulta="SELECT*FROM usuarios where documento_usuario='$documento' and contraseña_usuario='$contraseña'";
$resultado=mysqli_query($nexus, $consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
    header("location:inicio.php");

}else{
    ?>
    <?php
    include("Login_Nexus.php");
    ?>
    <h1 class="bad"></h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($nexus);