<?php

$address = $_GET['address'];
$cell = $_GET['cell'];
$type = $_GET['type'];
$order_id = $_GET['order_id'];

$servername = 'localhost';
$username = 'gogogobuybuybuy';
$password = 'gogogobuybuybuy';
$dbname = 'gogogobuybuybuy';

$type_map = new stdClass();
$type_map->todeliver = 1;
$type_map->tochargefee = 0;
$type_map->finished = 2;

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    echo "fail";
    die("Connection failed: " . $conn->connect_error);
}

$sql = "update order_status set state='1',pay_date='".date("Y-m-d H:i:s")."',address={$address},cell={$cell} where order_id='{$order_id}'";
$result = $conn->query($sql);
if($result === TRUE){

}else{
    echo "Error updating record: " . $conn->error;
}

$conn->close();