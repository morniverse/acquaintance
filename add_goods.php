<?php

/**
 * Created by PhpStorm.
 * User: baoxucy
 * Date: 16/7/20
 * Time: 下午9:05
 */

$servername='localhost';
$username='gogogobuybuybuy';
$password='gogogobuybuybuy';
$dbname='gogogobuybuybuy';

$goods_name=$_POST['goods_name'];
$goods_size=$_POST['goods_size'];
$goods_price=$_POST['goods_price'];

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    echo "fail";
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO goods (owner, name, price, size)
VALUES ('1', '".$goods_name."', '".$goods_price."', '".$goods_size."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

echo "success";

class add_goods
{

}