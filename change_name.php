<?php
/**
 * Created by PhpStorm.
 * User: dongf
 * Date: 2018/10/25
 * Time: 17:28
 */
include "./function.php";
include "./conn/conn.php";
$nick_name=$_POST['nick_name'];

if($nick_name=""){
    setcookie("message","名称不能为空");
    header("location:index.php");
    exit();
}elseif(strlen($_POST['nick_name'])>13){
    setcookie("message","名称不能超过13个字符");
    header("location:index.php");
    exit();
}
//执行查询语句
$query=mysqli_query($connID,"select count(*) as 'num' from tb_room where host = '".$nick_name."'or guest ='".$nick_name."' limit 1 ");
//转化为数组
$row=mysqli_fetch_array($query);
//获取num字段的值给变量
$num=$row['num'];
//如果用户名称已被占用
if($num !=0){
    setcookie("message","名称已被占用");
    header("location:index.php");
    exit();
}
//弹出用户名称，并转换用户名称中的特殊字符
setcookie("username",$_POST['nick_name']);
header("location:index.php");
