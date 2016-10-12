//*****************global
var size_price_pair_count = 0;
var good_pic = "";
var good_pic_small = "";
var good_selected = 0;
var cur_good_page_size = 0;
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
    $(document).on('change', '.js_file', function (event) {
        // $('.js_file').on('change', function (event) {
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
                console.log('该类型不允许上传');
                $.weui.alert({text: '该类型不允许上传'});
                continue;
            }

            if (file.size > maxSize) {
                console.log('图片太大，不允许上传');
                $.weui.alert({text: '图片太大，不允许上传'});
                continue;
            }

            // if ($('.acq_uploader_file').length >= maxCount) {
            //     $.weui.alert({text: '最多只能上传' + maxCount + '张图片'});
            //     return;
            // }

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
                    var base64_small = canvas.toDataURL('image/jpeg', 0.05);
                    // var compressed = LZString.compress(base64);
                    // good_pic = compressed;
                    good_pic = base64;
                    good_pic_small = base64_small;
                    // console.log("good_pic_small:" + good_pic_small);
                    // console.log(base64.length + ":" + base64_small.length);
                    // console.log(base64.length + ":" + compressed.length);
                    //console.log(base64);

                    // 插入到预览区
                    console.log($('.acq_uploader_files').length);
                    $('.acq_uploader_files').empty();
                    //$('.acq_uploader_status').remove();
                    var $preview = $('<li class="acq_uploader_file acq_uploader_status" style="background-image:url(' + base64 + ')"><div class="acq_uploader_status_content">0%</div><div><input class="acq_uploader_input js_file" type="file" name="good_pic" accept="image/jpg,image/jpeg,image/png,image/gif" multiple/></div></li>');
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
                            //$preview.removeClass('acq_uploader_status').find('.acq_uploader_status_content').hide();
                            // $preview.removeClass('acq_uploader_status').find('.acq_uploader_status_content').text("");
                            // $preview.removeClass('acq_uploader_status').find('.acq_uploader_status_content').fadeOut();
                            //$preview.append($('<div><input class="acq_uploader_input js_file" type="file" name="good_pic" accept="image/jpg,image/jpeg,image/png,image/gif" multiple/></div>'));
                            $preview.find('.acq_uploader_status_content').text("");
                            $preview.removeClass('acq_uploader_status');
                            $preview.addClass('acq_uploader_status_remove');

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

    if (!input_validation('create_good', '')) {
        return;
    }

    var data = $('#good_form').serialize() + "&size_price_pair_count=" + size_price_pair_count + "&good_pic=" + encodeURIComponent(good_pic) + "&good_pic_small=" + encodeURIComponent(good_pic_small);
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
        "<input class=\"acq_input_suffix acq_price\" type=\"number\" name=\"price_%d\"/>" +
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

    if ($(this).parent().parent().parent().parent().parent().find("[type='checkbox']").is(':checked')) {
        var price = $(this).parent().parent().parent().find("[name='price_" + $(this).parent().parent().parent().parent().parent().find("[type='checkbox']").attr('id') + "']").val();
        var total_price_tmp = parseInt($('#total_price').text()) + parseInt(price);
        $('#total_price').text(total_price_tmp);
    }

});

$(document).on('touchstart', '.acq_minus_goodlist', function () {
    var count = $(this).parent().find('input').val();
    if (count > 1) {
        --count;
        if ($(this).parent().parent().parent().parent().parent().find("[type='checkbox']").is(':checked')) {
            var price = $(this).parent().parent().parent().find("[name='price_" + $(this).parent().parent().parent().parent().parent().find("[type='checkbox']").attr('id') + "']").val();
            var total_price_tmp = parseInt($('#total_price').text()) - parseInt(price);
            $('#total_price').text(total_price_tmp);
        }
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
        data: "cur_good_page_size=" + cur_good_page_size,                        //you can insert url argumnets here to pass to api.php
        //for example "id=5&parent=6"
        dataType: 'json',                //data format
        success: function (data)          //on recieve of reply
        {
            console.log(data);
            // if (cur_good_page_size == 0)
            //     $('#good_list').html(data['goods_str']);
            // else {
            //     if (data['page_step'] > 0)
            //         $('#good_list').append(data['goods_str']);
            // }
            //
            // cur_good_page_size += data['page_step'];
            var goods_num = 0;
            $.each(data, function (i, item) {
                var form_input = $('<div class="acq_form_item acq_good_item"></div>');
                var good_checkbox = $('<div class="acq_good_checkbox">');
                var input = $("<input type=\"checkbox\" id='" + data[i].id + "' name='checkbox[]' value='" + data[i].id + "'>");
                input.hide();
                var label = $("<label for='" + data[i].id + "'><div class='acq_circlediv acq_checkbox_small'></div></label>");
                good_checkbox.append(input);
                good_checkbox.append(label);

                form_input.append(good_checkbox);

                var good_pic = $('<div class="acq_good_pic"></div>');
                var img = $("<img src=\"" + data[i].pic_str_small + "\" class=\"acq_goodpic\" alt=\"\"/>");
                good_pic.append(img);
                form_input.append(good_pic);

                var good_details = $('<div class="acq_good_details"></div>');
                var good_details_title = $("<div class=\"acq_good_details_title\">" + data[i].name + "</div>");
                var good_details_description = $("<div class=\"acq_good_details_description\">" + data[i].size + "</div>");
                var good_details_amount_price_detail = $("<div class=\"acq_good_details_amount_price_detail\"></div>");
                var info_goodlist_price = $('<div class="acq_info acq_info_goodlist"></div>');
                var acq_input_price = $('<div class="acq_input"></div>');
                var info_prefix_price = $('<div class="acq_info_prefix acq_info_prefix_goodlist">价格&yen;</div>');
                var input_price = $("<input class=\"acq_input_suffix acq_price\" type=\"number\" name=\"price_" + data[i].id + "\" value=\"" + data[i].price + "\" placeholder='" + data[i].price + "'>");
                input_price.parseNumber({format: "#####.00", locale: "us"});
                input_price.formatNumber({format: "#####.00", locale: "us"});
                acq_input_price.append(info_prefix_price);
                acq_input_price.append(input_price);
                info_goodlist_price.append(acq_input_price);
                good_details_amount_price_detail.append(info_goodlist_price);
                good_details.append(good_details_title);
                good_details.append(good_details_description);
                good_details.append(good_details_amount_price_detail);
                form_input.append(good_details);

                var info_goodlist_amount = $('<div class="acq_info acq_info_goodlist"></div>');
                var acq_input_amount = $('<div class="acq_input"></div>');
                var minus_goodlist = $('<div class="acq_info_prefix acq_plus_minus_goodlist acq_minus_goodlist"></div>');
                minus_goodlist.append($('<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>'));
                var input_amount = $("<input class=\"acq_input_suffix acq_amount\" type=\"number\" name=\"amount_" + data[i].id + "\" value=\"1\">");
                var plus_goodlist = $('<div class="acq_info_prefix acq_plus_minus_goodlist acq_plus_goodlist"></div>');
                plus_goodlist.append($('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>'));
                acq_input_amount.append(minus_goodlist);
                acq_input_amount.append(input_amount);
                acq_input_amount.append(plus_goodlist);
                info_goodlist_amount.append(acq_input_amount);
                good_details_amount_price_detail.append(info_goodlist_amount);


                $('#good_list').append(form_input);
                // console.log(data[i].id);
                goods_num = i;
            });

            if (goods_num > 1) {
                $('#good_list').append($('<div class="acq_border_align acq_section_bar acq_section_bar_position"></div>'));
            }
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


$(document).on('change', '[type=checkbox]', function () {

    var id = $(this).attr('id');
    var name = $(this).parent().parent().parent().find(".acq_good_details_title").html();
    // var price = $(this).parent().find('.acq_good_details').find('.acq_good_details_amount_price_detail').find('.acq_info_goodlist').find('.acq_input').find('input').val();
    var size = $(this).parent().parent().parent().find(".acq_good_details_description").html();
    var price = $(this).parent().parent().parent().find("[name='price_" + id + "']").val();
    var amount = $(this).parent().parent().parent().find("[name='amount_" + id + "']").val();
    console.log(name);
    console.log(size);
    console.log(price);
    console.log(amount);

    if ($(this).is(':checked')) {
        $("label[for='" + $(this).attr('id') + "']").find('.acq_circlediv').addClass('acq_checkbox_checked').append('<span class="glyphicon glyphicon-ok glyphicon-ok-small" aria-hidden="true"></span>');

        ++good_selected;
        if (good_selected == 1) {
            $('#order_summary').removeClass("acq_uncontent");
            $('#order_summary').html(formatSummary(id, name, size, price, amount, $('#customer_postfee').val()));
        } else {
            $('#summary_good_details').append("<div id='summary_" + id + "'><div class='acq_good_details_title acq_summary_title'>" + name + "</div>" +
                "<div class='acq_good_details_description'><p id='summary_size'>" + size + "</p> 数量 x " + "<p style='display:inline;' id='summary_amount' name='summary_amount_" + id + "'>" + amount + "</p></div></div>");

            var total_price_tmp = parseInt($('#total_price').text()) + amount * price;
            $('#total_price').text(total_price_tmp);
        }
    } else {
        $("label[for='" + $(this).attr('id') + "']").find('.acq_circlediv').removeClass('acq_checkbox_checked').empty();

        --good_selected;
        if (good_selected == 0) {
            $('#order_summary').html("尚未选择任何商品");
            $('#order_summary').addClass("acq_uncontent");
        } else {
            $('#summary_' + id).remove();
            var total_price_tmp = parseInt($('#total_price').text()) - amount * price;
            $('#total_price').text(total_price_tmp);
        }
    }
});

$('#customer_postfee').blur(function () {
    if (!input_validation('price_validate', this.value)) {
        $.toast("请确认邮费输入正确", "cancel", function () {
        });
        $(this).val('0.00');
        return;
    }

    var total_price_tmp = parseInt($('#total_price').text()) + parseInt($(this).val());
    $('#total_price').text(total_price_tmp);
    $('#post_fee').text($(this).val());

    if (parseInt($(this).val()) != 0) {
        $(this).parseNumber({format: "#####.00", locale: "us"});
        $(this).formatNumber({format: "#####.00", locale: "us"});
    } else {
        $(this).val("0.00");
    }
});

$(document).on('blur', '.acq_price', function () {
    if (!input_validation('price_validate', this.value)) {
        $.toast("请确认单价输入正确", "cancel", function () {
        });
        var default_price = $(this).attr('placeholder');

        console.log(default_price);
        if (!default_price) {
            $(this).val("0.00");
        } else {
            $(this).val(default_price);
            $(this).parseNumber({format: "#####.00", locale: "us"});
            $(this).formatNumber({format: "#####.00", locale: "us"});
        }
        return;
    }

    if ($(this).parent().parent().parent().parent().parent().find("[type='checkbox']").is(':checked')) {
        var total_price = 0;
        $("input[type='checkbox']").each(function () {
            if (this.checked) {
                var id = $(this).attr('id');
                var price = $(this).parent().parent().parent().find("[name='price_" + id + "']").val();
                var amount = $(this).parent().parent().parent().find("[name='amount_" + id + "']").val();

                total_price += price * amount;
            }
        });

        $('#total_price').text(total_price);
    }

    if (parseInt($(this).val()) != 0) {
        $(this).parseNumber({format: "#####.00", locale: "us"});
        $(this).formatNumber({format: "#####.00", locale: "us"});
    } else {
        $(this).val("0.00");
    }
});

$(document).on('blur', '.acq_amount', function () {
    if (!input_validation('amount_validate', this.value)) {
        $.toast("请确认数量输入正确", "cancel", function () {
        });
        $(this).val('1');
        return;
    }


    if ($(this).parent().parent().parent().parent().parent().find("[type='checkbox']").is(':checked')) {
        var total_price = 0;
        $("input[type='checkbox']").each(function () {
            if (this.checked) {
                var id = $(this).attr('id');
                var price = $(this).parent().parent().parent().find("[name='price_" + id + "']").val();
                var amount = $(this).parent().parent().parent().find("[name='amount_" + id + "']").val();

                total_price += price * amount;
            }
        });

        $('#total_price').text(total_price);
    }

    if (parseInt($(this).val()) != 0) {
        $(this).parseNumber({format: "#####", locale: "us"});
        $(this).formatNumber({format: "#####", locale: "us"});
    } else {
        $(this).val("1");
    }
});

$('#price_only').blur(function () {
    if (!input_validation('price_validate', this.value)) {
        $.toast("请确认单价输入正确", "cancel", function () {
        });
        $(this).val('0.00');
        return;
    }

    if (parseInt($(this).val()) != 0) {
        $(this).parseNumber({format: "#####.00", locale: "us"});
        $(this).formatNumber({format: "#####.00", locale: "us"});
    } else {
        $(this).val("0.00");
    }
});

$('#create_order').click(function () {
    if (!input_validation('create_order', '')) {
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
    if (!input_validation('send_order', '')) {
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
            // console.log(data);
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
        "<div class='acq_good_details_description'><p id='summary_size'>" + size + "</p> 数量 x " + "<p style='display:inline;' id='summary_amount' name='summary_amount_" + id + "'>" + amount + "</p></div>" +
        "</div>" +
        "</div>" +
        "<div class='acq_good_billing'>" +
        "<p class='acq_good_billing_total'>&yen;<Strong id='total_price' name='total_price'>" + total_price + "</Strong></p><br><p class='acq_good_billing_postfee'>（含邮费<Strong id='post_fee'>" + post_fee + "</Strong>元）</p>" +
        "</div>" +
        "</div>";

    return summary;
}


function input_validation(type, data) {

    var amount_regex = new RegExp('^\\d+$');
    var price_regex = new RegExp('^\\d+\.\\d+');

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
    } else if (type === "amount_validate") {
        if (!amount_regex.test(data))
            return false;
    } else if (type === "price_validate") {
        if (!price_regex.test(data) && data != "0" && !amount_regex.test(data))
            return false;
    }

    return true;
}

