<!DOCTYPE html>
<html>
<head>
@include('shop/default/public/headtop')
<script charset="utf-8" type="text/javascript" src="/statics/shop/default/js/dialog.js" id="dialog_js"></script>
<script charset="utf-8" type="text/javascript" src="/statics/shop/default/js/jquery.ui.js" ></script>
<script charset="utf-8" type="text/javascript" src="/statics/shop/default/js/jquery.validate.js" ></script>
<script charset="utf-8" type="text/javascript" src="/statics/shop/default/js/mlselection.js" ></script>
<link rel="stylesheet" type="text/css" href="/statics/shop/default/css/jquery.ui.css" /></head>

<body>
@include('shop/default/public/head')
<div id="content">
    <div class="wrap">
        <div class="eject_btn" title="新增地址"><a class="enter" href="{{URL::to("shopuser/addaddress")}}">新增地址</a></div> 
        <!-----------
        <ul class="address_list">
            <li class="no_address">
            <span class="noaddress">您没有添加收货地址</span>
            </li>
        </ul>
        ------>
        <ul class="address_list">
	@foreach($address_list as $vo)
            <li>
                <p>{{$vo->consignee}}({{$vo->mobile}})</p>
                <p>{{$vo->sheng}}&nbsp;{{$vo->shi}}&nbsp;{{$vo->qu}}&nbsp;{{$vo->address}}</p>
                <p class="new_line"><br /></p>
                <p class="address_action">
                    <span class="edit"><a href="{{URL::to("shopuser/editaddress")}}/{{$vo->id}}"><i class="edit_icon"></i>编辑</a></span>
                    <span><a href="{{URL::to("shopuser/deladdress")}}/{{$vo->id}}" class="delete float_none"><i class="delete_icon"></i>删除</a></span>
                </p>
            </li>
	@endforeach
        </ul>
        <div class="public table" style="display:none;">
            <table class="table_head_line">
               
                <tr class="line_bold">
                    <th colspan="6"></th>
                </tr>
                <tr class="line tr_color">
                    <th>收货人姓名</th>
                    <th>所在地区</th>
                    <th class="width3">详细地址</th>
                    <th>邮政编码</th>
                    <th class="width5">电话/手机</th>
                    <th>操作</th>
                </tr>
                
                <tr>
                    <td colspan="6" class="member_no_records padding6">您没有添加收货地址</td>
                </tr>
            </table>
        </div>
        <div class="wrap_bottom"></div>
    </div>
</div>
@include('shop/default/public/footer')
</body>
</html>
