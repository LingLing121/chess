<?php
/**
 * Created by PhpStorm.
 * User: dongf
 * Date: 2018/10/27
 * Time: 9:54
 */
//初始化变量
$c="";
//开始定义所有棋子的坐标组成的字符串
$c .='007,005,003,001,000,002,004,006,008,'.
    'blank,blank,blank,blank,blank,blank,blank,blank,blank,'.
    'blank,009,blank,blank,blank,blank,blank,010,blank,'.
    '011,blank,012,blank,013,blank,014,blank,015,'.
    'blank,blank,blank,blank,blank,blank,blank,blank,blank,'.
    'blank,blank,blank,blank,blank,blank,blank,blank,blank,'.
    '111,blank,112,blank,113,blank,114,blank,115,'.
    'blank,109,blank,blank,blank,blank,blank,110,blank,'.
    'blank,blank,blank,blank,blank,blank,blank,blank,blank,'.
    '107,105,103,101,100,102,104,106,108';
//获取用户IP
function GetIP(){
//    利用getenv方法来获取用户的ip
    if (getenv("HTTP_X_FORWARDED_FOR"))
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    elseif (getenv("HTTP_CLIENT_IP"))
        $ip = getenv("HTTP_CLIENT_IP");
    elseif (getenv("REMOTE_ADDR"))
        $ip= getenv("REMOTE_ADDR");
    else
        $ip="Unknown";
    return $ip;
}