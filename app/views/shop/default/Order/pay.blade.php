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
<div id="content">
    <form action="{{URL::to($shopName.'/shoporder/end')}}" method="POST" id="goto_pay">
    <input type="hidden" name="orderid" value="{{$orderid}}" />
       <input type="hidden" name="dingdanhao" value="{{$dingdanhao}}" />
        <div class="step_main">
            <div class="clue_on"><h4>订单提交成功！</h4><p>您的订单已成功生成，选择您想用的支付方式进行支付</p></div>
            <div class="order_information">
                    <p>订单号<span>{{$dingdanhao}}</span></p>订单总价<span>¥{{$order_sumPrice}}</span>
            </div>

            <div class="buy">
                <h3>选择支付方式并付款</h3>
                    <dl class="defray">
                        <dt>在线支付</dt>
                        <dd>
                            <p class="radio"><input checked='checked' id="payment_alipay" name="payment_id" value="1" type="radio"></p>
                            <p class="logo"><label for="payment_alipay"><img src="/statics/shop/default/images/zhi.png" ></label></p>
                            <p class="explain">欢迎使用支付宝</p>
                        </dd>
                    </dl>
                    <dl class="defray">
                        <dt>线下支付</dt>
                        <dd>
                            <p class="radio"><input id="payment_cod" name="payment_id" value="2" type="radio"></p>
                            <p class="logo"><label for="payment_cod"><img  src="/statics/shop/default/images/huodao.png"></label></p>
                            <p class="explain">欢迎使用货到付款</p>
                        </dd>
                    </dl>           
            </div>
            <div class="make_sure">
                <p>
                    <a href="javascript:$('#goto_pay').submit();" class="btn enter">确认支付</a>
                </p>
            </div>
            <!--<div class="remark">
                商品将于5工作日内送达。<a href="#">配送范围请查看</a>。<br />
                您可以在 <a href="#">我的订单</a>  中查看或取消您的订单，由于系统需进行订单预处理，您可能不会立刻查询到刚提交的订单。<br />
                如果您现在不方便支付，可以随后到 <a href="#">我的订单</a>  完成支付，我们会在48小时内为您保留未支付的订单。
            </div>-->
            <div class="clear"></div>
        </div>
    </form>
</div>
@include('shop/default/public/footer')
</body>
</html>
