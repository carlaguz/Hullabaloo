<?php
include('./headers.php');
header('Content-Type: application/json');
$obj = new stdClass();


$obj->username = 'hi';
$obj->password = '123';


echo json_encode($obj);

?>