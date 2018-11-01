<?php
/**
 * Created by PhpStorm.
 * User: dongf
 * Date: 2018/10/29
 * Time: 14:19
 */
include "./function.php";
include "./conn/conn.php";
$query = mysqli_query($connID,"select * from tb_room where id=".$_GET['id']);
$row= mysqli_fetch_array($query);
//获取chess字段的值
$chess= $row['chess'];
//利用都好风格结果集合
$chess_explode =explode(",",$chess);
//初始化变量
$eated="";
//重新将定位棋盘中棋子的排列位置
for($c="",$i=0;$i<sizeof($chess_explode);$i++){
//    获取棋子数组中的元素
    $new_chess =$chess_explode[$i];
//    获取棋子的起始位置,变量i+1(坐标起始位置为1)
    if($i+1==$_GET['from']){
//        给变量赋予空的图像值
        $new_chess="blank";
    }
//    获取棋子跳跃的位置
    if(i+1==$_GET['to']){
//        如果棋子的值不等于blank
        if ($chess_explode[$i]){
//            给吃掉的棋子赋予变量
            $eated=$chess_explode[$i];
        }
//        给走动的棋子赋予变量
        $new_chess =$chess_explode[$_GET['from']-1];
    }
//    以都好为分割符连接当前了每个棋子的棋号
    $c .=$new_chess.",";
}
//如果当前玩家为黑方玩家
if($_GET['site']=="guest"){
//    将走棋标志定义红方玩家
    $flag="host";
}else{
//    否则定义为黑方玩家
    $flag="guest";
}
//更新棋子的位置，走棋标志，棋子移动的位置等相关走棋信息
mysqli_query($connID,"update tb_room set chess ='$c',
flag = '$flag' ,
moved = '".$_GET['from'].",".$_GET['to']."',
eated = '$eated'where id= '".$_GET['id']."'limit 1");