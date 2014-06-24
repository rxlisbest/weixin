<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<!-- saved from url=(0048)http://store.weiapps.cn/index.php -->
<html>
<head>
<meta content="width=device-width,minimum-scale=1.0,maximum-scale=1.0" name="viewport">
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<title>微商城</title>
<link type="text/css" rel="stylesheet" href="__STATIC__/weixin/css/shop.css">
<script charset="utf-8" src="__STATIC__/weixin/js/jquery.js" type="text/javascript"></script>
<script charset="utf-8" src="__STATIC__/weixin/js/ecmall.js" type="text/javascript"></script>
<script charset="utf-8" src="__STATIC__/weixin/js/touchslider.dev.js" type="text/javascript"></script>
<script type="text/javascript">
//<!CDATA[
var SITE_URL = "index.php-app=member&act=login&ret_url=-index.php-app=member.htm"/*tpa=http://store.weiapps.cn/*/;
var REAL_SITE_URL = "index.php-app=member&act=login&ret_url=-index.php-app=member.htm"/*tpa=http://store.weiapps.cn/*/;
var PRICE_FORMAT = '¥%s';

$(function(){
    var span = $("#child_nav");
    span.hover(function(){
        $("#float_layer:not(:animated)").show();
    }, function(){
        $("#float_layer").hide();
    });
});
//]]>
</script>
</head>

<body>
<include file="public:head" />
<style>
.inverse_proportion { float: left; width: 100px; height: 16px; overflow: hidden; background: url(__STATIC__/weixin/images/inverse_proportion.gif) no-repeat -95px center; }
.error {display: block;}
</style>

<script type="text/javascript">
//<!CDATA[
$(function(){
    $('#join').click(function(){
        var qty = 0;
        var error = false;
        var max_per_user = 2;
        $('input[ectype="quantity"]').each(function(){
            if(parseInt($(this).val()) > 0 ){
                qty += parseInt($(this).val());
            }
            if($(this).val() !='' && (parseInt($(this).val()) < 0 || isNaN(parseInt($(this).val()))))
            {
                error = true;
            }
        });
        if(''){
           alert('您需要登陆才能参加团购活动');
           window.location.href = SITE_URL + '/index.php?app=memberbuy&act=login&store_id=9&ret_url=' + encodeURIComponent('index.php?app=groupbuy&id=2');
        }else if(error == true){
           alert('您输入的数量不正确');
        }else if(qty == 0){
           alert('请填写购买数量');
        }else if(max_per_user > 0 && qty > max_per_user){
           alert('该团购商品每人最多购买2件');
        }else{
            $('#info').show();
            $('input[name="link_man"]').focus();
            $('input[ectype="quantity"]').attr('disabled',true);
        }
    });
    $('#close').click(function(){
        $('#info').hide();
        $('input[ectype="quantity"]').attr('disabled',false);
    });
    $('#join_group_form').submit(function(){
        $('input[ectype="quantity"]').attr('disabled',false);
    });

    $('input[name="exit"]').click(function(){
        if(!confirm('您确定要退出该团购活动吗？')){
            return false;
        }
    });

    $('#join_group_form').validate({
        errorPlacement: function(error, element){
            $(element).next('.field_notice').hide();
            $(element).after(error);
        },
        onkeyup : false,
        rules : {
            link_man : {
                required   : true
            },
            tel :{
                checkTel : true
            }
        },
        messages : {
            link_man  : {
                required   : '请正确填写联系人姓名和联系电话'
            },
            tel: {
                checkTel   : '请正确填写联系人姓名和联系电话'
            }
        }
    });
});

//]]>
</script>

<div id="content">			
        <div class="ware_info">
            <div class="ware_pic">
                    <ul></ul>
            </div>
            <div class="ware_pic"></div>
    
            <div style="overflow: hidden; visibility: visible; list-style: none outside none; position: relative;" class="slider" id="slider">
                <ul style="position: relative; overflow: hidden; transition: left 600ms ease 0s; width: 784px; left: -190px;" class="sliderlist" id="sliderlist">
                    <li style="float: left; display: block; width: 596px;"><img src="__STATIC__/weixin/images/goods1.jpg" width="90%"></li>
                    <li style="float: left; display: block; width: 596px;"><img src="__STATIC__/weixin/images/goods1.jpg" width="90%"></li>
                    <li style="float: left; display: block; width: 596px;"><img src="__STATIC__/weixin/images/goods1.jpg" width="90%"></li>
                    <li style="float: left; display: block; width: 596px;"><img src="__STATIC__/weixin/images/goods1.jpg" width="90%"></li>
                </ul>
                 <div id="pagenavi">
                    <a class="" href="javascript:void(0);">0</a>
                    <a class="" href="javascript:void(0);">1</a>
                    <a class="active" href="javascript:void(0);">2</a>
                    <a class="" href="javascript:void(0);">3</a>
                 </div>
           </div>
            <script type="text/javascript">
            var active=0,
                as=document.getElementById('pagenavi').getElementsByTagName('a');
                
            for(var i=0;i<as.length;i++){
                (function(){
                    var j=i;
                    as[i].onclick=function(){
                        t2.slide(j);
                        return false;
                    }
                })();
            }
            var t2=new TouchSlider({id:'sliderlist', speed:600, timeout:6000, before:function(index){
                    as[active].className='';
                    active=index;
                    as[active].className='active';
                }});
            </script>
            <h2 class="ware_title">
                <span class="main">7月团购火热！</span><br>
                <span class="time">活动进行中 18天13小时</span></h2>
            <form method="post" id="join_group_form" action="index.php?app=groupbuy&amp;id=2">
                    <div class="ware_text">
                        <div class="info_particular">
                            <ul>
                                <li>
                                    <p class="title">起始时间: </p>
                                    <p class="con">2013-07-10 至 2013-08-01</p>
                                </li>
                                <li>
                                    <p class="title">成团件数: </p>
                                    <p class="con">
                                        <span class="quantity">20 <span class="ascertain">
                                                                        (还差19)
                                                                        </span></span>
                                        <span class="inverse_proportion"></span>
                                    </p>
                                </li>
                                <li>
                                    <p class="title">每人限购: </p>
                                    <p class="con"> 2</p>
                                </li>
                                <li>
                                    <p class="title">团购说明: </p>
                                    <p class="con"> 暂无</p>
                                </li>
                            </ul>
                        </div>
                        <div class="info_explain">商品名称: <a target="_blank" href="#">T恤短袖女装 韩版卡通修身打底衫蓝色印花</a></div>
                        <div class="info_table">
                            <table>
                                <tbody>
                                    <tr>
                                        <th>规格</th>
                                        <th>原价</th>
                                        <th>团购价</th>
                                        <th>购买数量</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            默认规格<input ectype="spec" name="spec[]" class="text" value="默认规格" type="hidden">
                                            <input ectype="spec_id" name="spec_id[]" class="text" value="6" type="hidden">
                                        </td>
                                        <td>¥39.00</td>
                                        <td>¥15.00</td>
                                        <td><input ectype="quantity" name="quantity[]" class="text" value="1" style="width:50px; height:18px;" type="text">                                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="info_fun">
                            <div class="align">
                            </div>
                            <div class="align">
                                <input id="join" class="big_btn" value="" type="button">
                            </div>
                            <div id="info" class="ware_cen_info_fun" style="display: none;">
                                <div class="ware_center_info_fun">
                                        <span class="dialog_title">参团人信息</span>
                                        <span class="close_link" title="关闭" id="close" onmouseover="this.className = 'close_hover'" onmouseout="this.className = 'close_link'"></span>                            </h1>
                                        <div class="ware_cen_btn">
            
                                            <p class="float_layer_text">请认真填写以下信息，以便店主与您联系</p>
                                            <ul class="fill_in_fun">
                                                <li>
                                                    <p class="title">真实姓名: </p>
                                                    <p><input name="link_man" class="text" type="text"></p>
                                                </li>
                                                <li>
                                                    <p class="title">联系电话: </p>
                                                    <p><input name="tel" class="text" type="text"></p>
                                                </li>
                                                <li class="btn_fun"><input name="join" value="参加团购" type="submit"></li>
                                            </ul>
                                        </div>
                                </div>
                                <div class="ware_cen_bottom_info_fun"></div>
                            </div>
                        </div>
                    </div>
                </form>
             <div class="clear"></div>
        </div>        
        <div class="module_special">
            <h2 class="common_title veins2">
                <div class="ornament1"></div>
                <div class="ornament2"></div>
                <span class="ico1"><span class="ico2">参团记录</span></span>
            </h2>
            <div class="wrap">
                <div class="wrap_child">
                    <ul class="buy_name">
                        <li>o8F58jnemsmPrLCalsQgVEZsbhZQ</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="module_currency">
            <h2 class="common_title veins1">
                <div class="ornament1"></div>
                <div class="ornament2"></div>
                <span class="ico1"><span class="ico2">团购咨询</span></span>
            </h2>
            <div class="wrap">
                <div class="wrap_child">
                    <script type="text/javascript" src="js/jquery.js" charset="utf-8"></script>
					<script type="text/javascript">
                    $(function(){
                        $('#message').validate({
                            errorPlacement: function(error, element){
                                var _message_box = $(element).parent().find('.field_message');
                                _message_box.find('.field_notice').hide();
                                _message_box.parent().append(error);
                            },
                            rules : {
                                content : {
                                    required : true,
                                    byteRange : [0,255,'utf-8']
                                }
                            },
                            messages : {
                                content : {
                                    required : '内容不能为空',
                                    byteRange: '您最多可输入255个字符'
                                }
                            }
                        });
                    })
                    </script>

                    <div class="message">
                          <div class="message_text2 bg1">
                              <span class="light">没有符合条件的记录</span>
                          </div>
                    </div>
					<div class="clear"></div>
                    <div class="fill_in">
                        <form method="post" id="message" action="index.php?app=groupbuy&amp;id=2">
                            <p> <span class="desc">我要咨询: </span><textarea name="content"></textarea><span class="field_message"><span class="field_notice"></span></span></p>
                            <p>
                                <span>电子信箱: </span>
                                <span><input class="text" name="email" value="120968747@qq.com" type="text"></span>
                                <span><label><input name="hide_name" value="hide" type="checkbox"> 匿名发表</label></span>
                                <input value="发布咨询" name="qa" type="submit">
                                <!--<input type="hidden" value="2" name="goods_id" />
                                <input type="hidden" value="ask" name="type" />-->
                             </p>
                        </form>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
</div>

<div class="clear"></div>

<div id="footer">
    <p class="foot_nav">
        <a href="#">商城首页</a> | <a href="#">会员中心</a> | <a href="#">品牌介绍</a>
    </p>
    <div style="height:40px; background:#fff; padding:0; overflow:hidden;">
        <div style="float:left; margin:5px 10px 0 0; display:inline;"><img height="20" src="__STATIC__/weixin/images/logo.png"></div>
        <div style="line-height:40px; height:40px; display:inline-block; margin-left:10px; float:right; color:#aaa; font-size:14px;">微应用技术支持</div>
    </div>
</div>

</body>
</html>