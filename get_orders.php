<?php

$type = $_GET['type'];

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


switch ($type_map->$type) {
    case 0: {
        $sql = "select order_id, customer from order_status where owner='{$_POST['owner']}' and state='0'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($order_id_row = $result->fetch_assoc()) {
                $total_price = 0;
                $sql = "select good_id, amount from orders where order_id='{$order_id_row['order_id']}'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($good_row = $result->fetch_assoc()) {
                        $sql = "select owner, name, price, size from goods where id='{$good_row['good_id']}'";
                        $goods = $conn->query($sql);
                        if ($goods->num_rows > 0) {
                            $good = $goods->fetch_assoc();

                            $total_price += $row['amount'] * $good['price'];
                    }
                }
            }
        }

        break;
    }
    case 1: {


        break;
    }
    case 2: {
        echo "3";
        break;
    }
}

$conn->close();