<?php
error_reporting(0);
//载入签名算法库
include ('sign.php');
//当前界面是进行网关参数获取以及发起POST请求
//下面参数均为商户自定义，可自行修改

//请求获取的网页类型，json 返回json数据，text直接跳转html界面支付，如没有特殊需要，建议默认text即可
$content_type = 'text';
//商户ID->到平台首页自行复制粘贴
$account_id = '10097';
//S_KEY->商户KEY，到平台首页自行复制粘贴，该参数无需上传，用来做签名验证和回调验证，请勿泄露
$s_key = '0F86B7DB3631FD';
//订单号码->这个是四方网站发起订单时带的订单信息，一般为用户名，交易号，等字段信息
$out_trade_no = date("YmdHis") . mt_rand(10000,99999);
//支付通道：支付宝（公开版）：alipay_auto、微信（公开版）：wechat_auto、服务版（免登陆/免APP）：service_auto
$type = intval($_POST['type']);
if($type == "1"){
$thoroughfare = 'alipay_auto';
}else if($type == "2"){
  $thoroughfare = 'alipayhongbao_auto';
}else if($type == "3"){
  $thoroughfare = 'yunshanfu_auto';
}else if($type == "4"){
  $thoroughfare = 'lakala_auto';
}else if($type == "5"){
  $thoroughfare = 'bank_auto';
}else if($type == "6"){
  $thoroughfare = 'wechat_auto';
}else if($type == "7"){
  $thoroughfare = 'nxyswx_auto';
}else if($type == "8"){
  $thoroughfare = 'nxysalipay_auto';
}else if($type == "9"){
  $thoroughfare = 'nxysyl_auto';
}else if($type == "10"){
  $thoroughfare = 'shouqianba_auto';
}else if($type == "11"){
  $thoroughfare = 'shouqianba_auto';
}else if($type == "12"){
  $thoroughfare = 'alipaygm_auto';
}else if($type == "13"){
  $thoroughfare = 'wechatdy_auto';
}else if($type == "14"){
  $thoroughfare = 'wechatsj_auto';
}else if($type == "15"){
  $thoroughfare = 'wechatbank_auto';
}else if($type == "16"){
  $thoroughfare = 'pddgm_auto';
}else if($type == "17"){
  $thoroughfare = 'taobaodf_auto';
}else if($type == "18"){
  $thoroughfare = 'paofen_auto';
  $type=1;
}else if($type == "19"){
  $thoroughfare = 'paofen_auto';
   $type=2;
}else if($type == "20"){
  $thoroughfare = 'paofen_auto';
   $type=3;
}



//支付金额
$amount = floatval($_POST['amount']);
//生成签名
$sign = sign($s_key, ['amount'=>$amount,'out_trade_no'=>$out_trade_no]);
//轮训状态，是否开启轮训，状态 1 为关闭   2为开启
$robin = 2;
$use_city = 2;
//微信设备KEY，新增加一条支付通道，会自动生成一个device Key，可在平台的公开版下看见，如果为轮训状态无需附带此参数，如果$robin参数为1的话，就必须附带设备KEY，进行单通道支付
$device_key = '';
//异步通知接口url->用作于接收成功支付后回调请求
$callback_url = 'http://域名/demo/notify.php';
//支付成功后自动跳转url
$success_url = 'http://域名/demo';
//支付失败或者超时后跳转url
$error_url = 'http://域名/demo';
//支付类型->类型参数是服务版使用，公开版无需传参也可以

?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>接口调用</title>
</head>
<body>
<form action="http://www.funfy.cn/gateway/index/checkpoint.do" method="post" id="frmSubmit">
    <input type="hidden" name="account_id" value="<?php echo $account_id;?>" />
	<input type="hidden" name="content_type" value="<?php echo $content_type;?>"/>
	<input type="hidden" name="thoroughfare" value="<?php echo $thoroughfare?>"/>
	<input type="hidden" name="out_trade_no" value="<?php echo $out_trade_no;?>"/>
	<input type="hidden" name="sign" value="<?php echo $sign;?>"/>
	<input type="hidden" name="robin" value="<?php echo $robin;?>" />
  	<input type="hidden" name="use_city" value="<?php echo $use_city;?>" />
	<input type="hidden" name="callback_url" value="<?php echo $callback_url;?>" />
	<input type="hidden" name="success_url" value="<?php echo $success_url;?>" />
	<input type="hidden" name="error_url" value="<?php echo $error_url;?>" />
	<input type="hidden" name="amount" value="<?php echo $amount;?>" />
	<input type="hidden" name="type" value="<?php echo $type;?>" />
	<input type="hidden" name="keyId" value="<?php echo $device_key;?>" />
	<input type="submit" name="btn" value="submit" />
</form>
<script type="text/javascript">
document.getElementById("frmSubmit").submit();
</script>
</body>
</html>