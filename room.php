<?php
/**
 * Created by PhpStorm.
 * User: dongf
 * Date: 2018/10/27
 * Time: 19:21
 */
include "./function.php";
include "./conn/conn.php";
//获取房间id房间信息
$query=mysqli_query($connID,"select * from tb_room where id=".$_GET['id']);
//将获取到的信息进行数化
$info=mysqli_fetch_array($query);
mysqli_set_charset($connID, "utf8");
//当房间信息不存在时
if(!$info){
//    跳转回首页
    header("location:index.php");
    exit();
}
$name= $info['name'];

//$name=iconv("gbk","utf-8",$name);
$guest = $info['guest'];
$host = $info['host'];
$chess = $info['chess'];
$flag = $info['flag'];
$guest_win = $info['guest_win'];
//echo $guest_win;
//exit();
$host_win = $info['host_win'];
//echo $json_room;
//当红方不为空时且黑方名称不为空，且当用户名称都不等于黑方红方名称时
if($host!=''&&  $guest!=''&& $username !=$host &&  $username != $guest){
    header("location:index.php");
    exit();
}
if($host !=''&&$guest !=''&& $username != $host){
//     header("location:join.php?roomid=".$_GET['id']);
//     exit();
}
if(isset($_COOKIE['message'])){


    setcookie("message",null);
}
$json_room=json_encode($info,true);
require "./view/room.phtml";


?>


