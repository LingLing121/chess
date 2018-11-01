<?php
/**
 * Created by PhpStorm.
 * User: dongf
 * Date: 2018/10/30
 * Time: 10:01
 */
include "./function.php";
include "./conn/conn.php";
if($_GET['message']){
    mysqli_query($connID,"update tb_room set 'message_".$_GET['site']."'='".$_GET['message']."'where id ='".$_GET['roomid']."'");
}