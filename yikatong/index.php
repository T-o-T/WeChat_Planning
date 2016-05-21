<?php 
    session_start();
    $id=session_id();
    $_SESSION['id']=$id;
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Cache-Control" content="no-cache">
	<meta http-equiv="Expires" content="0">
	<title>一卡通查询 | 青春在线</title>
	<link rel="stylesheet" href="../statics/css/weui.min.css">
	<link rel="stylesheet" href="../statics/css/custom.css">
</head>
<body ontouchstart>
	<div class="page">
		<div class="hd">
			<h1 class="youth_page_title">一卡通查询</h1>
			<p class="youth_page_desc">欢迎使用青春在线学生服务</p>
			<!-- <p class="page_desc">
				code by 
				<a href="//gaojiajun.cn" target="_blank">abcdGJJ</a>
			</p> -->
		</div>
		<div class="page_content">
			<div class="weui_cells_title">请先登录</div>
			<form method="post" action="result.php">
				<div class="weui_cells weui_cells_form">
					<div class="weui_cell">
						<div class="weui_cell_hd">
							<label class="weui_label">学号</label>
						</div>
						<div class="weui_cell_bd weui_cell_primary">
							<input class="weui_input" type="number" placeholder="请输入学号" name="xh">
						</div>
					</div>
					<div class="weui_cell">
						<div class="weui_cell_hd">
							<label class="weui_label">密码</label>
						</div>
						<div class="weui_cell_bd weui_cell_primary">
							<input class="weui_input" type="password" placeholder="请输入密码" name="pw">
						</div>
					</div>
					<div class="weui_cell weui_vcode">
						<div class="weui_cell_hd">
							<label class="weui_label">验证码</label>
						</div>
						<div class="weui_cell_bd weui_cell_primary">
							<input class="weui_input" type="number" placeholder="请输入验证码" maxlength="4" name="code">
						</div>
						<div class="weui_cell_ft">
							<?php 
                    			$cookie = dirname(__FILE__) . '/cookie/'.$_SESSION['id'].'.txt'; 
                    			$login_url = "http://ecard.sdut.edu.cn/UserInfo/UserLogin.aspx";
                    			$verify_code_url = "http://ecard.sdut.edu.cn/Other/pic.aspx";
                    			$curl = curl_init();
                    			curl_setopt($curl, CURLOPT_URL, $login_url);
                    			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                    			curl_setopt($curl,CURLOPT_COOKIEJAR,$cookie); //获取COOKIE并存储
                    			$contents = curl_exec($curl);
                    			curl_close($curl);
                    			$curl = curl_init();
                    			curl_setopt($curl, CURLOPT_URL, $verify_code_url);
                    			curl_setopt($curl, CURLOPT_COOKIEFILE, $cookie);
                    			curl_setopt($curl, CURLOPT_HEADER, 0);
                    			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                    			$img = curl_exec($curl);
                    			curl_close($curl);
                    			$fp = fopen("verifyCode.jpg","w");
                    			fwrite($fp,$img);
                    			fclose($fp);
                			?>
                			<img src="verifyCode.jpg" height="30" width="72">
						</div>
					</div>
				</div>
				<p class="weui_cells_tips">密码默认是身份证后六位，最后一位为"X"的用"0"代替</p>
				<div class="weui_btn_area">
					<button type="submit" class="weui_btn weui_btn_primary" name="submit" value="login">登录</a>
				</div>
			</form>
		</div>
	</div>
</body>
</html>