<?php

//代码写的太烂，不足之处，望告知 Http://hufangyun.com
//很多地方，查询数据的方式，过于简单粗暴，比如判断数据库中是否存在该用户，当用户数量庞大的时候，页面加载太慢。

header("Content-type: text/html;charset=utf-8");

error_reporting(0);//测试的时候去掉这个
//error_reporting(E_ALL ^ E_NOTICE);//防止php出现未定义等错误

//链接数据库 
$con = mysqli_connect("数据库地址","用户名","密码")or die("数据库链接失败");
mysqli_set_charset ($con,utf8);
mysqli_select_db($con,"数据库名");

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
//以下部分参考微信wiki   http://mp.weixin.qq.com/wiki/
$code=$_GET['code'];//取得微信中的code参数

$url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=微信公众号ID&secret=微信后台有&code=$code&grant_type=authorization_code";
$output = https_request($url);
$output = json_decode($output);
$array = get_object_vars($output);//转换成数组
$openid = $array['openid'];//输出openid  微信用户唯一标示

//var_dump($output);

$url2="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=微信公众号ID&secret=微信后台有";
$output2= https_request($url2);
$output2 = json_decode($output2);
$array2 = get_object_vars($output2);//转换成数组
$access_token= $array2['access_token'];

$url3="https://api.weixin.qq.com/cgi-bin/user/info?access_token=$access_token&openid=$openid&lang=zh_CN";
$output3= https_request($url3);
$output3 = json_decode($output3);
$array3 = get_object_vars($output3);//转换成数组
$subscribe= $array3['subscribe'];//输出subscribe 根据其值判断是否关注了公众号  

//查询人数，达到多少时，停止报名
$res=mysqli_query($con,"select count(*) from wx_ygp_users " );
$myrow = mysqli_fetch_array($res);
$count=$myrow[0];  


 $sql="select openid from wx_ygp_users where openid = '$openid'";
 $query = mysqli_query($con,$sql);  //判断此用户是否已经存在
  
             if (!mysqli_num_rows($query) && $count<=1602){//判断报名人数是否达到规定人数，
                                          $name=$_POST['name'];
                                          if($name==null||$name==""){ //检测表单是否提交，用以判断展示那个页面
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>报名</title>
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <style>
        *{margin:0;padding:0;}
        .Title img{border:0;width:100%;}
        div{margin:0 auto;padding:0;}
        .main{text-align: center;margin-top: 25px;}
        .form-group{margin-top: 18px;}
        .control-label{line-height: 20px;}
        @media (max-width: 768px){
        .control-label{line-height: 30px;}
        }
        .container{
            padding-right: 25px;
            padding-left: 25px;
            margin-right: auto;
            margin-left: auto;
        }

         .c{ background-color:#90EE90; padding:12px 10px;}
        .center{text-align: center;}
        .title{background-color:#FFA54F;border-radius: 5%;margin:15px 20px; padding:5px;}
        .line{text-indent: 2em; line-height: 23px;}
        .Btitle{display: block;line-height: 28px;background-color:#FFA54F;padding:3px;width:70px;border-radius: 6%;  }
        .red{color: red;font-weight: bold;}
        .threeTitle{color:  #1E90FF;font-weight: bold;}
        .four{color:red;}
        .load img {width: 100%;border:#ffffff 2px solid;margin:3px 3px 10px;}
        .foot{text-align: center;color: #1C86EE;line-height: 25px;}
    </style>
</head>
<body>
<div class="Title">
       <img  src="img/top.jpg">
</div>
  <div class="container">
   <div class="main">
       <form class="form-horizontal" method="post" action="check.php">
            <input type="hidden" name="openid" value="<?php echo $openid ?>" >

  <div class="form-group">
    <label  class="col-sm-3 col-xs-3 control-label">姓&nbsp;&nbsp;名：</label>
    <div class="col-sm-7 col-xs-9">
      <input type="text" class="form-control input-sm"  name="name" placeholder="姓名" required="required">
    </div>
  </div>
  <div class="form-group">
    <label  class="col-sm-3 col-xs-3 control-label">电&nbsp;&nbsp;话：</label>
    <div class="col-sm-7 col-xs-9">
      <input type="text" class="form-control input-sm"  name="phone" placeholder="方便通知您" required="required">
    </div>
  </div>
   <div class="form-group">
    <label  class="col-sm-3 col-xs-3 control-label">年&nbsp;&nbsp;级：</label>
    <div class="col-sm-7 col-xs-9">
      <input type="text" class="form-control input-sm"  name="grade" placeholder="例如：计科1304">
    </div>
  </div>
   <div id="left" class="form-group" >
    <label  class="col-sm-3 col-xs-3 control-label">性&nbsp;&nbsp;别：</label>
    <div class="col-sm-7 col-xs-9">
     <select name="sex" class="form-control input-sm">
         <option value="1">男</option>
         <option value="0">女</option>
     </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-offset-2 col-sm-10 bottonSubmit">
      <button type="submit" class="btn btn-success col-xs-9">加入我们一起去跑步！</button>
    </div>
  </div>
</form>
   </div> 
   </div>
  <div class="c">
  <div class="title center">
   <h4>山东理工大学首届荧光夜跑</h4>
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
<div class="load">
  <img src="img/1.jpg">
</div>


  <div class="foot">
     <!--<a href="http://youthol.cn">青春在线技术部</a>-->
     <p>如报名出错，请骚扰程序猿GG:18753377188</p>
   </div>
   </div>
</body>
</html>
<?php 
}
}elseif (mysqli_num_rows($query)){
  header("Location: https://open.weixin.qq.com/connect/oauth2/authorize?appid=微信公众号ID&redirect_uri=http://youthink.cc/weixin/enter.php&response_type=code&scope=snsapi_base&state=123#wechat_redirect"); 
} elseif ($count>=1603){ ?>

  <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>青春在线 荧光夜跑报名</title>
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <style>
    h2{margin:80px auto 40px;color:red;}
    h1,h2, .center{ text-align: center;}
    .foot{margin: 20px auto;color:#337ab7;font-size:18px;}
    .content{margin:20px auto;}
    .p{color:green;font-size:18px;}
    </style>
</head>
<body>
  <div class="container">
    <div class="row">
      <h2>青春在线"荧光夜跑"报名</h2>
      <h1>人数已达上限</h1>
      <div class="content center">
        <p>更多精彩内容</p>
        <p class="p">点击关注“<a href="http://mp.weixin.qq.com/s?__biz=MjM5NjM5NjkwMA==&mid=210685543&idx=1&sn=a347c9838168f4a5c022d7eed339b37b#wechat_redirect">青春在线</a>”微信公众平台</p>
      </div>
      
    </div>
  </div>
</body>
</html>

<?php }
?>