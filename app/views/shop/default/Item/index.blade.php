<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<!-- saved from url=(0048)http://store.weiapps.cn/index.php -->
<html>
<head>
@include('shop/default/public/headtop')
	<script charset="utf-8" src="/statics/shop/default/js/goodsinfo.js" type="text/javascript"></script>
	<script charset="utf-8" src="/statics/shop/default/js/jquery.js" type="text/javascript"></script>
	<script charset="utf-8" src="/statics/shop/default/js/colorbox.js" type="text/javascript"></script>
	<link type="text/css" rel="stylesheet" href="/statics/shop/default/colorbox.css">
</head>



<body>
@include('shop/default/public/head')
<div class="s_bottom"></div>
<script type="text/javascript">
$(function(){
	$("div.module_special .wrap .major ul.list li:last-child").addClass("remove_bottom_line");
});
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
<div id="content">

	<script type="text/javascript">

    function buys()
    {
    	
        var goodId = $("#goodId").val();
        var quantity = $("#quantity").val();
      
        if (quantity == '')
        {
            alert('请输入购买数量');
            return;
        }
        if (parseInt(quantity) < 1)
        {
            alert("购买数量不能小于1");
            return;
        }
        if(isNaN(quantity))
        {
          alert("请输入数字!");
           return;
        }
        add_cart(goodId, quantity);
    }
    
  
  
    function add_cart(goodId,quantity)//商品ID，购买数量
    {
    	
     	var url  = "{{URL::to('shopcart/addcart')}}";
     	$.post(url,{goodId:goodId,quantity:quantity},function(data){
     		
     		if(data.status==1)
     		{
     			
     			$('.dialog_title').html(data.msg);
     			$('.bold_num').text(data.count);
     			$('.bold_mly').html(data.sumPrice);
     			$('.ware_cen').slideDown('slow');
     			setTimeout(slideUp_fn, 5000);
     		}else
     		{
     			$('.dialog_title').html(data.msg);
     			$('.bold_num').text(data.count);
     			$('.bold_mly').html(data.sumPrice);
     			$('.ware_cen').slideDown('slow');
     			setTimeout(slideUp_fn, 5000);
     		}
     	},'json');	
    }
    
    
    /* add cart */
  function add_to_cart(spec_id, quantity)
    {
        var url = SITE_URL + '/index.php?app=cart&amp;act=add';
        $.getJSON(url, {'spec_id':spec_id, 'quantity':quantity}, function(data){
            if (data.done)
            {
                $('.bold_num').text(data.retval.cart.kinds);
                $('.bold_mly').html(price_format(data.retval.cart.amount));
                $('#n_3 i').css({display:"block"});
                $('#n_3 i').text(data.retval.cart.kinds);
                $('.ware_cen').slideDown('slow');
                setTimeout(slideUp_fn, 5000);
            }
            else
            {
                //alert(data.msg);
                $('.ware_center').html('&lt;h1&gt;'+data.msg+'&lt;/h1&gt;&lt;a class="enter" href="http://store.weiapps.cn/index.php?app=cart&amp;store_id=9"&gt;现在去结算&lt;/a&gt;');
                $('.ware_cen').slideDown('slow');
                setTimeout(slideUp_fn, 5000);
            }
        });
    }
    
    </script>
    
    <script>
			$(document).ready(function(){
			
				$(".group1").colorbox({rel:'group1',width:"100%",height:"100%"});
			
			});
		</script>
    <div class="ware_info">
            <div class="ware_pic"></div>
            <div id="slider" class="slider" style="overflow: hidden; visibility: visible; list-style: none outside none; position: relative;">
                <ul id="sliderlist" class="sliderlist" style="position: relative; overflow: hidden; transition: left 600ms ease 0s; width: 784px; left: 202px;">

                    <volist name="img_list" id="img">
                      <li style="float: left; display: block; width: 596px;"><a class="group1" href="{:attach(get_thumb($img['url'], '_b'), 'item')}"><img  width="90%" height="85%" src="{:attach(get_thumb($img['url'], '_b'), 'item')}"></li>
                   </volist>
                </ul>
               <div id="pagenavi">
                   <volist name="img_list" id="img" key='k'>
                       <a href="javascript:void(0);" <if condition='$k eq 1'>class="active"</if>>{$k}</a>
                   </volist>
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
            <input type="hidden" value="{{$item->id}}" id="goodId" >
        <div class="ware_text">
            <div class="rate">
                <h2 class="ware_title">{{$item->title}}</h2>       	
                <span class="letterprice">现价: </span>
                <span ectype="goods_price" class="fontColor3">¥{{$item->price}}</span><br>                       
                <span class="letter1">品牌: </span>{{$item->brand}}<br>
                销售情况: 售出 {{$item->buy_num}} 件<br>
                所在地区: 中国                        
            </div>
            <div class="handle">
                <ul>
                    <li class="handle_title">购买数量: </li>
                    <li>
                        <input type="text" value="1" id="quantity" name="" class="text width1" onafterpaste="this.value=this.value.replace(/\D/g,'')" onkeyup="this.value=this.value.replace(/\D/g,'')" />
                        件（库存<span ectype="goods_stock" class="stock">{{$item->goods_stock}}</span>件）
                    </li>
                </ul>
            </div>
            <ul class="ware_btn">
                <div style="display:none;" class="ware_cen">
                    <div class="ware_center">
                        <h1>
                            <span class="dialog_title"></span>
                            <span onclick="slideUp_fn();" onmouseout="this.className = 'close_link'" onmouseover="this.className = 'close_hover'" title="关闭" class="close_link"></span>
                        </h1>
                        <div class="ware_cen_btn">
                            <p class="ware_text_p">购物车内共有 <span class="bold_num"></span> 种商品 共计 <span class="bold_mly"></span></p>
                            <p class="ware_text_btn">
                                <a href="{:U('shopcart/index')}"><input type="submit" onclick="#" value="查看购物车" name="" class="btn1"></a>
                                <input type="submit" onclick="$('.ware_cen').css({'display':'none'});" value="继续挑选商品" name="" class="btn2">
                            </p>
                        </div>
                    </div>
                    <div class="ware_cen_bottom"></div>
                </div>
                <li onclick="javascript:buys();" title="立刻购买" class="enter">立刻购买</li>
            </ul>
        </div>
    
        <div class="clear"></div>
    </div>
    <a name="module"></a>
    <ul class="user_menu">
        <div class="ornament1"></div>
        <div class="ornament2"></div>
        <li><a href="#" class="active"><span>商品详情</span></a></li>
    </ul>
    <div class="option_box">
        <div class="default">
        {{$item->info}}
        </div>
    </div>
    <div class="clear"></div>
</div>

@include('shop/default/public/footer')

</body>
</html>
