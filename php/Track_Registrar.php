<?php
include('./headers.php');
include('./connection.php');

$titulo = $_POST['titulo'];
$album = $_POST['album'];
$link = $_POST['URL'];

//echo json_encode([$nombre, $portada]);

if($conn->query("INSERT INTO track (Titulo, FK_Album, URL) VALUES ('$titulo',$album, '$link')")){
    echo json_encode('track registrado con exito !!!!!!!');
    exit();
}
?>