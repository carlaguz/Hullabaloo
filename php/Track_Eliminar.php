<?php
include('./headers.php');
include('./connection.php');

$track = $_GET['track'];

//echo json_encode([$nombre, $portada]);

if($conn->query("DELETE FROM track WHERE id = $track")){
    echo json_encode('track eliminado con exito !!!!!!!');
    exit();
}
?>