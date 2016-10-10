<?php

//$servername = 'localhost';
//$username = 'gogogobuybuybuy';
//$password = 'gogogobuybuybuy';
//$dbname = 'gogogobuybuybuy';
//
////Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
//// Check connection
//if ($conn->connect_error) {
//    echo "fail";
//    die("Connection failed: " . $conn->connect_error);
//}
//
//
//$goods_list_str = "";
//$owner = "";
//$total_price = 0;
//
//$sql = "select good_id, amount from orders where order_id='{$_GET['order_id']}'";
//$result = $conn->query($sql);
//if ($result->num_rows > 0) {
//    while ($row = $result->fetch_assoc()) {
//        $sql = "select owner, name, price, size from goods where id='{$row['good_id']}'";
//        $goods = $conn->query($sql);
//        if ($goods->num_rows > 0) {
//            $good = $goods->fetch_assoc();
//            $owner = $good['owner'];
//            $total_price += $row['amount'] * $good['price'];
//
//            $goods_list_str = "<a href=\"javascript:void(0);\" class=\"weui_media_box weui_media_appmsg\">
//                            <div class=\"weui_media_hd\">
//                                <img class=\"weui_media_appmsg_thumb\"
//                                     src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAB4CAMAAAAOusbgAAAAeFBMVEUAwAD///+U5ZTc9twOww7G8MYwzDCH4YcfyR9x23Hw+/DY9dhm2WZG0kbT9NP0/PTL8sux7LFe115T1VM+zz7i+OIXxhes6qxr2mvA8MCe6J6M4oz6/frr+us5zjn2/fa67rqB4IF13XWn6ad83nxa1loqyirn+eccHxx4AAAC/klEQVRo3u2W2ZKiQBBF8wpCNSCyLwri7v//4bRIFVXoTBBB+DAReV5sG6lTXDITiGEYhmEYhmEYhmEYhmEY5v9i5fsZGRx9PyGDne8f6K9cfd+mKXe1yNG/0CcqYE86AkBMBh66f20deBc7wA/1WFiTwvSEpBMA2JJOBsSLxe/4QEEaJRrASP8EVF8Q74GbmevKg0saa0B8QbwBdjRyADYxIhqxAZ++IKYtciPXLQVG+imw+oo4Bu56rjEJ4GYsvPmKOAB+xlz7L5aevqUXuePWVhvWJ4eWiwUQ67mK51qPj4dFDMlRLBZTqF3SDvmr4BwtkECu5gHWPkmDfQh02WLxXuvbvC8ku8F57GsI5e0CmUwLz1kq3kD17R1In5816rGvQ5VMk5FEtIiWislTffuDpl/k/PzscdQsv8r9qWq4LRWX6tQYtTxvI3XyrwdyQxChXioOngH3dLgOFjk0all56XRi/wDFQrGQU3Os5t0wJu1GNtNKHdPqYaGYQuRDfbfDf26AGLYSyGS3ZAK4S8XuoAlxGSdYMKwqZKM9XJMtyqXi7HX/CiAZS6d8bSVUz5J36mEMFDTlAFQzxOT1dzLRljjB6+++ejFqka+mXIe6F59mw22OuOw1F4T6lg/9VjL1rLDoI9Xzl1MSYDNHnPQnt3D1EE7PrXjye/3pVpr1Z45hMUdcACc5NVQI0bOdS1WA0wuz73e7/5TNqBPhQXPEFGJNV2zNqWI7QKBd2Gn6AiBko02zuAOXeWIXjV0jNqdKegaE/kJQ6Bfs4aju04lMLkA2T5wBSYPKDGF3RKhFYEa6A1L1LG2yacmsaZ6YPOSAMKNsO+N5dNTfkc5Aqe26uxHpx7ZirvgCwJpWq/lmX1hA7LyabQ34tt5RiJKXSwQ+0KU0V5xg+hZrd4Bn1n4EID+WkQdgLfRNtvil9SPfwy+WQ7PFBWQz6dGWZBLkeJFXZGCfLUjCgGgqXo5TuSu3cugdcTv/HjqnBTEMwzAMwzAMwzAMwzAMw/zf/AFbXiOA6frlMAAAAABJRU5ErkJggg==\"
//                                     alt=\"\">
//                            </div>
//                            <div class=\"weui_media_bd\">
//                                <h4 class=\"weui_media_title\">{$good['name']}</h4>
//                                <p class=\"weui_media_desc\">型号:{$good['size']}</p>
//                                <p class=\"weui_media_desc\">总价:&yen;" . $row['amount'] * $good['price'] . "</p>
//                                <p class=\"weui_media_desc\">数量:{$row['amount']}</p>
//                            </div>
//                        </a>" . $goods_list_str;
//        }
//    }
//}
//
//$sql = "select name from merchants where id='{$owner}'";
//$result = $conn->query($sql);
//if($result->num_rows > 0){
//    $row = $result->fetch_assoc();
//    $owner = $row['name'];
//}
//
//$json = array();
//$json['goods_list_str'] = $goods_list_str;
//$json['owner'] = $owner;
//$json['total_price'] = $total_price;
//
//$conn->close();
//
//echo json_encode($json);

include 'DataBase.php';

$db = new DataBase;

$db->DB_Initialize();

$goods_list_str = "";
$owner = "";

$sql = "select customer, good_price, post_fee, create_date from order_status where order_id='{$_GET['order_id']}'";
$order_result = $db->getConn()->query($sql);
if ($order_result->num_rows > 0) {
    $order_row = $order_result->fetch_assoc();
    $customer = $order_row['customer'];
    $sql = "select name from users where id='{$customer}'";
    $customer_result = $db->getConn()->query($sql);
    $customer_name = $customer_result->fetch_assoc();

    $sql = "select good_id, amount from orders where order_id='{$_GET['order_id']}'";
    $result = $db->getConn()->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $sql = "select owner, name, price, size from goods where id='{$row['good_id']}'";
            $goods = $db->getConn()->query($sql);
            if ($goods->num_rows > 0) {
                $good = $goods->fetch_assoc();
                $owner = $good['owner'];

                $goods_list_str .= "<div class=\"acq_form_item\">
            <div class=\"acq_good_pic\">
                <img src=\"http://www.sinaimg.cn/blog/developer/wiki/kongminglogo.jpg\" class=\"acq_userpic\" alt=\"\"/>
            </div>
            <div class=\"acq_good_details\">
                <div class=\"acq_good_details_title\">{$good['name']}</div>
                <div class=\"acq_good_details_description\">{$good['size']}</div>
                <div class=\"acq_good_details_amount_price_detail\">
                    <div class=\"acq_good_details_amount_price_detail_amount\">数量 x {$row['amount']}</div>
                    <div class=\"acq_good_details_amount_price_detail_totalprice\">{$good['price']}</div>
                </div>
            </div>
        </div>";
            }
        }
    }

    $goods_list_str .= "<div class=\"acq_good_billing\">
            合计：<p class=\"acq_good_billing_total\">{$order_row['good_price']}</p>
            <p class=\"acq_good_billing_postfee\">（含邮费{$order_row['post_fee']}元）</p>
        </div>";
}

$json = array();
$json['goods_list_str'] = $goods_list_str;
$json['customer'] = $customer_name['name'];

echo json_encode($json);

$db->DB_Cleanup();