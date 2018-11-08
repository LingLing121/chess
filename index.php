<?php
/**
 * Created by PhpStorm.
 * User: dongf
 * Date: 2018/10/23
 * Time: 19:30
 */
include "./function.php";              //调用自定义函数文件
include "./conn/conn.php";             //连接数据源文件
$query = mysqli_query($connID,"select * from tb_room"); //执行查询语句
while($row = mysqli_fetch_array($query)){//将查询结果循环返回到数组中
    //删除无用房间
    mysqli_query($connID,"delete from tb_room where ".(time()-$row['time']).">5");
}
if(isset($_COOKIE['message'])){//如果Cookie变量message的值被设置
    echo "<script>alert('".$_COOKIE['message']."');</script>";//弹出对话框
    setcookie("message", null);//设置Cookie变量message的值为null
}

require "view/index.phtml";


