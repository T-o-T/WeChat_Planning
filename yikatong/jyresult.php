<?php
session_start();
header("Content-type: text/html; charset=utf-8");
?>
<?php if(!empty($_SESSION['name'])){ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>交易汇总信息查询</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <script type="text/javascript" src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript" src="js/dateRange.js"></script>
    <script type="text/javascript" src="js/monthPicker.js"></script>
    <link rel="stylesheet" type="text/css" href="css/dateRange.css" />
    <link rel="stylesheet" type="text/css" href="css/monthPicker.css" />
    <link rel="stylesheet" type="text/css" href="css/base.css">
</head>
<?php $begin = $_GET['begin'];
	$end = $_GET['end'];
	//	echo $_SESSION['xuehao'];
	//	echo $_SESSION['name'];
	// echo $begin."<br>";
	// echo $end;
	function login_post2($url, $cookie, $post) {
		$ch = curl_init();
		//初始化curl模块
		curl_setopt($ch, CURLOPT_URL, $url);
		//登录提交的地址
		curl_setopt($ch, CURLOPT_HEADER, 0);
		//是否显示头信息  0 否
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		//是否自动显示返回的信息
		curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
		//设置Cookie信息保存在指定的文件中
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		$result = curl_exec($ch);
		//执行cURL
		curl_close($ch);
		//关闭cURL资源，并且释放系统资源
		return $result;
	}

	function get_content($url, $cookie) {
		$con = curl_init();
		curl_setopt($con, CURLOPT_URL, $url);
		curl_setopt($con, CURLOPT_HEADER, 0);
		curl_setopt($con, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($con, CURLOPT_COOKIEFILE, $cookie);
		$rs = curl_exec($con);
		//执行cURL抓取页面内容
		curl_close($con);
		return $rs;
	}

	$cookie = dirname(__FILE__) . '/cookie/' . $_SESSION['id'] . '.txt';
	$url = "http://ecard.sdut.edu.cn/EcardInfo/CustStateInfo_Seach.aspx?outid=". $_SESSION['xuehao'];
	// echo $url;
	$post = array(
        'ctl00$ContentPlaceHolder1$CustStateInfoAscx1$ScriptManager1' => 'ctl00$ContentPlaceHolder1$CustStateInfoAscx1$ScriptManager1|ctl00$ContentPlaceHolder1$CustStateInfoAscx1$btnSeach',
        '__EVENTTARGET' => '',
        '__EVENTARGUMENT' => '',
        '__VIEWSTATE' => '/wEPDwUKLTE5MTY1NTEyOA9kFgJmD2QWAgIDD2QWBAIBD2QWAmYPFgIeC18hSXRlbUNvdW50AgwWGGYPZBYCZg8VBQbov5Tlm540Li4vQVBQX1RIRU1FUy9ERUZBVUxUL0lNQUdFUy9TRUFDSEJUTl9JTUcvQlRONF8wLkdJRjQuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE40XzAuR0lGNC4uL0FQUF9USEVNRVMvREVGQVVMVC9JTUFHRVMvU0VBQ0hCVE5fSU1HL0JUTjRfMS5HSUYeLi4vVVNFUklORk8vQ2hvb3NlQ2FyZF9IRy5hc3B4ZAIBD2QWAmYPFQUM5Z+65pys5L+h5oGvNC4uL0FQUF9USEVNRVMvREVGQVVMVC9JTUFHRVMvU0VBQ0hCVE5fSU1HL0JUTjFfMC5HSUY0Li4vQVBQX1RIRU1FUy9ERUZBVUxUL0lNQUdFUy9TRUFDSEJUTl9JTUcvQlROMV8wLkdJRjQuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE4xXzEuR0lGGS4vVVNFUkJBU0VJTkZPX1NFQUNILkFTUFhkAgIPZBYCZg8VBQzlrZjmrL7kv6Hmga81Li4vQVBQX1RIRU1FUy9ERUZBVUxUL0lNQUdFUy9TRUFDSEJUTl9JTUcvQlROMTJfMC5HSUY1Li4vQVBQX1RIRU1FUy9ERUZBVUxUL0lNQUdFUy9TRUFDSEJUTl9JTUcvQlROMTJfMC5HSUY1Li4vQVBQX1RIRU1FUy9ERUZBVUxUL0lNQUdFUy9TRUFDSEJUTl9JTUcvQlROMTJfMS5HSUYWLi9GRVRDSElORk9fU0VBQ0guQVNQWGQCAw9kFgJmDxUFEuWFtuS7luenkeebruS/oeaBrzUuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE4xMF8wLkdJRjUuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE4xMF8wLkdJRjUuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE4xMF8xLkdJRhYuL09USEVSSU5GT19TRUFDSC5BU1BYZAIED2QWAmYPFQUM5raI6LS56K6w5b2VNS4uL0FwcF9UaGVtZXMvRGVmYXVsdC9JbWFnZXMvU2VhY2hCdG5fSW1nL2J0bjQwXzAuZ2lmNS4uL0FwcF9UaGVtZXMvRGVmYXVsdC9JbWFnZXMvU2VhY2hCdG5fSW1nL2J0bjQwXzAuZ2lmNS4uL0FwcF9UaGVtZXMvRGVmYXVsdC9JbWFnZXMvU2VhY2hCdG5fSW1nL2J0bjQwXzEuZ2lmGC4vQ09OU1VNRUlORk9fU0VBQ0guQVNQWGQCBQ9kFgJmDxUFDOS/ruaUueWvhueggTUuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE4xNF8wLkdJRjUuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE4xNF8wLkdJRjUuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE4xNF8xLkdJRh0uLi9VU0VSSU5GTy9VU0VSUkVTRVRQV0QuQVNQWGQCBg9kFgJmDxUFBui/lOWbnjQuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE40XzAuR0lGNC4uL0FQUF9USEVNRVMvREVGQVVMVC9JTUFHRVMvU0VBQ0hCVE5fSU1HL0JUTjRfMC5HSUY0Li4vQVBQX1RIRU1FUy9ERUZBVUxUL0lNQUdFUy9TRUFDSEJUTl9JTUcvQlRONF8xLkdJRhIuLi9JTkRFWF9NQUlOLkFTUFhkAgcPZBYCZg8VBRLkuqTmmJPmsYfmgLvkv6Hmga81Li4vQXBwX1RoZW1lcy9EZWZhdWx0L0ltYWdlcy9TZWFjaEJ0bl9JbWcvYnRuMjZfMC5naWY1Li4vQXBwX1RoZW1lcy9EZWZhdWx0L0ltYWdlcy9TZWFjaEJ0bl9JbWcvYnRuMjZfMC5naWY1Li4vQXBwX1RoZW1lcy9EZWZhdWx0L0ltYWdlcy9TZWFjaEJ0bl9JbWcvYnRuMjZfMS5naWYaLi9DdXN0U3RhdGVJbmZvX1NlYWNoLmFzcHhkAggPZBYCZg8VBRLkuKrkurrkv6Hmga/nu7TmiqQ1Li4vQXBwX1RoZW1lcy9EZWZhdWx0L0ltYWdlcy9TZWFjaEJ0bl9JbWcvYnRuMjhfMC5naWY1Li4vQXBwX1RoZW1lcy9EZWZhdWx0L0ltYWdlcy9TZWFjaEJ0bl9JbWcvYnRuMjhfMC5naWY1Li4vQXBwX1RoZW1lcy9EZWZhdWx0L0ltYWdlcy9TZWFjaEJ0bl9JbWcvYnRuMjhfMS5naWYWLi9DdXN0SW5mb01hbmFnZXIuYXNweGQCCQ9kFgJmDxUFEuWciOWtmOetvue6pue7tOaKpDUuLi9BcHBfVGhlbWVzL0RlZmF1bHQvSW1hZ2VzL1NlYWNoQnRuX0ltZy9idG4yOV8wLmdpZjUuLi9BcHBfVGhlbWVzL0RlZmF1bHQvSW1hZ2VzL1NlYWNoQnRuX0ltZy9idG4yOV8wLmdpZjUuLi9BcHBfVGhlbWVzL0RlZmF1bHQvSW1hZ2VzL1NlYWNoQnRuX0ltZy9idG4yOV8xLmdpZhcuL0JhbmtReUluZm9fU2VhY2guYXNweGQCCg9kFgJmDxUFDOe7vOWQiOS/oeaBrzQuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE4yXzAuR0lGNC4uL0FQUF9USEVNRVMvREVGQVVMVC9JTUFHRVMvU0VBQ0hCVE5fSU1HL0JUTjJfMC5HSUY0Li4vQVBQX1RIRU1FUy9ERUZBVUxUL0lNQUdFUy9TRUFDSEJUTl9JTUcvQlROMl8xLkdJRhQuL1VTRVJTRUFDSElORk8uQVNQWGQCCw9kFgJmDxUFDOiHquWKqeaMguWksTUuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE4xNV8wLkdJRjUuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE4xNV8wLkdJRjUuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE4xNV8xLkdJRhkuLi9VU0VSSU5GTy9VU0VSTE9TUy5BU1BYZAIDD2QWBAIBDw8WAh4QQ3VycmVudFBvc3RhdGlvbgUS5Lqk5piT5rGH5oC75L+h5oGvZBYCAgEPDxYCHgRUZXh0BRLkuqTmmJPmsYfmgLvkv6Hmga9kZAIDD2QWAgIJD2QWAmYPZBYEAgEPZBYCAgEPPCsADQBkAgMPZBYCAgEPDxYCHg9Jc05lZWRTeXNMb2dvdXQFBWZhbHNlZBYGAgEPDxYCHwJlZGQCAw8PFgIfAmVkZAIFDw8WAh8CBQVmYWxzZWRkGAEFNWN0bDAwJENvbnRlbnRQbGFjZUhvbGRlcjEkQ3VzdFN0YXRlSW5mb0FzY3gxJGdyaWRWaWV3D2dkgdgU9jLscaE4YpQHKdpRz5ZxD3Y=',
        '__EVENTVALIDATION' => '/wEWBAK5r/6CBwLHldyCAwLHlbTjBwKAzISADGFj7ciozLCmqkXDxEdwo36ALdy/',
        'ctl00$ContentPlaceHolder1$CustStateInfoAscx1$sDateTime' => $begin,
        'ctl00$ContentPlaceHolder1$CustStateInfoAscx1$eDateTime' => $end,
        'ctl00$ContentPlaceHolder1$CustStateInfoAscx1$btnSeach' => '');
	//  $url2="http://ecard.sdut.edu.cn/EcardInfo/UserBaseInfo_Seach.aspx";
	$content = login_post2($url, $cookie, http_build_query($post));
	preg_match_all('/<td>([^<>]+)<\/td>/', $content, $arrwhite);
	preg_match_all('/<font color="#000099">([^<>]+)<\/font>/', $content, $arrblue);
	// echo $content;
	for($n=0;$n<count($arrwhite[0]);$n++){
		$arrwhite[0][$n]=substr($arrwhite[0][$n],4,-5);
	}
	for($n=0;$n<count($arrblue[0]);$n++){
		$arrblue[0][$n]=substr($arrblue[0][$n],22,-7);
	}
	// var_dump($arrblue[0]);
	// echo count($arrblue[0]);
	// var_dump($arrwhite[0]);
	// echo "<br>";
	// var_dump($arrblue[0]);
	// echo count($arr[0]);
	// $arr[0][0]=substr($arr[0][0],4,-3);

	// echo $arr[0][0];
	// echo $arr[0][$i];
	// echo $arr[0][2];
?>
<body>
	<nav>
        <div class="nav-wrapper">
           <a href="#!" class="brand-logo">你好，<?php echo $_SESSION['name']; ?><?php if($_SESSION['gender']=="男"){echo "帅哥";}else if($_SESSION['gender']=="女"){echo "美女";} ?></a>
            <a href="#" data-activates="mobile-demo" class="button-collapse">
                <i class="icon-reorder material-icons prefix"></i>
            </a>
            <ul class="right hide-on-med-and-down">
                <li><a href="datechoose.php?id=jiaoyi">交易汇总查询</a></li>
                <!-- <li><a href="datechoose.php?id=xiaofei">消费信息查询</a></li> -->
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="datechoose.php?id=jiaoyi">交易汇总查询</a></li>
                <!-- <li><a href="datechoose.php?id=xiaofei">消费信息查询</a></li> -->
            </ul>
        </div>
    </nav>
    <div class="container">
    	<div class="row">
    		<div class="col s12">
    			<div class="row">
    				<div class="input-field col s12">
    					<p>继续查询：（点击下方选择时间）</p>
    				</div>
    			</div>
    			<!-- 日历 -->
            	<div class="row">
            		<div class="input-field col s12">
    					<div class="ta_date" id="div_date_demo3">
            				<span class="date_title date1" id="date_demo3"></span>
            				<a class="opt_sel" id="input_trigger_demo3" href="#">
                				<i class="i_orderd"></i>
            				</a>
            			</div>
            			<div id="datePicker"></div>
            		</div>
            		<div class="input-field col s12">
            			<div id="dCon_demo3">
            				<p>开始时间：<?php echo $begin;?></p>
            				<p>结束时间：<?php echo $end;?></p>
        				</div>
                	</div>
            	</div>
            	<!-- 日历结束-->
                <div class="row">
                    <div class="input-field col s12">
                        <p style="text-indent:0em;">快速选择：
                            <a href="javascript:;" id="aYesterday">昨天</a>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="javascript:;" id="aToday">今天</a>
                        </p>
                        <p style="text-indent:5.2em;">
                            <a href="javascript:;" id="aRecent7Days">最近七天</a>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="javascript:;" id="aRecent14Days">最近十四天</a>
                        </p>
                        <p style="text-indent:5.2em;">
                            <a href="javascript:;" id="aRecent30Days">最近三十天</a>
                            &nbsp;&nbsp;
                            <a href="javascript:;" id="aRecent90Days">最近九十天</a>
                        </p>
                    </div>
                </div>
            	<div class="row">
            		<div class="col s12">
            			<button class="btn waves-effect waves-light" type="submit" onclick="returnvalue()">提交
  						</button>
  					</div>
            	</div>
        	</div>
        	<script type="text/javascript">
        	var dateRange = new pickerDateRange('date_demo3', {
    			aToday : 'aToday', //今天
				aYesterday : 'aYesterday', //昨天
				aRecent7Days : 'aRecent7Days', //最近7天
				aRecent14Days : 'aRecent14Days',//最近14天
				aRecent30Days : 'aRecent30Days', //最近30天
				aRecent90Days : 'aRecent90Days', //最近90天
            	isTodayValid: true,
            	// startDate : '2015-11-1',
            	//endDate : '2013-04-21',
            	//needCompare : true,
            	//isSingleDay : true,
            	//shortOpr : true,
            	defaultText: ' 至 ',
            	inputTrigger: 'input_trigger_demo3',
            	theme: 'ta',
            	success: function(obj) {
                	$("#dCon_demo3").html('开始时间 : ' + obj.startDate + '<br/>结束时间 : ' + obj.endDate);
            	}
        	});
        	</script>
        	<script type="text/javascript">
        		function returnvalue () {
        			var startDate= document.getElementById('startDate').value;
        			var endDate= document.getElementById('endDate').value;
        			if(startDate&&endDate){
        				var startDatetext=startDate.split('-');
        				var begin=startDatetext.join('');
        				var endDatetext=endDate.split('-');
        				var end=endDatetext.join('');
        				// alert(begin);
        				// alert(end);
        				window.location.href="jyresult.php?begin="+begin+"&end="+end;
        			}
        			else{
        				alert("输入完整再提交");
        			}

        		}
        		// function returnvalue() {
        		// 	var string= document.getElementById('dCon_demo3');
        		// 	var text=string.innerHTML;
        		// 	var text1=text.split('-');
        		// 	var finaltext=text1.join('');
        		// 	// alert(finaltext);
        		// 	var begin=finaltext.substr(7,8);
        		// 	// alert(begin);
        		// 	var end=finaltext.substr(26,8);
        		//
        		// }
        	</script>
		</div>
		<div class="row">
			<div class="container">
				<div class="col s12">
					<table class="bordered centered">
        				<thead>
         					<tr>
              					<th>交易科目代码</th>
              					<th>交易科目描述</th>
              					<th>交易总额</th>
              					<!-- <th>大钱包管理费总额</th>
              					<th>补助钱包交易总额</th>
              					<th>补助钱包管理费总额</th> -->
         					</tr>
        				</thead>
						<tbody>
							<?php
							echo "<tr>";
							if($arrwhite[0][4]!=""){
								for($i=1;$i<=count($arrwhite[0]);$i++){
									echo "<td>".$arrwhite[0][$i-1]."</td>";
									if($i%3==0&&$i!=0){
										echo "</tr><tr>";
										$i=$i+3;
									}
								}
								for($n=1;$n<=count($arrblue[0]);$n++){
								// echo "<td>".$arrblue[0][$n-1]."</td>";
								// // if($n%6==0&&$n!=0){
								// echo "</tr><tr>";
								// }
									echo "<td>".$arrblue[0][$n-1]."</td>";
									if($n%3==0&&$n!=0){
										echo "</tr><tr>";
										$n=$n+3;
									}
								}
							}
            				else{
            					echo "<script>alert('没有查询到相关数据，可能是因为输入的年份过早或者程序bug  ๑乛v乛๑')</script>";
            				}
							echo "</tr>";

					 		?>
					 	</tbody>
      				</table>
				</div>
			</div>
		</div>
	</div>
    <script type="text/javascript" src="http://cdn.bootcss.com/materialize/0.97.3/js/materialize.min.js"></script>

    <script type="text/javascript">$(document).ready(function() {
	$(".button-collapse").sideNav();
})</script>
</body>
</html>
<?php }else{ ?>
 	<script type="text/javascript">alert('这里什么也没有，请检查你的密码或验证码是否输入正确');
	window.location.href = document.referrer;</script>
<?php } ?>
