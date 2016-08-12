<?php

/**
 * Created by PhpStorm.
 * User: baoxucy
 * Date: 16/7/21
 * Time: 上午12:37
 */

$servername = 'localhost';
$username = 'gogogobuybuybuy';
$password = 'gogogobuybuybuy';
$dbname = 'gogogobuybuybuy';

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    echo "fail";
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, price, size FROM goods where owner='1'";
$result = $conn->query($sql);

$goods_str = "
                    <div class=\"weui_cells weui_cells_checkbox\">
                    <label class=\"weui_cell weui_check_label good_item\" for=\"good_-1\" id=\"good_item_-1\">
                            <div class=\"weui_cell_hd\">
                                <input type=\"checkbox\" class=\"weui_check good\" name=\"checkbox[]\" id=\"good_-1\" value=\"-1\">
                                <i class=\"weui_icon_checked\"></i>
                            </div>
                            <a href=\"javascript:void(0);\" class=\"weui_media_box weui_media_appmsg\">
                                <div class=\"weui_media_hd\">
                                    <img class=\"weui_media_appmsg_thumb\"
                                         src=\"images/post_icon.png\"
                                         alt=\"\">
                                </div>
                                <div class=\"weui_media_bd\">
                                    <div class=\"weui-row\">
                                        <div class=\"weui-col-33\">
                                            <h4 class=\"weui_media_title\">邮费</h4>
                                        </div>
                                        <div class=\"weui_cell weui-col-66\">
                                        <label class=\"weui_label\" for=\"good_amount_-1\">&yen;</label>
                                        <input class=\"weui_input\" id=\"good_amount_-1\" name=\"goods_amount_-1\" type=\"number\" placeholder=\"1\" min=\"1\" max=\"9999\" step=\"1\" value=\"1\">
                                    </div>
                                    </div>
                                </div>
                            </a>
                        </label>";

$array = array();

$id = 1;

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

        $goods_str .= "<label class=\"weui_cell weui_check_label good_item\" for=\"good_{$row['id']}\" id=\"good_item_{$row['id']}\">
                            <div class=\"weui_cell_hd\">
                                <input type=\"checkbox\" class=\"weui_check good\" name=\"checkbox[]\" id=\"good_{$row['id']}\" value=\"{$row['id']}\">
                                <i class=\"weui_icon_checked\"></i>
                            </div>
                            <a href=\"javascript:void(0);\" class=\"weui_media_box weui_media_appmsg\">
                                <div class=\"weui_media_hd\">
                                    <img class=\"weui_media_appmsg_thumb\"
                                         src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAB4CAMAAAAOusbgAAAAeFBMVEUAwAD///+U5ZTc9twOww7G8MYwzDCH4YcfyR9x23Hw+/DY9dhm2WZG0kbT9NP0/PTL8sux7LFe115T1VM+zz7i+OIXxhes6qxr2mvA8MCe6J6M4oz6/frr+us5zjn2/fa67rqB4IF13XWn6ad83nxa1loqyirn+eccHxx4AAAC/klEQVRo3u2W2ZKiQBBF8wpCNSCyLwri7v//4bRIFVXoTBBB+DAReV5sG6lTXDITiGEYhmEYhmEYhmEYhmEY5v9i5fsZGRx9PyGDne8f6K9cfd+mKXe1yNG/0CcqYE86AkBMBh66f20deBc7wA/1WFiTwvSEpBMA2JJOBsSLxe/4QEEaJRrASP8EVF8Q74GbmevKg0saa0B8QbwBdjRyADYxIhqxAZ++IKYtciPXLQVG+imw+oo4Bu56rjEJ4GYsvPmKOAB+xlz7L5aevqUXuePWVhvWJ4eWiwUQ67mK51qPj4dFDMlRLBZTqF3SDvmr4BwtkECu5gHWPkmDfQh02WLxXuvbvC8ku8F57GsI5e0CmUwLz1kq3kD17R1In5816rGvQ5VMk5FEtIiWislTffuDpl/k/PzscdQsv8r9qWq4LRWX6tQYtTxvI3XyrwdyQxChXioOngH3dLgOFjk0all56XRi/wDFQrGQU3Os5t0wJu1GNtNKHdPqYaGYQuRDfbfDf26AGLYSyGS3ZAK4S8XuoAlxGSdYMKwqZKM9XJMtyqXi7HX/CiAZS6d8bSVUz5J36mEMFDTlAFQzxOT1dzLRljjB6+++ejFqka+mXIe6F59mw22OuOw1F4T6lg/9VjL1rLDoI9Xzl1MSYDNHnPQnt3D1EE7PrXjye/3pVpr1Z45hMUdcACc5NVQI0bOdS1WA0wuz73e7/5TNqBPhQXPEFGJNV2zNqWI7QKBd2Gn6AiBko02zuAOXeWIXjV0jNqdKegaE/kJQ6Bfs4aju04lMLkA2T5wBSYPKDGF3RKhFYEa6A1L1LG2yacmsaZ6YPOSAMKNsO+N5dNTfkc5Aqe26uxHpx7ZirvgCwJpWq/lmX1hA7LyabQ34tt5RiJKXSwQ+0KU0V5xg+hZrd4Bn1n4EID+WkQdgLfRNtvil9SPfwy+WQ7PFBWQz6dGWZBLkeJFXZGCfLUjCgGgqXo5TuSu3cugdcTv/HjqnBTEMwzAMwzAMwzAMwzAMw/zf/AFbXiOA6frlMAAAAABJRU5ErkJggg==\"
                                         alt=\"\">
                                </div>
                                <div class=\"weui_media_bd\">
                                    <h4 class=\"weui_media_title\">" . $row['name'] . "</h4>
                                    <p class=\"weui_media_desc\">由各种物质组成的巨型球状天体，叫做星球。星球有一定的形状，有自己的运行轨道。</p>
                                </div>
                            </a>
                        </label>
                        <label id=\"good_deal_stat_div_{$row['id']}\" hidden>
                        <div class=\"weui-row\">
                            <div class=\"weui-col-33\"> </div>
                                <div class=\"weui_cell weui-col-33 }\">
                                    <label class=\"weui_label\" for=\"good_amount_{$row['id']}\">" . "数量" . "</label>
                                    <input class=\"weui_input\" id=\"good_amount_{$row['id']}\" name=\"goods_amount_{$row['id']}\" type=\"number\" placeholder=\"1\" min=\"1\" max=\"9999\" step=\"1\" value=\"1\">
                                </div>
                            <div class=\"weui-col-33\"></div>
                        </div>
                        </label>";

        $array[] = $row;
        $id += 1;
    }
} else {
    echo "0 results";
}

$goods_str .= "        
                    </div>
                ";

$conn->close();

echo $goods_str;

class get_goods
{

}