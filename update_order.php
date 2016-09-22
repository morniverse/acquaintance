<?php

$type = $_GET['type'];


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

$is_finished = 1;

switch ($type) {

    case 0: {
        $address = $_GET['address'];
        $cell = $_GET['cell'];
        $order_id = $_GET['order_id'];

        $sql = "update order_status set state='1',pay_date='" . date("Y-m-d H:i:s") . "',address='{$address}',cell='{$cell}' where order_id='{$order_id}'";
        $result = $conn->query($sql);
        if ($result === TRUE) {

        } else {
            echo "Error updating record: " . $conn->error;
        }
        break;
    }
    case 1: {
        $order_id = $_GET['order_id'];
        $good_id = $_GET['good_id'];
        $val = $_GET['val'];
        $sql = "update orders set state='{$val}' where order_id='{$order_id}' && good_id='{$good_id}'";
        $result = $conn->query($sql);
        if ($result === TRUE) {

        } else {
            echo "Error updating record: " . $conn->error;
        }


        $sql = "select state from orders where order_id='{$order_id}'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['state'] != 2) {
                    $is_finished = 0;
                }
            }

            if ($is_finished) {
                $sql = "update order_status set state='2', deliver_date='" . date("Y-m-d H:i:s") . "' where order_id='{$order_id}'";
                $result = $conn->query($sql);
                if ($result === TRUE) {

                } else {
                    echo "Error updating record: " . $conn->error;

                }
            }
        }

        break;
    }
}
$response = array('is_finished' => $is_finished);
echo json_encode($response);

$conn->close();