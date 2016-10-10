<?php

/**
 * Created by PhpStorm.
 * User: baoxucy
 * Date: 16/7/20
 * Time: 下午9:05
 */

include 'DataBase.php';

$db = new DataBase;

//$goods_name=$_POST['goods_name'];
//$goods_size=$_POST['goods_size'];
//$goods_price=$_POST['goods_price'];
//
////Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
//// Check connection
//if ($conn->connect_error) {
//    echo "fail";
//    die("Connection failed: " . $conn->connect_error);
//}
//
//$sql = "INSERT INTO goods (owner, name, price, size)
//VALUES ('1', '".$goods_name."', '".$goods_price."', '".$goods_size."')";
//
//if ($conn->query($sql) === TRUE) {
//    echo "New record created successfully";
//} else {
//    echo "Error: " . $sql . "<br>" . $conn->error;
//}
//
//$conn->close();
//
//echo "success";
//
//class add_goods
//{
//
//}

$db->DB_Initialize();

$good_name = $_POST['good_name'];
$size_price_pair_count = $_POST['size_price_pair_count'];
$good_pic = $_POST['good_pic'];
$last_id = -1;
if ($size_price_pair_count == 0) {

    $price_only = $_POST['price_only'];

    $sql = "INSERT INTO goods_pics (pic_str) VALUES ('" . $good_pic . "');";

    if ($db->getConn()->query($sql) === TRUE) {
        echo "New record created successfully";
        $last_id = $db->getConn()->insert_id;
    } else {
        echo "Error: " . $sql . "<br>" . $db->getConn()->error;
    }

    $sql = "INSERT INTO goods (owner, name, price, size, pic)
VALUES ('1', '" . $good_name . "', '" . $price_only . "', '" . "n/a" . "', '" . $last_id . "')";

    if ($db->getConn()->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $db->getConn()->error;
    }
} else {
    $sql = "INSERT INTO goods_pics (pic_str) VALUES ('" . $good_pic . "');";

    if ($db->getConn()->query($sql) === TRUE) {
        echo "New record created successfully";
        $last_id = $db->getConn()->insert_id;
    } else {
        echo "Error: " . $sql . "<br>" . $db->getConn()->error;
    }

    for ($i = 1; $i <= $size_price_pair_count; ++$i) {


        $sql = "INSERT INTO goods (owner, name, price, size, pic)
VALUES ('1', '" . $good_name . "', '" . $_POST['price_' . $i] . "', '" . $_POST['size_' . $i] . "', '" . $last_id . "')";

        if ($db->getConn()->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $db->getConn()->error;
        }
    }
}

$db->DB_Cleanup();

echo $db->getDBName();