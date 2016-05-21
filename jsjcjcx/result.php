<?php
header("Content-type: text/html; charset=utf-8"); 
include ('function.php');

$username = $_POST['name'];
$cardid = $_POST['cardid'];
if(empty($username)||empty($cardid)){
	echo "<h3 align='center'>请输入用户名或身份证号</h3>";
	echo "<p align='center'><a href='http://weibo.com/abcdGJJ/'>Bug反馈：abcdGJJ</a></p>";
	echo "<p align='center'>QQ:1392552862</p>";
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

$name2=substr($arr[0][9],7,-1);
$id2=substr($arr[0][10],7,-1);
$examid2=substr($arr[0][11],7,-1);
$subject2=substr($arr[0][12],7,-1);
$goal2=substr($arr[0][15],7,-1);
$pass2=substr($arr[0][16],7,-1);

$name3=substr($arr[0][18],7,-1);
$id3=substr($arr[0][19],7,-1);
$examid3=substr($arr[0][20],7,-1);
$subject3=substr($arr[0][21],7,-1);
$goal3=substr($arr[0][22],7,-1);
$pass3=substr($arr[0][23],7,-1);



if($pass=="及格"||$pass=="优秀"){
	$string="恭喜你，通过了本场考试";
	$class="success";
}
else{
	$string="很遗憾，你未通过本场考试";
	$class="danger";
}

if($pass2=="及格"||$pass2=="优秀"){
	$string2="恭喜你，通过了本场考试";
	$class2="success";
}
else{
	$string2="很遗憾，你未通过本场考试";
	$class2="danger";
}

if($pass3=="及格"||$pass3=="优秀"){
	$string3="恭喜你，通过了本场考试";
	$class3="success";
}
else{
	$string3="很遗憾，你未通过本场考试";
	$class3="danger";
}

if(empty($name)||empty($id)||empty($examid)){
	$error="<h3 align='center'>你的输入有误，请检查</h3>";
	echo $error;
	echo "<p align='center'><a href='http://weibo.com/abcdGJJ/'>Bug反馈：abcdGJJ</a></p>";
	echo "<p align='center'>QQ:1392552862</p>";
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
	<link rel="stylesheet" type="text/css" href="base.css">
</head>
<body>
<?php 
if(!(empty($username)||empty($cardid)) &&!(empty($name)||empty($id)) &&!(empty($examid))){
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
	<?php
		if(!(empty($username)||empty($cardid))&&!(empty($name2)||empty($id2))){  
	?>
	<p align="center" style="font-size: 20px;color: #000;">
		<b><?php echo $string2; ?></b>
	</p>
	<table class="table table-striped">
		<tr>
			<td>项目</td>
			<td>#</td>
		</tr>
		<tr>
			<td>姓名</td>
			<td><?php echo $name2; ?></td>
		</tr>
		<tr>
			<td>身份证号</td>
			<td><?php echo $id2; ?></td>
		</tr>
		<tr>
			<td>准考证号</td>
			<td><?php echo $examid2; ?></td>
		</tr>
		<tr>
			<td>考试科目</td>
			<td><?php echo $subject2;?></td>
		</tr>
		<tr>
			<td>分数</td>
			<td><?php echo $goal2;?></td>
		</tr>
		<tr class="<?php echo $class2 ?>">
			<td>通过情况</td>
			<td><?php echo $pass2; ?></td>
		</tr>
	</table>
	<?php } ?>
	<?php 
		if(!(empty($username)||empty($cardid))&&!(empty($name3)||empty($id3))){
	?>
	<p align="center" style="font-size: 20px;color: #000;">
		<b><?php echo $string3; ?></b>
	</p>
	<table class="table table-striped">
		<tr>
			<td>项目</td>
			<td>#</td>
		</tr>
		<tr>
			<td>姓名</td>
			<td><?php echo $name3; ?></td>
		</tr>
		<tr>
			<td>身份证号</td>
			<td><?php echo $id3; ?></td>
		</tr>
		<tr>
			<td>准考证号</td>
			<td><?php echo $examid3; ?></td>
		</tr>
		<tr>
			<td>考试科目</td>
			<td><?php echo $subject3;?></td>
		</tr>
		<tr>
			<td>分数</td>
			<td><?php echo $goal3;?></td>
		</tr>
		<tr class="<?php echo $class3 ?>">
			<td>通过情况</td>
			<td><?php echo $pass3; ?></td>
		</tr>
	</table>
	<?php } ?>
	<p align="center"><a href="http://weibo.com/abcdGJJ/">Bug反馈：abcdGJJ</a></p>
	<p align="center">QQ:1392552862</p>
	<p align="center">长按下面二维码进行识别，查绩点，更方便！</p>
	<p align="center"><img src="weixin.jpg" alt=""></p>
</div>
<?php
}

?>
</body>
</html>