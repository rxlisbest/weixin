﻿<div id="footer">
    <p class="foot_nav">
        <a href="{:U('index/index')}">商城首页</a> | <a href="{:U('user/index')}">会员中心</a> | <a href="#">品牌介绍</a>
    </p>
    <div style="height:40px; background:#fff; padding:0; overflow:hidden;">
        <div style="float:left; margin:5px 10px 0 0; display:inline;"><img height="20" src="__STATIC__/weixin/images/logo.png"></div>
        <div style="line-height:40px; height:40px; display:inline-block; margin-left:10px; float:right; color:#aaa; font-size:14px;">杂货铺技术支持</div>
    </div>
</div>

<script>
var PINER = {
    root: "__ROOT__",
    uid: "<?php echo $visitor['id'];?>", 
    async_sendmail: "<?php echo $async_sendmail;?>",
    config: {
        wall_distance: "<?php echo C('pin_wall_distance');?>",
        wall_spage_max: "<?php echo C('pin_wall_spage_max');?>"
    },
    //URL
    url: {}
};
//语言项目
var lang = {};
<volist name=":L('js_lang')" id="val">lang.{$key} = "{$val}";</volist>
</script>
<pin:load type="js" href="__STATIC__/js/jquery/plugins/jquery.tools.min.js,__STATIC__/js/jquery/plugins/jquery.masonry.js,__STATIC__/js/jquery/plugins/formvalidator.js,__STATIC__/js/fileuploader.js,__STATIC__/js/pinphp.js,__STATIC__/js/front.js,__STATIC__/js/dialog.js,__STATIC__/js/wall.js,__STATIC__/js/item.js,__STATIC__/js/user.js,__STATIC__/js/album.js" />