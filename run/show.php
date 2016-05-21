<?php 
	$openid=$_GET['id'];
	if(!empty($openid)){
		$con = mysqli_connect("数据库地址","数据库账号","密码")or die("数据库链接失败");
		mysqli_set_charset ($con,utf8);
		mysqli_select_db($con,"数据库名");
		$sql="select id from run where openid='$openid'";
		$query = mysqli_query($con,$sql); 
		$row = mysqli_fetch_array($query);
		$num=$row['id'];
		if(!empty($num)){
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>春季跑报名 | 青春在线</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="//res.wx.qq.com/open/libs/weui/0.3.0/weui.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/custom.css" rel="stylesheet">

</head>
<body>
	<div class="bg">
		<img src="img/top.jpg" width="100%">
	</div>
	<div class="apply height">
		<div class="baoming">
			<h2 align="center" class="success">报名成功！</h2>
			<p align="center" class="bianhao">
				编号：
			</p>
			<div class="show">
				<?php echo $num; ?>
			</div>
			<br>
			<p style="text-indent: 2em;color: #5f605e">注意：<span style="color: red">1.活动现场凭借本页面截图领取跑步相关用品。2.超出规定时间将不再进行相关运动物品的发放。3.欢迎加入"助力校庆，彩色跑"彩色跑QQ群：154242977</span></p>
			<br>
			<p align="center" class="notice">
				温馨提示：
			</p>
			<?php 
				if($num<1001){
					echo '<p class="run2">您可凭编号到现场领取校庆衬衫和校庆丝带一份</p>';
				}
				else if($num<2001){
					echo '<p class="run2">您可凭编号到现场领取校庆丝带一份</p>';
				}
				else{
					echo '<p class="run2">在活动最后还有精彩的抽奖环节，十余份精美校庆文化纪念品和青春在线特制大型萌宠吉祥物等你来拿！</p>';
				}
			?>
			<br>
			<p align="center" class="notice">
				另外：
			</p>
			<p class="run2">
				报名编号尾号为"2"、"4"、"6"、"8"的选手，在活动现场可领取精美校庆手环一份。
			</p>
			<p class="run2" style="color: red">
				报名出错请找程序猿哥哥：18753377688
			</p>
		</div>
	</div>
	<div>
		<br>
		<br>
		<br>
	</div>
</body>
</html>
<?php 
	}
	else{
		header("Location:https://open.weixin.qq.com/connect/oauth2/authorize?appid=APPID&redirect_uri=http://www.gaojiajun.cn/run/index.php&response_type=code&scope=snsapi_base&state=STATE#wechat_redirect");
		// header("Location: http://mp.weixin.qq.com/s?__biz=MjM5NjM5NjkwMA==&mid=210685543&idx=1&sn=a347c9838168f4a5c022d7eed339b37b#wechat_redirect");
	}
}
	else{
		header("Location:https://open.weixin.qq.com/connect/oauth2/authorize?appid=APPID&redirect_uri=http://www.gaojiajun.cn/run/index.php&response_type=code&scope=snsapi_base&state=STATE#wechat_redirect");
	}
?>