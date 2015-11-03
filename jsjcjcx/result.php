<?php
header("Content-type: text/html; charset=utf-8"); 
include ('function.php');

$username = $_POST['name'];
$cardid = $_POST['cardid'];
if(empty($username)||empty($cardid)){
	echo "<h3 align='center'>请输入用户名或身份证号</h3>";
	echo "<p align='center'><a href='http://weibo.com/abcdGJJ/'>Bug反馈：abcdGJJ</a></p>";
	echo "<p align='center'>长按下面二维码进行识别，查绩点，更方便！</p>";
	echo "<p align='center'><img src='weixin.jpg'></p>";
}
else{
	$urlLogin = "http://www.sdlgcj.net:50080/sdlgcj/jsj/cjcxjg.jsp";
	$post = "id_card=$cardid&name=$username&Submit=进入";

$content=login_post($urlLogin,$post);

preg_match_all('|value="(.*)"|isU', $content, $arr); //正则匹配value值





$name=substr($arr[0][0],7,-1);
$id=substr($arr[0][1],7,-1);
$examid=substr($arr[0][2],7,-1);
$subject=substr($arr[0][3],7,-1);
$goal=substr($arr[0][6],7,-1);
$pass=substr($arr[0][7],7,-1);



if($pass=="及格"||$pass=="优秀"){
	$string="恭喜你，通过了本次考试";
	$class="success";
}
else{
	$string="很抱歉，你未通过本次考试";
	$class="danger";
}

if(empty($name)||empty($id)){
	$error="<h3 align='center'>你的输入有误，请检查</h3>";
	echo $error;
	echo "<p align='center'><a href='http://weibo.com/abcdGJJ/'>Bug反馈：abcdGJJ</a></p>";
	echo "<p align='center'>长按下面二维码进行识别，查绩点，更方便！</p>";
	echo "<p align='center'><img src='weixin.jpg'></p>";
}

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>计算机等级成绩查询</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>
<?php 
if(!(empty($username)||empty($cardid))&&!(empty($name)||empty($id))){
 ?>
<div class="container">
	<p align="center" style="font-size: 20px;color: #000;">
		<b><?php echo $string; ?></b>
	</p>
	<table class="table table-striped">
		<tr>
			<td>项目</td>
			<td>#</td>
		</tr>
		<tr>
			<td>姓名</td>
			<td><?php echo $name; ?></td>
		</tr>
		<tr>
			<td>身份证号</td>
			<td><?php echo $id; ?></td>
		</tr>
		<tr>
			<td>准考证号</td>
			<td><?php echo $examid; ?></td>
		</tr>
		<tr>
			<td>考试科目</td>
			<td><?php echo $subject;?></td>
		</tr>
		<tr>
			<td>分数</td>
			<td><?php echo $goal;?></td>
		</tr>
		<tr class="<?php echo $class ?>">
			<td>通过情况</td>
			<td><?php echo $pass; ?></td>
		</tr>
	</table>
	<p align="center"><a href="http://weibo.com/abcdGJJ/">Bug反馈：abcdGJJ</a></p>
	<p align="center">长按下面二维码进行识别，查绩点，更方便！</p>
	<p align="center"><img src="weixin.jpg" alt=""></p>
</div>
<?php
}

?>
</body>
</html>