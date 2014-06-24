<!DOCTYPE html>
<html>
<head><include file="public:headtop" />
</head>

<body>
<include file="public:head" />
<div id="content">
	<div id="warning"></div>
    <form method="post" action="{:U('Order/closeOrder')}" >
  
        <div class="order_cancel_box">
            <h1>您是否确定要取消以下订单？</h1>
            <p>订单号:<span>{$orderId}</span></p>
            <dl>
                <dt>取消原因:</dt>
                <dd>
                    <div class="li"><input checked="checked" name="cancel_reason" id="d1" value="改选其他商品" type="radio"> <label for="d1">改选其他商品</label></div>
                    <div class="li"><input name="cancel_reason" id="d2" value="改选其他配送方式" type="radio"> <label for="d2">改选其他配送方式</label></div>
                    <div class="li"><input name="cancel_reason" id="d3" value="改选其他卖家" type="radio"> <label for="d3">改选其他卖家</label></div>
                    <div class="li"><input name="cancel_reason" flag="other_reason" id="d4" value="其他原因" type="radio"> <label for="d4">其他原因</label></div>
                </dd>
                <dd id="other_reason" style="display:none">
                    <textarea class="text" id="other_reason_input" style="width:200px;" name="remark"></textarea>
                </dd>
            </dl>
        </div>
        <div class="btn">
            <input id="confirm_button" class="btn1 enter" value="确认" type="submit">
        </div>
          <input type="hidden" name="orderId" value="{$orderId}" >
        </form>
</div>
<include file="public:footer" />
</body>
</html>