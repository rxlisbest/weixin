<!DOCTYPE html>
<html>
<head>
@include('shop/default/public/headtop')
<script charset="utf-8" type="text/javascript" src="/statics/shop/default/js/dialog.js" id="dialog_js"></script>
<link href="/statics/shop/default/css/dialog.css" rel="stylesheet" type="text/css">
<script charset="utf-8" type="text/javascript" src="/statics/shop/default/js/jquery_003.js"></script>
<script charset="utf-8" type="text/javascript" src="/statics/shop/default/js/zh-CN.js"></script>
<script charset="utf-8" type="text/javascript" src="/statics/shop/default/js/jquery_002.js"></script>
<link rel="stylesheet" type="text/css" href="/statics/shop/default/css/jquery.css">
</head>

<body>
@include('shop/default/public/head')
<div class="content">
    <h3 class="membertop">
       <p class="my_name"><a href="#">  {$visitor.username}</a></p>
       <p class="my_address"><a href="{{URL::to($shopName.'/shopuser/address')}}">收货地址管理</a></p>
    </h3>
    <ul class="buyer_stat">
            <li class="btn_1 
            @if($status==1)
            active
            @endif
            "><a href="{{URL::to($shopName."/shopuser/index")}}/1">待付款</a><span>待付款</span></li>        
            <li class="btn_2 
            @if($status==2)
            active
            @endif
            "><a href="{{URL::to($shopName."/shopuser/index")}}/2">待发货</a><span>待发货</span></li>
            <li class="btn_3 
            @if($status==3)
            active
            @endif
             "><a href="{{URL::to($shopName."/shopuser/index")}}/3">待收货</a><span>待收货</span></li>
            <li class="btn_4 
            @if($status==4)
            active
            @endif
            "><a href="{{URL::to($shopName."/shopuser/index")}}/4">已完成</a><span>已完成</span></li>
    </ul>
	<script type="text/javascript">
    $(function(){
    $(".buyer_stat > li a").each(function() {
                href=$(this).attr("href");
                if(window.location.href==href){
                    $(this).parent("li").addClass("active");
                }
            });
    });
    </script>
    <div class="wrap">
        <div class="public">
        
	@if(!empty($item_orders))
            @foreach($item_orders AS $vo)
            <div class="order_form">
                    <p class="num">订单号: {{$vo["orderId"]}}</p>
                    @foreach($vo["items"] AS $item)
                    <div class="con">
                        <p class="ware_pic"><a href="{:U('Item/index',array('id'=>$item['itemId']))}" ><img src="{:attach(get_thumb($item['img'], '_b'), 'item')}" height="80" width="80"></a></p>
                        <p class="ware_text"><a href="{:U('Item/index',array('id'=>$item['itemId']))}">{{$item["title"]}}</a><br><span class="attr"></span></p>
                        <p class="price">价格: <span>¥{{$item["price"]}}</span></p>
                        <p class="amount">数量: <span>{{$item["quantity"]}}</span></p>
                    </div>
                    @endforeach
                    <div class="clear"></div>
                    <div class="foot">
                        <p class="time">添加时间:{{date("Y-m-d",strtotime($vo["add_time"]))}}</p>
                         <div class="handle">
                            <div style="float:left;">
                                订单总价: <b id="order118_order_amount">¥{{$vo["order_sumPrice"]}}&nbsp;&nbsp;</b>
                            </div>   
			@if($vo["status"]==1)
                        	<a href="{:U('order/pay',array('orderId'=>$vo['orderId']))}" id="order118_action_pay" class="btn">付款</a><!--待付款 -->
				<a href="{{URL::to($shopName.'/shoporder/cancelorder')}}/{{$vo['orderId']}}" id="order118_action_cancel"> 取消订单</a>
                         	<a href="{{URL::to($shopName.'/shoporder/checkorder')}}/{{$vo['orderId']}}/{{$status}}" >查看订单</a>
			@elseif($vo["status"]==2)<!--待发货 -->
                         	<a href="{{URL::to($shopName.'/shoporder/checkorder')}}/{{$vo['orderId']}}/{{$status}}" >查看订单</a>
			@elseif($vo["status"]==3)<!-- 待收货 -->
                            	<a href="{{URL::to($shopName.'/shoporder/confirmorder')}}/{{$vo['orderId']}}/{{$status}}" id="order118_action_confirm" >确认收货</a>
                         	<a href="{{URL::to($shopName.'/shoporder/checkorder')}}/{{$vo['orderId']}}/{{$status}}" >查看订单</a>
			@else
                         	<a href="{{URL::to($shopName.'/shoporder/checkorder')}}/{{$vo['orderId']}}/{{$status}}" >查看订单</a>
			@endif
                        </div>
                    </div>
            </div>
            @endforeach
	@else
            <div class="order_form member_no_records">
                <span>没有符合条件的记录</span>
            </div>
       @endif 
            
            <div class="order_form_page">
                <div class="page">
            	</div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="wrap_bottom"></div>
    </div>     
    <div class="wrap_line margin1" style="display:none;">
            <div class="public_index">
                <div class="information_index">
                    <div class="awoke">
                        您目前还没有已生成的订单<br>去<a href="#">商城首页</a>，挑选喜爱的商品，体验购物乐趣吧。
                    </div>
                </div>

            </div>
            <div class="wrap_bottom"></div>
        </div>
    <div class="clear"></div>
</div>
@include('shop/default/public/footer')

</body>
</html>
