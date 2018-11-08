<?php
/**
 * Created by PhpStorm.
 * User: dongf
 * Date: 2018/10/25
 * Time: 17:28
 */
//如果房间名称为空
if($_POST['play_room']==""){
//    弹出提示信息
    setcookie("message","游戏房间名称不能为空");
//    返回首页
    header("location:index.php");
    exit();
}
//调用函数库
include "function.php";
//连接数据库文件
include "./conn/conn.php";
//
$query= mysqli_query($connID,"insert into tb_room(id,name,chess,time) values (NULL,'".$_POST['play_room']."','$c','".time()."')");
//echo $query;
//////exit();
$id= mysqli_insert_id($connID);
//echo $id;
//exit();
    if($id !=""){
    header("location:join.php?roomid=".$id);
    setcookie("message","创建房间成功");
}