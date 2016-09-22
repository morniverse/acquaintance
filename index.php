<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<?php include("acq_header.html");?>
</head>

<body>
<div class="acq_background">
    <div class="acq_order_control_panel acq_row">
      <div class="acq_col acq_col_border acq_col_control_panel">
        <span class="glyphicon glyphicon-save" aria-hidden="true"></span><br>
        保存订单
      </div>
      <div class="acq_col acq_col_border acq_col_control_panel" id="create_good">
        <span class="glyphicon glyphicon-plus-sign"></span><br>
        添加商品
      </div>
      <div class="acq_col acq_col_border acq_col_control_panel">
        <span class="glyphicon glyphicon-share"></span><br>
        发送订单
      </div> 
    </div>
   
    <div class="acq_border_align acq_section_bar acq_section_bar_position">订单信息</div>
    <div class="acq_section_background">
        <div class="acq_form_brief_info">
        	<div class="acq_form_brief_info_identify">
            	顾客姓名：
            	<input type="text" class="acp_input_without_border">
            </div>
            <div class="acq_form_brief_info_info">
            	邮费&yen;
            	<input type="number" class="acp_input_without_border">
            </div>
        </div>
        <div class="acq_order_summary_tab acq_uncontent">尚未选择任何商品</div>
    </div>
    <div class="acq_section_bar acq_border_align">商品列表</div>
    <div class="acq_section_background acq_good_list_uncontent">
        暂无可选商品，请添加
    </div>
  
      
    <div class="acq_bottom_panel acq_row">
      <div class="acq_col acq_bottom_panel_active">
        <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span><br>
        新建
      </div>
      <div class="acq_col">
        <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span><br>
        订单
      </div>
      <div class="acq_col">
        <span class="glyphicon glyphicon-yen" aria-hidden="true"></span><br>
        提现
      </div>
    </div>
</div>
</body>
</html>