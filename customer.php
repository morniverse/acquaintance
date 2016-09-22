<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title></title>

    <link rel="stylesheet" href="https://res.wx.qq.com/open/libs/weui/0.4.3/weui.css"/>

    <link rel="stylesheet" href="./example.css"/>

    <link rel="stylesheet" href="./gogogobuybuybuy.css"/>

    <link rel="stylesheet" href="jquery-weui/dist/css/jquery-weui.css"/>
    <script src="jquery-weui/dist/lib/jquery-2.1.4.js"></script>
    <script src="jquery-weui/dist/js/jquery-weui.js"></script>
    <script src="jquery.textchange.min.js"></script>

</head>
<body ontouchstart>

<div class="weui_tab">

    <div class="gogogobuybuybuy_paybar">
        <a href="#" class="gogogobuybuybuy_paybar_price_item" id="total_price">
        </a>
        <a href="#" class="gogogobuybuybuy_paybar_item_disabled" id="pay_button">
            立即支付
        </a>
    </div>


    <div class="weui_tab_bd">
        <header class='order-header'>
            <h1 class="order-title">请支付订单</h1>
        </header>
        <div id="tab1" class="weui_tab_bd_item weui_tab_bd_item_active">
            <form id="order_form">
                <div class="weui_panel weui_panel_access">
                    <div class="weui_panel_bd" id="goods_list">
                    </div>
                </div>
                <div class="weui_cells weui_cells_form">
                    <div class="weui_cell">
                        <div class="weui_cell_hd"><label class="weui_label">收货地址</label></div>
                        <div class="weui_cell_bd weui_cell_primary">
                            <input class="weui_input" id="address" name="address" type="text" placeholder="请输入收货地址">
                        </div>
                    </div>
                    <div class="weui_cell">
                        <div class="weui_cell_hd"><label class="weui_label">手机号码</label></div>
                        <div class="weui_cell_bd weui_cell_primary">
                            <input class="weui_input" id="cell" name="cell" type="tel" placeholder="请输入手机号码">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<script src="https://cdn.bootcss.com/zepto/1.1.6/zepto.min.js"></script>


<script>
    $(document).ready(function () {
        $.ajax({
            url: 'get_order.php',
            data: "order_id=<?php echo $_GET['order_id'];?>",
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#goods_list').html(data['goods_list_str']);
                $('#total_price').html(data['total_price']);
                $('title').html(data['owner']);
            }
        });

        $('.weui_input').bind('hastext', function () {
            if($('#address').val() && $('#cell').val()){
                $('#pay_button').removeClass('gogogobuybuybuy_paybar_item_disabled');
                $('#pay_button').addClass('gogogobuybuybuy_paybar_item');
            }
        });

        $('.weui_input').bind('notext', function () {
            if(!$('#address').val() || !$('#cell').val()){
                $('#pay_button').removeClass('gogogobuybuybuy_paybar_item');
                $('#pay_button').addClass('gogogobuybuybuy_paybar_item_disabled');
            }
        });
    });

    $('#pay_button').on('click', function(){

        $.ajax({
            url: 'update_order.php',
            data: "address="+$('#address').val()+"&cell="+$('#cell').val()+"&order_id=<?php echo $_GET['order_id'];?>&type=0",
            success: function(data){
                $.toast("支付成功", function() {
                });
            }
        });
    });

</script>

</body>
</html>
