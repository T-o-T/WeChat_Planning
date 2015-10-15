<?php

header("Content-type: text/html;charset=utf-8");

error_reporting(E_ALL ^ E_NOTICE);//防止php出现未定义等错误

//链接数据库 
$con = mysqli_connect("数据库地址","用户名","密码")or die("数据库链接失败");
mysqli_set_charset ($con,utf8);

 mysqli_select_db($con,"数据库名");
 $value=$_GET['value'];
 if($value=="desc"||$value==null||$value=="")
 {
 	 $sql="select * from wx_ygp_users order by id desc";
 }
else{
	 $sql="select * from wx_ygp_users order by id asc";
 }
 $query = mysqli_query($con,$sql);  

//总数
$res=mysqli_query($con,"select count(*) from wx_ygp_users " );
$myrow = mysqli_fetch_array($res);
$count=$myrow[0];

?>
 <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>青春在线 荧光夜跑报名单</title>
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <style>
    h2{margin:40px auto 20px; text-align: center;}
    .center{text-align: center;}
    .btn{margin:15px 10px;}
    .foot{margin: 20px auto;color:#337ab7;font-size:18px;}
    </style>
</head>
<body>
<div class="container">
	<div class="row">
	        <h2>青春在线"荧光夜跑"报名表</h2>
	        <div class="center">
	        <h3>总人数：<?php echo $count;?></h3>
	                <a  href="http://youthink.cc/weixin/list.php?value=desc" class="btn btn-primary">倒序查看</a>
                               <a   href="http://youthink.cc/weixin/list.php?value=asc"class="btn btn-success">顺序查看</a>
	        </div>
	        <div class="table-responsive">
		<table class="table table-hover table table-striped table-condensed">
		<tr><td>报名序号</td><td>微信用户号</td><td>姓名</td><td>手机号</td><td>性别</td><td>专业班级</td></tr>
		<?php while  ( $row=mysqli_fetch_array($query)){ ?>
		<tr><td><?php echo $row['id'] ;?></td><td <?php if ($row['openid']=="dashkdjhsak213687"){echo "class='danger'";}?>><?php echo $row['openid'] ;?></td><td><?php echo $row['name'] ;?></td><td><?php echo $row['phone'] ; ?></td><td><?php if ($row['sex'] ==1) {echo "男";}else{echo "女";} ?></td><td><?php echo $row['grade'] ; ?></td></tr>
		<?php } ?>
		 </table>
                       </div>
		 <div class="foot center">
		 	<p>如有问题，请联系技术部：胡方运<br>&nbsp;&nbsp;&nbsp;Tel:<span style="color:red;">18753377188<span></p>
		 </div>
	</div>
</div>
</body>
</html>
