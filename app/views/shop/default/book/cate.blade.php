<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<!-- saved from url=(0048)http://store.weiapps.cn/index.php -->
<html>
<head>
@include('shop/default/public/headtop')

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
    <div class="module_special tbr">
        <h2 class="common_title veins2">
            <div class="ornament1"></div>
            <div class="ornament2"></div>
            <span class="ico1">
                <span class="ico2">{$page_seo.title}</span>
            </span>
        </h2>
        <div class="wrap">
            <div class="wrap_child">
                <div class="major">
                    <ul class="list">
                    @foreach($items as $item)
                    <li>
                        <div class="pic">
                            <a href="{{URL::to($shopName.'/shopitem/detail')}}/{{$item->id}}"><img  src="{:attach(get_thumb($item['img'], '_b'), 'item')}"></a>
                        </div>
                        <div class="good_content">
                            <h3>
                              <a  href="{{URL::to($shopName.'/shopitem/detail')}}/{{$item->id}}">{{$item->title}}</a>
                            </h3>
                            <p>¥{{$item->price}}</p>
                        </div>
                        <span class="show_good">
                            <a  href="{{URL::to($shopName.'/shopitem/detail')}}/{{$item->id}}"></a>
                        </span>
                    </li>
                    @endforeach
                </ul>
      <!-- <div class="wall_wrap clearfix">
        <div id="J_waterfall" class="wall_container clearfix" data-uri="__ROOT__/?m=book&a=cate_ajax&cid={$cate_info.id}&p={$p}">
           
        <include file="public:waterfall" />
           
        </div>
        <present name="show_load">
        <div id="J_wall_loading" class="wall_loading tc gray"><span>{:L('loading')}</span></div>
        </present>
        <present name="page_bar">
        <div id="J_wall_page" class="wall_page" <present name="show_page">style="display:block;"</present>>
            <div class="page_bar">{$page_bar}</div>
        </div>
        </present>
      </div>-->
                      
                   
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
