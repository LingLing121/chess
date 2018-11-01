function copy_url() {
    if(window.clipboardData && window.clipboardData.setData()){
        //获取网址信息并复制在剪贴板里
        window.clipboardData.setData('text',document.location.href);
        alert('复制成功');
    }else {
        alert('浏览器不支持该复制方式');
    }
}
$.ajax({
    url:"room.php?roomid=",
    type:"post",
    async:"true",
    dataType:"json", 
    success:function (data) {
        data.username
    }
});
var prompt_count = 0;//初始化变量
function open_prompt(message, top, left){           //输出提示框所在的位置
    prompt_count = 1;//将变量值设置为1
    prompt_pause_time ++;                       //计时按每1秒进行累计
    if(message){//如果聊天信息不为空
        document.getElementById("item").style.visibility = "visible";//设置元素可见
        document.getElementById("item").style.align = "center";//设置元素居中显示
        document.getElementById("item").style.top = top ;//设置元素到顶部的距离
        document.getElementById("item").style.left = left ;//设置元素到左侧的距离
        document.getElementById("item").innerHTML =  '<table class=message_box><tr><td valign=middle>系统提示：<br><br>&nbsp;&nbsp;'+message+'</td></tr></table>';//设置元素中显示的内容
    }
}

