
<div id="head">
	<img height="50" src="__PUBLIC__/images/store_logo.jpg">
</div>
<div id="nav">
	<ul class="navlist">
    	<li id="n_0">
    	<span ></span>
        	<ul class="submenu">
		    @foreach($index_cate_list as $vo)
		    <li>
			<a href="{{URL::to('shopbook/cate')}}/{{$vo->id}}" class="none_ico"> {{$vo->name}}</a>
		    </li>
		    @endforeach
            	</ul>
        </li>
        <li class="r active" id="n_1"><a href="{{URL::to('shopindex/index')}}"><span></span></a></li>
        <li class="r" id="n_2"><a href="{{URL::to('shopuser/index')}}"><span></span></a></li>
        <li class="r" id="n_3"><a href="{{URL::to('shopcart/index')}}"><span></span></a><i></i></li>
    </ul>
    <script type="text/javascript">
    	$(".navlist > li#n_0").click(function(){
			$(this).toggleClass("active");
			
		});
		$(".navlist > li.r a").each(function() {
            href=$(this).attr("href");
			whref=window.location.href;
			if(whref.indexOf(href)!='-1'){
				$(this).parent("li").addClass("active");
			}
        });
    </script>
    
</div>
