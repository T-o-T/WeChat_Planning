<?php
	session_start();
	header("Content-type: text/html; charset=utf-8");
	// include 'function.php';
	// var_dump($_POST["location"]);
	if(isset($_POST['submit']) && $_POST['submit'] == 'login'){
		include 'function.php';
		$xh = $_POST['xh'];
		$pw = $_POST['pw'];
		$code= $_POST['code'];
		if(empty($xh)||empty($pw)||empty($code)){
    		echo "<script type='text/javascript'>alert('请输入完整再次提交');window.location.href = 'index.php'</script>";
		}
		$post=array(
			'__EVENTTARGET'=>'',
	  		'__EVENTARGUMENT'=>'',
	   		'__VIEWSTATE'=>'/wEPDwULLTE5NTcyNTM1NTgPZBYCAgMPZBYCAgMPZBYCAgEPEGQPFgFmFgEFCeeUqOaIt+WQjWRkZOgmSOYeAecEP/pnqbIZMni80ImB',
	   		'__EVENTVALIDATION'=>'/wEWCQKQr6rNDgLi7PPUAQL97PPUAQLyg9m6DQKl1bKzCQKd+7qdDgKY2YWXBgKTgvWHDQLJk9/kDOHaLptVFWVsiGEs1Au296LHelOc',
	   		'rbl_user'=>0,
	   		'txtUserName'=>$xh,
	   		'txtPwd'=>$pw,
	   		'txtCheckCode'=>$code,
	   		'btnUserLogin'=>''
		);
		$cookie = dirname(__FILE__) . '/cookie/'.$_SESSION['id'].'.txt';
		$url="http://ecard.sdut.edu.cn/UserInfo/UserLogin.aspx";
    	$url2="http://ecard.sdut.edu.cn/EcardInfo/UserBaseInfo_Seach.aspx";
    	login_post($url,$cookie,http_build_query($post));
   	 	$content = login_post($url2,$cookie,'');
    	preg_match_all('|value="(.*)"|isU', $content, $arr);
    	$xuehao=$arr[1][2];
    	// var_dump($xuehao);
    	$filename="verifyCode.jpg";
		unlink($filename);
    	if(empty($xuehao)){
			echo '<script type="text/javascript">';
			echo 'alert("哎呀，出错了T_T,请检查学号、密码或验证码是否输入正确");';
			echo 'window.location.href = "index.php";';	
			echo '</script>';
		}
		else{
			$_SESSION['xuehao']=$xuehao;
    		$name=$arr[1][3];
    		$_SESSION['name']=$name;
    		$gender=$arr[1][4];
    		$_SESSION['gender']=$gender;
    		$xueli=$arr[1][6];
    		$_SESSION['xueli']=$xueli;
    		$buzhu=substr($arr[1][7],0,-5);
    		$_SESSION['buzhu']=$buzhu;
    		$yue=substr($arr[1][8],0,-5);
    		$_SESSION['yue']=$yue;
    		header('Location:result2.php');
		}		
	}
	
?>		