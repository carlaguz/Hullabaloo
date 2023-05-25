<?php
include('./headers.php');
include('./connection.php');

$res = $conn->query("SELECT * FROM banda");

$array_results = [];

while ($obj = mysqli_fetch_object($res)) {
    array_push($array_results, $obj);
}

echo json_encode($array_results);
?>