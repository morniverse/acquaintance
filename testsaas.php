<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>iPay淘海外</title>
    <!--    <link rel="stylesheet" href="weui/dist/style/weui.css"/>-->

    <link rel="stylesheet" href="./example.css"/>

<!--    <link rel="stylesheet" href="./gogogobuybuybuy.css"/>-->

    <!--    <link rel="stylesheet" href="https://res.wx.qq.com/open/libs/weui/0.4.3/weui.css"/>-->
    <link rel="stylesheet" href="weui/dist/style/weui.min.css"/>

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
<form id="goods_form">
    <div class="weui_cells weui_cells_form">
        <!--            <div class="weui_cells weui_cells_form">-->
        <div class="weui_cells_title">淘海外入口</div>
        <div class="weui_cell">
            <div class="weui_cell_hd"><label class="weui_label">userId</label></div>
            <div class="weui_cell_bd weui_cell_primary">
                <input class="weui_input" name="goods_name" type="tel" placeholder="请输入userId">
            </div>
        </div>
    </div>


    <div class="weui_media_box weui_media_text">
        <h4 class="weui_media_title">入口url</h4>
        <p class="weui_media_desc">
            <a href="#" id="startup_url"></a>
        </p>
    </div>

    <div class="button_sp_area">
        <a href="javascript:;" class="weui_btn weui_btn_primary close-popup" id="save">生成入口url</a>
    </div>
</form>

<!--<script src="https://cdn.bootcss.com/zepto/1.1.6/zepto.min.js"></script>-->


</body>
</html>