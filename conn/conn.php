<?php
/**
 * Created by PhpStorm.
 * User: dongf
 * Date: 2018/10/23
 * Time: 20:25
 */
//创建连接数据库
$connID=mysqli_connect("127.0.0.1","root","");
mysqli_set_charset($connID, "utf8");
//指定数据库编码类型为gb2312
mysqli_query($connID,"set names 'gb2312'");
//判断数据库是否存在
if (!mysqli_select_db($connID,"db_game"))
{
//    如果没有数据库则跳转回安装数据库界面
    header("location:install.php");
    exit();
}
//判断是否在COOKIE中是否有过username的历史ID
if (isset($_COOKIE['username'])){
//    如果有将username历史ID赋值在$username中
    $username=$_COOKIE['username'];
}else{
//    如果没有调取方法来获取用户的ID
    $username = GetIP();
}
