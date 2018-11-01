<?php
/**
 * Created by PhpStorm.
 * User: dongf
 * Date: 2018/10/30
 * Time: 10:10
 */
include "function.php";
include "conn/conn.php";
//更新列表值
mysqli_query($connID, "update tb_room set chess = '$c' , 
flag='host',eated = '', guest_win = '" . $_GET['guest_win'] . "',
host_win = '" . $_GET['host_win'] . "' where id = '" . $_GET['roomid'] . "'");
