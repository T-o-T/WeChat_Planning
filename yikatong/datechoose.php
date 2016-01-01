<?php 
session_start();
header("Content-type: text/html; charset=utf-8");
?>
<?php if(!empty($_SESSION['name'])){ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title><?php if($_GET['id']=="jiaoyi") {echo "交易汇总信息查询";} if($_GET['id']=="xiaofei") {echo "消费信息查询";} ?></title>
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
    <div class="contianer">
    	<div class="row">
    		<div class="col s12">
    			<div class="row">
    				<div class="input-field col s12">
    					<p>选择时间：（点击下方选择时间）</p>
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
            				<p>开始时间：</p>
            				<p>结束时间：</p>
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
            			<button class="btn waves-effect waves-light" type="submit" onclick="<?php if($_GET['id']=="jiaoyi"){echo "returnvalue()";}if($_GET['id']=="xiaofei"){echo "returnvalue2()";} ?>">提交
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
				// aRecent30Days : 'aRecent30Days', //最近30天
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
                    function returnvalue2 () {
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
    </div>
    <script type="text/javascript" src="http://cdn.bootcss.com/materialize/0.97.3/js/materialize.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function(){
            $(".button-collapse").sideNav();
        })
    </script>
</body>
</html>
<?php }else{ ?>
 	<script type="text/javascript">
        alert('这里什么也没有，请检查你的密码或验证码是否输入正确');
        window.location.href = document.referrer;
    </script>
<?php }?>