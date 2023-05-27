<?php
include('./headers.php');
include('./connection.php');

$nombre = $_POST["nombre"];
$foto = $_POST['foto'];
$banda = $_POST['banda'];

//echo json_encode([$nombre, $portada]);

if($conn->query("INSERT INTO artista (Nombre, Foto, FK_Banda) VALUES ('$nombre','$foto',$banda)")){
    echo json_encode('artista registrado con exito !!!!!!!');
    exit();
}
?>