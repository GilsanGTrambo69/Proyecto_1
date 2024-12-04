<?php

$nexus = mysqli_connect('localhost:3306', 'root', '', 'nexus_code');

$doc=$_GET['doc'];

$sql="DELETE FROM usuarios Where documento_usuario='$doc'";
$query=mysqli_query($nexus, $sql);

if($query){
    header("Location:registro1.php");
};

?>