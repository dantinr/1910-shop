<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Websocket</title>
</head>
<body>

<h1>Websocket 聊天室</h1>


<div id="rev_cont">

</div>
<hr>
<input type="text" id="msg" style="width: 300px;height: 30px">
<input type="button" id="btn_msg" style="width:100px;height: 30px" value="发送">


<script src="/js/jquery.min.js"></script>
<script src="/js/js.cookie-2.2.1.min.js"></script>
<script>

    var url = 'ws://ws.1910.com';       //websocket 服务器地址
    var ws = new WebSocket(url);
    var user_name = Cookies.get('u')
    console.log(user_name);

    ws.onopen = function(){
        //点击发送
        $("#btn_msg").on('click',function(){
            ws.send($("#msg").val());
        });

    }
    //接收服务器响应
    ws.onmessage = function(d){
        $("#rev_cont").append( "<p>" + "[" + user_name + "]: "  + d.data + "</p>" )
        $("#msg").val("")
    }


</script>

</body>
</html>
