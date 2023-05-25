<?php
include('./headers.php');
include('./connection.php');

$titulo = $_POST["titulo"];
$portada = $_POST['portada'];
$banda = $_POST['banda'];

//echo json_encode([$nombre, $portada]);

if($conn->query("INSERT INTO album (Titulo, Portada, FK_Banda) VALUES ('$titulo','$portada',$banda)")){
    echo json_encode('titulo registrado con exito !!!!!!!');
    exit();
}
?>