//*****************global
var size_price_pair_count = 0;
var good_pic = "";
var good_selected = 0;
//*****************

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

$('#create_good').on('click', function () {
    window.location.href = "create_good.php";
});

$(function () {
    // 允许上传的图片类型
    var allowTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
    // 1024KB，也就是 1MB
    var maxSize = 1024 * 1024 * 128;
    // 图片最大宽度
    var maxWidth = 300;
    // 最大上传图片数量
    var maxCount = 1;
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

            if ($('.acq_uploader_file').length >= maxCount) {
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
                    // var compressed = LZString.compress(base64);
                    // good_pic = compressed;
                    good_pic = base64;
                    // console.log(base64.length + ":" + compressed.length);
                    //console.log(base64);

                    // 插入到预览区
                    var $preview = $('<li class="acq_uploader_file acq_uploader_status" style="background-image:url(' + base64 + ')"><div class="acq_uploader_status_content">0%</div></li>');
                    $('.acq_uploader_files').append($preview);
                    var num = $('.acq_uploader_file').length;
                    $('.js_counter').text(num + '/' + maxCount);

                    // 然后假装在上传，可以post base64格式，也可以构造blob对象上传，也可以用微信JSSDK上传

                    var progress = 0;

                    function uploading() {
                        $preview.find('.acq_uploader_status_content').text(++progress + '%');
                        if (progress < 100) {
                            setTimeout(uploading, 30);
                        }
                        else {
                            // 如果是失败，塞一个失败图标
                            //$preview.find('.acq_uploader_status_content').html('<i class="acq_icon_warn"></i>');
                            $preview.removeClass('acq_uploader_status').find('.acq_uploader_status_content').remove();
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

$('#save_good').on('click', function () {

    if (!input_validation('create_good')) {
        return;
    }

    var data = $('#good_form').serialize() + "&size_price_pair_count=" + size_price_pair_count + "&good_pic=" + encodeURIComponent(good_pic);
    console.log(data);
    $.ajax({

        type: 'POST',
        url: 'add_goods.php',
        data: data,
        success: function (data) {
            $.toast("操作成功", function () {
                console.log('create good succeeded!');
                // console.log(data);

                window.location.href = "index.php";
            });
        }
    });
    return false;
});

$('#add_size_price').on('click', function () {
    var tmpl = "<li class=\"acq_form_item\">" +
        "<div class=\"acq_sqno\">%d</div>" +
        "<div class=\"acq_info\">" +
        "<div class=\"acq_input\">" +
        "<div class=\"acq_info_prefix\">规格" +
        "</div>" +
        "<input class=\"acq_input_suffix\" name=\"size_%d\"/>" +
        "" +
        "</div>" +
        "</div>" +
        "<div class=\"acq_info\">" +
        "<div class=\"acq_input\">" +
        "<div class=\"acq_info_prefix\">价格" +
        "</div>" +
        "<input class=\"acq_input_suffix\" type=\"number\" name=\"price_%d\"/>" +
        "" +
        "</div>" +
        "</div>" +
        "<div class=\"acq_oprt\">" +
        "<span class=\"glyphicon glyphicon-remove-circle\" aria-hidden=\"true\"></span>" +
        "</div>" +
        "</li>";
    if ($('#price_only').length) {
        size_price_pair_count++;
        $('#price_list').html(tmpl.replace(/%d/g, size_price_pair_count));
    } else {
        size_price_pair_count++;
        $('#price_list').append(tmpl.replace(/%d/g, size_price_pair_count));
    }
});

$(document).on('touchstart', '.glyphicon-remove-circle', function () {
    $(this).parent().parent().remove();
    size_price_pair_count--;

    $('li').each(function (index) {
        $(this).children(':first').html(index);
    })
});

$(document).on('touchstart', '.acq_plus_goodlist', function () {
    var count = $(this).parent().find('input').val();
    ++count;
    $(this).parent().find('input').val(count);
    
    var price = $(this).parent().parent().parent().find("[name='price']").val();
    var total_price_tmp = parseInt($('#total_price').text()) + parseInt(price);
    $('#total_price').text(total_price_tmp);
});

$(document).on('touchstart', '.acq_minus_goodlist', function () {
    var count = $(this).parent().find('input').val();
    if (count > 1) {
        --count;
        var price = $(this).parent().parent().parent().find("[name='price']").val();
        var total_price_tmp = parseInt($('#total_price').text()) - parseInt(price);
        $('#total_price').text(total_price_tmp);
    }
    if (count > 0)
        $(this).parent().find('input').val(count);

});

$(document).ready(function () {
    $('#orders_tab').hide();

    $('#todeliver_tab').hide();
    $('#tochargefee_tab').show();
    $('#finished_tab').hide();

    $.ajax({
        url: 'get_goods.php',                  //the script to call to get data
        data: "",                        //you can insert url argumnets here to pass to api.php
                                         //for example "id=5&parent=6"
        dataType: 'text',                //data format
        success: function (data)          //on recieve of reply
        {
            // console.log(data);
            $('#good_list').html(data);
        }
    });

    // $.ajax({
    //     url: 'get_accessToken.php',
    //     data: "",
    //     dataType: 'text',
    //     success: function (data) {
    //         console.log(data);
    //     }
    // })
});

$(document).on('change', '.styled', function () {
    var id = $(this).attr('id');
    var name = $(this).parent().parent().parent().find(".acq_good_details_title").html();
    // var price = $(this).parent().find('.acq_good_details').find('.acq_good_details_amount_price_detail').find('.acq_info_goodlist').find('.acq_input').find('input').val();
    var size = $(this).parent().parent().parent().find(".acq_good_details_description").html();
    var price = $(this).parent().parent().parent().find("[name='price']").val();
    var amount = $(this).parent().parent().parent().find("[name='amount_" + id + "']").val();
    console.log(name);
    console.log(size);
    console.log(price);
    console.log(amount);

    if (this.checked) {
        ++good_selected;
        if (good_selected == 1) {
            $('#order_summary').removeClass("acq_uncontent");
            $('#order_summary').html(formatSummary(id, name, size, price, amount, $('#customer_postfee').val()));
        } else {
            $('#summary_good_details').append("<div id='summary_" + id + "'><div class='acq_good_details_title acq_summary_title'>" + name + "</div>" +
                "<div class='acq_good_details_description'><p id='summary_size'>" + size + "</p> 数量 x " + "<p id='summary_amount' name='summary_amount_" + id + "'>" + amount + "</p></div></div>");

            var total_price_tmp = parseInt($('#total_price').text()) + amount * price;
            $('#total_price').text(total_price_tmp);
        }

    } else {
        --good_selected;
        if (good_selected == 0) {
            $('#order_summary').html("尚未选择任何商品");
            $('#order_summary').addClass("acq_uncontent");
        } else {
            // $('#summary_good_details > div').each(function(){
            //     // if($(this).find('.acq_summary_title').html()==name &&
            //     //         $(this).find('#summary_size').html()==size &&
            //     //         $(this).find('#summary_amount').html()==amount
            //     // ){
            //     if($(this).attr('id') === "summary_"+id) {
            //         $(this).remove();
            //         var total_price_tmp = parseInt($('#total_price').text()) - amount*price;
            //         $('#total_price').text(total_price_tmp);
            //         //break;
            //     }
            // });

            $('#summary_' + id).remove();
            var total_price_tmp = parseInt($('#total_price').text()) - amount * price;
            $('#total_price').text(total_price_tmp);
        }
    }
});

$('#customer_postfee').change(function () {
    var total_price_tmp = parseInt($('#total_price').text()) + parseInt($(this).val());
    $('#total_price').text(total_price_tmp);
    $('#post_fee').text($(this).val());
});

$('#create_order').click(function () {
    if (!input_validation('create_order')) {
        return;
    }

    var data = $('#brief_info').serialize() + "&" + $('#good_list').serialize();
    console.log(data);
    $.ajax({
        type: 'POST',
        url: 'create_order.php',
        data: data,
        success: function (data) {
            console.log(data);
            $.toast("订单保存成功,订单号:" + data + ",订单链接：http://120.26.78.53/orderpayment.php?order_id=" + data, "success", function () {
            });
        }
    });
});

$('#send_order').click(function () {
    if (!input_validation('send_order')) {
        return;
    }
});

$('#home').click(function () {
    $('#orders_tab').hide();
    $('#home_tab').show();
});

$('#orders').click(function () {
    $('#orders_tab').show();
    $('#home_tab').hide();

    var type = $('.acq_col_sub_cell_active').parent().attr('id');
    $.ajax({
        url: 'get_orders.php',
        data: 'type=' + type + "&owner=1",
        dataType: 'text',
        success: function (data) {
            console.log(data);
            if (type == "title_tochargefee") {
                $('#tochargefee_tab').html(data);
            } else if (type == "title_todeliver") {
                $('#todeliver_tab').html(data);
            } else if (type == "title_finished") {
                $('#finished_tab').html(data);
            }
        }
    });
});

$('#withdraw').click(function () {
});

$('.acq_col_bottom_panel').click(function () {
    $('.acq_col_bottom_panel').removeClass('acq_bottom_panel_active');
    $(this).addClass('acq_bottom_panel_active');
});

$('#title_tochargefee').click(function () {
    $('#todeliver_tab').hide();
    $('#tochargefee_tab').show();
    $('#finished_tab').hide();
});

$('#title_todeliver').click(function () {
    $('#todeliver_tab').show();
    $('#tochargefee_tab').hide();
    $('#finished_tab').hide();
});

$('#title_finished').click(function () {
    $('#todeliver_tab').hide();
    $('#tochargefee_tab').hide();
    $('#finished_tab').show();
});

$('.acq_col_orders').click(function () {
    $('.acq_col_orders').removeClass('acq_col_sub_cell_active');
    $(this).addClass('acq_col_sub_cell_active');
});

function formatSummary(id, name, size, price, amount, post_fee) {
    var total_price = price * amount + parseInt(post_fee);
    var summary = "<div class='acq_summary_border_align'>" +
        "<div class='acq_good_details' id='summary_good_details'>" +
        "<div id='summary_" + id + "'>" +
        "<div class='acq_good_details_title acq_summary_title'>" + name + "</div>" +
        "<div class='acq_good_details_description'><p id='summary_size'>" + size + "</p> 数量 x " + "<p id='summary_amount' name='summary_amount_" + id + "'>" + amount + "</p></div>" +
        "</div>" +
        "</div>" +
        "<div class='acq_good_billing'>" +
        "<p class='acq_good_billing_total'>&yen;<Strong id='total_price' name='total_price'>" + total_price + "</Strong></p><br><p class='acq_good_billing_postfee'>（含邮费<Strong id='post_fee'>" + post_fee + "</Strong>元）</p>" +
        "</div>" +
        "</div>";

    return summary;
}


function input_validation(type) {
    if (type === 'create_good') {
        if (!$('.acq_input_without_border').val()) {
            $.toast("请确认商品信息填写正确", "cancel", function () {
            });
            return false;
        }
    } else if (type === "create_order") {
        if (good_selected == 0) {
            $.toast("请选择商品后再保存", "cancel", function () {
            });
            return false;
        }
        if (!$('#customer_name').val()) {
            $.toast("请填写顾客姓名", "cancel", function () {
            });
            return false;
        }
        if (!$('#customer_postfee').val()) {
            $.toast("请填写邮费,包邮请填0", "cancel", function () {
            });
            return false;
        }

    } else if (type === "send_order") {
        if (good_selected == 0) {
            $.toast("请选择商品后再发送", "cancel", function () {
            });
            return false;
        }
        if (!$('#customer_name').val()) {
            $.toast("请填写顾客姓名", "cancel", function () {
            });
            return false;
        }
        if (!$('#customer_postfee').val()) {
            $.toast("请填写邮费,包邮请填0", "cancel", function () {
            });
            return false;
        }
    }

    return true;
}

