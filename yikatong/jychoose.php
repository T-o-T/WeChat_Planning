<?php
session_start();
header("Content-type: text/html; charset=utf-8");
if(!empty($_SESSION['name'])){ 
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
	<title>一卡通查询 | 青春在线</title>
	<link rel="stylesheet" href="../statics/css/weui.min.css">
	<link rel="stylesheet" href="../statics/css/dateRange.css" />
    <link rel="stylesheet" href="../statics/css/monthPicker.css" />
    <link rel="stylesheet" href="../statics/css/custom.css">
	<script type="text/javascript" src="../statics/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="../statics/js/dateRange.js"></script>
    <script type="text/javascript" src="../statics/js/monthPicker.js"></script>
</head>
<body ontouchstart>
	<div class="page">
		<div class="hd">
			<h1 class="youth_page_title">交易汇总信息</h1>
			<br>
			<div class="weui_cells_title">自定义时间段（点击下方选择）</div>
			<div class="weui_cells">
				<div class="youth_ecard_rili">
    				<div class="ta_date" id="div_date_demo3">
            			<span class="date_title date1" id="date"></span>
            			<a class="opt_sel" id="input_trigger" href="#">
                			<i class="i_orderd"></i>
            			</a>
            		</div>
            		<div id="datePicker"></div>
            	</div>
            	<br>
				<!-- <div class="weui_cell"> -->
            		<div id="dCon">
            			<p>开始时间：</p>
            			<p>结束时间：</p>
        			</div>
            	<!-- </div> -->
            </div>
            <br>
			<div class="weui_cells_title">快速选择时间段</div>
			<div class="weui_cells  weui_cells_access">
				<a class="weui_cell" href="javascript:;" id="aToday">
					<div class="weui_cell_bd weui_cell_primary">
						<p>今天</p>
					</div>
					<div class="weui_cell_ft"></div>
				</a>
				<a class="weui_cell" href="javascript:;" id="aYesterday">
					<div class="weui_cell_bd weui_cell_primary">
						<p>昨天</p>
					</div>
					<div class="weui_cell_ft"></div>
				</a>
				<a class="weui_cell" href="javascript:;" id="aRecent7Days">
					<div class="weui_cell_bd weui_cell_primary">
						<p>最近七天</p>
					</div>
					<div class="weui_cell_ft"></div>
				</a>
				<a class="weui_cell" href="javascript:;" id="aRecent14Days">
					<div class="weui_cell_bd weui_cell_primary">
						<p>最近十四天</p>
					</div>
					<div class="weui_cell_ft"></div>
				</a>
				<a class="weui_cell" href="javascript:;" id="aRecent30Days">
					<div class="weui_cell_bd weui_cell_primary">
						<p>最近三十天</p>
					</div>
					<div class="weui_cell_ft"></div>
				</a>
				<a class="weui_cell" href="javascript:;" id="aRecent90Days">
					<div class="weui_cell_bd weui_cell_primary">
						<p>最近九十天</p>
					</div>
					<div class="weui_cell_ft"></div>
				</a>
			</div>
        	<div class="weui_btn_area">
				<button type="submit" class="weui_btn weui_btn_primary" onclick="returnvalue()">提交
				</button>
			</div>
		</div>
	</div>
	<script type="text/javascript">
    	var dateRange = new pickerDateRange('date', {
    		aToday : 'aToday', //今天
			aYesterday : 'aYesterday', //昨天
			aRecent7Days : 'aRecent7Days', //最近7天
			aRecent14Days : 'aRecent14Days',//最近14天
			aRecent30Days : 'aRecent30Days', //最近30天
			aRecent90Days : 'aRecent90Days', //最近90天
			aRecent365Days : 'aRecent365Days',
        	isTodayValid: true,
        	// startDate : '2015-11-1',
        	//endDate : '2013-04-21',
        	//needCompare : true,
        	//isSingleDay : true,
        	//shortOpr : true,
        	defaultText: ' 至 ',
        	inputTrigger: 'input_trigger',
        	theme: 'ta',
        	success: function(obj) {
        		$("#dCon").html('开始时间 : ' + obj.startDate + '<br/>结束时间 : ' + obj.endDate);
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
        		window.location.href="jyresult.php?begin="+begin+"&end="+end+"&page=1";
        	}
        	else{
        		alert("输入完整再提交");
        	}

        }
    </script>
</body>
</html>
<?php }else{ ?>
 	<script type="text/javascript">alert('这里什么也没有，请检查你的密码是否输入正确');
	window.location.href = "index.php";</script>
<?php } ?>