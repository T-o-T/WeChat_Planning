<?php
session_start();
header("Content-type: text/html; charset=utf-8");
function login_post2($url,$cookie,$post){
    $ch = curl_init();//初始化curl模块
    curl_setopt($ch, CURLOPT_URL, $url);//登录提交的地址
    curl_setopt($ch, CURLOPT_HEADER, 0);//是否显示头信息  0 否
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); //是否自动显示返回的信息
    curl_setopt($ch,CURLOPT_REFERER,'http://ecard.sdut.edu.cn/Index_button.aspx');
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie); //从指定文件读取Cookie
    curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
    $result=curl_exec($ch); //执行cURL
    curl_close($ch); //关闭cURL资源，并且释放系统资源
    return $result;
}
function get_content($url,$cookie) {
    $con = curl_init();
    curl_setopt($con, CURLOPT_URL, $url);
    curl_setopt($con, CURLOPT_HEADER, 0);
    curl_setopt($con, CURLOPT_RETURNTRANSFER, 1);
   // curl_setopt($con,CURLOPT_REFERER,'http://ecard.sdut.edu.cn/Index_button.aspx');
    //curl_setopt($con, CURLOPT_USERAGENT,"Mozilla/5.0 (Windows NT 5.1; rv:17.0) Gecko/20100101 Firefox/17.0");
    // curl_setopt($con, CURLOPT_COOKIEFILE, $cookie); //读取cookie
    curl_setopt($con, CURLOPT_COOKIEFILE, $cookie);
    $rs = curl_exec($con); //执行cURL抓取页面内容
    curl_close($con);
    return $rs;
}
// $res=login_post($url,"","");
// $pattern = '<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value=".*">';
// preg_match_all($pattern, $res, $matches);
// $viewstate=substr($matches[0][0],63,-1);
// echo $viewstate;
// echo "<br>";
// $pattern2 = '<input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value=".*">';
// preg_match_all($pattern2, $res, $matches2);
// $eventvalidation=substr($matches2[0][0],75,-1);
// echo $eventvalidation;
// echo "<br>";
include 'validation.php';

$cookie = dirname(__FILE__) . '/cookie/'.$_SESSION['id'].'.txt';
$url="http://ecard.sdut.edu.cn/UserInfo/UserLogin.aspx";
$xh = $_POST['xh'];
$pw = $_POST['pw'];
$code = $res;
// $code= $_POST['code'];
if(empty($xh)||empty($pw)){
    echo "<script type='text/javascript'>alert('请输入完整再次提交');window.location.href = document.referrer;</script>";
}
else{
//$post="__EVENTTARGET=&__EVENTARGUMENT=&__VIEWSTATE=$viewstate&__EVENTVALIDATION=$eventvalidation&txtUserName=$xh&txtPwd=$pw&txtCheckCode=$code&btnUserLogin=";
    $post=array(
	   '__EVENTTARGET'=>'',
	   '__EVENTARGUMENT'=>'',
	   '__VIEWSTATE'=>'/wEPDwUKMTczODI0OTkzNQ9kFgICAw9kFgICAw9kFgICAQ8PFgIeBFRleHQFDOeUqOaIt+WQje+8mmRkZIvORQxETkdfHpXhoHr73Za/c2Si',
	   '__EVENTVALIDATION'=>'/wEWBgKk5920BQKl1bKzCQKd+7qdDgKY2YWXBgKTgvWHDQLJk9/kDPSrax9XSNKv5J/eIyTlUNRa3qie',
	   'txtUserName'=>$xh,
	   'txtPwd'=>$pw,
	   'txtCheckCode'=>$code,
	   'btnUserLogin'=>''
	);
    $url2="http://ecard.sdut.edu.cn/EcardInfo/UserBaseInfo_Seach.aspx";
    login_post2($url,$cookie,http_build_query($post));
    $content = get_content($url2,$cookie);
    preg_match_all('|value="(.*)"|isU', $content, $arr);
    $xuehao=substr($arr[0][2],7,-1);
	 $_SESSION['xuehao']=$xuehao;
    $name=substr($arr[0][3],7,-1);
    $_SESSION['name']=$name;
    $gender=substr($arr[0][4],7,-1);
    $_SESSION['gender']=$gender;
    $state=substr($arr[0][5],7,-1);
    $xueli=substr($arr[0][6],7,-1);
    $buzhu=substr($arr[0][7],7,-1);
    $yue=substr($arr[0][8],7,-1);
    $danwei=substr($arr[0][9],7,-1);
}
?>

<?php
    if(!empty($xuehao)){
?>
<!DOCTYPE html>
<html>
<head>
    <title>一卡通余额</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <link rel="stylesheet" type="text/css" href="css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="css/base.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
</head>
<body>
    <nav>
        <div class="nav-wrapper">
            <a href="#!" class="brand-logo">你好，<?php echo $name; ?><?php if($gender=="男"){echo "帅哥";}else if($gender=="女"){echo "美女";} ?></a>
            <a href="#" data-activates="mobile-demo" class="button-collapse">
                <i class="icon-reorder material-icons prefix"></i>
                <!-- <embed src="svg/ic_menu_24px.svg" type="image/svg+xml"> -->
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
    <?php
        $cookie = dirname(__FILE__) . '/cookie/'.$_SESSION['id'].'.txt';
        $url3='http://ecard.sdut.edu.cn/Other/Photo.aspx';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url3);
        curl_setopt($curl, CURLOPT_COOKIEFILE, $cookie);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        //curl_setopt($curl,CURLOPT_REFERER,'http://ecard.sdut.edu.cn/EcardInfo/UserBaseInfo_Seach.aspx');
        $img = curl_exec($curl);
        curl_close($curl);
        // echo $fp"=fopen('img/xh_".$xuehao.".jpg".","."w)";
        $fp = fopen("images/xh_$xuehao.jpg","w");
        fwrite($fp,$img);
        fclose($fp);
    ?>
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="header">
                    <div class="content">
                        <div class="image avatar">
                            <p align="center">
                                <?php echo "<img src='images/xh_$xuehao.jpg' width='230' height='230'>"; ?>
                            </p>
                        </div>
                        <div class="info">
                            <p>
                                <span class="white-text">余额：</span>
                                <?php if($yue<10){echo "<span class='red-text'>$yue</span>";}else{echo "<span class='light-blue-text text-darken-4'>$yue</span>";} ?>
                            </p>
                            <p>
                                <span class="white-text">补助余额：</span>
                                <?php echo "<span class='light-blue-text text-darken-4'>$buzhu</span>"; ?>
                            </p>
                            <p>
                                <span class="white-text">学号：</span>
                                <?php echo "<span class='light-blue-text text-darken-4'>$xuehao</span>"; ?>
                            </p>
                            <p>
                                <span class="white-text">身份：</span>
                                <?php echo "<span class='light-blue-text text-darken-4'>$xueli</span>"; ?>
                            </p>
                            <p>
                                <span class="white-text">单位：</span>
                                <?php echo "<span class='light-blue-text text-darken-4'>$danwei</span>" ?>
                            </p>
                        </div>
                        <p class="hide-on-med-and-up">点击左上角可以查询更多哦！</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript" src="http://cdn.bootcss.com/materialize/0.97.3/js/materialize.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".button-collapse").sideNav();
        })
    </script>
</body>
</html>
<?php
$filename="verifyCode.jpg";
unlink($filename);
}
else if(!empty($xh)&&!empty($pw)){
?>
    <script type="text/javascript">
        alert('哎呀，程序出错了T_T,请检查学号和密码是否输入正确');
        window.location.href = document.referrer;
    </script>
<?php
}
 ?>
