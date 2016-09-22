<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>WOQU</title>
    <!--    <link rel="stylesheet" href="weui/dist/style/weui.css"/>-->

    <link rel="stylesheet" href="./example.css"/>

    <link rel="stylesheet" href="./gogogobuybuybuy.css"/>

    <link rel="stylesheet" href="https://res.wx.qq.com/open/libs/weui/0.4.3/weui.css"/>
<!--        <link rel="stylesheet" href="weui/dist/style/weui.min.css"/>-->

    <link rel="stylesheet" href="jquery-weui/dist/css/jquery-weui.css"/>
    <script src="jquery-weui/dist/lib/jquery-2.1.4.js"></script>
    <script src="jquery-weui/dist/js/jquery-weui.js"></script>


    <!--        <link rel="stylesheet" href="jquery-weui/dist/lib/weui.min.css">-->
    <!--        <link rel="stylesheet" href="jquery-weui/dist/css/jquery-weui.css">-->
    <!--        <link rel="stylesheet" href="jquery-weui/dist/demos/css/demos.css">-->
    <!--        <script src="jquery-weui/dist/lib/jquery-2.1.4.js"></script>-->
    <!--        <script src="jquery-weui/dist/js/jquery-weui.js"></script>-->
</head>
<body ontouchstart>
<!--<div class="container" id="container"></div>-->

<div class="weui_tab">

    <!--    <div class="weui_navbar">-->
    <!--        <a href="#" class="weui_navbar_item open-popup" data-target="#create_good">-->
    <!--            添加商品-->
    <!--        </a>-->
    <!--        <a href="#" class="weui_navbar_item open-popup" data-target="#create_order" id="send_order">-->
    <!--            发送订单-->
    <!--        </a>-->
    <!--    </div>-->

    <div class="weui_tab_bd">
        <div id="tab1" class="weui_tab_bd_item weui_tab_bd_item_active">
            <div class="gogogobubuybuy_navbar">
                <a href="#" class="gogogobubuybuy_navbar_item open-popup" data-target="#save_order"
                   id="save_order_btn">
                    保存订单
                </a>
                <a href="#" class="gogogobubuybuy_navbar_item open-popup" data-target="#create_good">
                    添加商品
                </a>
                <a href="#" class="gogogobubuybuy_navbar_item open-popup" data-target="#create_order"
                   id="send_order">
                    发送订单
                </a>
            </div>
            <div class="goods_list">
                <form id="order_form">
                    <div class="weui_panel weui_panel_access">
                        <div class="weui_panel_bd">
                            <div class="weui_cell">
                                <div class="weui_cell_hd"><label class="weui_label">顾客姓名</label></div>
                                <div class="weui_cell_bd weui_cell_primary">
                                    <input class="weui_input" type="text" name="customer_name" id="customer_name"
                                           placeholder="用输入顾客姓名">
                                </div>
                            </div>
                            <div id="goods_array">

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="tab2" class="weui_tab_bd_item">
            <div class="common_background">
                <div class="weui-row weui-no-gutter">
                    <div class="gogogobuybuybuy-col-33">
                        <a href="#" class="gogogobuybuybuy_navbar_title gogogobuybuybuy_navbar_item_non_active"
                           id="title_todeliver">待发货</a>
                    </div>
                    <div class="gogogobuybuybuy-col-33">
                        <a href="#" class="gogogobuybuybuy_navbar_title gogogobuybuybuy_navbar_item_active"
                           id="title_tochargefee">待收款</a>
                    </div>
                    <div class="gogogobuybuybuy-col-33">
                        <a href="#" class="gogogobuybuybuy_navbar_title gogogobuybuybuy_navbar_item_non_active"
                           id="title_finished">已完成</a>
                    </div>
                </div>
                <div class="gogogobuybuybuy_navbar_content" id="order_list_div_todeliver" hidden>
                </div>
                <div class="gogogobuybuybuy_navbar_content" id="order_list_div_tochargefee"></div>
                <div class="gogogobuybuybuy_navbar_content" id="order_list_div_finished" hidden></div>
            </div>
        </div>
        <div id="tab3" class="weui_tab_bd_item">
            <h1 class="page_title">我</h1>
        </div>
    </div>

    <div id="create_good" class="weui-popup-container">
        <div class="weui-popup-modal">
            <form id="goods_form">
                <div class="weui_cells weui_cells_form">
                    <!--            <div class="weui_cells weui_cells_form">-->
                    <div class="weui_cells_title">商品详情</div>
                    <div class="weui_cell">
                        <div class="weui_cell_hd"><label class="weui_label">商品名称</label></div>
                        <div class="weui_cell_bd weui_cell_primary">
                            <input class="weui_input" name="goods_name" type="tel" placeholder="请输入商品名称">
                        </div>
                    </div>
                    <div class="weui_cell">
                        <div class="weui_cell_hd"><label class="weui_label">型号尺寸</label></div>
                        <div class="weui_cell_bd weui_cell_primary">
                            <input class="weui_input" name="goods_size" type="text" placeholder="请输入型号尺寸">
                        </div>
                    </div>
                    <div class="weui_cell">
                        <div class="weui_cell_hd"><label class="weui_label">商品单价</label></div>
                        <div class="weui_cell_bd weui_cell_primary">
                            <input class="weui_input" name="goods_price" type="number" placeholder="请输入商品单价">
                        </div>
                    </div>
                    <!--            </div>-->
                    <div class="weui_cells_title">商品描述</div>

                    <!--            <div class="weui_cells weui_cells_form">-->
                    <div class="weui_cell">
                        <div class="weui_cell_bd weui_cell_primary">
                            <input class="weui_textarea" name="goods_desc" type="text" placeholder="请输入评论"
                                   rows="3"/>
                            <div class="weui_textarea_counter"><span>0</span>/200</div>
                        </div>
                    </div>
                    <!--            </div>-->

                    <!--            <div class="weui_cells weui_cells_form">-->
                    <div class="weui_cell">
                        <div class="weui_cell_bd weui_cell_primary">
                            <div class="weui_uploader">
                                <div class="weui_uploader_hd weui_cell">
                                    <div class="weui_cell_bd weui_cell_primary">图片上传</div>
                                    <div class="weui_cell_ft js_counter">0/6</div>
                                </div>
                                <div class="weui_uploader_bd">
                                    <ul class="weui_uploader_files">
                                        <!-- 预览图插入到这 --> </ul>
                                    <div class="weui_uploader_input_wrp">
                                        <input class="weui_uploader_input js_file" name="goods_pic" type="file"
                                               accept="image/jpg,image/jpeg,image/png,image/gif" multiple=""></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--            </div>-->
                </div>
                <div class="weui_dialog_alert" style="display: none;">
                    <div class="weui_mask"></div>
                    <div class="weui_dialog">
                        <div class="weui_dialog_hd"><strong class="weui_dialog_title">警告</strong>
                        </div>
                        <div class="weui_dialog_bd">弹窗内容，告知当前页面信息等</div>
                        <div class="weui_dialog_ft">
                            <a href="javascript:;" class="weui_btn_dialog primary">确定</a>
                        </div>
                    </div>
                </div>

                <div class="button_sp_area">
                    <a href="javascript:;" class="weui_btn weui_btn_primary close-popup" id="save">保存</a>
                    <a href="javascript:;" class="weui_btn weui_btn_default close-popup" id="cancel">取消</a>
                </div>
            </form>
        </div>
    </div>

    <div id="create_order" class='weui-popup-container'>
        <div class="weui-popup-modal">
            <article class="weui_article">
                <h1 id="send_order_status"></h1>
                <section>
                    <section>
                        <p id="send_order_message"></p>
                    </section>
                </section>
                <section>
                    <a href="javascript:;" class="weui_btn weui_btn_plain_primary close-popup">关闭</a>
                </section>
            </article>
        </div>
    </div>

    <div class="weui_tabbar">
        <a href="#tab1" class="weui_tabbar_item weui_bar_item_on" id="home">
            <div class="weui_tabbar_icon">
                <img src="./img/icon_nav_button.png" alt="">
            </div>
            <p class="weui_tabbar_label">新建</p>
        </a>
        <a href="#tab2" class="weui_tabbar_item">
            <div class="weui_tabbar_icon">
                <img src="./img/icon_nav_article.png" alt="" id="order">
            </div>
            <p class="weui_tabbar_label">订单</p>
        </a>
        <a href="#tab3" class="weui_tabbar_item">
            <div class="weui_tabbar_icon">
                <img src="./img/icon_nav_cell.png" alt="">
            </div>
            <p class="weui_tabbar_label">提现</p>
        </a>
    </div>
</div>
<script src="https://cdn.bootcss.com/zepto/1.1.6/zepto.min.js"></script>
<!--<script src="weui/dist/example/zepto.min.js"></script>-->
<!--<script src="weui/dist/example/router.min.js"></script>-->
<!--<script src="weui/dist/example/example.js"></script>-->


<script>
    $.weui = {};
    $.weui.alert = function (options) {
        options = $.extend({title: '警告', text: '警告内容'}, options);
        var $alert = $('.weui_dialog_alert');
        $alert.find('.weui_dialog_title').text(options.title);
        $alert.find('.weui_dialog_bd').text(options.text);
        $alert.on('touchend click', '.weui_btn_dialog', function () {
            $alert.hide();
        });
        $alert.show();
    };

    $(document).ready(function () {
        $.ajax({
            url: 'get_goods.php',                  //the script to call to get data
            data: "",                        //you can insert url argumnets here to pass to api.php
                                             //for example "id=5&parent=6"
            dataType: 'text',                //data format
            success: function (data)          //on recieve of reply
            {
                console.log(data);
                $('#goods_array').html(data);
            }
        });
    });

    $(function () {
        // 允许上传的图片类型
        var allowTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
        // 1024KB，也就是 1MB
        var maxSize = 1024 * 1024;
        // 图片最大宽度
        var maxWidth = 300;
        // 最大上传图片数量
        var maxCount = 6;
        $('.js_file').on('change', function (event) {
            var files = event.target.files;

            // 如果没有选中文件，直接返回
            if (files.length === 0) {
                return;
            }

            for (var i = 0, len = files.length; i < len; i++) {
                var file = files[i];
                var reader = new FileReader();

                // 如果类型不在允许的类型范围内
                if (allowTypes.indexOf(file.type) === -1) {
                    $.weui.alert({text: '该类型不允许上传'});
                    continue;
                }

                if (file.size > maxSize) {
                    $.weui.alert({text: '图片太大，不允许上传'});
                    continue;
                }

                if ($('.weui_uploader_file').length >= maxCount) {
                    $.weui.alert({text: '最多只能上传' + maxCount + '张图片'});
                    return;
                }

                reader.onload = function (e) {
                    var img = new Image();
                    img.onload = function () {
                        // 不要超出最大宽度
                        var w = Math.min(maxWidth, img.width);
                        // 高度按比例计算
                        var h = img.height * (w / img.width);
                        var canvas = document.createElement('canvas');
                        var ctx = canvas.getContext('2d');
                        // 设置 canvas 的宽度和高度
                        canvas.width = w;
                        canvas.height = h;
                        ctx.drawImage(img, 0, 0, w, h);
                        var base64 = canvas.toDataURL('image/png');

                        // 插入到预览区
                        var $preview = $('<li class="weui_uploader_file weui_uploader_status" style="background-image:url(' + base64 + ')"><div class="weui_uploader_status_content">0%</div></li>');
                        $('.weui_uploader_files').append($preview);
                        var num = $('.weui_uploader_file').length;
                        $('.js_counter').text(num + '/' + maxCount);

                        // 然后假装在上传，可以post base64格式，也可以构造blob对象上传，也可以用微信JSSDK上传

                        var progress = 0;

                        function uploading() {
                            $preview.find('.weui_uploader_status_content').text(++progress + '%');
                            if (progress < 100) {
                                setTimeout(uploading, 30);
                            }
                            else {
                                // 如果是失败，塞一个失败图标
                                //$preview.find('.weui_uploader_status_content').html('<i class="weui_icon_warn"></i>');
                                $preview.removeClass('weui_uploader_status').find('.weui_uploader_status_content').remove();
                            }
                        }

                        setTimeout(uploading, 30);
                    };

                    img.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    });

    $("#showTooltips").click(function () {
        var tel = $('#tel').val();
        var code = $('#code').val();
        if (!tel || !/1[3|4|5|7|8]\d{9}/.test(tel)) $.toptip('请输入手机号');
        else if (!code || !/\d{6}/.test(code)) $.toptip('请输入六位手机验证码');
        else $.toptip('提交成功', 'success');
    });
    //# sourceURL=pen.js


    $('#save').on('click', function () {

        var data = $('#goods_form').serialize();
        $.ajax({

            type: 'POST',
            url: 'add_goods.php',
            data: data,
            success: function (data) {
                $.toast("操作成功", function () {
                    console.log('close');
                });
            }
        });
        return false;
    });

    $('#home').on('click', function () {
        $.ajax({
            url: 'get_goods.php',                  //the script to call to get data
            data: "",                        //you can insert url argumnets here to pass to api.php
                                             //for example "id=5&parent=6"
            dataType: 'text',                //data format
            success: function (data)          //on recieve of reply
            {
                console.log(data);
                $('#goods_array').html(data);
            }
        });
    });

    $('#send_order').on('click', function () {
        var data = $('#order_form').serialize();
        var check_flag = data.indexOf("checkbox");


        console.log(data);

        if (check_flag > -1) {

            if (!$('#customer_name').val()) {
                $('#send_order_status').html("订单生成失败!");
                $('#send_order_message').html("请输入顾客名称。");
            } else {
                $.ajax({
                    type: 'POST',
                    url: 'create_order.php',
                    data: data,
                    success: function (data) {
                        console.log(data);

                        $('#send_order_status').html("订单生成成功!");
                        $('#send_order_message').html("请复制该订单链接发给买家:" + data);
                    }
                });
            }
        } else {
            $('#send_order_status').html("订单生成失败!");
            $('#send_order_message').html("订单列表为空,请在首页选择至少一件商品。");
        }
    });

    $(document).on('click', '.good', function () {
//        if( $(this).is(':checked') ) {
        good_deal_stat_div_id = '#good_deal_stat_div_' + this.id.split('_')[1];
        $(good_deal_stat_div_id).toggle();
//        }
    });

    $('#order').on('click', function () {
        $('.gogogobuybuybuy_navbar_content').hide();
        id = $('.gogogobuybuybuy_navbar_item_active')[0].id.split('_')[1];
        order_list_div_id = '#order_list_div_' + id;
        console.log("order_list_div_id:" + order_list_div_id);
        $(order_list_div_id).show();

        $.ajax({
            url: "get_orders.php",
            data: "type=" + id + "&owner=1",
            dataType: "text",
            success: function (data) {
                console.log(data);
                $(order_list_div_id).html(data);
            }
        });
    });

    $('.gogogobuybuybuy_navbar_title').on('click', function () {
        $('.gogogobuybuybuy_navbar_title').removeClass('gogogobuybuybuy_navbar_item_active');
        $('.gogogobuybuybuy_navbar_title').addClass('gogogobuybuybuy_navbar_item_non_active');
        $(this).removeClass('gogogobuybuybuy_navbar_item_non_active');
        $(this).addClass('gogogobuybuybuy_navbar_item_active');

        $('.gogogobuybuybuy_navbar_content').hide();
        id = this.id.split('_')[1];
        order_list_div_id = '#order_list_div_' + id;
        console.log(order_list_div_id);
        $(order_list_div_id).show();

        $.ajax({
            url: "get_orders.php",
            data: "type=" + id + "&owner=1",
            dataType: "text",
            success: function (data) {
                console.log(data);
                $(order_list_div_id).html(data);
            }
        });

    });

    $(document).on('click', '.good_deliver_switch', function () {
        var order_id = this.id.split('_')[0];
        var good_id = this.id.split('_')[1];
        var val = -1;
        var order_good_status_id = "#" + this.id + "_status";

        if ($(this).is(':checked')) {
            val = 2;
            console.log(order_good_status_id);
            $(order_good_status_id).text("已发货");
        } else {
            val = 1;
            console.log(order_good_status_id);
            $(order_good_status_id).text("未发货");
        }
        $.ajax({
            url: "update_order.php",
            data: "type=1&order_id=" + order_id + "&good_id=" + good_id + "&val=" + val,
            dataType: "json",
            success: function(data){
                if(data.is_finished) {
                    console.log("all finished");
                    $.ajax({
                        url: "get_orders.php",
                        data: "type=todeliver&owner=1",
                        dataType: "text",
                        success: function (data) {
                            $('#order_list_div_todeliver').html(data);
                            $.toast("订单完成", function () {
                            });
                        }
                    });
                }else {
                    $.toast("发货状态修改成功", function () {
                    });
                }

            }
    })
        ;
    });

</script>

</body>
</html>