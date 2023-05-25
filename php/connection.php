<?php
$conn = new mysqli("localhost:3306", "root", "", "hullabaloolib");

if ($conn->connect_errno){
    printf("Fallo la conecion: %s\n", $conn->connect_error);
    exit();
}
?>