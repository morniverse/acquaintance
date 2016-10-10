<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <?php include("acq_header.html"); ?>
</head>

<body ontouchstart>
<body ontouchstart>
<div class="acq_background">
    <form id="good_form">
        <div class="acq_section_background">
            <div class="acq_form_item">
                商品名称：
                <input type="text" class="acq_input_without_border" name="good_name">
            </div>
            <div class="acq_form_item">
                <div class="weui_uploader">
                    <div class="weui_uploader_hd weui_cell">
                        <div class="weui_cell_bd weui_cell_primary">添加照片</div>
                        <div class="weui_cell_ft js_counter">0/1</div>
                    </div>
                    <div class="weui_uploader_bd">
                        <ul class="acq_uploader_files">
                            <li class="acq_uploader_input_wrp">
                                <input class="acq_uploader_input js_file" type="file" name="good_pic"
                                       accept="image/jpg,image/jpeg,image/png,image/gif" multiple/>
                            </li>
                        </ul>
                        
<!--                        <div class="acq_uploader_input_wrp">-->
<!--                            <input class="acq_uploader_input js_file" type="file"-->
<!--                                   accept="image/jpg,image/jpeg,image/png,image/gif" multiple=""/>-->
<!--                        </div>-->
                    </div>
                </div>
            </div>
            <ul id="price_list">
                <li class="acq_form_item">
                    商品价格：
                    <input type="text" class="acq_input_without_border" id="price_only" name="price_only"/>
                </li>
            </ul>
        </div>
        <div class="acq_add_size">
            <button type="button" class="btn btn-primary" id="add_size_price">添加不同型号</button>
        </div>
        <div class="acq_last_operation">
            <button type="button" class="btn btn-success" id="save_good">保存</button>
        </div>
    </form>
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

<?php include("acq_footer.html"); ?>
</body>
</html>