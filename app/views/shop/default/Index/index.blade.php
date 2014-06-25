<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<!-- saved from url=(0048)http://store.weiapps.cn/index.php -->
<html>
<head>
<meta charset="utf-8" />
<title>{$page_seo.title}</title>
<meta name="keywords" content="{$page_seo.keywords}" />
<meta name="description" content="{$page_seo.description}" />
<meta content="width=device-width,minimum-scale=1.0,maximum-scale=1.0" name="viewport">
<script src="/statics/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/statics/shop/default/js/index.js"></script>
<link type="text/css" rel="stylesheet" href="/statics/shop/default/css/shop.css">
<script charset="utf-8" src="/statics/shop/default/js/jquery.js" type="text/javascript"></script>
<script charset="utf-8" src="/statics/shop/default/js/ecmall.js" type="text/javascript"></script>
<script charset="utf-8" src="/statics/shop/default/js/touchslider.dev.js" type="text/javascript"></script>
<script charset="utf-8" src="/statics/shop/default/js/goodsinfo.js" type="text/javascript"></script>
<script charset="utf-8" type="text/javascript" src="/statics/shop/default/js/jquery_002.js"></script></head>
<script type="text/javascript">
//<!CDATA[
var SITE_URL = "index.php-app=member&act=login&ret_url=-index.php-app=member.htm";
var REAL_SITE_URL = "index.php-app=member&act=login&ret_url=-index.php-app=member.htm";
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


<div class="banner">
    <div id="slider" class="slider" style="overflow: hidden; visibility: visible; list-style: none outside none; position: relative;">
        <ul id="sliderlist" class="sliderlist" style="position: relative; overflow: hidden; transition: left 600ms ease 0s; width: 1800px; left: -1200px;">
        @foreach($ads as $vo)
            <li style="float: left; display: block; width: 600px;">
                <span>
                   <a href="{{$vo->url}}"> <img title="{{$vo->desc}}" width="100%" src="/data/upload/advert/{{$vo->content}}"></a>
                </span>
            </li>
        @endforeach
      
        </ul>
        <div id="pagenavi">
        @foreach($ads as $k=>$vo)
           <a href="javascript:void(0);">{{$k}}</a>
        @endforeach
        
        </div>
    </div>
</div>
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
   <!-- <div class="module_special">
        <h2 class="common_title veins2">
            <div class="ornament1"></div>
            <div class="ornament2"></div>
          <!--  <span class="ico1">
                <span class="ico2">最新团购</span>
            </span>
        </h2>
        <div class="wrap">
            <div class="wrap_child">
                <div class="group_major">
                    <ul class="list">
                        <li>
                            <div class="pic">
                                <a href="{:U('Item/tuan')}">
                                    <img src="/statics/shop/default/images/goods1.jpg">
                                </a>
                            </div>
                            <div class="good_content">
                                <h3>
                                    <a target="_blank" href="{:U('Item/tuan')}">7月团购火热</a>
                                </h3>
                                <p>
                                    <span> 团购价:&nbsp;</span>¥15.00
                                </p>
                                <div class="time">
                                    剩余:&nbsp;19天15小时
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>-->
    <div class="module_special">
        <h2 class="common_title veins2">
            <div class="ornament1"></div>
            <div class="ornament2"></div>
            <span class="ico1">
                <span class="ico2">推荐商品</span>
            </span>
        </h2>
        <div class="wrap">
            <div class="wrap_child">
                <div class="major">
                    <ul class="list">
                        @foreach($tuijian as $item)
                        <li>
                            <div class="pic">
                                <a href="{:U('Item/index',array('id'=>$item['id']))}"><img  src="{:attach(get_thumb($item['img'], '_b'), 'item')}"></a>
                            </div>
                            <div class="good_content">
                                <h3>
                                    <a  href="{:U('Item/index',array('id'=>$item['id']))}">{{$item->title}}</a>
                                </h3>
                                <p>¥{{$item->price}}</p>
                            </div>
                            <span class="show_good">
                                <a  href="{:U('Item/index',array('id'=>$item['id']))}"></a>
                            </span>
                        </li>
                        @endforeach
                       
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="module_special tbr">
        <h2 class="common_title veins2">
            <div class="ornament1"></div>
            <div class="ornament2"></div>
            <span class="ico1">
                <span class="ico2">最新商品</span>
            </span>
        </h2>
        <div class="wrap">
            <div class="wrap_child">
                <div class="major">
                    <ul class="list">
                    @foreach($news as $item)
                        <li>
                        <div class="pic">
                            <a href="{:U('Item/index',array('id'=>$item['id']))}"><img  src="{{$item->img}}"></a>
                        </div>
                        <div class="good_content">
                            <h3>
                                <a  href="{:U('Item/index',array('id'=>$item['id']))}">{{$item->title}}</a>
                            </h3>
                            <p>¥{{$item->price}}</p>
                        </div>
                        <span class="show_good">
                            <a  href="{:U('Item/index',array('id'=>$item['id']))}"></a>
                        </span>
                        </li>
                    @endforeach
                      
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="clear">
    </div>
</div>
@include('shop/default/public/footer')
</body>
</html>
