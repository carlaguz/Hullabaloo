<?php
include('./headers.php');
include('./connection.php');

$user = $_POST['user'];
$pwd = $_POST['pwd'];

$res = $conn->query("SELECT * FROM users WHERE name = '$user' AND password = '$pwd'");

echo json_encode(mysqli_fetch_object($res));

?>