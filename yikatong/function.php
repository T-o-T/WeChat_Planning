<?php 
    function login_post($url,$cookie,$post){
        $ch = curl_init();//初始化curl模块
        curl_setopt($ch, CURLOPT_URL, $url);//登录提交的地址
        curl_setopt($ch, CURLOPT_HEADER, 0);//是否显示头信息  0 否
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); //是否自动显示返回的信息
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie); //从指定文件读取Cookie
        curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
        $result=curl_exec($ch); //执行cURL
        curl_close($ch); //关闭cURL资源，并且释放系统资源
        return $result;
    }
?>