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
