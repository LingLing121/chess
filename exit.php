<?php
/**
 * Created by PhpStorm.
 * User: dongf
 * Date: 2018/10/30
 * Time: 9:37
 */
include "./function.php";
include "./conn/conn.php";
if(isset($_GET['site'])){
    mysqli_query($connID,"update tb_room set ".$_GET['site'].",
    flag='".($_GET['site']=='host'?'guest':'host')."',
    chess='".$c."',
     moved='',eated='',guest_win=0,host_win=0,message_guest='',message_host='',
     where id='".$_GET['roomid']."'");
}
header("location:index.php");