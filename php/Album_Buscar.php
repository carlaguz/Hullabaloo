<?php
include('./headers.php');
include('./connection.php');

$res = $conn->query("SELECT a.id, a.Titulo, a.Portada, b.Nombre FROM album a JOIN banda b WHERE a.FK_Banda = b.id;");

$array_results = [];

while ($obj = mysqli_fetch_object($res)) {
    array_push($array_results, $obj);
}

echo json_encode($array_results); 