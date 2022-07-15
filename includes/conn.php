<?php 
//Nos conectamos a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "2poblacio_de_catalunya";

// $conexion = mysqli_connect($servername,$username,$password,$dbname);
$conexion = new mysqli($servername,$username,$password,$dbname);

if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
}
