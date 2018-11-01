<?php
/**
 * Created by PhpStorm.
 * User: dongf
 * Date: 2018/10/23
 * Time: 19:39
 */
//若参数action的值为install
if (isset($_POST['server']) && isset($_GET['action']) && $_GET['action'] == 'install') {
//    若没有连接数据库
    if (!$connID = mysqli_connect($_POST['server'], $_POST['username'], $_POST['password'])) {
//        若连接数据库失败跳出提示框数据库连接失败
        echo "<script>alert('连接数据库失败！')</script>";
    } else {
//        若连接成功，连接数据库读取源文件
        $conn = file_get_contents("./conn/conn.php");
//用户名替换
        $conn = str_replace("db_user", $_POST['username'], $conn);
//        密码替换
        $conn = str_replace("db_pwd", $_POST['password'], $conn);
//        数据库替换
        $conn = str_replace("db_name", $_POST['database'], $conn);
//将变量$conn的值写入源文件中
        file_put_contents("./conn/conn.php", $conn);
//添加数据库中的内容sql语句并利用file_get来获取txt文本中的sql指令
        $sql_file = file_get_contents("./sql.txt");
//        判断数据库是否存在
        if (!mysqli_select_db($connID, $_POST['database'])) {
//            若不存在则创建一个数据库
            mysqli_query($connID, "CREATE DATABASE " . $_POST['database']);
        } else {
//            如果存在则删除里面的db_room表
            mysqli_query($connID, "drop table if exists db_room");
        }
//        选择用户创建的数据库
        mysqli_select_db($connID, $_POST['database']);
        //判断是否成功执行输入数据库内容
        if (mysqli_query($connID, $sql_file)) {
//            若成功则跳转至游戏首页
            header("location:index.php");
            echo "<script>alert('数据库安装成功！');</script>";
            exit();
        } else {
//            若失败跳出弹框显示安装数据库失败
            echo "<script>alert('数据库安装失败！');</script>";
//            header("location:install.php");
        }
    }
}
require "view/install.phtml";
