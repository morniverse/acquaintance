<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>WOQU</title>
    <link rel="stylesheet" href="weui/dist/style/weui.css"/>
    <link rel="stylesheet" href="weui/dist/example/example.css"/>
</head>
<body ontouchstart>
<!--<div class="container" id="container"></div>-->
<!--<script type="text/html" id="tpl_tabbar">-->

<div class="weui_tab">
    <div class="weui_tab_bd">
        <div id="tab1" class="weui_tab_bd_item weui_tab_bd_item_active">
            <h1 class="doc-head">微信</h1>
        </div>
        <div id="tab2" class="weui_tab_bd_item">
            <h1 class="doc-head">通讯录</h1>
        </div>
        <div id="tab3" class="weui_tab_bd_item">
            <h1 class="doc-head">发现</h1>
        </div>
        <div id="tab4" class="weui_tab_bd_item">
            <h1 class="doc-head">我的</h1>
        </div>
    </div>
    <div class="weui_tabbar">
        <a href="#tab1" class="weui_tabbar_item weui_bar_item_on">
            <div class="weui_tabbar_icon">
                <img src="./img/icon_nav_button.png" alt="">
            </div>
            <p class="weui_tabbar_label">微信</p>
        </a>
        <a href="#tab2" class="weui_tabbar_item">
            <div class="weui_tabbar_icon">
                <img src="./img/icon_nav_msg.png" alt="">
            </div>
            <p class="weui_tabbar_label">通讯录</p>
        </a>
        <a href="#tab3" class="weui_tabbar_item">
            <div class="weui_tabbar_icon">
                <img src="./img/icon_nav_article.png" alt="">
            </div>
            <p class="weui_tabbar_label">发现</p>
        </a>
        <a href="#tab4" class="weui_tabbar_item">
            <div class="weui_tabbar_icon">
                <img src="./img/icon_nav_cell.png" alt="">
            </div>
            <p class="weui_tabbar_label">我</p>
        </a>
    </div>
</div>
<script src="weui/dist/example/zepto.min.js"></script>
<script src="weui/dist/example/router.min.js"></script>
<script src="weui/dist/example/example.js"></script>

<script>
    $(function() {

        //var i=0;
        $(".weui_tabbar a").bind("click", function(){

            //css操作
            //alert(i++);
            //操作导航栏
            $(".weui_bar_item_on").removeClass('weui_bar_item_on');
            //console.log($(this).find("a"));
            $(this).addClass("weui_bar_item_on");

            //操作内容切换
            $(".weui_tab_bd .weui_tab_bd_item_active").removeClass('weui_tab_bd_item_active');
            var data_toggle =jQuery(this).attr("href");
            $(data_toggle).addClass("weui_tab_bd_item_active");
            // $(this).addClass("weui_tab_bd_item_active");

        });
    });

</script>

</body>
</html>