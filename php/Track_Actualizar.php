<?php
include('./headers.php');
include('./connection.php');

$titulo = $_POST['titulo'];
$track = $_GET['track'];


//echo json_encode([$nombre, $portada]);

if($conn->query("UPDATE track SET Titulo = '$titulo' WHERE id = $track")){
    echo json_encode('track actualizado con exito !!!!!!!');
    exit();
}
?>