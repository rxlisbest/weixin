<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0"/>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title>会员中心 - 查看订单</title>
<link href="/statics/shop/default/css/shop.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/statics/shop/default/js/jquery.js" charset="utf-8"></script>
<script type="text/javascript" src="/statics/shop/default/js/ecmall.js" charset="utf-8"></script>
<script type="text/javascript" src="/statics/shop/default/js/touchslider.dev.js" charset="utf-8"></script>
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
@include('shop/default/public/head')
<div class="content">
    <div class="particular">
        <div class="particular_wrap">
            <dl class="order_detail">
            	<dt class="til_font">订单详情</dt>
                <dt>订单状态</dt>
                <dd>
				@if($order->status==1)
				待付款
				@elseif($order->status==2)
				待发货
				@elseif($order->status==3)
				待收货
				@else
				完成
				@endif
                </dd>
                <dt>订单号</dt>
                <dd>{{$order->orderId}}</dd>
                <dt>下单时间</dt>
                <dd>{{$order->add_time}}</dd>
            </dl>
     
            <div class="ware_line">
            
                <div class="ware">
		@foreach($item_detail as $item)
                <div class="ware_list">
                        <div class="ware_pic"><img src="{:attach(get_thumb($item['img'], '_b'), 'item')}" height="50" width="50"></div>
                        <div class="ware_text">
                            <div class="ware_text1">
                                <a href="#">{{$item["title"]}}</a><br>
                                <span></span>
                            </div>
                            <div class="ware_text2">
                                <span>数量:<strong>{{$item["quantity"]}}</strong></span>
                                <span>价格:<strong>¥{{$item["price"]}}</strong></span>
                            </div>
                        </div>
                </div>
                @endforeach 
                 
                    <div class="transportation">
                    	<!--优惠打折<span>¥0.00</span><br>-->
                    <if condition='$order.freetype eq 0' >卖家包邮 <else />
                    运费:<span>¥{{$order->freeprice}}<strong>(
				@if($order->freetype == 1)
				平邮
				@elseif($order->freetype == 2)
				快递
				@else
				EMS
				@endif
                        )</strong></span>
                    </if>	
                    	<br>
                    	总价:<b>¥{{$order->order_sumPrice}}</b>
                    </div>
                    <if condition='$order.status neq 1' >
                      <ul class="order_detail_list">
                       <li>支付方式:
				@if($order->supportmetho==1)
				支付宝
				@else
				货到付款
				@endif
                        </li>
                     <li>下单时间:{{$order->support_time}}</li>
                    </ul> 
                     </if>
                   <ul class="order_detail_list">
                      <li>配送快递:
				@if($order->userfree == 0)
				无需快递
				@elseif($order->userfree!='' and $order->userfree!=0)
				{{$order->userfree}}
				@else
				-
				@endif
			</li>  
			<li>快递编号:
				@if($order->freecode=='')
				-
				@else
				{{$order->freecode}}
				@endif
			</li>
			<li>发货时间:
				@if($order->fahuo_time=='')
				-
				@else
				{{$order->fahuo_time}}
				@endif
			</li>
                    </ul> 
                     
                </div>
            </div>
			<dl>
				<dt class="til_font">物流信息</dt>
				<dt>收货地址</dt>
				<dd>{{$order->address_name}}, &nbsp;{{$order->mobile}}, {{$order->address}}</dd>
				<dt>配送方式</dt>
				<dd><switch name="order.freetype" >
				@if($order->freetype==1)
				平邮
				@elseif($order->freetype==2)
				快递
				@elseif($order->freetype==3)
				EMS
				@else
				卖家包邮
				@endif
                        	</dd>               
            </dl>
        </div>
        <div class="clear"></div>
        <if condition='$order.status eq 1' >
        <div class="btn_list">
        	<a class="order_cancel" href="{{URL::to($shopName.'/shoporder/cancelorder')}}/{{$order->orderId}}" id="order118_action_cancel"> 取消订单</a>
	        <a class="order_pay" href="{:U('order/pay',array('orderId'=>$order['orderId']))}" id="order118_action_pay">付款</a>
        </div>
        </if>
        <div class="adorn_right2"></div>
        <div class="adorn_right3"></div>
        <div class="adorn_right4"></div>
    </div>
    <div class="clear"></div>
</div>
@include('shop/default/public/footer')
</body>
</html>
