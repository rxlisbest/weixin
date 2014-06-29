<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<!-- saved from url=(0048)http://store.weiapps.cn/index.php -->
<html>
<head>
<meta content="width=device-width,minimum-scale=1.0,maximum-scale=1.0" name="viewport">
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<title>{$page_seo.title}--购物车</title>
<link type="text/css" rel="stylesheet" href="/statics/shop/default/css/shop.css">
<script charset="utf-8" src="/statics/shop/default/js/jquery.js" type="text/javascript"></script>
<script charset="utf-8" src="/statics/shop/default/js/ecmall.js" type="text/javascript"></script>
<script charset="utf-8" src="/statics/shop/default/js/touchslider.dev.js" type="text/javascript"></script>
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
@include('shop/default/public/head')
<script type="text/javascript" src="/statics/shop/default/js/cart.js" charset="utf-8"></script>

<div id="content">
    @if(count(Session::get('cart'))==0)
    <div class="null_shopping">
          <div class="cart_pic"></div>
          <h4>您还没有宝贝，赶快去逛逛吧！</h4>
          <p>
              <a class="enter" href="{{URL::to($shopName.'/shopindex/index')}}">马上去逛逛</a>
          </p>
      </div>  
    @else 
    <h3 id="chose_all"><b class="ico">全选商品</b></h3>
    <ul class="cart_list">
    
    @foreach($items as $vo)
        <li id="cart_item_{{$vo['id']}}">
            <p class="goods_info">
                <span class="img"><a href="{{$vo['id']}}" ><img src="" height="80" width="80"></a></span>
                <span class="tit">
                    <a href="{{$vo['id']}}" >{{$vo['name']}}</a><br>
                    <span>价格:</span><span class="price1">¥{{$vo['num']}}</span><br>
                    <span>数量:{{$vo['price']}}</span>
                    <span>
                        <img src="/statics/shop/default/images/subtract.gif" onClick="decrease_quantity({{$vo['id']}});" alt="decrease" style="vertical-align: middle;width=:16px">
                        <input id="input_item_{{$vo['id']}}" value="{{$vo['num']}}" orig="1" changed="{{$vo['num']}}" onKeyUp="change_quantity({{$vo['id']}}, this, '{{$shopName}}');" class="text1 width3" type="text" style="height:20px;">
                        <img src="/statics/shop/default/images/adding.gif" onClick="add_quantity({{$vo['id']}});" alt="increase" style="vertical-align: middle;width=:16px">
                    </span><br>
                    <span>
                        <a class="del" href="javascript:;" onClick="drop_cart_item({{$vo['id']}}, '{{$shopName}}');"> <img src="/statics/shop/default/images/del.png"  style="vertical-align: middle;height:20px;width=:20px"></a>
                    </span>
                </span>
            </p>
            <p class="buy_info">
                <span class="total">
                    <span>小计:</span>
                    <span class="price2" id="item{{$vo['id']}}_subtotal">¥{{sprintf("%01.2f",$vo['num']*$vo['price'])}}</span>
                </span>
            </p>                        
        </li>
    @endforeach
    </ul>
   
    <div class="buy_foot">
        <p class="goods_amount">
            <span>商品总价:</span>
            <strong class="fontsize1" id="cart_amount">¥{{$sumPrice}}</strong>
        </p>
        <p class="jiesuan_btn">
            <a href="{{URL::to($shopName.'/shoporder/jiesuan')}}" class="btn"><span>去结算</span><img src="/statics/shop/default/images/jiesuan.png" width="50%"></a>
        </p>
    </div>
    @endif
</div>
@include('shop/default/public/footer')

</body>
</html>
