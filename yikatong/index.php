<?php 
    session_start();
    $id=session_id();
    $_SESSION['id']=$id;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>一卡通智能查询系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Cache-Control" content="no-cache">
	<meta http-equiv="Expires" content="0">
    <link rel="stylesheet" type="text/css" href="css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="css/base.css" />
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <div class="card-panel teal darken-1" style="text-align:center">
        	<p class="blue-grey-text text-lighten-5">SDUT一卡通查询系统</p>
        </div>
        <br/>
        <div class="row">
        	<form action="result.php" method="post" class="col s12">
            	<div class="row">
            		<div class="input-field col s12">
            			<i class="icon-user material-icons prefix"></i>
            			<label>学号</label>
                		<input type="text" name="xh" class="validate">
                	</div>
            	</div>
            	<div class="row">
            		<div class="input-field col s12">
            			<i class="icon-key material-icons prefix"></i>
            			<input type="password" name="pw" placeholder="一卡通登陆密码，默认是身份证后六位" class="validate">
            			<label>密码（注：最后一位是“X”用“0”代替）</label>
            		</div>
            	</div>
            	<!-- <div class="row"> -->
            		<!-- <div class="input-field col s8">
						<i class="icon-eye-open material-icons prefix"></i>
            			<label>验证码</label>
            			<input type="text" name="code" maxlength="4" class="validate"/>
            		</div> -->
            		<!-- <div class="input-field col s4" style="text-align: center;"> -->
            			<?php 
                    		$cookie = dirname(__FILE__) . '/cookie/'.$_SESSION['id'].'.txt'; 
                    		$login_url = "http://ecard.sdut.edu.cn/UserInfo/UserLogin.aspx";
                    		$verify_code_url = "http://ecard.sdut.edu.cn/Other/pic.aspx";
                    		$curl = curl_init();
                    		curl_setopt($curl, CURLOPT_URL, $login_url);
                    		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                    		curl_setopt($curl,CURLOPT_REFERER,'http://ecard.sdut.edu.cn/Index_button.aspx');
                    		curl_setopt($curl,CURLOPT_COOKIEJAR,$cookie); //获取COOKIE并存储
                    		$contents = curl_exec($curl);
                    		curl_close($curl);
                    		$curl = curl_init();
                    		curl_setopt($curl, CURLOPT_URL, $verify_code_url);
                    		curl_setopt($curl, CURLOPT_COOKIEFILE, $cookie);
                    		curl_setopt($curl, CURLOPT_HEADER, 0);
                    		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                    		curl_setopt($curl,CURLOPT_REFERER,'http://ecard.sdut.edu.cn/UserInfo/UserLogin.aspx');
                    		$img = curl_exec($curl);
                    		curl_close($curl);
                    		$fp = fopen("verifyCode.jpg","w");
                    		fwrite($fp,$img);
                    		fclose($fp);
                		?>
                		<!-- <img src="verifyCode.jpg" height="30" width="72">
            		</div>
            	</div> -->
            	<div class="row">
            		<div class="col s12">
            		<button class="btn waves-effect waves-light" type="submit" name="action">提交
  					</button>
  					</div>
            	</div>
            	<br>
            	<button type="reset" class="btn btn-warning btn-lg btn-block">重置</button>
        	</form>
    	</div>
    </div>
    <br>
    <footer>
    	<div class="footer-copyright">
            <div class="container" style="text-align: center;">
            	<p>
            		Copyright © 2015
            		<a href="http://youthol.cn">&nbsp;青春在线</a>
            	</p>
            	<p>
            		Code by <a href="http://gaojiajun.cn">abcdGJJ</a>
            	</p>
                <p>
                    bug反馈：18753377688
                </p>
            </div>
          </div>
    </footer>
</body>
<script type="text/javascript" src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript" src="http://cdn.bootcss.com/materialize/0.97.3/js/materialize.min.js"></script>
</html>
