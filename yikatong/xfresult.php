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
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//true不自动输出内容，要echo输出
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
	$url = "http://ecard.sdut.edu.cn/EcardInfo/CONSUMEINFO_SEACH.ASPX?outid=". $_SESSION['xuehao'];
	// echo $url;
	$post = array(
        'ctl00$ContentPlaceHolder1$ConsumeAscx1$ScriptManager1' => 'ctl00$ContentPlaceHolder1$ConsumeAscx1$ScriptManager1|ctl00$ContentPlaceHolder1$ConsumeAscx1$btnSeach',
        '__EVENTTARGET' => '',
        '__EVENTARGUMENT' => '',
        '__VIEWSTATE' => '/wEPDwULLTIwNzYwMjUzNzYPZBYCZg9kFgICAw9kFgQCAQ9kFgJmDxYCHgtfIUl0ZW1Db3VudAIMFhhmD2QWAmYPFQUG6L+U5ZueNC4uL0FQUF9USEVNRVMvREVGQVVMVC9JTUFHRVMvU0VBQ0hCVE5fSU1HL0JUTjRfMC5HSUY0Li4vQVBQX1RIRU1FUy9ERUZBVUxUL0lNQUdFUy9TRUFDSEJUTl9JTUcvQlRONF8wLkdJRjQuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE40XzEuR0lGHi4uL1VTRVJJTkZPL0Nob29zZUNhcmRfSEcuYXNweGQCAQ9kFgJmDxUFDOWfuuacrOS/oeaBrzQuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE4xXzAuR0lGNC4uL0FQUF9USEVNRVMvREVGQVVMVC9JTUFHRVMvU0VBQ0hCVE5fSU1HL0JUTjFfMC5HSUY0Li4vQVBQX1RIRU1FUy9ERUZBVUxUL0lNQUdFUy9TRUFDSEJUTl9JTUcvQlROMV8xLkdJRhkuL1VTRVJCQVNFSU5GT19TRUFDSC5BU1BYZAICD2QWAmYPFQUM5a2Y5qy+5L+h5oGvNS4uL0FQUF9USEVNRVMvREVGQVVMVC9JTUFHRVMvU0VBQ0hCVE5fSU1HL0JUTjEyXzAuR0lGNS4uL0FQUF9USEVNRVMvREVGQVVMVC9JTUFHRVMvU0VBQ0hCVE5fSU1HL0JUTjEyXzAuR0lGNS4uL0FQUF9USEVNRVMvREVGQVVMVC9JTUFHRVMvU0VBQ0hCVE5fSU1HL0JUTjEyXzEuR0lGFi4vRkVUQ0hJTkZPX1NFQUNILkFTUFhkAgMPZBYCZg8VBRLlhbbku5bnp5Hnm67kv6Hmga81Li4vQVBQX1RIRU1FUy9ERUZBVUxUL0lNQUdFUy9TRUFDSEJUTl9JTUcvQlROMTBfMC5HSUY1Li4vQVBQX1RIRU1FUy9ERUZBVUxUL0lNQUdFUy9TRUFDSEJUTl9JTUcvQlROMTBfMC5HSUY1Li4vQVBQX1RIRU1FUy9ERUZBVUxUL0lNQUdFUy9TRUFDSEJUTl9JTUcvQlROMTBfMS5HSUYWLi9PVEhFUklORk9fU0VBQ0guQVNQWGQCBA9kFgJmDxUFDOa2iOi0ueiusOW9lTUuLi9BcHBfVGhlbWVzL0RlZmF1bHQvSW1hZ2VzL1NlYWNoQnRuX0ltZy9idG40MF8wLmdpZjUuLi9BcHBfVGhlbWVzL0RlZmF1bHQvSW1hZ2VzL1NlYWNoQnRuX0ltZy9idG40MF8wLmdpZjUuLi9BcHBfVGhlbWVzL0RlZmF1bHQvSW1hZ2VzL1NlYWNoQnRuX0ltZy9idG40MF8xLmdpZhguL0NPTlNVTUVJTkZPX1NFQUNILkFTUFhkAgUPZBYCZg8VBQzkv67mlLnlr4bnoIE1Li4vQVBQX1RIRU1FUy9ERUZBVUxUL0lNQUdFUy9TRUFDSEJUTl9JTUcvQlROMTRfMC5HSUY1Li4vQVBQX1RIRU1FUy9ERUZBVUxUL0lNQUdFUy9TRUFDSEJUTl9JTUcvQlROMTRfMC5HSUY1Li4vQVBQX1RIRU1FUy9ERUZBVUxUL0lNQUdFUy9TRUFDSEJUTl9JTUcvQlROMTRfMS5HSUYdLi4vVVNFUklORk8vVVNFUlJFU0VUUFdELkFTUFhkAgYPZBYCZg8VBQbov5Tlm540Li4vQVBQX1RIRU1FUy9ERUZBVUxUL0lNQUdFUy9TRUFDSEJUTl9JTUcvQlRONF8wLkdJRjQuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE40XzAuR0lGNC4uL0FQUF9USEVNRVMvREVGQVVMVC9JTUFHRVMvU0VBQ0hCVE5fSU1HL0JUTjRfMS5HSUYSLi4vSU5ERVhfTUFJTi5BU1BYZAIHD2QWAmYPFQUS5Lqk5piT5rGH5oC75L+h5oGvNS4uL0FwcF9UaGVtZXMvRGVmYXVsdC9JbWFnZXMvU2VhY2hCdG5fSW1nL2J0bjI2XzAuZ2lmNS4uL0FwcF9UaGVtZXMvRGVmYXVsdC9JbWFnZXMvU2VhY2hCdG5fSW1nL2J0bjI2XzAuZ2lmNS4uL0FwcF9UaGVtZXMvRGVmYXVsdC9JbWFnZXMvU2VhY2hCdG5fSW1nL2J0bjI2XzEuZ2lmGi4vQ3VzdFN0YXRlSW5mb19TZWFjaC5hc3B4ZAIID2QWAmYPFQUS5Liq5Lq65L+h5oGv57u05oqkNS4uL0FwcF9UaGVtZXMvRGVmYXVsdC9JbWFnZXMvU2VhY2hCdG5fSW1nL2J0bjI4XzAuZ2lmNS4uL0FwcF9UaGVtZXMvRGVmYXVsdC9JbWFnZXMvU2VhY2hCdG5fSW1nL2J0bjI4XzAuZ2lmNS4uL0FwcF9UaGVtZXMvRGVmYXVsdC9JbWFnZXMvU2VhY2hCdG5fSW1nL2J0bjI4XzEuZ2lmFi4vQ3VzdEluZm9NYW5hZ2VyLmFzcHhkAgkPZBYCZg8VBRLlnIjlrZjnrb7nuqbnu7TmiqQ1Li4vQXBwX1RoZW1lcy9EZWZhdWx0L0ltYWdlcy9TZWFjaEJ0bl9JbWcvYnRuMjlfMC5naWY1Li4vQXBwX1RoZW1lcy9EZWZhdWx0L0ltYWdlcy9TZWFjaEJ0bl9JbWcvYnRuMjlfMC5naWY1Li4vQXBwX1RoZW1lcy9EZWZhdWx0L0ltYWdlcy9TZWFjaEJ0bl9JbWcvYnRuMjlfMS5naWYXLi9CYW5rUXlJbmZvX1NlYWNoLmFzcHhkAgoPZBYCZg8VBQznu7zlkIjkv6Hmga80Li4vQVBQX1RIRU1FUy9ERUZBVUxUL0lNQUdFUy9TRUFDSEJUTl9JTUcvQlROMl8wLkdJRjQuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE4yXzAuR0lGNC4uL0FQUF9USEVNRVMvREVGQVVMVC9JTUFHRVMvU0VBQ0hCVE5fSU1HL0JUTjJfMS5HSUYULi9VU0VSU0VBQ0hJTkZPLkFTUFhkAgsPZBYCZg8VBQzoh6rliqnmjILlpLE1Li4vQVBQX1RIRU1FUy9ERUZBVUxUL0lNQUdFUy9TRUFDSEJUTl9JTUcvQlROMTVfMC5HSUY1Li4vQVBQX1RIRU1FUy9ERUZBVUxUL0lNQUdFUy9TRUFDSEJUTl9JTUcvQlROMTVfMC5HSUY1Li4vQVBQX1RIRU1FUy9ERUZBVUxUL0lNQUdFUy9TRUFDSEJUTl9JTUcvQlROMTVfMS5HSUYZLi4vVVNFUklORk8vVVNFUkxPU1MuQVNQWGQCAw9kFgQCAQ8PFgIeEEN1cnJlbnRQb3N0YXRpb24FEua2iOi0ueS/oeaBr+afpeivomQWAgIBDw8WAh4EVGV4dAUS5raI6LS55L+h5oGv5p+l6K+iZGQCAw9kFgQCCQ9kFgJmD2QWBAIBD2QWAgIB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',
         '__EVENTVALIDATION' => '/wEWBAKClaDUDQLQnq+hBALQnuf+CQKTq8frAy+KZd9oBhXzAqLgJQ2m+cVZHITW',
        'ctl00$ContentPlaceHolder1$ConsumeAscx1$sDateTime' => $begin,
        'ctl00$ContentPlaceHolder1$ConsumeAscx1$eDateTime' => $end,
        'ctl00$ContentPlaceHolder1$ConsumeAscx1$AspNetPager1_input'=>1,
        'ctl00$ContentPlaceHolder1$ConsumeAscx1$btnSeach' => ''
    );
	//  $url2="http://ecard.sdut.edu.cn/EcardInfo/UserBaseInfo_Seach.aspx";
 $content=login_post2($url, $cookie, http_build_query($post));
	echo $content;
  preg_match_all('/<img src="\/App_Themes\/Default\/Images\/Comm_Images\/Images\//', $content, $arrwhite);
	// preg_match_all('/<td>([^<>]+)<\/td>/', $content, $arrwhite);
	// preg_match_all('/<font color="#000099">(.*)<\/font>/', $content, $arrblue);
	for($n=0;$n<count($arrwhite[0]);$n++){
		$arrwhite[0][$n]=substr($arrwhite[0][$n],2,0);
	}
	// for($n=0;$n<count($arrblue[0]);$n++){
	// 	$arrblue[0][$n]=substr($arrblue[0][$n],22,-5);
	// }
	// for($i=0;$i<=10;$i++){
	// 	echo $arrwhite[0][$i];
	// }

	var_dump($arrwhite[0]);
	// echo $arrwhite[0][0];
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
                <li><a href="datechoose.php?id=xiaofei">消费信息查询</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="datechoose.php?id=jiaoyi">交易汇总查询</a></li>
                <li><a href="datechoose.php?id=xiaofei">消费信息查询</a></li>
            </ul>
        </div>
    </nav>
    <div class="contianer">
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
        				window.location.href="xfresult.php?begin="+begin+"&end="+end;
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
			<div class="col s12">
				<table class="bordered centered">
        			<thead>
         				<tr>
              				<th>交易科目代码</th>
              				<th>交易科目描述</th>
              				<th>大钱包交易总额</th>
              				<th>大钱包管理费总额</th>
              				<th>补助钱包交易总额</th>
              				<th>补助钱包管理费总额</th>
         				</tr>
        			</thead>
					<tbody>
					<?php
						echo "<tr>";
						if($arrwhite[0][4]!=""){
							for($i=1;$i<=count($arrwhite[0]);$i++){
								echo "<td>".$arrwhite[0][$i-1]."</td>";
								if($i%6==0&&$i!=0){
									echo "</tr><tr>";
								}
							}
							for($n=1;$n<=count($arrblue[0]);$n++){
								echo "<td>".$arrblue[0][$n-1]."</td>";
								// if($n%6==0&&$n!=0){
									echo "</tr><tr>";
								// }
							}
						}
                        else{
                            echo "<script>alert('没有查询到相关数据，可能是因为输入的年份过早或者程序bug  ๑乛v乛๑')</script>";
                        }
						echo "</tr>";
						// echo "<tr>";
						// echo "<td>".$arr[0][0]."</td>";
						// echo "<td></td>";
						// echo "<td></td>";
						// echo "<td></td>";
						// echo "<td></td>";
						// echo "<td></td>";
						// echo "</tr>";
					 ?>
					 </tbody>
      			</table>
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
