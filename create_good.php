<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<?php include("acq_header.html");?>
</head>

<body ontouchstart>
<div class="acq_background">
	<form>
        <div class="acq_section_background">
            <div class="acq_form_item">
                商品名称：
                <input type="text" class="acp_input_without_border">
            </div>
            <div class="acq_form_item">
                添加照片：
                <div class="weui_uploader_bd">
                    <ul class="weui_uploader_files">
                        <!-- 预览图插入到这 --> </ul>
                    	<div class="weui_uploader_input_wrp">
                        	<input class="weui_uploader_input js_file" name="goods_pic" type="file" accept="image/jpg,image/jpeg,image/png,image/gif" multiple>
                        </div>
                </div>
            </div>
            <div class="acq_form_item">
                商品价格：
                <input type="text" class="acp_input_without_border">
            </div>
        </div>
        <div class="acq_add_size">
        	<button type="button" class="btn btn-primary">添加不同型号</button>
        </div>
        <div class="acq_last_operation">
            <button type="button" class="btn btn-success">保存</button>
        </div>
    </form>
</div>
</body>
</html>