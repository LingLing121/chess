<?php
/**
 * Created by PhpStorm.
 * User: dongf
 * Date: 2018/10/30
 * Time: 9:53
 */
include "function.php";
include "./conn/conn.php";
//删除指定房间
mysqli_query($connID,"delete from tb_room where id='".$_GET['roomid']."'");
header("location:index.php");