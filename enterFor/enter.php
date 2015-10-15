<?php 
header("Content-type: text/html;charset=utf-8");
error_reporting(E_ALL ^ E_NOTICE);//防止php出现未定义等错误

//链接数据库 
$con = mysqli_connect("数据库地址","用户名","密码")or die("数据库链接失败");
mysqli_set_charset ($con,utf8);
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
$openid=$_GET['openid'];
mysqli_select_db($con,"数据库名");
$sql="select id from wx_ygp_users where openid = '$openid'";
$query = mysqli_query($con,$sql); 
$row = mysqli_fetch_array($query);

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>青春在线</title>
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <style>
        *{margin:0;padding:0;}
        div{margin:0 auto;}
        .main{text-align: center;height:185px;background:url(img/bg.jpg) no-repeat;background-size:100%;}
        .font{font-size:50px;padding-top:85px;}
          .c{ background-color:#90EE90; padding:12px 10px;}
        .center{text-align: center;}
        .title{background-color:#FFA54F;border-radius: 5%;margin:15px 20px; padding:5px;}
        .line2{text-indent: 2em; line-height: 23px;}
        .Btitle{display: block;line-height: 28px;background-color:#FFA54F;padding:3px;width:70px;border-radius: 6%;  }
        .red{color: red;font-weight: bold;}
        .threeTitle{color:  #1E90FF;font-weight: bold;}
        .four{color:red;}
        img{width: 100%;border:#ffffff 2px solid;margin:3px 3px 10px;}
        .foot{text-align: center;color: #1C86EE;line-height: 25px;}
    </style>
</head>
<body>
   <div class="main">
      <p class="font"><?php print_r($row['id']);?></p>
   </div> 
     <div class="c">
  <div class="title center">
   <h4>山东理工大学首届荧光夜跑<?php echo $subscribe; ?></h4>
          <h5>暨</h5>
          <h5>山东理工大学百人团跑21天争霸赛启动仪式</h5>
</div>
<p class="line">荧光夜跑被称为“地球上最闪亮的5公里赛跑”。这是一个推崇健康，分享快乐，传递正能量的新兴夜跑活动。跑步不记排名，不求速度，只在乎心情快乐，精神愉悦。在荧光世界里你可以行走、奔跑、跳跃，跟家人，和朋友，与广大爱好夜跑者一起体验狂欢的荧光派对！一起感受夜跑精神。</p>
<p class="Btitle">活动详情:</p>
<p><span class="threeTitle">时间：</span><span class="red">10.16晚 6：30-----8:00</span></p>
<p><span class="threeTitle">地点：</span>山东理工大学西校区</p>
<p><span class="threeTitle">安排：</span></p>
<p>（1）<span class="four">4:00</span>参与人员开始报道并领取物品</p>
<p>（2）<span class="four">6:15表演开始</span></p>
<p>（3）<span class="four">7:00跑步活动正式开始</span></p>
<p>（4）<span class="four">8:30现场抽奖</span></p>
<p><span class="threeTitle">路线图：</span></p>
<p>起点：二体西侧马路上</p>
<p>终点：二体西侧马路上</p>
<img src="img/1.jpg">

  <div class="foot">
     <p>如报名出错，请骚扰程序猿GG:18753377188</p>
   </div>
   </div>
</body>
</html>