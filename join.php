<?php
/**
 * Created by PhpStorm.
 * User: dongf
 * Date: 2018/10/27
 * Time: 18:03
 */
//调取函数
include "function.php";
//调取数据源文件
include "./conn/conn.php";
//查询房间号信息
$query = mysqli_query($connID,"select * from tb_room where id='".$_GET['roomid']."'");
//将查询结果返回到数组中
$row = mysqli_fetch_array($query);
//获取黑方信息
$guest=$row['guest'];
//获取红方信息
$host=$row['host'];
//当红方和黑方名称都为空时
if ($guest=="" && $host==""){
//    执行更新语句
    mysqli_query($connID,"update tb_room set host ='$username',time_guest='".time()."',time = '".time()."'where id ='".$_GET['roomid']."'");
}elseif ($guest!=""&&$host !=""){
//    输出满房
   setcookie("message","满房");
//   跳转回首页
   header("location:index.php");
   exit();
//   当红方玩家名称不为空,黑方名称为空,且黑方名称不等于红方玩家名称
}elseif ($host !=""&&$guest==""&&$username !=$host){
     mysqli_query($connID,"update tb_room set guest ='$username',time_guest = '".time()."',time = '".time()."'where id ='".$_GET['roomid']."'");
//当红方为空,黑方不为空
}elseif ($guest !=""&&$host == ""){
 //执行更新语句
    mysqli_query($connID,
        "update tb_room set guest = '',
               host = '$username',flag = 'host',chess = '".$c."',
               time_host = '".time()."',
               time = '".time()."',
               moved='',eated='',guest_win='0',host_win='0',message_guest= '',message_host='' 
               where id = '".$_GET['roomid']."'");
}else{
    setcookie("message","昵称被占用,请更换");
    header("location:index.php");
    exit();
}
header("location:room.php?id=".$_GET['roomid']);
exit();