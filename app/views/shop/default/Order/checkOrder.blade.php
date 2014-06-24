<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0"/>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title>会员中心 - 查看订单</title>
<link href="__STATIC__/weixin/css/shop.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="__STATIC__/weixin/js/jquery.js" charset="utf-8"></script>
<script type="text/javascript" src="__STATIC__/weixin/js/ecmall.js" charset="utf-8"></script>
<script type="text/javascript" src="__STATIC__/weixin/js/touchslider.dev.js" charset="utf-8"></script>
<script type="text/javascript">
//<!CDATA[
var SITE_URL = "http://store.weiapps.cn";
var REAL_SITE_URL = "http://store.weiapps.cn";
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
<div class="content">
    <div class="particular">
        <div class="particular_wrap">
            <dl class="order_detail">
            	<dt class="til_font">订单详情</dt>
                <dt>订单状态</dt>
                <dd>
                <switch name="order.status" >
                         <case value="1">待付款</case>
                         <case value="2">待发货</case>
                         <case value="3">待收货</case>
                        <default />完成
                 </switch>
                </dd>
                <dt>订单号</dt>
                <dd>{$order.orderId}</dd>
                <dt>下单时间</dt>
                <dd>{$order.add_time|date='Y-m-d H:i:s',###}</dd>
            </dl>
     
            <div class="ware_line">
            
                <div class="ware">
                 <volist name='item_detail' id='item' >
                <div class="ware_list">
                        <div class="ware_pic"><img src="{:attach(get_thumb($item['img'], '_b'), 'item')}" height="50" width="50"></div>
                        <div class="ware_text">
                            <div class="ware_text1">
                                <a href="#">{$item.title}</a><br>
                                <span></span>
                            </div>
                            <div class="ware_text2">
                                <span>数量:<strong>{$item.quantity}</strong></span>
                                <span>价格:<strong>¥{$item.price}</strong></span>
                            </div>
                        </div>
                    </div>
                 
                   </volist>   
                 
                    <div class="transportation">
                    	<!--优惠打折<span>¥0.00</span><br>-->
                    <if condition='$order.freetype eq 0' >卖家包邮 <else />
                    运费:<span>¥{$order.freeprice}<strong>(<switch name="order.freetype" >
                         <case value="1">平邮</case>
                         <case value="2">快递</case>
                        <default />EMS
                        </switch>)</strong></span>
                    </if>	
                    	<br>
                    	总价:<b>¥{$order.order_sumPrice}</b>
                    </div>
                    <if condition='$order.status neq 1' >
                      <ul class="order_detail_list">
                       <li>支付方式:<switch name="order.supportmetho" >
                         <case value="1">支付宝</case>
                        <default />货到付款
                        </switch></li>
                     <li>下单时间:{$order.support_time|date='Y-m-d H:i:s',###}</li>
                    </ul> 
                     </if>
                   <ul class="order_detail_list">
                      <li>配送快递:  <if condition="$order.userfree eq '0'">无需快递<elseif condition="$order.userfree neq '' and $order.userfree neq '0' " />{$order.userfree}<else />-</if></li>
                     <li>快递编号:<if condition="$order.freecode eq ''">-<else />{$order.freecode}</if></li>
                     <li>发货时间:<if condition="$order.fahuo_time eq ''">-<else />{$order.fahuo_time|date='Y-m-d H:i:s',###}</if></li>
                    </ul> 
                     
                </div>
            </div>
			<dl>
				<dt class="til_font">物流信息</dt>
				<dt>收货地址</dt>
				<dd>{$order.address_name}, &nbsp;{$order.mobile}, {$order.address}</dd>
				<dt>配送方式</dt>
				<dd><switch name="order.freetype" >
                         <case value="1">平邮</case>
                         <case value="2">快递</case>
                         <case value="3">EMS</case>
                        <default />卖家包邮
                        </switch></dd>               
            </dl>
        </div>
        <div class="clear"></div>
        <if condition='$order.status eq 1' >
        <div class="btn_list">
        	<a class="order_cancel" href="{:U('order/cancelOrder',array('orderId'=>$order['orderId']))}" id="order118_action_cancel"> 取消订单</a>
	        <a class="order_pay" href="{:U('order/pay',array('orderId'=>$order['orderId']))}" id="order118_action_pay">付款</a>
        </div>
        </if>
        <div class="adorn_right2"></div>
        <div class="adorn_right3"></div>
        <div class="adorn_right4"></div>
    </div>
    <div class="clear"></div>
</div>
<include file="public:footer" />
</body>
</html>