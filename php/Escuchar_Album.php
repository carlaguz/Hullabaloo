<?php
include('./headers.php');
include('./connection.php');

$album = $_GET['album'];

$res = $conn->query("SELECT track.Titulo AS Track, track.URL, track.id AS IDtrack, album.id AS IDalbum, album.Titulo AS Album, album.Portada FROM album JOIN track ON album.id = track.FK_Album WHERE album.id = $album");

$array_results = [];

while ($obj = mysqli_fetch_object($res)) {
    array_push($array_results, $obj);
}

echo json_encode($array_results); 

?>