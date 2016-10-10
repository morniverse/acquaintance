<?php
/**
 * Created by PhpStorm.
 * User: baoxucy
 * Date: 16/7/25
 * Time: 上午10:50
 */

//$servername = 'localhost';
//$username = 'gogogobuybuybuy';
//$password = 'gogogobuybuybuy';
//$dbname = 'gogogobuybuybuy';
//
//$goods_amount_prefix = "goods_amount_";
//
//$url_tpl = "http://120.26.78.53/customer.php?order_id=";
//
////Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
//// Check connection
//if ($conn->connect_error) {
//    echo "fail";
//    die("Connection failed: " . $conn->connect_error);
//}
//
//$sql = "select order_id from orders order by order_id desc limit 1";
//$result = $conn->query($sql);
//
//$order_id = 0;
//if ($result->num_rows > 0) {
//    // output data of each row
//    while ($row = $result->fetch_assoc()) {
//        $order_id = $row['order_id'] + 1;
//    }
//} else {
//    echo "0 results";
//}
//
//foreach ($_POST['checkbox'] as $good_id) {
//    $sql = "select owner from goods where id='{$good_id}' limit 1";
//    $result = $conn->query($sql);
//
//    $owner = 0;
//    if ($result->num_rows > 0) {
//        // output data of each row
//        while ($row = $result->fetch_assoc()) {
//            $owner = $row['owner'];
//        }
//        break;
//    } else {
//        continue;
//    }
//}
//
//$customer = 2;
//$sql = "insert into users (name, type, related) values (\"${_POST["customer_name"]}\", 2, \"\")";
//if ($conn->query($sql) === TRUE) {
////        echo "execute:" . $sql . " successfully";
//    $customer = $conn->insert_id;
//} else {
//    echo "Error: " . $sql . "<br>" . $conn->error;
//}
//
//
//$good_price = 0;
//$post_fee = 0;
//$order_status = 0;
//foreach ($_POST['checkbox'] as $good_id) {
//
//    if ($good_id == "-1") {//for post fee
//        $good_price += $_POST[$goods_amount_prefix . $good_id];
//        $sql = "insert orders (order_id, good_id, amount, owner, state) values ({$order_id}, {$good_id}, {$_POST[$goods_amount_prefix.$good_id]}, {$owner}, 2)";
//        continue;
//    }else {
//        $sql = "insert orders (order_id, good_id, amount, owner, state) values ({$order_id}, {$good_id}, {$_POST[$goods_amount_prefix.$good_id]}, {$owner}, 0)";
//    }
////    echo $sql."\n";
//
//    if ($conn->query($sql) === TRUE) {
////        echo "execute:" . $sql . " successfully";
//    } else {
//        echo "Error: " . $sql . " < br>" . $conn->error;
//    }
//
//    $sql = "select price from goods where id = '{$good_id}'";
//    $result = $conn->query($sql);
//    if ($result->num_rows > 0) {
//        $row = $result->fetch_assoc();
//        $good_price += $row['price'] * $_POST[$goods_amount_prefix . $good_id];
//    } else {
//        echo "0 results";
//    }
//}
//
//$sql = "insert order_status(order_id, customer, good_price, post_fee, state, owner, create_date) values({$order_id}, {$customer}, {$good_price}, {$post_fee}, {$order_status}, {$owner}, '" . date("Y-m-d H:i:s") . "')";
//
//if ($conn->query($sql) === TRUE) {
//
//} else {
//    echo "Error: " . $sql . " < br>" . $conn->error;
//}
//
//echo $url_tpl . $order_id;
//
//$conn->close();

include 'DataBase.php';

$db = new DataBase;

$db->DB_Initialize();


$goods_amount_prefix = "amount_";


$sql = "select id from order_status order by id desc limit 1";
$result = $db->getConn()->query($sql);

$order_id = 0;
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $order_id = $row['id'] + 1;
    }
} else {
    echo "0 results";
}


foreach ($_POST['checkbox'] as $good_id) {
    $sql = "select owner from goods where id='{$good_id}' limit 1";
    $result = $db->getConn()->query($sql);

    $owner = 0;
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $owner = $row['owner'];
        }
        break;
    } else {
        continue;
    }
}

$customer = -1;
$sql = "insert into users (name, type, related) values (\"${_POST["customer_name"]}\", 2, \"\")";
if ($db->getConn()->query($sql) === TRUE) {
//        echo "execute:" . $sql . " successfully";
    $customer = $db->getConn()->insert_id;
} else {
    echo "Error: " . $sql . "<br>" . $db->getConn()->error;
}

$good_price .= 0;
$post_fee = $_POST['customer_postfee'];
$order_status = 0;
$good_price .= $post_fee;
foreach ($_POST['checkbox'] as $good_id) {

    $sql = "insert orders (order_id, good_id, amount, owner, state) values ({$order_id}, {$good_id}, {$_POST[$goods_amount_prefix.$good_id]}, {$owner}, 0)";
    if ($db->getConn()->query($sql) === TRUE) {
//        echo "execute:" . $sql . " successfully";
    } else {
        echo "Error: " . $sql . " < br>" . $db->getConn()->error;
    }

    $sql = "select price from goods where id = '{$good_id}'";
    $result = $db->getConn()->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $good_price += $row['price'] * $_POST[$goods_amount_prefix . $good_id];
    } else {
        echo "0 results";
    }
}

$sql = "insert order_status(order_id, customer, good_price, post_fee, state, owner, create_date) values({$order_id}, {$customer}, {$good_price}, {$post_fee}, {$order_status}, {$owner}, '" . date("Y-m-d H:i:s") . "')";

if ($db->getConn()->query($sql) === TRUE) {

} else {
    echo "Error: " . $sql . " < br>" . $db->getConn()->error;
}

$db->DB_Cleanup();

echo $order_id;