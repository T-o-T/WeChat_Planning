<?php

//ģ���½����
function login_post($url,$post)
{
    $ch = curl_init();//��ʼ��curlģ��
    curl_setopt($ch, CURLOPT_URL, $url);//��¼�ύ�ĵ�ַ
    curl_setopt($ch, CURLOPT_HEADER, 0);//�Ƿ���ʾͷ��Ϣ  0 ��
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); //�Ƿ��Զ���ʾ���ص���Ϣ
    // curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_jar); //����Cookie��Ϣ������ָ�����ļ���
    // curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$post);//Ҫ�ύ����Ϣ
    $result=curl_exec($ch); //ִ��cURL
    curl_close($ch); //�ر�cURL��Դ�������ͷ�ϵͳ��Դ
    return $result;
}
//��½���ȡ����
// function get_content($url)
// {
//     $ch = curl_init();
//     curl_setopt($ch, CURLOPT_URL, $url);
//     curl_setopt($ch, CURLOPT_HEADER, 0);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
//     // curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_jar);//��ȡcookie
//     $result = curl_exec($ch);
//     curl_close($ch);
//     return $result;
// }








