<?php 
	if(isset($_POST['submit'])){
		$openid=$_GET['id'];
		if(!empty($openid)&&!empty($_POST['name'])&&!empty($_POST['phone'])&&!empty($_POST['grade'])){
			$con = mysqli_connect("数据库地址","数据库账户","密码")or die("数据库链接失败");
			mysqli_set_charset ($con,utf8);
			mysqli_select_db($con,"数据库名");
			$sql="insert into run values (null,'$openid','$_POST[name]','$_POST[phone]','$_POST[grade]')";
			$query = mysqli_query($con,$sql); 
			header("Location: http://www.gaojiajun.cn/run/show.php?id=$openid"); 
		}
		else{
			header("Location: http://www.gaojiajun.cn/run/check.php?id=$openid");
		}	
	}
	else{
		$openid=$_GET['id'];
		if(!empty($openid)){
			$con = mysqli_connect("数据库地址","数据库账户","密码")or die("数据库链接失败");
			mysqli_set_charset ($con,utf8);
			mysqli_select_db($con,"数据库名");
			$sql="select id from run where openid = '$openid'";
			$query = mysqli_query($con,$sql); 
			$row = mysqli_fetch_array($query);
			if(!empty($row['id'])){
				header("Location: http://www.gaojiajun.cn/run/show.php?id=$openid");
			}
			else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>春季跑报名 | 青春在线</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/custom.css" rel="stylesheet">
</head>
<body>
	<div class="bg">
		<img src="img/top.jpg" width="100%">
	</div>
	<div class="apply">
		<div class="title">
			<h2>彩跑报名</h2>
		</div>
		<h2 align="center">报名已结束</h2>
		<!-- <form method="post" <?php echo 'action="check.php?id='.$openid.'"' ?>>
			<div class="baoming">
				<h2 align="center">填写报名信息</h2>
				<br>
				<label>姓&nbsp;&nbsp;&nbsp;&nbsp;名：</label>
				<input type="text" name="name" id="name">
				<br>
				<br>
				<label>班&nbsp;&nbsp;&nbsp;&nbsp;级：</label>
				<input type="text" name="grade" id="grade">
				<br>
				<br>
				<label>手机号：</label>
				<input type="text" name="phone" id="phone">
				<br>
				<br>
				<p style="color: #949593;">注意：超出规定时间将不再进行相关运动物品的发放</p>
				<button type="submit" value="submit" name="submit" onclick="check()">提交</button>
				<br>
				<p align="center">助力60周年校庆&nbsp;·&nbsp;校园彩色跑</p>
				<p align="center">报名出错请找程序猿哥哥：18753377688</p>
			</div>
		</form> -->
		<div class="run">
			<h2 class="run1">欢迎加入"助力校庆，彩色跑"彩色跑QQ群：</h2>
			<h2 align="center" class="run2">
				154242977
			</h2>
			<br>
			<h2 align="left" class="run1">
				跑团介绍：
			</h2>
			<p class="run2">
				YouthRun跑团，青春酷跑，山东理工奔跑一族，也希望一样喜欢跑步的你们加入进来。2015年9月，我们加入悦跑校园联盟，并成功举办了山东理工大学首届荧光夜跑，希望能够带领大家健康科学合理的跑步，以后会有更多的活动，欢迎加入我们。
			</p>
			<br>
			<h2 align="left" class="run1">
				温馨提示：
			</h2>
			<p class="run2">
				1、着装舒适。出门时应着宽松运动服或休闲服。
			</p>
			<p class="run2">
				2、控制饮食。运动前两小时不要大量进食，且应以蔬菜居多的清爽食物为主，避免给肠胃太大的负担，运动起来马上难受
			</p>
			<p class="run2">
				3、运动过后渐补水分。由于运动会让人体不断流汗，而且接下来的睡眠更是个失水的过程，所以夜跑之后的补水更加需要。但仍应避免给肠胃造成负担，所以不应一次喝太多，而应渐进式地慢慢摄入，更可以以低糖水果、汤粥类代替进水。
			</p>
			<p class="run2">
				4、小补养分。夜间运动容易让人觉得饿，建议储备一点儿低热量、纤维素高的食物，如水煮蔬菜，煮蛋类，低脂酸奶等，以给肌体补充养分的同时有饱腹感。但一次不可多食，好尽快入睡。
			</p>
			<p class="run2">
				5、自带跑鞋，勿带大包。未满18周岁的小伙伴务必听从指挥，注意人身安全。赛事途中一定不可乱扔物品，保持场地整洁。若跑步过程中，出现身体不适，务必联系工作人员。
			</p>
		</div>
	</div>
	<div>
		<br>
		<br>
		<br>
		<br>
	</div>
	<script type="text/javascript">
		function check(){
			var name = document.getElementById("name").value;
			var phone = document.getElementById("phone").value;
			var grade = document.getElementById("grade").value;
			if(!name||!grade||!phone){
				alert("请输入完整再提交");
			}
			// if(isNaN(phone)){
			// 	alert("号码为数字");
			// }
			// else if(name&&grade&&(!phone)) {
			// 	alert("号码必须为数字");
			// }
		}
	</script>
</body>
</html>


<?php
			}
		}
		else{
			header("Location:https://open.weixin.qq.com/connect/oauth2/authorize?appid=APPID&redirect_uri=http://www.gaojiajun.cn/run/index.php&response_type=code&scope=snsapi_base&state=STATE#wechat_redirect");
		}
	}
?>
