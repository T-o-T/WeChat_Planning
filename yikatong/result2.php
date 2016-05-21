<?php  
	session_start();
	header("Content-type: text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
	<title>一卡通查询 | 青春在线</title>
	<link rel="stylesheet" href="../statics/css/weui.min.css">
	<link rel="stylesheet" href="../statics/css/custom.css">
</head>
<body ontouchstart>
<div class="page">
	<div class="hd">
		<h1 class="youth_page_title">你好，<?php echo $_SESSION['name']; ?></h1>
	</div>
	<div class="page_content">
		<div class="weui_cells_title">详情</div>
		<div class="weui_cells">
			<div class="weui_cell">
				<div class="weui_cell_bd weui_cell_primary">
					<p>余额</p>
				</div>
				<div class="weui_cell_ft"><?php echo $_SESSION['yue']; ?>元</div>
			</div>
			<div class="weui_cell">
				<div class="weui_cell_bd weui_cell_primary">
					<p>补助余额</p>
				</div>
				<div class="weui_cell_ft"><?php echo $_SESSION['buzhu']; ?>元</div>
			</div>
			<div class="weui_cell">
				<div class="weui_cell_bd weui_cell_primary">
					<p>学工号</p>
				</div>
				<div class="weui_cell_ft"><?php echo $_SESSION['xuehao']; ?></div>
			</div>
			<div class="weui_cell">
				<div class="weui_cell_bd weui_cell_primary">
					<p>身份</p>
				</div>
				<div class="weui_cell_ft"><?php echo $_SESSION['xueli']; ?></div>
			</div>	
		</div>
		<div class="weui_cells_title">更多查询</div>
		<div class="weui_cells weui_cells_access">
			<a class="weui_cell" href="jychoose.php">
				<div class="weui_cell_bd weui_cell_primary">
					<p>交易汇总信息</p>
				</div>
				<div class="weui_cell_ft"></div>
			</a>
			<a class="weui_cell" href="xfchoose.php">
				<div class="weui_cell_bd weui_cell_primary">
					<p>消费详单查询</p>
				</div>
				<div class="weui_cell_ft"></div>
			</a>
		</div>
	</div>
</div>
</body>
</html>
