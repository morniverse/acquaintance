<?php

//$type = $_GET['type'];
//
//$servername = 'localhost';
//$username = 'gogogobuybuybuy';
//$password = 'gogogobuybuybuy';
//$dbname = 'gogogobuybuybuy';
//
//$type_map = new stdClass();
//$type_map->todeliver = 1;
//$type_map->tochargefee = 0;
//$type_map->finished = 2;
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
//$result = "";
//
//switch ($type_map->$type) {
//    case 0: {
//        $sql = "select order_id, customer from order_status where owner='{$_GET['owner']}' and state='0'";
//        $order_result = $conn->query($sql);
//        if ($order_result->num_rows > 0) {
//            while ($order_row = $order_result->fetch_assoc()) {
//                $total_price = 0;
//                $customer = $order_row['customer'];
//                $sql = "select name from users where id='{$customer}'";
//                $customer_result = $conn->query($sql);
//                $customer_name = $customer_result->fetch_assoc();
//
//                $result_tmp = "";
//
//
//                $sql = "select good_id, amount from orders where order_id='{$order_row['order_id']}'";
//                $good_result = $conn->query($sql);
//                if ($good_result->num_rows > 0) {
//                    while ($good_row = $good_result->fetch_assoc()) {
//                        if ($good_row['good_id'] != "-1") {
//
//                            $sql = "select owner, name, price, size from goods where id='{$good_row['good_id']}'";
//                            $goods = $conn->query($sql);
//                            if ($goods->num_rows > 0) {
//                                $good = $goods->fetch_assoc();
//
//                                $total_price += $good_row['amount'] * $good['price'];
//
//                                $result_tmp .= "<div class=\"weui_cell\">
//                                <div class=\"weui_media_hd weui_cell_primary\">
//                                    <img class=\"weui_media_appmsg_thumb\"
//                                         src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAB4CAMAAAAOusbgAAAAeFBMVEUAwAD///+U5ZTc9twOww7G8MYwzDCH4YcfyR9x23Hw+/DY9dhm2WZG0kbT9NP0/PTL8sux7LFe115T1VM+zz7i+OIXxhes6qxr2mvA8MCe6J6M4oz6/frr+us5zjn2/fa67rqB4IF13XWn6ad83nxa1loqyirn+eccHxx4AAAC/klEQVRo3u2W2ZKiQBBF8wpCNSCyLwri7v//4bRIFVXoTBBB+DAReV5sG6lTXDITiGEYhmEYhmEYhmEYhmEY5v9i5fsZGRx9PyGDne8f6K9cfd+mKXe1yNG/0CcqYE86AkBMBh66f20deBc7wA/1WFiTwvSEpBMA2JJOBsSLxe/4QEEaJRrASP8EVF8Q74GbmevKg0saa0B8QbwBdjRyADYxIhqxAZ++IKYtciPXLQVG+imw+oo4Bu56rjEJ4GYsvPmKOAB+xlz7L5aevqUXuePWVhvWJ4eWiwUQ67mK51qPj4dFDMlRLBZTqF3SDvmr4BwtkECu5gHWPkmDfQh02WLxXuvbvC8ku8F57GsI5e0CmUwLz1kq3kD17R1In5816rGvQ5VMk5FEtIiWislTffuDpl/k/PzscdQsv8r9qWq4LRWX6tQYtTxvI3XyrwdyQxChXioOngH3dLgOFjk0all56XRi/wDFQrGQU3Os5t0wJu1GNtNKHdPqYaGYQuRDfbfDf26AGLYSyGS3ZAK4S8XuoAlxGSdYMKwqZKM9XJMtyqXi7HX/CiAZS6d8bSVUz5J36mEMFDTlAFQzxOT1dzLRljjB6+++ejFqka+mXIe6F59mw22OuOw1F4T6lg/9VjL1rLDoI9Xzl1MSYDNHnPQnt3D1EE7PrXjye/3pVpr1Z45hMUdcACc5NVQI0bOdS1WA0wuz73e7/5TNqBPhQXPEFGJNV2zNqWI7QKBd2Gn6AiBko02zuAOXeWIXjV0jNqdKegaE/kJQ6Bfs4aju04lMLkA2T5wBSYPKDGF3RKhFYEa6A1L1LG2yacmsaZ6YPOSAMKNsO+N5dNTfkc5Aqe26uxHpx7ZirvgCwJpWq/lmX1hA7LyabQ34tt5RiJKXSwQ+0KU0V5xg+hZrd4Bn1n4EID+WkQdgLfRNtvil9SPfwy+WQ7PFBWQz6dGWZBLkeJFXZGCfLUjCgGgqXo5TuSu3cugdcTv/HjqnBTEMwzAMwzAMwzAMwzAMw/zf/AFbXiOA6frlMAAAAABJRU5ErkJggg==\"
//                                         alt=\"\">
//                                </div>
//                                <div class=\"weui_media_bd weui_cell_primary\">
//                                    <h4 class=\"weui_media_title\">{$good['name']}</h4>
//                                    <p class=\"weui_media_desc\">型号:{$good['size']}</p>
//                                    <p class=\"weui_media_desc\">&yen;" . $good_row['amount'] * $good['price'] . "</p>
//                                    <p class=\"weui_media_desc\">数量:{$good_row['amount']}</p>
//                                </div>
//                            </div>";
//                            }
//                        }else{
//
//                            $total_price += $good_row['amount'];
//
//                            $result_tmp .= "<div class=\"weui_cell\">
//                                <div class=\"weui_media_hd\">
//                                    <img class=\"weui_media_appmsg_thumb\"
//                                         src=\"images/post_icon.png\"
//                                         alt=\"\">
//                                </div>
//                                <div class=\"weui_media_bd\">
//                                    <h4 class=\"weui_media_title\">邮费</h4>
//                                    <p class=\"weui_media_desc\">&yen;" . $good_row['amount'] . "</p>
//                                </div>
//                            </div>";
//                        }
//                    }
//                }
//
//                $result .= "
//                <div class=\"order-details\" id=\"order_" . $order_row['order_id'] . "\">
//                        <div class=\"weui_cells\">
//                            <div class=\"weui_cell\">
//                                <div class=\"weui_cell_hd\"><img
//                                        src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAuCAMAAABgZ9sFAAAAVFBMVEXx8fHMzMzr6+vn5+fv7+/t7e3d3d2+vr7W1tbHx8eysrKdnZ3p6enk5OTR0dG7u7u3t7ejo6PY2Njh4eHf39/T09PExMSvr6+goKCqqqqnp6e4uLgcLY/OAAAAnklEQVRIx+3RSRLDIAxE0QYhAbGZPNu5/z0zrXHiqiz5W72FqhqtVuuXAl3iOV7iPV/iSsAqZa9BS7YOmMXnNNX4TWGxRMn3R6SxRNgy0bzXOW8EBO8SAClsPdB3psqlvG+Lw7ONXg/pTld52BjgSSkA3PV2OOemjIDcZQWgVvONw60q7sIpR38EnHPSMDQ4MjDjLPozhAkGrVbr/z0ANjAF4AcbXmYAAAAASUVORK5CYII=\"
//                                        alt=\"\" style=\"width:20px;margin-right:5px;display:block\"></div>
//                                <div class=\"weui_cell_bd weui_cell_primary\">
//                                    <p>{$customer_name['name']}</p>
//                                </div>
//                                <div class=\"weui_cell_ft\">{$total_price}</div>
//                            </div>
//                            <div class=\"weui_cell\">
//                                <div class=\"weui_cell_bd weui_cell_primary\">
//                                </div>
//                                <div class=\"weui_cell_ft\">未付款</div>
//                            </div>";
//
//                $result .= $result_tmp;
//
//                $result .= "<div class=\"weui_cell\">
//                                <div class=\"weui_cell_bd weui_cell_primary\"></div>
//                                <div class=\"weui_cell_ft\">
//                                    <div class=\"button_sp_area\">
//                                        <a href=\"javascript:;\" class=\"weui_btn weui_btn_mini weui_btn_primary\">修改订单</a>
//                                        <a href=\"javascript:;\" class=\"weui_btn weui_btn_mini weui_btn_plain_default\">发送订单</a>
//                                        <a href=\"javascript:;\" class=\"weui_btn weui_btn_mini weui_btn_default\">删除订单</a>
//                                    </div>
//                                </div>
//                            </div>";
//
//                $result .= "
//                        </div>
//                    </div>";
//            }
//        }
//
//        break;
//    }
//    case 1: {
//        $sql = "select order_id, customer, pay_date, address, cell from order_status where owner='{$_GET['owner']}' and state='1'";
//        $order_result = $conn->query($sql);
//        if ($order_result->num_rows > 0) {
//            while ($order_row = $order_result->fetch_assoc()) {
//                $total_price = 0;
//                $customer = $order_row['customer'];
//                $pay_date = $order_row['pay_date'];
//                $address = $order_row['address'];
//                $cell = $order_row['cell'];
//                $sql = "select name from users where id='{$customer}'";
//                $customer_result = $conn->query($sql);
//                $customer_name = $customer_result->fetch_assoc();
//
//                $result_tmp = "";
//
//
//                $sql = "select good_id, amount from orders where order_id='{$order_row['order_id']}'";
//                $good_result = $conn->query($sql);
//                if ($good_result->num_rows > 0) {
//                    while ($good_row = $good_result->fetch_assoc()) {
//                        if ($good_row['good_id'] != "-1") {
//
//                            $sql = "select owner, name, price, size from goods where id='{$good_row['good_id']}'";
//                            $goods = $conn->query($sql);
//                            if ($goods->num_rows > 0) {
//                                $good = $goods->fetch_assoc();
//
//                                $total_price += $good_row['amount'] * $good['price'];
//
//                                $result_tmp .= "<div class=\"weui_cell weui_cell_switch\">
//                                <div class=\"weui_media_hd weui_cell_primary\">
//                                    <img class=\"weui_media_appmsg_thumb\"
//                                         src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAB4CAMAAAAOusbgAAAAeFBMVEUAwAD///+U5ZTc9twOww7G8MYwzDCH4YcfyR9x23Hw+/DY9dhm2WZG0kbT9NP0/PTL8sux7LFe115T1VM+zz7i+OIXxhes6qxr2mvA8MCe6J6M4oz6/frr+us5zjn2/fa67rqB4IF13XWn6ad83nxa1loqyirn+eccHxx4AAAC/klEQVRo3u2W2ZKiQBBF8wpCNSCyLwri7v//4bRIFVXoTBBB+DAReV5sG6lTXDITiGEYhmEYhmEYhmEYhmEY5v9i5fsZGRx9PyGDne8f6K9cfd+mKXe1yNG/0CcqYE86AkBMBh66f20deBc7wA/1WFiTwvSEpBMA2JJOBsSLxe/4QEEaJRrASP8EVF8Q74GbmevKg0saa0B8QbwBdjRyADYxIhqxAZ++IKYtciPXLQVG+imw+oo4Bu56rjEJ4GYsvPmKOAB+xlz7L5aevqUXuePWVhvWJ4eWiwUQ67mK51qPj4dFDMlRLBZTqF3SDvmr4BwtkECu5gHWPkmDfQh02WLxXuvbvC8ku8F57GsI5e0CmUwLz1kq3kD17R1In5816rGvQ5VMk5FEtIiWislTffuDpl/k/PzscdQsv8r9qWq4LRWX6tQYtTxvI3XyrwdyQxChXioOngH3dLgOFjk0all56XRi/wDFQrGQU3Os5t0wJu1GNtNKHdPqYaGYQuRDfbfDf26AGLYSyGS3ZAK4S8XuoAlxGSdYMKwqZKM9XJMtyqXi7HX/CiAZS6d8bSVUz5J36mEMFDTlAFQzxOT1dzLRljjB6+++ejFqka+mXIe6F59mw22OuOw1F4T6lg/9VjL1rLDoI9Xzl1MSYDNHnPQnt3D1EE7PrXjye/3pVpr1Z45hMUdcACc5NVQI0bOdS1WA0wuz73e7/5TNqBPhQXPEFGJNV2zNqWI7QKBd2Gn6AiBko02zuAOXeWIXjV0jNqdKegaE/kJQ6Bfs4aju04lMLkA2T5wBSYPKDGF3RKhFYEa6A1L1LG2yacmsaZ6YPOSAMKNsO+N5dNTfkc5Aqe26uxHpx7ZirvgCwJpWq/lmX1hA7LyabQ34tt5RiJKXSwQ+0KU0V5xg+hZrd4Bn1n4EID+WkQdgLfRNtvil9SPfwy+WQ7PFBWQz6dGWZBLkeJFXZGCfLUjCgGgqXo5TuSu3cugdcTv/HjqnBTEMwzAMwzAMwzAMwzAMw/zf/AFbXiOA6frlMAAAAABJRU5ErkJggg==\"
//                                         alt=\"\">
//                                </div>
//                                <div class=\"weui_media_bd weui_cell_primary\">
//                                    <h4 class=\"weui_media_title\">{$good['name']}</h4>
//                                    <p class=\"weui_media_desc\">型号:{$good['size']}</p>
//                                    <p class=\"weui_media_desc\">&yen;" . $good_row['amount'] * $good['price'] . "</p>
//                                    <p class=\"weui_media_desc\">数量:{$good_row['amount']}</p>
//                                </div>
//                                <div class=\"weui_cell_ft\">
//                                  <input class=\"weui_switch good_deliver_switch\" id=\"{$order_row['order_id']}_{$good_row['good_id']}\" type=\"checkbox\">
//                                  <p id=\"{$order_row['order_id']}_{$good_row['good_id']}_status\">未发货</p>
//                                </div>
//                            </div>";
//                            }
//                        }else{
//
//                            $total_price += $good_row['amount'];
//
//                            $result_tmp .= "<div class=\"weui_cell\">
//                                <div class=\"weui_media_hd weui_cell_primary\">
//                                    <img class=\"weui_media_appmsg_thumb\"
//                                         src=\"images/post_icon.png\"
//                                         alt=\"\">
//                                </div>
//                                <div class=\"weui_media_bd weui_cell_primary\">
//                                    <h4 class=\"weui_media_title\">邮费</h4>
//                                    <p class=\"weui_media_desc\">&yen;" . $good_row['amount'] . "</p>
//                                </div>
//                            </div>";
//                        }
//                    }
//                }
//
//                $result .= "
//                <div class=\"order-details\" id=\"order_" . $order_row['order_id'] . "\">
//                        <div class=\"weui_cells\">
//                            <div class=\"weui_cell\">
//                                <div class=\"weui_cell_hd\"><img
//                                        src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAuCAMAAABgZ9sFAAAAVFBMVEXx8fHMzMzr6+vn5+fv7+/t7e3d3d2+vr7W1tbHx8eysrKdnZ3p6enk5OTR0dG7u7u3t7ejo6PY2Njh4eHf39/T09PExMSvr6+goKCqqqqnp6e4uLgcLY/OAAAAnklEQVRIx+3RSRLDIAxE0QYhAbGZPNu5/z0zrXHiqiz5W72FqhqtVuuXAl3iOV7iPV/iSsAqZa9BS7YOmMXnNNX4TWGxRMn3R6SxRNgy0bzXOW8EBO8SAClsPdB3psqlvG+Lw7ONXg/pTld52BjgSSkA3PV2OOemjIDcZQWgVvONw60q7sIpR38EnHPSMDQ4MjDjLPozhAkGrVbr/z0ANjAF4AcbXmYAAAAASUVORK5CYII=\"
//                                        alt=\"\" style=\"width:20px;margin-right:5px;display:block\"></div>
//                                <div class=\"weui_cell_bd weui_cell_primary\">
//                                    <p>{$customer_name['name']}</p>
//                                </div>
//                                <div class=\"weui_cell_ft\">&yen;{$total_price}</div>
//                            </div>
//                            <div class=\"weui_cell\">
//                                <div class=\"weui_cell_bd weui_cell_primary\">
//                                </div>
//                                <div class=\"weui_cell_ft\">{$pay_date}完成支付</div>
//                            </div>
//                            <div class=\"weui_cell\">
//                                <div class=\"weui_cell_hd\"><label class=\"weui_label\">收货地址</label></div>
//                                <div class=\"weui_cell_bd weui_cell_primary\">
//                                    {$address}
//                                </div>
//                            </div>
//                            <div class=\"weui_cell\">
//                                <div class=\"weui_cell_hd\"><label class=\"weui_label\">联系电话</label></div>
//                                <div class=\"weui_cell_bd weui_cell_primary\">
//                                    {$cell}
//                                </div>
//                            </div>";
//
//                $result .= $result_tmp;
//
//                $result .= "
//                        </div>
//                    </div>";
//            }
//        }
//
//        break;
//    }
//    case 2: {
//        $sql = "select order_id, customer, deliver_date from order_status where owner='{$_GET['owner']}' and state='2'";
//        $order_result = $conn->query($sql);
//        if ($order_result->num_rows > 0) {
//            while ($order_row = $order_result->fetch_assoc()) {
//                $total_price = 0;
//                $customer = $order_row['customer'];
//                $deliver_date = $order_row['deliver_date'];
//                $sql = "select name from users where id='{$customer}'";
//                $customer_result = $conn->query($sql);
//                $customer_name = $customer_result->fetch_assoc();
//
//                $result_tmp = "";
//
//
//                $sql = "select good_id, amount from orders where order_id='{$order_row['order_id']}'";
//                $good_result = $conn->query($sql);
//                if ($good_result->num_rows > 0) {
//                    while ($good_row = $good_result->fetch_assoc()) {
//                        if ($good_row['good_id'] != "-1") {
//
//                            $sql = "select owner, name, price, size from goods where id='{$good_row['good_id']}'";
//                            $goods = $conn->query($sql);
//                            if ($goods->num_rows > 0) {
//                                $good = $goods->fetch_assoc();
//
//                                $total_price += $good_row['amount'] * $good['price'];
//
//                                $result_tmp .= "<div class=\"weui_cell\">
//                                <div class=\"weui_media_hd weui_cell_primary\">
//                                    <img class=\"weui_media_appmsg_thumb\"
//                                         src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAB4CAMAAAAOusbgAAAAeFBMVEUAwAD///+U5ZTc9twOww7G8MYwzDCH4YcfyR9x23Hw+/DY9dhm2WZG0kbT9NP0/PTL8sux7LFe115T1VM+zz7i+OIXxhes6qxr2mvA8MCe6J6M4oz6/frr+us5zjn2/fa67rqB4IF13XWn6ad83nxa1loqyirn+eccHxx4AAAC/klEQVRo3u2W2ZKiQBBF8wpCNSCyLwri7v//4bRIFVXoTBBB+DAReV5sG6lTXDITiGEYhmEYhmEYhmEYhmEY5v9i5fsZGRx9PyGDne8f6K9cfd+mKXe1yNG/0CcqYE86AkBMBh66f20deBc7wA/1WFiTwvSEpBMA2JJOBsSLxe/4QEEaJRrASP8EVF8Q74GbmevKg0saa0B8QbwBdjRyADYxIhqxAZ++IKYtciPXLQVG+imw+oo4Bu56rjEJ4GYsvPmKOAB+xlz7L5aevqUXuePWVhvWJ4eWiwUQ67mK51qPj4dFDMlRLBZTqF3SDvmr4BwtkECu5gHWPkmDfQh02WLxXuvbvC8ku8F57GsI5e0CmUwLz1kq3kD17R1In5816rGvQ5VMk5FEtIiWislTffuDpl/k/PzscdQsv8r9qWq4LRWX6tQYtTxvI3XyrwdyQxChXioOngH3dLgOFjk0all56XRi/wDFQrGQU3Os5t0wJu1GNtNKHdPqYaGYQuRDfbfDf26AGLYSyGS3ZAK4S8XuoAlxGSdYMKwqZKM9XJMtyqXi7HX/CiAZS6d8bSVUz5J36mEMFDTlAFQzxOT1dzLRljjB6+++ejFqka+mXIe6F59mw22OuOw1F4T6lg/9VjL1rLDoI9Xzl1MSYDNHnPQnt3D1EE7PrXjye/3pVpr1Z45hMUdcACc5NVQI0bOdS1WA0wuz73e7/5TNqBPhQXPEFGJNV2zNqWI7QKBd2Gn6AiBko02zuAOXeWIXjV0jNqdKegaE/kJQ6Bfs4aju04lMLkA2T5wBSYPKDGF3RKhFYEa6A1L1LG2yacmsaZ6YPOSAMKNsO+N5dNTfkc5Aqe26uxHpx7ZirvgCwJpWq/lmX1hA7LyabQ34tt5RiJKXSwQ+0KU0V5xg+hZrd4Bn1n4EID+WkQdgLfRNtvil9SPfwy+WQ7PFBWQz6dGWZBLkeJFXZGCfLUjCgGgqXo5TuSu3cugdcTv/HjqnBTEMwzAMwzAMwzAMwzAMw/zf/AFbXiOA6frlMAAAAABJRU5ErkJggg==\"
//                                         alt=\"\">
//                                </div>
//                                <div class=\"weui_media_bd weui_cell_primary\">
//                                    <h4 class=\"weui_media_title\">{$good['name']}</h4>
//                                    <p class=\"weui_media_desc\">型号:{$good['size']}</p>
//                                    <p class=\"weui_media_desc\">&yen;" . $good_row['amount'] * $good['price'] . "</p>
//                                    <p class=\"weui_media_desc\">数量:{$good_row['amount']}</p>
//                                </div>
//                            </div>";
//                            }
//                        }else{
//
//                            $total_price += $good_row['amount'];
//
//                            $result_tmp .= "<div class=\"weui_cell\">
//                                <div class=\"weui_media_hd\">
//                                    <img class=\"weui_media_appmsg_thumb\"
//                                         src=\"images/post_icon.png\"
//                                         alt=\"\">
//                                </div>
//                                <div class=\"weui_media_bd\">
//                                    <h4 class=\"weui_media_title\">邮费</h4>
//                                    <p class=\"weui_media_desc\">&yen;" . $good_row['amount'] . "</p>
//                                </div>
//                            </div>";
//                        }
//                    }
//                }
//
//                $result .= "
//                <div class=\"order-details\" id=\"order_" . $order_row['order_id'] . "\">
//                        <div class=\"weui_cells\">
//                            <div class=\"weui_cell\">
//                                <div class=\"weui_cell_hd\"><img
//                                        src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAuCAMAAABgZ9sFAAAAVFBMVEXx8fHMzMzr6+vn5+fv7+/t7e3d3d2+vr7W1tbHx8eysrKdnZ3p6enk5OTR0dG7u7u3t7ejo6PY2Njh4eHf39/T09PExMSvr6+goKCqqqqnp6e4uLgcLY/OAAAAnklEQVRIx+3RSRLDIAxE0QYhAbGZPNu5/z0zrXHiqiz5W72FqhqtVuuXAl3iOV7iPV/iSsAqZa9BS7YOmMXnNNX4TWGxRMn3R6SxRNgy0bzXOW8EBO8SAClsPdB3psqlvG+Lw7ONXg/pTld52BjgSSkA3PV2OOemjIDcZQWgVvONw60q7sIpR38EnHPSMDQ4MjDjLPozhAkGrVbr/z0ANjAF4AcbXmYAAAAASUVORK5CYII=\"
//                                        alt=\"\" style=\"width:20px;margin-right:5px;display:block\"></div>
//                                <div class=\"weui_cell_bd weui_cell_primary\">
//                                    <p>{$customer_name['name']}</p>
//                                </div>
//                                <div class=\"weui_cell_ft\">{$total_price}</div>
//                            </div>
//                            <div class=\"weui_cell\">
//                                <div class=\"weui_cell_bd weui_cell_primary\">
//                                </div>
//                                <div class=\"weui_cell_ft\">{$deliver_date}完成发货</div>
//                            </div>";
//
//                $result .= $result_tmp;
//
//                $result .= "
//                        </div>
//                    </div>";
//            }
//        }
//        break;
//    }
//}
//
//$conn->close();
//
//echo $result;

include 'DataBase.php';

$db = new DataBase;

$db->DB_Initialize();

$type = $_GET['type'];
$cur_order_page_size = $_GET['cur_order_page_size'];

$type_map = new stdClass();
$type_map->title_tochargefee = 0;
$type_map->title_todeliver = 1;
$type_map->title_finished = 2;

$actual_page_step = 0;
$page_step = 5;
$json = array();

$result = "";
switch ($type_map->$type) {
    case 0: {
        $sql = "select order_id, customer, good_price, post_fee, create_date from order_status where owner='{$_GET['owner']}' and state='0' order by id desc limit {$page_step} offset {$cur_order_page_size}";
        $order_result = $db->getConn()->query($sql);
        if ($order_result->num_rows > 0) {
            while ($order_row = $order_result->fetch_assoc()) {
                $json_good = array();

                $customer = $order_row['customer'];
                $sql = "select name from users where id='{$customer}'";
                $customer_result = $db->getConn()->query($sql);
                $customer_name = $customer_result->fetch_assoc();

                $order_row['customer_name'] = $customer_name['name'];

                $result .= "<div class=\"acq_section_background\">
                <div class=\"acq_order_title\">
                    <div class=\"acq_good_pic\">
                        <img src=\"http://www.sinaimg.cn/blog/developer/wiki/kongminglogo.jpg\" class=\"acq_userpic\"
                             alt=\"\"/>
                    </div>
                    <div class=\"acq_order_title_details\">
                        <div class=\"acq_good_details_title\">{$customer_name['name']}</div>
                        <div class=\"acq_good_details_description\">下单时间: {$order_row['create_date']}</div>
                    </div>
                    <div class=\"acq_order_title_billing\">
                        <div class=\"acq_order_title_billing_status\">待付款</div>
                        <div class=\"acq_order_title_billing_total\">&yen;<Strong>{$order_row['good_price']}</Strong></div>
                    </div>
                </div>";


                $sql = "select good_id, amount from orders where order_id='{$order_row['order_id']}' order by id desc";
                $good_result = $db->getConn()->query($sql);
                if ($good_result->num_rows > 0) {
                    while ($good_row = $good_result->fetch_assoc()) {

                        $sql = "select owner, name, size, price, pic from goods where id='{$good_row['good_id']}'";
                        $goods = $db->getConn()->query($sql);
                        if ($goods->num_rows > 0) {
                            $good = $goods->fetch_assoc();

                            $sql = "select pic_str_small from goods_pics where id='" . $good['pic'] . "';";
                            $result_pic = $db->getConn()->query($sql);
                            $row_pic = $result_pic->fetch_assoc();

                            $good_row['owner'] = $good['owner'];
                            $good_row['name'] = $good['name'];
                            $good_row['size'] = $good['size'];
                            $good_row['price'] = $good['price'];
                            $good_row['pic_str_small'] = $row_pic['pic_str_small'];

                            $result .= "<div class=\"acq_order_item\">
                    <div class=\"acq_good_pic\">
                        <img src=\"" . $row_pic['pic_str_small'] . "\" class=\"acq_goodpic\" alt=\"\"/>
                    </div>
                    <div class=\"acq_good_details\">
                        <div class=\"acq_good_details_title\">{$good['name']}</div>
                        <div class=\"acq_good_details_description\">{$good['size']} 数量 x {$good_row['amount']}</div>
                        <div class=\"acq_good_details_description\">&yen;{$good['price']}</div>
                    </div>
                </div>";
                        }
                        $json_good[] = $good_row;
                    }
                }


                $result .= "<div class=\"acq_order_oprt_bar\">
                    <div class=\"acq_order_oprt acq_order_oprt_send\">
                        <span class=\"glyphicon glyphicon-share\">发送订单
                    </div>
                    <div class=\"acq_order_oprt\">
                        <span class=\"glyphicon glyphicon-edit\">修改订单
                    </div>
                    <div class=\"acq_order_oprt acq_order_oprt_delete\">
                        <span class=\"glyphicon glyphicon-trash\">删除订单
                    </div>
                </div>";

                $result .= "</div>";
                $result .= "<div class=\"acq_border_align acq_section_bar acq_section_bar_position\"></div>";

                $order_row['json_good'] = $json_good;
                $json[] = $order_row;
            }
        }

        break;
    }
    case 1: {
        break;
    }
    case 2: {
        break;
    }
}

$db->DB_Cleanup();

echo json_encode($json);