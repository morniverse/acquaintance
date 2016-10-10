<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <?php include("acq_header.html"); ?>
</head>

<body>
<div class="acq_background">
    <div class="acq_payment_title">
        <img src="http://www.sinaimg.cn/blog/developer/wiki/kongminglogo.jpg" class="acq_userpic" alt=""/>
    </div>
    <div class="acq_payment_status" id="customer_name">王小宁&nbsp;&nbsp;请支付</div>
    <div class="acq_section_bar acq_border_align">您的订单</div>
    <div class="acq_section_background" id="goods_list">
        <div class="acq_form_item">
            <div class="acq_good_pic">
                <img src="http://www.sinaimg.cn/blog/developer/wiki/kongminglogo.jpg" class="acq_userpic" alt=""/>
            </div>
            <div class="acq_good_details">
                <div class="acq_good_details_title">澳洲专柜UGG皮毛一体雪地靴</div>
                <div class="acq_good_details_description">男款42码 黑色</div>
                <div class="acq_good_details_amount_price_detail">
                    <div class="acq_good_details_amount_price_detail_amount">数量</div>
                    <div class="acq_good_details_amount_price_detail_totalprice">单价</div>
                </div>
            </div>
        </div>
        <div class="acq_good_billing">
            合计：<p class="acq_good_billing_total">1818.00</p>
            <p class="acq_good_billing_postfee">（含邮费20元）</p>
        </div>
    </div>
    <div class="acq_section_bar acq_border_align">收货信息</div>
    <div class="acq_section_background">
        <div class="acq_form_item">
            <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
            填写收货地址
            <input type="text" class="acq_input_without_border">
        </div>
        <div class="acq_form_item">
            <span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
            填写联系方式
            <input type="text" class="acq_input_without_border">
        </div>
    </div>
    <div class="acq_last_operation">
        <button type="button" class="btn btn-success">支付</button>
    </div>
</div>
<script>
    $(document).ready(function () {
        $.ajax({
            url: 'get_order.php',
            data: "order_id=<?php echo $_GET['order_id'];?>",
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#goods_list').html(data['goods_list_str']);
                $('#customer_name').html(data['customer']+"&nbsp;&nbsp;请支付");
            }
        });

    });
</script>
</body>
</html>