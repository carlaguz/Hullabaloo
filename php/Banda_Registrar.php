<?php
include('./headers.php');
include('./connection.php');

$nombre = $_POST["nombre"];
$portada = $_POST['portada'];

//echo json_encode([$nombre, $portada]);

if($conn->query("INSERT INTO banda (Nombre, Portada) VALUES ('$nombre','$portada')")){
    echo json_encode('$nombre registrado con exito !!!!!!!');
    exit();
}
?>