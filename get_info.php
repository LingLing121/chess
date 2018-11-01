<?php
/**
 * Created by PhpStorm.
 * User: dongf
 * Date: 2018/10/29
 * Time: 16:59
 */
include "./function.php";
include "./conn/conn.php";
//查询房间号信息
$query = mysqli_query($connID,"select * from tb_room where id='".$_GET['roomid']."'");
//将查询结果返回到数组中
$result = mysqli_fetch_array($query);
if (!mysqli_num_rows($query)){
    die("ended");
}
$chess = $result['chess'];
$flag = $result['flag'];
$moved = $result['moved'];
$eated = $result['eated'];
$guest = $result['guest'];
$host = $result['host'];
//转换字符防止中文乱码
$guest = iconv("gbk","utf-8",$guest);
$host = iconv("gbk","utf-8",$host);
$time_guest = $result['time_guest'];
$time_host =$result['time_host'];
$guest_win = $result['guest_win'];
$host_win = $result['host_win'];
$message_guest = $result['message_guest'];
$message_host = $result['message_host'];
//    执行更新记录
mysqli_query($connID,"update tb_room set time = '".time()."'where id ='".$_GET['roomid']."' limit=1");
//输出最新的棋盘信息
echo $chess."|".$flag."|".$moved."|".$eated."|".$guest."|".$host."|".$time_guest."|".$time_host."|".$guest_win."|".$host_win."|".$message_guest."|".$message_host;