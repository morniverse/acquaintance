<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <?php include("acq_header.html"); ?>
</head>

<body>
<div class="acq_background"  class="acq_bottom_tab">
    <div id="home_tab">
        <div class="acq_order_control_panel acq_row">
            <div class="acq_col acq_col_border acq_col_control_panel" id="create_order">
                <span class="glyphicon glyphicon-save" aria-hidden="true"></span><br>
                保存订单
            </div>
            <div class="acq_col acq_col_border acq_col_control_panel" id="create_good">
                <span class="glyphicon glyphicon-plus-sign"></span><br>
                添加商品
            </div>
            <div class="acq_col acq_col_border acq_col_control_panel" id="send_order">
                <span class="glyphicon glyphicon-share"></span><br>
                发送订单
            </div>
        </div>


        <div class="acq_border_align acq_section_bar acq_section_bar_position">订单信息</div>
        <div class="acq_section_background">
            <form class="acq_form_brief_info" id='brief_info'>
                <div class="acq_form_brief_info_identify">
                    顾客姓名：
                    <input type="text" class="acq_input_without_border" id="customer_name" name="customer_name"/>
                </div>
                <div class="acq_form_brief_info_info">
                    邮费&yen;
                    <input type="number" class="acq_input_without_border" id="customer_postfee" name="customer_postfee"
                           value="0"/>
                </div>
            </form>
            <div class="acq_order_summary_tab acq_uncontent" id="order_summary"> <!--acq_uncontent-->
                尚未选择任何商品
                <!--            <div class="acq_summary_border_align">-->
                <!--                <div class="acq_good_details" id='summary_good_details'>-->
                <!--                    <div class="acq_good_details_title acq_summary_title">澳洲专柜UGG皮毛一体雪地靴</div>-->
                <!--                    <div class="acq_good_details_description">数量 x 2</div>-->
                <!--                </div>-->
                <!--                <div class="acq_good_billing">-->
                <!--                    <p class="acq_good_billing_total">&yen;<Strong>1818.00</Strong></p><br><p class="acq_good_billing_postfee">（含邮费<Strong>20</Strong>元）</p>-->
                <!--                </div>-->
                <!--            </div>-->
            </div>
        </div>
        <div class="acq_section_bar acq_border_align">商品列表</div>
        <form class="acq_section_background " id="good_list"><!--acq_good_list_uncontent-->
<!--            <div class="acq_circlediv acq_checkbox_small acq_checkbox_checked">-->
<!--                <span class="glyphicon glyphicon-ok glyphicon-ok-small" aria-hidden="true"></span>-->
<!--            </div>-->
<!--            <div class="acq_circlediv acq_checkbox_small"></div>-->
            <!--暂无可选商品，请添加-->
            <!--        <div class="acq_form_item">-->
            <!--            <div class="acq_good_checkbox">-->
            <!--                <div class="checkbox checkbox-success checkbox-circle">-->
            <!--                    <input class="styled" type="checkbox">-->
            <!--                    <label>-->
            <!--                    </label>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--            <div class="acq_good_pic">-->
            <!--                <img src="http://www.sinaimg.cn/blog/developer/wiki/kongminglogo.jpg" alt=""/>-->
            <!--            </div>-->
            <!--            <div class="acq_good_details">-->
            <!--                <div class="acq_good_details_title">澳洲专柜UGG皮毛一体雪地靴</div>-->
            <!--                <div class="acq_good_details_description">男款42码 黑色</div>-->
            <!--                <div class="acq_good_details_amount_price_detail">-->
            <!--                    <div class="acq_info acq_info_goodlist">-->
            <!--                        <div class="acq_input">-->
            <!--                            <div class="acq_info_prefix acq_info_prefix_goodlist">价格&yen;-->
            <!--                            </div>-->
            <!--                            <input class="acq_input_suffix" type="number" name="price">-->
            <!--                            </input>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                    <div class="acq_info acq_info_goodlist">-->
            <!--                        <div class="acq_input">-->
            <!--                            <div class="acq_info_prefix acq_plus_minus_goodlist acq_minus_goodlist">-->
            <!--                                <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>-->
            <!--                            </div>-->
            <!--                            <input class="acq_input_suffix" type="number" name="price" value="1">-->
            <!--                            </input>-->
            <!--                            <div class="acq_info_prefix acq_plus_minus_goodlist acq_plus_goodlist">-->
            <!--                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
        </form>
        <div class="acq_section_bar acq_bottom_placeholder">
        </div>
    </div>

    <div id="orders_tab" class="acq_bottom_tab">
        <div class="acq_order_filter_panel acq_row">
            <div class="acq_col acq_col_border_align" id="title_tochargefee">
                <div class="acq_col_sub_cell acq_col_sub_cell_active acq_col_orders">
                    待付款
                </div>
            </div>
            <div class="acq_col acq_col_border_align" id="title_todeliver">
                <div class="acq_col_sub_cell acq_col_orders">
                    待发货
                </div>
            </div>
            <div class="acq_col acq_col_border_align" id="title_finished">
                <div class="acq_col_sub_cell acq_col_orders">
                    已完成
                </div>
            </div>
        </div>

        <div class="acq_border_align acq_section_bar acq_section_bar_position"></div>
        <div id="tochargefee_tab">
            <div class="acq_section_background">
                <div class="acq_order_title">
                    <div class="acq_good_pic">
                        <img src="http://www.sinaimg.cn/blog/developer/wiki/kongminglogo.jpg" class="acq_userpic"
                             alt=""/>
                    </div>
                    <div class="acq_order_title_details">
                        <div class="acq_good_details_title">王小宁</div>
                        <div class="acq_good_details_description">下单时间: 2016-08-24 10:08</div>
                    </div>
                    <div class="acq_order_title_billing">
                        <div class="acq_order_title_billing_status">待付款</div>
                        <div class="acq_order_title_billing_total">&yen;<Strong>1818.00</Strong></div>
                    </div>
                </div>
                <div class="acq_order_item">
                    <div class="acq_good_pic">
                        <img src="http://www.sinaimg.cn/blog/developer/wiki/kongminglogo.jpg" alt=""/>
                    </div>
                    <div class="acq_good_details">
                        <div class="acq_good_details_title">澳洲专柜UGG皮毛一体雪地靴</div>
                        <div class="acq_good_details_description">男款42码 数量 x 2</div>
                    </div>
                </div>
                <div class="acq_order_oprt_bar">
                    <div class="acq_order_oprt acq_order_oprt_send">
                        <span class="glyphicon glyphicon-share">发送订单
                    </div>
                    <div class="acq_order_oprt">
                        <span class="glyphicon glyphicon-edit">修改订单
                    </div>
                    <div class="acq_order_oprt acq_order_oprt_delete">
                        <span class="glyphicon glyphicon-trash">删除订单
                    </div>
                </div>
            </div>
        </div>
        <div id="todeliver_tab">
            <div class="acq_section_background">
                <div class="acq_order_title">
                    <div class="acq_good_pic">
                        <img src="http://www.sinaimg.cn/blog/developer/wiki/kongminglogo.jpg" class="acq_userpic"
                             alt=""/>
                    </div>
                    <div class="acq_order_title_details">
                        <div class="acq_good_details_title">王小宁</div>
                        <div class="acq_good_details_description">下单时间: 2016-08-24 10:08</div>
                    </div>
                    <div class="acq_order_title_billing">
                        <div class="acq_order_title_billing_status">已支付</div>
                        <div class="acq_order_title_billing_total acq_order_title_billing_total_finished">&yen;<Strong>1818.00</Strong></div>
                    </div>
                </div>
                <div class="acq_order_address_bar">
                    <div class="acq_icon_div">
                        <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                    </div>
                    <div class="acq_order_address">
                        <p>北京市海淀区中关村南大街鼎好大厦A座1221室</p>
                        <p>18222590390</p>
                    </div>
                </div>
                <div class="acq_order_item">
                    <div class="acq_good_pic">
                        <img src="http://www.sinaimg.cn/blog/developer/wiki/kongminglogo.jpg" alt=""/>
                    </div>
                    <div class="acq_good_details">
                        <div class="acq_good_details_title">澳洲专柜UGG皮毛一体雪地靴</div>
                        <div class="acq_good_details_description">男款42码 数量 x 2</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="finished_tab">
            <div class="acq_section_background acq_good_list_uncontent">
                <p>您还没有相关订单</p>
                <p>-快去勾搭好友</p>
            </div>
        </div>

    </div>


    <div class="acq_bottom_panel acq_row">
        <div class="acq_col acq_bottom_panel_active acq_col_bottom_panel" id="home">
            <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span><br>
            新建
        </div>
        <div class="acq_col acq_col_bottom_panel" id="orders">
            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span><br>
            订单
        </div>
        <div class="acq_col acq_col_bottom_panel" id="withdraw">
            <span class="glyphicon glyphicon-yen" aria-hidden="true"></span><br>
            提现
        </div>
    </div>
</div>

<?php include("acq_footer.html"); ?>

</body>
</html>