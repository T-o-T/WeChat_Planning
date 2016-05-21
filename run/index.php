<!-- 
	author: abcdGJJ
	自适应屏幕部分做的不是很好，其他部分参照胡方运的代码改写
 -->
<?php   
	function https_request($url, $data = null) //url 请求函数 
	{ 
		$curl = curl_init(); 
		curl_setopt($curl, CURLOPT_URL, $url); 
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE); 
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE); 
		if (!empty($data)){ 
			curl_setopt($curl, CURLOPT_POST, 1); 
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data); 
		} 
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
		$output = curl_exec($curl); 
		curl_close($curl); 
		return $output; 
	}
	//获取code参数前引导用户点击https://open.weixin.qq.com/connect/oauth2/authorize?appid=APPID&redirect_uri=REDIRECT_URI&response_type=code&scope=SCOPE&state=STATE#wechat_redirect这个链接

	$code=$_GET['code'];//取得微信中的code参数 
	$url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=APPID&secret=APPSECRET&code=$code&grant_type=authorization_code"; 
	//APPID APPSECRET微信后台有
	$output = https_request($url);
 	$output = json_decode($output);//以Json的格式输出 
	$array = get_object_vars($output);//转换成数组 
	$openid = $array['openid'];//输出openid 微信用户唯一标示` //未关注也有
	// echo $openid;
	// if(!empty($openid)){
	// 	header("Location: http://www.gaojiajun.cn/wx/check.php?id=$openid"); 
	// }
	$url2="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=APPUD&secret=APPSECRET";
	$output = https_request($url2);
	$output = json_decode($output);//以Json的格式输出 
	$array = get_object_vars($output);//转换成数组 
	$access=$array['access_token'];

	$url3="https://api.weixin.qq.com/cgi-bin/user/info?access_token=$access&openid=$openid&lang=zh_CN";
	$output = https_request($url3);
	$output = json_decode($output);//以Json的格式输出 
	$array = get_object_vars($output);//转换成数组 
	$subscribe=$array['subscribe'];

	if($subscribe==0){
		echo "<script>";
		echo 'alert("你还未关注,点击确定跳转到青春在线公众号主页");';
		echo 'function replace() {window.location=("http://mp.weixin.qq.com/s?__biz=MjM5NjM5NjkwMA==&mid=210685543&idx=1&sn=a347c9838168f4a5c022d7eed339b37b#wechat_redirect");}';
    	echo 'replace();';
		echo "</script>";
	}
	else{
		header("Location: http://www.gaojiajun.cn/run/check.php?id=$openid"); 
	}
?>