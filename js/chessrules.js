// 棋子的算法chess则代表棋子,from代表棋子的起始坐标，to代表棋子的目的坐标
function check(chess,from,to) {
//若当前棋子为黑方的卒
    if (chess == "011" || chess == "012" || chess == "013" || chess == "014" || chess == "015"){
        //卒过河以后可以横向走
        if (from >= 46 && ( from - to == 1|| to - from ==1))
        //返回的值为1
            return 1;
        //若目的坐标减去原始坐标等于9时，说明向直下方走一步
        if (to - from == 9)
        //返回的值为1
            return 1;
    }
    //若当前为红方棋子
    if (chess == "111" || chess == "112" || chess == "113" || chess == "114" || chess == "115"){
        //卒过河以后可以横向走
        if (from >= 45 && ( from - to == 1|| to - from ==1))
        //返回的值为1
            return 1;
        //若原始减去目的坐标等于9时，说明向直下方走一步
        if (from - to == 9)
        //返回的值为1
            return 1;
    }
//    炮的算法
    if (chess=="010" || chess == "009" || chess == "110" || chess == "109") {
        //控制炮向下走
        if (to - from >0 && (to - from ) % 9 ==0){
            //定义变量用于储存元素坐标和目的坐标之间的棋子数量
            var count = 0;
            //原始坐标的值每次循环+9
            for (var i = from + 9; i < to; i+=9 ) {
                //如果该处棋子的值不等于blank
                if (document.getElementById("chess_value_" + i).value != "blank") {
                    //变量自动+1
                    count++;
                }
            }
            //如果炮上方没有棋子
            if (count == 0 && document.getElementById("chess_value_"+to).value == "blank"){
                //返回值为1
                return 1 ;
            }
            //若炮上方有一个棋子
            if (count == 1 && document.getElementById("chess_value_"+to).value != "blank"){
                //返回值为1
                return 1 ;
            }
        }
        //控制炮向上走
        if (from - to >0 && (from - to ) % 9 ==0){
            //定义变量用于储存元素坐标和目的坐标之间的棋子数量
            var count = 0;
            //原始坐标的值每次循环+9
            for (var i = to + 9; i < from; i+=9 ) {
                //如果该处棋子的值不等于blank
                if (document.getElementById("chess_value_" + i).value != "blank") {
                    //变量自动+1
                    count++;
                }
            }
            //如果炮上方没有棋子
            if (count == 0 && document.getElementById("chess_value_"+to).value == "blank"){
                //返回值为1
                return 1 ;
            }
            //若炮上方有一个棋子
            if (count == 1 && document.getElementById("chess_value_"+to).value != "blank"){
                //返回值为1
                return 1 ;
            }
        }
        //控制炮向右走
        if (to - from >0 && to - from < 9 ){
            //定义变量用户储存原始坐标和目的坐标之间的棋子数量
            var count= 0;
            //初始坐标的值每次循环+1
            for (var i = from +1; i < to; i++){
                // 如果该处棋子的值不等于blank
                if (document.getElementById("chess_value_"+i).value != "blank"){
                    //变量自动+1
                    count++;
                }
            }
            //如果炮上方没有棋子
            if (count == 0 && document.getElementById("chess_value_"+to).value == "blank"){
                //返回值为1
                return 1 ;
            }
            //若炮上方有一个棋子
            if (count == 1 && document.getElementById("chess_value_"+to).value != "blank"){
                //返回值为1
                return 1 ;
            }
        }
        //控制炮向左走
        if (from - to >0 && from - to < 9 ){
            //定义变量用户储存原始坐标和目的坐标之间的棋子数量
            var count= 0;
            //目的坐标的值每次循环+1
            for (var i = to +1; i < from; i++){
                // 如果该处棋子的值不等于blank
                if (document.getElementById("chess_value_"+i).value != "blank"){
                    //变量自动+1
                    count++;
                }
            }
            //如果炮上方没有棋子
            if (count == 0 && document.getElementById("chess_value_"+to).value == "blank"){
                //返回值为1
                return 1 ;
            }
            //若炮上方有一个棋子
            if (count == 1 && document.getElementById("chess_value_"+to).value != "blank"){
                //返回值为1
                return 1 ;
            }
        }
    }
    //若当前棋子为车
    if ( chess == "008" || chess == "007" || chess == "108" || chess == "107"){
        //控制车向下走
        if (to - from>0 && (to-from) % 9 == 0){
            //定义变量用户储存原始坐标和目的坐标之间的棋子数量
            var count = 0;
            //原始坐标的值每次循环+9
            for (var i = from + 9;i < to; i +=9 ){
                // 如果该处棋子的值不等于blank
                if (document.getElementById("chess_value_"+i).value != "blank") {
                    //变量自动+1
                    count++;
                }
            }
            //若车进行的上方没有棋子
            if (count==0){
                //返回的值为1
                return 1;
            }

        }
        //控制车向上走
        if (from - to>0 && (from - to) % 9 == 0){
            //定义变量用户储存原始坐标和目的坐标之间的棋子数量
            var count = 0;
            //目的坐标的值每次循环+9
            for (var i = to + 9;i < from; i +=9 ){
                // 如果该处棋子的值不等于blank
                if (document.getElementById("chess_value_"+i).value != "blank") {
                    //变量自动+1
                    count++;
                }
            }
            //若车进行的上方没有棋子
            if (count==0){
                //返回的值为1
                return 1;
            }

        }
        if(to - from > 0 && to - from < 9){       //控制“车”向右走
            var count = 0;    //定义变量用于存储原始坐标和目的坐标之间棋子的数量
            for(var i = from + 1;i < to;i ++){ //原始坐标的值每次循环加1
                if(document.getElementById("chess_value_"+i).value != "blank")    //如果该处棋子的值不等于blank
                    count ++;                 //变量自动加1
            }
            if(count == 0 )    //如果“车”的行进方向上没有棋子
                return 1;     //返回值为1
   //返回值为1
        }
        if(from - to > 0 && from - to < 9){       //控制“车”向左走
            var count = 0;    //定义变量用于存储原始坐标和目的坐标之间棋子的数量
            for(var i = to + 1;i < from;i ++){    //目的坐标的值每次循环加1
                if(document.getElementById("chess_value_"+i).value != "blank")    //如果该处棋子的值不等于blank
                    count ++;              //变量自动加1
            }
            if(count == 0 )    //如果“车”的行进方向上没有棋子
                return 1;//返回值为1
        }
    }
//    若当前棋子为马
    if (chess == "006" || chess == "005" || chess == "106" || chess == "105"){
        //控制马向下走日字
        if (to - from == 19 || to - from == 17){
            //如果原始坐标点的直下都为空棋
            if (document.getElementById("chess_value_"+(from + 9)).value == "blank"){
                //返回的值为1
                return 1;
            }
        }
        //控制马向上走日字
        if (from - to == 19 || from - to == 17){
            //如果原始坐标点的上方都为空棋
            if (document.getElementById("chess_value_"+(from - 9)).value == "blank"){
                // 返回的值为1
                return 1;
            }
        }
        //控制马向左走日字
        if (to - from == 7 || from - to == 11){
            //如果原始坐标点的左侧都为空棋
            if (document.getElementById("chess_value_"+(from - 1)).value == "blank"){
                //返回的值为1
                return 1;
            }
        }
        //控制马向右走日字
        if (from - to == 7 || to - from == 11){
            //如果原始坐标点的右侧都为空棋
            if (document.getElementById("chess_value_"+(from + 1)).value == "blank"){
                //返回的值为1
                return 1;
            }
        }
    }
//若当前的控制的棋子为象
    if (((chess == "004" || chess == "003")&& to <=45) || ((chess == "104"||chess == "103") && to>=46)){
        //控制象往左下走
        if (to - from == 16 ){
            //如果原始坐标点数+8为空棋
            if (document.getElementById("chess_value_"+(from + 8)).value == "blank"){
                //返回的值为1
                return 1;
            }
        }
        //控制象往右上走
        if (from - to == 16 ){
            //如果原始坐标点数-8为空棋
            if (document.getElementById("chess_value_"+(from - 8)).value == "blank"){
                //返回的值为1
                return 1;
            }
        }
        //控制象往右下走
        if (to - from == 20 ){
            //如果原始坐标点数+10为空棋
            if (document.getElementById("chess_value_"+(from + 10)).value == "blank"){
                //返回的值为1
                return 1;
            }
        }
        //控制象往左上走
        if (from - to == 20 ){
            //如果原始坐标点数-10为空棋
            if (document.getElementById("chess_value_"+(from - 10)).value == "blank"){
                //返回的值为1
                return 1;
            }
        }
    }
    //设置黑方的士
    if (chess == "002"||chess == "001"){
        //控制黑方的士的走路坐标（在4、6、14、22、24）的范围内，不能超过8个或10个坐标点
        if ((to == 6 || to == 4 || to == 14 || to == 22 || to == 24)&&
            (to - from == 8 || from - to == 8 || to - from == 10 || from - to == 10)){
            // 返回值为1
            return 1;
        }
    }
    //设置红方的士
    if (chess == "102"||chess == "101"){
        //控制红方的士的走路坐标（在85、87、77、69、67）的范围内，不能超过8个或10个坐标点
        if ((to == 85 || to == 87 || to == 77 || to == 69 || to == 67)&&
            (to - from == 8 || from - to == 8 || to - from == 10 || from - to == 10)){
            //返回的值为1
            return 1;
        }
    }
//    设置黑方的将
    if (chess == "000"){
    //控制黑方的将可行坐标
        if (((to >= 4 && to <= 6 ) || ( to >= 13 && to <= 15 ) || ( to >= 22 && to <= 24))&&(to - from == 1 || from - to == 1 || to - from == 9 || from - to == 9)) {
            //返回值为1
            return 1;
        }
        //当黑方将和红方将在一条直线上时
        if ( to > from && (to - from) % 9 == 0 && document.getElementById("chess_value_"+to).value == "100") {
            //定义变量用于储存起始坐标和目的坐标之间的棋子数量
            var count=0;
            //黑方的将目的坐标点每次循环+9
            for (var i = from + 9;i < to; i +=9 ){
                // 如果该处棋子的值不等于blank
                if (document.getElementById("chess_value_"+i).value != "blank") {
                    //变量自动+1
                    count++;
                }
            }
            if (count==0){
                return 1;
            }
        }
    }
    //    设置黑方的将
    if (chess == "100"){
        //控制黑方的将可行坐标
        if (((to >= 87 && to <= 85 ) || ( to >= 78 && to <= 76 ) || ( to >= 69 && to <= 67))&&(to - from == 1 || from - to == 1 || to - from == 9 || from - to == 9)) {
            //返回值为1
            return 1;
        }
        //如果红方帅和黑方将在一条直线上时
        if ( from > to && (from - to) % 9 == 0 && document.getElementById("chess_value_"+to).value == "000") {
            //定义变量用于储存起始坐标和目的坐标之间的棋子数量
            var count=0;
            //红方帅的目的坐标点每次循环+9
            for (var i = to + 9;i < from; i +=9 ){
                // 如果该处棋子的值不等于blank
                if (document.getElementById("chess_value_"+i).value != "blank") {
                    //变量自动+1
                    count++;
                }
            }
            //当起始坐标和目的坐标之间没有棋子时
            if (count==0){
                // 返回值为1
                return 1;
            }
        }
    }
    //操作有误时返回0值
    return 0;
}