<?php
/**
 * Created by PhpStorm.
 * User: dongf
 * Date: 2018/10/23
 * Time: 19:30
 */
include "./function.php";
include "./conn/conn.php";

$query=mysqli_query(
    $connID,"select * from tb_room"
);

while ($row= mysqli_fetch_array($query))
{
//    删除无用的房间
    mysqli_query($connID,"delete from tb_room where ".(time()-$row['time']).">5");
}
//如果cookie里的message值被设置
if(isset($_COOKIE["message"])){
//    弹出对话框message的值
    echo "<script>alert(".$_COOKIE['message'];")</script>";
//    将cookie的值 定义为空值
    setcookie("message",null);
}
//  查询数据库当中的数据



require "view/index.phtml";


