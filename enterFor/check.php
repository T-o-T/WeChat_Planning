<?php 



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

$name=$_POST['name'];
 $phone=$_POST['phone'];
 $grade=$_POST['grade'];
 $sex=$_POST['sex'];
 $openid=$_POST['openid'];
 if ($openid == ""||$openid==null) {
      $openid =  "dashkdjhsak213687";
    }
 mysqli_select_db($con,"数据库名");
 $sql="insert into wx_ygp_users (id,name,openid,phone,grade,sex) values (null,'$name','$openid','$phone','$grade',$sex)";
 mysqli_query($con,$sql);

header("Location: http://youthink.cc/weixin/enter.php?openid=$openid"); 
?>