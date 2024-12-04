<?php

$nexus = mysqli_connect('localhost:3306', 'root', '', 'nexus_code');

$doc=$_POST['doc'];
$name=$_POST['name'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$rol=$_POST['rol'];
$password=$_POST['password'];

$sql="INSERT INTO usuarios values('$doc','$name', '$lastname', '$email', '$rol', '$password')";
$query=mysqli_query($nexus, $sql);

if($query){
    header("Location:registro1.php");
};



?>